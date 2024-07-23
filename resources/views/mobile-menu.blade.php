<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Menu</title>
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
    

    <div class="w-full mobile-header">
        <div class="main-container row justify-between align-center gap-md">
            <button role="menu" title="open-menu" aria-label="Meniu" onclick="toggleSidebar()">
                <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0.65" y1="1.35" x2="15.35" y2="1.35" stroke="black" stroke-width="1.3" stroke-linecap="round" />
                    <line x1="0.65" y1="7.35" x2="11.35" y2="7.35" stroke="black" stroke-width="1.3" stroke-linecap="round" />
                    <line x1="0.65" y1="13.35" x2="15.35" y2="13.35" stroke="black" stroke-width="1.3" stroke-linecap="round" />
                </svg>
            </button>
            <a href="{{ url('/') }}" title="Pagina principala" class="mobile-logo">
                <img src="{{ asset('resources/new_design/general/logo.png') }}" height="47.22" width="144" alt="Emex - un brand de incredere" title="Emex - brand al companiei Romtehnochim" class="logo">
            </a>

            <div class="row gap-lg w-full justify-end">
                <button id="open-search" title="open-search" role="button" class="cursor-pointer" onclick="toggleSearchLightbox()" aria-label="Cauta">
                    <img src="{{ asset('resources/new_design/icons/search.svg') }}" width="16" height="16" alt="search-icon">
                </button>
                <a href="{{ url('/wishlist') }}" class="relative nav-icon" title="Favorite">
                    <div class="flex align-center">
                        <img width="20" height="20" src="{{ asset('resources/new_design/icons/star.svg') }}" title="review-star" alt="review-star">
                    </div>
                    <div class="circle">
                        <span>
                            0 {{-- {{ $wishlist_products_count }} --}}
                        </span>
                    </div>
                </a>
                <a href="{{ url('/produse-adaugate') }}" class="relative nav-icon" title="Cos">
                    <div class="flex align-center">
                        <img width="20" height="20" src="{{ asset('resources/new_design/icons/cart.svg') }}" alt="cart-icon">
                    </div>
                    <div class="circle">
                        <span>
                            0 {{-- {{ $preorder_count }} --}}
                        </span>
                    </div>
                </a>
            </div>

            <div id="search-lightbox" class="search-lightbox" style="display: none;">
                <form class="relative col justify-center align-center w-full h-full gap-xs" method="GET" action="{{ url('/search') }}">
                    @csrf
                    <div class="row w-full align-center">
                        <img src="{{ asset('resources/new_design/icons/search.svg') }}" id="search-icon" width="16" height="16">
                        <input id="search-input-mobile" type="text" name="zoom_query" class="form-control w-full" placeholder="Cauta dupa nume produs sau cod SKU">
                    </div>
                    <div class="btns">
                        <div role="button" onclick="toggleSearchLightbox()" tabindex="0">Anuleaza</div>
                        <input type="submit" role="button" value="Cauta">
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>