@php
use Illuminate\Support\Str;
@endphp



<ul class="navigation_ul row align-center gap-md font-500">

@php
    $acasa = false;
    $despre_noi = false;
    $produse = false;
    $aplicare = false;
    $consum = false;
    $servicii = false;
    $paletar = false;

    $url = request()->url();

    if (Str::contains($url, ['despre-noi', 'politica', 'certificari'])) {
        $despre_noi = true;
    } elseif (Str::contains($url, 'produse') || (!empty($json_data) && !empty($json_data['type']) && $json_data['type'] == 'category')) {
        $produse = true;
    } elseif (!empty($json_data) && !empty($json_data['type']) && $json_data['type'] == 'product') {
        $produse = true;
    } elseif (Str::contains($url, 'consum')) {
        $consum = true;
    } elseif (Str::contains($url, ['aplicare-covor-epoxidic-stb', 'aplicare-pardoseala-epoxidica-autonivelanta', 'vopsire-epoxidica-pardoseli', 'servicii'])) {
        $servicii = true;
    } elseif (Str::contains($url, 'aplicare')) {
        $aplicare = true;
    } elseif (Str::contains($url, ['cartela-culori-ral-vopsele', 'cartela-culori-lavabile'])) {
        $paletar = true;
    } else {
        $acasa = true;
    }
@endphp

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

                @foreach ($categories as $ind => $category)
                    <div class="products-dropdown-categories{{ $ind % 2 > 0 ? ' blue-item' : '' }}">
                        <a href="{{ url($category->slug) }}">
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </li>

    {{-- <li class="dropdown products-dropdown">
        <span class="dropdown-toggle menuitm" data-toggle="dropdown">
            Aplicare
            <img src="{{ asset('resources/new_design/icons/expand_more.svg') }}" height="24" width="24" alt="See more" title="See more">
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

    </li> --}}

    <li class="dropdown products-dropdown">
        <span class="dropdown-toggle menuitm" data-toggle="dropdown">
            Aplicare
            <img src="{{ asset('resources/new_design/icons/expand_more.svg') }}" height="24" width="24" alt="See more" title="See more">
        </span>
        <div class="dropdown-menu">
            <ul class="category-wrapper">
                <div class="products-dropdown-categories">
                    <a href="{{ url('/aplicare-vopsele-lavabile') }}" title="Aplicare vopsele lavabile">Vopsele Lavabile</a>
                </div>
                <div class="products-dropdown-categories blue-item">
                    <a href="{{ url('/aplicare-email') }}" title="Aplicare email">Emailuri Decorative</a>
                </div>
                <div class="products-dropdown-categories">
                    <a href="{{ url('/aplicare-lacuri-alchidice') }}" title="Aplicare lacuri alchidice">Lacuri Monocomponente</a>
                </div>
                <div class="products-dropdown-categories blue-item">
                    <a href="{{ url('/aplicare-tencuiala-decorativa') }}" title="Tencuieli Decorative">Tencuieli Decorative</a>
                </div>
                <div class="products-dropdown-categories">
                    <a href="{{ url('/aplicare-vopsele-grunduri-bicomponente') }}" title="Vopsele Bicomponente">Vopsele Bicomponente</a>
                </div>
                <div class="products-dropdown-categories blue-item">
                    <a href="{{ url('/aplicare-vopsele-pardoseala') }}" title="Vopsele Pardoseala">Vopsele Pardoseala</a>
                </div>
                <div class="products-dropdown-categories">
                    <a href="{{ url('/aplicare-vopsea-marcaj-rutier') }}" title="Vopsea Marcaj Rutier">Vopsea Marcaj Rutier</a>
                </div>
                <div class="products-dropdown-categories blue-item">
                    <a href="{{ url('/aplicare-pardoseli-autonivelante-bicomponente') }}" title="Pardoseli Bicomponente">Pardoseli Bicomponente</a>
                </div>
                <div class="products-dropdown-categories">
                    <a href="{{ url('/aplicare-membrana-hidroizolanta-poliuretanica') }}" title="Membrana Poliuteranica">Membrana Poliuteranica</a>
                </div>
                <div class="products-dropdown-categories blue-item">
                    <a href="{{ url('/aplicare-vopsele-hidrosolubile') }}" title="Membrana Poliuteranica">Vopsele Hidrosolubile</a>
                </div>
            </ul>
        </div>
    </li>

    <li class="dropdown products-dropdown">
        <span class="dropdown-toggle menuitm" data-toggle="dropdown">
            Servicii
            <img src="{{ asset('resources/new_design/icons/expand_more.svg') }}" height="24" width="24" alt="See more" title="See more">
        </span>
        <div class="dropdown-menu">
            <ul class="category-wrapper">
                <div class="products-dropdown-categories">
                    <a href="{{ url('/aplicare-covor-epoxidic-stb') }}" title="Pardoseli Cuartz Epoxi">Pardoseli Cuartz Epoxi</a>
                </div>
                <div class="products-dropdown-categories blue-item">
                    <a href="{{ url('/aplicare-pardoseala-epoxidica-autonivelanta') }}" title="Autonivelanta Epoxi">Autonivelanta Epoxi</a>
                </div>
                <div class="products-dropdown-categories">
                    <a href="{{ url('/vopsire-epoxidica-pardoseli') }}" title="Vopsiri Epoxidice">Vopsiri Epoxidice</a>
                </div>
                <div class="products-dropdown-categories blue-item">
                    <a href="{{ url('/servicii') }}" title="Vopsiri Epoxidice">Servicii Generale</a>
                </div>
            </ul>
        </div>
    </li>

    <li class="dropdown products-dropdown">
        <span class="dropdown-toggle menuitm" data-toggle="dropdown">
            Consum
            <img src="{{ asset('resources/new_design/icons/expand_more.svg') }}" height="24" width="24" alt="See more" title="See more">
        </span>
        <div class="dropdown-menu">
            <ul class="category-wrapper">
                @foreach ($categories as $ind => $category)
                    <div class="products-dropdown-categories{{ $ind % 2 > 0 ? ' blue-item' : '' }}">
                        <a href="{{ url($category->slug) }}">
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
            </ul>
        </div>
    </li>

    <li class="dropdown products-dropdown">
        <span class="dropdown-toggle menuitm" data-toggle="dropdown">
            Culori
            <img src="{{ asset('resources/new_design/icons/expand_more.svg') }}" height="24" width="24" alt="See more" title="See more">
        </span>
        <div class="dropdown-menu">
            <ul class="category-wrapper">
                <div class="products-dropdown-categories">
                    <a href="{{ url('/cartela-culori-ral-vopsele') }}" title="Cartela RAL - Emailuri">Cartela RAL - Emailuri</a>
                </div>
                <div class="products-dropdown-categories blue-item">
                    <a href="{{ url('/cartela-culori-lavabile') }}" title="Paletar Lavabile">Paletar Lavabile</a>
                </div>
            </ul>
        </div>
    </li>

    {{-- <li class="dropdown products-dropdown">
        <span class="dropdown-toggle menuitm" data-toggle="dropdown">
            Culori
            <img src="{{ asset('resources/new_design/icons/expand_more.svg') }}" height="24" width="24" alt="See more" title="See more">
        </span>
        <div class="dropdown-menu">
            <ul class="category-wrapper">
                @foreach ($categories as $ind => $category)
                    <div class="products-dropdown-categories{{ $ind % 2 > 0 ? ' blue-item' : '' }}">
                        <a href="{{ url($category->slug) }}">
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
            </ul>
        </div>
    </li> --}}

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

