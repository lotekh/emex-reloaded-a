@extends('aplicare.layout')

@section('header_image_source', asset('resources/images/aplicare/Vopsiri-epoxidice-poliuretanice.jpg'))
@section('header_title') 
APLICARI VOPSELE SI GRUNDURI <br> BICOMPONENTE “EMEX”
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/produse">Toate Produsele</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/vopsele-industriale">Vopsele speciale</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Aplicare Vopsele Bicomponente</li></ul>
@endsection

@section('tab-buttons')
    <button type="button" name="current_tab" value="0" role="tab" class="btn user-valid valid selected" option="0" aria-selected="true" tabindex="0" onclick="openTab(event, 'PregatireProdus')"><span>Pregatire Produs</span></button>
    <button type="button" name="current_tab" value="1" role="tab" class="btn user-valid valid" option="1" aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireMetal')"><span>Pregatire Metal</span></button>
    <button type="button" name="current_tab" value="2" role="tab" class="btn user-valid valid" option="2" aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireLemn')"><span>Pregatire Lemn</span></button>
    <button type="button" name="current_tab" value="3" role="tab" class="btn user-valid valid" option="3" aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireBeton')"><span>Pregatire Beton</span></button>
@endsection

@section('tab_contents')
    <div id="PregatireProdus" class="tab-content active">
        <h2 class="aplicare_tab_content_title aplicare_c_red">Lacuri, Vopsele si Grunduri Bicomponente “Emex”: Pregatire</h2>
                    <div class="aplicare_title_separator aplicare_separator_red"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>In aceasta categorie se regasesc toate grundurile epoxidice si poliuretanice, vopselele epoxidice si poliuretanice cat si lacurile poliuretanice pentru lemn sau mobila.</p>
                        <p><span class="alineat_span"></span>Instructiunile prezentate in aceste pagini au doar caracter orientativ. Pentru instructiuni detaliate cititi Fisa Tehnica a produsului sau solicitati instructiuni speciale de aplicare, de la producator.</p>
                        <p><span class="alineat_span"></span>Pregatirea, atat a produsului cat si a suprafetelor, reprezinta o etapa indispensabila pentru realizarea unor performante maxime in aplicarea vopselelor de orice tip. Astfel:</p>
                        <ul>
                            <li>Produsul se conditioneaza la temperatura de aplicare 24 ore inainte de aplicare.</li>
                            <li>Inainte de deschiderea ambalajului se indeparteaza praful sau alte urme de murdarie.</li>
                            <li>Se omogenizeaza produsul in ambalajul original,folosind un amestecator mecanic, in vederea redispersarii eventualului sediment.</li>
                            <li>Inainte de utilizare este necesara filtrarea produsului.</li>
                            <li>In functie de modul de aplicare se face reglarea vascozitatii, prin adaugarea de <a href="/diluant-epoxidic" title="Diluant pentru vopsele epoxidice “Emex”" class="link_color1"><em>Diluant Epoxidic “Emex”</em></a>, <a href="/diluant-poliuretanic" title="Diluant pentru vopsele poliuretanice “Emex”" class="link_color1"><em>Diluant Poliuretanic “Emex”</em></a>, sau alt diluant recomandat de producator.</li>
                            <li>Se omogenizeaza bine componenta A in ambalaj folosind un amestecator mecanic, apoi se adauga si componenta B in rapoartele prevazute in Fisa Tehnica a produsului.</li>
                        </ul>
                        <div class="aplicare_titlu mt-40 aplicare_tab_content_title aplicare_c_red">Conditii de aplicare</div>
                        <div class="aplicare_title_separator aplicare_separator_red"></div>
                        <ul>
                            <li>Temperatura optima de aplicare a produsului: 15 - 30°C.</li>
                            <li>Umiditatea relativa a mediului max. 65%.</li>
                            <li>Temperatura suportului va fi cu cel putin 3°C peste temperatura punctului de roua pentru a evita condensarea umiditatii pe suport, ce poate determina scaderea aderentei, a luciului sau aparitia de basicari.</li>
                            <li>Produsele nu se vor aplica pe timp de ceata, ploaie, ninsoare, vant, in prezenta prafului, sau cand exista pelicula de apa sau gheata pe suprafata – suport.</li>
                            <li>Aplicarea sub 15°C nu este recomandata, intrucat produsul reticuleaza foarte greu.</li>
                            <li>De asemeni, nu se va aplica la temperaturi mai mari de 35°C in aer, temperatura peste care poate aparea o uscare fortata, ce va diminua calitatile peliculei.</li>
                        </ul>
                        <p><span class="alineat_span"></span><em>Pentru obtinerea de rezultate optime este obligatorie consultarea <strong>Fisei Tehnice</strong>.</em></p>
                    </div>
    </div>

    <div id="PregatireMetal" class="tab-content">
        <h2 class="aplicare_tab_content_title">Pregatirea pentru vopsire a suprafetelor din metal</h2>
                    <div class="aplicare_title_separator aplicare_c_orange"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>Pregatirea generala, pentru vopsire, a suprafetelor din metal, comporta doua modalitati:</p>
                        <p><span class="alineat_span"></span><strong>1. <span class="subs-attn">pregatirea primara</span></strong>, aplicabila in special suprafetelor noi, care consta in:</p>
                        <ul>
                            <li>Indepartarea murdariei, a urmelor de noroi, praf, grasimi sau alti contaminanti.</li>
                            <li>Degresarea suprafetei – este recomandat sa se efectueze cu solutii alcaline, care au o eficienta mai mare, dar poate fi facuta si cu solvent sau decapant, desi aceasta metoda este mai scumpa si prezinta un grad mai mare de expunere, atat in efectuare, cat si pentru sanatate.</li>
                            <li>Pregatirea sudurilor si marginilor sudate, prin indepartarea zgurii si stropilor, etc.</li>
                            <li>Indeparatea sarurilor solubile, care de regula se face cu apa sub presiune, si</li>
                        </ul>
                        <p><span class="alineat_span"></span><strong>2. <span class="subs-attn">pregatirea secundara</span></strong>, ce are in vedere indepartarea urmelor de vopsea veche, a ruginii sau tunderului si crearea de puncte de ancora pentru asigurarea unei aderente ridicate a vopselei la suport, si se realizeaza prin:</p>
                        <ul>
                            <li>Sablare la gradul Sa 2 ½ (conform ISO 8501/1-88) sau 2 (conform STAS 10166/1-77) urmata de desprafuire si degresare.</li>
                            <li>Indepartarea urmelor de rugina acolo unde exista, prin folosirea <a href="/solutie-anti-rugina" title="Solutie inlaturare rugina “Emex”" class="link_color1"><em>Solutiei impotriva ruginii “Emex Rust Stop”</em></a> (urmata de spalare cu apa din abundenta), si indepartarea straturilor de vopsea veche prin folosirea <a href="/decapant-ecologic-vopsele" title="Solutie decapanta pentru vopsele" class="link_color1"><em>Pastei pentru decapare “Emex PC ECO”</em></a>, daca aceste urme nu provin de la vopsele bicomponente, caz in care nu este eficienta decat sablarea, sau asperizarea cu perii mecanice.</li>
                            <li>Curatarea cu flacara, aplicabila in cazul protectiilor anterioare foarte vechi, urmata obligatoriu de asperizare, desprafuire si spalare.</li>
                            <li>In mod obligatoriu, straturile degradate de vopsea veche vor fi indepartate in totalitate. Cele in buna stare, vor fi doar slefuite pentru asperizare, caz in care se va testa compatibilitatea vopselei.</li>
                        </ul>
                        <p><span class="alineat_span"></span>Pentru o buna aderenta si protectie fata de intemperii este obligatorie aplicarea unui <a href="/grund-epoxidic" title="Grund anticoroziv epoxidic “Emex”" class="link_color1"><em>Grund Epoxidic Anticoroziv “Emex”</em></a> sau <a href="/grund-poliuretanic" title="Grund anticoroziv poliuretanic “Emex”" class="link_color1"><em>Grund Poliuretanic Anticoroziv “Emex”</em></a>.</p>
                        <p><span class="alineat_span"></span>Se va avea in vedere compatibilitatea cu vopseaua aplicata ca strat final (confirmata obligatoriu de producator), atat pentru protejarea suprafetei metalice impotriva coroziunii, cat si pentru marirea aderentei stratului urmator.</p>
                        <p><span class="alineat_span"></span><span class="subs-attn"><em>Sistemele poliuretanice si epoxidice pot fi folosite si pentru acoperirea suprafetelor tratate chimic</em></span>.</p>
                    </div>
    </div>

    <div id="PregatireLemn" class="tab-content">
        <div class="col" id="tab_technical_chars2">
            <h2 class="aplicare_tab_content_title aplicare_c_green">Pregatirea pentru vopsire a suprafetelor din lemn</h2>
            <div class="aplicare_title_separator aplicare_separator_green"></div>
            <div class="descript_par">
                <p><span class="alineat_span"></span>Pregatirea pentru vopsire a suprafetelor din lemn trebuie facuta cu mare atentie. Suprafata trebuie sa fie perfect uscata si curata inainte de aplicarea vopselei, fara urme de praf sau contaminanti.</p>
                <p><span class="alineat_span"></span>Alegerea unui sistem corect de vopsire va prelungi cu mult durata de viata a suprafetei din lemn vopsite, asigurand totodata si un aspect placut, decorativ.</p>
                <p><span class="alineat_span"></span>Pentru obtinerea unor performante optime, vor trebui urmate unele operatiuni obligatorii, dintre care enumeram:</p>
                <ul>
                    <li>Suprafetele se curata de murdarie, picaturi de rasina si eventuale urme de grasime imbibate in fibre.</li>
                    <li>Se are in vedere ca umiditatea lemnului trebuie sa fie de max. 10% la foioase si 12% la conifere.</li>
                    <li>Daca exista protectii anterioare in stare buna, acestea se degreseaza cu solvent, suprafata inca umeda se slefuieste cu hartie abraziva, apoi se usuca si se desprafuieste.</li>
                    <li>Peliculele vechi, deteriorate sau lipsite de aderenta se indeparteaza complet prin folosirea <a href="/decapant-ecologic-vopsele" title="Solutie decapanta ecologica “Emex”" class="link_color1"><em>Pastei Decapante “Emex PC ECO”</em></a>, daca aceste pelicule nu provin de la vopsele bicomponente, caz in care solutia de indepartare nu poate fi decat slefuirea mecanica.</li>
                    <li>Inlaturarea peliculelor vechi se mai poate face prin slefuire cu perii mecanice, sau prin ardere.</li>
                    <li>Oricare dintre operatiunile de inlaturare a vopselei vechi va fi urmata de slefuire.</li>
                    <li>Suportul se slefuieste cu hartie abraziva de granulatie 180 - 220 (atat la lemn nou cat si la suprafete mai vechi) in lungul fibrelor si se desprafuieste prin suflare cu aer comprimat.</li>
                    <li>Inainte de aplicarea grundului este insa recomandata aplicarea unui inhibitor de mucegai, sau folosirea de substante protectoare contra bacteriilor.</li>
                    <li>Inainte de a aplica vopseaua, este indicat sa se aplice fie un grund pentru lemn, fie o amorsa facuta din vopseaua propriu-zisa, diluata cca. 30% cu diluantul aferent acesteia (in cazul de fata <a href="/diluant-epoxidic" title="Diluant pentru vopsele epoxidice" class="link_color1"><em>Diluant Epoxidic “Emex”</em></a> sau <a href="/diluant-poliuretanic" title="Diluant pentru vopsele poliuretanice" class="link_color1"><em>Diluant Poliuretanic “Emex”</em></a>.</li>
                    <li>Lacurile se aplica in general in 3 straturi, pentru obtinerea unui luciu, aspect si etalare deosebite, mai ales in cazul <a href="/lac-poliuretanic-mobila" title="Lac pentru mobila poliuretanic bicomponent" class="link_color1"><em>Lacului Poliuretanic pentru Mobila “Emex”</em></a>, care are o duritate foarte buna, dar necesita slefuire intre straturi.</li>
                </ul>
                <p><span class="alineat_span"></span>Este total contraindicata folosirea uleiului de in pentru impregnarea lemnului care, pe de o parte se degradeaza foarte repede in timp, iar pe de alta parte creeaza un mediu propice pentru aparitia si dezvoltarea bacteriilor.</p>
                <p><span class="alineat_span"></span>Nu se vor aplica vopsele, grunduri sau lacuri poliuretanice sau epoxidice pe lemn ud in profunzime, sau neuscat in limitele admise.</p>
            </div>
        </div>
    </div>

    <div id="PregatireBeton" class="tab-content active">
        <div class="col" id="tab_technical_chars2">
            <h2 class="aplicare_tab_content_title aplicare_c_blue">Pregatirea pentru Vopsire a Suprafetelor din Beton</h2>
            <div class="aplicare_title_separator aplicare_separator_blue"></div>
            <div class="descript_par">
                <p><span class="alineat_span"></span>Aplicarea produsului pe suprafata-suport din beton, zidarie, tencuieli var-ciment, tencuieli si gleturi de var sau ipsos, tencuieli noi sau vechi pe baza de lianti, placi de gips-carton, conglomerate minerale absorbante de orice tip, zugraveli vechi de natura organica sau minerala, uscate, compacte si absorbante, etc., se face numai dupa pregatirea corespunzatoare a acesteia, deoarece aceasta etapa are o influenta hotaratoare asupra calitatii si durabilitatii acoperirii.<br>
                                                            <span class="alineat_span"></span>Astfel:</p>
                <ul>
                    <li><strong>Betonul sau mortarele noi (inclusiv reparatiile) necesita minim 28 zile pentru intarire si uscare inaintea aplicarii; nerespectarea acestei conditii afecteaza rezistenta produsului in timp si determina exfolieri sau basicari</strong></li>
                    <li>Suprafetele tencuite se verifica prin ciocanire inainte de aplicarea produsului; daca se dovedesc necorespunzatoare (suna a gol) se indeparteaza complet tencuiala, pana la zidarie si se refac cu un mortar de aceeasi clasa cu cel initial.</li>
                    <li>Se remediaza fisurile si alte imperfectiuni inainte de aplicarea produsului.</li>
                    <li>Daca exista protectii anterioare in stare buna, se degreseaza cu solvent, se slefuieste suprafata cu hartie abraziva, se usuca si se desprafuieste.</li>
                    <li>Peliculele anterioare deteriorate, in curs de exfoliere sau fara o buna aderenta se indeparteaza complet prin folosirea <a href="/decapant-ecologic-vopsele" title="Solutie decapanta pentru curatare vopsele vechi" class="link_color1"><em>Pastei Decapante “Emex PC ECO”</em></a>.</li>
                    <li>Inlaturarea peliculelor vechi se mai poate face prin slefuire cu perii mecanice ori discuri diamantate, sau prin ardere.</li>
                    <li>Oricare dintre operatiunile de inlaturare a vopselei vechi va fi urmata de slefuire.</li>
                    <li>Zonele atacate de mucegai se curata si se impregneaza cu solutii special destinate acestui scop.</li>
                    <li>Suprafetele ce urmeaza a se acoperi cu vopsea, se curata de impuritati sau grasimi, se asperizeaza, praful rezultat indepartandu-se cu perii cu par moale sau prin suflare cu aer comprimat.</li>
                    <li>Suprafetele trebuie sa fie netede, plane, uscate.</li>
                    <li>Inainte de a aplica vopseaua, mai ales pe pardoseli, se va aplica un <a href="/amorsa-epoxidica-impregnare" title="Amorsa pentru vopsele epoxidice" class="link_color1"><em>Grund de Amorsare Epoxidic “Emex”</em></a> sau <a href="/amorsa-poliuretanica-impregnare" title="Amorsa pentru vopsele poliuretanice" class="link_color1"><em>Grund de Amorsare Poliuretanic “Emex”</em></a>.</li>
                </ul>
                <p><span class="alineat_span"></span>Incluziunile metalice vor fi acoperite in mod obligatoriu cu <a href="/grund-epoxidic" title="Grund anticoroziv epoxidic" class="link_color1"><em>Grund Epoxidic Anticoroziv “Emex”</em></a> sau <a href="/grund-poliuretanic" title="Grund anticoroziv poliuretanic bicomponent" class="link_color1"><em>Grund Poliuretanic Anticoroziv “Emex”</em></a>, pentru a preveni aparitia fenomenelor de oxidare, ce se pot propaga prin stratul de vopsea.</p>
            </div>
        </div>
    </div>

@endsection

@section('images')
    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Vopsire-pardoseala-industriala.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">

    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Vopsiri-bicomponente-de-pardoseala.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">

    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Vopsire-epoxidica-hala-industriala.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">
@endsection