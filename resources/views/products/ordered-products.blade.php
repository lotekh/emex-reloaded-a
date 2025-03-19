@extends('layout.layout')

@section('seo')
<title>Vezi cos - Produse adaugate</title>
<meta name="keywords" content="cosul tau, produse in cos, comanda ta">
<meta name="description" content="Vezi produsele adaugate in cosul Emex by Romtehnochim - Comanda ta online de vopsele">
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/product-card.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="-ml-4 ellipsis"><a href="#">Produse adaugate</a></li></ul>
@endsection

@section('content')
<div class="main-container mb-32" id="cart">
  <div class="flex justify-between mb-16">
    <h1>
      Cos ({{ count($ordered_products) }} produs{{ count($ordered_products) == 1 ? '' : 'e' }})
    </h1>
    @if(!empty($ordered_products))
      <form method="POST" action="{{ route('orders.empty') }}" style="display: none;">
        @csrfWithoutAutocomplete
        <button id="delete-all" class="flex align-center grey-button" type="submit">
            <img width="18" height="18" src="{{ asset('resources/new_design/icons/bin-grey.svg') }}">
            <span class="ml-8">Sterge tot</span>
        </button>
      </form>
    
    <button class="flex align-center grey-button" onclick="document.getElementById('delete-all').click();">
        <img width="18" height="18" src="{{ asset('resources/new_design/icons/bin-grey.svg') }}">
        <span class="ml-8" style="font-size: 16px;">Sterge tot</span>
    </button>
    
    @endif
  </div>

  @if(empty($ordered_products))
    <p>Cosul tau este gol.</p>
    <div class="flex col align-end wrap mt-8">
      <button class="btn btn-blue rounded-xl medium-width" onclick="location.href='{{ url('/produse') }}';">Continua cumparaturile</button>
    </div>
  @else
    <div class="w-full scrollable-x">
      <table class="mb-8 styled desktop-cart w-full">
        <thead>
          <tr>
            <th>Nume produs</th>
            <th class="text-center">Cantitate</th>
            <th class="text-center">Ambalare</th>
            <th class="text-center">Culoare</th>
            <th>Pret unitar (TVA inclus)</th>
            <th>Cost (TVA inclus)</th>
          </tr>
        </thead>
        <tbody>
          
          @php $totalPrice = 0; @endphp
          @foreach ($ordered_products as $ordered_product)
              @php
                  $totalIndividualPrice = floatval($ordered_product->price) * intval($ordered_product->ordered_quantity);
                  $totalPrice += $totalIndividualPrice;
              @endphp
              <tr>
                  <td>
                      <a href="{{ url($ordered_product->product->slug) }}" class="flex align-center">
                          <div>
                            <picture>
                              <source type="image/webp" srcset="{{ $ordered_product->product->smallImage ? asset('storage/' . $ordered_product->product->smallImage->path) : asset('/images/default-placeholder.png') }}">
                              <img class="image-cart" layout="fixed" src="{{ $ordered_product->product->pngSmallImage ? asset('storage/' . $ordered_product->product->smallImage->path) : asset('/images/default-placeholder.png') }}" alt="{{ $ordered_product->product->smallImage ? $ordered_product->product->smallImage->alt : 'imagine'}}" title="{{ $ordered_product->product->smallImage ? $ordered_product->product->smallImage->title : 'imagineprodus'}}">
                            </picture>
                          </div>
                          {{-- Get the product name until the first '-' sign --}}
                          <h3 class="normal-weight ml-32">{{ \Illuminate\Support\Str::before($ordered_product->name, ' -') }}</h3>
                      </a>
                  </td>

                  <td class="text-center">
                    <div class="quantity-selector flex text-center">
                      {{-- Lower the quantity by 1 --}}
                      <form method="POST" action="{{ route('orders.updateQuantity') }}">
                        @csrfWithoutAutocomplete
                        <input type="hidden" name="product_variation_id" value="{{ $ordered_product->id }}">
                        <input type="hidden" name="quantity" value="{{ max(1, $ordered_product->ordered_quantity - 1) }}">
                        <button type="submit" aria-label="Scade cantitatea">-</button>
                      </form>
                      <span type="text">{{ $ordered_product->ordered_quantity }}</span>
                      {{-- Up the quantity by 1 --}}
                      <form method="POST" action="{{ route('orders.updateQuantity') }}">
                        @csrfWithoutAutocomplete
                        <input type="hidden" name="product_variation_id" value="{{ $ordered_product->id }}">
                        <input type="hidden" name="quantity" value="{{ $ordered_product->ordered_quantity + 1 }}">
                        <button type="submit" aria-label="Creste cantitatea">+</button>
                      </form>
                    </div>
                  </td>
                  
                  
                  <td class="text-center">{{ $ordered_product->quantity }} {{$ordered_product->measurementUnit->name}}</td>
                  <td class="text-center">{{ $ordered_product->colour }}</td>
                  <td class="price">{{ number_format($ordered_product->price, 2) }} Lei</td>
                  <td class="price">
                      <div class="flex justify-between">
                          <p class="price">{{ number_format($totalIndividualPrice, 2) }} Lei</p>
                      </div>
                  <td>
                    <form method="POST" action="{{ route('orders.removeProduct') }}">
                      @csrfWithoutAutocomplete
                      <input type="hidden" name="product_variation_id" value="{{ $ordered_product->id }}">
                      <button aria-label="Sterge produsul"><img src="{{ asset('resources/new_design/icons/bin.svg') }}" width="18" height="18"></button>
                    </form>
                  </td>
                  <td>
                      @php
                        $productId = $ordered_product->product->id;
                        $productVariationId = $ordered_product->id;
                        $isInWishlist = app('App\Http\Controllers\WishlistController')->isInWishlist($productId);
                      @endphp
                      <div class="flex align-center">
                        <form method="POST" class="addToWishlistBt" id="product_wish_list_form{{ $productId }}" action="{{ route('wishlist.toggle') }}">
                          @csrfWithoutAutocomplete
                          <input type="hidden" name="product_id" value="{{ $productId }}">
                          <input type="hidden" name="product_variation_id" value="{{ $productVariationId }}">
                          <input type="hidden" name="remove_from_cart" value="1">
                          <button type="submit" class="wishlist-btn-cos" aria-label="{{ $isInWishlist ? 'Elimină din favorite' : 'Adaugă la favorite' }}">
                              <img width="20" height="20" src="{{ $isInWishlist ? asset('resources/new_design/icons/star-fill.svg') : asset('resources/new_design/icons/star.svg') }}" title="Muta la Favorite" alt="wishlist">
                          </button>
                        </form>
                      </div>
                  </td>
                  
                  <td>
                    <button type="button" class="edit-btn mb-4 mention-btn" data-product-id="{{ $ordered_product->id }}" data-current-mention="{{ $ordered_product->mentions ?? '' }}" title="Mentiuni">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                      </svg>
                  </button>
                  
                </td>
                
              </tr>
          @endforeach

        </tbody>
      </table>
    </div>

    <div class="mobile-cart">
      @php $totalPrice = 0; @endphp
      @foreach ($ordered_products as $ordered_product)
        @php
          $totalIndividualPrice = floatval($ordered_product->price) * intval($ordered_product->ordered_quantity);
          $totalPrice += $totalIndividualPrice;
          $addon_quantity = '';
    
          if ($ordered_product->addon_quantity) {
            $str = $ordered_product->addon_quantity;
            $str = substr($str, strpos($str, 'Bid.') + 4);
            $addon_quantity = number_format((float) filter_var($str, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 2, '.', '');
          }
        @endphp
    
        <div class="product-card relative col justify-between h-full mb-16">
          <div class="w-full">
            <div class="px-8">
              <p class="title text-center">{{ \Illuminate\Support\Str::before($ordered_product->name, ' -') }} 
                @if ($ordered_product->addon_quantity) 
                  + Intaritor 
                @endif
              </p>
            </div>
          </div>
          <div class="w-full flex justify-between px-8">
            <div class="col">
              <div class="flex align-center mt-16">
                <span class="bold mr-8">Cantitate: </span>
                <div class="quantity-selector quantity-selector-mobile flex">
                  {{-- Lower the quantity --}}
                  <form method="POST" action="{{ route('orders.updateQuantity') }}">
                    @csrfWithoutAutocomplete
                    <input type="hidden" name="product_variation_id" value="{{ $ordered_product->id }}">
                    <input type="hidden" name="quantity" value="{{ max(1, $ordered_product->ordered_quantity - 1) }}">
                    <button type="submit" aria-label="Scade cantitatea">-</button>
                  </form>
                  {{ $ordered_product->ordered_quantity }}
                  {{-- Up the quantity --}}
                  <form method="POST" action="{{ route('orders.updateQuantity') }}">
                    @csrfWithoutAutocomplete
                    <input type="hidden" name="product_variation_id" value="{{ $ordered_product->id }}">
                    <input type="hidden" name="quantity" value="{{ $ordered_product->ordered_quantity + 1 }}">
                    <button type="submit" aria-label="Creste cantitatea">+</button>
                  </form>
                </div>
              </div>
              
    
              <p class="mt-8"><span class="bold">Ambalare:</span> &nbsp; {{ $ordered_product->quantity }} {{ $ordered_product->measurementUnit->name }}
                @if ($ordered_product->addon_quantity)
                  + {{ $addon_quantity }} Kg
                @endif
              </p>
              <p class="mt-8"><span class="bold">Culoare:</span> &nbsp; {{ $ordered_product->colour }}</p>
              <p class="mt-8"><span class="bold">Pret unitar: </span> &nbsp; {{ number_format($ordered_product->price, 2) }} Lei (TVA inclus)</p>
              <p class="mb-8 mt-8"><span class="bold">Cost: </span> &nbsp; {{ number_format($totalIndividualPrice, 2) }} Lei (TVA inclus)</p>
            </div>
    
            <div class="p-8 flex align-end gap-md">
              {{-- Remove Product button --}}
              <form method="POST" action="{{ route('orders.removeProduct') }}">
                @csrfWithoutAutocomplete
                <input type="hidden" name="product_variation_id" value="{{ $ordered_product->id }}">
                <button class="delete" aria-label="Sterge produsul">
                  <img src="{{ asset('resources/new_design/icons/bin.svg') }}" width="18" height="18" alt="Sterge produsul">
                </button>
              </form>
            
              {{-- Wishlist button --}}
              <form method="POST" class="addToWishlistBt" action="{{ route('wishlist.toggle') }}">
                @csrfWithoutAutocomplete
                <input type="hidden" name="product_id" value="{{ $ordered_product->product->id }}">
                <input type="hidden" name="product_variation_id" value="{{ $ordered_product->id }}">
                <input type="hidden" name="remove_from_cart" value="1">
                <button class="wishlist-btn-cos" aria-label="{{ $isInWishlist ? 'Elimină din favorite' : 'Adaugă la favorite' }}">
                  <img width="20" height="20" src="{{ $isInWishlist ? asset('resources/new_design/icons/star-fill.svg') : asset('resources/new_design/icons/star.svg') }}" title="Muta la Favorite" alt="wishlist">
                </button>
              </form>
            
              {{-- Mentions button --}}
              <button class="edit-btn mb-4 mention-btn" aria-label="Editează produsul" data-product-id="{{ $ordered_product->id }}" data-current-mention="{{ $ordered_product->mentions ?? '' }}" title="Mentiuni">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                </svg>
              </button>
            </div>       

          </div>
        </div>
      @endforeach
    </div>
    

    <div class="grid grid-5 mt-8">
      <div class="col-span-4">
        <p class="mb-8"><span class="bold">Cost total: </span> {{ number_format($totalPrice, 2) }} Lei, TVA inclus.</p>
        @if($totalPrice < 200)
            <p class="red-mark">Valoarea comenzii trebuie sa fie de minim 200 RON.</p>
        @else
            <p><span class="green-mark italic">Toate preturile se refera la culori standard.</span></p>
            <p><span class="green-mark italic">Pentru nuante RAL sau destinatii speciale, va rugam sa ne contactati.</span></p>
            <em class="red-mark">Produsele pot fi livrate dupa circa 3 zile lucratoare, necesare procesului tehnologic.</em>
        @endif
      </div>
      <div class="flex mt-16 gap-xs justify-center align-end">
        <a class="row align-center" href="{{ url('/produse') }}">
          <button class="btn btn-blue rounded-xl medium-width height-43px">Continua cumparaturile</button>
        </a>
        @if($totalPrice < 200)
            {{-- no 'Finalizeaza Comanda' button --}}
        @else
          <a class="row align-center" href="{{ route('checkout.form') }}">
            <button class="btn btn-blue rounded-xl medium-width height-43px">Finalizeaza comanda</button>
          </a>
        @endif
      </div>
    </div>
  @endif
</div>

<div id="mentionModal" class="lightbox-container hidden-important">
  <div class="bg-white p-8" id="mention-modal-box">
      <h2 class="text-lg font-bold mb-4 text-center default-blue">Mentiuni</h2>
      <textarea id="mentionText" class="w-full p-2 border rounded" rows="3" placeholder="Adaugati date despre produsul dorit, utilizare, suport sau cod Promo, daca acestea exista."></textarea>
      <input type="hidden" id="mentionProductId">
      <div class="flex justify-end gap-4 mt-4">
          <button id="closeMentionModal" class="px-4 py-2 bg-gray-300 rounded">Anulează</button>
          <button id="saveMention" class="px-4 py-2 bg-blue-500 text-white rounded">Trimite</button>
      </div>
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('mentionModal');
    const mentionText = document.getElementById('mentionText');
    const mentionProductId = document.getElementById('mentionProductId');
    const closeMentionModal = document.getElementById('closeMentionModal');
    const saveMention = document.getElementById('saveMention');

    // Create the error message
    let errorMsg = document.getElementById("mentionError");
    if (!errorMsg) {
        errorMsg = document.createElement("div");
        errorMsg.id = "mentionError";
        errorMsg.style.color = "red";
        errorMsg.style.fontSize = "14px";
        errorMsg.style.marginTop = "5px";
        errorMsg.style.display = "none";
        errorMsg.innerText = "Textul este prea lung. Maxim 190 de caractere.";
        mentionText.parentNode.appendChild(errorMsg);
    }

    // Open the modal
    document.querySelectorAll('.mention-btn').forEach(button => {
        button.addEventListener('click', function () {
            mentionProductId.value = this.getAttribute('data-product-id');
            mentionText.value = this.getAttribute('data-current-mention') || '';
            modal.classList.remove('hidden-important');

            // Reset validation
            validateMentionLength();
        });
    });

    function validateMentionLength() {
        if (mentionText.value.length > 190) {
            errorMsg.style.display = "block";
            saveMention.disabled = true;
            saveMention.style.opacity = "0.5";
        } else {
            errorMsg.style.display = "none";
            saveMention.disabled = false;
            saveMention.style.opacity = "1";
        }
    }
    mentionText.addEventListener('input', validateMentionLength);

    closeMentionModal.addEventListener('click', function () {
        modal.classList.add('hidden-important');
    });

    // Save mention
    saveMention.addEventListener('click', function () {
        const productId = mentionProductId.value;
        const mention = mentionText.value.trim();

        fetch("{{ route('orders.updateMention') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                product_variation_id: productId,
                mention: mention
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelectorAll(`.mention-btn[data-product-id="${productId}"]`)
                .forEach(button => button.setAttribute('data-current-mention', mention));
                modal.classList.add('hidden-important');
            }
        })
        .catch(error => console.error('Eroare:', error));
    });
});

</script>
    
  


@endsection
