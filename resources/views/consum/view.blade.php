@extends('layout.layout')

@section('seo')
    <title>{{ $product->consumption_seo['title'] }}</title>

    @if($product->consumption_seo['meta_keywords'])
        <meta name="keywords" content="{{ $product->consumption_seo['meta_keywords'] }}">
    @endif

    @if($product->consumption_seo['meta_description'])
        <meta name="description" content="{{ $product->consumption_seo['meta_description'] }}">
    @endif

    @if($product->consumption_seo['fb_app_id'])
        <meta property="fb:app_id" content="{{ $product->consumption_seo['fb_app_id'] }}">
    @endif

    <meta property="og:locale" content="ro_RO">

    @if($product->consumption_seo['og_title'])
        <meta property="og:title" content="{{ $product->consumption_seo['og_title'] }}">
    @endif

    @if($product->consumptionSeoOgImage)
        <meta property="og:image" content="{{ $product->consumptionSeoOgImage ? str_replace('https://', 'https://www.', $product->consumptionSeoOgImage->url)  : '' }}">
        <meta property="og:image:secure_url" content="{{ $product->consumptionSeoOgImage ? str_replace('https://', 'https://www.', $product->consumptionSeoOgImage->url)  : '' }}" />
    @endif

    @if($product->consumption_seo['og_image_width'])
        <meta property="og:image:width" content="{{ $product->consumption_seo['og_image_width'] }}" />
    @endif

    @if($product->consumption_seo['og_image_height'])
        <meta property="og:image:height" content="{{ $product->consumption_seo['og_image_height'] }}" />
    @endif

    @if($product->consumption_seo['og_image_alt'])
        <meta property="og:image:alt" content="{{ $product->consumption_seo['og_image_alt'] }}" />
    @endif

    @if($product->consumption_seo['og_description'])
        <meta property="og:description" content="{{ $product->consumption_seo['og_description'] }}">
    @endif

    @if($product->consumption_seo['og_url'])
        <meta property="og:url" content="{{ $product->consumption_seo['og_url'] }}">
    @endif

    @if($product->consumption_seo['og_site_name'])
        <meta property="og:site_name" content="{{ $product->consumption_seo['og_site_name'] }}">
    @endif

    @if($product->consumption_seo['og_type'])
        <meta property="og:type" content="{{ $product->consumption_seo['og_type'] }}" />
    @endif

    @if($product->consumption_seo['twitter_card'])
        <meta name="twitter:card" content="{{ $product->consumption_seo['twitter_card'] }}">
    @endif

    @if($product->consumption_seo['twitter_site'])
        <meta name="twitter:site" content="{{ $product->consumption_seo['twitter_site'] }}">
    @endif

    @if($product->consumptionSeoTwitterImage)
        <meta name="twitter:image" content="{{ str_replace('https://', 'https://www.', $product->consumptionSeoTwitterImage->url) }}">
    @endif

    @if($product->consumption_seo['twitter_title'])
        <meta name="twitter:title" content="{{ $product->consumption_seo['twitter_title'] }}">
    @endif

    @if($product->consumption_seo['twitter_description'])
        <meta name="twitter:description" content="{{ $product->consumption_seo['twitter_description'] }}">
    @endif

    @if($product->consumption_seo['twitter_url'])
        <meta name="twitter:url" content="{{ $product->consumption_seo['twitter_url'] }}">
    @endif
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="{{ url($category->slug) }}">{{ $category->name }}</a></li><li class="separator">/</li><li class="-ml-4"><a href="{{ url($product->slug) }}">{{ html_entity_decode($product->sub_title) }}</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Calcul consum</li></ul>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/consum.min.css') }}">
@endsection

@section('content')
    @php
        $baseUrl = url('/');
    @endphp
    <div class="main-container" id="consum-page">
        <div class="w-full flex justify-center mb-8">
            <h2 class="text-center dark-blue">CALCULATOR CONSUM {!! $product->name !!}</h2>
        </div>

        <div class="consum-container grid-cols-11">
            {{-- Left part --}}
            <div class="col-span-3">
                <div class="consum-product-image mb-16" id="div_img_consum">
                    @php
                        $smallImageUrl = $product->smallImage ? asset('storage/' .$product->smallImage->path) : $baseUrl . '/images/default-placeholder.png';
                        $pngSmallImageUrl = $product->pngSmallImage ? asset('storage/' .$product->pngSmallImage->path) : $baseUrl . '/images/default-placeholder.png';
                    @endphp
                    <picture>
                        <source type="image/webp" srcset="{{ $smallImageUrl }}"/>
                        <img loading="lazy" class="product-img img-responsive bordered m-16" src="{{ $pngSmallImageUrl }}" alt="{{ $product->smallImage ? $product->smallImage->alt : 'imagine'}}" title="{{ $product->smallImage ? $product->smallImage->title : 'imagineprodus'}}">
                    </picture>
                </div>

                    <div class="w-full" id="pwgw">
                        <div class="badge flex justify-center">
                            <div class="relative w-full">
                                <img loading="lazy" src="{{ asset('resources/images/Fabricat-in-Romania-cons.webp') }}" alt="Produs fabricat in Romania" title="Produs de fabricatie romaneasca" />
                            </div>
                        </div>
                        <div class="badge flex justify-center">
                            <div class="relative w-full">
                                <img loading="lazy" src="{{ asset('resources/images/ISO-consum.webp') }}" alt="Romtehnochim asigura garantia calitatii" title="Emex - produse certificate ISO" />
                            </div>
                        </div>
                        <div class="badge flex justify-center">
                            <a class="excelent-img col" href="https://excellent-sme-plus-romania.safesigned.com/romtehnochim-srl/" title="Certificat excelenta in afaceri">
                                <img loading="lazy" src="{{ asset('resources/images/excelenta-consum.webp') }}" alt="Verificare certificat Coface Camera de Comert" title="Certificat excelenta in afaceri">
                            </a>
                        </div>
                    </div>

                    <div class="hidden-xs mt-16 grey text-center bbdo btdo p-8 font-sm">
                        Imaginile prezentate pe site au doar caracter orientativ si nu atrag nici o obligativitate.
                        Acestea pot fi modificate in functie de legislatie, sau necesitatea imbunatatirii designului.
                    </div>
            </div>
                
            <div class="col-span-4">
                <input type="hidden" id="base_url" value="{{ url('/') }}">
                @if ($currentPage != 3)
                    <div class="steps clearfix mb-8">
                        <img loading="lazy" src="{{ url('resources/new_design/icons/consum.svg') }}" alt="consum">
                    </div>
                @endif

                <div class="steps_content">
                    <form action="{{ url($product->consumption_slug) }}" method="GET">
                        {{-- @csrfWithoutAutocomplete --}}
                        <input type="hidden" name="calculate" value="1">
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">

                        <div class="consum_content_step">
                            <div class="consum_form_group">
                                <div class="flex w-full mt-8 mb-8">
                                    <label class="titlu-tip-consum" for='product_select' id="step1_title">Tip Produs*</label>
                                </div>
                                <select class="form-control mb-16 select-consum" id="product_select" onchange="location = this.value;" required>
                                    @foreach ($category->products as $categoryProduct)
                                        @php
                                            // Replace <br> with space
                                            $productName = str_replace('<br>', ' ', $categoryProduct->category_page_title);
                                        @endphp
                                        @if(!empty($categoryProduct->consumption_slug))
                                            <option value="{{ route('consum.show', ['consumption_slug' => $categoryProduct->consumption_slug]) }}" {{ $product->id == $categoryProduct->id ? 'selected' : '' }}>
                                                {{ html_entity_decode(strip_tags($productName)) }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="consum_wizard_next_div">
                                <button type="button" tabindex="1" onclick="showNextStep(1)" class="btn btn-light-blue rounded-sm mb-16">INAINTE
                                    <img loading="lazy" src="{{ asset('resources/new_design/icons/chevron-right-w.svg') }}" alt="next">
                                </button>
                            </div>
                        </div>

                        <div class="consum_content_step">
                            <div class="consum_form_group">
                                <div class="flex justify-center w-full mt-8 mb-8">
                                    <label class="titlu-tip-consum" for='surface_type'>Tip Suprafata*</label>
                                </div>
                                <select id="surface_type" class="form-control mb-16 select-consum" name="{{ $consumData['suprafata_type_name'] }}" required>
                                    <option selected="selected" value="">Selecteaza...</option>
                                    @foreach ($consumData['suprafata_types'] as $suprafataType)
                                        <option value="{{ trim($suprafataType) }}">{{ trim($suprafataType) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex mb-32">
                                <button type="button" tabindex="1" onclick="showPreviousStep(0)" class="btn btn-light-blue rounded-sm mr-8">
                                    <img loading="lazy" class="icon-reversed" src="{{ asset('resources/new_design/icons/chevron-right-w.svg') }}" alt="next">
                                    INAPOI
                                </button>
                                <button type="button" tabindex="1" onclick="showNextStep(2)" class="btn btn-light-blue rounded-sm">INAINTE
                                    <img loading="lazy" src="{{ asset('resources/new_design/icons/chevron-right-w.svg') }}" alt="next">
                                </button>
                            </div>
                        </div>

                        <div class="consum_content_step">
                            <div class="consum_form_group">
                                <div class="flex justify-end w-full mt-8 mb-8">
                                    <label class="titlu-tip-consum" for='surface'>Suprafata in mp*</label>
                                </div>
                                <input type="number" min="0" id="surface" class="form-control mb-16 select-consum" name="{{ $consumData['suprafata_name'] }}" required>
                            </div>
                            <div class="flex mb-32">
                                <button type="button" tabindex="1" onclick="showPreviousStep(1)" class="btn btn-light-blue rounded-sm mb-16 mr-8">
                                    <img loading="lazy" class="icon-reversed" src="{{ asset('resources/new_design/icons/chevron-right-w.svg') }}" alt="next">
                                    INAPOI
                                </button>
                                <button type="submit" class="btn btn-light-blue rounded-sm mb-16">CALCULEAZA
                                    <img loading="lazy" src="{{ asset('resources/new_design/icons/chevron-right-w.svg') }}" alt="next">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="cr" class="{{ $currentPage == 3 ? 'flex' : 'hidden' }}">
                    @if (!empty($result))
                        {!! $result !!}
                    @else
                        <p>Nu există rezultate disponibile pentru această cerere.</p>
                    @endif

                    
                    <div class="consum-step4-box consum_content_step {{ $currentPage == 3 ? 'consum_content_step_active' : '' }}">
                        <p class="mt-16 titlu-tip-consum"><strong>Alege alt produs din gama:</strong></p>
                        <div class="consum_form_group">
                            <label for='product_select-consum' class="mb-8 titlu-tip-consum">Tip Produs*</label>
                            <select class="form-control mb-16 select-consum" id="product_select-consum" onchange="location = this.value;">
                                @foreach ($category->products as $categoryProduct)
                                @php
                                // Replace <br> with space
                                $productName = str_replace('<br>', ' ', $categoryProduct->category_page_title);
                                @endphp
                                    @if(!empty($categoryProduct->consumption_slug))
                                    <option value="{{ route('consum.show', ['consumption_slug' => $categoryProduct->consumption_slug]) }}" {{ $product->id == $categoryProduct->id ? 'selected' : '' }}>
                                        {{ html_entity_decode(strip_tags($productName)) }}
                                    </option>
                                    @else
                                        <option disabled>
                                            Product slug not available
                                        </option>
                                    @endif
                        
                                @endforeach
                            </select>
                        </div>
                        <div class="consum_wizard_next_div flex justify-center">
                            <button type="button" tabindex="0" class="btn btn-light-blue rounded-sm mb-16" onclick="showNextStep(1)">INAINTE
                                <img loading="lazy" src="{{ asset('resources/new_design/icons/chevron-right-w.svg') }}" alt="next">
                            </button>
                        </div>
                    </div>
                </div>

                

                <div class="text-center pad">Calculul este informativ si se refera la consumuri obtinute in conditii experimentale. Pregatirea suportului influenteaza semnificativ aceste consumuri. Nu sunt luate in considerare eventuale pierderi tehnologice sau accidentale, din timpul aplicarii.</div>
                <div class="flex mt-16 mb-16 atentie-consum-container">
                    <img loading="lazy" width="40" height="34" class="atentie-consum" src="{{ asset('resources/images/general/Atentie-mic.png') }}" alt="Atentie cantitate recomandata">
                    <span class="ml-8 red"><em class="green-mark">Cantitatea finala este conditionata si de ambalajul produsului. Nu se pot livra fractii</em>.</span>
                </div>
                <p>Pentru obtinerea unor rezultate optime consultati:<br>
                    <a class="dark-blue" href="{{ asset('storage/' . $product->technicalFile->path) }}" title="{{ html_entity_decode($product->sub_title) }}"> Fisa Tehnica a produsului: {{ html_entity_decode($product->sub_title) }}
                    </a>
                </p>
                <p class="pull-right i-icon mt-16" id="consum_bottom" style="display: flex; align-items: center; flex-wrap: wrap">
                    <img loading="lazy" width="44" height="40" src="{{ asset('resources/consum/Recomandari-icon.png') }}" alt="Relatii despre produs" class="mr-8">
                    Pentru recomandari,&nbsp;<a class="dark-blue" href="/contact" title="Contact Emex by Romtehnochim">contactati producatorul !</a>
                </p>
            </div>

            {{-- Right part --}}
            <div class="link_color1 col-span-4">
                {!! $product->consumption_details !!}
                <br>
                ... [<a href="https://emex.ro/{{ $product->slug }}">citeste mai mult</a>]
            </div>
        </div>

    </div>

    @include('components.sidebar-contact', ['secondary_title' => 'Consum'])

    <script>
        // Initialize currentPage with the value from server
        let currentPage = {{ $currentPage }}; 
     
        function showNextStep(nextPage) {
            if (currentPage === 1 && !validateSurfaceType()) {
                return; // Stop the execution if we have no surface type
            }
            currentPage = nextPage;
            updateStepVisibility();
        }
        
        function showPreviousStep(prevPage) {
            currentPage = prevPage;
            updateStepVisibility();
        }
        
        function updateStepVisibility() {
            document.querySelectorAll('.consum_content_step').forEach((element, index) => {
                if (index === currentPage) {
                    element.classList.add('consum_content_step_active');
                    if (currentPage === 3) {
                        document.getElementById('cr').classList.remove('hidden');
                        document.getElementById('cr').classList.add('consum_content_step_active');
                    }
                } else {
                    element.classList.remove('consum_content_step_active');
                }
            });
        }
        
        document.addEventListener('DOMContentLoaded', () => {
            updateStepVisibility(); 
        });

        function validateSurfaceType() {
            let surfaceType = document.getElementById("surface_type");
            let errorMsg = document.getElementById("surfaceTypeError");

            if (!errorMsg) {
                errorMsg = document.createElement("div");
                errorMsg.id = "surfaceTypeError";
                errorMsg.style.color = "red";
                errorMsg.style.fontSize = "14px";
                errorMsg.style.marginLeft = "5px";
                errorMsg.style.marginBottom = "10px";
                errorMsg.style.display = "none";
                errorMsg.innerText = "Nu ai selectat suprafața!";
                surfaceType.parentNode.appendChild(errorMsg);
            }

            if (surfaceType.value === "" || surfaceType.value.toLowerCase().includes("selecteaza")) {
                errorMsg.style.display = "block"; // Show the error message
                return false;
            } else {
                errorMsg.style.display = "none"; // Hide the error message
                surfaceType.classList.remove("border-red-500");
                return true;
            }
        }
     
    </script>

     

@endsection

