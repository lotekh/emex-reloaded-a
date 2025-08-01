@extends('layout.layout')
@section('seo')
<title>Licenta Continut - Emex.ro</title><meta name="description" content="Politica de licentiere a Romtehnochim pentru continutul emex.ro"><style>
    .big-div-licentiere{
        /*line-height: 1.6;*/
        color: #333;
        max-width: 1200px;
        border-radius: 15px;
        margin: 0px auto 20px auto;
        padding: 20px;
        text-align: justify;
		margin-top: 0px;
        box-shadow: inset 0 0 0 8px #e6effb;
    }
    .big-div-licentiere ul{
        display: block;
        list-style-type: disc !important;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0;
        margin-inline-end: 0;
        padding-inline-start: 40px !important;
    }
    .header-licentiere {
        border-bottom: 1px solid #ddd;
        padding-bottom: 20px;
        /*margin-bottom: 30px;*/
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        /* width: 1200px; */
    }
    main {
        background-color: #fff;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    h1 {
        color: #009 !important;
        text-align: center;
		margin-bottom: -10px;
    }
    h2 {
        color: #009;
    }
    h3 {
        color: #009;
    }
    h4 {
        color: #009;
		font-size: 1.17em !important;		
    }
    p, ul, ol {
        margin-bottom: 20px;
    }
    ul, ol {
        padding-left: 25px;
    }
    ul li, ol li {
        margin-bottom: 8px;
    }
    .highlight {
        background-color: #f0f7ff;
        padding: 5px 0px 5px 5px;
        border-left: 4px solid #009;
        margin: 20px 0;
        border-radius: 0 8px 8px 0;
    }
    .warning {
        background-color: #fff8f0;
        padding: 5px 0px 5px 10px;
        border-left: 4px solid #e67e22;
        margin: 25px 0;
        border-radius: 0 8px 8px 0;
    }
    .info {
        background-color: #f0feff;
        padding: 10px 0px 10px 20px;
        border-left: 4px solid #3498db;
        margin: 25px 0;
        border-radius: 0 8px 8px 0;
    }
    .footer {
        margin-top: 50px;
        padding: 25px;
        border-top: 1px solid #eee;
        font-size: 0.9em;
        color: #666;
        text-align: center;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .contact {
        margin-top: 20px;
        background-color: #f8f9fa;
        padding: 5px 25px 25px 25px;
        border-radius: 8px;
        border: 1px solid #eee;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 12px 15px;
        text-align: left;
    }
    th {
        background-color: #f0f7ff;
        color: #009;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .accordion {
        background-color: #f8f9fa;
        color: #333;
        cursor: pointer;
        padding: 8px;
        width: 100%;
        text-align: left;
        border: none;
        outline: none;
        transition: 0.4s;
        /*margin-bottom: 5px;*/
        border-radius: 5px;
        font-weight: bold;
    }
    .active, .accordion:hover {
        background-color: #e9ecef;
    }
	.accordion:hover {
color: #009;
}
    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        margin-bottom: 10px;
        border-radius: 0 0 5px 5px;
    }
    .accordion:after {
        content: '\02795';
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }
    .active:after {
        content: "\2796";
    }
    a {
        color: #009 !important;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    .button {
        display: inline-block;
        background-color: #009;
        color: white !important;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        margin-top: 10px;
    }
    .button:hover {
        background-color: #0d2b4b;
        text-decoration: none;
    }
    .toc {
        background-color: #f8f9fa;
        padding: 5px 8px 5px 0px;
        border-radius: 8px;
        margin-bottom: 10px;
    }
    .toc ul {
        list-style-type: none !important;
        padding-left: 15px;
    }
    .toc ul li {
        margin-bottom: 8px;
    }
	.sp-up {
	margin-top: 8px;
	}

.example {
        background-color: #f9f9f9;
        /*padding: 15px;
        border-radius: 5px;
        margin: 15px 0;*/
        font-family: Consolas, Monaco, 'Andale Mono', monospace;
        font-size: 0.9em;
    } 
</style>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/bundled/servicii.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Politica de Licentiere</li></ul>
@endsection
@section('content')
<div class="servicii relative w-full col justify-center align-center header" style="background-image: url('{{ asset('resources/images/Licentiere-drm.webp') }}');" id="servicii_header"><h1 style="color: #ffffff !important;" class="z-10"> POLITICA DE LICENTIERE </h1></div><div class="big-div-licentiere"><h1>Licenta Continut - Emex.ro</h1><div class="header-licentiere"><p>Termeni si conditii pentru utilizarea continutului si materialelor de pe platforma Emex.ro</p></div><div class="highlight"><strong>Data-Usage-Permission:</strong> Necesita acord scris prealabil </div><div class="toc"><h3>Cuprins</h3><ul><li><a href="#introduction">1. Introducere</a></li><li><a href="#definitions">2. Definitii</a></li><li><a href="#ownership">3. Drepturi de autor si proprietate intelectuala</a></li><li><a href="#usage">4. Conditii generale de utilizare a continutului</a></li><li><a href="#permission">5. Solicitarea permisiunii de utilizare</a></li><li><a href="#allowed">6. Utilizari permise fara acord prealabil</a></li><li><a href="#forbidden">7. Utilizari strict interzise</a></li><li><a href="#licensing">8. Tipuri de licente disponibile</a></li><li><a href="#fees">9. Taxe si redevente</a></li><li><a href="#attribution">10. Politica de atribuire</a></li><li><a href="#violations">11. Incalcari si consecinte</a></li><li><a href="#thirdparty">12. Continut apartinand tertilor</a></li><li><a href="#disclaimer">13. Limitarea raspunderii</a></li><li><a href="#modifications">14. Modificari ale politicii de licentiere</a></li><li><a href="#applicable">15. Legea aplicabila si jurisdictia</a></li><li><a href="#faq">16. Intrebari frecvente</a></li><li><a href="#contact">17. Contact</a></li></ul></div><section id="introduction"><h2>1. Introducere</h2><p><span class="alineat_span"></span>Prezentul document stabileste termenii si conditiile de utilizare a informatiilor, materialelor si continutului disponibil pe platforma Emex.ro. Acesti termeni se aplica tuturor vizitatorilor, utilizatorilor si celor care acceseaza sau folosesc continutul nostru in orice scop.<br><span class="alineat_span"></span>Emex.ro contine o gama larga de materiale originale, inclusiv dar fara a se limita la: texte, articole, studii, analize, imagini, grafice, ilustratii, fotografii, videoclipuri, animatii, baze de date, software, aplicatii, design si alte elemente creative care sunt protejate prin legi nationale si internationale referitoare la proprietatea intelectuala.</p><div class="info"><p><span class="alineat_span"></span>Prin accesarea si utilizarea platformei Emex.ro, sunteti de acord sa respectati termenii si conditiile prezentate in aceasta politica de licentiere. Daca nu sunteti de acord cu acesti termeni, va rugam sa nu folositi sau sa distribuiti continutul nostru.</p></div></section><section id="definitions"><h2>2. Definitii</h2><p>In contextul prezentei politici de licentiere, urmatorii termeni vor avea semnificatiile de mai jos:</p><ul><li><strong>Emex.ro</strong> - platforma online accesibila la adresa www.emex.ro, inclusiv toate subdomeniile si serviciile conexe;</li><li><strong>Continut</strong> - orice material disponibil pe platforma, incluzand dar fara a se limita la: texte, articole, imagini, grafice, fotografii, videoclipuri, baze de date, aplicatii, design si alte creatii;</li><li><strong>Utilizator</strong> - orice persoana fizica sau juridica care acceseaza sau foloseste platforma sau continutul acesteia;</li><li><strong>Licenta</strong> - permisiunea scrisa acordata de Emex.ro pentru utilizarea continutului sau, in conditiile specificate;</li><li><strong>Acord scris prealabil</strong> - document oficial emis de Emex.ro care permite utilizarea specifica a continutului, in conditiile agreate;</li><li><strong>Utilizare comerciala</strong> - folosirea continutului in orice mod care genereaza direct sau indirect beneficii economice sau avantaje comerciale;</li><li><strong>Utilizare necomerciala</strong> - folosirea continutului fara scop lucrativ, in contexte educationale, informative sau personale;</li><li><strong>Atribuire</strong> - recunoasterea expresa a Emex.ro ca sursa originala a continutului utilizat;</li><li><strong>Opera derivata</strong> - o lucrare bazata pe sau care incorporeaza continut de pe Emex.ro, dar care aduce modificari substantiale sau elemente creative noi.</li></ul></section><section id="ownership"><h2>3. Drepturi de autor si proprietate intelectuala</h2><p><span class="alineat_span"></span>Tot continutul disponibil pe Emex.ro este protejat de legislatia nationala si internationala privind drepturile de autor si alte drepturi de proprietate intelectuala. Aceste drepturi includ, dar nu se limiteaza la:</p><ul><li>Drepturi de autor pentru toate textele, articolele, si alte opere scrise;</li><li>Drepturi asupra bazelor de date si compilatiilor de informatii;</li><li>Drepturi asupra marcilor comerciale, logourilor si denumirilor comerciale;</li><li>Drepturi asupra designului si aspectului vizual al platformei;</li><li>Drepturi asupra fotografiilor, ilustratiilor, graficelor si altor opere vizuale;</li><li>Drepturi asupra materialelor video si audio;</li><li>Drepturi asupra codului sursa, aplicatiilor si altor elemente software.</li></ul><p><span class="alineat_span"></span>Emex.ro este detinatorul exclusiv al drepturilor de autor si al altor drepturi de proprietate intelectuala asupra continutului creat de echipa sa. In cazul continutului furnizat de terti sau de parteneri, Emex.ro detine licentele necesare pentru utilizarea acestuia pe platforma sa.</p><div class="warning"><p><span class="alineat_span"></span>Utilizarea neautorizata a continutului Emex.ro reprezinta o incalcare a drepturilor de autor si poate atrage consecinte juridice severe, inclusiv dar fara a se limita la actiuni in instanta pentru recuperarea prejudiciilor.</p></div><h3>3.1 Durata protectiei drepturilor de autor</h3><p><span class="alineat_span"></span>Drepturile de autor pentru materialele originale de pe Emex.ro sunt protejate conform legislatiei in vigoare, pentru intreaga durata prevazuta de lege. In Romania, aceasta protectie se extinde pe toata durata vietii autorului plus 70 de ani dupa decesul acestuia pentru persoane fizice, respectiv 70 de ani de la data primei publicari pentru opere colective sau anonime.</p><h3>3.2 Informatii de identificare a drepturilor de proprietate</h3><p><span class="alineat_span"></span>Toate paginile si materialele de pe Emex.ro contin informatii de identificare a drepturilor de proprietate, inclusiv mentiuni privind drepturile de autor, logo-uri, marci inregistrate sau alte elemente care identifica Emex.ro ca detinator sau utilizator autorizat.<br><span class="alineat_span"></span>Este strict interzisa indepartarea sau modificarea acestor informatii de identificare.</p></section><section id="usage"><h2>4. Conditii generale de utilizare a continutului</h2><p><span class="alineat_span"></span>Utilizarea oricarui continut de pe Emex.ro, indiferent de scop (comercial sau necomercial), inclusiv reproducerea, distribuirea, modificarea, publicarea, afisarea, incorporarea in alte opere sau transmiterea prin orice mijloace, <strong><em>necesita obtinerea prealabila a unui acord scris</em></strong> din partea Emex.ro.<br><span class="alineat_span"></span>Acest principiu fundamental reflecta valoarea si originalitatea continutului nostru, precum si investitiile semnificative pe care le facem pentru crearea, mentinerea si imbunatatirea platformei si a materialelor disponibile.</p><h3>4.1 Principii generale</h3><p>Toate solicitarile pentru utilizarea continutului nostru vor fi evaluate pe baza urmatoarelor principii:</p><ul><li>Respectarea integritatii continutului original;</li><li>Atribuirea corespunzatoare a sursei;</li><li>Utilizarea in contexte adecvate si relevante;</li><li>Protejarea valorii si reputatiei brandului Emex.ro;</li><li>Respectarea drepturilor tertilor care pot fi implicate.</li></ul><h3>4.2 Acorduri personalizate</h3><p><span class="alineat_span"></span>Recunoastem diversitatea nevoilor utilizatorilor nostri si suntem deschisi sa negociem acorduri personalizate pentru utilizarea continutului nostru in functie de specificul fiecarei solicitari. Aceste acorduri pot varia in functie de:</p><ul><li>Tipul continutului solicitat;</li><li>Scopul si contextul utilizarii;</li><li>Durata pentru care se solicita dreptul de utilizare;</li><li>Audienta tinta si impactul potential;</li><li>Beneficiile reciproce pentru ambele parti.</li></ul></section><section id="permission"><h2>5. Solicitarea permisiunii de utilizare</h2><p><span class="alineat_span"></span>Pentru a obtine permisiunea de a utiliza continutul nostru, va rugam sa urmati procedura de mai jos:</p><h3>5.1 Formular de solicitare</h3><p>Transmiteti o solicitare scrisa care sa includa urmatoarele informatii:</p><ul><li><strong>Date de identificare:</strong> Numele complet al persoanei fizice sau juridice, adresa postala, adresa de e-mail, numarul de telefon, website (daca este cazul)</li><li><strong>Detalii despre continut:</strong> Descrierea exacta si completa a continutului pe care doriti sa il utilizati, inclusiv titlul, URL-ul paginii, data publicarii si orice alte informatii relevante pentru identificarea continutului</li><li><strong>Scopul utilizarii:</strong> Descrierea detaliata a modului in care intentionati sa folositi continutul (de exemplu, in publicatii tiparite, pe website-uri, in materiale educationale, in prezentari, etc.)</li><li><strong>Contextul utilizarii:</strong> Informatii despre proiectul, publicatia sau platforma unde va fi utilizat continutul</li><li><strong>Audienta tinta:</strong> Detalii despre publicul caruia i se adreseaza materialul in care va fi inclus continutul nostru</li><li><strong>Perioada de utilizare:</strong> Intervalul de timp pentru care solicitati dreptul de a utiliza continutul (data de inceput si de sfarsit)</li><li><strong>Modalitatea de atribuire:</strong> Propunerea dvs. privind modul in care veti mentiona Emex.ro ca sursa a continutului</li><li><strong>Alte informatii relevante:</strong> Orice alte detalii care ar putea fi utile in evaluarea solicitarii dvs.</li></ul><div class="highlight"><p class="sp-up">Solicitarile pentru permisiunea de utilizare a continutului pot fi trimise prin:</p><ul><li><strong>E-mail:</strong><a href="mailto:admin@emex.ro"><em>admin@emex.ro</em></a></li><li><strong>Formular web:</strong> Disponibil in sectiunea "Contact" a site-ului nostru</li><li><strong>Posta:</strong> La adresa sediului nostru social mentionata in sectiunea de contact</li></ul></div><h3>5.2 Procesul de evaluare</h3><p>Dupa primirea solicitarii dvs., procesul de evaluare va urma urmatorii pasi:</p><ol><li><strong>Confirmarea primirii:</strong> Veti primi o confirmare automata a primirii solicitarii dvs. in termen de 24 de ore</li><li><strong>Analiza preliminara:</strong> Echipa noastra va verifica completitudinea informatiilor furnizate si va solicita detalii suplimentare, daca este necesar</li><li><strong>Evaluarea substantiala:</strong> Solicitarea dvs. va fi analizata in profunzime, luand in considerare toate aspectele relevante</li><li><strong>Decizia:</strong> In functie de rezultatul evaluarii, solicitarea dvs. poate fi aprobata, aprobata cu conditii sau respinsa</li><li><strong>Comunicarea deciziei:</strong> Veti fi informat cu privire la decizia noastra in termen de maxim 10 zile lucratoare de la data primirii solicitarii complete</li></ol><h3>5.3 Acordul de licentiere</h3><p>In cazul aprobarii solicitarii dvs., veti primi un acord scris de licentiere care va specifica:</p><ul><li>Continutul exact pentru care se acorda permisiunea</li><li>Scopul si contextul aprobat pentru utilizare</li><li>Durata permisiunii</li><li>Conditiile speciale (daca exista)</li><li>Cerintele de atribuire</li><li>Eventualele taxe sau redevente aplicabile</li><li>Restrictiile si limitarile</li><li>Consecintele incalcarii acordului</li></ul><p>Acest acord trebuie semnat de ambele parti inainte de inceperea utilizarii continutului.</p></section><section id="allowed"><h2>6. Utilizari permise fara acord prealabil</h2><p>In anumite cazuri limitate si bine definite, utilizarea continutului Emex.ro poate fi permisa fara obtinerea unui acord scris prealabil:</p><h3>6.1 Utilizare personala</h3><p>Este permisa vizualizarea, citirea si stocarea temporara a continutului in scop strict personal si necomercial, pentru informare sau educatie individuala, fara redistribuire catre terti.</p><h3>6.2 Citare academica</h3><p>Utilizarea unor fragmente scurte din continutul nostru in lucrari academice, cercetari stiintifice, teze de doctorat sau disertatii este permisa, cu conditia respectarii urmatoarelor cerinte:</p><ul><li>Fragmentele citate sa nu depaseasca 300 de cuvinte pentru un singur articol sau 10% din continutul total</li><li>Citarea sa fie insotita de atribuirea corespunzatoare a sursei, conform standardelor academice aplicabile</li><li>Utilizarea sa fie in scop educational sau de cercetare, fara beneficii comerciale directe</li><li>Lucrarea in care este incorporata citarea sa nu concureze cu sau sa nu diminueze valoarea continutului original</li></ul><div class="example"><p>Exemplu de citare academica corecta:</p><p>Conform unui studiu publicat pe Emex.ro, "fragmentul de text citat" (Emex.ro, "Titlul articolului", URL, data publicarii, accesat la [data accesarii]).</p></div><h3>6.3 Linkuri catre site-ul nostru</h3><p>Este permisa crearea de linkuri simple (hyperlink) catre pagini de pe Emex.ro, cu urmatoarele conditii:</p><ul><li>Linkul sa directioneze utilizatorul catre pagina originala de pe Emex.ro, fara a incorpora continutul in cadrul altui site (interzis framingul)</li><li>Contextul in care apare linkul sa nu sugereze nicio asociere, aprobare sau sponsorizare din partea Emex.ro, daca acestea nu exista</li><li>Site-ul care contine linkul sa nu promoveze activitati ilegale, continut ofensator sau care incalca drepturi ale tertilor</li><li>Linkul sa nu fie prezentat intr-un mod care sa diminueze sau sa afecteze negativ reputatia Emex.ro</li></ul><h3>6.4 Distribuirea ocazionala pe retele sociale</h3><p>Distribuirea ocazionala a articolelor sau materialelor de pe Emex.ro pe platformele de social media personale este permisa, cu conditia ca:</p><ul><li>Distribuirea sa se faca prin functionalitatile native ale platformelor respective (butoane de share)</li><li>Continutul sa nu fie modificat</li><li>Sursa (Emex.ro) sa fie clar mentionata</li><li>Distribuirea sa nu fie sistematica sau in cantitati mari</li><li>Scopul distribuirii sa nu fie comercial</li></ul><div class="warning"><p>Nota importanta: Utilizarile mentionate mai sus sunt singurele exceptii permise fara acord scris prealabil. Orice alta utilizare a continutului nostru necesita obtinerea permisiunii scrise din partea Emex.ro.</p></div></section><section id="forbidden"><h2>7. Utilizari strict interzise</h2><p>Urmatoarele utilizari ale continutului Emex.ro sunt strict interzise in orice circumstante si nu vor fi autorizate nici chiar prin acord scris:</p><h3>7.1 Extragerea automata a datelor</h3><p>Este interzisa utilizarea de software, roboti, spider-uri, crawler sau alte tehnologii automatizate pentru a:</p><ul><li>Extrage sistematic continut de pe Emex.ro (web scraping)</li><li>Crea baze de date derivate din continutul nostru</li><li>Monitoriza automat site-ul pentru modificari</li><li>Supraincarca serverele noastre prin cereri repetate sau masive</li></ul><h3>7.2 Utilizari daunatoare sau ilegale</h3><p>Este interzisa utilizarea continutului nostru in contexte care:</p><ul><li>Promoveaza activitati ilegale sau infractionale</li><li>Incalca drepturile fundamentale ale persoanelor</li><li>Promoveaza ura, discriminarea sau violenta</li><li>Contin materiale pornografice, ofensatoare sau nepotrivite pentru minori</li><li>Promoveaza produse sau servicii interzise de lege</li><li>Distribuie informatii false sau inselatoare</li></ul><h3>7.3 Falsificarea sau alterarea continutului</h3><p>Este interzisa:</p><ul><li>Modificarea continutului nostru intr-un mod care ii schimba sensul sau acuratetea</li><li>Prezentarea continutului nostru intr-un context care schimba semnificatia originala</li><li>Atribuirea falsa a continutului nostru catre alte surse</li><li>Eliminarea sau modificarea informatiilor despre drepturile de autor</li><li>Prezentarea continutului modificat ca fiind continutul original Emex.ro</li></ul><h3>7.4 Utilizari comerciale neautorizate</h3><p>In absenta unui acord scris explicit, este interzisa utilizarea continutului nostru in:</p><ul><li>Produse sau servicii comerciale</li><li>Materiale publicitare sau promotionale</li><li>Site-uri web care genereaza venituri din publicitate</li><li>Cursuri, seminarii sau formari contra cost</li><li>Carti, e-book-uri sau alte publicatii comerciale</li><li>Aplicatii mobile sau software comercial</li></ul><h3>7.5 Crearea de opere derivate neautorizate</h3><p>Este interzisa:</p><ul><li>Traducerea continutului in alte limbi fara permisiune</li><li>Adaptarea continutului pentru alte formate sau medii</li><li>Crearea de materiale bazate substantial pe continutul nostru</li><li>Dezvoltarea de produse sau servicii care incorporeaza concepte, metodologii sau date originale Emex.ro</li></ul><div class="warning"><p>Incalcarea acestor interdictii poate atrage raspunderea juridica si poate duce la actiuni legale pentru recuperarea prejudiciilor cauzate, inclusiv daune financiare si masuri pentru incetarea utilizarii neautorizate.</p></div></section><section id="licensing"><h2>8. Tipuri de licente disponibile</h2><p>In functie de natura si scopul utilizarii continutului nostru, Emex.ro ofera mai multe tipuri de licente personalizate:</p><h3>8.1 Licenta standard pentru utilizare non-comerciala</h3><p>Aceasta licenta permite utilizarea continutului in contexte educationale, academice, sau non-profit, cu respectarea urmatoarelor conditii:</p><ul><li>Atribuirea clara a sursei conform cerintelor noastre</li><li>Utilizarea fara modificari sau cu modificari minore aprobate</li><li>Fara drept de sublicentiere catre terti</li><li>Perioada limitata, de obicei pana la 12 luni</li><li>Utilizare limitata la teritoriul specificat</li></ul><h3>8.2 Licenta comerciala standard</h3><p>Destinata organizatiilor comerciale care doresc sa utilizeze continutul nostru in scop lucrativ, aceasta licenta include:</p><ul><li>Dreptul de a reproduce continutul in materiale comerciale</li><li>Posibilitatea unor adaptari limitate (cu aprobare prealabila)</li><li>Distribuire limitata catre audienta proprie</li><li>Atribuire obligatorie</li><li>Perioada definita de utilizare</li><li>Eventuale taxe si redevente aplicabile</li></ul><h3>8.3 Licenta extinsa pentru continut premium</h3><p>Pentru utilizari complexe ale continutului nostru de inalta valoare (studii, analize, date exclusive):</p><ul><li>Drepturi extinse de utilizare si adaptare</li><li>Posibilitatea crearii de opere derivate</li><li>Utilizare multi-platforma</li><li>Perioada extinsa de utilizare</li><li>Tarife personalizate in functie de valoarea continutului</li></ul><h3>8.4 Licenta pentru republicare integrala</h3><p>Pentru partenerii media care doresc sa republice integral articole sau materiale Emex.ro:</p><ul><li>Republicare fara modificari a continutului</li><li>Atribuire proeminenta si link direct catre sursa originala</li><li>Obligatia de a actualiza continutul in cazul unor modificari aduse de Emex.ro</li><li>Acorduri de partajare a veniturilor, daca este cazul</li></ul><h3>8.5 Licenta pentru utilizare academica</h3><p>Destinata institutiilor educationale, cercetatorilor si studentilor:</p><ul><li>Utilizare extinsa in contexte educationale</li><li>Posibilitatea includerii in materiale didactice</li><li>Drepturi de distribuire catre studenti sau participanti la cursuri</li><li>Tarife reduse sau gratuitati in functie de context</li></ul><div class="info"><p>Pentru detalii specifice despre fiecare tip de licenta, inclusiv tarifele aplicabile si procesul de solicitare, va rugam sa contactati departamentul nostru de licentiere la <a href="mailto:admin@emex.ro"><em>admin@emex.ro</em></a>.</p></div></section><section id="fees"><h2>9. Taxe si redevente</h2><p>Utilizarea comerciala a continutului Emex.ro este supusa, in majoritatea cazurilor, unor eventuale taxe si redevente care reflecta valoarea si originalitatea materialelor noastre.</p><h3>9.1 Structura tarifelor</h3><p>Tarifele pentru utilizarea continutului nostru sunt stabilite pe baza urmatoarelor criterii:</p><ul><li><strong>Tipul continutului:</strong> Articole standard, analize premium, date exclusive, materiale vizuale, etc.</li><li><strong>Scopul utilizarii:</strong> Comercial, educational, non-profit, etc.</li><li><strong>Durata licentei:</strong> Perioada pentru care se acorda dreptul de utilizare</li><li><strong>Audienta potentiala:</strong> Dimensiunea si caracteristicile publicului care va avea acces la continut</li><li><strong>Teritoriul:</strong> Zona geografica in care va fi utilizat continutul</li><li><strong>Exclusivitatea:</strong> Daca se solicita drepturi exclusive de utilizare</li></ul><h3>9.2 Metode de plata</h3><p>Acceptam urmatoarele metode de plata pentru eventualele taxe de licentiere:</p><ul><li>Transfer bancar</li><li>Plata online prin card de credit/ debit</li><li>Sisteme electronice de plata (GooglePay, PayPal, etc.)</li><li>Alte metode disponibile in Romania</li></ul><h3>9.3 Scutiri si reduceri</h3><p>In anumite situatii, putem oferi scutiri sau reduceri de taxe pentru:</p><ul><li>Institutii educationale si academice</li><li>Organizatii non-profit si caritabile</li><li>Proiecte cu impact social pozitiv</li><li>Studenti si cercetatori individuali</li><li>Parteneri strategici ai Emex.ro</li></ul><p>Solicitarile pentru scutiri sau reduceri trebuie sa fie insotite de documentele justificative relevante si vor fi evaluate individual.</p><div class="highlight"><p>Pentru o oferta personalizata conform nevoilor dumneavoastra specifice, va invitam sa contactati echipa noastra de licentiere, care va va oferi informatii detaliate despre optiunile disponibile si tarifele aplicabile.</p></div></section><section id="attribution"><h2>10. Politica de atribuire</h2><p>Atribuirea corecta si vizibila a sursei este o conditie fundamentala pentru orice utilizare autorizata a continutului Emex.ro.</p><h3>10.1 Cerinte generale de atribuire</h3><p>Toate formele de utilizare a continutului nostru trebuie sa includa urmatoarele elemente de atribuire:</p><ul><li>Mentiunea clara "Sursa: Emex.ro" sau "© Emex.ro"</li><li>Titlul exact al materialului utilizat</li><li>Data publicarii originale pe Emex.ro</li><li>Un link activ catre pagina originala (pentru utilizari online)</li></ul><div class="example"><p>Exemplu de atribuire corecta pentru utilizare online:</p><p>Sursa: Titlul articolului, Emex.ro, publicat la [data], © Emex.ro 2025</p><p>Exemplu de atribuire corecta pentru materiale tiparite:</p><p>"Titlul articolului", Emex.ro, publicat la [data], © Emex.ro 2025, disponibil online la www.emex.ro/titlul-articolului</p></div><h3>10.2 Pozitionarea atribuirii</h3><p>Atribuirea trebuie sa fie:</p><ul><li>Vizibila si lizibila fara efort</li><li>Plasata in proximitatea continutului utilizat</li><li>De dimensiuni rezonabile (nu mai mici de 70% din dimensiunea textului principal)</li><li>Neobscurata de alte elemente grafice sau text</li></ul><h3>10.3 Atribuirea in diferite medii</h3><p>Cerintele specifice de atribuire variaza in functie de mediul in care este utilizat continutul:</p><h4>10.3.1 Atribuire in mediul online</h4><ul><li>Link activ catre articolul original</li><li>Metadate corecte pentru motoarele de cautare</li><li>Respectarea protocoalelor rel="canonical" unde este cazul</li></ul><h4>10.3.2 Atribuire in materiale tiparite</h4><ul><li>Mentionarea URL-ului complet pentru acces online</li><li>Pozitionare clara in subsolul paginii sau la finalul articolului</li><li>Includerea in bibliografia sau lista de referinte</li></ul><h4>10.3.3 Atribuire in prezentari si materiale educationale</h4><ul><li>Mentionarea in slide-ul unde apare continutul</li><li>Includerea in lista de referinte la finalul prezentarii</li><li>Mentionarea verbala in timpul prezentarii</li></ul><h4>10.3.4 Atribuire in materiale audio-video</h4><ul><li>Mentionare vocala in continutul audio</li><li>Text suprapus sau credit la sfarsit pentru materiale video</li><li>Includere in descrierea materialului pentru platformele online</li></ul></section><section id="violations"><h2>11. Incalcari si consecinte</h2><p><span class="alineat_span"></span>Emex.ro isi rezerva dreptul de a lua masuri impotriva oricarei utilizari neautorizate a continutului sau, in conformitate cu legislatia in vigoare privind proprietatea intelectuala.</p><h3>11.1 Tipuri de incalcari</h3><p>Urmatoarele actiuni sunt considerate incalcari ale politicii noastre de licentiere:</p><ul><li>Utilizarea continutului fara obtinerea prealabila a unui acord scris</li><li>Depasirea scopului sau a conditiilor specificate in acordul de licentiere</li><li>Omiterea sau insuficienta atribuire a sursei</li><li>Modificarea neautorizata a continutului</li><li>Sublicentierea neautorizata a continutului catre terti</li><li>Utilizarea continutului dupa expirarea perioadei de licentiere</li><li>Refuzul de a plati eventualele taxe si redevente aplicabile</li></ul><h3>11.2 Procedura in caz de incalcare</h3><p>In cazul identificarii unei utilizari neautorizate a continutului nostru, vom urma urmatorii pasi:</p><ol><li><strong>Notificare initiala:</strong> Partea responsabila va primi o notificare scrisa privind incalcarea identificata, cu solicitarea de a remedia situatia in termen de 5 zile lucratoare</li><li><strong>Evaluarea raspunsului:</strong> Vom analiza raspunsul primit si actiunile intreprinse pentru remedierea situatiei</li><li><strong>Actiuni suplimentare:</strong> In absenta unei rezolvari satisfacatoare, vom lua masurile legale disponibile pentru protejarea drepturilor noastre</li></ol><h3>11.3 Consecinte potentiale</h3><p>Incalcarea politicii noastre de licentiere poate avea urmatoarele consecinte:</p><ul><li><strong>Actiuni legale:</strong> Initierea de proceduri juridice pentru incalcarea drepturilor de autor</li><li><strong>Daune financiare:</strong> Solicitarea de despagubiri pentru prejudiciile cauzate, care pot include:
<ul><li>Profiturile obtinute din utilizarea neautorizata</li><li>Taxele de licentiere care ar fi fost datorate</li><li>Daune statutare prevazute de legislatia in vigoare</li><li>Costurile legale si administrative asociate</li></ul></li><li><strong>Masuri tehnice:</strong> Utilizarea mecanismelor DMCA (Digital Millennium Copyright Act) sau echivalente pentru eliminarea continutului</li><li><strong>Notificarea platformelor:</strong> Informarea furnizorilor de servicii de hosting, retelelor sociale sau altor intermediari despre incalcarea drepturilor de autor</li><li><strong>Publicitate negativa:</strong> Mentionarea publica a cazurilor grave de incalcare, conform politicilor noastre interne</li></ul><div class="warning"><p>Emex.ro isi rezerva dreptul de a urmari toate caile legale disponibile pentru protejarea proprietatii sale intelectuale. Recomandam respectarea stricta a acestei politici de licentiere si obtinerea acordurilor necesare inainte de orice utilizare a continutului nostru.</p></div></section><section id="thirdparty"><h2>12. Continut apartinand tertilor</h2><p><span class="alineat_span"></span>Emex.ro poate include in cadrul platformei sale continut apartinand tertilor, utilizat cu permisiunea acestora sau sub incidenta unor exceptii legale.</p><h3>12.1 Identificarea continutului tertilor</h3><p>Continutul care nu apartine Emex.ro este in general identificat prin:</p><ul><li>Atribuiri explicite la finalul articolelor sau materialelor</li><li>Watermark-uri sau alte marcaje pe materiale vizuale</li><li>Mentiuni in descrierea sau metadatele continutului</li></ul><h3>12.2 Limitari privind sublicentierea</h3><p>In cazul solicitarilor de utilizare a continutului care include materiale apartinand tertilor:</p><ul><li>Emex.ro nu poate acorda drepturi de utilizare pentru continutul apartinand tertilor</li><li>Solicitantul are responsabilitatea de a obtine permisiunile necesare direct de la detinatorii drepturilor</li><li>Orice acord incheiat cu Emex.ro se va aplica exclusiv continutului asupra caruia detinem drepturi</li></ul><h3>12.3 Continut sub licente deschise</h3><p>In anumite cazuri, Emex.ro poate utiliza continut disponibil sub licente deschise (Creative Commons, domeniu public, etc.). In aceste situatii:</p><ul><li>Vom indica tipul de licenta aplicabil</li><li>Utilizatorii trebuie sa respecte termenii licentei respective</li><li>Atribuirea trebuie sa includa atat Emex.ro, cat si sursa originala</li></ul></section><section id="disclaimer"><h2>13. Limitarea raspunderii</h2><p><span class="alineat_span"></span>In legatura cu continutul disponibil pe platforma noastra si cu licentierea acestuia, Emex.ro face urmatoarele precizari privind limitarea raspunderii:</p><h3>13.1 Acuratetea continutului</h3><p>Desi depunem toate eforturile pentru a asigura acuratetea si actualitatea informatiilor publicate:</p><ul><li>Continutul este furnizat "ca atare", fara niciun fel de garantii explicite sau implicite</li><li>Nu garantam ca informatiile sunt complete, exacte sau actualizate in permanenta</li><li>Utilizatorii sunt incurajati sa verifice informatiile din surse multiple</li></ul><h3>13.2 Adecvarea pentru scopuri specifice</h3><p>Emex.ro nu garanteaza ca:</p><ul><li>Continutul sau va fi adecvat pentru nevoile sau scopurile specifice ale utilizatorilor</li><li>Utilizarea continutului va produce rezultatele dorite sau asteptate</li><li>Continutul va fi compatibil cu anumite platforme sau medii de utilizare</li></ul><h3>13.3 Excluderea raspunderii pentru daune</h3><p>In masura maxima permisa de lege, Emex.ro nu va fi raspunzator pentru:</p><ul><li>Daune directe, indirecte, incidentale, speciale sau consecutive rezultate din utilizarea sau imposibilitatea utilizarii continutului</li><li>Pierderi de profit, date, reputatie sau alte pierderi intangibile</li><li>Intreruperi ale activitatii comerciale sau profesionale</li><li>Costurile pentru procurarea de bunuri sau servicii substitute</li></ul><h3>13.4 Responsabilitatea utilizatorului</h3><p>Utilizatorii continutului licentiat de la Emex.ro isi asuma responsabilitatea pentru:</p><ul><li>Evaluarea adecvarii continutului pentru scopurile proprii</li><li>Respectarea tuturor legilor si reglementarilor aplicabile</li><li>Obtinerea tuturor permisiunilor suplimentare necesare de la terti</li><li>Utilizarea continutului intr-o maniera care sa nu prejudicieze Emex.ro sau tertii</li></ul><div class="info"><p>Aceasta limitare a raspunderii se aplica tuturor formelor de utilizare a continutului Emex.ro, indiferent daca acestea sunt autorizate prin acorduri scrise sau se incadreaza in exceptiile permise fara acord prealabil.</p></div></section><section id="modifications"><h2>14. Modificari ale politicii de licentiere</h2><p><span class="alineat_span"></span>Emex.ro isi rezerva dreptul de a actualiza si modifica periodic aceasta politica de licentiere pentru a reflecta schimbarile legislative, evolutiile tehnologice sau modificarile in practicile noastre de afaceri.</p><h3>14.1 Procedura de modificare</h3><p>Atunci cand facem modificari semnificative la aceasta politica:</p><ul><li>Vom publica versiunea actualizata pe aceasta pagina</li><li>Vom indica data ultimei actualizari la sfarsitul documentului</li><li>Pentru modificari majore, putem notifica utilizatorii prin bannere pe site sau prin alte mijloace adecvate</li></ul><h3>14.2 Efectul asupra acordurilor existente</h3><p>Modificarile aduse politicii de licentiere:</p><ul><li>Nu vor afecta acordurile de licentiere deja incheiate, care raman valabile conform termenilor stabiliti initial</li><li>Se vor aplica tuturor solicitarilor noi de licentiere primite dupa data intrarii in vigoare a modificarilor</li><li>Pot fi incorporate in acordurile existente doar prin acte aditionale explicite, agreate de ambele parti</li></ul><h3>14.3 Responsabilitatea utilizatorilor</h3><p>Este responsabilitatea utilizatorilor sa:</p><ul><li>Verifice periodic aceasta pagina pentru a fi la curent cu eventualele modificari</li><li>Ia la cunostinta si sa respecte versiunea actualizata a politicii</li><li>Contacteze departamentul nostru de licentiere in cazul in care au intrebari sau nelamuriri privind modificarile efectuate</li></ul></section><section id="applicable"><h2>15. Legea aplicabila si jurisdictia</h2><p><span class="alineat_span"></span>Aceasta politica de licentiere si toate acordurile incheiate in baza ei sunt guvernate si interpretate in conformitate cu legislatia romana.</p><h3>15.1 Legislatia aplicabila</h3><p>Prevederile relevante includ, dar nu se limiteaza la:</p><ul><li>Legea nr. 8/1996 privind dreptul de autor si drepturile conexe, cu modificarile si completarile ulterioare</li><li>Codul Civil al Romaniei</li><li>Legislatia Uniunii Europene aplicabila in domeniul proprietatii intelectuale</li><li>Conventiile si tratatele internationale la care Romania este parte</li></ul><h3>15.2 Solutionarea litigiilor</h3><p>In cazul aparitiei unor dispute legate de interpretarea sau aplicarea acestei politici:</p><ul><li>Vom incerca initial sa solutionam orice diferend pe cale amiabila, prin negociere directa</li><li>In cazul in care nu se poate ajunge la o solutie amiabila, disputele vor fi supuse spre solutionare instantelor judecatoresti competente din Romania</li><li>Instantele din Bucuresti vor avea competenta exclusiva pentru solutionarea litigiilor, cu exceptia cazurilor in care legea prevede altfel in mod imperativ</li></ul><h3>15.3 Limba oficiala</h3><p>In caz de discrepante intre versiunile in diferite limbi ale acestei politici sau ale acordurilor de licentiere:</p><ul><li>Versiunea in limba romana va prevala</li><li>Toate comunicarile oficiale si procedurile legale se vor desfasura in limba romana</li><li>Traducerile sunt furnizate doar pentru facilitarea intelegerii si nu au valoare contractuala</li></ul></section><section id="faq"><h2>16. Intrebari frecvente</h2><button class="accordion">Ce se intampla daca utilizez continutul Emex.ro fara permisiune?</button><div class="panel"><p><span class="alineat_span"></span>Utilizarea neautorizata a continutului nostru reprezinta o incalcare a drepturilor de autor si poate atrage consecinte juridice semnificative, inclusiv actiuni in instanta pentru daune si prejudicii. Recomandam intotdeauna obtinerea unui acord scris inainte de orice utilizare care nu se incadreaza in exceptiile limitate mentionate in sectiunea 6.</p></div><button class="accordion">Cat dureaza procesul de obtinere a unei licente?</button><div class="panel"><p><span class="alineat_span"></span>Durata procesului variaza in functie de complexitatea solicitarii si volumul de cereri in curs de procesare. In general, pentru solicitari standard, oferim un raspuns in termen de 5 - 10 zile lucratoare. Pentru solicitari complexe sau care necesita negocieri suplimentare, procesul poate dura pana la 3-4 saptamani.</p></div><button class="accordion">Pot utiliza continutul Emex.ro in teza mea de licenta sau doctorat?</button><div class="panel"><p><span class="alineat_span"></span>Utilizarea limitata a continutului nostru in lucrari academice este permisa fara acord prealabil, cu conditia respectarii cerintelor de citare corecta si a limitelor cantitative mentionate in sectiunea 6.2. Pentru utilizari mai extensive, va recomandam sa solicitati o licenta academica.</p></div><button class="accordion">Este posibila obtinerea drepturilor exclusive pentru anumite materiale?</button><div class="panel"><p><span class="alineat_span"></span>In situatii exceptionale, Emex.ro poate acorda drepturi exclusive pentru utilizarea anumitor materiale, pentru o perioada limitata si in contexte specifice. Aceste solicitari sunt evaluate de la caz la caz si pot implica taxe suplimentare. Va rugam sa mentionati explicit in solicitarea dvs. daca doriti drepturi exclusive. <em>Nu se aplica in cazul partenerilor “Emex”</em></p></div><button class="accordion">Pot traduce continutul Emex.ro in alte limbi?</button><div class="panel"><p><span class="alineat_span"></span>Traducerea continutului nostru in alte limbi este considerata crearea unei opere derivate si necesita obtinerea prealabila a unui acord scris. Solicitarile pentru drepturi de traducere trebuie sa specifice limba tinta, contextul de utilizare si modul de distribuire a traducerii.</p></div><button class="accordion">Ce fac daca am identificat o utilizare neautorizata a continutului Emex.ro?</button><div class="panel"><p><span class="alineat_span"></span>Apreciem sprijinul comunitatii noastre in protejarea proprietatii intelectuale. Daca observati o utilizare neautorizata a continutului nostru, va rugam sa ne informati la adresa <a href="mailto:admin@emex.ro">admin@emex.ro</a>, furnizand detalii despre cazul identificat, inclusiv URL-uri si capturi de ecran relevante.</p></div><button class="accordion">Sunt disponibile pachete sau abonamente pentru utilizare regulata?</button><div class="panel"><p><span class="alineat_span"></span>Da, pentru organizatiile care au nevoie de acces regulat la continutul nostru, oferim pachete si abonamente personalizate cu tarife preferentiale. Aceste solutii sunt adaptate nevoilor specifice si pot include drepturi predefinite de utilizare pentru volume mai mari de continut.</p></div><button class="accordion">Cum trebuie sa procedez in cazul in care doresc sa utilizez doar o imagine de pe Emex.ro?</button><div class="panel"><p><span class="alineat_span"></span>Imaginile de pe platforma noastra sunt protejate prin drepturi de autor in acelasi mod ca si continutul textual. Utilizarea lor necesita obtinerea unui acord scris, cu exceptia cazurilor care se incadreaza in limitele utilizarii permise fara autorizatie. Procedura de solicitare este identica, dar va rugam sa specificati clar imaginea dorita prin URL si o descriere vizuala.</p></div></section><section id="contact"><h2>17. Contact</h2><p>Pentru orice intrebari, solicitari sau clarificari referitoare la politica noastra de licentiere a continutului, va invitam sa ne contactati folosind urmatoarele modalitati:</p><div class="contact"><h3>Departamentul de Licentiere Continut</h3><p><strong>Email:</strong><a href="mailto:admin@emex.ro"><em>admin@emex.ro</em></a><br><strong>Telefon:</strong> +4 021 457 1693<br><strong>Program:</strong> Luni-Vineri, 08:00-16:30<br><strong>Adresa:</strong> Strada Steaua Sudului, Nr. 22, Jilava, Ilfov, 077120, Romania</p><h3>Pentru raportarea incalcarilor drepturilor de autor</h3><p><strong>Email:</strong><a href="mailto:admin@emex.ro"><em>admin@emex.ro</em></a><br><strong>Telefon:</strong><a href="+4 021.457.1693">+4 021.457.1693</a><br><strong>Formular online:</strong><a href="/contact"><em>Formular de raportare</em></a></p><h3>Pentru parteneriate media si colaborari strategice</h3><p><strong>Email:</strong><a href="mailto:admin@emex.ro"><em>admin@emex.ro</em></a><br><strong>Telefon:</strong> +4 021 457 1693</p><a href="/contact" class="button"><em>Formular de contact complet</em></a></div></section><script>
            // Script pentru functionalitatea acordeon (Intrebari frecvente)
            document.addEventListener('DOMContentLoaded', function() {
                var acc = document.getElementsByClassName("accordion");
                var i;
    
                for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;
                        if (panel.style.maxHeight) {
                            panel.style.maxHeight = null;
                        } else {
                            panel.style.maxHeight = panel.scrollHeight + "px";
                        } 
                    });
                }
            });
        </script></div>
@endsection