@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/product.min.css') }}">
@endsection

@section('seo')
    <title>{{ $product->seo['title'] }}</title>
    @if($product->seo['meta_keywords'])
        <meta name="keywords" content="{{ $product->seo['meta_keywords'] }}">
    @endif

    @if($product->seo['meta_description'])
        <meta name="description" content="{{ $product->seo['meta_description'] }}">
    @endif

    @if($product->seo['fb_app_id'])
        <meta property="fb:app_id" content="{{ $product->seo['fb_app_id'] }}">
    @endif

    <meta property="og:locale" content="ro_RO">

    @if($product->seo['og_title'])
        <meta property="og:title" content="{{ $product->seo['og_title'] }}">
    @endif

    @if($product->seoOgImage)
        <meta property="og:image" content="{{ $product->seoOgImage ? $product->seoOgImage->url : '' }}">
    @endif

    @if($product->seoOgImage)
        <meta property="og:image:secure_url" content="{{ $product->seoOgImage ? $product->seoOgImage->url : '' }}" />
    @endif

    @if($product->seo['og_image_width'])
        <meta property="og:image:width" content="{{ $product->seo['og_image_width'] }}" />
    @endif

    @if($product->seo['og_image_height'])
        <meta property="og:image:height" content="{{ $product->seo['og_image_height'] }}" />
    @endif

    @if($product->seo['og_image_alt'])
        <meta property="og:image:alt" content="{{ $product->seo['og_image_alt'] }}" />
    @endif

    @if($product->seo['og_description'])
        <meta property="og:description" content="{{ $product->seo['og_description'] }}">
    @endif

    @if($product->seo['og_url'])
        <meta property="og:url" content="{{ $product->seo['og_url'] }}">
    @endif

    @if($product->seo['og_site_name'])
        <meta property="og:site_name" content="{{ $product->seo['og_site_name'] }}">
    @endif

    @if($product->seo['og_type'])
        <meta property="og:type" content="{{ $product->seo['og_type'] }}" />
    @endif

    @if($product->seo['twitter_card'])
        <meta name="twitter:card" content="{{ $product->seo['twitter_card'] }}">
    @endif

    @if($product->seo['twitter_site'])
        <meta name="twitter:site" content="{{ $product->seo['twitter_site'] }}">
    @endif

    @if($product->seoTwitterImage)
        <meta name="twitter:image" content="{{ $product->seoTwitterImage ? $product->seoTwitterImage->url : '' }}">
    @endif

    @if($product->seo['twitter_title'])
        <meta name="twitter:title" content="{{ $product->seo['twitter_title'] }}">
    @endif

    @if($product->seo['twitter_description'])
        <meta name="twitter:description" content="{{ $product->seo['twitter_description'] }}">
    @endif

    @if($product->seo['twitter_url'])
        <meta name="twitter:url" content="{{ $product->seo['twitter_url'] }}">
    @endif
@endsection

@section('breadcrumbs')
<div class="flex gap-xs"><div><a href="/produse">Produse</a></div><div class="separator">/</div><div class="-ml-4"><a href="{{$categories_products->unique('id')->first()->slug}}">{{$categories_products->unique('id')->first()->name}}</a></div><div class="separator">/</div><div class="-ml-4 ellipsis">{{ html_entity_decode($product->sub_title) }}</div></div>
@endsection

@section('content')
@php
    $averageRating = $product->reviews->avg('rating') ?? 5;
    $reviewCount = ($product->reviews->count() === 0) ? 1 : $product->reviews->count();
    $variations = $product->variations;
    $initialVariation = $variations->first();
    $baseUrl = url('/');
@endphp

<div class="main-container product-page" id="product_container">

    <h1 class="mobile-title mt-32">{!! $product->name !!}</h1>

    <div class="w-full product-info-grid">
        <div class="col" id="imagine-produs-3">
            <div class="w-full h-full relative img-container" id="imagine-produs-2">
                @php
                    $largeImageUrl = $product->largeImage ? asset('storage/' .$product->largeImage->path) : $baseUrl . '/images/default-placeholder.png';
                    $pngLargeImageUrl = $product->pngLargeImage ? asset('storage/' .$product->pngLargeImage->path) : $baseUrl . '/images/default-placeholder.png';
                @endphp

                <picture>
                    <source type="image/webp" srcset="{{ $largeImageUrl }}">
                    <img class="featured-image-1" id="imagine-produs" src="{{ $pngLargeImageUrl }}" alt="{{ $product->pngLargeImage ? $product->pngLargeImage->alt : ''}}" title="{{ $product->pngLargeImage ? $product->pngLargeImage->title : ''}}">
                </picture>
            </div>
        </div>
        
        <div class="w-full col px-8 product-details-container">
            <div class="col gap-xl">
                    <div class="top-container">
                        <div class="col justify-between">
                            <div>
                                <h2 class="subtitle" id="product-subtitle">{{ html_entity_decode($product->sub_title) }}</h2>
                                <div id="product_categories" class="row align-center">
                                    <p class="space-xl">Categorii: </p>
                                    @php
                                        $uniqueCategories = $categories_products->unique('id');
                                    @endphp
                                    @foreach ($uniqueCategories as $category_product)
                                        <a class="font-sm" href="{{ url($category_product->slug) }}">
                                            {{ $category_product->name }}
                                        </a>
                                    @endforeach
                                </div>
                                
                            </div>

                            @if ($product->active)
                                <div class="col mt-8 blue-divider">
                                    @if (!empty($initialVariation->price))
                                        <div class="row items-baseline price-container">
                                            <p>
                                                <span class="font-700 text-red price-num" id="price{{ $product->id }}">{{ number_format($initialVariation->price, 2) }}</span>
                                                <span class="text-red ml-4">Lei&nbsp;/&nbsp;</span>
                                            </p>
                                            
                                            @if ($initialVariation->addon_text)
                                                <p class="mb-4">Pachet</p>
                                            @else
                                                <p class="section-info" id="pret_value">Bidon  
                                                    <span id="packaging{{ $product->id }}">
                                                        {{ fmod($initialVariation->quantity, 1) != 0 ? number_format($initialVariation->quantity, 2) : $initialVariation->quantity }}
                                                        {{ $initialVariation->measurementUnit->name }}
                                                    </span>
                                                </p>
                                            @endif
                                        </div>

                                        @if ($product->has_hardener)
                                            <div class="row items-baseline price-container">
                                                <p class="section-info text-blue-009">
                                                    Contine: 
                                                    @if (Str::contains(Str::lower($product->name), 'lac'))
                                                        Lac
                                                    @elseif (Str::contains(Str::lower($product->name), 'membran'))
                                                        Baza
                                                    @elseif (Str::contains(Str::lower($product->name), 'grund'))
                                                        Grund
                                                    @elseif (Str::contains(Str::lower($product->name), 'sapa'))
                                                        Sapa
                                                    @elseif(Str::contains(Str::lower($product->name), 'amors'))
                                                        Amorsa
                                                    @elseif (Str::contains(Str::lower($product->name), 'covor') || Str::contains(Str::lower($product->name), 'quartz'))
                                                        Cuartz
                                                    @else
                                                        Vopsea
                                                    @endif
                                                    <span id="product-quantity" class="text-blue-009">
                                                        {{ fmod($initialVariation->quantity, 1) == 0 ? $initialVariation->quantity : number_format($initialVariation->quantity, 2) }} 
                                                        {{ $initialVariation->measurementUnit->name }}
                                                    </span>
                                                    
                                                </p>
                                                
                                                
                                                <p class="section-info text-blue-009 ml-4">
                                                    <span id="addon-text">{{ $initialVariation->addon_text }}</span>
                                                </p>
                                                

                                            </div>
                                        @endif

                                        <p class="section-info tva-label tva-produs">Pret - inclusiv tva</p>
                                    @else
                                        <p class="section-info tva-label tva-produs" id="pret_pre">Produs indisponibil</p>
                                    @endif
                                </div>
                            @endif


                            <div class="col gap-md in-stoc-container mt-16">
                                @if ($product->active)
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
                                                <img src="{{ asset('resources/new_design/icons/gold-star.svg') }}" class="review-star-product" width="18" height="18" title="review-star" alt="review-star">
                                            </div>
                                        @else
                                            <div class="flex align-center">
                                                <img src="{{ asset('resources/new_design/icons/dark-star.svg') }}" class="review-star-product" width="18" height="18" title="review-star" alt="review-star">
                                            </div>
                                        @endif
                                    @endfor
                                    <p class="ml-8 font-sm text-blue-009">
                                        <span class="font-700 font-sm">{{ number_format($averageRating, 2) }}</span>
                                        ({{ $reviewCount }})
                                    </p>
                                </div>
                            </div>
                        </div>

                        @if ($product->active)
                            <div class="inputs-mt col gap-md">
                                @if ($product->variations->pluck('colour')->filter()->count())
                                    <div class="form-group">
                                        <label class="section-info" id="choose-color">Selecteaza culoare</label>
                                        <select form="adauga-in-cos" aria-labelledby="choose-color" class="w-full" name="color" id="colorSelect{{ $product->id }}">
                                            @foreach (array_unique($product->variations->pluck('colour')->filter()->toArray()) as $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif


                                @if ($product->variations->pluck('quantity')->filter()->count())
                                    <div class="form-group">
                                        <label class="section-info" id="choose-type">Selecteaza ambalare</label>
                                        <select form="adauga-in-cos" aria-labelledby="choose-type" class="w-full" name="ambalare" id="packagingSelect{{ $product->id }}">
                                            @foreach ($product->variations->unique('quantity') as $variation)
                                            <option value="{{ $variation->quantity }}">
                                                {{ fmod($variation->quantity, 1) != 0 ? number_format($variation->quantity, 2) : $variation->quantity }}
                                                {{ $variation->measurementUnit->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                    <input form="adauga-in-cos" type="hidden" name="product_variation_id" id="variationInput{{$product->id}}" value="{{ $initialVariation->id }}">
                                    <input form="adauga-in-cos" type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input form="adauga-in-cos" type="hidden" name="submited" value="1">
                                    <input form="adauga-in-cos" type="hidden" name="name" value="{{ $product->plain_name }}">
                                    <input form="adauga-in-cos" type="hidden" name="price" id="priceInput{{ $product->id }}" value="{{ $initialVariation->price }}">
                                    <input form="adauga-in-cos" type="hidden" name="price_no_tva" id="priceNoTvaInput" value="{{ $initialVariation->price_no_tva }}">
                                    <input form="adauga-in-cos" type="hidden" name="ean" id="eanInput" value="{{ $initialVariation->ean }}">
                                    <input form="adauga-in-cos" type="hidden" name="addon_quantity" id="addonQuantityInput" value="{{ $initialVariation->intaritor }}">
                                    
                                    <div class="form-group">
                                        <label id="choose-quantity" class="section-info">Selecteaza cantitate</label>
                                        <input form="adauga-in-cos" class="w-full" aria-labelledby="choose-quantity" min="1" type="number" name="quantity" value="1" />
                                    </div>
            
                            </div>
                        @endif
                    </div>

                <div class="col flex-md gap-xs w-full">
                    <form class="w-full" id="adauga-in-cos" method="GET" action="{{ url('/adauga-produs') }}">
                        <div class="w-full h-full">
                            <input type="submit" id="adauga_produs_submit" class="{{ empty($initialVariation->price) || !$product->active ? 'btn-disabled' : 'cursor-pointer' }} w-full h-full btn-blue font-sm rounded-sm" value="Adauga in cos" {{ empty($initialVariation->price) || !$product->active ? 'disabled' : '' }}>
                        </div>
                    </form>
                    <a href="{{ url('/produse-adaugate') }}" title="Cos" class="flex h-full">
                        <div class="btn-blue-outline rounded-sm text-nowrap w-full h-full flex justify-center align-center font-sm px-16 py-8 line-height-1">
                            Vizualizeaza cosul
                        </div>
                    </a>
                    
                    @php
                        // Verify if the product is in wishlist, no matter if the user is logged in or guest
                        $isInWishlist = app('App\Http\Controllers\WishlistController')->isInWishlist($product->id);
                    @endphp

                    <form id="wishlist-form-{{ $product->id }}" action="{{ $isInWishlist ? route('wishlist.remove', ['product_id' => $product->id]) : route('wishlist.store') }}" method="POST">
                        @csrfWithoutAutocomplete
                        @if (!$isInWishlist)
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        @endif

                        <button type="submit" class="flex align-center btn-blue-outline rounded-sm text-nowrap w-full gap-md justify-center h-full font-sm px-16 py-4">
                            <span class="addToWhislistSvgWrapper">
                                @if ($isInWishlist)
                                    <img width="16" height="15" src="{{ asset('resources/new_design/icons/star-fill.svg') }}" title="wishlist" alt="wishlist">
                                @else
                                    <img width="16" height="15" src="{{ asset('resources/new_design/icons/star.svg') }}" title="wishlist" alt="wishlist">
                                @endif
                            </span>
                            <span>{{ $isInWishlist ? 'Elimină din favorite' : 'Adaugă la favorite' }}</span>
                        </button>
                    </form>
                 
                </div>
            </div>

            <div class="col">
                <p class="text-center mt-16">
                    @if ($product->price_disclaimer)
                        {!! $product->price_disclaimer !!}
                    @else
                        Preturi pentru culorile standard, din lista. <em class="mp-ral">Alte nuante se produc doar pe comanda</em>, in max. 3 zile de la lansarea comenzii ferme. Pretul acestora va diferi, in functie de nuanta.
                    @endif
                </p>

                @php
                    $technicalFilePath = $product->technicalFile ? $product->technicalFile->path : null;
                    $featuredFileUrl = asset('storage/' . $technicalFilePath);
                @endphp
                <div id="product_extras_icons" class="icons-grid gap-md mt-16">
                    @if ($product->has_technical_file == 1)
                        <a class="icon" href="{{$featuredFileUrl}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="#1071ff" id="fisa" viewBox="0 0 19.18 24">
                                <path d="M13.75.71v4.61s4.51.05 4.65 0 0 17.97 0 17.97H.71V.71h13.03l4.65 4.61" fill="none" stroke-width="1.43"></path>
                                <path d="M9.56 14.36c-3.68.86-5.85 2.13-6.28 2.99s-.22 1.91 1.29.86C6.08 17.17 8.9 11.4 9.56 6.88c.22-1.48-1.51-2.34-1.51-.43 0 2.56 1.29 7.24 6.5 8.77 1.95.43 2.17-1.48 0-1.48s-4.99.61-4.99.61Z" fill="none" stroke-width="1.03"></path>
                            </svg>
                            <p>Fisa Tehnica</p>
                        </a>
                    @endif
                    @if ($product->has_calculus == 1)
                        <a class="icon" href="{{ url($product->consumption_slug) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.66 23.98" fill="#1071ff" width="20" height="20">
                                <path d="M15.83 3.6H3.82V6h12.01V3.6ZM3.82 8.39h2.4v2.4h-2.4v-2.4Zm2.4 4.8h-2.4v2.4h2.4v-2.4Zm-2.4 4.8h2.4v2.4h-2.4v-2.4Zm7.2-9.59h-2.4v2.4h2.4V8.4Zm-2.4 4.8h2.4v2.4h-2.4v-2.4Zm2.4 4.8h-2.4v2.4h2.4V18Zm2.4-9.59h2.4v2.4h-2.4v-2.4Zm2.4 4.8h-2.4v7.19h2.4v-7.19Z"></path>
                                <path d="M0 2.18C0 .97.97 0 2.19 0h15.29c1.2 0 2.19.97 2.19 2.18V21.8c0 1.2-.97 2.18-2.19 2.18H2.19C.99 23.98 0 23.01 0 21.8V2.18Zm2.19 0h15.29V21.8H2.19V2.18Z" fill-rule="evenodd"></path>
                            </svg>
                            <p>Calcul Consum</p>
                        </a>
                    @endif
                    @if ($product->has_instructions == 1)
                        <a class="icon" href="{{ url($product->application_slug) }}">                       
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.92 23.97" fill="#1071ff" width="20" height="20">
                                <path d="M14.4 23.97H0V0h19.92v18.43l-5.52 5.54ZM2.04 21.92H12V15.9h6V1.93H2.04v2.05H18v1.93H2.04v16.02Zm12-3.97v3.61l3.6-3.61h-3.6Zm-5.04 0H4.08V15.9h5.04v2.05H9Zm7.08-3.97h-12v-2.05h12v2.05Zm-2.04-3.97H4.08V7.96h9.96v2.05Z"></path>
                            </svg>
                            <p>Instructiuni</p>
                        </a>
                    @endif
                    @if ($product->has_palette == 1)
                        <a class="icon" href="{{ $product->getPaletaCuloriUrl() }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.9 23.9" fill="#1071ff" width="20" height="20">
                                <path d="M8.41 14.15H.2c-.13-.72-.2-1.45-.2-2.2 0-1.82.41-3.54 1.14-5.08l7.28 7.28ZM18.73 2.1l-5.76 5.76h10.22c-.86-2.35-2.43-4.36-4.46-5.76Zm4.97 7.65h-8.21l7.28 7.28c.73-1.54 1.14-3.26 1.14-5.08 0-.75-.07-1.48-.2-2.2ZM2.1 5.17l5.76 5.76V.72C5.51 1.58 3.5 3.15 2.1 5.18Zm4.77 17.59c1.54.73 3.26 1.14 5.08 1.14.75 0 1.48-.07 2.2-.2v-8.21l-7.28 7.28Zm9.17-9.8v10.22c2.35-.86 4.36-2.43 5.76-4.46l-5.76-5.76ZM.72 16.04c.86 2.35 2.43 4.36 4.46 5.76l5.76-5.76H.72ZM11.95 0c-.75 0-1.48.07-2.2.2v8.21l7.28-7.28C15.44.39 13.71 0 11.95 0Z"></path>
                            </svg>
                            <p>Paleta Culori</p>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mt-16 mt-custom">
        <div class="tabs-selector-row">
            <button type="button" name="current_tab" value="0" role="tab" class="btn user-valid valid {{ $activeTab == 'Descriere' ? 'selected' : '' }}" aria-selected="{{ $activeTab == 'Descriere' ? 'true' : 'false' }}" tabindex="0" onclick="openTab(event, 'Descriere')"><span>Descriere</span></button>
            <button type="button" name="current_tab" value="1" role="tab" class="btn user-valid valid {{ $activeTab == 'DetaliiUtilizare' ? 'selected' : '' }}" aria-selected="{{ $activeTab == 'DetaliiUtilizare' ? 'true' : 'false' }}" tabindex="0" onclick="openTab(event, 'DetaliiUtilizare')"><span>Detalii de utilizare</span></button>
            <button type="button" name="current_tab" value="2" role="tab" class="btn user-valid valid {{ $activeTab == 'CaracteristiciTehnice' ? 'selected' : '' }}" aria-selected="{{ $activeTab == 'CaracteristiciTehnice' ? 'true' : 'false' }}" tabindex="0" onclick="openTab(event, 'CaracteristiciTehnice')"><span>Caracteristici Tehnice</span></button>
        </div>

        <div class="tab-content-container">
            <div id="Descriere" class="tab-content {{ $activeTab == 'Descriere' ? 'active' : '' }}">
                @php
                    $description = str_replace(
                                        ['<amp-img', '</amp-img>', 'layout="responsive"', 'fallback'], 
                                        ['<img', '', '', ''], 
                                        $product->description
                                    );
                @endphp 
                {!! Blade::render($description) !!}
                {{-- Descriere --}}
                
            </div>

            <div id="DetaliiUtilizare" class="tab-content {{ $activeTab == 'DetaliiUtilizare' ? 'active' : '' }}">
                {!! Blade::render(html_entity_decode($product->usage_details) ) !!}
                {{-- Detalii Utilizare --}}
            </div>

            <div id="CaracteristiciTehnice" class="tab-content {{ $activeTab == 'CaracteristiciTehnice' ? 'active' : '' }}">
                {!! Blade::render($product->technical_details ) !!}
                {{-- Caracteristici tehnice --}}
            </div>
        </div>
    </div>

    <div class="mt-16"> 
        <div class="cautari">Cautari similare</div>
        <div class="mt-8 grid grid-4 gap-xs">
            @if ($firstFourProducts && $firstFourProducts->count())
                @foreach ($firstFourProducts as $ind => $similar_product)
                    <div>
                        @include('components.product-card', ['key' => $ind, 'product' => $similar_product])
                    </div>
                @endforeach
            @endif          
        </div>
    </div> 

    <div class="w-full grid grid-3 min-row-height gap-lg mt-16" id="pwgw">
        <div class="badge">
            <div class="relative w-full h-full">
                <div class="produs-logo">
                    <img width="363" height="68" src="{{ asset('resources/images/Fabricat-in-Romania.png') }}" alt="Produs fabricat in Romania" title="Produs de fabricatie romaneasca">
                </div>
            </div>
        </div>
        <div class="badge">
            <div class="relative w-full h-full">
                <div class="produs-logo">
                    <img width="363" height="68" src="{{ asset('resources/images/iso.png') }}" alt="Romtehnochim asigura garantia calitatii" title="Emex - produse certificate ISO">
                </div>
            </div>
        </div>
        <div class="badge">
            <div class="produs-logo">
                <a class="excelent-img col justify-center" href="https://excellent-sme-plus-romania.safesigned.com/romtehnochim-srl/" title="Certificat excelenta in afaceri">
                    <img width="363" height="68" src="{{ asset('resources/general/Romtehnochim-certificat-de-excelenta.png') }}" alt="Verificare certificat Coface Camera de Comert" title="Certificat excelenta in afaceri">
                </a>
            </div>
        </div>
    </div>
</div>

<div id="global-lightbox-video" class="lightbox hidden">
    <div class="lightbox-content">
        <span class="close-btn" style=" background-image: url('{{ asset('resources/images/sprite.png') }}')" onclick="closeVideoLightbox()"></span>
        <video id="global-lightbox-video-element" controls>
            <source src="https://vopsele.xyz/videos/Pardoseala-covor-de-cuart-epoxidic.mp4" type="video/mp4">
            Browserul tău nu suportă elementul video.
        </video>
    </div>
</div>

@include('components.sidebar-contact', ['secondary_title' => $product->name ?? 'Produs necunoscut'])


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Logic for product variations
        const packagingSelect = document.getElementById('packagingSelect{{ $product->id }}');
        const colorSelect = document.getElementById('colorSelect{{ $product->id }}');
        const priceDisplay = document.getElementById('price{{ $product->id }}');
        const priceInput = document.getElementById('priceInput{{ $product->id }}');
        const variationInput = document.getElementById('variationInput{{ $product->id }}');
        const quantityDisplay = document.getElementById('product-quantity');
        const addonTextDisplay = document.getElementById('addon-text');
        const packagingDisplay = document.getElementById('packaging{{ $product->id }}');

        // Preload all product variations into JavaScript
        const variations = @json($product->variations);

        // If the product is available, update the variations
        function updateVariation() {
            if (!packagingSelect || !colorSelect || !variations.length) {
                console.warn('Variations, packaging, or color select not available.');
                return;
            }

            const selectedPackaging = packagingSelect.value;
            const selectedColor = colorSelect.value;

            // Find the right variation
            const variation = variations.find(variation => 
                variation.quantity == selectedPackaging && variation.colour == selectedColor
            );

            if (variation) {
                priceDisplay.textContent = variation.price.toFixed(2);
                priceInput.value = variation.price;
                variationInput.value = variation.id;
                if(variation.quantity % 1 != 0) {
                    variation.quantity = variation.quantity.toFixed(2);
                }
                if (quantityDisplay) {
                    quantityDisplay.textContent = variation.quantity + ' ' + variation.measurement_unit.name;
                }
                if (addonTextDisplay) {
                    addonTextDisplay.textContent = variation.addon_text ? variation.addon_text : "";
                }
                if (packagingDisplay){
                    packagingDisplay.textContent = variation.quantity + ' ' + variation.measurement_unit.name;
                }
            } else {
                console.error('No matching variation found.');
            }
        }

        if (packagingSelect) packagingSelect.addEventListener('change', updateVariation);
        if (colorSelect) colorSelect.addEventListener('change', updateVariation);

        // Logic for tabs
        const tabButtons = document.querySelectorAll(".tabs-selector-row .btn");
        const tabContents = document.querySelectorAll(".tab-content");

        const productId = "{{ $product->id }}";

        function saveTabSelection(tabName) {
            fetch("{{ route('saveTab') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ product_id: productId, tab: tabName })
            }).catch(error => console.error("Eroare salvare tab:", error));
        }

        // Change the active tab
        window.openTab = function (evt, tabName) {
            tabContents.forEach(tab => tab.classList.remove("active"));
            tabButtons.forEach(btn => {
                btn.classList.remove("selected");
                btn.setAttribute("aria-selected", "false");
            });

            const currentTab = document.getElementById(tabName);
            if (currentTab) {
                currentTab.classList.add("active");
                evt.currentTarget.classList.add("selected");
                evt.currentTarget.setAttribute("aria-selected", "true");

                saveTabSelection(tabName);
            } else {
                console.error(`Tab-ul ${tabName} nu a fost găsit.`);
            }
        };

        tabContents.forEach(tab => {
            tab.classList.toggle("active", tab.id === activeTab);
        });

        tabButtons.forEach(button => {
            const tabName = button.getAttribute('onclick').match(/'([^']+)'/)[1];
            const isSelected = tabName === activeTab;
            button.classList.toggle("selected", isSelected);
            button.setAttribute("aria-selected", isSelected ? "true" : "false");
        });

        // Video Lightbox logic
        var videoLinks = document.querySelectorAll('a[href$=".mp4"]');
        videoLinks.forEach(function (link) {
            link.addEventListener("click", function (event) {
                event.preventDefault();
                var videoUrl = link.getAttribute("href");
                openLightboxWithVideo(videoUrl);
            });

            link.classList.add("cursor-pointer");
        });

        function openLightboxWithVideo(videoUrl) {
            console.log(12);
            var lightbox = document.getElementById("global-lightbox-video");
            var videoElement = document.getElementById("global-lightbox-video-element");

            videoElement.src = videoUrl;
            videoElement.load(); 
            videoElement.play(); 

            // Show the lightbox
            lightbox.classList.remove("hidden");
        }
    });

    function closeVideoLightbox() {
        console.log(1);
        var lightbox = document.getElementById("global-lightbox-video");
        var videoElement = document.getElementById("global-lightbox-video-element");

        // Pause video and clear source when closing
        videoElement.pause();
        videoElement.src = "";

        // Hide the lightbox
        lightbox.classList.add("hidden");
    }
</script>


@endsection
