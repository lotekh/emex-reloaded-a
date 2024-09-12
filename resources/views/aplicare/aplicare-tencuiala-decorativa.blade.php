@extends('aplicare.layout')

@section('header_image_source', asset('resources/images/aplicare/Aplicare-tencuiala-decorativa.jpg'))
@section('header_title') 
APLICARE TENCUIELI <br> DECORATIVE “EMEX”
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/produse">Toate Produsele</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/tencuieli-decorative">Tencuieli Decorative</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Aplicare Tencuieli Decorative</li></ul>
@endsection

@section('tab-buttons')
    <button type="button" name="current_tab" value="0" role="tab" class="btn user-valid valid selected" option="0" aria-selected="true" tabindex="0" onclick="openTab(event, 'PregatireProdus')"><span>Pregatire Produs</span></button>
    <button type="button" name="current_tab" value="1" role="tab" class="btn user-valid valid" option="1" aria-selected="false" tabindex="0" onclick="openTab(event, 'PregatireSuport')"><span>Pregatire Suport</span></button>
    <button type="button" name="current_tab" value="2" role="tab" class="btn user-valid valid" option="2" aria-selected="false" tabindex="0" onclick="openTab(event, 'AplicareProdus')"><span>Aplicare Produs</span></button>
@endsection

@section('tab_contents')
    <div id="PregatireProdus" class="tab-content active">
        <h2 class="aplicare_tab_content_title aplicare_c_red">Tencuieli Decorative “Emex”: Pregatire si Conditii de Aplicare</h2>
                    <div class="aplicare_title_separator aplicare_separator_red"></div>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>Aceste instructiuni sunt comune tuturor tencuielilor decorative, dar si produselor conexe ca <strong>Grunduri de amorsare pentru tencuieli</strong>, ce pot fi gasite <a  href="https://emex.ro/grunduri-amorse" class="link_color1"><em>in pagina dedicata</em></a>.</p>
                        <p><span class="alineat_span"></span>Instructiunile prezentate in aceste pagini au doar caracter orientativ. Pentru instructiuni detaliate cititi Fisa Tehnica a produsului sau solicitati instructiunile de aplicare, de la producator.</p>
                        <p><span class="alineat_span"></span>Pregatirea, atat a produsului cat si a suprafetelor, reprezinta o etapa indispensabila pentru realizarea unor performante maxime in aplicarea vopselelor de orice tip. Astfel:</p>
                        <ul>
                            <li>Produsul se conditioneaza la temperatura de aplicare minim 24 ore inainte de aplicare.</li>
                            <li>Inainte de deschiderea ambalajului se indeparteaza de pe acesta praful sau alte urme de murdarie pentru a nu contamina produsul.</li>
                            <li>Se omogenizeaza bine produsul in ambalajul original, folosind un amestecator mecanic, in vederea redispersarii eventualului sediment.</li>
                            <li>In functie de modul de aplicare se face reglarea vascozitatii, prin adaugarea de apa.</li>
                            <li>In cazul in care se foloseste vopsea lavabila pentru aplicarea prin pulverizare cu instalatii air-less, produsul se va filtra inainte de aplicare.</li>
                            <li>Nuantarea produsului se poate face doar cu pastele de colorare recomandate de producator, sau pe baza de teste prealabile de compatibilitate.</li>
                            <li>Aplicarea tencuielii se face doar cu fierul de glet, dupa care se structureaza cu drisca sau gletiera din inox sau plastic.</li>
                            <li>Amorsele sau vopsele lavabile de fond vor fi aplicate cu pensula, trafaletul sau prin pulverizare. <a href="https://emex.ro/aplicare-vopsele-lavabile" title="Detalii despre aplicare lavabile si amorse" class="link_color1"><em>Detalii aici... !</em></a></li>
                            <li>Este interzisa amestecarea produsului cu alte vopsele chiar similare, pentru evitarea riscului aparitiei unor probleme de compatibilitate.</li>
                            <li>Pentru obtinerea unor rezultate optime, inainte de aplicarea tencuielii decorative se va aplica un strat de fond, in culoarea finala a tencuielii, cu <a href="https://emex.ro/superlavabila-exterior-emex" title="Vopsea lavabila de mare acoperire" class="link_color1"><em>Vopsea Superlavabila de Exterior “Emex”</em></a>, sau similara.</li>
                        </ul>
                        <div class="aplicare_titlu mt-40 aplicare_tab_content_title aplicare_c_red">Conditii de aplicare</div>
                        <div class="aplicare_title_separator aplicare_separator_red"></div>
                        <ul>
                            <li>Temperatura optima de aplicare a produsului: 5 - 30°C.</li>
                            <li>Temperatura produsului: 5 - 30°C.</li>
                            <li>Temperatura suportului: 5 - 40°C., dar obligatoriu cu min 3°C peste temperatura punctului de roua, temperatura la care apare riscul condensarii umiditatii pe suport, fapt care diminueaza caracteristicile finale de pelicula.</li>
                            <li>Umiditatea relativa a mediului max. 65%.</li>
                            <li>Produsele nu se vor aplica pe timp de ceata, ploaie, ninsoare, vant, in prezenta prafului, sau cand exista pelicula de apa sau gheata pe suprafata – suport.</li>
                            <li>Tencuielile decorative nu se vor utiliza sau depozita la temperaturi de sub 5°C.</li>
                            <li>Aplicarea la temperaturi negative nu este recomandata, pentru ca rezultatele se pot situa sub limitele de calitate acceptabile.</li>
                            <li>De asemeni, nu se recomanda aplicarea la temperaturi mai mari de 35°C in aer, datorita faptului ca peste aceasta temperatura pot aparea fenomene de uscare fortata, care, si in acest caz va diminua calitatea finala a peliculei.</li>
                        </ul>
                        <p class="text-center"><em><span class="subs-attn">Pentru obtinerea de rezultate optime este obligatorie consultarea <strong>Fisei Tehnice</strong></span>.</em></p>
                    </div>
    </div>

    <div id="PregatireSuport" class="tab-content">
        <div class="col" id="tab_technical_chars">
            <h2 class="aplicare_tab_content_title">Pregatirea suprafetelor pentru aplicarea de tencuieli decorative</h2>
            <div class="aplicare_title_separator aplicare_c_orange"></div>
            <div class="descript_par">
                <p><span class="alineat_span"></span>Pregatirea suprafetelor-suport din beton, zidarie, glet de var, ipsos sau premixate, etc., reprezinta o etapa premergatoare aplicarii si obligatorie, deoarece are o influenta hotaratoare asupra calitatii si durabilitatii acoperirii. Astfel:</p>
                <ul>
                    <li><strong>Betonul sau mortarele noi (inclusiv reparatiile) necesita minim 28 zile pentru intarire si uscare inaintea aplicarii; nerespectarea acestei conditii afecteaza rezistenta produsului in timp, determina exfolieri sau basicari, iar vopselele colorate pot suferi modificari cromatice</strong>.</li>
                    <li>Suprafetele tencuite se verifica prin ciocanire inainte de aplicarea produsului; daca se dovedesc necorespunzatoare (suna a gol) se indeparteaza complet tencuiala, pana la zidarie si se refac cu un mortar de aceeasi clasa cu cel initial.</li>
                    <li>Este recomandat ca mortarele sa nu contina o cantitate mare de var.</li>
                    <li>Inainte de aplicarea produsului se remediaza eventualele gauri, fisuri sau alte imperfectiuni cu <a href="https://emex.ro/masa-spaclu" title="Glet pasta pentru reparatii" class="link_color1"><em>Masa de Spaclu pentru Reparatii “Emex LQ”</em></a>.</li>
                </ul>
                <p><span class="alineat_span"></span>In cazul aplicarii pe suprafete care au mai fost vopsite:</p>
                <ul>
                    <li>Peliculele vechi, deteriorate sau cu aderenta diminuata se indeparteaza complet prin folosirea <a href="https://emex.ro/decapant-ecologic-vopsele" title="Solutie pentru indepartare vopsele vechi" class="link_color1"><em>Pastei decapante “Emex PC Eco”</em></a>, sau a oricarui produs similar.</li>
                    <li>Inlaturarea peliculelor vechi se mai poate face prin slefuire cu perii mecanice, sau prin ardere.</li>
                    <li>Oricare dintre operatiunile de inlaturare a vopselei vechi va fi urmata de slefuirea pentru finisare.</li>
                    <li>Zonele atacate de mucegai se curata si se impregneaza cu <a href="https://emex.ro/solutie-anti-mucegai" title="Solutie de curatare a mucegaiului" class="link_color1"><em>Sanitizantul Antimucegai “Emex Forte”</em></a>, atat pentru indepartarea, cat si pentru prevenirea aparitiei agentilor microbieni.</li>
                    <li>Suprafetele ce urmeaza a se acoperi cu <a href="https://emex.ro/tencuieli-decorative" title="Tencuieli decorative structurate pentru fatade" class="link_color1"><em>Tencuieli Decorative “Emex”</em></a>, se curata de orice urma de impuritati sau grasimi.</li>
                    <li>Suprafetele trebuie sa fie netede, plane, uscate.</li>
                    <li>Incluziunile metalice vor fi acoperite in mod obligatoriu cu <a href="https://emex.ro/grund-anticoroziv-emex" title="Grund alchidic protector impotriva ruginii" class="link_color1"><em>Grund Alchidic Anticoroziv “Emex”</em></a>.</li>
                    <li>Pe suprafete noi (inclusiv reparatii) se va aplica in mod obligatoriu una dintre amorsele pe care le gasiti in pagina de <a href="https://emex.ro/grunduri-amorse" title="Amorse pentru zugravirea cu vopsele lavabile" class="link_color1"><em>Grunduri si Amorse pentru Vopsele Lavabile</em></a>.</li>
                </ul>
                <p><span class="alineat_span"></span><span class="subs-attn">Aplicarea se va face cu fierul de glet, urmata de structurare cu gletiera de inox sau plastic</span>.</p>
            </div>
        </div>
    </div>

    <div id="AplicareProdus" class="tab-content">
        <div class="col" id="tab_technical_chars2">
            <h2 class="aplicare_tab_content_title aplicare_c_green">Aplicarea tencuielilor decorative</h2>
            <div class="aplicare_title_separator aplicare_separator_green"></div>
            <div class="descript_par">
                <p><span class="alineat_span"></span>Aplicarea tencuielilor decorative pe suprafata-suport se face numai dupa pregatirea corespunzatoare a acesteia, potrivit indicatiilor din tab-ul anterior sau din fisa tehnica, indiferent daca suprafata de acoperit este noua sau a mai fost vopsita cu produse compatibile.<br>
                    <span class="alineat_span"></span>Aplicarea tencuielilor se va face prin intindere cu fierul de glet si structurare cu drisca de plastic ori inox.<br>
                    <span class="alineat_span"></span>Sistemul optim de aplicare a tencuielilor decorative comporta urmatoarele etape:</p>
                <ul>
                    <li>Se conditioneaza produsul conform instructiunilor de pregatire a produsului.</li>
                    <li>Se pregatesc suprafetele conform instructiunilor de pregatire a suprafetelor.</li>
                    <li>Daca este necesar, se va impregna suportul cu <a href="https://emex.ro/solutie-anti-mucegai" title="Solutie de curatare a mucegaiului" class="link_color1"><em>Sanitizant Antimucegai “Emex Forte”</em></a>, pentru inlaturarea, dar si pentru prevenirea aparitiei de fungi sau mucegaiuri.</li>
                    <li>Se aplica <a href="https://emex.ro/grund-amorsa-quartz" title="Amorsa cu cuartz pentru tencuieli decorative" class="link_color1"><em>Grund de Amorsare cu Cuart “Emex”</em></a>, sau <a href="https://emex.ro/grund-amorsa-tencuiala-siliconica" title="Amorsa siliconica pentru tencuieli cu cuartz" class="link_color1"><em>Grund de Amorsare Siliconic cu Cuart “Emex”</em></a> (in functie de tencuiala aleasa), pentru crearea punctelor de ancora necesare unei cat mai mari aderente a tencuielii la suport.</li>
                    <li>Toate suprafetele, fie noi, fie curatate si reparate, vor fi in mod obligatoriu amorsate cu grundul de amorsare recomandat.</li>
                    <li>Se aplica un strat de fond cu o vopsea lavabila in dispersie apoasa “EMEX” de interior sau de exterior (puteti alege din pagina <a href="https://emex.ro/vopsele-lavabile" title="Vopsele emulsionate lavabile pentru fond" class="link_color1"><em>Vopsele Lavabile</em></a>), in tonul de culoare a tencuielii, la cca. 12 - 24 ore de la aplicarea grundului de amorsare.</li>
                    <li>Dupa efectuarea acestor operatii preliminare se va trece la aplicarea tencuielii decorative conform instructiunilor din Fisa Tehnica, intr-un strat corespunzator dimensiunii particulelor(1,2 - 3 mm). Pentru suprafete mari se recomanda aplicarea tencuielii pe intreaga suprafata fara pauza, pentru evitarea aparitiei nadelor.</li>
                    <li>Produsul poate fi diluat, pentru aplicare, in functie de necesitati, cu un max 3 - 5% apa</li>
                    <li>Pentru a obtine structura striata se va driscui suprafata, cu miscari circulare sau liniare, in functie de tipul tencuielii si de modelul dorit, cu drisca, dupa o uscare doar superficiala a produsului (cca. 10 min.). Exceptie face <a href="https://emex.ro/tencuiala-soclu" title="Tencuiala pentru finisarea decorativa a soclurilor" class="link_color1"><em>Tencuiala Marmorata de Soclu “EMEX”</em></a>, unde aplicarea se va face numai utilizand fierul de glet inoxidabil la o grosime de strat corespunzator dimensiunii particulelor.</li>
                    <li>In cazul aplicarii de <a href="https://emex.ro/vopsea-texturata-emex" title="Vopsea structurata decorativa tip calcio-vecchio" class="link_color1"><em>Vopsea Texturata “Emex”</em></a> structurarea se va face cu trafaleti cu modele, de asemeni dupa o usoara uscare a materialului aplicat.</li>
                    <li>Temperatura optima de aplicare a produsului este cuprinsa intre 5 si 30°C, iar umiditatea relativa de max. 65%.</li>
                </ul>
                <p><span class="alineat_span"></span>Este total contraindicata folosirea de adezivi tip “Aracet” pentru pregatirea amorselor, sau pentru adaugare in tencuieli, indiferent de tipul acestora.</p>
                <p><span class="alineat_span"></span><a href="https://emex.ro/tencuieli-decorative" title="Tencuieli decorative structurate pentru fatade" class="link_color1"><em>Tencuielile Decorative “Emex”</em></a>, cu toate subtipurile acestora, sunt fabricate pentru a asigura o cat mai mare aderenta si o acoperire cat mai buna, fara a se interveni cu adaosuri de orice fel.</p>
            </div>
        </div>
    </div>

@endsection

@section('images')
    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Tencuiala-structurata-pentru-fatade.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">

    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Aplicare-tencuiala-decorativa-structurata.jpg') }}" alt="Aplicare tencuiala decorativa structurata" class="aplicare_image_sidebar justify-self-center">

    <img width="201" height="185" src="{{ asset('resources/images/aplicare/Tencuiala-structurata-aplicari.jpg') }}" alt="Aspect zugraveli decorative lavabile" class="aplicare_image_sidebar justify-self-center">
@endsection