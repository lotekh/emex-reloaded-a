@php
    $initialVariation = $product->variations->first();
    $initialPrice = $initialVariation->price ?? null;
    $initialPackaging = $initialVariation->quantity ?? null;
    $initialColor = $initialVariation->colour ?? null;
    $initialName = $initialVariation->name ?? null;
    $initialPriceNoTva = $initialVariation->price_no_tva ?? null;
    $initialIntaritor = $initialVariation->addon_text ?? null;
    $initialEan = $initialVariation->ean ?? null;
    $initial_q = 1;

    $ambalareValues = $product->variations->pluck('quantity')->unique();
    $colorsValues = $product->variations->pluck('colour')->unique();

    $rating_sum = $product->reviews->avg('rating') ?? 0;
@endphp

<div class="relative w-full col">
    <div class="product-list-item mb-16 col w-full">
        <div class="col flex-md">
            <div class="relative image-container z-0">
                <a href="{{ url($product->slug) }}">
                    <img src="{{ $product->featuredImage ? asset('storage/' . $product->featuredImage->path) : asset('images/default-placeholder.png') }}" alt="{{ $product->getImageAlt('category') }}" title="{{ $product->getImageTitle('category') }}">
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
                        <p class="value" id="price{{ $product->id }}">{{ $initialPrice }}</p>
                        <p class="value ml-4">Lei</p>
                    </div>
                @else
                    <div class="price mt-32 px-8">
                        <p class="unavailable">Pret indisponibil</p>
                    </div>
                @endif
                <div class="flex">
                    <div class="form-group">
                        <label for="packagingSelect{{ $product->id }}" class="section-info">Ambalare</label>
                        @if(!empty($ambalareValues))
                            <select id="packagingSelect{{ $product->id }}" name="ambalare" class="mr-8">
                                @foreach($ambalareValues as $value)
                                    <option value="{{ $value }}" data-variation="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="form-group mr-8">
                        <label class="section-info" for="colorSelect{{ $product->id }}">Culoare</label>
                        @if(!empty($colorsValues))
                            <select id="colorSelect{{ $product->id }}" name="color">
                                @foreach($colorsValues as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <div class="form-group quantity-form-group">
                        <label class="section-info">Cantitate</label>
                        <input class="w-full pr-8" type="number" min="0" pattern="[0-9]+" name="quantity" value="{{ $initial_q }}" id="quantityInput{{ $product->id }}" />
                    </div>
                </div>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="submited" value="1">
                <input type="hidden" name="name" value="{{ $initialName }}">
                <input type="hidden" name="price" id="priceInput{{ $product->id }}" value="{{ $initialPrice }}">
                <input type="hidden" name="price_no_tva" value="{{ $initialPriceNoTva }}">
                <input type="hidden" name="ean" value="{{ $initialEan }}">
                <input type="hidden" name="addon_quantity" value="{{ $initialIntaritor }}">

            </div>
            <div class="col justify-center">
                <div class="col justify-end gap-md align-center p-16">
                    <form action="{{ route('wishlist.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-blue-outline rounded-xl">Scoate din wishlist</button>
                    </form>
                    <a href="{{ url($product->slug) }}">
                        <button type="button" class="btn btn-blue-outline rounded-xl" aria-label="Vezi produs">Vezi produsul</button>
                    </a>
                    <button class="btn btn-blue rounded-xl" onclick="addToCart({{ $product->id }})">Adauga in cos</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const packagingSelect = document.getElementById('packagingSelect{{ $product->id }}');
    const colorSelect = document.getElementById('colorSelect{{ $product->id }}');
    const priceDisplay = document.getElementById('price{{ $product->id }}');
    const priceInput = document.getElementById('priceInput{{ $product->id }}');

    function updateVariation() {
        const productId = {{ $product->id }};
        const selectedPackaging = packagingSelect.value;
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
            } else {
                console.error('Error:', data.error);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }

    packagingSelect.addEventListener('change', updateVariation);
    colorSelect.addEventListener('change', updateVariation);
});
</script>
