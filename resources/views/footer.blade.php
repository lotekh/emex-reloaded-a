<div id="sidebar-left" class="sidebar" style="display:none;">
    <nav class="col">
        <a href="{{ url('/') }}" class="mb-32" title="acasa">
            <img src="{{ asset('resources/new_design/general/logo-footer.png') }}" height="72" width="201" alt="Emex - un brand de incredere" title="Emex - brand al companiei Romtehnochim">
        </a>
        <section>
            <header>
                <a href="{{ url('/') }}" title="Acasa">Acasa</a>
            </header>
        </section>
        <div id="cine-suntem">
            <section>
                <header onclick="toggleAccordion('cine-suntem')">Cine suntem</header>
                <ul class="dropdown-menu" id="cine-suntem-menu">
                    <li><a href="{{ url('/despre-noi') }}" title="Despre noi">Despre noi</a></li>
                    <li><a href="{{ url('/politica-de-calitate') }}" title="Politica de Calitate">Politica de Calitate</a></li>
                    <li><a href="{{ url('/politica-de-mediu') }}" title="Politica de Mediu">Politica de Mediu</a></li>
                    <li><a href="{{ url('/politica-sanatate-securitate') }}" title="Politica de Securitate">Politica de Securitate</a></li>
                    <li><a href="{{ url('/certificari-iso') }}" title="Certificari ISO">Certificari ISO</a></li>
                    <li><a href="https://emex.ro/catalog-emex.pdf" title="Catalog Emex">Catalog “Emex”</a></li>
                </ul>
            </section>
        </div>
        <div id="produse">
            <section>
                <header onclick="toggleAccordion('produse')">Produse</header>
                <ul class="dropdown-menu" id="produse-menu">
                    <li id="apmim_mob"><a href="{{ url('/produse') }}" title="toate produsele">Toate Produsele</a></li>

                    {{-- de obtinut $categories si iterat prin ele --}}
                    <a href="{{ url('/') }}" title=" categoria 1"> categoria 1 </a>
                    <a href="{{ url('/') }}" title=" categoria 1"> categoria 2 </a>

                </ul>
            </section>
        </div>
        <div id="aplicare">
            <section>
                <header onclick="toggleAccordion('aplicare')">Aplicare</header>
                <ul class="dropdown-menu" id="aplicare-menu">
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
        <div id="consum">
            <section>
                <header onclick="toggleAccordion('consum')">Consum</header>
                <ul class="dropdown-menu" id="consum-menu">

                    {{-- de obtinut $categories si iterat prin ele --}}
                    <a href="{{ url('/') }}" title=" categoria 1"> categoria 1 </a>
                    <a href="{{ url('/') }}" title=" categoria 1"> categoria 2 </a>
                    
                </ul>
            </section>
        </div>
        <div id="servicii">
            <section>
                <header onclick="toggleAccordion('servicii')">Servicii</header>
                <ul class="dropdown-menu" id="servicii-menu">
                    <li><a href="{{ url('/aplicare-covor-epoxidic-stb') }}" title="Pardoseli Cuartz">Pardoseli Cuartz Epoxi</a></li>
                    <li><a href="{{ url('/aplicare-pardoseala-epoxidica-autonivelanta') }}" title="Autonivelanta Epoxi">Autonivelanta Epoxi</a></li>
                    <li><a href="{{ url('/vopsire-epoxidica-pardoseli') }}" title="Vopsiri Epoxidice">Vopsiri Epoxidice</a></li>
                    <li><a href="{{ url('/servicii') }}" title="Servicii Generale">Servicii Generale</a></li>
                </ul>
            </section>
        </div>
        <div id="culori">
            <section>
                <header onclick="toggleAccordion('culori')">Culori</header>
                <ul class="dropdown-menu" id="culori-menu">
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
            @if (Auth::check())
                <a href="{{ url('/contul-meu') }}" title="Setari cont">Setari cont</a>
                <a href="{{ url('/wishlist') }}" title="Favorite">Favorite</a>
                <a href="{{ url('/contul-meu?page=istoric') }}" title="Istoric">Istoric</a>
                <a href="{{ url('/contul-meu#facturare') }}" title="Facturare">Facturare</a>
                <a href="{{ url('/logout') }}" title="Iesire">Iesire</a>
            @else
                <button id="auth_lightbox_trigger_mobile" class="btn btn-blue" onclick="toggleSidebar(), toggleAuthLightbox()" role="button" aria-label="Autentificare">
                    Autentificare
                </button>
            @endif
        </div>
    </nav>
</div>


