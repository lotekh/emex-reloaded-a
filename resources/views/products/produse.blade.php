@extends('layout.layout')

@section('seo')
<title>Lacuri | Vopsele | Tencuieli | Pardoseli - Emex</title>
<meta name="keywords" content="vopsea metal, pardoseli epoxidice, tencuiala decorativa, vopsea Emex">
<meta name="description" content="Romtehnochim produce o gama variata de lacuri vopsele tencuieli si pardoseli de calitate superioara cu aplicare in zonele de industrie si constructii">
<meta property="og:title" content="Lista de produse Emex">
<meta property="og:url" content="https://emex.ro/produse">
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/category.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs">
    <li><a href="/">Acasa</a></li>
    <li class="separator">/</li>
    <li class="-ml-4 ellipsis"><a href="{{ route('products.index') }}">Toate Produsele</a></li>
</ul>
@endsection

@section('content')
<div class="main-container" id="all-products-page">
    <div class="grid grid-4 mt-32 gap-lg">

        {{-- FILTRE --}}
        <div class="filters mb-16" id="filters-div">
            <div id="accordion-menu-desktop" class="col">
                <form method="GET" action="{{ route('products.index') }}">
                    
                    {{-- Menținerea parametrilor existenți --}}
                    @foreach(request()->except('page') as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach

                    <div class="flex w-full col">
                        <h4 class="m-0 mb-8">Filtre</h4>
                        <div class="flex gap-md">
                            <a href="{{ route('products.index') }}" class="btn btn-blue-outline rounded-sm">
                                Sterge filtre
                            </a>
                            <button class="btn btn-blue rounded-sm" type="submit">
                                Aplica filtre
                            </button>
                        </div>
                    </div>

                    @if(count($filters))
                        <div class="accordion-menu mb-32">
                            @foreach ($filters as $filterCategory)
                                <div class="accordion-item">
                                    <h4 class="accordion-header marginbottom-0 paddintop-0">{{ $filterCategory->name }}</h4>
                                    <div class="filter-list">
                                        @foreach ($filterCategory->children as $subFilter)
                                            <div>
                                                <label class="custom-checkbox">
                                                    <span class="filter">{{ $subFilter->name }}</span>
                                                    <input type="checkbox" name="category{{ $subFilter->id }}" 
                                                           value="on" 
                                                           {{ request()->has('category'.$subFilter->id) ? 'checked' : '' }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </form>
            </div>
        </div>

        {{-- LISTA PRODUSELOR --}}
        <div class="all-products">
            <h1 class="m-0 mb-16">Produse Emex</h1>
            <p class="mb-32">{{ $totalResults }} produse gasite</p>

            {{-- NUMĂR PRODUSE PE PAGINĂ --}}
            <div class="flex col flex-lg mb-32 justify-between align-center">
                <p class="mr-8">Produse pe pagina:</p>
                <div class="flex">
                    @foreach ([9, 27, 72] as $size)
                        <a href="{{ request()->fullUrlWithQuery(['per_page' => $size]) }}" 
                           class="btn btn-empty rounded-sm {{ $perPage == $size ? 'active' : '' }} mr-8">
                            {{ $size }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- AFIȘARE PRODUSE --}}
            <div class="grid grid-3 gap-md">
                @foreach ($products as $product)
                    <div>
                        @include('components.product-card', ['product' => $product])
                    </div>
                @endforeach
            </div>

            {{-- PAGINARE --}}
            <div class="row align-center justify-center pagination gap-md mt-32">
                
                {{-- PAGINARE: ÎNAPOI --}}
                @if ($products->currentPage() > 1)
                    <a href="{{ $products->previousPageUrl() }}" class="btn btn-blue-outline rounded-sm">
                        ← Inapoi
                    </a>
                @endif

                {{-- PAGINARE: PAGINI --}}
                @foreach (range(1, $products->lastPage()) as $i)
                    <a href="{{ $products->url($i) }}" 
                       class="btn btn-empty rounded-sm {{ $i == $products->currentPage() ? 'active' : '' }}">
                        {{ $i }}
                    </a>
                @endforeach

                {{-- PAGINARE: ÎNAINTE --}}
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" class="btn btn-blue-outline rounded-sm">
                        Inainte →
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
