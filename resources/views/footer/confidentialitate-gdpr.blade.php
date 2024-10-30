@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="/{{ minify('css/tabs.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Politica de Confidentialitate </li></ul>
@endsection


@section('content')

<div class="hidden-xs">
    <div class="header_img_bg" id="confidentialitate_header" style="background-image: url('{{ asset('resources/images/Confidentialitate-prelucrare-date.jpg') }}');">
      <div class="hibc">
        <div class="hibcsc">
          <h1> POLITICA DE CONFIDENTIALITATE <br>
            si prelucrarea datelor personale </h1>
        </div>
      </div>
    </div>
  </div>

<div class="main-container product-page mt-32" id="product_container">
    <div class="mt-16 mt-custom">
        <div class="tabs-selector-row">
            <button type="button" name="current_tab" value="0" role="tab" class="btn user-valid valid selected" option="0" aria-selected="true" tabindex="0" onclick="openTab(event, 'Pagina1')"><span>Pagina 1</span></button>
            <button type="button" name="current_tab" value="1" role="tab" class="btn user-valid valid" option="1" aria-selected="false" tabindex="0" onclick="openTab(event, 'Pagina2')"><span>Pagina 2</span></button>
            <button type="button" name="current_tab" value="2" role="tab" class="btn user-valid valid" option="2" aria-selected="false" tabindex="0" onclick="openTab(event, 'Pagina3')"><span>Pagina 3</span></button>
            <button type="button" name="current_tab" value="3" role="tab" class="btn user-valid valid" option="3" aria-selected="false" tabindex="0" onclick="openTab(event, 'Pagina4')"><span>Pagina 4</span></button>
        </div>

        <div class="tab-content-container">
            <div id="Pagina1" class="tab-content active">
                <div class="tab-pane">
                    <p><span class="alineat_span"></span>Acest document este valabil incepand cu data de <strong>25 Mai 2018</strong>. Incepand cu aceasta data sunt aplicabile prevederile Regulamentului (UE) nr. 679/2016, al Parlamentului European si al Consiliului Uniunii Europene, privind protectia persoanelor fizice in ceea ce priveste prelucrarea datelor cu caracter personal si privind libera circulatie a acestor date si de abrogare a Directivei 95/46/CE (Regulamentul general privind protectia datelor).</p>
                    <p><span class="alineat_span"></span>In functie de modificarile aparute in legislatie, periodic se vor face actualizari, ce vor fi comunicate automat abonatilor.</p>
                    <p><span class="alineat_span"></span>Romtehnochim respecta, asigura transparenta si este preocupata de confidentialitatea datelor dumneavoastra. Colectam strict informatiile necesare pentru a va furniza produsele sau serviciile comandate, si le pastram adoptand in permanenta masuri tehnice si organizatorice pentru confidentialitatea si protectia datelor dumneavoastra cu caracter personal.</p>
                    <h2 class="h2-style">INFORMATII GENERALE</h2>
                    <p><span class="alineat_span"></span>Politica de Confidentialitate explica practicile noastre de confidentialitate pentru emex.ro, (denumit in continuare “Site”), al carui proprietar este Romtehnochim s.r.l.. Aceasta se aplica tuturor serviciilor furnizate de <strong>Romtehnochim s.r.l.</strong> De asemeni, aceasta Politica explica de ce si cum colectam, dar si cum folosim informatiile personale ale clientilor nostri.</p>
                    <p><span class="alineat_span"></span>Romtehnochim s.r.l. este inregistrata la Registrul Comertului sub numarul J40/21214/1993, Cod Fiscal RO4643777, cu sediul social in Bucuresti, Str. Neajlovului nr. 82, si cu sediul operativ in Jilava, Ilfov, Str. Steaua Sudului, nr. 22.</p>
                    <p><span class="alineat_span">In continuare veti gasi informatii despre urmatoarele:</span></p>
                    <ul>
                      <li>1. Colectarea informatiilor</li>
                      <li>2. Cum folosim informatiile</li>
                      <li>3. Scopul procesarii datelor</li>
                      <li>4. Destinatarii datelor personale</li>
                      <li>5. Masurile de securitate</li>
                      <li>6. Perioada de retentie</li>
                      <li>7. Drepturile dumneavoastra</li>
                      <li>8. Limita de varsta</li>
                      <li>9. Modificari ale Politicii de Confidentialitate</li>
                      <li>10. Intrebari si contacte</li>
                    </ul>
                    <h2 class="h2-style">1. COLECTAREA INFORMATIILOR</h2>
                    <p><span class="alineat_span"></span>Accesarea/ vizitarea site-ului emex.ro se supune <a href="{{ url('/termeni-si-conditii') }}"><em class="link_color1">Termeniilor si Conditiilor de Utilizare</em></a> si Politicii de Confidentialitate prezentate aici, implica acceptul dumneavoastra explicit cu privire la acestea si reprezinta intreaga intelegere dintre parti.</p>
                    <p><span class="alineat_span">Atunci cand navigati pe Site, si/ sau accesati pagini sau formulare de contact, este posibil sa colectam urmatoarele:</span></p>
                    <p><span class="alineat_span"></span><strong>Informatii transmise de dumneavoastra:</strong></p>
                    <p><span class="alineat_span"></span><strong>Date de contact</strong> - receptionam orice informatie transmisa pentru finalizarea unei comenzi. Formularele de comanda colecteaza informatiii despre dumneavoastra ce pot include: nume si prenume, CIF pentru societati, adresa postala (domiciliul / resedinta / adresa de corespondenta), numar de telefon, adresa de email, date localizare (IP - doar in scopuri de securitate).</p>
                    <p><span class="alineat_span"></span><strong>Informatii pe care le primim prin folosirea serviciilor noastre:</strong></p>
                    <p><span class="alineat_span"></span><strong>Unelte de masurare a traficului</strong> - Folosim servicii de masurare a traficului puse la dispozitie de terte parti (Google Analytics) pentru a colecta informatii despre utilizarea Site-ului, cum ar fi vizitele, paginile vizitate. De asemeni se are in vedere si popularitatea continutului publicat. Uneltele de masurare a traficului folosesc masuri specifice de tracking (de exemplu: cookies) pentru a recunoaste dispozitivul si a analiza informatiile despre dumneavoastra. Pot fi colectate si urmatoarele informatii: ce pagini ati vizitat dar si cat timp ati petrecut pe aceste pagini, adresa dumneavoastra de IP, ce sistem de operare, sau ce browser ati utilizat.</p>
                    <p><span class="alineat_span"></span><strong>Loguri informatii</strong> - Atunci cand vizitati Site-ul, accesati continutul furnizat de noi, ne adresati intrebari, solicitati asistenta tehnica in legatura cu serviciile furnizate, completati formulare de contact, sau ne trimiteti email, sunt inregistrate o serie de informatii in fisierele de tip log. Aceste informatii, includ adresa de IP, adresa web, adresa web de iesire, browser-ul folosit, sistemul de operare, data si ora, tipul de solicitare transmisa, dar si eventualele erori receptionate de la Site sau servicii.</p>
                    <p><span class="alineat_span"></span><strong>Alte informatii</strong> - De asemeni, receptionam orice informatie pe care dumneavoastra o transmiteti pe Site-ul nostru, prin email sau orice alta forma de mesagerie electronica, in legatura cu furnizarea serviciilor contractate. De fiecare data cand ne contactati, se va inregistra mail-ul, sau mesageria electronica, pentru a ne asigura ca avem informatii exacte, astfel incat sa putem oferi serviciile contractate, dar si ca suport pentru actiunile realizate de echipa noastra in cazul unei reclamatii la adresa raspunsului primit de la noi.</p>
                    <p><span class="alineat_span"></span></p>
                    <br>
                    <p class="text-center">
                      <img width="216" height="20" src="{{ asset('resources/images/general/End-of-page.png') }}" alt="Emex by Romtehnochim - Incheiere pagina">
                    </p>
                  </div>
                  
            </div>
            
            <div id="Pagina2" class="tab-content">
                <div class="tab-pane">
                    <h2 class="h2-style">2. CUM FOLOSIM INFORMATIILE</h2>
                    <p><span class="alineat_span"></span><strong>Informatii transmise de dumneavoastra:</strong></p>
                    <p><span class="alineat_span"></span>Daca este necesar, inregistram si utilizam informatiile pe care le furnizati pentru urmatoarele motive:</p>
                    <p><span class="alineat_span"></span><strong>Informatiile de contact</strong> - pentru a va contacta in legatura cu comenzile dumneavoastra, starea serviciilor sau schimbari pentru serviciile noastre. De asemeni, in cazul in care v-ati exprimat acceptul expres pentru a receptiona asemenea informatii, va trimitem informari despre noile noastre servicii/ oferte speciale sau notificari periodice, daca sau atunci cand acestea exista. Noi folosim email-ul, telefonul sau mesaje de tip text (SMS) pentru a solicita detalii de amanunt privind o comanda, sau pentru a va informa in legatura cu termenele de livrare sau potentiale intarzieri, in scopul asigurarii unei comunicari clare si a unor servicii cat mai eficiente.</p>
                    <p><span class="alineat_span"></span><strong>Plati si informatii</strong> - aceste informatii sunt necesare impreuna cu informatiile de contract pentru a finaliza o comanda, pentru a emite o factura proforma sau fiscala si pentru a ne indeplini obligatiile legale si fiscale.</p>
                    <p><span class="alineat_span"></span><strong>Informatii privind folosirea serviciilor noastre:</strong></p>
                    <p><span class="alineat_span"></span>Daca este necesar, inregistram si utilizam informatiile primite, ca urmare a folosirii site-ului nostru, pentru urmatoarele motive:</p>
                    <p><span class="alineat_span"></span><strong>Informatii automate</strong> - pentru a identifica eventuale problemele cu serverul nostru, pentru a administra Site-ul si serviciile noastre. Aceste informatii nu pot identifica o persoana decat pentru a preveni o frauda sau abuz catre Site-ul nostru sau la adresa serverelor noastre.</p>
                    <p><span class="alineat_span"></span>Vom prelucra, de asemeni, datele cu caracter personal in scopuri de protectie anti-frauda si detectare a fraudelor, pentru protejarea serverelor noastre si detectarea utilizarii incorecte, dar si a avariilor la servere.</p>
                    <p><span class="alineat_span"></span>Vom dezvalui informatii daca acest lucru este justificat in scopul de a ne proteja impotriva fraudelor, a ne apara drepturile sau proprietatea, sau a proteja interesele clientilor nostri.</p>
                    <p><span class="alineat_span"></span>De asemeni, este posibil sa fie necesar sa dezvaluim informatiile dvs. pentru a ne conforma obligatiei de a raspunde la cererile legale ale autoritatilor. Datele dvs. cu caracter personal vor fi comunicate doar atunci cand consideram, cu buna credinta, ca avem obligatia de a face acest lucru in conformitate cu legea si in baza unei evaluari exhaustive a tuturor cerintelor legale.</p>
                    <p><span class="alineat_span"></span><strong>Unelte statistice</strong> - pentru a imbunatiati serviciile si Site-ul nostru.</p>
                    <p><span class="alineat_span"></span><strong>Informatiile din log-uri</strong> - pentru a identifica eventualele probleme de functionalitate si administra optim Site-ul.</p>
                    <p><span class="alineat_span"></span><strong>Alte informatii</strong> - pentru asigurarea informarii corecte si relevante in cazul unei dispute/ reclamatii dar si pentru a identifica elemente concrete care ne pot ajuta sa imbunatatim serviciile furnizate.</p>
                    <h2 class="h2-style">3. SCOPUL PROCESARII DATELOR</h2>
                    <p><span class="alineat_span"></span>Atunci cand accesati ori folositi Site-ul nostru, trebuie sa colectam si sa utilizam informatiile dumneavoastra conform acestei Politici. Respectam confidentialitatea si respectam principii fundamentale cand procesam datele personale:</p>
                    <ul>
                      <li>Vom inregistra minimul de informatii personale, care sunt necesare pentru a putea livra serviciile sau produsele contractate;</li>
                      <li>Oferim transparenta completa despre cum vom folosi informatiile dumneavoastra pentru a ne respecta obligatiile legale, cu respect pentru confidentialitatea dumneavoastra;</li>
                      <li>Ne asiguram ca folosim informatiile doar pentru scopul pentru care ne-ati oferit acceptul, si anume facturare, redactare contract atunci cand este cazul, sau comunicare directa in legatura cu comenzile catre noi, sau in scop informativ.</li>
                    </ul>
                    <p><span class="alineat_span"></span>Datele personale sunt prelucrate, conform acestei Politici, astfel:</p>
                    <p><span class="alineat_span"></span><strong>Contract</strong> - pe baza comenzii dumneavoastra de furnizare a serviciilor sau produselor din oferta comerciala a Romtehnochim.</p>
                    <p><span class="alineat_span"></span><strong>Obligatii legale</strong> - raportarea catre Agentia Nationala de Administrare Fiscala si alte institutii de stat (la solicitarea expresa a acestora) pentru indeplinirea activitatilor aferente controalelor autoritatilor, cum ar fi ANAF, ANPC, ANSPDCP, IPJ, Parchete etc.</p>
                    <p><span class="alineat_span"></span><strong>Interesul legitim</strong> - necesar pentru scopuri legitime interesului nostru, cum ar fi:</p>
                    <ul>
                      <li>sa oferim clientilor nostri produsele sau serviciile comandate;</li>
                      <li>sa indentificam si sa prevenim activitatile ilegale, frauda;</li>
                      <li>sa imbunatatim securitatea si calitatea site-ului;</li>
                      <li>sa intelegem mai bine cum vizitatorii interactionaleaza cu site-ul nostru;</li>
                      <li>sa identificam eficienta campaniilor promotionale si de marketing, atunci cand, sau daca acestea exista.</li>
                    </ul>
                    <p><span class="alineat_span"></span><strong>Consimtamant</strong>- ne bazam pe acceptul dumneavoastra de a folosi datele personale pentru a va fi livrate produsele sau serviciile comandate. Nu trimitem email-uri de marketing, deci datele dvs, nu vor fi folosite in acest scop.</p>
                    <p><span class="alineat_span"></span>Pentru persoanele fizice sau juridice, care au un cont inregistrat pe site si au optat pentru informari de tip newsletter, in cazul in care vom considera utile diverse campanii de informare, va vom contacta prin email.</p>
                    <br>
                    <p class="text-center">
                        <img width="216" height="20" src="{{ asset('resources/images/general/End-of-page.png') }}" alt="Emex by Romtehnochim - Incheiere pagina">
                    </p>
                  </div> 
            </div>
        
            <div id="Pagina3" class="tab-content">
                <div class="tab-pane">
                    <h2 class="h2-style">4. DESTINATARII DATELOR PERSONALE</h2>
                    <p><span class="alineat_span"></span>Datele dumneavoastra personale pot fi transmise catre urmatoarele categorii de destinatari:</p>
                    <p><span class="alineat_span"></span><strong>Persoana vizata</strong> sau reprezentatii sai;</p>
                    <p><span class="alineat_span"></span><strong>Autoritati publice</strong> din Romania (ex: ANAF, Oficiul National de Prevenire si Combatere a Spalarii Banilor, Parchete, IGP, etc.) si din strainatate (ex: Comisia Europeana, autoritati fiscale, instante etc).</p>
                    <p><span class="alineat_span"></span>Datele personale transmise vor fi cele declarate de persoana vizata si neexcesive prin raportare la scopul pentru care se impune trimiterea catre un anumit tert.</p>
                    <h2 class="h2-style">5. MASURI DE SECURITATE</h2>
                    <p><span class="alineat_span"></span>Avem implementate masuri fizice, electronice/ software si proceduri in legatura cu colectarea, stocarea, si dezvaluirea informatiilor care pot duce la identificarea unui persoane. Procedurile noastre impun in unele cazuri sa va solicitam dovezi ale identitatii dumneavoastra inainte de a va pune la dispozitie informatiile sau a da curs unei solicitari, care vizeaza informatii confidentiale.</p>
                    <p><span class="alineat_span"></span>Desi suntem dedicati securitatii datelor, si luam masurile necesare pentru a asigura un nivel de securitate ridicat trebuie sa stiti ca nici o transmisie de date pe internet nu poate fi garantata ca fiind sigura. Prin urmare, trebuie sa luati act ca nu ne putem asuma garantarea securitatii complete a datelor personale pe care le transferati prin Internet catre noi.</p>
                    <h2 class="h2-style">6. PERIOADA DE RETENTIE</h2>
                    <p><span class="alineat_span"></span>Pastrarea si prelucrarea datelor personale se realizeaza pe durata de valabilitate a contractelor incheiate cu Romtehnochim ori de valabilitate a documentelor, la care se adauga 3 ani de la incetarea relatiei contractuale, daca printr-o prevedere legala aplicabila nu este necesara pastrarea pe o perioada mai mare.</p>
                    <h2 class="h2-style">7. DREPTURILE DUMNEAVOASTRA</h2>
                    <p><span class="alineat_span"></span>In calitate de persoana vizata, cu privire la datele personale proprii, aveti urmatoarele drepturi:</p>
                    <ul>
                      <li>dreptul de acces la date (art. 15 din Regulament);</li>
                      <li>dreptul de rectificare a datelor (art. 16 din Regulament), in urma identificarii persoanei solicitante;</li>
                      <li>dreptul de stergere a datelor, cerere care va fi analizata sub aspectul indeplinirii conditiilor exprese ale art. 17 din Regulament si ale scopului colectarii;</li>
                      <li>dreptul la restrictionare a datelor, cerere care va fi analizata sub aspectul indeplinirii conditiilor exprese ale art. 18 din Regulament;</li>
                      <li>dreptul la portabilitatea datelor (art. 20 din Regulament);</li>
                      <li>dreptul la opozitie (art. 21 din Regulament);</li>
                      <li>dreptul de a nu fi supus unei decizii bazate exclusiv pe prelucrare automata, inclusiv profilare (conform art. 22 din Regulament);</li>
                      <li>dreptul de a adresa Autoritatii Nationale pentru Supravegherea Prelucrarii Datelor cu Caracter Personal si Justitiei.</li>
                    </ul>
                    <p><span class="alineat_span"></span>In masura in care aveti nevoie de asistenta suplimentara pentru exercitarea drepturilor de mai sus, puteti sa ne contactati folosind adresele de email afisate in pagina de contact a site-lui emex.ro.</p>
                    <br>
                    <p class="text-center">
                        <img width="216" height="20" src="{{ asset('resources/images/general/End-of-page.png') }}" alt="Emex by Romtehnochim - Incheiere pagina">
                    </p>
                  </div>
            </div>
        
            <div id="Pagina4" class="tab-content">
                <div class="tab-pane">
                    <h2 class="h2-style">8. LIMITA DE VARSTA</h2>
                    <p><span class="alineat_span"></span>Nu oferim servicii si nu colectam informatii pentru persoane cu varsta sub 18 ani. In masura in care aveti dovezi ca o persoana minora (sub 18 ani) ne-a oferit informatiile sale personale, va rugam sa ne contactati folosind informatiile prezentate in aceasta Politica, prin email.</p>
                    <br>
                    <h2 class="h2-style">9. MODIFICARI ALE POLITICII DE CONFIDENTIALITATE</h2>
                    <p><span class="alineat_span"></span>Ne rezervam dreptul de a modifica Politica de Confidentialitate in orice moment. Daca vom decide ca modificam aceasta Politica, vom aduaga acele actualizari aici sau in orice alt loc in care consideram ca e potrivit, astfel incat sa fiti informat asupra informatiilor pe care le colectam.</p>
                    <p><span class="alineat_span"></span>Daca realizam modificari esentiale ale acestor Politici de Confidentialitate, va vom anunta in cadrul prezentei sectiuni, prin email sau prin intermediul Site-ului.</p>
                    <br>
                    <h2 class="h2-style">10. INTREBARI SI CONTACTE</h2>
                    <p><span class="alineat_span"></span>Daca aveti orice intrebari legate de aceasta Politica de Confidentialitate, sau daca doriti sa va exercitati oricare din drepturile dumneavoastra in legatura cu informatiile personale, va rugam sa contactati compania, in scris, printr-o adresa datata si semnata, insotita de copia cartii de indentitate, transmisa catre Romtehnochim la adresa Str. Steaua Sudului Nr 22, Jilava, Ilfov, Cod Postal 77120, sau prin email la adresa <a href="mailto:office@emex.ro"><em class="link_color1">office@emex.ro</em></a>.</p>
                    <p><span class="alineat_span"></span>In cazul in care veti adresa o solicitare privind exercitarea drepturilor dumneavoastra privind protectia datelor, vom raspunde solicitarii in intervalul stabilit de legislatia in vigoare.</p>
                    <p><span class="alineat_span"></span>Acordul dumneavoastra pentru operatiunile de prelucrare este exprimat odata cu depunerea unei comenzi online in conformitate cu prevederile <a href="https://eur-lex.europa.eu/legal-content/RO/TXT/PDF/?uri=CELEX:32016R0679&from=EL" title="Reglementari utilizare date personale"><em class="link_color1">Regulamentului (UE) 679/2016</em></a> pentru protectia persoanelor, cu privire la prelucrarea datelor cu caracter personal si libera circulatie a acestor date.</p>
                    <p>S.C. Romtehnochim s.r.l.</p>
                    <br>
                    <p class="text-center">
                        <img width="216" height="20" src="{{ asset('resources/images/general/End-of-page.png') }}" alt="Emex by Romtehnochim - Incheiere pagina">
                    </p>
                  </div>
            </div>
        </div>

    </div>
</div>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.openTab = function(evt, tabName) {
            var i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }

            tablinks = document.getElementsByClassName("btn");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("selected");
                tablinks[i].setAttribute("aria-selected", "false");
            }

            document.getElementById(tabName).classList.add("active");
            evt.currentTarget.classList.add("selected");
            evt.currentTarget.setAttribute("aria-selected", "true");
        };
    });
    </script>