@php
    $initialPrice = $product->variations['initials']['price'];
    $initialPackaging = $product->variations['initials']['packaging'];
    $initialColor = $product->variations['initials']['color'];
    $initialName = $product->variations['initials']['name'];
    $initialPriceNoTva = $product->variations['initials']['price_no_tva'];
    $initialIntaritor = $product->variations['initials']['intaritor'];
    $initialEan = $product->variations['initials']['ean'];

    $parsedFullData = $product->variations['parsedData'];
    
    if (!empty($product->variations['cantitati'])) {
      $ambalareValues = $product->variations['cantitati'];
    }

    if (!empty($product->variations['colors'])) {
      $colorsValues = $product->variations['colors'];
    }

    $rating_sum = 0;
    if (count($product->reviews)) {
        foreach ($product->reviews as $review) {
            $rating_sum += $review['rating'];
        }
        $rating_sum /= count($product->reviews);
        $countReviews = count($product->reviews);
    } else {
        $rating_sum = 5;
        $countReviews = 1;
    }

    $baseUrl = url('/');
@endphp

<div class="product-card" id="product-card-{{ $key }}">
  <!-- upper -->
  <div class="text-center">
    <a href="{{ url('/' . $product->slug) }}" title="{{ $product->getImageTitle('category') }}">
      <h2 class="title">{{ $product->plain_name }}</h2>
    </a>
  </div>

  <div>
    <div class="relative image">
      <form method="get" class="addToWishlistBt absolute z-10" id="product_wish_list_form{{ $product->id }}" action="{{ url('/add-to-wishlist') }}">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit" aria-label="Adauga la favorite">
          @if ($product->isInWishlist)
            <img width="20" height="20" src="{{ $baseUrl }}/resources/new_design/icons/star-fill.svg" title="review-star" alt="review-star">
          @else
            <img width="20" height="20" src="{{ $baseUrl }}/resources/new_design/icons/star.svg" title="review-star" alt="review-star">
          @endif
        </button>
      </form>
      <div class="absolute z-10 stoc-container">
        @if (!$product->is_inactive)
          <div class="in-stoc">
            <div class="flex align-center">
              <img width="18" height="18" src="{{ $baseUrl }}/resources/new_design/icons/check-mark.svg" alt="checkmark-icon" title="checkmark-icon">
            </div>
            <p>In stoc</p>
          </div>
        @else
          <div class="in-stoc not">
            <div class="flex align-center">
              <img width="18" height="18" src="{{ $baseUrl }}/resources/new_design/icons/error-outline.svg" alt="error-icon" title="error-icon">
            </div>
            <p>Indisponibil</p>
          </div>
        @endif
      </div>

      <a href="{{ url('/' . $product->slug) }}" title="{{ $product->getImageTitle('category') }}">
        <img src="{{ $product->getCategoryWebpUrl() }}" alt="{{ $product->getImageAlt('category') }}" title="{{ $product->getImageTitle('category') }}" width="300" height="300">
      </a>
    </div>

    <div class="w-full row align-center mb-8 product-rating-pl">
      @for ($i = 0; $i < 5; $i++)
        @if ($i + 1 <= $rating_sum)
          <div class="flex align-center">
            <img src="{{ $baseUrl }}/resources/new_design/icons/gold-star.svg" title="review-star" alt="review-star" width="18" height="18">
          </div>
        @else
          <div class="flex align-center">
            <img src="{{ $baseUrl }}/resources/new_design/icons/dark-star.svg" title="review-star" alt="review-star" width="18" height="18">
          </div>
        @endif
      @endfor
      <p class="ml-8 rating-text">
        <span class="font-700"> {{ number_format($rating_sum, 2, '.', '') }} </span>
        ({{ $countReviews }})
      </p>
    </div>

    <div class="w-full col justify-end">
      @if (!empty($initialPrice) && !$product->is_inactive)
        <div class="price row align-center product-price-pl">
          <p>
            <span>Pret:&nbsp;</span>
            <span class="value" id="currentPrice{{ $key }}">{{ $initialPrice }}</span>
            <span class="value">Lei</span>
          </p>
        </div>
      @else
        <div class="price">
          <p class="unavailable">Pret indisponibil</p>
        </div>
      @endif

      <form class="relative w-full col" method="GET" action="{{ url('/order-product') }}">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="submited" value="1">
        <input type="hidden" name="name" id="currentName{{ $key }}" value="{{ $initialName }}">
        <input type="hidden" name="price" id="price{{ $key }}" value="{{ $initialPrice }}">
        <input type="hidden" name="price_no_tva" id="priceNoTva{{ $key }}" value="{{ $initialPriceNoTva }}">
        <input type="hidden" name="ean" id="ean{{ $key }}" value="{{ $initialEan }}">
        <input type="hidden" name="addon_quantity" value="{{ $initialIntaritor }}">
        <input type="hidden" name="quantity" value="1">
        <div class="row no-wrap w-full gap-xs">
          @if (!empty($product->variations['cantitati']))
            <div class="relative row w-full">
              <select aria-label="Ambalare" name="ambalare" onchange="updateProductDetails('{{ $key }}', this.value, 'packaging')">
                @foreach ($product->variations['cantitati'] as $value)
                  <option value="{{ $value }}" {{ $value == $initialPackaging ? 'selected' : '' }}>
                    {{ $value }}
                  </option>
                @endforeach
              </select>
              <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="dropwdown-arrow">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.52876 5.52858C3.78911 5.26823 4.21122 5.26823 4.47157 5.52858L8.00016 9.05717L11.5288 5.52858C11.7891 5.26823 12.2112 5.26823 12.4716 5.52858C12.7319 5.78892 12.7319 6.21103 12.4716 6.47138L8.47157 10.4714C8.21122 10.7317 7.78911 10.7317 7.52876 10.4714L3.52876 6.47138C3.26841 6.21103 3.26841 5.78892 3.52876 5.52858Z" />
              </svg>
            </div>
          @endif

          @if (!empty($colorsValues))
            <div class="relative row w-full">
              <select aria-label="Culoare" name="color" onchange="updateProductDetails('{{ $key }}', this.value, 'color')">
                @foreach ($colorsValues as $value)
                  <option value="{{ $value }}" {{ $value == $initialColor ? 'selected' : '' }}>
                    {{ $value }}
                  </option>
                @endforeach
              </select>

              <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="dropwdown-arrow">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.52876 5.52858C3.78911 5.26823 4.21122 5.26823 4.47157 5.52858L8.00016 9.05717L11.5288 5.52858C11.7891 5.26823 12.2112 5.26823 12.4716 5.52858C12.7319 5.78892 12.7319 6.21103 12.4716 6.47138L8.47157 10.4714C8.21122 10.7317 7.78911 10.7317 7.52876 10.4714L3.52876 6.47138C3.26841 6.21103 3.26841 5.78892 3.52876 5.52858Z" />
              </svg>
            </div>
          @endif
        </div>
        <input type="submit" class="mt-8 btn btn-blue rounded-sm {{ empty($initialPrice) || $product->is_inactive ? 'btn-disabled' : '' }}" value="Adauga in cos" {{ empty($initialPrice) || $product->is_inactive ? 'disabled' : '' }}>
      </form>
    </div>
  </div>
</div>

<script>
    function updateProductDetails(key, value, type) {
        // Fetch the parsed data for the product
        const fullData = @json($parsedFullData);

        // Update the state variables based on the selected values
        let selectedPackaging = document.querySelector(`[name="ambalare"]`).value;
        let selectedColor = document.querySelector(`[name="color"]`).value;

        if (type === 'packaging') {
            selectedPackaging = value;
        } else if (type === 'color') {
            selectedColor = value;
        }

        // Find the matching variation in the parsed full data
        const matchingVariation = fullData.find(data => data.includes(`${selectedPackaging},${selectedColor}`));

        if (matchingVariation) {
            const variationDetails = matchingVariation.split(',');

            document.getElementById(`currentPrice${key}`).textContent = variationDetails[2];
            document.getElementById(`price${key}`).value = variationDetails[2];
            document.getElementById(`priceNoTva${key}`).value = variationDetails[4];
            document.getElementById(`ean${key}`).value = variationDetails[6];
            document.getElementById(`currentName${key}`).value = variationDetails[3];
        }
    }
</script>
