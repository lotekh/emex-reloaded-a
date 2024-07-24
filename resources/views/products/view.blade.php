@extends('layout.layout')

@section('content')
@php
    $averageRating = $product->reviews->avg('rating') ?? 0;
    $reviewCount = $product->reviews->count() ?? 0;
    $variations = $product->variations;
    $initialVariation = $variations->first();
    $baseUrl = url('/');
@endphp

<div class="main-container product-page" id="product_container">
    <h1 class="mobile-title mt-32">{!! $product->name !!}</h1>
    <div class="w-full product-info-grid">
        <div class="col">
            <div class="w-full h-full relative img-container" style="max-height:413.26px;">
                @php
                    $featuredImageUrl = $product->featuredImage ? asset('storage/' .$product->featuredImage->path) : $baseUrl . '/images/default-placeholder.png';
                @endphp

                <img class="contain" src="{{ $featuredImageUrl }}" alt="imagine" title="imagineprodus"  style="max-height:413.26px;">
            </div>
        </div>

        <form method="GET" class="w-full col px-8 product-details-container" action="{{ url('/order-product') }}">
            <div class="col gap-xl">
                <div class="top-container">
                    <div class="col justify-between">
                        <div>
                            <h2 class="subtitle">{{ $product->sub_title }}</h2>
                            <div id="product_categories" class="row align-center">
                                <p class="space-xl">Categorii: </p>
                                @foreach ($categories_products as $category_product)
                                    <a class="font-sm" href="{{ url($category_product->slug) }}">
                                        {{ $category_product->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        @if (!$product->is_inactive)
                            <div class="col">
                                @if (!empty($initialVariation->price))
                                    <div class="row items-baseline price-container">
                                        <p>
                                            <span class="font-700 text-red price-num" id="price{{ $product->id }}">{{ $initialVariation->price }}</span>
                                            <span class="text-red">Lei&nbsp;/&nbsp;</span>
                                        </p>
                                        <p class="section-info" id="pret_value">Bidon <span id="packaging{{ $product->id }}">{{ $initialVariation->quantity }}</span></p>
                                    </div>
                                    <p class="section-info tva-label">Pret - inclusiv tva</p>
                                @else
                                    <p class="section-info tva-label" id="pret_pre">Produs indisponibil</p>
                                @endif
                            </div>
                        @endif

                        <div class="col gap-md in-stoc-container mt-16">
                            @if (!$product->is_inactive)
                                <div class="in-stoc">
                                    <div class="flex align-center">
                                        <img src="{{ asset('resources/new_design/icons/check-mark.svg') }}" alt="checkmark-icon" title="checkmark-icon" width="24" height="24">
                                    </div>
                                    <p>In stoc</p>
                                </div>
                            @else
                                <div class="in-stoc not">
                                    <div class="flex align-center">
                                        <img src="{{ asset('resources/new_design/icons/error-outline.svg') }}" alt="error-icon" title="error-icon" width="24" height="24">
                                    </div>
                                    <p>Indisponibil</p>
                                    Disponibil din data {{ $product->disponibil_din_data }}
                                </div>
                            @endif

                            <div class="row">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $averageRating)
                                        <div class="flex align-center">
                                            <img src="{{ asset('resources/new_design/icons/gold-star.svg') }}" width="18" height="18" title="review-star" alt="review-star">
                                        </div>
                                    @else
                                        <div class="flex align-center">
                                            <img src="{{ asset('resources/new_design/icons/dark-star.svg') }}" width="18" height="18" title="review-star" alt="review-star">
                                        </div>
                                    @endif
                                @endfor
                                <p class="ml-8 font-sm">
                                    <span class="font-700 font-sm">{{ number_format($averageRating, 2) }}</span>
                                    ({{ $reviewCount }})
                                </p>
                            </div>
                        </div>
                    </div>

                    @if (!$product->is_inactive)
                        <div class="inputs-mt col gap-md">
                            @if ($product->variations->pluck('colour')->filter()->count())
                                <div class="form-group">
                                    <label class="section-info" id="choose-color">Selecteaza culoare</label>
                                    <select aria-labelledby="choose-color" class="w-full" name="color" id="colorSelect{{ $product->id }}">
                                        @foreach ($product->variations->pluck('colour')->filter() as $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            @if ($product->variations->pluck('quantity')->filter()->count())
                                <div class="form-group">
                                    <label class="section-info" id="choose-type">Selecteaza ambalare</label>
                                    <select aria-labelledby="choose-type" class="w-full" name="ambalare" id="packagingSelect{{ $product->id }}">
                                        @foreach ($product->variations->pluck('quantity')->filter()->unique() as $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="form-group">
                                <label id="choose-quantity" class="section-info">Selecteaza cantitate</label>
                                <input class="w-full" aria-labelledby="choose-quantity" min="1" pattern="[0-9]+" type="number" name="quantity" value="1" />
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col flex-md gap-xs w-full">
                    <div class="w-full h-full">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="submited" value="1">
                        <input type="hidden" name="name" value="{{ $product->plain_name }}">
                        <input type="hidden" name="price" id="priceInput{{ $product->id }}" value="{{ $initialVariation->price }}">
                        <input type="hidden" name="price_no_tva" id="priceNoTvaInput" value="{{ $initialVariation->price_no_tva }}">
                        <input type="hidden" name="ean" id="eanInput" value="{{ $initialVariation->ean }}">
                        <input type="hidden" name="addon_quantity" id="addonQuantityInput" value="{{ $initialVariation->intaritor }}">
                        <input type="submit" id="bord" class="{{ empty($initialVariation->price) || $product->is_inactive ? 'btn-disabled' : 'cursor-pointer' }} w-full h-full btn-blue font-sm rounded-sm" value="Adauga in cos" {{ empty($initialVariation->price) || $product->is_inactive ? 'disabled' : '' }}>
                    </div>

                    <a href="{{ url('/produse-adaugate') }}" title="Cos" class="flex h-full">
                        <div class="btn-blue-outline rounded-sm text-nowrap w-full h-full flex justify-center align-center font-sm px-16 py-8 line-height-1">
                            Vizualizeaza cosul
                        </div>
                    </a>
                    <a href="{{ url('/add-to-wishlist?product_id=' . $product->id) }}" title="Adauga la favorite">
                        <div class="flex align-center btn-blue-outline rounded-sm text-nowrap w-full gap-md justify-center h-full font-sm px-16 py-4">
                            <div class="addToWhislistSvgWrapper">
                                @if ($product->isInWishlist)
                                    <img width="16" height="15" src="{{ asset('resources/new_design/icons/star-fill.svg') }}" title="review-star" alt="review-star">
                                @else
                                    <img width="16" height="15" src="{{ asset('resources/new_design/icons/star.svg') }}" title="review-star" alt="review-star">
                                @endif
                            </div>
                            <span>Adauga la favorite</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col">
                <p class="text-center mt-16">
                    @if ($product->price_disclaimer)
                        {{ $product->price_disclaimer }}
                    @else
                        Preturi pentru culorile standard, din lista. <em class="mp-ral">Alte nuante se produc doar pe comanda</em>, in max. 3 zile de la lansarea comenzii ferme. Pretul acestora va diferi, in functie de nuanta.
                    @endif
                </p>

                <div id="product_extras_icons" class="icons-grid gap-md mt-16">
                    @if ($product->has_fisa == 1)
                        <a class="icon" href="{{ $product->getFisaTehnicaUrl() }}">
                            <svg id="pdf" xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="#1071ff" id="fisa" viewBox="0 0 19.18 24">
                                <path d="M13.75.71v4.61s4.51.05 4.65 0 0 17.97 0 17.97H.71V.71h13.03l4.65 4.61" fill="none" stroke-width="1.43"></path>
                                <path d="M9.56 14.36c-3.68.86-5.85 2.13-6.28 2.99s-.22 1.91 1.29.86C6.08 17.17 8.9 11.4 9.56 6.88c.22-1.48-1.51-2.34-1.51-.43 0 2.56 1.29 7.24 6.5 8.77 1.95.43 2.17-1.48 0-1.48s-4.99.61-4.99.61Z" fill="none" stroke-width="1.03"></path>
                            </svg>
                            <p>Fisa Tehnica</p>
                        </a>
                    @endif
                    @if ($product->has_calcul == 1)
                        <a class="icon" href="{{ url($product->consum_link) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.66 23.98" fill="#1071ff" width="20" height="20">
                                <path d="M15.83 3.6H3.82V6h12.01V3.6ZM3.82 8.39h2.4v2.4h-2.4v-2.4Zm2.4 4.8h-2.4v2.4h2.4v-2.4Zm-2.4 4.8h2.4v2.4h-2.4v-2.4Zm7.2-9.59h-2.4v2.4h2.4V8.4Zm-2.4 4.8h2.4v2.4h-2.4v-2.4Zm2.4 4.8h-2.4v2.4h2.4V18Zm2.4-9.59h2.4v2.4h-2.4v-2.4Zm2.4 4.8h-2.4v7.19h2.4v-7.19Z"></path>
                                <path d="M0 2.18C0 .97.97 0 2.19 0h15.29c1.2 0 2.19.97 2.19 2.18V21.8c0 1.2-.97 2.18-2.19 2.18H2.19C.99 23.98 0 23.01 0 21.8V2.18Zm2.19 0h15.29V21.8H2.19V2.18Z" fill-rule="evenodd"></path>
                            </svg>
                            <p>Calcul Consum</p>
                        </a>
                    @endif
                    @if ($product->has_instructiuni == 1)
                        <a class="icon" href="{{ $product->getAplicareUrl() }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.92 23.97" fill="#1071ff" width="20" height="20">
                                <path d="M14.4 23.97H0V0h19.92v18.43l-5.52 5.54ZM2.04 21.92H12V15.9h6V1.93H2.04v2.05H18v1.93H2.04v16.02Zm12-3.97v3.61l3.6-3.61h-3.6Zm-5.04 0H4.08V15.9h5.04v2.05H9Zm7.08-3.97h-12v-2.05h12v2.05Zm-2.04-3.97H4.08V7.96h9.96v2.05Z"></path>
                            </svg>
                            <p>Instructiuni</p>
                        </a>
                    @endif
                    @if ($product->has_paleta == 1)
                        <a class="icon" href="{{ $product->getPaletaCuloriUrl() }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.9 23.9" fill="#1071ff" width="20" height="20">
                                <path d="M8.41 14.15H.2c-.13-.72-.2-1.45-.2-2.2 0-1.82.41-3.54 1.14-5.08l7.28 7.28ZM18.73 2.1l-5.76 5.76h10.22c-.86-2.35-2.43-4.36-4.46-5.76Zm4.97 7.65h-8.21l7.28 7.28c.73-1.54 1.14-3.26 1.14-5.08 0-.75-.07-1.48-.2-2.2ZM2.1 5.17l5.76 5.76V.72C5.51 1.58 3.5 3.15 2.1 5.18Zm4.77 17.59c1.54.73 3.26 1.14 5.08 1.14.75 0 1.48-.07 2.2-.2v-8.21l-7.28 7.28Zm9.17-9.8v10.22c2.35-.86 4.36-2.43 5.76-4.46l-5.76-5.76ZM.72 16.04c.86 2.35 2.43 4.36 4.46 5.76l5.76-5.76H.72ZM11.95 0c-.75 0-1.48.07-2.2.2v8.21l7.28-7.28C15.44.39 13.71 0 11.95 0Z"></path>
                            </svg>
                            <p>Paleta Culori</p>
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <div class="mt-16 mt-custom">
        <div class="tabs">
            <button class="tablink" onclick="openTab(event, 'Descriere')">Descriere</button>
            <button class="tablink" onclick="openTab(event, 'DetaliiUtilizare')">Detalii de utilizare</button>
            <button class="tablink" onclick="openTab(event, 'CaracteristiciTehnice')">Caracteristici Tehnice</button>
        </div>

        <div id="Descriere" class="tabcontent">
            {!! $product->descriere !!}
        </div>

        <div id="DetaliiUtilizare" class="tabcontent">
            {!! $product->detalii_utilizare !!}
        </div>

        <div id="CaracteristiciTehnice" class="tabcontent">
            {!! $product->caracteristici_tehnice !!}
        </div>
    </div>

    <div class="mt-16">
        <div class="cautari">Cautari similare</div>
        <div class="mt-8 grid grid-4 gap-xs">
            @if ($product->similar_products && $product->similar_products->count())
                @foreach ($product->similar_products as $ind => $similar_product)
                    <div>
                        @include('widgets.product_card', ['key' => $ind, 'product' => $similar_product])
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="w-full grid grid-3 min-row-height gap-lg mt-16" id="pwgw">
        <div class="badge">
            <div class="relative w-full h-full">
                <img width="363" height="68" src="{{ asset('resources/images/Fabricat-in-Romania.png') }}" alt="Produs fabricat in Romania" title="Produs de fabricatie romaneasca">
            </div>
        </div>
        <div class="badge">
            <div class="relative w-full h-full">
                <img width="363" height="68" src="{{ asset('resources/images/iso.png') }}" alt="Romtehnochim asigura garantia calitatii" title="Emex - produse certificate ISO">
            </div>
        </div>
        <div class="badge">
            <a class="excelent-img col justify-center" href="https://excellent-sme-plus-romania.safesigned.com/romtehnochim-srl/" title="Certificat excelenta in afaceri">
                <img width="363" height="68" src="{{ asset('resources/general/Romtehnochim-certificat-de-excelenta.png') }}" alt="Verificare certificat Coface Camera de Comert" title="Certificat excelenta in afaceri">
            </a>
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
                // Update other fields if needed
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
@endsection
