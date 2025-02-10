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
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis"><a href="#">Produse adaugate</a></li></ul>
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
      {{-- <a class="dropdown-item row align-center mb-8" href="{{ url('/produse') }}">
        <button class="btn btn-blue rounded-xl medium-width">Continua cumparaturile</button>
      </a> --}}
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
                  // Folosim cantitatea comandată din sesiune, nu cea din stoc
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
                          <h3 class="normal-weight">{{ \Illuminate\Support\Str::before($ordered_product->short_name, ' -') }}</h3>
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
                      {{-- {{ $ordered_product->ordered_quantity }} --}}
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
                          <form method="POST" action="{{ route('orders.removeProduct') }}">
                              @csrfWithoutAutocomplete
                              <input type="hidden" name="product_variation_id" value="{{ $ordered_product->id }}">
                              <button aria-label="Sterge produsul"><img src="{{ asset('resources/new_design/icons/bin.svg') }}" width="18" height="18"></button>
                          </form>
                      </div>
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
          // Calcularea prețului individual și adăugarea la total
          $totalIndividualPrice = floatval($ordered_product->price) * intval($ordered_product->ordered_quantity);
          $totalPrice += $totalIndividualPrice;
          $addon_quantity = '';
    
          // Procesarea addon_quantity
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
                  {{-- Scade cantitatea --}}
                  <form method="POST" action="{{ route('orders.updateQuantity') }}">
                    @csrfWithoutAutocomplete
                    <input type="hidden" name="product_variation_id" value="{{ $ordered_product->id }}">
                    <input type="hidden" name="quantity" value="{{ max(1, $ordered_product->ordered_quantity - 1) }}">
                    <button type="submit" aria-label="Scade cantitatea">-</button>
                  </form>
                  {{ $ordered_product->ordered_quantity }}
                  {{-- Creste cantitatea --}}
                  <form method="POST" action="{{ route('orders.updateQuantity') }}">
                    @csrfWithoutAutocomplete
                    <input type="hidden" name="product_variation_id" value="{{ $ordered_product->id }}">
                    <input type="hidden" name="quantity" value="{{ $ordered_product->ordered_quantity + 1 }}">
                    <button type="submit" aria-label="Creste cantitatea">+</button>
                  </form>
                </div>
              </div>
              
    
              <p class="mt-8"><span class="bold">Ambalare: </span>{{ $ordered_product->quantity }} {{ $ordered_product->measurementUnit->name }}
                @if ($ordered_product->addon_quantity)
                  + {{ $addon_quantity }} Kg
                @endif
              </p>
              <p class="mt-8"><span class="bold">Culoare: </span>{{ $ordered_product->colour }}</p>
              <p class="mt-8"><span class="bold">Pret unitar: </span>{{ number_format($ordered_product->price, 2) }} Lei (TVA inclus)</p>
              <p class="mb-8 mt-8"><span class="bold">Cost: </span>{{ number_format($totalIndividualPrice, 2) }} Lei (TVA inclus)</p>
            </div>
    
            <div class="p-16 flex align-end">
              <form method="POST" action="{{ route('orders.removeProduct') }}">
                @csrfWithoutAutocomplete
                <input type="hidden" name="product_variation_id" value="{{ $ordered_product->id }}">
                <button class="delete" aria-label="Sterge produsul">
                  <img src="{{ asset('resources/new_design/icons/bin.svg') }}" width="18" height="18" alt="Sterge produsul">
                </button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    

    <div class="grid grid-5 mt-8">
      <div class="col-span-4">
        <p class="mb-8"><span class="bold">Cost total: </span>{{ number_format($totalPrice, 2) }} Lei, TVA inclus.</p>
        <p><span class="green-mark italic">Toate preturile se refera la culori standard.</span></p>
        <p><span class="green-mark italic">Pentru nuante RAL sau destinatii speciale, va rugam sa ne contactati.</span></p>
        <em class="red-mark">Produsele pot fi livrate dupa circa 3 zile lucratoare, necesare procesului tehnologic.</em>
      </div>
      <div class="flex col-md mt-16 gap-xs justify-center align-end">
        <a class="row align-center" href="{{ url('/produse') }}">
          <button class="btn btn-blue rounded-xl medium-width">Continua cumparaturile</button>
        </a>
        <a class="row align-center" href="{{ route('checkout.form') }}">
          <button class="btn btn-blue rounded-xl medium-width">Finalizeaza comanda</button>
        </a>
      </div>
    </div>
  @endif
</div>
@endsection
