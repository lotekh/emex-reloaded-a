<!doctype html>
<html lang="ro">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="Author" content="Emex by Romtehnochim">
    <meta name="rating" content="General">
    <meta name="geo.region" content="RO-IF">
    <meta name="geo.placename" content="Jilava">
    <meta name="geo.position" content="44.328689;26.067273">
    <meta name="ICBM" content="44.328689,26.067273">

    <link href="{{ url()->current() }}" rel="canonical" />
    <link href="{{ env('APP_URL') }}" hreflang="ro-RO" rel="alternate" />
    <link href="{{ env('APP_URL') }}" hreflang="x-default" rel="alternate" />
    <link href="{{ env('APP_URL') }}/sitemap.xml" title="General Site Map" rel="sitemap">
    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon" />

    <meta name="Classification" content="Business">
    <meta name="HandheldFriendly" content="True">
    <meta name="robots" content="index, follow">

    <meta name="csrf-token" content="{{csrf_token()}}">

    <script>
        window.dataLayer = window.dataLayer || [];
    </script>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-57FHTGR');
    </script>
    @if(session('success') && session('success') == 'Produsul a fost adăugat în coș.')
    <script>
        let product = @json(session('product'));

        dataLayer.push({
            ecommerce: null
        }); 
        dataLayer.push({
            event: "add_to_cart",
            ecommerce: {
                currency: "RON",
                value: product.price,
                items: [{
                    item_id: product.sku,
                    item_name: product.name,
                    price: product.price,
                    quantity: product.quantity,
                }]
            }
        });
    </script>
    @endif

    @yield('seo')
    @yield('title')
    <link rel="icon" type="image/x-icon" href="{{ asset('resources/emex-favicon.ico') }}">

    @include('layouts.partials.json-ld')

    @hasSection('css')
    @yield('css')
    @else
    <link rel="stylesheet" href="{{ asset('css/bundled/layout.min.css') }}">
    @endif

    <script src="{{ asset('search-script/zoom_autocomplete.js') }}"></script>
</head>

@php
use App\Models\Order;
@endphp

<body class="m-0" id="main_body">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-57FHTGR"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <header class="w-full bg-white-gray">
        <div class="main-container row justify-between align-center desktop-header gap-lg">
            <div></div>
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
                    <span>
                        {{ Auth::user()->last_name }} {{ Auth::user()->first_name }}
                    </span>
                    @else
                    <span>
                        Contul meu
                    </span>
                    @endauth
                    <img src="{{ asset('resources/new_design/icons/expand_more.svg') }}" height="24" width="24" alt="See more arrow" title="See more">
                </div>
                <div class="col dropdown-menu">
                    @auth
                    <a href="{{ url('/contul-meu') }}" title="Setari cont">
                        Setari cont
                    </a>
                    <a href="{{ url('/wishlist') }}" title="Favorite">
                        Favorite
                    </a>
                    <a href="{{ url('/contul-meu') }}#istoric" title="Istoric">Istoric</a>
                    <a href="{{ url('/contul-meu') }}#facturare" title="Facturare">Facturare</a>
                    <a href="{{ route('logout') }}" id="logoutButton" title="Iesire din cont"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Iesire din cont
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrfWithoutAutocomplete
                    </form>
                    @else
                    <button id="auth_lightbox_trigger" class="auth" type="button" role="button" tabindex="0" aria-label="Autentificare">
                        Autentificare
                    </button>
                    @endauth
                </div>
            </div>
        </div>

        <div class="desktop-header bg-white">
            <div class="main-container row second-layer">
                <a id="logo" href="{{ empty($base_url) ? '/' : $base_url }}" title="acasa">
                    <img src="{{ asset('resources/new_design/general/logo.webp') }}" alt="Emex - un brand de incredere" title="Emex - brand al companiei Romtehnochim">
                </a>
                <form id="search-form-desktop" class="relative flex align-center w-full justify-end" method="GET" action="{{ url('/search') }}">
                    <div class="flex align-center">
                        <img width="18" height="18" src="{{ asset('resources/new_design/icons/search.svg') }}" id="search-icon" alt="Search Icon" title="search-icon" style="cursor:pointer;">
                    </div>
                    <input id="search-input-desktop" type="text" name="zoom_query" class="form-control w-full" placeholder="Cauta dupa nume produs sau cod SKU">
                </form>
                <div class="row align-center gap-md" id="favorites-cart">
                    <a href="{{ url('/wishlist') }}" title="produse favorite">
                        @php
                        $wishlist_products_count = Auth::check() ? App\Models\WishlistItem::where('user_id', Auth::id())->count() : 0;
                        @endphp
                        <div class="flex align-center">
                            <svg width="20" height="19" viewBox="0 0 14 13" fill="#1071FF" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.6668 5.15992L8.8735 4.74659L7.00016 0.333252L5.12683 4.75325L0.333496 5.15992L3.9735 8.31325L2.88016 12.9999L7.00016 10.5133L11.1202 12.9999L10.0335 8.31325L13.6668 5.15992ZM7.00016 9.26659L4.4935 10.7799L5.16016 7.92659L2.94683 6.00659L5.86683 5.75325L7.00016 3.06659L8.14016 5.75992L11.0602 6.01325L8.84683 7.93325L9.5135 10.7866L7.00016 9.26659Z" />
                            </svg>
                        </div>
                        <div class="circle flex justify-center align-center">
                            {{ app('App\Http\Controllers\WishlistController')->getWishlistCount() }}
                        </div>
                        <span class="label">Favorite</span>
                    </a>

                    <a href="{{ url('/produse-adaugate') }}" title="cos">
                        <div class="flex align-center">
                            <svg width="20" height="19" viewBox="0 0 15 14" fill="#1071FF" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3665 7.66659C10.8665 7.66659 11.3065 7.39325 11.5332 6.97992L13.9198 2.65325C14.1665 2.21325 13.8465 1.66659 13.3398 1.66659H3.47317L2.8465 0.333252H0.666504V1.66659H1.99984L4.39984 6.72659L3.49984 8.35325C3.01317 9.24659 3.65317 10.3333 4.6665 10.3333H12.6665V8.99992H4.6665L5.39984 7.66659H10.3665ZM4.1065 2.99992H12.2065L10.3665 6.33325H5.6865L4.1065 2.99992ZM4.6665 10.9999C3.93317 10.9999 3.33984 11.5999 3.33984 12.3333C3.33984 13.0666 3.93317 13.6666 4.6665 13.6666C5.39984 13.6666 5.99984 13.0666 5.99984 12.3333C5.99984 11.5999 5.39984 10.9999 4.6665 10.9999ZM11.3332 10.9999C10.5998 10.9999 10.0065 11.5999 10.0065 12.3333C10.0065 13.0666 10.5998 13.6666 11.3332 13.6666C12.0665 13.6666 12.6665 13.0666 12.6665 12.3333C12.6665 11.5999 12.0665 10.9999 11.3332 10.9999Z" />
                            </svg>
                        </div>
                        @php
                        use App\Http\Controllers\OrdersController;
                        $preorder_count = (new OrdersController())->getCartProductVariationCount();
                        @endphp

                        <div class="circle flex justify-center align-center">
                            {{ $preorder_count }}
                        </div>

                        <span class="label">Cos</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="main-container row justify-between align-center desktop-header">
            <div class="breadcrumbs-container">
                <div class="breadcrumbs_wrapper ">
                    <div class="breadcrumbs pull-left">
                        @yield('breadcrumbs')
                    </div>
                </div>
            </div>
            <div id="navigation_wrapper">
                <div id="navigation">
                    @include('desktop-menu')
                </div>
            </div>
        </div>

        @include('mobile-menu')

        <div id="breadcrumbsContainerMobile" class="breadcrumbs-mobile-container">
            <div class="breadcrumbs_wrapper ">
                <div class="breadcrumbs pull-left">
                    @yield('breadcrumbs')
                </div>
            </div>
        </div>
    </header>

    @if($popup)
    <div class="popups" id="popupContainer">
        <div id="popup9" class="popup">
            <div class="text">
                {!! $popup->message !!}
            </div>
            <img alt="close-line-red" src="{{ asset('resources/images/close-line-red.png') }}" role="button" tabindex="0" onclick="document.getElementById('popupContainer').style.display = 'none'">
        </div>
    </div>
    @endif

    <div class="autentificare-1">
        <div class="autentificare-2">
            <div id="auth-lightbox" class="w-full h-screen flex justify-center align-center modal">
                <div class="modal-container">
                    <div class="relative header row justify-between align-center">
                        <div></div>
                        <img class="logo-footer" alt="Emex - un brand de incredere" width="201" height="72" src="{{ asset('resources/new_design/general/logo-footer.webp') }}">
                        <button onclick="closeModal('auth-lightbox')" role="button" tabindex="0" class="close-btn" aria-label="Inchide">
                            <span class="flex align-center">
                                <img src="{{ asset('resources/new_design/icons/close.svg') }}" alt="Close Auth Lightbox" width="32" height="32">
                            </span>
                        </button>
                    </div>
                    <div class="header-buttons">
                        <button class="header-button clickable" onclick="switchModal('auth-lightbox', 'register-lightbox')" role="button" aria-label="Creeaza cont" tabindex="0">Creeaza cont</button>
                        <div class="header-button">Autentificare</div>
                    </div>
                    <div class="col align-center content">
                        <form class="col w-full" method="POST" action="{{ route('login') }}">
                            @csrfWithoutAutocomplete
                            <div class="form-group w-full">
                                <label for="form-login-email">Adresa de email<span class="text-red">*</span></label>
                                <input class="w-full" id="form-login-email" type="text" name="email" required>
                            </div>
                            <div class="form-group w-full relative">
                                <label for="form-login-password">Parola<span class="text-red">*</span></label>
                                <input class="w-full" id="form-login-password" type="password" name="password" required>
                                <img src="{{ asset('resources/new_design/icons/eye-solid.svg') }}" alt="eye-solid-icon" width="20" height="18" class="password-toggle-icon" id="toggle-login-password-visibility" onclick="togglePasswordVisibility('form-login-password', 'toggle-login-password-visibility')">
                            </div>
                            <div class="w-full flex justify-center">
                                <button type="submit" class="w-fit btn rounded-lg px-16 mt-32">Autentifica-te</button>
                            </div>
                            <button class="subtext mt-16 underline-hover" type="button" onclick="openRecoverPasswordModal()" role="button" aria-label="Recupereaza Parola" tabindex="0">Parola uitata?</button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="register-lightbox" class="w-full h-screen flex justify-center align-center modal">
                <div class="modal-container">
                    <div class="relative header row justify-between align-center">
                        <div></div>
                        <img class="logo-footer" alt="Emex - un brand de incredere" src="{{ asset('resources/new_design/general/logo-footer.png') }}">
                        <button onclick="closeModal('register-lightbox')" role="button" tabindex="0" class="close-btn" aria-label="Inchide">
                            <span class="flex align-center">
                                <img src="{{ asset('resources/new_design/icons/close.svg') }}" alt="Close Auth Lightbox" width="32" height="32">
                            </span>
                        </button>
                    </div>
                    <div class="header-buttons">
                        <div class="header-button">Creeaza cont</div>
                        <button class="header-button clickable" onclick="switchModal('register-lightbox', 'auth-lightbox')" role="button" aria-label="Autentificare" tabindex="0">Autentificare</button>
                    </div>
                    <div class="col align-center content">
                        <form class="col w-full" method="POST" action="{{ route('register') }}">
                            @csrfWithoutAutocomplete
                            <div class="form-group w-full">
                                <label for="form-register-last-name">Nume<span class="text-red">*</span></label>
                                <input class="w-full" id="form-register-last-name" type="text" name="last_name" required>
                            </div>
                            <div class="form-group w-full">
                                <label for="form-register-first-name">Prenume<span class="text-red">*</span></label>
                                <input class="w-full" id="form-register-first-name" type="text" name="first_name" required>
                            </div>
                            <div class="form-group w-full">
                                <label for="form-register-email">Adresa de email<span class="text-red">*</span></label>
                                <input class="w-full" id="form-register-email" type="text" name="email" required>
                            </div>
                            <div class="form-group w-full relative">
                                <label for="form-register-telefon">Telefon<span class="text-red">*</span></label>
                                <input class="w-full" id="form-register-telefon" type="text" name="phone" required>
                            </div>
                            <div class="form-group w-full">
                                <label for="form-register-password">Parola<span class="text-red">*</span></label>
                                <input class="w-full" id="form-register-password" type="password" name="password" required>
                                <img src="{{ asset('resources/new_design/icons/eye-solid.svg') }}" alt="eye-solid-icon" width="20" height="18" class="password-toggle-icon" id="toggle-register-password-visibility" onclick="togglePasswordVisibility('form-register-password', 'toggle-register-password-visibility')">
                            </div>
                            <div class="row align-center">
                                <input type="checkbox" class="hidden" name="terms" id="tc" value="1" required checked>
                                <label class="switch">
                                    <input type="checkbox" name="gdpr" id="gdpr" value="1" required>
                                    <i></i>
                                </label>
                                <span>
                                    Sunt de acord cu
                                    <a href="{{ url('/confidentialitate-gdpr') }}"><em class="link_color1">politica de confidentialitate</em></a> si
                                    <a href="{{ url('/termeni-si-conditii') }}"><em class="link_color1">termeni si conditii</em>.</a>
                                </span>
                            </div>
                            <div class="w-full flex justify-center">
                                <button type="submit" class="w-fit btn btn-blue rounded-lg px-16 mt-16">Creeaza Cont</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="recover-password-lightbox" class="w-full h-screen flex justify-center align-center modal">
                <div class="modal-container">
                    <div class="relative header row justify-between align-center">
                        <div></div>
                        <img class="logo-footer" alt="Emex - un brand de incredere" width="201" height="72" src="{{ asset('resources/new_design/general/logo-footer.png') }}">
                        <button onclick="closeModal('recover-password-lightbox')" role="button" tabindex="0" class="close-btn" aria-label="Recupereaza parola">
                            <span class="flex align-center">
                                <img src="{{ asset('resources/new_design/icons/close.svg') }}" alt="Close Auth Lightbox" width="32" height="32">
                            </span>
                        </button>
                    </div>
                    <div class="col align-center content">
                        <p>Recupereaza Parola</p>
                        <form class="col align-center w-full" method="POST" action="{{ route('password.email') }}">
                            @csrfWithoutAutocomplete
                            <div class="form-group w-full">
                                <label for="form-recover-password" class="form-label">E-mail</label>
                                <input class="w-full" id="form-recover-password" type="email" name="email" required>
                            </div>
                            <button type="submit" class="w-fit btn btn-blue rounded-lg px-16 mt-64">Recupereaza Parola</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="phone-icon" id="phone-overlay">
        <a href="tel:+40724509552">
            <img width="50" height="50" src="{{ asset('images/Phone-mobile.webp') }}" alt="Phone Emex">
        </a>
    </div>

    <div id="contact_email_small_devices" class="email-icon" tabindex="0" role="button" onclick="openLightbox()">
        <img width="50" height="50" src="{{ asset('images/Mail-mobile.webp') }}" alt="Email Emex">
    </div>

    <div class="m-0" id="content_wrapper">
        @yield('content')
    </div>

    <footer class="w-full" id="page-footer">
        <div class="sixth_top"></div>
        <div id="fsr" class="main-container footer-container">
            <div class="logo-section">
                <a href="{{ empty($base_url) ? url('/') : url($base_url) }}" aria-label="Logo Emex by Romtehnochim" title="Marca Emex proprietate a Romtehnochim">
                    <img id="logo-footer" width="201" height="72" src="{{ asset('resources/new_design/general/logo-footer.png') }}" alt="Emex by Romtehnochim logo" title="Marca Emex proprietate a Romtehnochim">
                </a>
                <ul id="fsrfcfu" style="list-style-image: url('{{ asset('resources/images/light-list.png') }}'); margin: -10px 0 10px 15px;">
                    <li>
                        <p class="mt-16">Productie lacuri, vopsele, tencuieli, pardoseli.</p>
                    </li>
                    <li>
                        <p>Productie vopsele epoxidice, poliuretanice, poliesterice, clorcauciuc.</p>
                    </li>
                    <li>
                        <p>Aplicari profesionale de pardoseli epoxidice si poliuretanice.</p>
                    </li>
                </ul>
                <div class="col contact-info-container">
                    <a href="https://maps.app.goo.gl/GM6pEhVhbmxqmZSK9" class="cursor-pointer" target="_blank">
                        <div class="row align-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4A4A4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>
                                Str. Steaua Sudului Nr. 22, Jilava, Ilfov, Romania
                            </span>
                        </div>
                    </a>
                    <div class="infos-row">
                        <div class="row align-center my-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4A4A4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <a href="tel:+40214571693">+4021-457.1693</a>, <a href="tel:+40785-232.552">+40785-232.552</a>
                        </div>
                        <div class="row align-center my-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4A4A4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <a href="mailto:office@emex.ro"><em>office@emex.ro</em></a>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-2" id="footer-links-news">
                    <div class="col">
                        <p class="title">LINKURI UTILE</p>
                        <div class="link-section">
                            <div class="section">
                                <ul class="one-half">
                                    <li>
                                        <a href="{{ url('/') }}" rel="noopener noreferrer">Acasa</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/despre-noi') }}" rel="noopener noreferrer">Despre noi</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/servicii') }}" rel="noopener noreferrer">Servicii</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/blog') }}" rel="noopener noreferrer">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/certificari-iso') }}" rel="noopener noreferrer">Certificari</a>
                                    </li>
                                </ul>
                                <ul class="one-half" id="one-half-right">
                                    <li>
                                        <a href="{{ url('/cartela-culori-ral-vopsele') }}" rel="noopener noreferrer">Paleta Culori RAL</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/cartela-culori-lavabile') }}" rel="noopener noreferrer">Paletar Lavabile</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/contact') }}" rel="noopener noreferrer">Contact</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/solicita-cotatie') }}" rel="noopener noreferrer">Solicita Cotatie</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/angajari') }}" rel="noopener noreferrer"><strong><em>- Angajari -</em></strong></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col" id="recent-news">
                        <div class="footer_news_area">
                            <h3 class="title">Stiri recente</h3>
                            @php
                            $blogArticles = \App\Models\BlogArticle::latest()->limit(3)->get();
                            @endphp
                            <div class="col" id="recent-news-list">
                                @foreach ($blogArticles as $blogArticle)
                                <div>
                                    <div class="news_row mb-16">
                                        <h4 class="news-title">
                                            <a href="{{ route('blog.article.show', ['slug' => $blogArticle->slug]) }}">
                                                <em class="link_color1">{{ $blogArticle->title }}</em>
                                            </a>
                                        </h4>
                                        <p>{{ $blogArticle->created_at->format('j.m.Y') }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="newsletter-section">
                <div class="title">Newsletter</div>
                <p>
                    Daca doriti sa aflati noutati despre noi sau produsele noastre puteti sa ne lasati adresa de mail. Atunci cand vom lansa un produs nou, sau vom desfasura un eveniment cu adevarat important, veti primi informatia.
                </p>
                <form id="newsletter_form" method="POST" class="w-full mt-16" action="{{ route('newsletter.subscribe') }}">
                    @csrfWithoutAutocomplete
                    <input type="hidden" name="current_url" value="{{ request()->url() }}">
                    <input type="email" required class="w-full form-control" name="NewsletterEmails[email]" placeholder="Adauga email..." id="nfi">
                    <input type="submit" class="btn btn-blue w-full mt-8" id="nfs_btn" value="Aboneaza-te">
                </form>
            </div>
        </div>

        <div class="main-container">
            <p id="tags_h4">
                <?php
                $tags = [];
                $currentUrl = trim(request()->path(), '/');
                $currentUrl = explode('/', $currentUrl);
                $currentUrl = end($currentUrl);

                $filePath = public_path('tags/tags.csv');

                if (file_exists($filePath) && ($handle = fopen($filePath, 'r')) !== false) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                        $tags[$data[0]] = $data[1];
                    }
                    fclose($handle);
                }

                echo !empty($tags[$currentUrl]) ? $tags[$currentUrl] : '';
                ?>
            </p>
        </div>

        <div class="bottom-section main-container" id="ftr">
            <div id="fc" class="row align-center">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_312_8025)">
                        <path d="M10.08 10.86C10.13 10.53 10.24 10.24 10.38 9.99C10.52 9.74 10.72 9.53 10.97 9.37C11.21 9.22 11.51 9.15 11.88 9.14C12.11 9.15 12.32 9.19 12.51 9.27C12.71 9.36 12.89 9.48 13.03 9.63C13.17 9.78 13.28 9.96 13.37 10.16C13.46 10.36 13.5 10.58 13.51 10.8H15.3C15.28 10.33 15.19 9.9 15.02 9.51C14.85 9.12 14.62 8.78 14.32 8.5C14.02 8.22 13.66 8 13.24 7.84C12.82 7.68 12.36 7.61 11.85 7.61C11.2 7.61 10.63 7.72 10.15 7.95C9.67 8.18 9.27 8.48 8.95 8.87C8.63 9.26 8.39 9.71 8.24 10.23C8.09 10.75 8 11.29 8 11.87V12.14C8 12.72 8.08 13.26 8.23 13.78C8.38 14.3 8.62 14.75 8.94 15.13C9.26 15.51 9.66 15.82 10.14 16.04C10.62 16.26 11.19 16.38 11.84 16.38C12.31 16.38 12.75 16.3 13.16 16.15C13.57 16 13.93 15.79 14.24 15.52C14.55 15.25 14.8 14.94 14.98 14.58C15.16 14.22 15.27 13.84 15.28 13.43H13.49C13.48 13.64 13.43 13.83 13.34 14.01C13.25 14.19 13.13 14.34 12.98 14.47C12.83 14.6 12.66 14.7 12.46 14.77C12.27 14.84 12.07 14.86 11.86 14.87C11.5 14.86 11.2 14.79 10.97 14.64C10.72 14.48 10.52 14.27 10.38 14.02C10.24 13.77 10.13 13.47 10.08 13.14C10.03 12.81 10 12.47 10 12.14V11.87C10 11.52 10.03 11.19 10.08 10.86ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" fill="#434447" />
                    </g>
                    <defs>
                        <clipPath id="clip0_312_8025">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                <p>
                    {{ date('Y') }}
                    Emex By Romtehnochim. Toate drepturile rezervate.
                </p>
            </div>
            <div id="footer_links">
                <ul class="footer-list">
                    <li>
                        <a href="{{ url('/sitemap.htm') }}">Sitemap</a>
                    </li>
                    <li>
                        <a class="desktop-terms" href="{{ url('/termeni-si-conditii') }}">Termeni si conditii</a>
                    </li>
                    <li><a href="{{ url('/confidentialitate-gdpr') }}">Protectie date</a></li>
                    <li><a href="{{ url('/politica-de-licentiere') }}">Licentiere</a></li>
                    <li><a href="{{ url('/politica-de-retur') }}">Retur</a></li>
                    <li><a href="{{ url('/faq') }}">Faq</a></li>
                    <li><a href="{{ url('/contact') }}" class="b-0">Contact</a></li>
                </ul>
            </div>

            <div id="fsm" class="sprites">
                <span>
                    <a href="{{ url('/blog') }}" title="Blog Emex by Romtehnochim" aria-label="Accesează Blogul Emex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 179.51975 179.20429">
                            <path fill="#f06a35" d="M20.512413 178.49886c-3.359449-.8837-6.258272-2.1837-8.931866-4.0056-2.256922-1.5379-5.555601-4.7174-6.810077-6.5637-1.532132-2.255-3.293254-6.1168-4.010994-8.795-.732062-2.7319-.743927-3.8198-.757063-69.39501-.01306-65.24411.0018-66.67877.719335-69.48264C3.259268 10.34132 11.117019 2.7971 21.251347.54646 24.165189-.10065 154.331139-.21383 157.47424.42803c8.508999 1.73759 15.197718 6.84619 19.06824 14.56362 3.07712 6.13545 2.80203-.61622 2.94296 72.23085.0897 46.34991.007 65.80856-.28883 68.23286-1.38576 11.3442-9.210679 20.1431-20.470153 23.0183-2.880202.7354-3.882129.7459-69.275121.7259-63.227195-.019-66.474476-.052-68.938923-.7007z" />
                            <path fill="none" d="M-82.99522 87.83767V-84.06232h1020v343.79998h-1020V87.83767z" />
                            <path fill="#fff" d="M115.16168 144.83466c8.064748-1.1001 14.384531-4.3325 20.313328-10.3896 4.288999-4.38181 6.973811-9.12472 8.728379-15.41921.728903-2.6149.790018-3.88807.923587-19.24149.100809-11.58796.01669-17.01514-.285075-18.38528-.437344-1.98593-1.67711-3.83016-3.091687-4.59911-.435299-.23661-3.224334-.53819-6.197859-.67015-4.982681-.22115-5.540155-.31832-7.11287-1.24-2.494681-1.46198-3.181724-3.04069-3.188544-7.32677-.01304-8.1894-3.421087-15.79237-10.154891-22.65435-4.797263-4.8886-10.14889-8.19759-16.256563-10.05172-1.462167-.44388-4.736105-.59493-15.7023605-.72452-17.2069763-.20332-21.0264035.14939-26.8842785 2.48265-10.799733 4.30168-18.559563 13.36742-21.390152 24.98992-.531646 2.18295-.634845 5.6815-.760427 25.77865-.157327 25.17748.01622 28.87467 1.589422 33.86414 1.299798 4.12233 2.611223 6.64844 5.312916 10.23388 5.146805 6.83036 12.860236 11.76336 20.572006 13.15646 3.669923.6631 48.94793.829 53.585069.1965z" />
                            <path fill="#f06a35" d="M67.5750093 75.71747c-4.1229413-1.13646-5.6634683-7.05179-2.6332273-10.11109 1.9367555-1.95536 2.4721802-2.02981 14.5952492-2.02981 10.8833578 0 11.2491898.0238 12.8478758.83129 2.310253 1.16711 3.314106 2.81263 3.314106 5.43252 0 2.36619-.942769 4.0244-3.045645 5.35691-1.129143.71549-1.803912.76002-12.4672419.82265-6.5844803.0387-11.829856-.0872-12.6111168-.30247zm-.5165819 39.80858c-1.7697484-.77113-3.4178244-2.91327-3.7026534-4.81263-.271319-1.80929.637963-4.29669 2.031786-5.55809 1.7569755-1.59003 2.5280723-1.64307 24.134743-1.66008 22.226353-.0174 22.11068-.0268 24.218307 1.94113 2.976827 2.77944 2.348939 7.7279-1.238363 9.75964l-3.686323.59948-19.213121.22489c-16.8830622.19762-21.6656419-.1114-22.5443756-.49433z" />
                        </svg>
                    </a>
                </span>
                <span>
                    <a href="https://www.linkedin.com/company/romtehnochim" title="linkedin">
                        <em class="sprite-linkedin"></em>
                    </a>
                </span>
                <span>
                    <a href="https://www.youtube.com/c/EmexRomtehnochim" title="youtube">
                        <em class="sprite-youtube"></em>
                    </a>
                </span>
                <span>
                    <a href="https://ro.pinterest.com/romtehnochim/" title="pinterest">
                        <em class="sprite-pinterest"></em>
                    </a>
                </span>
                <span>
                    <a href="https://www.instagram.com/emexbyromtehnochim/" title="instagram">
                        <em class="sprite-instagram"></em>
                    </a>
                </span>
                <span>
                    <a href="https://twitter.com/Romtehnochim" title="twitter">
                        <em class="sprite-twitter"></em>
                    </a>
                </span>
                <span>
                    <a href="https://www.facebook.com/EmexByRomtehnochim/" title="facebook">
                        <em class="sprite-facebook"></em>
                    </a>
                </span>
            </div>
        </div>
    </footer>

    @if (session('success'))
    <div class="flash-messages-container">
        <div class="alert-message alert-message-success">
            <p>{{ session('success') }}</p>
            <button type="button" class="close-flash-message" aria-label="Inchide" onclick="closeFlashMessage(this)">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="flash-messages-container">
        <div class="alert-message alert-message-error">
            <p>{{ session('error') }}</p>
            <button type="button" class="close-flash-message" aria-label="Inchide" onclick="closeFlashMessage(this)">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="flash-messages-container">
        <div class="alert-message alert-message-error">
            <p>
                {{ implode('. ', $errors->all()) }}
            </p>
            <button type="button" class="close-flash-message" aria-label="Inchide" onclick="closeFlashMessage(this)">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    <div id="sidebar-left" class="sidebar hidden bg-white">
        <nav class="col">
            <a href="{{ url('/') }}" class="mb-32" title="acasa">
                <img src="{{ asset('resources/new_design/general/logo-footer.png') }}" height="72" width="201" alt="Emex - un brand de incredere" title="Emex - brand al companiei Romtehnochim">
            </a>
            <section>
                <div class="categorii-mobile">
                    <a href="{{ url('/') }}" title="Acasa">Acasa</a>
                </div>
            </section>
            <div class="categorii" id="cine-suntem" onclick="toggleAccordion('cine-suntem')">
                <div class="categorii-mobile">
                    <div class="menu-item">
                        Cine suntem
                        <span class="arrow-menu">▼</span>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-mobile" id="cine-suntem-menu">
                    <li><a href="{{ url('/despre-noi') }}" title="Despre noi">Despre noi</a></li>
                    <li><a href="{{ url('/politica-de-calitate') }}" title="Politica de Calitate">Politica de Calitate</a></li>
                    <li><a href="{{ url('/politica-de-mediu') }}" title="Politica de Mediu">Politica de Mediu</a></li>
                    <li><a href="{{ url('/politica-sanatate-securitate') }}" title="Politica de Securitate">Politica de Securitate</a></li>
                    <li><a href="{{ url('/certificari-iso') }}" title="Certificari ISO">Certificari ISO</a></li>
                    <li><a href="https://emex.ro/catalog-emex.pdf" title="Catalog Emex">Catalog “Emex”</a></li>
                </ul>
            </div>
            <div class="categorii" id="produse" onclick="toggleAccordion('produse')">
                <div class="categorii-mobile">
                    <div class="menu-item">
                        Produse
                        <span class="arrow-menu">▼</span>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-mobile" id="produse-menu">
                    <li id="apmim_mob"><a href="{{ url('/produse') }}" title="toate produsele">Toate Produsele</a></li>

                    @foreach ($categories as $ind => $category)
                    <li>
                        <a href="{{ url($category->slug) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach

                </ul>
            </div>
            <div class="categorii" id="aplicare" onclick="toggleAccordion('aplicare')">
                <div class="categorii-mobile">
                    <div class="menu-item">
                        Aplicare
                        <span class="arrow-menu">▼</span>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-mobile" id="aplicare-menu">
                    <li><a href="{{ url('/aplicare-vopsele-lavabile') }}" title="Vopsele Lavabile">Vopsele Lavabile</a></li>
                    <li><a href="{{ url('/aplicare-email') }}" title="Emailuri Decorative">Emailuri Decorative</a></li>
                    <li><a href="{{ url('/aplicare-lacuri-alchidice') }}" title="Lacuri Monocomponente">Lacuri Monocomponente</a></li>
                    <li><a href="{{ url('/aplicare-tencuiala-decorativa') }}" title="Tencuieli Decorative">Tencuieli Decorative</a></li>
                    <li><a href="{{ url('/aplicare-vopsele-grunduri-bicomponente') }}" title="Vopsele Bicomponente">Vopsele Bicomponente</a></li>
                    <li><a href="{{ url('/aplicare-vopsele-pardoseala') }}" title="Vopsele Pardoseala">Vopsele Pardoseala</a></li>
                    <li><a href="{{ url('/aplicare-vopsea-marcaj-rutier') }}" title="Vopsea Marcaj Rutier">Vopsea Marcaj Rutier</a></li>
                    <li><a href="{{ url('/aplicare-pardoseli-autonivelante-bicomponente') }}" title="Pardoseli Bicomponente">Pardoseli Bicomponente</a></li>
                    <li><a href="{{ url('/aplicare-membrana-hidroizolanta-poliuretanica') }}" title="Membrana Poliuteranica">Membrana Poliuteranica</a></li>
                    <li><a href="{{ url('/aplicare-vopsele-hidrosolubile') }}" title="Vopsele Hidrosolubile">Vopsele Hidrosolubile</a></li>
                </ul>
            </div>
            <div class="categorii" id="consum" onclick="toggleAccordion('consum')">
                <div class="categorii-mobile">
                    <div class="menu-item">
                        Consum
                        <span class="arrow-menu">▼</span>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-mobile" id="consum-menu">
                    @foreach ($categories as $ind => $category)
                    <li>
                        <a href="{{ route('consum.index', ['category' => $category->slug]) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="categorii" id="servicii" onclick="toggleAccordion('servicii')">
                <div class="categorii-mobile">
                    <div class="menu-item">
                        Servicii
                        <span class="arrow-menu">▼</span>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-mobile" id="servicii-menu">
                    <li><a href="{{ url('/aplicare-covor-epoxidic-stb') }}" title="Pardoseli Cuartz">Pardoseli Cuartz Epoxi</a></li>
                    <li><a href="{{ url('/aplicare-pardoseala-epoxidica-autonivelanta') }}" title="Autonivelanta Epoxi">Autonivelanta Epoxi</a></li>
                    <li><a href="{{ url('/vopsire-epoxidica-pardoseli') }}" title="Vopsiri Epoxidice">Vopsiri Epoxidice</a></li>
                    <li><a href="{{ url('/servicii') }}" title="Servicii Generale">Servicii Generale</a></li>
                </ul>
            </div>
            <div class="categorii" id="culori" onclick="toggleAccordion('culori')">
                <div class="categorii-mobile">
                    <div class="menu-item">
                        Culori
                        <span class="arrow-menu">▼</span>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-mobile" id="culori-menu">
                    <li><a href="{{ url('/cartela-culori-ral-vopsele') }}" title="Cartela RAL">Cartela RAL - Emailuri</a></li>
                    <li><a href="{{ url('/cartela-culori-lavabile') }}" title="Paletar Lavabile">Paletar Lavabile</a></li>
                </ul>
            </div>
            <section>
                <div class="categorii-mobile">
                    <a href="{{ url('/blog') }}" title="blog">Blog</a>
                </div>
            </section>
            <section>
                <div class="categorii-mobile">
                    <a href="{{ url('/contact') }}" title="contact">Contact</a>
                </div>
            </section>
            <div class="contul_meu">
                @if (Auth::check())
                <a href="{{ url('/contul-meu') }}" title="Setari cont">Setari cont</a>
                <a href="{{ url('/wishlist') }}" title="Favorite">Favorite</a>
                <a href="{{ url('/contul-meu') }}" title="Istoric">Istoric</a>
                <a href="{{ url('/contul-meu') }}" title="Facturare">Facturare</a>
                <a href="{{ route('logout') }}" id="logoutButtonMobile" title="Iesire"
                    onclick="event.preventDefault(); document.getElementById('logout-form-mobil').submit();">
                    Iesire din cont
                </a>
                <form id="logout-form-mobil" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrfWithoutAutocomplete
                </form>
                @else
                <button id="auth_lightbox_trigger_mobile" type="button" class="btn btn-blue" onclick="toggleSidebar()" role="button" aria-label="Autentificare">
                    Autentificare
                </button>
                @endif
            </div>
        </nav>
    </div>

    <div id="mobile-sidebar-open-backdrop" class="hidden"></div>

    <div id="global-lightbox" class="lightbox hidden">
        <div class="lightbox-content">
            <span class="close-btn" style=" background-image: url('{{ asset('resources/images/sprite.png') }}');" onclick="closeServiciiLightbox()"></span>
            <img id="global-lightbox-image" src="{{ asset('images/landing/stb/mici/Pardoseala-cuartz-epoxdica-depozit-legume.jpg') }}" alt="global-lightbox image" title="Global Lightbox Image">
        </div>
    </div>

    <script>
        var sidebar = document.getElementById('sidebar-left');
        var bodyBackdrop = document.getElementById('mobile-sidebar-open-backdrop');
        var body = document.getElementsByTagName('body')[0];
        var content_wrapper = document.getElementById('content_wrapper');

        function toggleSidebar() {
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                bodyBackdrop.classList.remove('hidden');
                body.classList.add('overflow-y-hidden');
                content_wrapper.classList.add('overflow-y-hidden');
                setTimeout(function() {
                    document.addEventListener('click', handleClickOutsideSidebar);
                }, 100);
            } else {
                hideSidebar();
            }
        }

        function handleClickOutsideSidebar(event) {
            if (!sidebar.contains(event.target) && event.target.id !== 'toggleSidebarButton') {
                hideSidebar();
            }
        }

        function hideSidebar() {
            sidebar.classList.add('hidden');
            bodyBackdrop.classList.add('hidden');
            body.classList.remove('overflow-y-hidden');
            content_wrapper.classList.remove('overflow-y-hidden');
            document.removeEventListener('click', handleClickOutsideSidebar);
        }

        function toggleAccordion(id) {
            var openedMenus = document.querySelectorAll(".dropdown-menu-mobile");
            var allMenuItems = document.querySelectorAll(".menu-item");

            openedMenus.forEach(function(menu) {
                if (menu.id !== id + "-menu") {
                    menu.style.display = "none";
                }
            });

            allMenuItems.forEach(function(item) {
                if (item.id !== id) {
                    item.classList.remove("open");
                }
            });

            var menu = document.getElementById(id + "-menu");
            var parentItem = document.getElementById(id).querySelector(".menu-item");

            if (menu.style.display === "none" || menu.style.display === "") {
                menu.style.display = "block";
                parentItem.classList.add("open");
            } else {
                menu.style.display = "none";
                parentItem.classList.remove("open");
            }
        }

        var authContainer = document.querySelector('.autentificare-1');

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
            authContainer.style.opacity = '0';
            authContainer.style.display = 'none';
        }

        function switchModal(currentModalId, targetModalId) {
            document.getElementById(currentModalId).style.display = 'none';
            document.getElementById(targetModalId).style.display = 'flex';
        }

        function openRecoverPasswordModal() {
            document.getElementById('auth-lightbox').style.display = 'none';
            document.getElementById('register-lightbox').style.display = 'none';
            document.getElementById('recover-password-lightbox').style.display = 'flex';
        }

        let authLightboxTrigger = document.getElementById('auth_lightbox_trigger');
        if (authLightboxTrigger) {
            authModalListener(authLightboxTrigger);
        }

        let authLightboxTriggerMobile = document.getElementById('auth_lightbox_trigger_mobile');
        if (authLightboxTriggerMobile) {
            authModalListener(authLightboxTriggerMobile);
        }

        function authModalListener(trigger) {
            trigger.addEventListener('click', function() {
                authContainer.style.opacity = '1';
                authContainer.style.display = 'inline-block';
                document.getElementById('auth-lightbox').style.display = 'flex';
            });
        }

        function closeFlashMessage(button) {
            const messageElement = button.closest('.alert-message');
            messageElement.style.display = 'none';

            const container = document.querySelector('.flash-messages-container');
            const remainingMessages = container.querySelectorAll('.alert-message');

            let visibleMessages = Array.from(remainingMessages).filter(function(message) {
                return message.style.display !== 'none';
            });

            if (visibleMessages.length === 0) {
                container.style.display = 'none';
            }
        }

        function togglePasswordVisibility(inputId, iconId) {
            const passwordField = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.src = "{{ asset('resources/new_design/icons/eye-slash-solid.svg') }}";
            } else {
                passwordField.type = 'password';
                toggleIcon.src = "{{ asset('resources/new_design/icons/eye-solid.svg') }}";
            }
        }

        document.addEventListener('scroll', function() {
            if (window.innerWidth <= 767) {
                const footer = document.getElementById('page-footer');
                const phoneOverlay = document.getElementById('phone-overlay');
                const emailOverlay = document.getElementById('contact_email_small_devices');

                const footerRect = footer.getBoundingClientRect();

                if (footerRect.top <= window.innerHeight && footerRect.bottom >= 0) {
                    phoneOverlay.style.display = 'none';
                    emailOverlay.style.display = 'none';
                } else {
                    phoneOverlay.style.display = 'block';
                    emailOverlay.style.display = 'block';
                }
            }
        });

        document.getElementById('search-icon').addEventListener('click', function() {
            document.getElementById('search-form-desktop').submit();
        });
    </script>
</body>

</html>