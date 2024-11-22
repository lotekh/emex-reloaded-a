@extends('layout.layout')

@section('seo')
    <title>{{ $category->seo['title'] }}</title>
    <meta name="keywords" content="{{ $category->seo['meta_keywords'] }}">
    <meta name="description" content="{{ $category->seo['meta_description'] }}">
    <meta property="fb:app_id" content="{{ $category->seo['fb_app_id'] }}">
    <meta property="og:locale" content="ro_RO">
    <meta property="og:title" content="{{ $category->seo['og_title'] }}">
    <meta property="og:image" content="{{ $category->seoOgImage->url }}">
    <meta property="og:image:secure_url" content="{{ $category->seoOgImage->url }}" />
    <meta property="og:image:width" content="{{ $category->seo['og_image_width'] }}" />
    <meta property="og:image:height" content="{{ $category->seo['og_image_height'] }}" />
    <meta property="og:image:alt" content="{{ $category->seo['og_image_alt'] }}" />
    <meta property="og:description" content="{{ $category->seo['og_description'] }}">
    <meta property="og:url" content="{{ $category->seo['og_url'] }}">
    <meta property="og:site_name" content="{{ $category->seo['og_site_name'] }}">
    <meta property="og:type" content="{{ $category->seo['og_type'] }}" />
    <meta name="twitter:card" content="{{ $category->seo['twitter_card'] }}">
    <meta name="twitter:site" content="{{ $category->seo['twitter_site'] }}">
    <meta name="twitter:image" content="{{ $category->seoTwitterImage->url }}">
    <meta name="twitter:title" content="{{ $category->seo['twitter_title'] }}">
    <meta name="twitter:description" content="{{ $category->seo['twitter_description'] }}">
    <meta name="twitter:url" content="{{ $category->seo['twitter_url'] }}">
@endsection

@section('css')
    <link rel="stylesheet" href="/{{ minify('css/produs.css') }}">
    <link rel="stylesheet" href="/{{ minify('css/product-card.css') }}">
    <link rel="stylesheet" href="/{{ minify('css/pagination.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis"><a href="#"></a>{{ $category->name }}</li></ul>
@endsection

@section('content')
<?php
$base_url = url('/');
?>

<div class="col main-container">
    <div id="cdr">
        <h1>{{ $category->name }}</h1>
        <p>{!! $category->description !!}</p>
    </div>
    <div class="flex justify-between align-center categories-header gap-lg mt-32">
        <div class="flex col">
            <p class="mr-8 mb-8">Produse pe pagina:</p>
            <div class="flex row">
                @foreach ($numsPerPage as $num)
                    <a href="?per_page={{ $num }}" class="btn btn-empty rounded-sm {{ $per_page == $num ? 'active' : '' }} mr-8"> {{ $num }} </a>
                @endforeach
            </div>
        </div>

        <div class="flex col align-end">
            <p class="m-0 mb-8">
                <strong>{{ $total_results }}</strong> produse gasite
            </p>

            <!-- pagination -->
            <ul class="row align-center justify-center pagination gap-md">
                <li>
                    <form method="get" action="{{ url()->current() }}">
                        @csrfWithoutAutocomplete
                        <input type="hidden" name="category_name" value="{{ $category->name }}" />
                        <input type="hidden" name="per_page" value="{{ $per_page }}" />
                        <button aria-label="Inapoi" type="submit" {{ $current_page <= 1 ? 'disabled' : '' }} value="{{ $current_page - 1 }}" name="page">
                            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4716 3.52858C10.7319 3.78892 10.7319 4.21103 10.4716 4.47138L6.94297 7.99998L10.4716 11.5286C10.7319 11.7889 10.7319 12.211 10.4716 12.4714C10.2112 12.7317 9.78911 12.7317 9.52876 12.4714L5.52876 8.47138C5.26841 8.21103 5.26841 7.78892 5.52876 7.52858L9.52876 3.52858C9.78911 3.26823 10.2112 3.26823 10.4716 3.52858Z" />
                            </svg>
                        </button>
                    </form>
                </li>
                @for ($i = max(1, $current_page - 2); $i <= min($total_pages, $current_page + 3); $i++)
                    <li>
                        <form method="get" action="{{ url()->current() }}">
                            @csrfWithoutAutocomplete
                            <input type="hidden" name="category_name" value="{{ $category->name }}" />
                            <input type="hidden" name="per_page" value="{{ $per_page }}" />
                            <button class="{{ $i == $current_page ? 'active' : '' }}" type="submit" value="{{ $i }}" name="page" aria-label="Pagina {{ $i }}">
                                {{ $i }}
                            </button>
                        </form>
                    </li>
                @endfor
                <li>
                    <p class="all-pages">
                        din {{ $total_pages }}
                    </p>
                </li>
                <li>
                    <form method="get" action="{{ url()->current() }}">
                        @csrfWithoutAutocomplete
                        <input type="hidden" name="category_name" value="{{ $category->name }}" />
                        <input type="hidden" name="per_page" value="{{ $per_page }}" />
                        <button aria-label="Inainte" type="submit" {{ $current_page >= $total_pages ? 'disabled' : '' }} value="{{ $current_page + 1 }}" name="page">
                            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.52876 3.52857C5.78911 3.26823 6.21122 3.26823 6.47157 3.52857L10.4716 7.52858C10.7319 7.78891 10.7319 8.21105 10.4716 8.47138L6.47157 12.4714C6.21122 12.7317 5.78911 12.7317 5.52876 12.4714C5.26841 12.211 5.26841 11.7889 5.52876 11.5286L9.05736 7.99998L5.52876 4.47139C5.26841 4.21103 5.26841 3.78893 5.52876 3.52857Z" />
                            </svg>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    
    {{-- The Products --}}
    <div class="my-32 grid grid-3 gap-xl" id="clw">
        @foreach ($products as $ind => $product)
            @if (!empty($product))
                <div>
                    @include('components.product-card', ['product' => $product, 'key' => $ind])
                </div>
            @endif
        @endforeach
    </div>

    <!-- pagination -->
    <ul class="row align-center justify-center pagination gap-md">
        <li>
            <form method="get" action="{{ url()->current() }}">
                @csrfWithoutAutocomplete
                <input type="hidden" name="category_name" value="{{ $category->name }}" />
                <input type="hidden" name="per_page" value="{{ $per_page }}" />
                <button aria-label="Inapoi" type="submit" {{ $current_page <= 1 ? 'disabled' : '' }} value="{{ $current_page - 1 }}" name="page">
                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4716 3.52858C10.7319 3.78892 10.7319 4.21103 10.4716 4.47138L6.94297 7.99998L10.4716 11.5286C10.7319 11.7889 10.7319 12.211 10.4716 12.4714C10.2112 12.7317 9.78911 12.7317 9.52876 12.4714L5.52876 8.47138C5.26841 8.21103 5.26841 7.78892 5.52876 7.52858L9.52876 3.52858C9.78911 3.26823 10.2112 3.26823 10.4716 3.52858Z" />
                    </svg>
                </button>
            </form>
        </li>
        @for ($i = max(1, $current_page - 2); $i <= min($total_pages, $current_page + 3); $i++)
            <li>
                <form method="get" action="{{ url()->current() }}">
                    @csrfWithoutAutocomplete
                    <input type="hidden" name="category_name" value="{{ $category->name }}" />
                    <input type="hidden" name="per_page" value="{{ $per_page }}" />
                    <button class="{{ $i == $current_page ? 'active' : '' }}" type="submit" value="{{ $i }}" name="page" aria-label="Pagina {{ $i }}">
                        {{ $i }}
                    </button>
                </form>
            </li>
        @endfor
        <li>
            <p class="all-pages">
                din {{ $total_pages }}
            </p>
        </li>
        <li>
            <form method="get" action="{{ url()->current() }}">
                @csrfWithoutAutocomplete
                <input type="hidden" name="category_name" value="{{ $category->name }}" />
                <input type="hidden" name="per_page" value="{{ $per_page }}" />
                <button aria-label="Inainte" type="submit" {{ $current_page >= $total_pages ? 'disabled' : '' }} value="{{ $current_page + 1 }}" name="page">
                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.52876 3.52857C5.78911 3.26823 6.21122 3.26823 6.47157 3.52857L10.4716 7.52858C10.7319 7.78891 10.7319 8.21105 10.4716 8.47138L6.47157 12.4714C6.21122 12.7317 5.78911 12.7317 5.52876 12.4714C5.26841 12.211 5.26841 11.7889 5.52876 11.5286L9.05736 7.99998L5.52876 4.47139C5.26841 4.21103 5.26841 3.78893 5.52876 3.52857Z" />
                    </svg>
                </button>
            </form>
        </li>
    </ul>
</div>

@endsection
