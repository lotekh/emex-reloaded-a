@php
    // Hard-coded values for the example
    $initialPrice = "100.00";
    $initialPackaging = "1L";
    $initialColor = "Red";
    $initialName = "Vopsea Emex";
    $initialPriceNoTva = "84.03";
    $initialIntaritor = "Yes";
    $initialEan = "1234567890123";

    $rating_sum = 4.5;
    $countReviews = 10;

    $ambalareValues = ["1L", "5L", "10L"];
    $colorsValues = ["Red", "Blue", "Green"];

    $baseUrl = url('/');
@endphp

<div class="product-card" id="product-card-1">
  <!-- upper -->
  <div class="text-center">
    <a href="{{ url('/vopsea-emex') }}" title="Vopsea Emex">
      <h2 class="title">VOPSEA PROFESIONALA LAVABILA EXTERIOR “EMEX QT”</h2>
    </a>
  </div>

  <div>
    <div class="relative image">
      <form method="get" class="addToWishlistBt absolute z-10" id="product_wish_list_form1" action="{{ url('/add-to-wishlist') }}">
        @csrf
        <input type="hidden" name="product_id" value="1">
        <button type="submit" aria-label="Adauga la favorite">
          <img width="20" height="20" src="{{ $baseUrl }}/images/new_design/icons/star.svg" title="review-star" alt="review-star">
        </button>
      </form>
      <div class="absolute z-10 stoc-container">
        <div class="in-stoc">
          <div class="flex align-center">
            <img width="18" height="18" src="{{ $baseUrl }}/images/new_design/icons/check-mark.svg" alt="checkmark-icon" title="checkmark-icon">
          </div>
          <p>In stoc</p>
        </div>
      </div>

      <a href="{{ url('/vopsea-emex') }}" title="Vopsea Emex">
        <img src="{{ $baseUrl }}/images/new_design/images/vopsele-lavabile/Lavabila-exterior-cuartz-de-mare-duritate.webp" alt="Vopsea Emex" title="Vopsea Emex" width="300" height="300">
      </a>
    </div>

    <div class="w-full row align-center mb-8 product-rating-pl">
      @for ($i = 0; $i < 5; $i++)
        @if ($i + 1 <= $rating_sum)
          <div class="flex align-center">
            <img src="{{ $baseUrl }}/images/new_design/icons/gold-star.svg" title="review-star" alt="review-star" width="18" height="18">
          </div>
        @else
          <div class="flex align-center">
            <img src="{{ $baseUrl }}/images/new_design/icons/dark-star.svg" title="review-star" alt="review-star" width="18" height="18">
          </div>
        @endif
      @endfor
      <p class="ml-8 rating-text">
        <span class="font-700"> {{ number_format($rating_sum, 2, '.', '') }} </span>
        ({{ $countReviews }})
      </p>
    </div>

    <div class="w-full col justify-end">
      <div class="price row align-center product-price-pl">
        <p>
          <span>Pret:&nbsp;</span>
          <span class="value">{{ $initialPrice }}</span>
          <span class="value">Lei</span>
        </p>
      </div>

      <form class="relative w-full col" method="GET" action="{{ url('/order-product') }}">
        <input type="hidden" name="product_id" value="1">
        <input type="hidden" name="submited" value="1">
        <input type="hidden" name="name" value="{{ $initialName }}">
        <input type="hidden" name="price" value="{{ $initialPrice }}">
        <input type="hidden" name="price_no_tva" value="{{ $initialPriceNoTva }}">
        <input type="hidden" name="ean" value="{{ $initialEan }}">
        <input type="hidden" name="addon_quantity" value="{{ $initialIntaritor }}">
        <input type="hidden" name="quantity" value="1">
        <div class="row no-wrap w-full gap-xs">
          <div class="relative row w-full">
            <select aria-label="Ambalare" name="ambalare">
              @foreach ($ambalareValues as $value)
                <option value="{{ $value }}" {{ $value == $initialPackaging ? 'selected' : '' }}>
                  {{ $value }}
                </option>
              @endforeach
            </select>
            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="dropwdown-arrow">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M3.52876 5.52858C3.78911 5.26823 4.21122 5.26823 4.47157 5.52858L8.00016 9.05717L11.5288 5.52858C11.7891 5.26823 12.2112 5.26823 12.4716 5.52858C12.7319 5.78892 12.7319 6.21103 12.4716 6.47138L8.47157 10.4714C8.21122 10.7317 7.78911 10.7317 7.52876 10.4714L3.52876 6.47138C3.26841 6.21103 3.26841 5.78892 3.52876 5.52858Z" />
            </svg>
          </div>

          <div class="relative row w-full">
            <select aria-label="Culoare" name="color">
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
        </div>
        <input type="submit" class="mt-8 btn btn-blue rounded-sm" value="Adauga in cos">
      </form>
    </div>
  </div>
</div>
