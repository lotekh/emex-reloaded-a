<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header2.css') }}">
</head>
<body>

<div id="sidebar-left" class="sidebar">
    <nav class="col">
        <div class="accordion" id="produse">
            <section>
                <header>Produse</header>
                <ul class="dropdown-menu">
                    <li id="apmim_mob"><a href="{{ url('/produse') }}" title="toate produsele">Toate Produsele</a></li>
                    @foreach (\App\Models\Category::where('active', 1)->get() as $category)
                        <li>
                            <a href="{{ url($category->slug) }}" title="{{ $category->name }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </section>
        </div>
        <div class="accordion" id="aplicare">
            <section>
                <header>Aplicare</header>
                <ul class="dropdown-menu">
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
            </section>
        </div>
        <div class="accordion" id="consum">
            <section>
                <header>Consum</header>
                <ul class="dropdown-menu">
                    @foreach (\App\Models\Category::where('active', 1)->get() as $category)
                        @php
                            $category_product = \App\Models\CategoriesProducts::where('category_id', $category->id)->first();
                            $slug = $category_product ? \App\Models\Slug::where('entity_id', $category_product->product_id)->where('type', 'consum')->first() : null;
                        @endphp
                        @if ($slug)
                            <li>
                                <a href="{{ url($slug->slug) }}" title="{{ $category->name }}">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
        </div>
        <div class="accordion" id="servicii">
            <section>
                <header>Servicii</header>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/aplicare-covor-epoxidic-stb') }}" title="Pardoseli Cuartz">Pardoseli Cuartz Epoxi</a></li>
                    <li><a href="{{ url('/aplicare-pardoseala-epoxidica-autonivelanta') }}" title="Autonivelanta Epoxi">Autonivelanta Epoxi</a></li>
                    <li><a href="{{ url('/vopsire-epoxidica-pardoseli') }}" title="Vopsiri Epoxidice">Vopsiri Epoxidice</a></li>
                    <li><a href="{{ url('/servicii') }}" title="Servicii Generale">Servicii Generale</a></li>
                </ul>
            </section>
        </div>
        <div class="accordion" id="culori">
            <section>
                <header>Culori</header>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/cartela-culori-ral-vopsele') }}" title="Cartela RAL">Cartela RAL - Emailuri</a></li>
                    <li><a href="{{ url('/cartela-culori-lavabile') }}" title="Paletar Lavabile">Paletar Lavabile</a></li>
                </ul>
            </section>
        </div>
        <section>
            <header>
                <a href="{{ url('/blog') }}" title="blog">Blog</a>
            </header>
        </section>
        <section>
            <header>
                <a href="{{ url('/contact') }}" title="contact">Contact</a>
            </header>
        </section>
        <div class="contul_meu">
            @if (!Auth::guest())
                <a href="{{ url('/contul-meu') }}" title="Setari cont">Setari cont</a>
                <a href="{{ url('/wishlist') }}" title="Favorite">Favorite</a>
                <a href="{{ url('/contul-meu?page=') }}" title="Istoric">Istoric</a>
                <a href="{{ url('/contul-meu#facturare') }}" title="Facturare">Facturare</a>
                <a href="{{ url('/logout') }}" title="Iesire">Iesire</a>
            @else
                <button class="btn btn-blue" role="button" aria-label="Autentificare">
                    Autentificare
                </button>
            @endif
        </div>
    </nav>
</div>

</body>
</html>
