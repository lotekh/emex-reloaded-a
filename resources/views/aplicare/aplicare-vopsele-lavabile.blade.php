@extends('layout.layout')

@section('seo')
<title>Pregatire pereti si zugravire cu vopsea lavabila</title>
<meta name="keywords" content="aplicare vopsele lavabile, cum se zugraveste, zugravirea cu lavabile">
<meta name="description" content="Aplicare vopsele lavabile: pregatirea peretilor pentru zugravire modul de aplicare si pregatirea vopselei lavabile pentru zugraveli profesionale">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Zugravire cu vopsele lavabile profesionale">
<meta property="og:image" content="https://emex.ro/images/social/Aplicare-lavabila-Facebook.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Aplicare-lavabila-Facebook.jpg" />
<meta property="og:image:width" content="1024" />
<meta property="og:image:height" content="512" />
<meta property="og:image:alt" content="Vopsire zugravire cu vopsele lavabile" />
<meta property="og:description" content="Zugravirea si modul de pregatire si aplicare al vopselelor lavabile pe baza de rasini acrilice tip Latex pentru realizarea de zugraveli profesionale.">
<meta property="og:url" content="https://emex.ro/aplicare-vopsele-lavabile">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/aplicare-extended.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/produse">Toate Produsele</a></li><li class="separator">/</li><li class="-ml-4"><a href="/vopsele-lavabile">Vopsele Lavabile</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Aplicare Vopsele Lavabile</li></ul>
@endsection

@section('content')

<div class="aplicari relative w-full">
    <div class="header_img_bg col justify-center align-center" style="background-image: url('{{ asset('resources/images/aplicare/Aplicare-vopsele-lavabile.jpg') }}');">
        <h1 class="z-10" id="h1-aplicare-bg">
            APLICARE VOPSELE LAVABILE<br>SI SUPERLAVABILE “EMEX”
        </h1>
    </div>
</div>

<div class="aplicari main-container product-page mt-32" id="product_container">
    <div class="mt-16 mt-custom">
        <div class="tabs-selector-row">
            <button type="button" name="current_tab" value="0" role="tab" class="btn user-valid valid selected" aria-selected="true" tabindex="0" onclick="openTab(event, 'PregatireProdus')"><span>Pregatire Produs</span></button>
            <button type="button" name="current_tab" value="1" role="tab" class="btn user-valid valid"  aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireMetal')"><span>Pregatire Suport</span></button>
            <button type="button" name="current_tab" value="2" role="tab" class="btn user-valid valid"  aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireLemn')"><span>Aplicare Produs</span></button>
        </div>

        <div class="tab-content-container">

            <div id="PregatireProdus" class="tab-content active">
                <h2 class="aplicare_tab_content_title aplicare_c_red">Vopsea Lavabila “Emex”: Pregatire si Conditii de Aplicare</h2>
                    <div class="aplicare_title_separator aplicare_separator_red"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>Aceste instructiuni sunt comune tuturor vopselelor lavabile, de interior sau de exterior si produselor conexe - <a href="/grunduri-amorse" class="link_color1"><em>Amorse si grunduri de amorsare</em></a>.</p>
                        <p><span class="alineat_span"></span>Instructiunile prezentate in aceste pagini au doar caracter orientativ. Pentru instructiuni detaliate cititi Fisa Tehnica a produsului sau solicitati instructiunile de aplicare, de la producator.</p>
                        <p><span class="alineat_span"></span>Pregatirea, atat a produsului cat si a suprafetelor, reprezinta o etapa indispensabila pentru realizarea unor performante maxime in aplicarea vopselelor de orice tip. Astfel:</p>
                        <ul>
                            <li>Produsul se conditioneaza la temperatura de aplicare minim 24 ore inainte de aplicare.</li>
                            <li>Inainte de deschiderea ambalajului se indeparteaza de pe acesta praful sau alte urme de murdarie pentru a nu contamina produsul.</li>
                            <li>Produsul se omogenizează bine în ambalajul original, folosind un amestecator mecanic, in vederea redispersarii eventualului sediment.</li>
                            <li>In functie de modul de aplicare se face reglarea vascozitatii, prin adaugarea de apa.</li>
                            <li>In cazul in care se foloseste vopsea lavabila pentru aplicarea prin pulverizare cu instalatii air-less, produsul se va filtra inainte de aplicare.</li>
                            <li>Aplicarea se poate face cu pensula, trafaletul sau prin pulverizare air-less.</li>
                            <li>Este interzisa amestecarea produsului cu alte vopsele chiar similare, pentru evitarea riscului aparitiei unor probleme de compatibilitate.</li>
                            <li>Colorarea va fi facuta de producator sau cu paste de colorare produse sau agreate de acesta.</li>
                        </ul>
                        <div class="aplicare_titlu mt-40 aplicare_tab_content_title aplicare_c_red">Conditii de aplicare</div>
                        <div class="aplicare_title_separator aplicare_separator_red"></div>
                        <ul>
                            <li>Temperatura optima de aplicare a produsului: 5 - 30&deg;C.</li>
                            <li>Temperatura produsului: 5 - 30&deg;C.</li>
                            <li>Temperatura suportului: 5 - 40&deg;C., dar obligatoriu cu min 3&deg;C peste temperatura punctului de roua, temperatura la care apare riscul condensarii umiditatii pe suport, fapt care diminueaza caracteristicile finale de pelicula.</li>
                            <li>Umiditatea relativa a mediului max. 65&#37;.</li>
                            <li>Produsele nu se vor aplica pe timp de ceata, ploaie, ninsoare, vant, in prezenta prafului, sau cand exista pelicula de apa sau gheata pe suprafata - suport.</li>
                            <li>Vopselele lavabile nu se vor utiliza sau depozita la temperaturi de sub 5&deg;C.</li>
                            <li>Aplicarea la temperaturi negative nu este recomandata, pentru ca rezultatele se pot situa sub limitele de calitate acceptabile.</li>
                            <li>De asemenea, nu se recomanda aplicarea la temperaturi mai mari de 35&deg;C in aer, datorita faptului ca peste aceasta temperatura pot aparea fenomene de uscare fortata, care, si in acest caz va diminua calitatea finala a peliculei.</li>
                        </ul>
                        <p class="text-center"><em><span class="subs-attn">Pentru obtinerea de rezultate optime este obligatorie consultarea <strong>Fisei Tehnice</strong></span>.</em></p>
                    </div>
                
            </div>

            <div id="PregatireMetal" class="tab-content">
                <h2 class="aplicare_tab_content_title">Pregatirea suprafetelor pentru zugravirea cu vopsele lavabile</h2>
                    <div class="aplicare_title_separator aplicare_c_orange"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>Pregatirea suprafetelor-suport din beton, zidarie, glet de var, ipsos sau premixate, etc., reprezinta o etapa premergatoare aplicarii si obligatorie, deoarece are o influenta hotaratoare asupra calitatii si durabilitatii acoperirii. Astfel:</p>
                        <ul>
                            <li><strong>Betonul sau mortarele noi (inclusiv reparatiile) necesita minim 28 zile pentru intarire si uscare inaintea aplicarii; nerespectarea acestei conditii afecteaza rezistenta produsului in timp, determina exfolieri sau basicari, iar vopselele colorate pot suferi modificari cromatice</strong>.</li>
                            <li>Suprafetele tencuite se verifica prin ciocanire inainte de aplicarea produsului; daca se dovedesc necorespunzatoare (suna a gol) se indeparteaza complet tencuiala, pana la zidarie si se refac cu un mortar de aceeasi clasa cu cel initial.</li>
                            <li>Este recomandat ca mortarele sa nu contina o cantitate mare de var.</li>
                            <li>Inainte de aplicarea produsului se remediaza eventualele gauri, fisuri sau alte imperfectiuni cu <a href="/masa-spaclu" title="Glet pasta pentru reparatii" class="link_color1">Masa de Spaclu pentru Reparatii “Emex LQ”</a>.</li>
                            <li>Peliculele vechi, deteriorate sau cu aderenta diminuata se indeparteaza complet prin folosirea <a href="/decapant-ecologic-vopsele" title="Solutie pentru indepartare vopsele vechi" class="link_color1">Pastei decapante “Emex PC Eco”</a>, sau a oricarui produs similar.</li>
                            <li>Inlaturarea peliculelor vechi se mai poate face prin slefuire cu perii mecanice, sau prin ardere.</li>
                            <li>Daca exista protectii anterioare in stare buna, suprafata se va slefui doar, cu hartie abraziva, si se va desprafui.</li>
                            <li>Oricare dintre operatiunile de inlaturare a vopselei vechi va fi urmata de slefuirea pentru finisare.</li>
                            <li>Zonele atacate de mucegai se curata si se impregneaza cu <a href="/solutie-anti-mucegai" title="Solutie de curatare a mucegaiului" class="link_color1">Sanitizantul Antimucegai “Emex Forte”</a>, atat pentru indepartarea, cat si pentru prevenirea aparitiei agentilor microbieni.</li>
                            <li>Suprafetele ce urmeaza a se acoperi cu <a href="/vopsele-lavabile" title="Vopsele speciale pentru zugraveli" class="link_color1">Vopsele Lavabile</a>, se curata de impuritati sau grasimi, se asperizeaza, praful rezultat indepartandu-se cu ajutorul periilor (par moale) sau prin suflare cu aer comprimat.</li>
                            <li>Suprafetele trebuie sa fie netede, plane, uscate.</li>
                            <li>Incluziunile metalice vor fi acoperite in mod obligatoriu cu <a href="/grund-anticoroziv-emex" title="Grund alchidic protector impotriva ruginii" class="link_color1">Grund Alchidic Anticoroziv “Emex”</a>.</li>
                            <li>Pe suprafete noi (inclusiv reparatii) se va aplica in mod obligatoriu una dintre amorsele pe care le gasiti in pagina de <a href="/grunduri-amorse" title="Amorse pentru zugravirea cu vopsele lavabile" class="link_color1">Grunduri si Amorse pentru Vopsele Lavabile</a>.</li>
                        </ul>
                        <p class="text-center"><em><span class="subs-attn">Aplicarea se va face prin pensulare, roluire sau pulverizare cu instalatii airless</span></em>.</p>
                    </div>
            </div>

            <div id="PregatireLemn" class="tab-content">
                <h2 class="aplicare_tab_content_title aplicare_c_green">Zugravirea cu vopsele lavabile</h2>
                    <div class="aplicare_title_separator aplicare_separator_green"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>Aplicarea vopselelor lavabile pe suprafata-suport se face numai dupa pregatirea corespunzatoare a acesteia, potrivit indicatiilor din tab-ul anterior sau din fisa tehnica, indiferent daca suprafata de vopsit este noua sau a mai fost vopsita cu produse compatibile.<br>
                            <span class="alineat_span"></span>Aplicarea vopselelor lavabile, atat cele de interior cat si cele de exterior, se face in general cu trafaletul, dar poate fi facuta si cu pensula, bidineaua sau prin pulverizare cu instalatii air-less.<br>
                            <span class="alineat_span"></span>Aplicarea prin pulverizare se face cu produse special destinate acestui scop, ce vor fi solicitate in mod expres producatorului. Produsul pentru pulverizare va fi filtrat imediat dupa diluare.<br>
                            <span class="alineat_span"></span>Sistemul optim de aplicare a vopselelor lavabile comporta urmatoarele etape:</p>
                        <ul>
                            <li>Se conditioneaza produsul conform instructiunilor de pregatire a produsului.</li>
                            <li>Se pregatesc suprafetele conform instructiunilor de pregatire a suprafetelor.</li>
                            <li>Pentru evidentierea defectelor este bine sa fie aplicat un <a href="/grund-umplere-pori" title="Amorsa grea pentru egalizare suprafete" class="link_color1">Grund de Egalizare si Umplere Pori “Emex”</a>, slefuibil, ce va asigura si un grad mare de umplere a porilor.</li>
                            <li>Dupa uscarea acestuia (min. 2 ore) se va slefui cu hartie abraziva, pentru obtinerea unei suprafete cat mai plane si se vor retusa defectiunile, care se vor reacoperi cu grund.</li>
                            <li>Se va aplica o <a href="/amorsa-antimucegai" title="Amorsa rezistenta la igrasie si mucegai" class="link_color1">Amorsa Antimucegai “Emex”</a>, sau din gama tipului de vopsea (acrilica, silicatica, siliconica, etc.). Prezentarea acestora si fisele tehnice aferente, se pot gasi in pagina <a href="/grunduri-amorse" title="Amorse pentru zugraveli interioare sau exteioare" class="link_color1">Amorse de perete si grunduri de amorsare</a>.</li>
                            <li>Se aplica primul strat de vopsea, diluat conform instructiunilor din Fisa Tehnica.</li>
                            <li>Se aplica cel de-al doilea strat de vopsea, la un interval de cca. 6 ore, acolo unde este cazul. Vopsele de tipul <a href="/lavabila-premium-gold" title="Vopsea lavabila acoperire la 1 strat" class="link_color1">Vopsea Lavabila Premium “Emex Gold”</a>, sau altele superioare chiar, acopera perfect la 1 singur strat, cu conditia ca suportul sa fie pregatit in mod corect.</li>
                            <li>Suprafetele care au mai fost vopsite nu necesita amorsare, daca vopseaua anterior folosita este de acelasi tip sau compatibila (este necesar un test de compatibilitate).</li>
                            <li>Pentru suprafete noi (inclusiv reparatii) se va aplica in mod obligatoriu amorsa.</li>
                            <li>Temperatura optima de aplicare a produsului este cuprinsa intre 5 si 30&deg;C, iar umiditatea relativa de max. 65&#37;.</li>
                        </ul>
                        <p><span class="alineat_span"></span>Este total contraindicata folosirea de adezivi tip “Aracet” pentru pregatirea de amorse, sau pentru adaugare in vopsele lavabile, indiferent de tipul acestora.</p>
                        <p class="text-center"><a href="/vopsele-lavabile" title="Vopsele lavabile pentru zugraveli profesionale" class="link_color1"><strong>Vopseaua lavabila “Emex”</strong></a>, cu toate subtipurile acesteia, este fabricata pentru a asigura o cat mai mare aderenta si o acoperire cat mai buna, fara a se interveni cu adaosuri de orice fel.</p>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="main-container grid grid-3 gap-lg align-center mt-32" id="aspd">
    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Aplicare-lavabile-interior.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">
    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Aspect-lavabila-interior.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">
    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Design-zugraveli-lavabile.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">
</div>

@include('components.sidebar-contact', ['secondary_title' => 'Aplicarea Vopselelor Lavabile “Emex”'])

<script>
document.addEventListener('DOMContentLoaded', function () {
    window.openTab = function(evt, tabName) {
        // Declare all the variables
        var i, tabcontent, tablinks;

        // Hide the tab content
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].classList.remove("active");
        }

        // Remove 'selected' class and aria-selected from all buttons
        tablinks = document.getElementsByClassName("btn");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("selected");
            tablinks[i].setAttribute("aria-selected", "false");
        }

        // Show the current tab and add 'active' and 'selected' classes to the current button
        document.getElementById(tabName).classList.add("active");
        evt.currentTarget.classList.add("selected");
        evt.currentTarget.setAttribute("aria-selected", "true");
    };
});
</script>

@endsection