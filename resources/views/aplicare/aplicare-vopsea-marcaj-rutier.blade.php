@extends('aplicare.layout')

@section('seo')
<title>Aplicare vopsea pentru marcaj rutier</title>
<meta name="keywords" content="marcaje rutiere, marcare rutiera, vopsire parcari, vopsire marcaj rutier">
<meta name="description" content="Aplicare vopsea pentru marcaj rutier: marcarea pe asfalt sau beton a benzilor de circulatie piste de aeroport treceri de pietoni sau parcari">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Vopsire pentru marcaje rutiere">
<meta property="og:image" content="https://emex.ro/images/social/Aplicare-vopsea-marcaj-rutier-sm.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Aplicare-vopsea-marcaj-rutier-sm.jpg" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="628" />
<meta property="og:image:alt" content="Marcare rutiera cu vopsea marcaj" />
<meta property="og:description" content="Modul de vopsire stradala si aplicarea de marcaje rutiere pe asfalt sau beton in scopul trasarii benzilor de circulatie parcari sau treceri pietonale.">
<meta property="og:url" content="https://emex.ro/aplicare-vopsea-marcaj-rutier">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website" />
@endsection

@section('header_image_source', asset('resources/images/aplicare/Aplicare-trafic-rutier.jpg'))
@section('header_title') 
APLICARE VOPSELE MARCAJ <br> RUTIER “EMEX ROUTE”
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/produse">Toate Produsele</a></li><li class="separator">/</li><li class="-ml-4"><a href="/vopsele-trafic-pardoseala">Vopsele pardoseli si trafic</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Aplicare Vopsea Marcaj</li></ul>
@endsection

@section('tab-buttons')
    <button type="button" name="current_tab" value="0" role="tab" class="btn user-valid valid selected"  aria-selected="true" tabindex="0" onclick="openTab(event, 'PregatireProdus')"><span>Pregatire Produs</span></button>
    <button type="button" name="current_tab" value="1" role="tab" class="btn user-valid valid"  aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireMetal')"><span>Pregatire Suport</span></button>
    <button type="button" name="current_tab" value="2" role="tab" class="btn user-valid valid"  aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireLemn')"><span>Aplicare Produs</span></button>
@endsection

@section('tab_contents')
    <div id="PregatireProdus" class="tab-content active">
        <h2 class="aplicare_tab_content_title aplicare_c_red">Vopsea de Marcaj Rutier “Emex Route”: Pregatire</h2>
                    <div class="aplicare_title_separator aplicare_separator_red"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>In aceasta categorie se regaseste numai <a href="/vopsea-marcaj-rutier" title="Vopsea pentru efectuarea de marcaje rutiere" class="link_color1"><em>Vopseaua de Marcaj Rutier “Emex Route”</em></a>.</p>
                        <p><span class="alineat_span"></span>Instructiunile prezentate in aceste pagini se raporteaza doar la acest tip de vopsea si au caracter orientativ. Pentru instructiuni detaliate cititi Fisa Tehnica a produsului sau solicitati instructiuni speciale de aplicare, de la producator.</p>
                        <p><span class="alineat_span"></span>Pregatirea suprafetei este factorul determinant in obtinerea unei maxime aderente, care asigura durabilitatea in exploatare si pastrarea in timp a calitatii acoperirii. Astfel:</p>
                        <ul>
                            <li>Produsul se conditioneaza la temperatura de aplicare minim 24 ore inainte de aplicare.</li>
                            <li>Inainte de deschiderea ambalajului se indeparteaza de pe acesta praful sau alte urme de murdarie pentru a nu contamina produsul.</li>
                            <li>Se omogenizeaza bine produsul in ambalajul original, folosind un amestecator mecanic, in vederea redispersarii eventualului sediment.</li>
                            <li>Inainte de utilizare este necesara filtrarea produsului.</li>
                            <li>In functie de tipul vopselei, se face reglarea vascozitatii, prin adaugarea de <a href="/diluant-marcaj-rutier" title="Diluant pentru vopsele de marcaj rutier" class="link_color1"><em>Diluant Marcaj Rutier “Emex”</em></a>. Reglarea vascozitatii se mai poate face si cu <a href="/diluant-clorcauciuc" title="Solvent pentru vopsele clorcauciuc" class="link_color1"><em>Diluant Vopsele Clorcauciuc “Emex”</em></a> sau alti solventi recomandati de producator.</li>
                            <li>Reglarea vascozitatii de face in functie de modul de aplicare. Astfel, produsul se va dilua: 4 - 6% pentru suprafete noi si 8 - 10% pentru suprafete care au mai fost vopsite.</li>
                            <li>Aplicarea se poate face cu trafaletul sau prin pulverizare air-less.</li>
                            <li>Este interzisa amestecarea produsului cu orice alte vopsele, sau produse chimice.</li>
                        </ul>
                        <div class="aplicare_titlu mt-40 aplicare_tab_content_title aplicare_c_red">Conditii de aplicare</div>
                        <div class="aplicare_title_separator aplicare_separator_red"></div>
                        <ul>
                            <li>Temperatura optima de aplicare a produsului: 5 - 30°C.</li>
                            <li>Temperatura produsului: 5 - 30°C.</li>
                            <li>Temperatura suportului: 5 - 40°C., dar obligatoriu cu min 3°C peste temperatura punctului de roua, temperatura la care apare riscul condensarii umiditatii pe suport, fapt care diminueaza caracteristicile finale de pelicula.</li>
                            <li>Umiditatea relativa a mediului max. 65%.</li>
                            <li>Produsele nu se vor aplica pe timp de ceata, ploaie, ninsoare, vant, in prezenta prafului, sau cand exista pelicula de apa sau gheata pe suprafata – suport.</li>
                            <li>Nu este recomandata aplicarea la temperaturi de sub 5°C.</li>
                            <li>De asemeni, nu se recomanda aplicarea la temperaturi mai mari de 35°C in aer, datorita faptului ca peste aceasta temperatura pot aparea fenomene de uscare fortata, care va diminua calitatea finala a peliculei.</li>
                        </ul>
                        <p class="text-center"><em><span class="subs-attn">Pentru obtinerea de rezultate optime este obligatorie consultarea <strong>Fisei Tehnice</strong></span>.</em></p>
                    </div>
    </div>

    <div id="PregatireMetal" class="tab-content">
        <h2 class="aplicare_tab_content_title">Pregatirea suportului pentru aplicarea de vopsea de marcaj</h2>
                    <div class="aplicare_title_separator aplicare_c_orange"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>Aplicarea <a href="/vopsea-marcaj-rutier" title="Vopsea pentru marcare beton sau asfalt" class="link_color1"><em>Vopselei de Marcaj Rutier “Emex Route”</em></a> pe suprafetele din asfalt, beton, sau alte tipuri de materiale cimentice se face numai dupa pregatirea corespunzatoare a suportului, deoarece aceasta etapa are o influenta hotaratoare asupra calitatii si durabilitatii acoperirii. Astfel:</p>
                        <ul>
                            <li><strong>In cazul aplicarii pe suprafete din beton sau asfalt, acestea trebuie sa fie uscate si gata pentru utilizarea dorita, desprafuite si degresate corespunzator, in vederea eliminarii riscurilor de exfoliere, basicare sau alte accidente, dar si pentru obtinerea proprietatilor specificate.</strong></li>
                            <li>Se remediaza fisurile si alte imperfectiuni inainte de aplicarea produsului, cu un produs de mare aderenta si cu duritate similara celei a suportului.</li>
                            <li>Suprafetele ce urmeaza a se acoperi se curata de impuritati si/sau grasimi, se asperizeaza praful rezultat indepartandu-se cu ajutorul periilor (par moale) sau prin suflare cu aer comprimat.</li>
                            <li>Suprafetele trebuie sa fie netede, plane, uscate, rezistente (stabile).</li>
                            <li>Trebuie avut in vedere ca betoanele care contin aditivi ca: silicati, alcool polivinilic, ceruri, etc., pot influenta in mod negativ aderenta produsului la suport.</li>
                            <li>Acolo unde este necesar, inlaturarea peliculelor vechi se face prin curatare cu perii mecanice, sau discuri diamantate.</li>
                        </ul>
                        <p><span class="alineat_span"></span>In cazul folosirii pentru marcarea si delimitarea de zone in spatii industriale sau comerciale (depozite, hale, show-room-uri, etc.), peste alte vopsele de pardoseala cum ar fi:</p>
                        <ul class="lista-links">
                            <li><a href="/vopsea-clorcauciuc-pardoseli" title="Vopsea clorcauciuc pentru pardoseli beton" class="link_color1">Vopsea Clorcauciuc pentru Pardoseli “Emex”</a>,</li>
                            <li><a href="/vopsea-epoxidica-pardoseli" title="Vopsea epoxidica bicomponenta pentru beton" class="link_color1">Vopsea Epoxidica pentru Pardoseli “Emex”</a>,</li>
                            <li><a href="/vopsea-poliuretanica-pardoseli" title="Vopsea bicomponenta poliuretanica pentru beton" class="link_color1">Vopsea Poliuretanica pentru Pardoseli “Emex”</a>, sau </li>
                            <li>oricare dintre pardoselile de la pagina <a href="/vopsele-trafic-pardoseala" title="Vopsele pentru pardoseli beton sau cimentice" class="link_color1"><em>“Vopsele pentru Pardoseli si Trafic”</em></a>, este necesara degresarea prealabila si slefuirea superficiala a suprafetei pentru marirea aderentei vopselei de marcaj la suport.</li>
                        </ul>
                        <p><span class="alineat_span"></span>Pentru aplicarea pe suprafete intinse, cu o latime mai mare de 30 cm, este indicat a se aplica o amorsa de impregnare, la recomandarea producatorului.</p>
                        <p><span class="alineat_span"></span>In situatia in care exista incluziuni metalice, acestea vor fi curatate cu <a href="/solutie-anti-rugina" title="Solutie inlaturare rugina “Emex”" class="link_color1"><em>Solutiei impotriva ruginii “Emex Rust Stop”</em></a> si acoperite in mod obligatoriu cu <a href="https://emex.ro/grund-clorcauciuc" title="Grund clorcauciuc cu actiune anticoroziva" class="link_color1"><em>Grund Clorcauciuc Anticoroziv “Emex”</em></a>, sau un alt tip de grund la recomandarea producatorului.</p>
                    </div>
    </div>

    <div id="PregatireLemn" class="tab-content">
        <h2 class="aplicare_tab_content_title aplicare_c_green">Aplicare vopsele de marcaj rutier</h2>
                    <div class="aplicare_title_separator aplicare_separator_green"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>Aplicarea produsului pe suprafata-suport se face numai dupa pregatirea corespunzatoare a acesteia, potrivit indicatiilor din tab-ul anterior sau din fisa tehnica, in functie de starea si tipul suportului.</p>
                        <p><span class="alineat_span"></span>Aplicarea <a href="/vopsea-marcaj-rutier" title="Vopsea pentru marcarea benzilor de trafic" class="link_color1"><em>Vopselei de Marcaj Rutier “Emex Route”</em></a> se poate face prin stropire cu masini speciale de aplicare, pensulare, roluire sau pulverizare cu aer sau instalatii airless.</p>
                        <br>
                        <p><span class="alineat_span"></span>O aplicare corecta a vopselelor de pardoseala, va trebui sa urmeze urmatoarele etape:</p>
                        <ul>
                            <li>Se conditioneaza produsul la temperatura de aplicare, minim 24 ore inainte de utilizare, conform instructiunilor de pregatire a produsului.</li>
                            <li>Se pregatesc suprafetele conform instructiunilor de pregatire a suprafetelor.</li>
                            <li>Se va verifica umiditatea suportului, care nu trebuie sa depaseasca max. 10%.</li>
                            <li>Se va pregati vopseaua, conform instructiunilor specifice de pregatire a produsului, din tab-ul anterior sau din Fisa Tehnica.</li>
                            <li>Vascozitatea produsului se va regla, in functie de tipul vopselei utilizate, prin folosirea diluantului recomandat de producator.</li>
                            <li>Se aplica folosind masina de marcare rutiera specializata, la grosimi de film umed de 300μm, 400μm si 600μm.</li>
                            <li>Pe suprafata peliculei umede de vopsea, se pot aplica uniform, prin pulverizare, microbile de sticla reflectorizante, compatibile cu vopseaua.</li>
                            <li>In cazul suprafetelor mici si atunci cand suprafata ce urmeaza a fi marcata nu este continua, vopseaua se poate aplica manual, cu pistol de stropit (cu aer sau air-less), cu pensula sau prin roluire.</li>
                            <li>La suprafete cu latimi de peste 30 cm., se recomanda aplicarea a doua straturi de vopsea, chiar daca puterea de acoperire permite aplicarea unui singur strat.</li>
                            <li>Dupa aplicare, instrumentele folosite (sau utilajele, dupa caz), se vor curata cu diluant si se vor usca.</li>
                        </ul>
                        <p>
                            <span>
                                <img width="40" height="35" class="atentie-consum" src="{{ asset('resources/images/general/Atentie-mic.png') }}" alt="Atentie suprafete nerecomandate">
                            </span>
                            <span class="attn-underline"><strong>NOTA</strong></span>: Se interzice amestecarea produsului cu alte vopsele chiar similare, pentru evitarea riscului aparitiei unor probleme de compatibilitate. <span class="subs-attn">Nu se va utiliza sub +5°C</span>.
                            
                        </p>
                    </div>
    </div>

@endsection

@section('images')
    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Aplicare-vopsea-marcaj-rutier.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">

    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Aplicare-vopsea-pentru-macaje-stradale.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">

    <img width="201" height="185" src="{{ asset('resources/images/aplicare/marcaje-rutiere-si-pietonale.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">
@endsection

@php
    $secondary_title = 'Aplicarea Vopselelor de Marcaj “Emex Route”';
@endphp