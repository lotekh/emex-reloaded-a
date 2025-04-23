@extends('layout.layout')

@section('seo')
<title>Licență Conținut - Emex.ro</title>
<style>
    /* body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        color: #333;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
    } */

    .big-div-licentiere{
        font-family: Arial, sans-serif;
        line-height: 1.6;
        color: #333;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
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
        color: #1a4977 !important;
        font-size: 2.2em;
        margin-bottom: 10px;
    }
    h2 {
        color: #1a4977;
        font-size: 1.8em;
        margin-top: 35px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }
    h3 {
        color: #1a4977;
        font-size: 1.3em;
        margin-top: 25px;
        margin-bottom: 15px;
    }
    h4 {
        color: #1a4977;
        font-size: 1.1em;
        margin-top: 20px;
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
        border-left: 4px solid #1a4977;
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
        color: #1a4977;
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
        color: #1a4977 !important;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    .button {
        display: inline-block;
        background-color: #1a4977;
        color: white;
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
        list-style-type: none;
        padding-left: 15px;
    }
    .toc ul li {
        margin-bottom: 8px;
    }
    .example {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 5px;
        margin: 15px 0;
        font-family: Consolas, Monaco, 'Andale Mono', monospace;
        font-size: 0.9em;
    }
</style>
@endsection



@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Politica de Licentiere</li></ul>
@endsection


@section('content')


<main>
<div class="big-div-licentiere">
    <div class="header-licentiere">
        <h1>Licență Conținut - Emex.ro</h1>
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
        <p>În funcție de natura și scopul utilizării conținutului nostru, Emex.ro ofer
        </p>
    </section>

</div>

@endsection


