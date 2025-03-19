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
    
    $baseUrl = url('/');
    $smallImageUrl = $product->smallImage ? asset('storage/' . $product->smallImage->path) : $baseUrl . '/images/default-placeholder.png';
    $pngSmallImageUrl = $product->pngSmallImage ? asset('storage/' . $product->pngSmallImage->path) : $baseUrl . '/images/default-placeholder.png';

    // Calculate the average rating safely
    $rating_sum = $product->reviews->avg('rating') ?? 5;
    $reviewCount = ($product->reviews->count() === 0) ? 1 : $product->reviews->count();
@endphp

<form method="GET" action="{{ url('/adauga-produs') }}">
<div class="relative w-full col">
    <div class="product-list-item mb-16 col w-full">
        <div class="col flex-md">
            <div class="relative image-container z-0" style="text-align: center;">
                <a href="{{ url($product->slug) }}">
                    <picture>
                        <source type="image/webp" srcset="{{ $smallImageUrl }}"/>
                        <img style="height: 180px; max-width: 230px;" src="{{ $pngSmallImageUrl }}" alt="{{ $product->pngSmallImage ? $product->pngSmallImage->alt : 'imagine'}}" title="{{ $product->pngSmallImage ? $product->pngSmallImage->title : 'imagineprodus'}}">
                    </picture>
                </a>
            </div>
            <div class="col w-full justify-between form-container">
                <div class="col">
                    {{-- <h5 class="m-0 mt-16 mb-8">{{ html_entity_decode($product->plain_name) }}</h5> --}}
                    <h5 class="m-0 mt-16 mb-8 normal-weight">{{ \Illuminate\Support\Str::before(html_entity_decode($initialVariation->name), ' -') }}</h5>
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
                                <span class="font-700">{{ number_format($rating_sum, 1) }}</span> ({{ $reviewCount }})
                            </p>
                        </div>
                    @endunless
                </div>
                @if(!empty($initialPrice))
                    <div class="price row mb-16 flex align-center">
                        <p class="mr-4">Pret:</p>
                        <p class="value" id="priceDisplay{{ $product->id }}">{{ number_format($initialPrice, 2) }}</p>
                        <p class="value ml-4">Lei</p>
                    </div>
                @else
                    <div class="price mt-32 px-8">
                        <p class="unavailable">Pret indisponibil</p>
                    </div>
                @endif
                <div class="flex">
                    @if ($product->variations->pluck('quantity')->filter()->count())
                        <div class="form-group mr-8">
                            <label class="section-info" id="choose-type">Ambalare</label>
                            <select aria-labelledby="choose-type" class="w-full" name="ambalare" id="packagingSelect{{ $product->id }}">
                                @foreach ($product->variations->unique('quantity') as $variation)
                                    <option value="{{ $variation->quantity }}">
                                        {{ $variation->quantity }} {{ $variation->measurementUnit->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    
                    @if ($product->variations->pluck('colour')->filter()->count())
                        <div class="form-group mr-8">
                            <label class="section-info" id="choose-color">Culoare</label>
                            <select aria-labelledby="choose-color" class="w-full" name="color" id="colorSelect{{ $product->id }}">
                                @foreach (array_unique($product->variations->pluck('colour')->filter()->toArray()) as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="form-group quantity-form-group">
                        <label class="section-info">Cantitate</label>
                        <input class="w-full pr-8" type="number" min="0" pattern="[0-9]+" name="quantity" value="{{ $initial_q }}" />
                    </div>
                </div>

                <input type="hidden" name="product_variation_id" id="variationInput{{ $product->id }}" value="{{ $initialVariation->id }}">
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
                    {{-- <a href="{{ url('/remove-from-wishlist?product_id=' . $product->id) }}">
                        <button type="button" class="btn btn-blue-outline rounded-xl">Scoate din wishlist</button>
                    </a> --}}
                    <a href="{{ route('wishlist.removee', ['product_id' => $product->id]) }}">
                        <button type="button" class="btn btn-blue-outline rounded-xl">Scoate din wishlist</button>
                    </a>
                    <a href="{{ url($product->slug) }}">
                        <button type="button" class="btn btn-blue-outline rounded-xl" aria-label="Vezi produs">Vezi produsul</button>
                    </a>
                    <input type="submit" class="btn btn-blue rounded-xl {{ empty($initialPrice) || $product->is_inactive ? 'btn-disabled' : '' }}" style="font-size:13px;" value="Adauga in cos" {{ empty($initialPrice) || $product->is_inactive ? 'disabled' : '' }}>
                </div>
            </div>
        </div>
    </div>
</div>
</form>