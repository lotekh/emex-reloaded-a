@extends('aplicare.layout')

@section('header_image_source', asset('resources/images/aplicare/Vopsea-epoxidica-de-pardoselala.jpg'))
@section('header_title') 
APLICARE VOPSELE DE <br> PARDOSEALA “EMEX”
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/produse">Toate Produsele</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/vopsele-trafic-pardoseala">Vopsele pardoseli si trafic</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Aplicare Vopsele Pardoseala</li></ul>
@endsection

@section('tab-buttons')
    <button type="button" name="current_tab" value="0" role="tab" class="btn user-valid valid selected" option="0" aria-selected="true" tabindex="0" onclick="openTab(event, 'PregatireProdus')"><span>Pregatire Produs</span></button>
    <button type="button" name="current_tab" value="1" role="tab" class="btn user-valid valid" option="1" aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireMetal')"><span>Pregatire Suport</span></button>
    <button type="button" name="current_tab" value="2" role="tab" class="btn user-valid valid" option="2" aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireLemn')"><span>Aplicare Produs</span></button>
@endsection

@section('tab_contents')
    <div id="PregatireProdus" class="tab-content active">
        <h2 class="aplicare_tab_content_title aplicare_c_red">Vopsele pentru Pardoseli “Emex”: Pregatire</h2>
                    <div class="aplicare_title_separator aplicare_separator_red"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>In aceasta categorie se regasesc vopsele pentru pardoseli ca: <a href="/vopsea-epoxidica-pardoseli" title="Vopsea epoxidica pentru pardoseala" class="link_color1"><em>Vopsea Epoxidica pentru Pardoseala “Emex”</em></a>, <a href="/vopsea-poliuretanica-pardoseli" title="Vopsea poliuretanica pentru pardoseli din beton" class="link_color1"><em>Vopsea Poliuretanica pentru Pardoseala “Emex”</em></a>, <a href="/vopsea-clorcauciuc-pardoseli" title="Vopsea clorcauciuc pentru pardoseala din beton" class="link_color1"><em>Vopsea Clorcauciuc pentru Pardoseala “Emex”</em></a>.</p>
                        <p><span class="alineat_span"></span>Instructiunile prezentate in aceste pagini au doar caracter orientativ. Pentru instructiuni detaliate cititi Fisa Tehnica a produsului sau solicitati instructiuni speciale de aplicare, de la producator.</p>
                        <p><span class="alineat_span"></span>Pregatirea suprafetei este factorul determinant in obtinerea unei maxime aderente, care asigura durabilitatea in exploatare si pastrarea in timp a calitatii acoperirii. Astfel:</p>
                        <ul>
                            <li>Produsul se conditioneaza la temperatura de aplicare minim 24 ore inainte de aplicare.</li>
                            <li>Inainte de deschiderea ambalajului se indeparteaza de pe acesta praful sau alte urme de murdarie pentru a nu contamina produsul.</li>
                            <li>Se omogenizeaza bine produsul in ambalajul original, folosind un amestecator mecanic, in vederea redispersarii eventualului sediment.</li>
                            <li>Inainte de utilizare este necesara filtrarea produsului.</li>
                            <li>In functie de tipul vopselei, se face reglarea vascozitatii, prin adaugarea de <a href="/diluant-epoxidic" title="Diluant pentru vopsele epoxidice bicomponente" class="link_color1"><em>Diluant Epoxidic “Emex”</em></a>, <a href="/diluant-poliuretanic" title="Diluant poliuretanic pentru solventare vopsele" class="link_color1"><em>Diluant Poliuretanic “Emex”</em></a> sau <a href="/diluant-clorcauciuc" title="Solvent pentru vopsele clorcauciuc" class="link_color1"><em>Diluant pentru Vopsele Clorcauciuc “Emex”</em></a>.</li>
                            <li>In cazul vopselelor de pardoseala bicomponente se omogenizeaza bine componenta A in ambalaj folosind un amestecator mecanic, apoi se adauga si componenta B in rapoartele prevazute in Fisa Tehnica a produsului.</li>
                            <li>Aplicarea se poate face cu pensula, trafaletul sau prin pulverizare air-less.</li>
                            <li>Este interzisa amestecarea produsului cu alte vopsele chiar similare, pentru evitarea riscului aparitiei unor probleme de compatibilitate.</li>
                        </ul>
                        <div class="aplicare_titlu mt-40 aplicare_tab_content_title aplicare_c_red">Conditii de aplicare</div>
                        <div class="aplicare_title_separator aplicare_separator_red"></div>
                        <ul>
                            <li>Temperatura optima de aplicare a produsului: 5 - 30°C.</li>
                            <li>Temperatura produsului: 5 - 30°C.</li>
                            <li>Temperatura suportului: 5 - 40°C., dar obligatoriu cu min 3°C peste temperatura punctului de roua, temperatura la care apare riscul condensarii umiditatii pe suport, fapt care diminueaza caracteristicile finale de pelicula.</li>
                            <li>Umiditatea relativa a mediului max. 65%.</li>
                            <li>Produsele nu se vor aplica pe timp de ceata, ploaie, ninsoare, vant, in prezenta prafului, sau cand exista pelicula de apa sau gheata pe suprafata – suport.</li>
                            <li>Vopselele de pardoseala, epoxidice sau poliuretanice, nu se vor utiliza sau depozita la temperaturi de sub 10°C.</li>
                            <li>Aplicarea la temperaturi de sub 10°C nu este recomandata, pentru ca rezultatele se pot situa sub limitele de calitate acceptabile.</li>
                            <li>De asemeni, nu se recomanda aplicarea la temperaturi mai mari de 35°C in aer, datorita faptului ca peste aceasta temperatura pot aparea fenomene de uscare fortata, care, si in acest caz va diminua calitatea finala a peliculei.</li>
                            <li><strong>Aplicarea sub 10°C poate fi facuta doar dupa instiintarea producatorului, cu materiale speciale pentru acest scop, care pot cobori temperatura de formare a filmului pana la 0°C</strong>.
                            </li></ul>
                        <p class="text-center"><em><span class="subs-attn">Pentru obtinerea de rezultate optime este obligatorie consultarea <strong>Fisei Tehnice</strong></span>.</em></p>
                    </div>
    </div>

    <div id="PregatireMetal" class="tab-content">
        <h2 class="aplicare_tab_content_title">Pregatirea suportului pentru aplicarea de vopsele de pardoseala</h2>
                    <div class="aplicare_title_separator aplicare_c_orange"></div>
                    <div class="descript_par">
                        <p>Aplicarea produsului pe suprafetele din beton, mozaic sau alte tipuri de materiale suport pentru <a href="/vopsele-trafic-pardoseala" title="Vopsele pentru pardoseli din beton" class="link_color1"><em>vopselele de pardoseala</em></a> se face numai dupa pregatirea corespunzatoare a suportului, deoarece aceasta etapa are o influenta hotaratoare asupra calitatii si durabilitatii acoperirii. Astfel:</p>
                        <ul>
                            <li><strong>Betoanele sau sapele noi (inclusiv reparatiile), necesita minim 28 zile pentru intarire si uscare inaintea aplicarii (fac exceptie sapele autonivelante cu uscare rapida); nerespectarea acestei conditii afecteaza rezistenta produsului in timp si determina exfolieri sau basicari</strong>.</li>
                            <li>Sapele vechi se verifica prin ciocanire inainte de aplicarea produsului; daca se dovedesc necorespunzatoare (suna a gol) se sparge sapa in zona respectiva, pana la beton si se reface cu un mortar de aceeasi clasa cu cel initial.</li>
                            <li>Se remediaza fisurile si alte imperfectiuni inainte de aplicarea produsului, de preferinta cu <a href="/mortar-epoxidic" title="Mortar bicomponent epoxidic pentru reparatii" class="link_color1"><em>Mortar Epoxidic “Emex”</em></a>, sau alt chit cu aderenta si duritate superioare.</li>
                            <li>Daca exista protectii anterioare, acestea vor fi inlaturate indiferent de starea acestora (exceptie fac vopsirile sau pardoselile epoxidice sau poliuretanice in stare foarte buna, fara exfolieri, basicari sau eflorescente, care se vor pregati prin slefuire sau chiar sablare).</li>
                            <li>Protectiile anterioare <strong>epoxidice sau poliuretanice</strong>, atat vopsele cat si pardoseli, in stare buna, care prezinta luciu, vor fi obligatoriu asperizate cu masina de slefuit cu discuri, sau benzi abrazive.</li>
                            <li>Indepartarea peliculelor existente (altele decat cele epoxidice) se va face prin folosirea <a href="/gel-decapant" title="Solutie pentru indepartare vopsele vechi" class="link_color1"><em>Pastei decapante “Emex CM Cleaner”</em></a>, sau a oricarui alt produs similar.</li>
                            <li>Inlaturarea peliculelor vechi se mai poate face prin slefuire cu perii mecanice, sau prin ardere.</li>
                            <li>Oricare dintre operatiunile de inlaturare a vopselei vechi va fi urmata de slefuirea pentru finisare.</li>
                            <li>Suprafetele ce urmeaza a se acoperi cu vopsele pentru pardoseala, se curata de impuritati sau grasimi, se asperizeaza, praful rezultat indepartandu-se cu perii cu par moale sau prin suflare cu aer comprimat.</li>
                            <li>Suprafetele trebuie sa fie netede, plane si uscate in limita a 4 - 6% umiditate.</li>
                            <li>Inainte de aplicarea vopselei, se va aplica un <a href="/amorsa-epoxidica-impregnare" title="Grund de impregnare epoxidic pentru beton" class="link_color1"><em>Grund de Amorsare Epoxidic “Emex”</em></a>, <a href="/amorsa-poliuretanica-impregnare" title="Grund de amorsare poliuretanic pentru beton" class="link_color1"><em>Grund de Amorsare Poliuretanic “Emex”</em></a>, sau <a href="/amorsa-clorcauciuc-impregnare" title="Grund de amorsare monocomponent clorcauciuc" class="link_color1"><em>Grund de Impregnare Clorcauciuc “Emex”</em></a>, functie de tipul vopselei ce urmeaza a se aplica.</li>
                        </ul>
                        <p><span class="alineat_span"></span>Incluziunile metalice vor fi curatate cu <a href="/solutie-anti-rugina" title="Solutie pentru curatarea si prevenirea ruginii" class="link_color1">Solutia pentru Indepartarea Ruginii “Emex Rust Stop”</a> si acoperite in mod obligatoriu cu <a href="/grund-epoxidic" title="Grund epoxidic impotriva ruginii" class="link_color1"><em>Grund Epoxidic Anticoroziv “Emex”</em></a> sau <a href="/grund-poliuretanic" title="Grund poliuretanic inhibitor de rugina" class="link_color1"><em>Grund Poliuretanic Anticoroziv “Emex”</em></a>.</p>
                    </div>
    </div>

    <div id="PregatireLemn" class="tab-content">
        <h2 class="aplicare_tab_content_title aplicare_c_green">Aplicare vopsele de pardoseala</h2>
                    <div class="aplicare_title_separator aplicare_separator_green"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>Aplicarea produsului pe suprafata-suport se face numai dupa pregatirea corespunzatoare a acesteia, potrivit indicatiilor din tab-ul anterior sau din fisa tehnica in functie de starea si tipul suportului.</p>
                        <p><span class="alineat_span"></span>Aplicarea <strong>vopselelor pentru pardoseala</strong>, care pot fi gasite in pagina <a href="/vopsele-trafic-pardoseala" title="Vopsele pentru trafic intens si pardoseli" class="link_color1"><em>“Vopsele pentru Pardoseli si Trafic”</em></a>, atat epoxidice sau poliuretanice bicomponente, cat si clorcauciuc se face prin roluire sau stropire cu instalatii airless.</p>
                        <p><span class="alineat_span"></span>O aplicare corecta a vopselelor de pardoseala, va trebui sa urmeze urmatoarele etape:</p>
                        <ul>
                            <li>Se conditioneaza produsul conform instructiunilor de pregatire a produsului.</li>
                            <li>Se pregatesc suprafetele conform instructiunilor de pregatire a suprafetelor.</li>
                            <li>Umiditatea suportului va fi de max. 4 - 6%.</li>
                            <li>Inainte de vopsirea pardoselii, se va folosi un <a href="/amorsa-epoxidica-impregnare" title="Grund de impregnare epoxidic pentru beton" class="link_color1"><em>Grund de Amorsare Epoxidic “Emex”</em></a>, <a href="/amorsa-poliuretanica-impregnare" title="Grund de amorsare poliuretanic pentru beton" class="link_color1"><em>Grund de Amorsare Poliuretanic “Emex”</em></a>, sau <a href="/amorsa-clorcauciuc-impregnare" title="Grund de amorsare monocomponent clorcauciuc" class="link_color1"><em>Grund de Impregnare Clorcauciuc “Emex”</em></a>, in functie de tipul vopselei folosite.</li>
                            <li>Dupa uscarea grundului (12 - 24 ore pentru vopsele bicomponente sau max. 6 ore pentru vopseaua clorcauciuc) se va pregati vopseaua, conform instructiunilor specifice de pregatire a produsului, din tab-ul anterior sau din Fisa Tehnica.</li>
                        </ul>
                        <p><span class="alineat_span"></span>In cazul vopselelor bicomponente:</p>
                        <ul>
                            <li><span class="subs-attn">Raportul de amestecare este gravimetric si <strong>NU volumetric</strong></span>.</li>
                            <li>Se va amesteca doar cantitatea ce se poate folosi in perioada de viabilitate a amestecului (pot-life), prevazuta in Fisa Tehnica. Orice cantitate suplimentara pregatita, este compromisa dupa inceperea procesului de gelifiere.</li>
                            <li>Nu este recomandata aplicarea produsului sub pragul de +10°C, decat sub indrumarea producatorului. La o aplicare imperfecta, timpul de uscare se poate prelungi necontrolat.</li>
                            <li>Vascozitatea produsului se va regla, daca acest lucru este necesar, in functie de tipul vopselei utilizate, prin folosirea diluantului recomandat de producator.</li>
                            <li>Se va proceda la aplicarea vopselei prin roluire sau pulverizare air-less.</li>
                            <li>Pentru o se obtine o buna rezistenta, se recomanda aplicarea a doua straturi de vopsea, chiar daca puterea de acoperire permite aplicarea unui singur strat.</li>
                        </ul>
                        <p>
                            <span>
                                <img width="40" height="35" class="atentie-consum" src="{{ asset('resources/images/general/Atentie-mic.png') }}" alt="Atentie suprafete nerecomandate">
                            </span>                            
                            <span class="attn-underline"><strong>NOTA</strong></span>: Vopselele bicomponente, atat epoxidice cat si poliuretanice, in contact cu apa in faza de preparare / aplicare sufera deteriorari ireversibile, calitatea rezultata fiind afectata semnificativ.</p>
                    </div>
    </div>

@endsection

@section('images')
    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Vopsea-epoxidica-pardoseala.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">

    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Vopsea-decorativa-de-pardoseala.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">

    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Vopsiri-pardoseala-servicii-alimentare.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">
@endsection