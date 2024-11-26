@extends('layout.layout')

@section('seo')
<title>Lacuri | Vopsele | Tencuieli | Pardoseli - Emex</title>
<meta name="keywords" content="vopsea metal, pardoseli epoxidice, tencuiala decorativa, vopsea Emex">
<meta name="description" content="Romtehnochim produce o gama variata de lacuri vopsele tencuieli si pardoseli de calitate superioara cu aplicare in zonele de industrie si constructii">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Lista de produse Emex">
<meta property="og:image" content="https://emex.ro/images/social/Toate-produsele-Emex.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Toate-produsele-Emex.jpg" />
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="628"/>
<meta property="og:image:alt" content="Lista generala de produse &#8220;Emex&#8221;"/>
<meta property="og:description" content="Lacuri - Vopsele - Tencuieli - Pardoseli - o lista succinta, cu link si imagini, a produselor uzuale realizate de Romtehnochim sub marca &#8220;Emex&#8221;">
<meta property="og:url" content="https://emex.ro/produse">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="Product"/>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Romtehnochim">
<meta name="twitter:image" content="https://emex.ro/images/social/Toate-produsele-Emex.jpg">
<meta name="twitter:title" content="Emex - Produse Generale">
<meta name="twitter:description" content="O mare parte din gama de produse &#8220;Emex&#8221;, realizate de Romtehnochim, prezentata cu link-uri si imagini, intr-un pachet compact">
<meta name="twitter:url" content="https://emex.ro/produse">
@endsection

@section('css')
    <link rel="stylesheet" href="/{{ minify('css/produs.css') }}">
    <link rel="stylesheet" href="/{{ minify('css/product-card.css') }}">
    <link rel="stylesheet" href="/{{ minify('css/pagination.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis"><a href="/">Toate Produsele</a></li></ul>
@endsection

@section('content')
<div class="main-container" id="all-products-page">
    <div class="grid grid-4 mt-32 gap-lg">
        <div class="filters mb-16" id="filters-div">
            <div id="accordion-menu-desktop" class="col">
                <form method="GET" action="{{ route('products.index') }}">
                    <div class="flex w-full col">
                        <h4 class="m-0 mb-8">Filtre</h4>
                        <div class="flex gap-md">
                            <a href="{{ url('/produse') }}">
                                <button class="btn btn-blue-outline rounded-sm" type="button">
                                    Sterge filtre
                                </button>
                            </a>
                            <button class="btn btn-blue rounded-sm" type="submit">
                                Aplica filtre
                            </button>
                        </div>
                    </div>
                
                    <input type="hidden" name="per_page" value="{{ $perPage }}">
                
                    @if(count($filters))
                        <div class="accordion-menu mb-32">
                            @foreach ($filters as $filterCategory)
                                <div class="accordion-item">
                                    <h4 class="accordion-header marginbottom-0 paddintop-0">{{ $filterCategory->name }}</h4>
                                    <ul class="filter-list">
                                        @foreach ($filterCategory->children as $subFilter)
                                            <div>
                                                <label class="custom-checkbox">
                                                    <p class="filter">{{ $subFilter->name }}</p>
                                                    <input type="checkbox" name="category{{ $subFilter->id }}" {{ request()->has('category'.$subFilter->id) ? 'checked' : '' }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </form>
            </div>
            
        </div>

        <div class="all-products">
            <h1 class="m-0 mb-16">Produse Emex</h1>
            <p class="mb-32">Produsele Emex sunt caracterizate prin aderenta foarte mare la suport, acoperire foarte buna, la un singur strat pentru o corecta pregatire a suprafetei, rezistenta mare la intemperii si luciu persistent. Este recomandata pentru elementele supraterane, si se regaseste printre cele mai des utilizate vopsele pentru lemn sau metal.</p>
            <div class="flex col flex-lg mb-32 justify-between align-center">
                <p class="m-0 mb-16"><strong>{{ $totalResults }}</strong> produse gasite</p>
                <div class="flex align-center">
                    <p class="mr-8">Produse pe pagina:</p>
                    <div class="flex">
                        <a href="{{ url('/produse') . $filtersString }}&per_page=9">
                            <button class="btn btn-empty rounded-sm {{ $perPage == 9 ? 'active' : '' }} mr-8">9</button>
                        </a>
                        <a href="{{ url('/produse') . $filtersString }}&per_page=27">
                            <button class="btn btn-empty rounded-sm {{ $perPage == 27 ? 'active' : '' }} mr-8">27</button>
                        </a>
                        <a href="{{ url('/produse') . $filtersString }}&per_page=72">
                            <button class="btn btn-empty rounded-sm {{ $perPage == 72 ? 'active' : '' }}">72</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-3 gap-md">
                @foreach ($products as $product)
                    <div>
                        @include('components.product-card', ['product' => $product])
                    </div>
                @endforeach
            </div>

            <div class="row align-center justify-center pagination gap-md mt-32">
                @if ($currentPage > 1)
                    <a href="{{ url('/produse') . $filtersString }}&current_page_number={{ $currentPage - 1 }}">
                        <button aria-label="Pagina anterioara">
                            &lt;
                        </button>
                    </a>
                @endif

                @for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 3); $i++)
                    <a href="{{ url('/produse') . $filtersString }}&current_page_number={{ $i }}">
                        <button class="{{ $i == $currentPage ? 'active' : '' }}" aria-label="Pagina {{ $i }}">
                            {{ $i }}
                        </button>
                    </a>
                @endfor

                <p class="all-pages">din {{ $totalPages }}</p>

                @if ($currentPage < $totalPages)
                    <a href="{{ url('/produse') . $filtersString }}&current_page_number={{ $currentPage + 1 }}">
                        <button aria-label="Pagina urmatoare">
                            &gt;
                        </button>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
