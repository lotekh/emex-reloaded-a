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

 
    <ul class="navigation_ul row align-center gap-md font-500">
        <li class="dropdown products-dropdown" id="productsDropdown">
            <div class="dropdown-toggle menuitm" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="products-menuitm-icon">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
                Produse
            </div>
            <div class="dropdown-menu">
                <div class="products-dropdown-container">
                    <div class="products-dropdown-categories all-products">
                        <a href="{{ url('/produse') }}">
                            Toate produsele
                        </a>
                    </div>
                </div>
            </div>
        </li>

        <li class="dropdown products-dropdown">
            <span class="dropdown-toggle menuitm" data-toggle="dropdown">
                Aplicare
                <img src="{{ asset('images/new_design/icons/expand_more.svg') }}" height="24" width="24" alt="See more" title="See more">
            </span>
            
            <div class="dropdown-menu">
                <ul class="category-wrapper">
                    <li><a href="{{ url('/aplicare-vopsele-lavabile') }}" title="Aplicare vopsele lavabile">Vopsele Lavabile</a></li>
                    <li class="blue-item"><a href="{{ url('/aplicare-email') }}" title="Aplicare email">Emailuri Decorative</a></li>
                    <li><a href="{{ url('/aplicare-lacuri-alchidice') }}" title="Aplicare lacuri alchidice">Lacuri Monocomponente</a></li>
                    <li class="blue-item"><a href="{{ url('/aplicare-tencuiala-decorativa') }}" title="Tencuieli Decorative">Tencuieli Decorative</a></li>
                    <li><a href="{{ url('/aplicare-vopsele-grunduri-bicomponente') }}" title="Vopsele Bicomponente">Vopsele Bicomponente</a></li>
                    <li class="blue-item"><a href="{{ url('/aplicare-vopsele-pardoseala') }}" title="Vopsele Pardoseala">Vopsele Pardoseala</a></li>
                    <li><a href="{{ url('/aplicare-vopsea-marcaj-rutier') }}" title="Vopsea Marcaj Rutier">Vopsea Marcaj Rutier</a></li>
                    <li class="blue-item"><a href="{{ url('/aplicare-pardoseli-autonivelante-bicomponente') }}" title="Pardoseli Bicomponente">Pardoseli Bicomponente</a></li>
                    <li><a href="{{ url('/aplicare-membrana-hidroizolanta-poliuretanica') }}" title="Membrana Poliuteranica">Membrana Poliuteranica</a></li>
                    <li class="blue-item"><a href="{{ url('/aplicare-vopsele-hidrosolubile') }}" title="Membrana Poliuteranica">Vopsele Hidrosolubile</a></li>
                </ul>
            </div>
        </li>

        <li class="dropdown products-dropdown">
            <span class="dropdown-toggle menuitm" data-toggle="dropdown">
                Servicii
                <img src="{{ asset('images/new_design/icons/expand_more.svg') }}" height="24" width="24" alt="See more" title="See more">
            </span>
            <div class="dropdown-menu">
                <ul class="category-wrapper">
                    <li><a href="{{ url('/aplicare-covor-epoxidic-stb') }}" title="Pardoseli Cuartz Epoxi">Pardoseli Cuartz Epoxi</a></li>
                    <li class="blue-item"><a href="{{ url('/aplicare-pardoseala-epoxidica-autonivelanta') }}" title="Autonivelanta Epoxi">Autonivelanta Epoxi</a></li>
                    <li><a href="{{ url('/vopsire-epoxidica-pardoseli') }}" title="Vopsiri Epoxidice">Vopsiri Epoxidice</a></li>
                    <li class="blue-item"><a href="{{ url('/servicii') }}" title="Vopsiri Epoxidice">Servicii Generale</a></li>
                </ul>
            </div>
        </li>

        <li class="dropdown products-dropdown">
            <span class="dropdown-toggle menuitm" data-toggle="dropdown">
                Consum
                <img src="{{ asset('images/new_design/icons/expand_more.svg') }}" height="24" width="24" alt="See more" title="See more">
            </span>
            <div class="dropdown-menu">
                <ul class="category-wrapper">
                   {{-- de luat $categories din back-end --}}
                </ul>
            </div>
        </li>

        <li class="dropdown products-dropdown">
            <span class="dropdown-toggle menuitm" data-toggle="dropdown">
                Culori
                <img src="{{ asset('images/new_design/icons/expand_more.svg') }}" height="24" width="24" alt="See more" title="See more"></img>
            </span>
            <ul class="dropdown-menu">
                <div class="category-wrapper">
                    <li><a href="{{ url('/cartela-culori-ral-vopsele') }}" title="Cartela RAL - Emailuri">Cartela RAL - Emailuri</a></li>
                    <li class="blue-item"><a href="{{ url('/cartela-culori-lavabile') }}" title="Paletar Lavabile">Paletar Lavabile</a></li>
                </div>
            </ul>
        </li>

        <li class="dropdown products-dropdown">
            <a href="{{ url('/blog') }}" title="Blog">
                <span class="dropdown-toggle menuitm" data-toggle="dropdown">
                    Blog
                </span>
            </a>
        </li>

        <li class="dropdown products-dropdown">
            <a href="{{ url('/contact') }}" title="Contact">
                <span class="dropdown-toggle menuitm" data-toggle="dropdown">
                    Contact
                </span>
            </a>
        </li>
    </ul>



</body>

</html>
