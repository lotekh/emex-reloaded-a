@php
  $averageRating = $product->reviews->avg('rating') ?? 5;
  $reviewCount = ($product->reviews->count() === 0) ? 1 : $product->reviews->count();
  $variations = $product->variations;
  $initialVariation = $variations->first();
  $baseUrl = url('/');
  
  $compactVariations = $product->variations->map(function($variation) {
        return [
            'id' => $variation->id,
            'quantity' => $variation->quantity,
            'colour' => $variation->colour,
            'price' => $variation->price,
            'price_no_tva' => $variation->price_no_tva,
            'ean' => $variation->ean,
            'addon_text' => $variation->addon_text,
            'measurement_unit' => [
                'name' => $variation->measurementUnit->name
            ]
        ];
  });

  use App\Models\DiscountCode;
  
  // Look for a product-specific discount
  $productDiscount = $product->discountCodes()->where('is_active', true)->first();

  // If we have no product-specific discount, look for a general(bulk) discount
  if (!$productDiscount) {
    $productDiscount = DiscountCode::whereDoesntHave('products')
        ->where('is_active', true)
        ->first();
  }

@endphp

<div class="product-card">
  <div class="text-center">
    <a href="{{ url($product->slug) }}" title="{{ $product->name }}">
      <h2 class="title">{!! $product->plain_name !!}</h2>
    </a>
  </div>

  <div>
    <div class="relative image">
      
      @php
        $isInWishlist = app('App\Http\Controllers\WishlistController')->isInWishlist($product->id);
      @endphp

      <form method="POST" class="addToWishlistBt absolute z-10" id="product_wish_list_form{{ $product->id }}" action="{{ $isInWishlist ? url('/remove-from-wishlist') : url('/add-to-wishlist') }}">
          @csrfWithoutAutocomplete
          <input type="hidden" name="product_id" value="{{ $product->id }}">

          <button type="submit" aria-label="{{ $isInWishlist ? 'Elimină din favorite' : 'Adaugă la favorite' }}">
              <img width="20" height="20" src="{{ $isInWishlist ? asset('resources/new_design/icons/star-fill.svg') : asset('resources/new_design/icons/star.svg') }}" title="wishlist" alt="wishlist" @if (!empty($lazyloading)) loading="lazy" @endif>
          </button>
      </form>

    
      <div class="absolute z-10 stoc-container">
        @if ($product->active)
          <div class="in-stoc">
            <div class="flex align-center">
              <img width="18" height="18" src="{{ asset('resources/new_design/icons/check-mark.svg') }}" alt="checkmark-icon" title="checkmark-icon" @if (!empty($lazyloading)) loading="lazy" @endif>
            </div>
            <p>In stoc</p>
          </div>
        @else
          <div class="in-stoc not">
            <div class="flex align-center">
              <img width="18" height="18" src="{{ asset('resources/new_design/icons/error-outline.svg') }}" alt="error-icon" title="error-icon" @if (!empty($lazyloading)) loading="lazy" @endif>
            </div>
            <p>Indisponibil</p>
          </div>
        @endif
      </div>

      @php
        $smallImageUrl = $product->smallImage ? asset('storage/' .$product->smallImage->path) : $baseUrl . '/images/default-placeholder.png';
        $pngSmallImageUrl = $product->pngSmallImage ? asset('storage/' .$product->pngSmallImage->path) : $baseUrl . '/images/default-placeholder.png';
      @endphp

      <a href="{{ url($product->slug) }}" title="{{ $product->name }}">
        <div>
          <picture>
            <source type="image/webp" srcset="{{ $smallImageUrl }}"/>
            <img src="{{ $pngSmallImageUrl }}" class="w-full" alt="{{ $product->pngSmallImage ? $product->pngSmallImage->alt : 'imagine'}}" title="{{ $product->pngSmallImage ? $product->pngSmallImage->title : 'imagineprodus'}}" @if (!empty($lazyloading)) loading="lazy" @endif> 
          </picture>
          @if($productDiscount)
                    <div class="super-pret-badge-small">
                        <span>Promo {{$productDiscount->percentage}}%</span>
                    </div>
          @endif
        </div>
      </a>
    </div>

    {{-- Ratings --}}
    <div class="w-full row align-center mb-8 product-rating-pl">
      @for ($i = 0; $i < 5; $i++)
        @if ($i < $averageRating)
          <div class="flex align-center">
            <img src="{{ asset('resources/new_design/icons/gold-star.svg') }}" title="review-star" alt="review-star" width="18" height="18" @if (!empty($lazyloading)) loading="lazy" @endif>
          </div>
        @else
          <div class="flex align-center">
            <img src="{{ asset('resources/new_design/icons/dark-star.svg') }}" title="review-star" alt="review-star" width="18" height="18" @if (!empty($lazyloading)) loading="lazy" @endif>
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
          <p class="flex align-end">
            <span class="mb-4">Pret:&nbsp;</span>
            <span class="value mr-4" id="price{{$product->id}}">{{ number_format($initialVariation->price, 2) }}</span>
            <span class="value">Lei</span>
          </p>
        @else
          <p>Pret indisponibil</p>
        @endif
      </div>

      <form class="relative w-full col" method="GET" action="{{ url('/adauga-produs') }}">

        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="product_variation_id" id="variationInput{{$product->id}}" value="{{ $initialVariation->id }}">
        <input type="hidden" name="price" id="priceInput{{$product->id}}" value="{{ $initialVariation->price }}">
        <input type="hidden" name="price_no_tva" id="priceNoTvaInput{{$product->id}}" value="{{ $initialVariation->price_no_tva }}">
        <input type="hidden" name="ean" id="eanInput{{$product->id}}" value="{{ $initialVariation->ean }}">
        <input type="hidden" name="addon_quantity" id="addonQuantityInput{{$product->id}}" value="{{ $initialVariation->intaritor }}">
        <input type="hidden" name="quantity" value="1">
        
        <div class="row no-wrap w-full gap-xs">
          <div class="relative row w-full">
            <select aria-label="Ambalare" name="ambalare" id="ambalareSelect{{$product->id}}">
              @foreach ($product->variations->unique('quantity') as $variation)
                  <option value="{{ $variation->quantity }}" {{ $variation->quantity == $initialVariation->quantity ? 'selected' : '' }}>
                      {{ $variation->quantity }} {{ $variation->measurementUnit->name }}
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
      const colorSelect = document.getElementById('colorSelect{{ $product->id }}');
      const priceDisplay = document.getElementById('price{{ $product->id }}');
      const priceInput = document.getElementById('priceInput{{ $product->id }}');
      const variationInput = document.getElementById('variationInput{{ $product->id }}');
  
      const variations = @json($compactVariations);
  
      function updateVariation() {
          const selectedPackaging = ambalareSelect.value;
          const selectedColor = colorSelect.value;
  
          const variation = variations.find(variation => 
              variation.quantity == selectedPackaging && variation.colour == selectedColor
          );
  
          if (variation) {
              // priceDisplay.textContent = parseFloat(variation.price).toFixed(2);
              priceDisplay.textContent = variation.price.toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
              priceInput.value = variation.price;
              variationInput.value = variation.id; 
          } else {
              console.error('No matching variation found.');
          }
      }
  
      ambalareSelect.addEventListener('change', updateVariation);
      colorSelect.addEventListener('change', updateVariation);
  });
</script>
