@php
    $initialPrice = $product->variations['initials']['price'];
    $initialPackaging = $product->variations['initials']['packaging'];
    $initialColor = $product->variations['initials']['color'];
    $initialName = $product->variations['initials']['name'];
    $initialPriceNoTva = $product->variations['initials']['price_no_tva'];
    $initialIntaritor = $product->variations['initials']['intaritor'];
    $initialEan = $product->variations['initials']['ean'];
    $initial_q = 1;

    $parsedFullData = $product->variations['parsedData'];

    $ambalareValues = $product->variations['cantitati'] ?? [];
    $colorsValues = $product->variations['colors'] ?? [];

    $rating_sum = 0;
    if (!empty($product->reviews)) {
        $rating_sum = array_reduce($product->reviews, function($carry, $item) {
            return $carry + $item['rating'];
        }, 0) / count($product->reviews);
    }
@endphp

<form class="relative w-full col" method="GET" action="{{ url('/order-product') }}">
    <div class="product-list-item mb-16 col w-full">
        <div class="col flex-md">
            <div class="relative image-container z-0">
                <a href="{{ url($product->slug) }}">
                    <img src="{{ $product->getCategoryWebpUrl() }}" alt="{{ $product->getImageAlt('category') }}" title="{{ $product->getImageTitle('category') }}">
                </a>
            </div>
            <div class="col w-full justify-between form-container">
                <div class="col">
                    <h5 class="m-0 mt-16 mb-8">{{ $product->plain_name }}</h5>
                    @unless($hideRating)
                        <div class="flex rating mb-16 align-center">
                            @for($i = 0; $i < 5; $i++)
                                <div>
                                    @if($i + 1 <= $rating_sum)
                                        <img width="18" height="18" src="{{ asset('resources/new_design/icons/gold-star.svg') }}" title="review-star" alt="review-star">
                                    @else
                                        <img width="18" height="18" src="{{ asset('resources/new_design/icons/dark-star.svg') }}" title="review-star" alt="review-star">
                                    @endif
                                </div>
                            @endfor
                            <p class="ml-8 flex">
                                <span class="font-700">{{ number_format($rating_sum, 1) }}</span> ({{ count($product->reviews) }})
                            </p>
                        </div>
                    @endunless
                </div>
                @if(!empty($initialPrice))
                    <div class="price row mb-16 flex align-center">
                        <p class="mr-4">Pret:</p>
                        <p class="value">{{ $initialPrice }}</p>
                        <p class="value ml-4">Lei</p>
                    </div>
                @else
                    <div class="price mt-32 px-8">
                        <p class="unavailable">Pret indisponibil</p>
                    </div>
                @endif
                <div class="flex">
                    <div class="form-group">
                        <label for="ambalare" class="section-info">Ambalare</label>
                        @if(!empty($ambalareValues))
                            <select id="ambalare" name="ambalare" class="mr-8">
                                @foreach($ambalareValues as $value)
                                    <option value="{{ $value }}" {{ $initialPackaging == $value ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="form-group mr-8">
                        <label class="section-info" for="culoare">Culoare</label>
                        @if(!empty($colorsValues))
                            <select id="culoare" name="color">
                                @foreach($colorsValues as $value)
                                    <option value="{{ $value }}" {{ $initialColor == $value ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <div class="form-group quantity-form-group">
                        <label class="section-info">Cantitate</label>
                        <input class="w-full pr-8" type="number" min="0" pattern="[0-9]+" name="quantity" value="{{ $initial_q }}" />
                    </div>
                </div>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="submited" value="1">
                <input type="hidden" name="name" value="{{ $initialName }}">
                <input type="hidden" name="price" value="{{ $initialPrice }}">
                <input type="hidden" name="price_no_tva" value="{{ $initialPriceNoTva }}">
                <input type="hidden" name="ean" value="{{ $initialEan }}">
                <input type="hidden" name="addon_quantity" value="{{ $initialIntaritor }}">

            </div>
            <div class="col justify-center">
                <div class="col justify-end gap-md align-center p-16">
                    <a href="{{ url('/remove-from-wishlist?product_id=' . $product->id) }}">
                        <button type="button" class="btn btn-blue-outline rounded-xl">Scoate din wishlist</button>
                    </a>
                    <a href="{{ url($product->slug) }}">
                        <button type="button" class="btn btn-blue-outline rounded-xl" aria-label="Vezi produs">Vezi produsul</button>
                    </a>
                    <input type="submit" class="btn btn-blue rounded-xl {{ empty($initialPrice) || $product->is_inactive ? 'btn-disabled' : '' }}" value="Adauga in cos" {{ empty($initialPrice) || $product->is_inactive ? 'disabled' : '' }}>
                </div>
            </div>
        </div>
    </div>
</form>
