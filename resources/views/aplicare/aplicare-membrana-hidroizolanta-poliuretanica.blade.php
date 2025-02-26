@extends('aplicare.layout')

@section('seo')
<title>Aplicare membrana hidroizolanta poliuretanica</title>
<meta name="keywords" content="aplicare membrana hidroizolanta, cum se aplica hidroizolatia, montare membrana impermeabila">
<meta name="description" content="Aplicare membrana hidroizolanta poliuretanica - instructiuni de pregatire a suportului si modul de aplicare al membranei hidroprotectoare impermeabile">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Mod de aplicare membrana impermeabilizanta">
<meta property="og:image" content="https://emex.ro/images/social/Aplicare-membrana-poliuretanica-Facebook.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Aplicare-membrana-poliuretanica-Facebook.jpg" />
<meta property="og:image:width" content="1024" />
<meta property="og:image:height" content="512" />
<meta property="og:image:alt" content="Membrana poliuretanica aplicata impotriva apei" />
<meta property="og:description" content="Modul de aplicare al membranei poliuretanice impermeabile – instructiuni de pregatire a suportului si efectuarea operatiunilor de impermeabilizare.">
<meta property="og:url" content="https://emex.ro/aplicare-membrana-hidroizolanta-poliuretanica">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website" />
@endsection

@section('header_image_source', asset('resources/images/aplicare/Protectie-intemperii.jpg'))
@section('header_title') 
APLICARE MEMBRANA HIDROIZOLANTA <br> POLIURETANICA “EMEX”
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/produse">Toate Produsele</a></li><li class="separator">/</li><li class="-ml-4"><a href="/pardoseli-trafic">Pardoseli Turnate</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Aplicare Membrana Impermeabila</li></ul>
@endsection

@section('tab-buttons')
    <button type="button" name="current_tab" value="0" role="tab" class="btn user-valid valid selected"  aria-selected="true" tabindex="0" onclick="openTab(event, 'PregatireProdus')"><span>Pregatire Produs</span></button>
    <button type="button" name="current_tab" value="1" role="tab" class="btn user-valid valid" aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireMetal')"><span>Pregatire Suprafata</span></button>
    <button type="button" name="current_tab" value="2" role="tab" class="btn user-valid valid"  aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireLemn')"><span>Aplicare Produs</span></button>
@endsection

@section('tab_contents')
    <div id="PregatireProdus" class="tab-content active">
        <h2 class="aplicare_tab_content_title aplicare_c_red">Membrana Poliuretanica Hidroprotectoare “Emex”: Pregatire</h2>
                    <div class="aplicare_title_separator aplicare_separator_red"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>Aplicarea de <a href="/aplicare-membrana-hidroizolanta-poliuretanica" title="Membrana poliuretanica de impermeabilizare" class="link_color1"><em>Membrana Poliuretanica Hidroizolanta</em></a> este dificila si necesita o pregatire prealabila.</p>
                        <p><span class="alineat_span"></span>Instructiunile prezentate in aceste pagini au doar caracter orientativ. Pentru instructiuni detaliate cititi Fisa Tehnica a produsului sau solicitati instructiuni speciale de aplicare, de la producator.</p>
                        <p><span class="alineat_span"></span><strong>Nu recomandam aplicarea de catre persoane care nu au experienta in domeniu.</strong></p>
                        <p><span class="alineat_span"></span>Pregatirea suprafetei este factorul determinant in obtinerea unei maxime aderente, care asigura durabilitatea in exploatare si pastrarea in timp a calitatii acoperirii. Astfel:</p>
                        <ul>
                            <li>Produsul se conditioneaza la temperatura de aplicare 24 ore inainte de aplicare.</li>
                            <li>Inainte de deschiderea ambalajului se indeparteaza praful sau alte urme de murdarie.</li>
                            <li>Se omogenizeaza produsul in ambalajul original, folosind un amestecator mecanic, in vederea redispersarii eventualului sediment.</li>
                            <li>Inainte de utilizare este necesara filtrarea produsului.</li>
                            <li>Grundurile de amorsare se vor dilua, in functie de tipul de produs, prin adaugarea de <a href="/diluant-poliuretanic" title="Solvent pentru produse poliuretanice" class="link_color1"><em>Diluant Poliuretanic “Emex”</em></a>, sau alt diluant recomandat de producator, cum ar fi <a href="/diluant-epoxidic" title="Diluant epoxidic pentru vopsele de pardoseala" class="link_color1"><em>Diluantul Epoxidic “Emex”</em></a>.</li>
                            <li>Se omogenizeaza bine componenta A in ambalaj folosind un amestecator mecanic, apoi se adauga si componenta B in rapoartele prevazute in Fisa Tehnica a produsului.</li>
                        </ul>
                        <div class="aplicare_titlu mt-40 aplicare_tab_content_title aplicare_c_red">Conditii de aplicare</div>
                        <div class="aplicare_title_separator aplicare_separator_red"></div>
                        <ul>
                            <li>Temperatura optima de aplicare a produsului: 15 - 30°C.</li>
                            <li>Umiditatea relativa a mediului max. 65%.</li>
                            <li>Temperatura suportului va fi cu cel putin 3°C peste temperatura punctului de roua pentru a evita condensarea umiditatii pe suport, ce poate determina scaderea aderentei, a luciului sau aparitia de basicari.</li>
                            <li>Produsele nu se vor aplica pe timp de ceata, ploaie, ninsoare, vant, in prezenta prafului, sau cand exista pelicula de apa sau gheata pe suprafata – suport.</li>
                            <li><strong>Aplicarea sub 15°C nu este recomandata, intrucat reticularea produsului este imprevizibila. Aplicarea sub aceasta temperatura poate fi facuta doar dupa instiintarea producatorului, cu materiale speciale pentru acest scop, care pot cobori temperatura de formare a filmului pana la 0°C</strong>.</li>
                            <li>De asemeni, nu se va aplica la temperaturi mai mari de 35°C in aer, temperatura peste care poate aparea o uscare fortata, ce va diminua calitatile peliculei.</li>
                        </ul>
                        <p><span class="alineat_span"></span><em>Pentru obtinerea de rezultate optime este obligatorie consultarea <strong>Fisei Tehnice</strong>.</em></p>
                    </div>
    </div>

    <div id="PregatireMetal" class="tab-content">
        <h2 class="aplicare_tab_content_title">Pregatirea suprafetelor inaintea aplicarii de membrana hidroizolanta</h2>
                    <div class="aplicare_title_separator aplicare_c_orange"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>Aplicarea de <a href="/aplicare-membrana-hidroizolanta-poliuretanica" title="Membrana poliuretanica hidroizolanta" class="link_color1"><em>Membrana Hidroprotectoare</em></a> pe suprafetele din beton, mozaic sau alte tipuri de materiale cimentice pentru pardoseala se face numai dupa pregatirea corespunzatoare a suportului, deoarece aceasta etapa are o influenta hotaratoare asupra calitatii si durabilitatii acoperirii. Astfel:</p>
                        <ul>
                            <li><strong>Betoanele sau sapele noi (inclusiv reparatiile), necesita minim 28 zile pentru intarire si uscare inaintea aplicarii (fac exceptie sapele autonivelante cu uscare rapida); nerespectarea acestei conditii afecteaza rezistenta produsului in timp si determina exfolieri sau basicari.</strong></li>
                            <li>Suportul cimentic trebuie sa fie intact, lipsit de contaminanti precum ulei, grasime, tratamente ale suprafetei si acoperiri, etc.</li>
                            <li>Punctele mai inalte de pe suprafata se vor indeparta prin slefuire, particulele libere si friabile se vor indeparta mecanic. Acoperirile existente trebuie inspectate, curatate mecanic, pentru a obtine un suport adecvat cu aderenta buna.</li>
                            <li>Se remediaza fisurile si alte imperfectiuni inainte de aplicarea produsului, de preferinta cu un chit epoxidic, <a href="/mortar-epoxidic" title="Mortar epoxidic pentru umplere goluri" class="link_color1"><em>Mortar Epoxidic “Emex”</em></a>, sau alt produs cu aderenta si duritate superioare.</li>
                            <li>Daca exista protectii anterioare, cu aderenta scazuta sau in curs de deteriorare, acestea vor fi inlaturate in totalitate, indiferent de starea acestora, prin sablare sau slefuire cu discuri diamantate. Exceptie fac vopsirile sau pardoselile epoxidice in stare buna, care vor fi pregatite doar prin slefuire.</li>
                            <li>Protectiile anterioare <strong>epoxidice sau poliuretanice</strong>, atat vopsele cat si pardoseli, in stare buna, care prezinta luciu, vor fi obligatoriu asperizate cu masina de slefuit cu discuri, sau benzi abrazive, curatate de impuritati sau grasimi prin slefuire, praful rezultat indepartandu-se cu perii cu par moale sau prin suflare cu aer comprimat.</li>
                            <li>Indepartarea peliculelor existente (altele decat cele epoxidice) se mai poate face si prin folosirea <a href="/decapant-ecologic-vopsele" title="Solutie pentru decaparea vopselelor vechi" class="link_color1"><em>Pastei decapante “Emex PC ECO”</em></a>, prin slefuire cu perii mecanice, sau prin ardere.</li>
                            <li>Oricare dintre operatiunile de inlaturare a vopselei vechi expuse mai sus, va fi urmata de slefuire.</li>
                            <li>Suprafetele ce urmeaza a se acoperi cu <a href="/aplicare-membrana-hidroizolanta-poliuretanica" title="Membrana poliuretanica impermeabilizanata bicomponenta" class="link_color1"><em>Membrana Poliuretanica Bicomponenta</em></a>, se curata de impuritati sau grasimi, se asperizeaza, praful rezultat indepartandu-se cu perii cu par moale sau prin suflare cu aer comprimat.</li>
                            <li>Suprafetele trebuie sa fie netede, plane si uscate in limita a 4% umiditate.</li>
                            <li>Inainte de aplicarea pardoselii, se va aplica un <a href="/amorsa-poliuretanica-impregnare" title="Amorsa pentru vopsele poliuretanice" class="link_color1"><em>Grund de Amorsare Poliuretanic “Emex”</em></a>, sau <a href="/amorsa-epoxidica-impregnare" title="Amorsa pentru vopsele epoxidice" class="link_color1"><em>Grund de Amorsare Epoxidic “Emex”</em></a>.</li>
                        </ul>
                        <p><span class="alineat_span"></span>Incluziunile metalice vor fi curatate cu <a href="/solutie-anti-rugina" title="Solutie inlaturare rugina pe suprafete metalice" class="link_color1"><em>Solutia de Indepartare a Ruginii “Emex Rust Stop”</em></a> (urmata de spalare cu apa din abundenta), si acoperite in mod obligatoriu dupa uscare cu <a href="/grund-epoxidic" title="Grund anticoroziv epoxidic “Emex”" class="link_color1"><em>Grund Epoxidic Anticoroziv “Emex”</em></a> sau <a href="/grund-poliuretanic" title="Grund anticoroziv poliuretanic “Emex”" class="link_color1"><em>Grund Poliuretanic Anticoroziv “Emex”</em></a>.</p>
                    </div>
    </div>

    <div id="PregatireLemn" class="tab-content">
        <h2 class="aplicare_tab_content_title aplicare_c_green">Aplicarea membranei hidroizolante</h2>
        <div class="aplicare_title_separator aplicare_separator_green"></div>
        <div class="descript_par">
            <p><span class="alineat_span"></span>Aplicarea produsului pe suprafata-suport se face numai dupa pregatirea corespunzatoare a acesteia, potrivit indicatiilor din tab-ul anterior sau din fisa tehnica in functie de starea si tipul suportului.</p>
            <p><span class="alineat_span"></span>Aplicarea <a href="/aplicare-membrana-hidroizolanta-poliuretanica" title="Membrana hidroizolanta poliuretanica pentru beton" class="link_color1"><em>Membranei Poliuretanice Hidroizolante</em></a>, se face prin turnare si intindere cu piepteni sau tragatoare speciale, cu posibilitatea de reglare a inaltimii dintilor, astfel:</p>
            <ul>
                <li>Se conditioneaza produsul conform instructiunilor de pregatire a produsului.</li>
                <li>Se pregatesc suprafetele conform instructiunilor de pregatire a suprafetelor.</li>
                <li>Inainte de a se turna membrana, se va aplica un <a href="/amorsa-epoxidica-impregnare" title="Amorsa pentru vopsele epoxidice" class="link_color1"><em>Grund de Amorsare Epoxidic “Emex”</em></a> sau <a href="/amorsa-poliuretanica-impregnare" title="Amorsa pentru vopsele poliuretanice" class="link_color1"><em>Grund de Amorsare Poliuretanic “Emex”</em></a>.</li>
                <li>Dupa uscarea acestuia (6 - 12 ore) se va pregati membrana poliuretanica, potrivit instructiunilor de pregatire a produsului din pagina anterioara sau din Fisa Tehnica.</li>
            </ul>
            <hr class="hr-aplic">
            <ul class="li-indent">
                <li><strong><span class="subs-attn">Elemente foarte importante:</span></strong></li>
                <li>Raportul de amestecare este <strong>gravimetric si <span class="subs-attn">NU</span> volumetric</strong>.</li>
                <li>Se va amesteca doar cantitatea ce se poate folosi in perioada de viabilitate a amestecului (pot-life), de cca. 30 min. la 23°C, pentru evitarea pierderilor necontrolate.</li>
                <li>Pot-life-ul poate scadea odata cu cresterea temperaturii si marirea cantitatii de amestec, datorita accelerarii reactiilor chimice, la temperaturi mai mari de 23°C.</li>
                <li>Produsul si intaritorul se vor amesteca max. 3 minute la viteza mica de rotatie.</li>
                <li>Nu este recomandata aplicarea produsului sub pragul de +15°C, intrucat timpul de uscare se poate prelungi necontrolat, altfel decat sub indrumarea producatorului.</li>
            </ul>
            <hr class="hr-aplic">
            <ul>
                <li>Se va proceda la turnarea Membranei Poliuretanice si la intinderea acesteia cu tragatorul. Inaltimea finala este data prin reglarea dintilor tragatorului.</li>
                <li>Dupa intindere se va face dezaerarea statului turnat cu role cu ace. Pe membrana proaspat turnata nu se poate calca decat cu sandale speciale cu cuie.</li>
                <li><a href="/aplicare-membrana-hidroizolanta-poliuretanica" title="Membrana hidroizolanta poliuretanica pentru beton" class="link_color1"><em>Membrana Poliuretanica Hidroizolanta “Emex”</em></a> are o durata de uscare de cca. 8 ore la 20 - 23°C, timp in care se va produce si gonflarea specifica.
                </li><li>Parametrii de rezistenta, atat chimica cat si mecanica se vor realiza dupa cca. 4 zile de la aplicare, la o temperatura de 20 – 23°C.
                </li><li>In cazul pardoselilor antiderapante, cum ar fi <a href="/pardoseala-epoxidica-antiderapanta" title="Pardoseala antiderapanta din rasini epoxidice" class="link_color1"><em>Pardoseala Epoxidica Antiderapanta “Emex”</em></a>, sau <a href="/pardoseala-poliuretanica-antiderapanta" title="Pardoseala antiderapanta din rasini poliuretanice" class="link_color1"><em>Pardoseala Poliuretanica Antiderapante “Emex”</em></a>, se va aplica in exces cuart si se va nivela. Dupa uscare se indeparteaza excesul si se acopera pardoseala cu un strat final de vopsea sau lac.</li>
            </ul>
            <p>
                <span><img width="40" height="35" class="atentie-consum" src="{{ asset('resources/images/general/Atentie-mic.png') }}" alt="Atentie suprafete nerecomandate"></span>
                <span class="attn-underline"><strong>NOTA</strong></span>: <strong>Membrana Poliuretanica Hidroizolanta</strong> in contact cu apa in faza de preparare / aplicare sufera deteriorari ireversibile, calitatea rezultata fiind afectata semnificativ, acesasta putand fi compromisa iremediabil.<br>
                <span class="alineat_span"></span><span class="alineat_span"></span>Depozitarea la temperaturii sub pragul de 5°C conduce la degradarea ireversibila a produsului.
            </p>
            
        </div>
    </div>

@endsection

@section('images')
<img width="201" height="185" src="{{ asset('resources/images/aplicare/Membrana-hidroprotectoare.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">

<img width="201" height="185" src="{{ asset('resources/images/aplicare/Protectie-hidroizolanta-cu-membrana.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">

<img width="201" height="185" src="{{ asset('resources/images/aplicare/Protectie-membrana-poliuretanica.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">

@endsection

@php
    $secondary_title = 'Aplicarea Membranei Hidroizolante “Emex”';
@endphp