<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <!-- Include fișierele CSS din directorul specificat -->
    <link rel="stylesheet" href="{{ asset('css/adrian.css') }}">
    <link rel="stylesheet" href="{{ asset('css/angajari.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aplicare.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cartela-lavabile-culori.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cartela-ral-culori.css') }}">
    <link rel="stylesheet" href="{{ asset('css/certificari.css') }}">
    <link rel="stylesheet" href="{{ asset('css/consum.css') }}">
    <link rel="stylesheet" href="{{ asset('css/despre.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
    <link rel="stylesheet" href="{{ asset('css/generic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-account.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new.css') }}">
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plata.css') }}">
    <link rel="stylesheet" href="{{ asset('css/politica-de-calitate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/politica-de-mediu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/politica-de-securitate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/produs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/retur.css') }}">
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/servicii.css') }}">
    <link rel="stylesheet" href="{{ asset('css/solicita-cotatie.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sprite.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabs.css') }}">
</head>
<body>
    <header class="w-full bg-white-gray">
        <!-- first layer -->
        <div class="main-container row justify-between align-center desktop-header gap-lg">
            <!-- empty div -->
            <div></div>
            <!-- contact data -->
            <div id="header_social_media" class="row align-center">
                <a href="mailto:vanzari@emex.ro" class="row align-center" title="mail">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.7 20" width="25.7" height="20">
                        <path d="M24.2 19.5H1.4c-.6 0-1-.5-1-1.2V1.7c0-.6.4-1.2 1-1.2h22.8c.5 0 1 .6 1 1.2v16.7c0 .6-.4 1.1-1 1.1z" fill="none" stroke="#203471" stroke-miterlimit="10" stroke-width="1.25"></path>
                        <path d="m2.8 2 10.1 7L23 2l-10.1 9.7L2.8 2zM1.3 18.1l6.5-8.3L9.1 11l-7.8 7.1zm15.3-7.2 7.9 7.2L18 9.7" fill="#203471"></path>
                    </svg>
                    <span>
                        <em>vanzari@emex.ro</em>
                    </span>
                </a>
                <a href="tel:+40724509552" class="row align-center" title="phone">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.45 23.8" width="20" height="20">
                        <path d="M19.24 12.05h-1.19c0-4-3.09-7.13-6.65-7.13V3.67c4.39.13 7.84 3.87 7.84 8.37ZM11.4 5.8v1.25c2.61 0 4.87 2.24 4.87 5.13h1.19c-.24-3.5-2.73-6.38-6.06-6.38ZM11.16.06C5.11.05 0 5.43 0 11.92S5.11 23.8 11.16 23.8c.36 0 .71-.38.71-.75s-.36-.75-.71-.75c-5.46 0-9.74-4.62-9.74-10.38s4.4-10.38 9.74-10.38 9.74 4.62 9.74 10.38c0 2.38-1.19 4.75-2.97 5.75-.59.38-1.31.5-2.02.5.48-.25.83-.63 1.07-1.13 0-.13.12-.13.12-.25.24-.63.24-1.25.36-1.88.12-.75-3.21-2.24-3.56-1.38-.12.38-.24 1.5-.48 1.75s-.71.13-.95-.13l-2.38-2.51-.12-.13-.12-.13c-.71-.75-1.78-1.75-2.38-2.51 0 0-.12-.5.12-.63.24-.25 1.31-.38 1.66-.5.95-.25-.48-3.87-1.31-3.75-.48.13-1.07.13-1.66.38 0 0-.12.13-.24.25-1.9 1.25-2.14 4.37-.24 6.75.71.88 1.43 1.75 2.26 2.62l.12.13.12.13c.83.88 1.78 2 3.33 3.12 3.21 2.24 5.7 1.63 7.13.75 2.49-1.5 3.68-4.62 3.68-7.13-.12-6.5-5.23-12.01-11.28-12.01v.06Z" fill="#253670"></path>
                    </svg>
                    <span>
                        <em>+40724-509.552</em>
                    </span>
                </a>
                <a href="tel:+40214571646" class="row align-center" title="phone">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.45 23.8" width="20" height="20">
                        <path d="M19.24 12.05h-1.19c0-4-3.09-7.13-6.65-7.13V3.67c4.39.13 7.84 3.87 7.84 8.37ZM11.4 5.8v1.25c2.61 0 4.87 2.24 4.87 5.13h1.19c-.24-3.5-2.73-6.38-6.06-6.38ZM11.16.06C5.11.05 0 5.43 0 11.92S5.11 23.8 11.16 23.8c.36 0 .71-.38.71-.75s-.36-.75-.71-.75c-5.46 0-9.74-4.62-9.74-10.38s4.4-10.38 9.74-10.38 9.74 4.62 9.74 10.38c0 2.38-1.19 4.75-2.97 5.75-.59.38-1.31.5-2.02.5.48-.25.83-.63 1.07-1.13 0-.13.12-.13.12-.25.24-.63.24-1.25.36-1.88.12-.75-3.21-2.24-3.56-1.38-.12.38-.24 1.5-.48 1.75s-.71.13-.95-.13l-2.38-2.51-.12-.13-.12-.13c-.71-.75-1.78-1.75-2.38-2.51 0 0-.12-.5.12-.63.24-.25 1.31-.38 1.66-.5.95-.25-.48-3.87-1.31-3.75-.48.13-1.07.13-1.66.38 0 0-.12.13-.24.25-1.9 1.25-2.14 4.37-.24 6.75.71.88 1.43 1.75 2.26 2.62l.12.13.12.13c.83.88 1.78 2 3.33 3.12 3.21 2.24 5.7 1.63 7.13.75 2.49-1.5 3.68-4.62 3.68-7.13-.12-6.5-5.23-12.01-11.28-12.01v.06Z" fill="#253670"></path>
                    </svg>
                    <span>
                        <em>+4021-457.1646</em>
                    </span>
                </a>
            </div>
            <!-- contul meu -->
            <div class="dropdown" id="header_login_actions_wrapper">
                <div class="dropdown-header row align-center justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.5 23.5" width="20" height="20">
                        <defs>
                            <clipPath id="a">
                                <circle fill="none" cx="11.75" cy="11.75" r="11.25"></circle>
                            </clipPath>
                        </defs>
                        <g clip-path="url(#a)">
                            <path d="M15.76 9.17c0 1.2-.4 2.24-1.28 3.12s-1.92 1.28-3.12 1.28c-1.2 0-2.24-.4-3.12-1.28-.88-.88-1.28-1.92-1.28-3.12s.4-2.24 1.28-3.12 1.92-1.28 3.12-1.28c1.2 0 2.24.4 3.12 1.28.8.88 1.28 1.92 1.28 3.12Zm4.41 11.21c0 .94-.35 1.71-.97 2.22-.62.51-1.5.85-2.56.85H6.86c-1.06 0-1.94-.26-2.56-.85-.71-.6-.97-1.28-.97-2.22v-1.03c0-.34.09-.77.18-1.11.09-.43.18-.77.35-1.11.09-.34.35-.68.53-1.03.26-.34.53-.68.79-.94.35-.26.71-.51 1.15-.6.44-.17.97-.26 1.5-.26.18 0 .44.09.79.26.26.17.53.34.79.51.26.17.62.26 1.06.43.35.09.79.17 1.15.17h.09c.44 0 .88-.09 1.32-.17s.79-.26 1.06-.43c.35-.17.62-.34.79-.51.35-.26.62-.26.79-.26.53 0 1.06.09 1.5.26s.79.34 1.15.6c.26.26.53.6.79.94.18.34.44.68.53 1.03s.26.77.35 1.11c.09.43.18.77.18 1.11v1.03Z" fill="#203471"></path>
                        </g>
                        <circle fill="none" cx="11.75" cy="11.75" r="11.25" stroke="#203471" stroke-miterlimit="10"></circle>
                    </svg>
                    @auth
                        {{ Auth::user()->last_name }} {{ Auth::user()->first_name }}
                    @else
                        <span>
                            Contul meu
                        </span>
                    @endauth
                    <img src="{{ asset('images/new_design/icons/expand_more.svg') }}" height="24" width="24" alt="See more" title="See more">
                </div>
                <div class="col dropdown-menu">
                    @auth
                        <a href="{{ url('/contul-meu') }}" title="Setari cont">
                            Setari cont
                        </a>
                        <a href="{{ url('/wishlist') }}" title="Favorite">
                            Favorite
                        </a>
                        <a href="{{ url('/contul-meu?page=') }}" title="Istoric">
                            Istoric
                        </a>
                        <a href="{{ url('/contul-meu#facturare') }}" title="Facturare">
                            Facturare
                        </a>
                        <a href="{{ url('/logout') }}" id="logoutButton" title="Iesire din cont">
                            Iesire din cont
                        </a>
                    @else
                        <button id="auth_lightbox_trigger" class="auth" role="button" tabindex="0" aria-label="Autentificare">
                            Autentificare
                        </button>
                    @endauth
                </div>
            </div>
        </div>

        <!-- second layer -->
        <div class="desktop-header bg-white">
            <div class="main-container row second-layer">
                <a id="logo" href="{{ empty($base_url) ? '/' : $base_url }}" title="acasa">
                    <img src="{{ asset('images/new_design/general/logo.png') }}" height="84" width="252" alt="Emex - un brand de incredere" title="Emex - brand al companiei Romtehnochim">
                </a>
                <form class="relative flex align-center w-full justify-end" method="GET" action="{{ url('/search') }}">
                    <div class="flex align-center">
                        <img width="18" height="18" src="{{ asset('images/new_design/icons/search.svg') }}" id="search-icon" alt="search-icon" title="search-icon">
                    </div>
                    <input id="search-input-desktop" type="text" name="zoom_query" class="form-control w-full" placeholder="Cauta dupa nume produs sau cod SKU">
                </form>
                <div class="row align-center gap-md" id="favorites-cart">
                    <a href="{{ url('/wishlist') }}" title="produse favorite">
                        @php
                            $wishlist_products_count = Auth::check() ? App\Models\Wishlist::where('user_id', Auth::id())->count() : session('wish_list_products', collect())->count();
                        @endphp
                        <div class="flex align-center">
                            <svg width="20" height="19" viewBox="0 0 14 13" fill="#1071FF" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.6668 5.15992L8.8735 4.74659L7.00016 0.333252L5.12683 4.75325L0.333496 5.15992L3.9735 8.31325L2.88016 12.9999L7.00016 10.5133L11.1202 12.9999L10.0335 8.31325L13.6668 5.15992ZM7.00016 9.26659L4.4935 10.7799L5.16016 7.92659L2.94683 6.00659L5.86683 5.75325L7.00016 3.06659L8.14016 5.75992L11.0602 6.01325L8.84683 7.93325L9.5135 10.7866L7.00016 9.26659Z" />
                            </svg>
                        </div>
                        <div class="circle flex justify-center align-center">
                            {{ $wishlist_products_count }}
                        </div>
                        <span class="label">Favorite</span>
                    </a>
                    <a href="{{ url('/produse-adaugate') }}" title="cos">
                        @php
                            $preorder_count = session('cart_list_products', collect())->count();
                        @endphp
                        <div class="flex align-center">
                            <svg width="20" height="19" viewBox="0 0 15 14" fill="#1071FF" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3665 7.66659C10.8665 7.66659 11.3065 7.39325 11.5332 6.97992L13.9198 2.65325C14.1665 2.21325 13.8465 1.66659 13.3398 1.66659H3.47317L2.8465 0.333252H0.666504V1.66659H1.99984L4.39984 6.72659L3.49984 8.35325C3.01317 9.24659 3.65317 10.3333 4.6665 10.3333H12.6665V8.99992H4.6665L5.39984 7.66659H10.3665ZM4.1065 2.99992H12.2065L10.3665 6.33325H5.6865L4.1065 2.99992ZM4.6665 10.9999C3.93317 10.9999 3.33984 11.5999 3.33984 12.3333C3.33984 13.0666 3.93317 13.6666 4.6665 13.6666C5.39984 13.6666 5.99984 13.0666 5.99984 12.3333C5.99984 11.5999 5.39984 10.9999 4.6665 10.9999ZM11.3332 10.9999C10.5998 10.9999 10.0065 11.5999 10.0065 12.3333C10.0065 13.0666 10.5998 13.6666 11.3332 13.6666C12.0665 13.6666 12.6665 13.0666 12.6665 12.3333C12.6665 11.5999 12.0665 10.9999 11.3332 10.9999Z" />
                            </svg>
                        </div>
                        <div class="circle flex justify-center align-center">
                            {{ $preorder_count }}
                        </div>
                        <span class="label">Cos</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- third layer -->
        <div class="main-container row justify-between align-center desktop-header">
            <div class="breadcrumbs-container">
                @include('breadcrumbs')
            </div>
            <div id="navigation_wrapper">
                <div id="navigation">
                    @include('desktop-menu')
                </div>
            </div>
        </div>

    </header>
</body>
</html>
