@extends('layout.layout')

@section('seo')
<title>Licență Conținut - Emex.ro</title>
<style>
    .big-div-licentiere{
        line-height: 1.6;
        color: #333;
        max-width: 1200px;
        border-radius: 15px;
        margin: 40px auto 20px auto;
        padding: 16px;
        text-align: justify;
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
        margin-bottom: 30px;
        background-color: #fff;
        border-radius: 8px;
        padding: 25px;
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
        color: #0558ce !important;
        text-align: center;
    }
    h2 {
        color: #0558ce;
    }
    h3 {
        color: #0558ce;
    }
    h4 {
        color: #0558ce;
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
        padding: 20px;
        border-left: 4px solid #0558ce;
        margin: 25px 0;
        border-radius: 0 8px 8px 0;
    }
    .warning {
        background-color: #fff8f0;
        padding: 20px;
        border-left: 4px solid #e67e22;
        margin: 25px 0;
        border-radius: 0 8px 8px 0;
    }
    .info {
        background-color: #f0feff;
        padding: 20px;
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
        margin-top: 50px;
        background-color: #f8f9fa;
        padding: 25px;
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
        color: #0558ce;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .accordion {
        background-color: #f8f9fa;
        color: #333;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        text-align: left;
        border: none;
        outline: none;
        transition: 0.4s;
        margin-bottom: 5px;
        border-radius: 5px;
        font-weight: bold;
    }
    .active, .accordion:hover {
        background-color: #e9ecef;
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
        color: #0558ce !important;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    .button {
        display: inline-block;
        background-color: #0558ce;
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
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
    }
    .toc ul {
        list-style-type: none !important;
        padding-left: 15px;
    }
    .toc ul li {
        margin-bottom: 8px;
    }

    
    /* .example {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 5px;
        margin: 15px 0;
        font-family: Consolas, Monaco, 'Andale Mono', monospace;
        font-size: 0.9em;
    } */
</style>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/servicii.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Politica de Licentiere</li></ul>
@endsection


@section('content')

<div class="servicii relative w-full col justify-center align-center header" style="background-image: url('{{ asset('resources/images/Banner-general-Emex-vopsele.jpg') }}');" id="servicii_header">
    <h1 style="color: #ffffff !important;" class="z-10">
        POLITICA DE LICENTIERE
    </h1>
  </div>

<div class="big-div-licentiere">

    <h1>Licență Conținut - Emex.ro</h1>

    <div class="header-licentiere">
        <p>Termeni și condiții pentru utilizarea conținutului și materialelor de pe platforma Emex.ro</p>
    </div>

    <div class="highlight">
        <strong>Data-Usage-Permission:</strong> Necesită acord scris prealabil
    </div>
    
    <div class="toc">
        <h3>Cuprins</h3>
        <ul>
            <li><a href="#introduction">1. Introducere</a></li>
            <li><a href="#definitions">2. Definiții</a></li>
            <li><a href="#ownership">3. Drepturi de autor și proprietate intelectuală</a></li>
            <li><a href="#usage">4. Condiții generale de utilizare a conținutului</a></li>
            <li><a href="#permission">5. Solicitarea permisiunii de utilizare</a></li>
            <li><a href="#allowed">6. Utilizări permise fără acord prealabil</a></li>
            <li><a href="#forbidden">7. Utilizări strict interzise</a></li>
            <li><a href="#licensing">8. Tipuri de licențe disponibile</a></li>
            <li><a href="#fees">9. Taxe și redevențe</a></li>
            <li><a href="#attribution">10. Politica de atribuire</a></li>
            <li><a href="#violations">11. Încălcări și consecințe</a></li>
            <li><a href="#thirdparty">12. Conținut aparținând terților</a></li>
            <li><a href="#disclaimer">13. Limitarea răspunderii</a></li>
            <li><a href="#modifications">14. Modificări ale politicii de licențiere</a></li>
            <li><a href="#applicable">15. Legea aplicabilă și jurisdicția</a></li>
            <li><a href="#faq">16. Întrebări frecvente</a></li>
            <li><a href="#contact">17. Contact</a></li>
        </ul>
    </div>
    
    <section id="introduction">
        <h2>1. Introducere</h2>
        <p>Prezentul document stabilește termenii și condițiile de utilizare a informațiilor, materialelor și conținutului disponibil pe platforma Emex.ro. Acești termeni se aplică tuturor vizitatorilor, utilizatorilor și celor care accesează sau folosesc conținutul nostru în orice scop.</p>
        
        <p>Emex.ro conține o gamă largă de materiale originale, inclusiv dar fără a se limita la: texte, articole, studii, analize, imagini, grafice, ilustrații, fotografii, videoclipuri, animații, baze de date, software, aplicații, design și alte elemente creative care sunt protejate prin legi naționale și internaționale referitoare la proprietatea intelectuală.</p>
        
        <div class="info">
            <p>Prin accesarea și utilizarea platformei Emex.ro, sunteți de acord să respectați termenii și condițiile prezentate în această politică de licențiere. Dacă nu sunteți de acord cu acești termeni, vă rugăm să nu folosiți sau să distribuiți conținutul nostru.</p>
        </div>
    </section>
    
    <section id="definitions">
        <h2>2. Definiții</h2>
        <p>În contextul prezentei politici de licențiere, următorii termeni vor avea semnificațiile de mai jos:</p>
        
        <ul>
            <li><strong>Emex.ro</strong> - platforma online accesibilă la adresa www.emex.ro, inclusiv toate subdomeniile și serviciile conexe</li>
            <li><strong>Conținut</strong> - orice material disponibil pe platformă, incluzând dar fără a se limita la: texte, articole, imagini, grafice, fotografii, videoclipuri, baze de date, aplicații, design și alte creații</li>
            <li><strong>Utilizator</strong> - orice persoană fizică sau juridică care accesează sau folosește platforma sau conținutul acesteia</li>
            <li><strong>Licență</strong> - permisiunea scrisă acordată de Emex.ro pentru utilizarea conținutului său, în condițiile specificate</li>
            <li><strong>Acord scris prealabil</strong> - document oficial emis de Emex.ro care permite utilizarea specifică a conținutului, în condițiile agreate</li>
            <li><strong>Utilizare comercială</strong> - folosirea conținutului în orice mod care generează direct sau indirect beneficii economice sau avantaje comerciale</li>
            <li><strong>Utilizare necomercială</strong> - folosirea conținutului fără scop lucrativ, în contexte educaționale, informative sau personale</li>
            <li><strong>Atribuire</strong> - recunoașterea expresă a Emex.ro ca sursă originală a conținutului utilizat</li>
            <li><strong>Operă derivată</strong> - o lucrare bazată pe sau care încorporează conținut de pe Emex.ro, dar care aduce modificări substanțiale sau elemente creative noi</li>
        </ul>
    </section>
    
    <section id="ownership">
        <h2>3. Drepturi de autor și proprietate intelectuală</h2>
        <p>Tot conținutul disponibil pe Emex.ro este protejat de legislația națională și internațională privind drepturile de autor și alte drepturi de proprietate intelectuală. Aceste drepturi includ, dar nu se limitează la:</p>
        
        <ul>
            <li>Drepturi de autor pentru toate textele, articolele, și alte opere scrise</li>
            <li>Drepturi asupra bazelor de date și compilațiilor de informații</li>
            <li>Drepturi asupra mărcilor comerciale, logourilor și denumirilor comerciale</li>
            <li>Drepturi asupra designului și aspectului vizual al platformei</li>
            <li>Drepturi asupra fotografiilor, ilustrațiilor, graficelor și altor opere vizuale</li>
            <li>Drepturi asupra materialelor video și audio</li>
            <li>Drepturi asupra codului sursă, aplicațiilor și altor elemente software</li>
        </ul>
        
        <p>Emex.ro este deținătorul exclusiv al drepturilor de autor și al altor drepturi de proprietate intelectuală asupra conținutului creat de echipa sa. În cazul conținutului furnizat de terți sau de parteneri, Emex.ro deține licențele necesare pentru utilizarea acestuia pe platforma sa.</p>
        
        <div class="warning">
            <p>Utilizarea neautorizată a conținutului Emex.ro reprezintă o încălcare a drepturilor de autor și poate atrage consecințe juridice severe, inclusiv dar fără a se limita la acțiuni în instanță pentru recuperarea prejudiciilor.</p>
        </div>
        
        <h3>3.1 Durata protecției drepturilor de autor</h3>
        <p>Drepturile de autor pentru materialele originale de pe Emex.ro sunt protejate conform legislației în vigoare, pentru întreaga durată prevăzută de lege. În România, această protecție se extinde pe toată durata vieții autorului plus 70 de ani după decesul acestuia pentru persoane fizice, respectiv 70 de ani de la data primei publicări pentru opere colective sau anonime.</p>
        
        <h3>3.2 Informații de identificare a drepturilor de proprietate</h3>
        <p>Toate paginile și materialele de pe Emex.ro conțin informații de identificare a drepturilor de proprietate, inclusiv mențiuni privind drepturile de autor, logo-uri, mărci înregistrate sau alte elemente care identifică Emex.ro ca deținător sau utilizator autorizat. Este strict interzisă îndepărtarea sau modificarea acestor informații de identificare.</p>
    </section>
    
    <section id="usage">
        <h2>4. Condiții generale de utilizare a conținutului</h2>
        <p>Utilizarea oricărui conținut de pe Emex.ro, indiferent de scop (comercial sau necomercial), inclusiv reproducerea, distribuirea, modificarea, publicarea, afișarea, încorporarea în alte opere sau transmiterea prin orice mijloace, <strong>necesită obținerea prealabilă a unui acord scris</strong> din partea Emex.ro.</p>
        
        <p>Acest principiu fundamental reflectă valoarea și originalitatea conținutului nostru, precum și investițiile semnificative pe care le facem pentru crearea, menținerea și îmbunătățirea platformei și a materialelor disponibile.</p>
        
        <h3>4.1 Principii generale</h3>
        <p>Toate solicitările pentru utilizarea conținutului nostru vor fi evaluate pe baza următoarelor principii:</p>
        <ul>
            <li>Respectarea integrității conținutului original</li>
            <li>Atribuirea corespunzătoare a sursei</li>
            <li>Utilizarea în contexte adecvate și relevante</li>
            <li>Protejarea valorii și reputației brandului Emex.ro</li>
            <li>Respectarea drepturilor terților care pot fi implicate</li>
        </ul>
        
        <h3>4.2 Acorduri personalizate</h3>
        <p>Recunoaștem diversitatea nevoilor utilizatorilor noștri și suntem deschiși să negociem acorduri personalizate pentru utilizarea conținutului nostru în funcție de specificul fiecărei solicitări. Aceste acorduri pot varia în funcție de:</p>
        <ul>
            <li>Tipul conținutului solicitat</li>
            <li>Scopul și contextul utilizării</li>
            <li>Durata pentru care se solicită dreptul de utilizare</li>
            <li>Audiența țintă și impactul potențial</li>
            <li>Beneficiile reciproce pentru ambele părți</li>
        </ul>
    </section>
    
    <section id="permission">
        <h2>5. Solicitarea permisiunii de utilizare</h2>
        <p>Pentru a obține permisiunea de a utiliza conținutul nostru, vă rugăm să urmați procedura de mai jos:</p>
        
        <h3>5.1 Formular de solicitare</h3>
        <p>Transmiteți o solicitare scrisă care să includă următoarele informații:</p>
        <ul>
            <li><strong>Date de identificare:</strong> Numele complet al persoanei fizice sau juridice, adresa poștală, adresa de e-mail, numărul de telefon, website (dacă este cazul)</li>
            <li><strong>Detalii despre conținut:</strong> Descrierea exactă și completă a conținutului pe care doriți să îl utilizați, inclusiv titlul, URL-ul paginii, data publicării și orice alte informații relevante pentru identificarea conținutului</li>
            <li><strong>Scopul utilizării:</strong> Descrierea detaliată a modului în care intenționați să folosiți conținutul (de exemplu, în publicații tipărite, pe website-uri, în materiale educaționale, în prezentări, etc.)</li>
            <li><strong>Contextul utilizării:</strong> Informații despre proiectul, publicația sau platforma unde va fi utilizat conținutul</li>
            <li><strong>Audiența țintă:</strong> Detalii despre publicul căruia i se adresează materialul în care va fi inclus conținutul nostru</li>
            <li><strong>Perioada de utilizare:</strong> Intervalul de timp pentru care solicitați dreptul de a utiliza conținutul (dată de început și de sfârșit)</li>
            <li><strong>Modalitatea de atribuire:</strong> Propunerea dvs. privind modul în care veți menționa Emex.ro ca sursă a conținutului</li>
            <li><strong>Alte informații relevante:</strong> Orice alte detalii care ar putea fi utile în evaluarea solicitării dvs.</li>
        </ul>
        
        <div class="highlight">
            <p>Solicitările pentru permisiunea de utilizare a conținutului pot fi trimise prin:</p>
            <ul>
                <li><strong>E-mail:</strong> <a href="mailto:licente@emex.ro">licente@emex.ro</a></li>
                <li><strong>Formular web:</strong> Disponibil în secțiunea "Contact" a site-ului nostru</li>
                <li><strong>Poștă:</strong> La adresa sediului nostru social menționată în secțiunea de contact</li>
            </ul>
        </div>
        
        <h3>5.2 Procesul de evaluare</h3>
        <p>După primirea solicitării dvs., procesul de evaluare va urma următorii pași:</p>
        <ol>
            <li><strong>Confirmarea primirii:</strong> Veți primi o confirmare automată a primirii solicitării dvs. în termen de 24 de ore</li>
            <li><strong>Analiza preliminară:</strong> Echipa noastră va verifica completitudinea informațiilor furnizate și va solicita detalii suplimentare, dacă este necesar</li>
            <li><strong>Evaluarea substanțială:</strong> Solicitarea dvs. va fi analizată în profunzime, luând în considerare toate aspectele relevante</li>
            <li><strong>Decizia:</strong> În funcție de rezultatul evaluării, solicitarea dvs. poate fi aprobată, aprobată cu condiții sau respinsă</li>
            <li><strong>Comunicarea deciziei:</strong> Veți fi informat cu privire la decizia noastră în termen de maxim 10 zile lucrătoare de la data primirii solicitării complete</li>
        </ol>
        
        <h3>5.3 Acordul de licențiere</h3>
        <p>În cazul aprobării solicitării dvs., veți primi un acord scris de licențiere care va specifica:</p>
        <ul>
            <li>Conținutul exact pentru care se acordă permisiunea</li>
            <li>Scopul și contextul aprobat pentru utilizare</li>
            <li>Durata permisiunii</li>
            <li>Condițiile speciale (dacă există)</li>
            <li>Cerințele de atribuire</li>
            <li>Eventualele taxe sau redevențe aplicabile</li>
            <li>Restricțiile și limitările</li>
            <li>Consecințele încălcării acordului</li>
        </ul>
        
        <p>Acest acord trebuie semnat de ambele părți înainte de începerea utilizării conținutului.</p>
    </section>
    
    <section id="allowed">
        <h2>6. Utilizări permise fără acord prealabil</h2>
        <p>În anumite cazuri limitate și bine definite, utilizarea conținutului Emex.ro poate fi permisă fără obținerea unui acord scris prealabil:</p>
        
        <h3>6.1 Utilizare personală</h3>
        <p>Este permisă vizualizarea, citirea și stocarea temporară a conținutului în scop strict personal și necomercial, pentru informare sau educație individuală, fără redistribuire către terți.</p>
        
        <h3>6.2 Citare academică</h3>
        <p>Utilizarea unor fragmente scurte din conținutul nostru în lucrări academice, cercetări științifice, teze de doctorat sau disertații este permisă, cu condiția respectării următoarelor cerințe:</p>
        <ul>
            <li>Fragmentele citate să nu depășească 300 de cuvinte pentru un singur articol sau 10% din conținutul total</li>
            <li>Citarea să fie însoțită de atribuirea corespunzătoare a sursei, conform standardelor academice aplicabile</li>
            <li>Utilizarea să fie în scop educațional sau de cercetare, fără beneficii comerciale directe</li>
            <li>Lucrarea în care este încorporată citarea să nu concureze cu sau să nu diminueze valoarea conținutului original</li>
        </ul>
        
        <div class="example">
            <p>Exemplu de citare academică corectă:</p>
            <p>Conform unui studiu publicat pe Emex.ro, "fragmentul de text citat" (Emex.ro, "Titlul articolului", URL, data publicării, accesat la [data accesării]).</p>
        </div>
        
        <h3>6.3 Linkuri către site-ul nostru</h3>
        <p>Este permisă crearea de linkuri simple (hyperlink) către pagini de pe Emex.ro, cu următoarele condiții:</p>
        <ul>
            <li>Linkul să direcționeze utilizatorul către pagina originală de pe Emex.ro, fără a încorpora conținutul în cadrul altui site (interzis framingul)</li>
            <li>Contextul în care apare linkul să nu sugereze nicio asociere, aprobare sau sponsorizare din partea Emex.ro, dacă acestea nu există</li>
            <li>Site-ul care conține linkul să nu promoveze activități ilegale, conținut ofensator sau care încalcă drepturi ale terților</li>
            <li>Linkul să nu fie prezentat într-un mod care să diminueze sau să afecteze negativ reputația Emex.ro</li>
        </ul>
        
        <h3>6.4 Distribuirea ocazională pe rețele sociale</h3>
        <p>Distribuirea ocazională a articolelor sau materialelor de pe Emex.ro pe platformele de social media personale este permisă, cu condiția ca:</p>
        <ul>
            <li>Distribuirea să se facă prin funcționalitățile native ale platformelor respective (butoane de share)</li>
            <li>Conținutul să nu fie modificat</li>
            <li>Sursa (Emex.ro) să fie clar menționată</li>
            <li>Distribuirea să nu fie sistematică sau în cantități mari</li>
            <li>Scopul distribuirii să nu fie comercial</li>
        </ul>
        
        <div class="warning">
            <p>Notă importantă: Utilizările menționate mai sus sunt singurele excepții permise fără acord scris prealabil. Orice altă utilizare a conținutului nostru necesită obținerea permisiunii scrise din partea Emex.ro.</p>
        </div>
    </section>
    
    <section id="forbidden">
        <h2>7. Utilizări strict interzise</h2>
        <p>Următoarele utilizări ale conținutului Emex.ro sunt strict interzise în orice circumstanțe și nu vor fi autorizate nici chiar prin acord scris:</p>
        
        <h3>7.1 Extragerea automată a datelor</h3>
        <p>Este interzisă utilizarea de software, roboți, spider-uri, crawler sau alte tehnologii automatizate pentru a:</p>
        <ul>
            <li>Extrage sistematic conținut de pe Emex.ro (web scraping)</li>
            <li>Crea baze de date derivate din conținutul nostru</li>
            <li>Monitoriza automat site-ul pentru modificări</li>
            <li>Supraîncărca serverele noastre prin cereri repetate sau masive</li>
        </ul>
        
        <h3>7.2 Utilizări dăunătoare sau ilegale</h3>
        <p>Este interzisă utilizarea conținutului nostru în contexte care:</p>
        <ul>
            <li>Promovează activități ilegale sau infracționale</li>
            <li>Încalcă drepturile fundamentale ale persoanelor</li>
            <li>Promovează ura, discriminarea sau violența</li>
            <li>Conțin materiale pornografice, ofensatoare sau nepotrivite pentru minori</li>
            <li>Promovează produse sau servicii interzise de lege</li>
            <li>Distribuie informații false sau înșelătoare</li>
        </ul>
        
        <h3>7.3 Falsificarea sau alterarea conținutului</h3>
        <p>Este interzisă:</p>
        <ul>
            <li>Modificarea conținutului nostru într-un mod care îi schimbă sensul sau acuratețea</li>
            <li>Prezentarea conținutului nostru într-un context care schimbă semnificația originală</li>
            <li>Atribuirea falsă a conținutului nostru către alte surse</li>
            <li>Eliminarea sau modificarea informațiilor despre drepturile de autor</li>
            <li>Prezentarea conținutului modificat ca fiind conținutul original Emex.ro</li>
        </ul>
        
        <h3>7.4 Utilizări comerciale neautorizate</h3>
        <p>În absența unui acord scris explicit, este interzisă utilizarea conținutului nostru în:</p>
        <ul>
            <li>Produse sau servicii comerciale</li>
            <li>Materiale publicitare sau promoționale</li>
            <li>Site-uri web care generează venituri din publicitate</li>
            <li>Cursuri, seminarii sau formări contra cost</li>
            <li>Cărți, e-book-uri sau alte publicații comerciale</li>
            <li>Aplicații mobile sau software comercial</li>
        </ul>
        
        <h3>7.5 Crearea de opere derivate neautorizate</h3>
        <p>Este interzisă:</p>
        <ul>
            <li>Traducerea conținutului în alte limbi fără permisiune</li>
            <li>Adaptarea conținutului pentru alte formate sau medii</li>
            <li>Crearea de materiale bazate substanțial pe conținutul nostru</li>
            <li>Dezvoltarea de produse sau servicii care încorporează concepte, metodologii sau date originale Emex.ro</li>
        </ul>
        
        <div class="warning">
            <p>Încălcarea acestor interdicții poate atrage răspunderea juridică și poate duce la acțiuni legale pentru recuperarea prejudiciilor cauzate, inclusiv daune financiare și măsuri pentru încetarea utilizării neautorizate.</p>
        </div>
    </section>
    
    <section id="licensing">
            <h2>8. Tipuri de licențe disponibile</h2>
            <p>În funcție de natura și scopul utilizării conținutului nostru, Emex.ro oferă mai multe tipuri de licențe personalizate:</p>
            
            <h3>8.1 Licență standard pentru utilizare non-comercială</h3>
            <p>Această licență permite utilizarea conținutului în contexte educaționale, academice, sau non-profit, cu respectarea următoarelor condiții:</p>
            <ul>
                <li>Atribuirea clară a sursei conform cerințelor noastre</li>
                <li>Utilizarea fără modificări sau cu modificări minore aprobate</li>
                <li>Fără drept de sublicențiere către terți</li>
                <li>Perioada limitată, de obicei până la 12 luni</li>
                <li>Utilizare limitată la teritoriul specificat</li>
            </ul>
            
            <h3>8.2 Licență comercială standard</h3>
            <p>Destinată organizațiilor comerciale care doresc să utilizeze conținutul nostru în scop lucrativ, această licență include:</p>
            <ul>
                <li>Dreptul de a reproduce conținutul în materiale comerciale</li>
                <li>Posibilitatea unor adaptări limitate (cu aprobare prealabilă)</li>
                <li>Distribuire limitată către audiența proprie</li>
                <li>Atribuire obligatorie</li>
                <li>Perioadă definită de utilizare</li>
                <li>Taxe și redevențe aplicabile</li>
            </ul>
            
            <h3>8.3 Licență extinsă pentru conținut premium</h3>
            <p>Pentru utilizări complexe ale conținutului nostru de înaltă valoare (studii, analize, date exclusive):</p>
            <ul>
                <li>Drepturi extinse de utilizare și adaptare</li>
                <li>Posibilitatea creării de opere derivate</li>
                <li>Utilizare multi-platformă</li>
                <li>Perioadă extinsă de utilizare</li>
                <li>Tarife personalizate în funcție de valoarea conținutului</li>
            </ul>
            
            <h3>8.4 Licență pentru republicare integrală</h3>
            <p>Pentru partenerii media care doresc să republice integral articole sau materiale Emex.ro:</p>
            <ul>
                <li>Republicare fără modificări a conținutului</li>
                <li>Atribuire proeminentă și link direct către sursa originală</li>
                <li>Obligația de a actualiza conținutul în cazul unor modificări aduse de Emex.ro</li>
                <li>Acorduri de partajare a veniturilor, dacă este cazul</li>
            </ul>
            
            <h3>8.5 Licență pentru utilizare academică</h3>
            <p>Destinată instituțiilor educaționale, cercetătorilor și studenților:</p>
            <ul>
                <li>Utilizare extinsă în contexte educaționale</li>
                <li>Posibilitatea includerii în materiale didactice</li>
                <li>Drepturi de distribuire către studenți sau participanți la cursuri</li>
                <li>Tarife reduse sau gratuități în funcție de context</li>
            </ul>
            
            <div class="info">
                <p>Pentru detalii specifice despre fiecare tip de licență, inclusiv tarifele aplicabile și procesul de solicitare, vă rugăm să contactați departamentul nostru de licențiere la <a href="mailto:licente@emex.ro">licente@emex.ro</a>.</p>
            </div>
        </section>
        
        <section id="fees">
            <h2>9. Taxe și redevențe</h2>
            <p>Utilizarea comercială a conținutului Emex.ro este supusă, în majoritatea cazurilor, unor taxe și redevențe care reflectă valoarea și originalitatea materialelor noastre.</p>
            
            <h3>9.1 Structura tarifelor</h3>
            <p>Tarifele pentru utilizarea conținutului nostru sunt stabilite pe baza următoarelor criterii:</p>
            <ul>
                <li><strong>Tipul conținutului:</strong> Articole standard, analize premium, date exclusive, materiale vizuale, etc.</li>
                <li><strong>Scopul utilizării:</strong> Comercial, educațional, non-profit, etc.</li>
                <li><strong>Durata licenței:</strong> Perioada pentru care se acordă dreptul de utilizare</li>
                <li><strong>Audiența potențială:</strong> Dimensiunea și caracteristicile publicului care va avea acces la conținut</li>
                <li><strong>Teritoriul:</strong> Zona geografică în care va fi utilizat conținutul</li>
                <li><strong>Exclusivitatea:</strong> Dacă se solicită drepturi exclusive de utilizare</li>
            </ul>
            
            <h3>9.2 Metode de plată</h3>
            <p>Acceptăm următoarele metode de plată pentru taxele de licențiere:</p>
            <ul>
                <li>Transfer bancar</li>
                <li>Plată online prin card de credit/debit</li>
                <li>Sisteme electronice de plată (PayPal, etc.)</li>
                <li>Alte metode disponibile în România</li>
            </ul>
            
            <h3>9.3 Scutiri și reduceri</h3>
            <p>În anumite situații, putem oferi scutiri sau reduceri de taxe pentru:</p>
            <ul>
                <li>Instituții educaționale și academice</li>
                <li>Organizații non-profit și caritabile</li>
                <li>Proiecte cu impact social pozitiv</li>
                <li>Studenți și cercetători individuali</li>
                <li>Parteneri strategici ai Emex.ro</li>
            </ul>
            
            <p>Solicitările pentru scutiri sau reduceri trebuie să fie însoțite de documentele justificative relevante și vor fi evaluate individual.</p>
            
            <div class="highlight">
                <p>Pentru o ofertă personalizată conform nevoilor dumneavoastră specifice, vă invităm să contactați echipa noastră de licențiere, care vă va oferi informații detaliate despre opțiunile disponibile și tarifele aplicabile.</p>
            </div>
        </section>
        
        <section id="attribution">
            <h2>10. Politica de atribuire</h2>
            <p>Atribuirea corectă și vizibilă a sursei este o condiție fundamentală pentru orice utilizare autorizată a conținutului Emex.ro.</p>
            
            <h3>10.1 Cerințe generale de atribuire</h3>
            <p>Toate formele de utilizare a conținutului nostru trebuie să includă următoarele elemente de atribuire:</p>
            <ul>
                <li>Mențiunea clară "Sursă: Emex.ro" sau "© Emex.ro"</li>
                <li>Titlul exact al materialului utilizat</li>
                <li>Data publicării originale pe Emex.ro</li>
                <li>Un link activ către pagina originală (pentru utilizări online)</li>
            </ul>
            
            <div class="example">
                <p>Exemplu de atribuire corectă pentru utilizare online:</p>
                <p>Sursă: <a href="https://www.emex.ro/titlul-articolului">Titlul articolului</a>, Emex.ro, publicat la [data], © Emex.ro 2025</p>
                
                <p>Exemplu de atribuire corectă pentru materiale tipărite:</p>
                <p>"Titlul articolului", Emex.ro, publicat la [data], © Emex.ro 2025, disponibil online la www.emex.ro/titlul-articolului</p>
            </div>
            
            <h3>10.2 Poziționarea atribuirii</h3>
            <p>Atribuirea trebuie să fie:</p>
            <ul>
                <li>Vizibilă și lizibilă fără efort</li>
                <li>Plasată în proximitatea conținutului utilizat</li>
                <li>De dimensiuni rezonabile (nu mai mici de 70% din dimensiunea textului principal)</li>
                <li>Neobscurată de alte elemente grafice sau text</li>
            </ul>
            
            <h3>10.3 Atribuirea în diferite medii</h3>
            <p>Cerințele specifice de atribuire variază în funcție de mediul în care este utilizat conținutul:</p>
            
            <h4>10.3.1 Atribuire în mediul online</h4>
            <ul>
                <li>Link activ către articolul original</li>
                <li>Metadate corecte pentru motoarele de căutare</li>
                <li>Respectarea protocoalelor rel="canonical" unde este cazul</li>
            </ul>
            
            <h4>10.3.2 Atribuire în materiale tipărite</h4>
            <ul>
                <li>Menționarea URL-ului complet pentru acces online</li>
                <li>Poziționare clară în subsolul paginii sau la finalul articolului</li>
                <li>Includerea în bibliografia sau lista de referințe</li>
            </ul>
            
            <h4>10.3.3 Atribuire în prezentări și materiale educaționale</h4>
            <ul>
                <li>Menționarea în slide-ul unde apare conținutul</li>
                <li>Includerea în lista de referințe la finalul prezentării</li>
                <li>Menționarea verbală în timpul prezentării</li>
            </ul>
            
            <h4>10.3.4 Atribuire în materiale audio-video</h4>
            <ul>
                <li>Menționare vocală în conținutul audio</li>
                <li>Text suprapus sau credit la sfârșit pentru materiale video</li>
                <li>Includere în descrierea materialului pentru platformele online</li>
            </ul>
        </section>
        
        <section id="violations">
            <h2>11. Încălcări și consecințe</h2>
            <p>Emex.ro își rezervă dreptul de a lua măsuri împotriva oricărei utilizări neautorizate a conținutului său, în conformitate cu legislația în vigoare privind proprietatea intelectuală.</p>
            
            <h3>11.1 Tipuri de încălcări</h3>
            <p>Următoarele acțiuni sunt considerate încălcări ale politicii noastre de licențiere:</p>
            <ul>
                <li>Utilizarea conținutului fără obținerea prealabilă a unui acord scris</li>
                <li>Depășirea scopului sau a condițiilor specificate în acordul de licențiere</li>
                <li>Omiterea sau insuficienta atribuire a sursei</li>
                <li>Modificarea neautorizată a conținutului</li>
                <li>Sublicențierea neautorizată a conținutului către terți</li>
                <li>Utilizarea conținutului după expirarea perioadei de licențiere</li>
                <li>Refuzul de a plăti taxele și redevențele aplicabile</li>
            </ul>
            
            <h3>11.2 Procedura în caz de încălcare</h3>
            <p>În cazul identificării unei utilizări neautorizate a conținutului nostru, vom urma următorii pași:</p>
            <ol>
                <li><strong>Notificare inițială:</strong> Partea responsabilă va primi o notificare scrisă privind încălcarea identificată, cu solicitarea de a remedia situația în termen de 5 zile lucrătoare</li>
                <li><strong>Evaluarea răspunsului:</strong> Vom analiza răspunsul primit și acțiunile întreprinse pentru remedierea situației</li>
                <li><strong>Acțiuni suplimentare:</strong> În absența unei rezolvări satisfăcătoare, vom lua măsurile legale disponibile pentru protejarea drepturilor noastre</li>
            </ol>
            
            <h3>11.3 Consecințe potențiale</h3>
            <p>Încălcarea politicii noastre de licențiere poate avea următoarele consecințe:</p>
            <ul>
                <li><strong>Acțiuni legale:</strong> Inițierea de proceduri juridice pentru încălcarea drepturilor de autor</li>
                <li><strong>Daune financiare:</strong> Solicitarea de despăgubiri pentru prejudiciile cauzate, care pot include:
                    <ul>
                        <li>Profiturile obținute din utilizarea neautorizată</li>
                        <li>Taxele de licențiere care ar fi fost datorate</li>
                        <li>Daune statutare prevăzute de legislația în vigoare</li>
                        <li>Costurile legale și administrative asociate</li>
                    </ul>
                </li>
                <li><strong>Măsuri tehnice:</strong> Utilizarea mecanismelor DMCA (Digital Millennium Copyright Act) sau echivalente pentru eliminarea conținutului</li>
                <li><strong>Notificarea platformelor:</strong> Informarea furnizorilor de servicii de hosting, rețelelor sociale sau altor intermediari despre încălcarea drepturilor de autor</li>
                <li><strong>Publicitate negativă:</strong> Menționarea publică a cazurilor grave de încălcare, conform politicilor noastre interne</li>
            </ul>
            
            <div class="warning">
                <p>Emex.ro își rezervă dreptul de a urmări toate căile legale disponibile pentru protejarea proprietății sale intelectuale. Recomandăm respectarea strictă a acestei politici de licențiere și obținerea acordurilor necesare înainte de orice utilizare a conținutului nostru.</p>
            </div>
        </section>
        
        <section id="thirdparty">
            <h2>12. Conținut aparținând terților</h2>
            <p>Emex.ro poate include în cadrul platformei sale conținut aparținând terților, utilizat cu permisiunea acestora sau sub incidența unor excepții legale.</p>
            
            <h3>12.1 Identificarea conținutului terților</h3>
            <p>Conținutul care nu aparține Emex.ro este în general identificat prin:</p>
            <ul>
                <li>Atribuiri explicite la finalul articolelor sau materialelor</li>
                <li>Watermark-uri sau alte marcaje pe materiale vizuale</li>
                <li>Mențiuni în descrierea sau metadatele conținutului</li>
            </ul>
            
            <h3>12.2 Limitări privind sublicențierea</h3>
            <p>În cazul solicitărilor de utilizare a conținutului care include materiale aparținând terților:</p>
            <ul>
                <li>Emex.ro nu poate acorda drepturi de utilizare pentru conținutul aparținând terților</li>
                <li>Solicitantul are responsabilitatea de a obține permisiunile necesare direct de la deținătorii drepturilor</li>
                <li>Orice acord încheiat cu Emex.ro se va aplica exclusiv conținutului asupra căruia deținem drepturi</li>
            </ul>
            
            <h3>12.3 Conținut sub licențe deschise</h3>
            <p>În anumite cazuri, Emex.ro poate utiliza conținut disponibil sub licențe deschise (Creative Commons, domeniu public, etc.). În aceste situații:</p>
            <ul>
                <li>Vom indica tipul de licență aplicabil</li>
                <li>Utilizatorii trebuie să respecte termenii licenței respective</li>
                <li>Atribuirea trebuie să includă atât Emex.ro, cât și sursa originală</li>
            </ul>
        </section>
        
        <section id="disclaimer">
            <h2>13. Limitarea răspunderii</h2>
            <p>În legătură cu conținutul disponibil pe platforma noastră și cu licențierea acestuia, Emex.ro face următoarele precizări privind limitarea răspunderii:</p>
            
            <h3>13.1 Acuratețea conținutului</h3>
            <p>Deși depunem toate eforturile pentru a asigura acuratețea și actualitatea informațiilor publicate:</p>
            <ul>
                <li>Conținutul este furnizat "ca atare", fără niciun fel de garanții explicite sau implicite</li>
                <li>Nu garantăm că informațiile sunt complete, exacte sau actualizate în permanență</li>
                <li>Utilizatorii sunt încurajați să verifice informațiile din surse multiple</li>
            </ul>
            
            <h3>13.2 Adecvarea pentru scopuri specifice</h3>
            <p>Emex.ro nu garantează că:</p>
            <ul>
                <li>Conținutul său va fi adecvat pentru nevoile sau scopurile specifice ale utilizatorilor</li>
                <li>Utilizarea conținutului va produce rezultatele dorite sau așteptate</li>
                <li>Conținutul va fi compatibil cu anumite platforme sau medii de utilizare</li>
            </ul>
            
            <h3>13.3 Excluderea răspunderii pentru daune</h3>
            <p>În măsura maximă permisă de lege, Emex.ro nu va fi răspunzător pentru:</p>
            <ul>
                <li>Daune directe, indirecte, incidentale, speciale sau consecutive rezultate din utilizarea sau imposibilitatea utilizării conținutului</li>
                <li>Pierderi de profit, date, reputație sau alte pierderi intangibile</li>
                <li>Întreruperi ale activității comerciale sau profesionale</li>
                <li>Costurile pentru procurarea de bunuri sau servicii substitute</li>
            </ul>
            
            <h3>13.4 Responsabilitatea utilizatorului</h3>
            <p>Utilizatorii conținutului licențiat de la Emex.ro își asumă responsabilitatea pentru:</p>
            <ul>
                <li>Evaluarea adecvării conținutului pentru scopurile proprii</li>
                <li>Respectarea tuturor legilor și reglementărilor aplicabile</li>
                <li>Obținerea tuturor permisiunilor suplimentare necesare de la terți</li>
                <li>Utilizarea conținutului într-o manieră care să nu prejudicieze Emex.ro sau terții</li>
            </ul>
            
            <div class="info">
                <p>Această limitare a răspunderii se aplică tuturor formelor de utilizare a conținutului Emex.ro, indiferent dacă acestea sunt autorizate prin acorduri scrise sau se încadrează în excepțiile permise fără acord prealabil.</p>
            </div>
        </section>
        
        <section id="modifications">
            <h2>14. Modificări ale politicii de licențiere</h2>
            <p>Emex.ro își rezervă dreptul de a actualiza și modifica periodic această politică de licențiere pentru a reflecta schimbările legislative, evoluțiile tehnologice sau modificările în practicile noastre de afaceri.</p>
            
            <h3>14.1 Procedura de modificare</h3>
            <p>Atunci când facem modificări semnificative la această politică:</p>
            <ul>
                <li>Vom publica versiunea actualizată pe această pagină</li>
                <li>Vom indica data ultimei actualizări la sfârșitul documentului</li>
                <li>Pentru modificări majore, putem notifica utilizatorii prin bannere pe site sau prin alte mijloace adecvate</li>
            </ul>
            
            <h3>14.2 Efectul asupra acordurilor existente</h3>
            <p>Modificările aduse politicii de licențiere:</p>
            <ul>
                <li>Nu vor afecta acordurile de licențiere deja încheiate, care rămân valabile conform termenilor stabiliți inițial</li>
                <li>Se vor aplica tuturor solicitărilor noi de licențiere primite după data intrării în vigoare a modificărilor</li>
                <li>Pot fi incorporate în acordurile existente doar prin acte adiționale explicite, agreate de ambele părți</li>
            </ul>
            
            <h3>14.3 Responsabilitatea utilizatorilor</h3>
            <p>Este responsabilitatea utilizatorilor să:</p>
            <ul>
                <li>Verifice periodic această pagină pentru a fi la curent cu eventualele modificări</li>
                <li>Ia la cunoștință și să respecte versiunea actualizată a politicii</li>
                <li>Contacteze departamentul nostru de licențiere în cazul în care au întrebări sau nelămuriri privind modificările efectuate</li>
            </ul>
        </section>
        
        <section id="applicable">
            <h2>15. Legea aplicabilă și jurisdicția</h2>
            <p>Această politică de licențiere și toate acordurile încheiate în baza ei sunt guvernate și interpretate în conformitate cu legislația română.</p>
            
            <h3>15.1 Legislația aplicabilă</h3>
            <p>Prevederile relevante includ, dar nu se limitează la:</p>
            <ul>
                <li>Legea nr. 8/1996 privind dreptul de autor și drepturile conexe, cu modificările și completările ulterioare</li>
                <li>Codul Civil al României</li>
                <li>Legislația Uniunii Europene aplicabilă în domeniul proprietății intelectuale</li>
                <li>Convențiile și tratatele internaționale la care România este parte</li>
            </ul>
            
            <h3>15.2 Soluționarea litigiilor</h3>
            <p>În cazul apariției unor dispute legate de interpretarea sau aplicarea acestei politici:</p>
            <ul>
                <li>Vom încerca inițial să soluționăm orice diferend pe cale amiabilă, prin negociere directă</li>
                <li>În cazul în care nu se poate ajunge la o soluție amiabilă, disputele vor fi supuse spre soluționare instanțelor judecătorești competente din România</li>
                <li>Instanțele din București vor avea competență exclusivă pentru soluționarea litigiilor, cu excepția cazurilor în care legea prevede altfel în mod imperativ</li>
            </ul>
            
            <h3>15.3 Limba oficială</h3>
            <p>În caz de discrepanțe între versiunile în diferite limbi ale acestei politici sau ale acordurilor de licențiere:</p>
            <ul>
                <li>Versiunea în limba română va prevala</li>
                <li>Toate comunicările oficiale și procedurile legale se vor desfășura în limba română</li>
                <li>Traducerile sunt furnizate doar pentru facilitarea înțelegerii și nu au valoare contractuală</li>
            </ul>
        </section>
        
        <section id="faq">
            <h2>16. Întrebări frecvente</h2>
            
            <button class="accordion">Ce se întâmplă dacă utilizez conținutul Emex.ro fără permisiune?</button>
            <div class="panel">
                <p>Utilizarea neautorizată a conținutului nostru reprezintă o încălcare a drepturilor de autor și poate atrage consecințe juridice semnificative, inclusiv acțiuni în instanță pentru daune și prejudicii. Recomandăm întotdeauna obținerea unui acord scris înainte de orice utilizare care nu se încadrează în excepțiile limitate menționate în secțiunea 6.</p>
            </div>
            
            <button class="accordion">Cât durează procesul de obținere a unei licențe?</button>
            <div class="panel">
                <p>Durata procesului variază în funcție de complexitatea solicitării și volumul de cereri în curs de procesare. În general, pentru solicitări standard, oferim un răspuns în termen de 5-10 zile lucrătoare. Pentru solicitări complexe sau care necesită negocieri suplimentare, procesul poate dura până la 3-4 săptămâni.</p>
            </div>
            
            <button class="accordion">Pot utiliza conținutul Emex.ro în teza mea de licență sau doctorat?</button>
            <div class="panel">
                <p>Utilizarea limitată a conținutului nostru în lucrări academice este permisă fără acord prealabil, cu condiția respectării cerințelor de citare corectă și a limitelor cantitative menționate în secțiunea 6.2. Pentru utilizări mai extensive, vă recomandăm să solicitați o licență academică.</p>
            </div>
            
            <button class="accordion">Este posibilă obținerea drepturilor exclusive pentru anumite materiale?</button>
            <div class="panel">
                <p>În situații excepționale, Emex.ro poate acorda drepturi exclusive pentru utilizarea anumitor materiale, pentru o perioadă limitată și în contexte specifice. Aceste solicitări sunt evaluate de la caz la caz și implică de obicei taxe suplimentare semnificative. Vă rugăm să menționați explicit în solicitarea dvs. dacă doriți drepturi exclusive.</p>
            </div>
            
            <button class="accordion">Pot traduce conținutul Emex.ro în alte limbi?</button>
            <div class="panel">
                <p>Traducerea conținutului nostru în alte limbi este considerată crearea unei opere derivate și necesită obținerea prealabilă a unui acord scris. Solicitările pentru drepturi de traducere trebuie să specifice limba țintă, contextul de utilizare și modul de distribuire a traducerii.</p>
            </div>
            
            <button class="accordion">Ce fac dacă am identificat o utilizare neautorizată a conținutului Emex.ro?</button>
            <div class="panel">
                <p>Apreciem sprijinul comunității noastre în protejarea proprietății intelectuale. Dacă observați o utilizare neautorizată a conținutului nostru, vă rugăm să ne informați la adresa <a href="mailto:copyright@emex.ro">copyright@emex.ro</a>, furnizând detalii despre cazul identificat, inclusiv URL-uri și capturi de ecran relevante.</p>
            </div>
            
            <button class="accordion">Sunt disponibile pachete sau abonamente pentru utilizare regulată?</button>
            <div class="panel">
                <p>Da, pentru organizațiile care au nevoie de acces regulat la conținutul nostru, oferim pachete și abonamente personalizate cu tarife preferențiale. Aceste soluții sunt adaptate nevoilor specifice și pot include drepturi predefinite de utilizare pentru volume mai mari de conținut.</p>
            </div>
            
            <button class="accordion">Cum trebuie să procedez în cazul în care doresc să utilizez doar o imagine de pe Emex.ro?</button>
            <div class="panel">
                <p>Imaginile de pe platforma noastră sunt protejate prin drepturi de autor în același mod ca și conținutul textual. Utilizarea lor necesită obținerea unui acord scris, cu excepția cazurilor care se încadrează în limitele utilizării permise fără autorizație. Procedura de solicitare este identică, dar vă rugăm să specificați clar imaginea dorită prin URL și o descriere vizuală.</p>
            </div>
        </section>
        
        <section id="contact">
            <h2>17. Contact</h2>
            <p>Pentru orice întrebări, solicitări sau clarificări referitoare la politica noastră de licențiere a conținutului, vă invităm să ne contactați folosind următoarele modalități:</p>
            
            <div class="contact">
                <h3>Departamentul de Licențiere Conținut</h3>
                <p>
                    <strong>Email:</strong> <a href="mailto:licente@emex.ro">licente@emex.ro</a><br>
                    <strong>Telefon:</strong> +40 XXX XXX XXX<br>
                    <strong>Program:</strong> Luni-Vineri, 09:00-17:00<br>
                    <strong>Adresă:</strong> Strada Exemplului, Nr. 123, București, Sector X, 012345, România
                </p>
                
                <h3>Pentru raportarea încălcărilor drepturilor de autor</h3>
                <p>
                    <strong>Email:</strong> <a href="mailto:copyright@emex.ro">copyright@emex.ro</a><br>
                    <strong>Telefon:</strong> +40 XXX XXX XXX<br>
                    <strong>Formular online:</strong> <a href="https://emex.ro/raportare-incalcare">Formular de raportare</a>
                </p>
                
                <h3>Pentru parteneriate media și colaborări strategice</h3>
                <p>
                    <strong>Email:</strong> <a href="mailto:parteneriate@emex.ro">parteneriate@emex.ro</a><br>
                    <strong>Telefon:</strong> +40 XXX XXX XXX
                </p>
                
                <a href="https://emex.ro/contact" class="button">Formular de contact complet</a>
            </div>
        </section>

        <section id="licensing">
            <h2>8. Tipuri de licențe disponibile</h2>
            <p>În funcție de natura și scopul utilizării conținutului nostru, Emex.ro oferă mai multe tipuri de licențe personalizate:</p>
            
            <h3>8.1 Licență standard pentru utilizare non-comercială</h3>
            <p>Această licență permite utilizarea conținutului în contexte educaționale, academice, sau non-profit, cu respectarea următoarelor condiții:</p>
            <ul>
                <li>Atribuirea clară a sursei conform cerințelor noastre</li>
                <li>Utilizarea fără modificări sau cu modificări minore aprobate</li>
                <li>Fără drept de sublicențiere către terți</li>
                <li>Perioada limitată, de obicei până la 12 luni</li>
                <li>Utilizare limitată la teritoriul specificat</li>
            </ul>
            
            <h3>8.2 Licență comercială standard</h3>
            <p>Destinată organizațiilor comerciale care doresc să utilizeze conținutul nostru în scop lucrativ, această licență include:</p>
            <ul>
                <li>Dreptul de a reproduce conținutul în materiale comerciale</li>
                <li>Posibilitatea unor adaptări limitate (cu aprobare prealabilă)</li>
                <li>Distribuire limitată către audiența proprie</li>
                <li>Atribuire obligatorie</li>
                <li>Perioadă definită de utilizare</li>
                <li>Taxe și redevențe aplicabile</li>
            </ul>
            
            <h3>8.3 Licență extinsă pentru conținut premium</h3>
            <p>Pentru utilizări complexe ale conținutului nostru de înaltă valoare (studii, analize, date exclusive):</p>
            <ul>
                <li>Drepturi extinse de utilizare și adaptare</li>
                <li>Posibilitatea creării de opere derivate</li>
                <li>Utilizare multi-platformă</li>
                <li>Perioadă extinsă de utilizare</li>
                <li>Tarife personalizate în funcție de valoarea conținutului</li>
            </ul>
            
            <h3>8.4 Licență pentru republicare integrală</h3>
            <p>Pentru partenerii media care doresc să republice integral articole sau materiale Emex.ro:</p>
            <ul>
                <li>Republicare fără modificări a conținutului</li>
                <li>Atribuire proeminentă și link direct către sursa originală</li>
                <li>Obligația de a actualiza conținutul în cazul unor modificări aduse de Emex.ro</li>
                <li>Acorduri de partajare a veniturilor, dacă este cazul</li>
            </ul>
            
            <h3>8.5 Licență pentru utilizare academică</h3>
            <p>Destinată instituțiilor educaționale, cercetătorilor și studenților:</p>
            <ul>
                <li>Utilizare extinsă în contexte educaționale</li>
                <li>Posibilitatea includerii în materiale didactice</li>
                <li>Drepturi de distribuire către studenți sau participanți la cursuri</li>
                <li>Tarife reduse sau gratuități în funcție de context</li>
            </ul>
            
            <div class="info">
                <p>Pentru detalii specifice despre fiecare tip de licență, inclusiv tarifele aplicabile și procesul de solicitare, vă rugăm să contactați departamentul nostru de licențiere la <a href="mailto:licente@emex.ro">licente@emex.ro</a>.</p>
            </div>
        </section>
        
        <section id="fees">
            <h2>9. Taxe și redevențe</h2>
            <p>Utilizarea comercială a conținutului Emex.ro este supusă, în majoritatea cazurilor, unor taxe și redevențe care reflectă valoarea și originalitatea materialelor noastre.</p>
            
            <h3>9.1 Structura tarifelor</h3>
            <p>Tarifele pentru utilizarea conținutului nostru sunt stabilite pe baza următoarelor criterii:</p>
            <ul>
                <li><strong>Tipul conținutului:</strong> Articole standard, analize premium, date exclusive, materiale vizuale, etc.</li>
                <li><strong>Scopul utilizării:</strong> Comercial, educațional, non-profit, etc.</li>
                <li><strong>Durata licenței:</strong> Perioada pentru care se acordă dreptul de utilizare</li>
                <li><strong>Audiența potențială:</strong> Dimensiunea și caracteristicile publicului care va avea acces la conținut</li>
                <li><strong>Teritoriul:</strong> Zona geografică în care va fi utilizat conținutul</li>
                <li><strong>Exclusivitatea:</strong> Dacă se solicită drepturi exclusive de utilizare</li>
            </ul>
            
            <h3>9.2 Metode de plată</h3>
            <p>Acceptăm următoarele metode de plată pentru taxele de licențiere:</p>
            <ul>
                <li>Transfer bancar</li>
                <li>Plată online prin card de credit/debit</li>
                <li>Sisteme electronice de plată (PayPal, etc.)</li>
                <li>Alte metode disponibile în România</li>
            </ul>
            
            <h3>9.3 Scutiri și reduceri</h3>
            <p>În anumite situații, putem oferi scutiri sau reduceri de taxe pentru:</p>
            <ul>
                <li>Instituții educaționale și academice</li>
                <li>Organizații non-profit și caritabile</li>
                <li>Proiecte cu impact social pozitiv</li>
                <li>Studenți și cercetători individuali</li>
                <li>Parteneri strategici ai Emex.ro</li>
            </ul>
            
            <p>Solicitările pentru scutiri sau reduceri trebuie să fie însoțite de documentele justificative relevante și vor fi evaluate individual.</p>
            
            <div class="highlight">
                <p>Pentru o ofertă personalizată conform nevoilor dumneavoastră specifice, vă invităm să contactați echipa noastră de licențiere, care vă va oferi informații detaliate despre opțiunile disponibile și tarifele aplicabile.</p>
            </div>
        </section>
        
        <section id="attribution">
            <h2>10. Politica de atribuire</h2>
            <p>Atribuirea corectă și vizibilă a sursei este o condiție fundamentală pentru orice utilizare autorizată a conținutului Emex.ro.</p>
            
            <h3>10.1 Cerințe generale de atribuire</h3>
            <p>Toate formele de utilizare a conținutului nostru trebuie să includă următoarele elemente de atribuire:</p>
            <ul>
                <li>Mențiunea clară "Sursă: Emex.ro" sau "© Emex.ro"</li>
                <li>Titlul exact al materialului utilizat</li>
                <li>Data publicării originale pe Emex.ro</li>
                <li>Un link activ către pagina originală (pentru utilizări online)</li>
            </ul>
            
            <div class="example">
                <p>Exemplu de atribuire corectă pentru utilizare online:</p>
                <p>Sursă: <a href="https://www.emex.ro/titlul-articolului">Titlul articolului</a>, Emex.ro, publicat la [data], © Emex.ro 2025</p>
                
                <p>Exemplu de atribuire corectă pentru materiale tipărite:</p>
                <p>"Titlul articolului", Emex.ro, publicat la [data], © Emex.ro 2025, disponibil online la www.emex.ro/titlul-articolului</p>
            </div>
            
            <h3>10.2 Poziționarea atribuirii</h3>
            <p>Atribuirea trebuie să fie:</p>
            <ul>
                <li>Vizibilă și lizibilă fără efort</li>
                <li>Plasată în proximitatea conținutului utilizat</li>
                <li>De dimensiuni rezonabile (nu mai mici de 70% din dimensiunea textului principal)</li>
                <li>Neobscurată de alte elemente grafice sau text</li>
            </ul>
            
            <h3>10.3 Atribuirea în diferite medii</h3>
            <p>Cerințele specifice de atribuire variază în funcție de mediul în care este utilizat conținutul:</p>
            
            <h4>10.3.1 Atribuire în mediul online</h4>
            <ul>
                <li>Link activ către articolul original</li>
                <li>Metadate corecte pentru motoarele de căutare</li>
                <li>Respectarea protocoalelor rel="canonical" unde este cazul</li>
            </ul>
            
            <h4>10.3.2 Atribuire în materiale tipărite</h4>
            <ul>
                <li>Menționarea URL-ului complet pentru acces online</li>
                <li>Poziționare clară în subsolul paginii sau la finalul articolului</li>
                <li>Includerea în bibliografia sau lista de referințe</li>
            </ul>
            
            <h4>10.3.3 Atribuire în prezentări și materiale educaționale</h4>
            <ul>
                <li>Menționarea în slide-ul unde apare conținutul</li>
                <li>Includerea în lista de referințe la finalul prezentării</li>
                <li>Menționarea verbală în timpul prezentării</li>
            </ul>
            
            <h4>10.3.4 Atribuire în materiale audio-video</h4>
            <ul>
                <li>Menționare vocală în conținutul audio</li>
                <li>Text suprapus sau credit la sfârșit pentru materiale video</li>
                <li>Includere în descrierea materialului pentru platformele online</li>
            </ul>
        </section>
        
        <section id="violations">
            <h2>11. Încălcări și consecințe</h2>
            <p>Emex.ro își rezervă dreptul de a lua măsuri împotriva oricărei utilizări neautorizate a conținutului său, în conformitate cu legislația în vigoare privind proprietatea intelectuală.</p>
            
            <h3>11.1 Tipuri de încălcări</h3>
            <p>Următoarele acțiuni sunt considerate încălcări ale politicii noastre de licențiere:</p>
            <ul>
                <li>Utilizarea conținutului fără obținerea prealabilă a unui acord scris</li>
                <li>Depășirea scopului sau a condițiilor specificate în acordul de licențiere</li>
                <li>Omiterea sau insuficienta atribuire a sursei</li>
                <li>Modificarea neautorizată a conținutului</li>
                <li>Sublicențierea neautorizată a conținutului către terți</li>
                <li>Utilizarea conținutului după expirarea perioadei de licențiere</li>
                <li>Refuzul de a plăti taxele și redevențele aplicabile</li>
            </ul>
            
            <h3>11.2 Procedura în caz de încălcare</h3>
            <p>În cazul identificării unei utilizări neautorizate a conținutului nostru, vom urma următorii pași:</p>
            <ol>
                <li><strong>Notificare inițială:</strong> Partea responsabilă va primi o notificare scrisă privind încălcarea identificată, cu solicitarea de a remedia situația în termen de 5 zile lucrătoare</li>
                <li><strong>Evaluarea răspunsului:</strong> Vom analiza răspunsul primit și acțiunile întreprinse pentru remedierea situației</li>
                <li><strong>Acțiuni suplimentare:</strong> În absența unei rezolvări satisfăcătoare, vom lua măsurile legale disponibile pentru protejarea drepturilor noastre</li>
            </ol>
            
            <h3>11.3 Consecințe potențiale</h3>
            <p>Încălcarea politicii noastre de licențiere poate avea următoarele consecințe:</p>
            <ul>
                <li><strong>Acțiuni legale:</strong> Inițierea de proceduri juridice pentru încălcarea drepturilor de autor</li>
                <li><strong>Daune financiare:</strong> Solicitarea de despăgubiri pentru prejudiciile cauzate, care pot include:
                    <ul>
                        <li>Profiturile obținute din utilizarea neautorizată</li>
                        <li>Taxele de licențiere care ar fi fost datorate</li>
                        <li>Daune statutare prevăzute de legislația în vigoare</li>
                        <li>Costurile legale și administrative asociate</li>
                    </ul>
                </li>
                <li><strong>Măsuri tehnice:</strong> Utilizarea mecanismelor DMCA (Digital Millennium Copyright Act) sau echivalente pentru eliminarea conținutului</li>
                <li><strong>Notificarea platformelor:</strong> Informarea furnizorilor de servicii de hosting, rețelelor sociale sau altor intermediari despre încălcarea drepturilor de autor</li>
                <li><strong>Publicitate negativă:</strong> Menționarea publică a cazurilor grave de încălcare, conform politicilor noastre interne</li>
            </ul>
            
            <div class="warning">
                <p>Emex.ro își rezervă dreptul de a urmări toate căile legale disponibile pentru protejarea proprietății sale intelectuale. Recomandăm respectarea strictă a acestei politici de licențiere și obținerea acordurilor necesare înainte de orice utilizare a conținutului nostru.</p>
            </div>
        </section>
        
        <section id="thirdparty">
            <h2>12. Conținut aparținând terților</h2>
            <p>Emex.ro poate include în cadrul platformei sale conținut aparținând terților, utilizat cu permisiunea acestora sau sub incidența unor excepții legale.</p>
            
            <h3>12.1 Identificarea conținutului terților</h3>
            <p>Conținutul care nu aparține Emex.ro este în general identificat prin:</p>
            <ul>
                <li>Atribuiri explicite la finalul articolelor sau materialelor</li>
                <li>Watermark-uri sau alte marcaje pe materiale vizuale</li>
                <li>Mențiuni în descrierea sau metadatele conținutului</li>
            </ul>
            
            <h3>12.2 Limitări privind sublicențierea</h3>
            <p>În cazul solicitărilor de utilizare a conținutului care include materiale aparținând terților:</p>
            <ul>
                <li>Emex.ro nu poate acorda drepturi de utilizare pentru conținutul aparținând terților</li>
                <li>Solicitantul are responsabilitatea de a obține permisiunile necesare direct de la deținătorii drepturilor</li>
                <li>Orice acord încheiat cu Emex.ro se va aplica exclusiv conținutului asupra căruia deținem drepturi</li>
            </ul>
            
            <h3>12.3 Conținut sub licențe deschise</h3>
            <p>În anumite cazuri, Emex.ro poate utiliza conținut disponibil sub licențe deschise (Creative Commons, domeniu public, etc.). În aceste situații:</p>
            <ul>
                <li>Vom indica tipul de licență aplicabil</li>
                <li>Utilizatorii trebuie să respecte termenii licenței respective</li>
                <li>Atribuirea trebuie să includă atât Emex.ro, cât și sursa originală</li>
            </ul>
        </section>
        
        <section id="disclaimer">
            <h2>13. Limitarea răspunderii</h2>
            <p>În legătură cu conținutul disponibil pe platforma noastră și cu licențierea acestuia, Emex.ro face următoarele precizări privind limitarea răspunderii:</p>
            
            <h3>13.1 Acuratețea conținutului</h3>
            <p>Deși depunem toate eforturile pentru a asigura acuratețea și actualitatea informațiilor publicate:</p>
            <ul>
                <li>Conținutul este furnizat "ca atare", fără niciun fel de garanții explicite sau implicite</li>
                <li>Nu garantăm că informațiile sunt complete, exacte sau actualizate în permanență</li>
                <li>Utilizatorii sunt încurajați să verifice informațiile din surse multiple</li>
            </ul>
            
            <h3>13.2 Adecvarea pentru scopuri specifice</h3>
            <p>Emex.ro nu garantează că:</p>
            <ul>
                <li>Conținutul său va fi adecvat pentru nevoile sau scopurile specifice ale utilizatorilor</li>
                <li>Utilizarea conținutului va produce rezultatele dorite sau așteptate</li>
                <li>Conținutul va fi compatibil cu anumite platforme sau medii de utilizare</li>
            </ul>
            
            <h3>13.3 Excluderea răspunderii pentru daune</h3>
            <p>În măsura maximă permisă de lege, Emex.ro nu va fi răspunzător pentru:</p>
            <ul>
                <li>Daune directe, indirecte, incidentale, speciale sau consecutive rezultate din utilizarea sau imposibilitatea utilizării conținutului</li>
                <li>Pierderi de profit, date, reputație sau alte pierderi intangibile</li>
                <li>Întreruperi ale activității comerciale sau profesionale</li>
                <li>Costurile pentru procurarea de bunuri sau servicii substitute</li>
            </ul>
            
            <h3>13.4 Responsabilitatea utilizatorului</h3>
            <p>Utilizatorii conținutului licențiat de la Emex.ro își asumă responsabilitatea pentru:</p>
            <ul>
                <li>Evaluarea adecvării conținutului pentru scopurile proprii</li>
                <li>Respectarea tuturor legilor și reglementărilor aplicabile</li>
                <li>Obținerea tuturor permisiunilor suplimentare necesare de la terți</li>
                <li>Utilizarea conținutului într-o manieră care să nu prejudicieze Emex.ro sau terții</li>
            </ul>
            
            <div class="info">
                <p>Această limitare a răspunderii se aplică tuturor formelor de utilizare a conținutului Emex.ro, indiferent dacă acestea sunt autorizate prin acorduri scrise sau se încadrează în excepțiile permise fără acord prealabil.</p>
            </div>
        </section>
        
        <section id="modifications">
            <h2>14. Modificări ale politicii de licențiere</h2>
            <p>Emex.ro își rezervă dreptul de a actualiza și modifica periodic această politică de licențiere pentru a reflecta schimbările legislative, evoluțiile tehnologice sau modificările în practicile noastre de afaceri.</p>
            
            <h3>14.1 Procedura de modificare</h3>
            <p>Atunci când facem modificări semnificative la această politică:</p>
            <ul>
                <li>Vom publica versiunea actualizată pe această pagină</li>
                <li>Vom indica data ultimei actualizări la sfârșitul documentului</li>
                <li>Pentru modificări majore, putem notifica utilizatorii prin bannere pe site sau prin alte mijloace adecvate</li>
            </ul>
            
            <h3>14.2 Efectul asupra acordurilor existente</h3>
            <p>Modificările aduse politicii de licențiere:</p>
            <ul>
                <li>Nu vor afecta acordurile de licențiere deja încheiate, care rămân valabile conform termenilor stabiliți inițial</li>
                <li>Se vor aplica tuturor solicitărilor noi de licențiere primite după data intrării în vigoare a modificărilor</li>
                <li>Pot fi incorporate în acordurile existente doar prin acte adiționale explicite, agreate de ambele părți</li>
            </ul>
            
            <h3>14.3 Responsabilitatea utilizatorilor</h3>
            <p>Este responsabilitatea utilizatorilor să:</p>
            <ul>
                <li>Verifice periodic această pagină pentru a fi la curent cu eventualele modificări</li>
                <li>Ia la cunoștință și să respecte versiunea actualizată a politicii</li>
                <li>Contacteze departamentul nostru de licențiere în cazul în care au întrebări sau nelămuriri privind modificările efectuate</li>
            </ul>
        </section>
        
        <section id="applicable">
            <h2>15. Legea aplicabilă și jurisdicția</h2>
            <p>Această politică de licențiere și toate acordurile încheiate în baza ei sunt guvernate și interpretate în conformitate cu legislația română.</p>
            
            <h3>15.1 Legislația aplicabilă</h3>
            <p>Prevederile relevante includ, dar nu se limitează la:</p>
            <ul>
                <li>Legea nr. 8/1996 privind dreptul de autor și drepturile conexe, cu modificările și completările ulterioare</li>
                <li>Codul Civil al României</li>
                <li>Legislația Uniunii Europene aplicabilă în domeniul proprietății intelectuale</li>
                <li>Convențiile și tratatele internaționale la care România este parte</li>
            </ul>
            
            <h3>15.2 Soluționarea litigiilor</h3>
            <p>În cazul apariției unor dispute legate de interpretarea sau aplicarea acestei politici:</p>
            <ul>
                <li>Vom încerca inițial să soluționăm orice diferend pe cale amiabilă, prin negociere directă</li>
                <li>În cazul în care nu se poate ajunge la o soluție amiabilă, disputele vor fi supuse spre soluționare instanțelor judecătorești competente din România</li>
                <li>Instanțele din București vor avea competență exclusivă pentru soluționarea litigiilor, cu excepția cazurilor în care legea prevede altfel în mod imperativ</li>
            </ul>
            
            <h3>15.3 Limba oficială</h3>
            <p>În caz de discrepanțe între versiunile în diferite limbi ale acestei politici sau ale acordurilor de licențiere:</p>
            <ul>
                <li>Versiunea în limba română va prevala</li>
                <li>Toate comunicările oficiale și procedurile legale se vor desfășura în limba română</li>
                <li>Traducerile sunt furnizate doar pentru facilitarea înțelegerii și nu au valoare contractuală</li>
            </ul>
        </section>
        
        <section id="faq">
            <h2>16. Întrebări frecvente</h2>
            
            <button class="accordion">Ce se întâmplă dacă utilizez conținutul Emex.ro fără permisiune?</button>
            <div class="panel">
                <p>Utilizarea neautorizată a conținutului nostru reprezintă o încălcare a drepturilor de autor și poate atrage consecințe juridice semnificative, inclusiv acțiuni în instanță pentru daune și prejudicii. Recomandăm întotdeauna obținerea unui acord scris înainte de orice utilizare care nu se încadrează în excepțiile limitate menționate în secțiunea 6.</p>
            </div>
            
            <button class="accordion">Cât durează procesul de obținere a unei licențe?</button>
            <div class="panel">
                <p>Durata procesului variază în funcție de complexitatea solicitării și volumul de cereri în curs de procesare. În general, pentru solicitări standard, oferim un răspuns în termen de 5-10 zile lucrătoare. Pentru solicitări complexe sau care necesită negocieri suplimentare, procesul poate dura până la 3-4 săptămâni.</p>
            </div>
            
            <button class="accordion">Pot utiliza conținutul Emex.ro în teza mea de licență sau doctorat?</button>
            <div class="panel">
                <p>Utilizarea limitată a conținutului nostru în lucrări academice este permisă fără acord prealabil, cu condiția respectării cerințelor de citare corectă și a limitelor cantitative menționate în secțiunea 6.2. Pentru utilizări mai extensive, vă recomandăm să solicitați o licență academică.</p>
            </div>
            
            <button class="accordion">Este posibilă obținerea drepturilor exclusive pentru anumite materiale?</button>
            <div class="panel">
                <p>În situații excepționale, Emex.ro poate acorda drepturi exclusive pentru utilizarea anumitor materiale, pentru o perioadă limitată și în contexte specifice. Aceste solicitări sunt evaluate de la caz la caz și implică de obicei taxe suplimentare semnificative. Vă rugăm să menționați explicit în solicitarea dvs. dacă doriți drepturi exclusive.</p>
            </div>
            
            <button class="accordion">Pot traduce conținutul Emex.ro în alte limbi?</button>
            <div class="panel">
                <p>Traducerea conținutului nostru în alte limbi este considerată crearea unei opere derivate și necesită obținerea prealabilă a unui acord scris. Solicitările pentru drepturi de traducere trebuie să specifice limba țintă, contextul de utilizare și modul de distribuire a traducerii.</p>
            </div>
            
            <button class="accordion">Ce fac dacă am identificat o utilizare neautorizată a conținutului Emex.ro?</button>
            <div class="panel">
                <p>Apreciem sprijinul comunității noastre în protejarea proprietății intelectuale. Dacă observați o utilizare neautorizată a conținutului nostru, vă rugăm să ne informați la adresa <a href="mailto:copyright@emex.ro">copyright@emex.ro</a>, furnizând detalii despre cazul identificat, inclusiv URL-uri și capturi de ecran relevante.</p>
            </div>
            
            <button class="accordion">Sunt disponibile pachete sau abonamente pentru utilizare regulată?</button>
            <div class="panel">
                <p>Da, pentru organizațiile care au nevoie de acces regulat la conținutul nostru, oferim pachete și abonamente personalizate cu tarife preferențiale. Aceste soluții sunt adaptate nevoilor specifice și pot include drepturi predefinite de utilizare pentru volume mai mari de conținut.</p>
            </div>
            
            <button class="accordion">Cum trebuie să procedez în cazul în care doresc să utilizez doar o imagine de pe Emex.ro?</button>
            <div class="panel">
                <p>Imaginile de pe platforma noastră sunt protejate prin drepturi de autor în același mod ca și conținutul textual. Utilizarea lor necesită obținerea unui acord scris, cu excepția cazurilor care se încadrează în limitele utilizării permise fără autorizație. Procedura de solicitare este identică, dar vă rugăm să specificați clar imaginea dorită prin URL și o descriere vizuală.</p>
            </div>
        </section>
        
        <section id="contact">
            <h2>17. Contact</h2>
            <p>Pentru orice întrebări, solicitări sau clarificări referitoare la politica noastră de licențiere a conținutului, vă invităm să ne contactați folosind următoarele modalități:</p>
            
            <div class="contact">
                <h3>Departamentul de Licențiere Conținut</h3>
                <p>
                    <strong>Email:</strong> <a href="mailto:licente@emex.ro">licente@emex.ro</a><br>
                    <strong>Telefon:</strong> +40 XXX XXX XXX<br>
                    <strong>Program:</strong> Luni-Vineri, 09:00-17:00<br>
                    <strong>Adresă:</strong> Strada Exemplului, Nr. 123, București, Sector X, 012345, România
                </p>
                
                <h3>Pentru raportarea încălcărilor drepturilor de autor</h3>
                <p>
                    <strong>Email:</strong> <a href="mailto:copyright@emex.ro">copyright@emex.ro</a><br>
                    <strong>Telefon:</strong> +40 XXX XXX XXX<br>
                    <strong>Formular online:</strong> <a href="https://emex.ro/raportare-incalcare">Formular de raportare</a>
                </p>
                
                <h3>Pentru parteneriate media și colaborări strategice</h3>
                <p>
                    <strong>Email:</strong> <a href="mailto:parteneriate@emex.ro">parteneriate@emex.ro</a><br>
                    <strong>Telefon:</strong> +40 XXX XXX XXX
                </p>
                
                <a href="https://emex.ro/contact" class="button">Formular de contact complet</a>
            </div>
        </section>

        {{-- <footer class="footer">
            <p>© 2025 Emex.ro. Toate drepturile rezervate.</p>
            <p>Ultima actualizare a politicii de licențiere: 24 Aprilie 2025</p>
            <p>
                <a href="https://emex.ro/termeni-si-conditii">Termeni și condiții</a> |
                <a href="https://emex.ro/politica-de-confidentialitate">Politica de confidențialitate</a> |
                <a href="https://emex.ro/cookies">Politica de cookies</a> |
                <a href="https://emex.ro/contact">Contact</a>
            </p>
        </footer> --}}
        
        <script>
            // Script pentru funcționalitatea acordeon (Întrebări frecvente)
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
        </script>

</div>

@endsection