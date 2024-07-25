@php
  $averageRating = $product->reviews->avg('rating') ?? 0;
  $reviewCount = $product->reviews->count() ?? 0;
  $variations = $product->variations;
  $initialVariation = $variations->first();
  $baseUrl = url('/');
@endphp

<div class="product-card">
  <!-- upper -->
  <div class="text-center">
    <a href="{{ url($product->slug) }}" title="{{ $product->name }}">
      <h2 class="title">{{ $product->plain_name }}</h2>
    </a>
  </div>

  <div>
    <div class="relative image">
      <form method="get" class="addToWishlistBt absolute z-10" id="product_wish_list_form{{ $product->id }}" action="{{ url('/add-to-wishlist') }}">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit" aria-label="Adauga la favorite">
          <img width="20" height="20" src="{{ asset('resources/new_design/icons/star.svg') }}" title="review-star" alt="review-star">
        </button>
      </form>
      <div class="absolute z-10 stoc-container">
        @if ($product->active)
          <div class="in-stoc">
            <div class="flex align-center">
              <img width="18" height="18" src="{{ asset('resources/new_design/icons/check-mark.svg') }}" alt="checkmark-icon" title="checkmark-icon">
            </div>
            <p>In stoc</p>
          </div>
        @else
          <div class="in-stoc not">
            <div class="flex align-center">
              <img width="18" height="18" src="{{ asset('resources/new_design/icons/error-outline.svg') }}" alt="error-icon" title="error-icon">
            </div>
            <p>Indisponibil</p>
          </div>
        @endif
      </div>

      @php
        $featuredImageUrl = $product->featuredImage ? asset('storage/' .$product->featuredImage->path) : $baseUrl . '/images/default-placeholder.png';
        // dd($product->featuredImage);
      @endphp

      <a href="{{ url($product->slug) }}" title="{{ $product->name }}">
        <img src="{{ $featuredImageUrl }}" alt="{{ $product->name }}" title="{{ $product->name }}" width="300" height="300">
      </a>
    </div>

    <div class="w-full row align-center mb-8 product-rating-pl">
      @for ($i = 0; $i < 5; $i++)
        @if ($i < $averageRating)
          <div class="flex align-center">
            <img src="{{ asset('resources/new_design/icons/gold-star.svg') }}" title="review-star" alt="review-star" width="18" height="18">
          </div>
        @else
          <div class="flex align-center">
            <img src="{{ asset('resources/new_design/icons/dark-star.svg') }}" title="review-star" alt="review-star" width="18" height="18">
          </div>
        @endif
      @endfor
      <p class="ml-8 rating-text">
        <span class="font-700">{{ number_format($averageRating, 2, '.', '') }}</span>
        ({{ $reviewCount }})
      </p>
    </div>

    <div class="w-full col justify-end">
      <div class="price row align-center product-price-pl">
        @if($initialVariation)
          <p>
            <span>Pret:&nbsp;</span>
            <span class="value" id="price{{$product->id}}">{{ $initialVariation->price }}</span>
            <span class="value">Lei</span>
          </p>
        @else
          <p>Pret indisponibil</p>
        @endif
      </div>

      <form class="relative w-full col" method="GET" action="{{ url('/order-product') }}">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="submited" value="1">
        <input type="hidden" name="name" value="{{ $product->plain_name }}">
        <input type="hidden" name="price" id="priceInput{{$product->id}}" value="{{ $initialVariation->price }}">
        <input type="hidden" name="price_no_tva" id="priceNoTvaInput" value="{{ $initialVariation->price_no_tva }}">
        <input type="hidden" name="ean" id="eanInput" value="{{ $initialVariation->ean }}">
        <input type="hidden" name="addon_quantity" id="addonQuantityInput" value="{{ $initialVariation->intaritor }}">
        <input type="hidden" name="quantity" value="1">
        <div class="row no-wrap w-full gap-xs">
          <div class="relative row w-full">
            <select aria-label="Ambalare" name="ambalare" id="ambalareSelect{{$product->id}}">
              @foreach ($variations->pluck('quantity')->unique() as $value)
                <option value="{{ $value }}" {{ $value == $initialVariation->quantity ? 'selected' : '' }}>
                  {{ $value }}
                </option>
              @endforeach
            </select>
            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="dropwdown-arrow">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M3.52876 5.52858C3.78911 5.26823 4.21122 5.26823 4.47157 5.52858L8.00016 9.05717L11.5288 5.52858C11.7891 5.26823 12.2112 5.26823 12.4716 5.52858C12.7319 5.78892 12.7319 6.21103 12.4716 6.47138L8.47157 10.4714C8.21122 10.7317 7.78911 10.7317 7.52876 10.4714L3.52876 6.47138C3.26841 6.21103 3.26841 5.78892 3.52876 5.52858Z" />
            </svg>
          </div>

          <div class="relative row w-full">
            <select aria-label="Culoare" name="color" id="colorSelect{{$product->id}}">
              @foreach ($variations->pluck('colour')->unique() as $value)
                <option value="{{ $value }}" {{ $value == $initialVariation->colour ? 'selected' : '' }}>
                  {{ $value }}
                </option>
              @endforeach
            </select>

            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="dropwdown-arrow">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M3.52876 5.52858C3.78911 5.26823 4.21122 5.26823 4.47157 5.52858L8.00016 9.05717L11.5288 5.52858C11.7891 5.26823 12.2112 5.26823 12.4716 5.52858C12.7319 5.78892 12.7319 6.21103 12.4716 6.47138L8.47157 10.4714C8.21122 10.7317 7.78911 10.7317 7.52876 10.4714L3.52876 6.47138C3.26841 6.21103 3.26841 5.78892 3.52876 5.52858Z" />
            </svg>
          </div>
        </div>
        <input type="submit" class="mt-8 btn btn-blue rounded-sm" value="Adauga in cos">
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const ambalareSelect = document.getElementById('ambalareSelect{{ $product->id }}');
    // console.log(ambalareSelect);
    const colorSelect = document.getElementById('colorSelect{{ $product->id }}');
    const priceDisplay = document.getElementById('price{{ $product->id }}');
    const priceInput = document.getElementById('priceInput{{ $product->id }}');

    function updateVariation() {
        const productId = {{ $product->id }};
        const selectedPackaging = ambalareSelect.value;
        const selectedColor = colorSelect.value;

        fetch('{{ route('product.getVariation') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: selectedPackaging,
                color: selectedColor
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                priceDisplay.textContent = data.variation.price;
                priceInput.value = data.variation.price;
                // Update other fields if needed
            } else {
                console.error('Error:', data.error);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }

    ambalareSelect.addEventListener('change', updateVariation);
    colorSelect.addEventListener('change', updateVariation);
});
</script>
