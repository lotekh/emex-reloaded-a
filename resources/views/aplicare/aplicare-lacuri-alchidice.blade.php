@extends('aplicare.layout')

@section('header_image_source', asset('resources/images/aplicare/Aplicare-lacuri-lemn.jpg'))
@section('header_title') 
APLICARI LACURI DECORATIVE <br> MONOCOMPONENTE “EMEX”
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/produse">Toate Produsele</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/vopsele-decorative">Vopsele Decorative</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Aplicare Vopsele Decorative</li></ul>
@endsection

@section('tab-buttons')
    <button type="button" name="current_tab" value="0" role="tab" class="btn user-valid valid selected" option="0" aria-selected="true" tabindex="0" onclick="openTab(event, 'PregatireProdus')"><span>Pregatire Produs</span></button>
    <button type="button" name="current_tab" value="1" role="tab" class="btn user-valid valid" option="1" aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireMetal')"><span>Lacuire Lemn</span></button>
    <button type="button" name="current_tab" value="2" role="tab" class="btn user-valid valid" option="2" aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireLemn')"><span>Supralacuire</span></button>
@endsection

@section('tab_contents')
    <div id="PregatireProdus" class="tab-content active">
        <h2 class="aplicare_tab_content_title aplicare_c_red">Lacuri Decorative “Emex”: Pregatire</h2>
            <div class="aplicare_title_separator aplicare_separator_red"></div>
            <div class="descript_par">
                <p><span class="alineat_span"></span>Aceasta categorie cuprinde toate lacurile folosite fie pentru lacuirea lemnului, ca parchet, mobila sau mobilier de gradina, lambriuri, sageac-uri, grinzi, etc., fie pentru supralacuirea vopselelor decorative, in special a celor alchidice, aplicate pe orice tip de suprafata, inclusiv metal.</p>
                <p><span class="alineat_span"></span>Instructiunile prezentate in aceste pagini au doar caracter orientativ. Pentru instructiuni detaliate cititi Fisa Tehnica a fiecarui produs ce urmeaza a fi aplicat, sau solicitati producatorului instructiuni specifice de aplicare, pentru fiecare produs.</p>
                <p><span class="alineat_span"></span>Pregatirea, atat a lacului de aplicat, cat si a suprafetelor de lacuit, reprezinta o etapa indispensabila pentru realizarea unor performante maxime in aplicarea lacurilor de orice tip. Astfel:</p>
                <ul>
                    <li>Produsul se conditioneaza la temperatura ambianta timp de 24 ore inaintea aplicarii.</li>
                    <li>Inainte de deschiderea ambalajului se indeparteaza praful sau alte urme de murdarie.</li>
                    <li>Se omogenizeaza produsul in ambalajul original,folosind un amestecator mecanic, in vederea redispersarii eventualului sediment.</li>
                    <li>Inainte de utilizare este necesara filtrarea produsului.</li>
                    <li>In functie de modul de aplicare se face reglarea vascozitatii, prin adaugarea de <a href="/diluant-alchidic" title="Solvent pentru lacuri alchidice" class="link_color1"><em>Diluant Alchidic “Emex”</em></a>, <a href="/diluant-vopsele-utilaje" title="Solvent pentru lacuri cu uscare rapida" class="link_color1"><em>Diluant tip auto “Emex”</em></a>, sau alt diluant in functie de tipul de lac folosit si caracteristicile acestuia.</li>
                    <li>Este interzisa amestecarea cu orice alte produse, chiar compatibile, fara acordul producatorului.</li>
                </ul>
                <div class="aplicare_titlu mt-40 aplicare_tab_content_title aplicare_c_red">Conditii de aplicare</div>
                <div class="aplicare_title_separator aplicare_separator_red"></div>
                <ul>
                    <li>Temperatura optima de aplicare a produsului: 5 - 30°C.</li>
                    <li>Umiditatea relativa a mediului max. 65%.</li>
                    <li>Temperatura suportului: 5 - 40°C., dar obligatoriu cu min 3°C peste temperatura punctului de roua, temperatura la care apare riscul condensarii umiditatii pe suport, fapt care diminueaza caracteristicile finale de pelicula.</li>
                    <li>Umiditatea relativa a mediului max. 65%.</li>
                    <li>La exterior, lacurile nu se vor aplica pe timp de ceata, ploaie, ninsoare, vant, in prezenta prafului, sau cand exista pelicula de apa sau gheata pe suprafata – suport.</li>
                    <li>Este nerecomandata utilizarea sau depozitarea la temperaturi de sub 5°C.</li>
                    <li>Nu se recomanda, de asemeni, aplicarea la temperaturi negative, pentru ca rezultatele obtinute se pot situa sub limitele de calitate acceptabile.</li>
                    <li>Nu se vor aplica nici la temperaturi mai mari de 35°C in aer, datorita faptului ca peste aceasta temperatura pot aparea fenomene de uscare fortata, care, si in acest caz va diminua calitatea finala a peliculei.</li>
                </ul>
                <p><span class="alineat_span"></span><em>Pentru obtinerea de rezultate optime este obligatorie consultarea <strong>Fisei Tehnice</strong> a produsului.</em></p>
            </div>
    </div>

    <div id="PregatireMetal" class="tab-content">
        <div class="col" id="tab_technical_chars">
            <h2 class="aplicare_tab_content_title">Pregatirea pentru lacuire a suprafetelor din lemn</h2>
            <div class="aplicare_title_separator aplicare_c_orange"></div>
            <div class="descript_par">
                <p><span class="alineat_span"></span>Pregatirea pentru vopsire a suprafetelor din lemn trebuie facuta cu mare atentie. Suprafata trebuie sa fie perfect uscata si curata inainte de aplicarea lacului, fara urme de praf sau contaminanti.</p>
                <p><span class="alineat_span"></span>Alegerea unui sistem corect de lacuire va prelungi cu mult durata de viata a suprafetei din lemn lacuite, asigurand totodata si un aspect placut, decorativ.</p>
                <p><span class="alineat_span"></span>Pentru obtinerea unor performante optime, vor trebui urmate unele operatiuni obligatorii, dintre care enumeram:</p>
                <ul>
                    <li>Suprafetele se curata pentru indepartarea murdariei, picaturilor de rasina si eventualelor urme de grasime imbibate in fibre.</li>
                    <li>Se are in vedere ca umiditatea lemnului trebuie sa fie de max. 12% la foioase si 14% la conifere.</li>
                    <li>Daca exista lacuiri anterioare in stare buna, facute cu acelasi tip de lac si perfect compatibile, se degreseaza cu solvent, se slefuieste suprafata inca umeda, cu hartie abraziva, se usuca si se desprafuieste. <span class="subs-attn">In acest caz se vor face in mod obligatoriu teste de compatibilitate.</span></li>
                    <li>Peliculele vechi, deteriorate, cu aderenta scazuta sau fisurate se indeparteaza in totalitate prin folosirea <a href="/decapant-ecologic-vopsele" title="Pasta de decapare pentru curatare" class="link_color1"><em>Pastei Decapante “Emex PC ECO”</em></a>. In cazul in care aceste pelicule provin de la vopsele bicomponente, singura posibilitate de inlaturare este slefuirea cu discuri sau perii mecanice.</li>
                    <li>Inlaturarea peliculelor vechi se mai poate face prin ardere.</li>
                    <li>Oricare dintre operatiunile de inlaturare a vopselei vechi va fi urmata de slefuire, pana la obtinerea unei suprafete curate, cu fibre perfect vizibile.</li>
                    <li>Suportul se slefuieste cu hartie abraziva de granulatie 180 - 220 (atat la lemn nou cat si la suprafete mai vechi) in lungul fibrelor si se desprafuieste prin suflare cu aer comprimat.</li>
                    <li>In cazul particular al lacuirilor, nu se va folosi nici un fel de grund. Stratul primar va fi doar diluat suplimentar, pentru a se asigura o amorsare necesara diminuarii consumului.</li>
                    <li>Lacurile se aplica in general in 3 straturi, pentru obtinerea unui luciu, aspect si etalare deosebite, mai ales in cazul <a href="/lac-parchet" title="Lac monocomponent pentru finisare pachet" class="link_color1"><em>Lacului Pentru parchet si Mobila “Emex”</em></a> care are si o duritate foarte buna, dar necesita si slefuire intre straturi.</li>
                    <li>Ultimul strat de lac nu se va slefui, acesta avand rolul de top-coat.</li>
                </ul>
                <p><span class="alineat_span"></span>Este total contraindicata folosirea uleiului de in pentru impregnarea lemnului care, pe de o parte se degradeaza foarte repede in timp, iar pe de alta parte creeaza un mediu propice pentru aparitia si dezvoltarea bacteriilor.</p>
                <p><span class="alineat_span"></span>Nu se vor aplica lacuri, indiferent de tipul acestora, pe lemn ud in profunzime, sau neuscat in limitele admise.</p>
            </div>
        </div>
    </div>

    <div id="PregatireLemn" class="tab-content">
        <div class="col" id="tab_technical_chars2">
            <h2 class="aplicare_tab_content_title aplicare_c_green">Instructiuni pentru supralacuire</h2>
            <div class="aplicare_title_separator aplicare_separator_green"></div>
            <div class="descript_par">
                <p><span class="alineat_span"></span>Lacul folosit va trebui sa fie din aceeasi categorie cu vopseaua ca se va supralacui.</p>
                <p><span class="alineat_span"></span>Vopseaua folosita ca suport trebuie sa fie perfect uscata, lipsita de praf, urme de grasimi sau murdarie, sau alti contaminanti.</p>
                <p><span class="alineat_span"></span>Pentru obtinerea unor performante optime, vor trebui urmate unele operatiuni obligatorii, dintre care enumeram:</p>
                <ul>
                    <li>Daca supralacuirea se face imediat dupa terminarea operatiunii de vopsire se va astepta uscarea completa a stratului de vopsea.</li>
                    <li>Suprafetele se curata pentru indepartarea murdariei sau urmelor de grasime, cu detergent sau un solvent usor.</li>
                    <li>Este indicat sa se slefuiasca usor suprafata cu un smirghel foarte fin, pentru a se asigura o cat mai buna aderenta a lacului.</li>
                    <li>De regula, pentru supralacuire este suficienta aplicarea unui singur strat de lac, de preferat prin pulverizare cu aer. Pentru un efect de luciu foarte special si de lunga durata, se pot aplica 2 straturi de lac, la un interval de minim 24 de ore intre aplicari.</li>
                </ul>
                <p><span class="alineat_span"></span>Majoritatea lacurilor, desi au ca destinatie aplicarea pe lemn, pot fi utilizate si la lacuirea metalului, in special:</p>
                <ul class="lista-links">
                    <li><a href="/lac-alchidic" title="Lac alchidic pentru acoperiri lucioase" class="link_color1">Lacul Alchidic “Emex”</a>,</li>
                    <li><a href="/lazura-lac-colorat" title="Lac superior pentru lacuire lucioasa" class="link_color1"><span>Lac Pigmentat “Emex”</span></a>, sau</li>
                    <li><a href="/lac-parchet" title="Lac uretanizat pentru lemn sau metal" class="link_color1"><span>Lac Uretanizat “Emex”</span></a>.</li>
                </ul>
                <ul>
                    <li>De mentionat ca exista lacuri superioare pentru lacuirea lemnului sau a metalului, nelistate insa, in acest moment, in site, cum ar fi <strong>Lacul Clorcauciuc</strong>, <strong>Lacurile Alchidice Modificate</strong>, sau <strong>Lacurile Nitrocelulozice</strong>.
                    </li></ul>
                <p>
                    <span>
                        <img width="40" height="35" class="atentie-consum" src="{{ asset('resources/images/general/Atentie-mic.png') }}" alt="Atentie suprafete nerecomandate">
                    </span>
                    Aplicarea pe suprafete insuficient pregatite, cu urme de grasime, murdarie sau umezeala, poate afecta semnificativ pelicula finala, determinand fenomene de exfoliere, matuire, basicare, etc.
                </p>
            </div>
        </div>
    </div>

@endsection

@section('images')
    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Lacuri-de-mobila-si-parchet.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">

    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Lac-de-lemn-si-lambriuri.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">

    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Lac-pentru-ornamente-lemn.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">
@endsection