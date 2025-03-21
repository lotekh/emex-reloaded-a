@extends('layout.layout')

@section('seo')
<title>Termeni si Conditii de Utilizarea a Site-ului Emex</title>
<meta name="keywords" content="termeni si conditii, comenzi on-line Emex, conditii utilizare magazin">
<meta name="description" content="Termenii si conditiile de utilizare a magazinului on-line Emex by Romtehnochim - producator de pardoseli, vopsele, lacuri si grunduri, tencuieli">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Termeni si conditii Emex">
<meta property="og:image" content="https://emex.ro/images/social/Termeni-si-conditii-sm.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Termeni-si-conditii-sm.jpg" />
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="628"/>
<meta property="og:image:alt" content="Termeni si conditii Emex by Romtehnochim"/>
<meta property="og:description" content="Pentru logarea si accesul la serviciile site-ului Emex, in cele mai bune conditii, se recomanda citirea atenta a tuturor termenilor si conditiilor.">
<meta property="og:url" content="https://emex.ro/termeni-si-conditii">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website"/>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/tabs.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class=" -ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Termeni si Conditii</li></ul>
@endsection


@section('content')

<div class="hidden-xs">
    <div class="header_img_bg" id="term_cond_header" style="background-image: url('{{ asset('resources/images/Termeni-si-conditii.jpg') }}');">
        <div class="hibc">
            <div class="hibcsc">
                <h1>
                    TERMENI SI CONDITII
                    <br>
                    DE UTILIZAREA A SITE-ULUI EMEX
                </h1>
            </div>
        </div>
    </div>
</div>

<div class="main-container product-page mt-32" id="product_container">
    <div class="mt-16 mt-custom">
        <div class="tabs-selector-row">
            <button type="button" name="current_tab" value="0" role="tab" class="btn user-valid valid selected"  aria-selected="true" tabindex="0" onclick="openTab(event, 'Pagina1')"><span>Pagina 1</span></button>
            <button type="button" name="current_tab" value="1" role="tab" class="btn user-valid valid"  aria-selected="false" tabindex="0" onclick="openTab(event, 'Pagina2')"><span>Pagina 2</span></button>
            <button type="button" name="current_tab" value="2" role="tab" class="btn user-valid valid"  aria-selected="false" tabindex="0" onclick="openTab(event, 'Pagina3')"><span>Pagina 3</span></button>
            <button type="button" name="current_tab" value="3" role="tab" class="btn user-valid valid"  aria-selected="false" tabindex="0" onclick="openTab(event, 'Pagina4')"><span>Pagina 4</span></button>
        </div>

        <div class="tab-content-container">
            <div id="Pagina1" class="tab-content active">
                <div class="tab-pane" id="ap">
                    <p>
                        <span class="alineat_span"></span>Site-ul <a href="https://emex.ro/index" title="Emex by Romtehnochim"><span class="link_color1"><em>www.emex.ro</em></span></a>, este proprietatea Romtehnochim s.r.l. Acest document stabileste termenii si conditiile in care puteti utiliza site-ul www.emex.ro, numit generic in continuare <strong>&#8220;EMEX&#8221;</strong>.<br>
                        <span class="alineat_span"></span>Accesul si utilizarea site-ului <strong>&#8220;EMEX&#8221;</strong> se face sub autoritatea acestor reguli, in termenii si conditiile de mai jos. Utilizarea site-ului, logarea si accesul la alte servicii, presupune implicit acceptarea acestor termeni si conditii, cu toate consecintele care decurg din acceptarea acestora.<br>
                        <span class="alineat_span"></span>Prin termenul <strong>&#8220;utilizator&#8221;</strong> se intelege orice persoana fizica sau juridica ce va accesa acest site.
                    </p>
                    <h2 class="h2-style">1. ELEMENTE DEFINITORII</h2>
                    <div class="descript_par">
                        <p><span class="alineat_span"></span>Folosirea acestui site, implica acceptarea termenilor si conditilor prezentate in prezentul document. Pentru folosirea in cele mai bune conditii a site-ului, se recomanda citirea cu atentie a tuturor termenilor si conditiilor.</p>
                        <p><span class="alineat_span"></span><strong>Site</strong> - reprezinta website-ul internet apartinand Romtehnochim s.r.l., care se afla la adresa <a href="https://emex.ro/index" title="Emex by Romtehnochim"><span class="link_color1"><em>www.emex.ro</em></span></a>, prin intermediul caruia <em>utilizatorul</em> are acces la informatii privind produsele oferite de catre Romtehnochim s.r.l.<br>
                            <span class="alineat_span"></span><strong>Cumparator</strong> - persoana, firma, compania sau alta entitate juridica, ce emite o <em>Comanda</em> si care a acceptat <em>&#8220;Termenii si conditiile&#8221;</em> prezentului site.<br>
                            <span class="alineat_span"></span><strong>Vanzator</strong> - societatea comerciala Romtehnochim s.r.l., avand sediul in Jilava, str. Steaua Sudului, nr. 22, cod postal 077120, nr. de inregistrare la Registrul Comertului: J40/21214/1993 si CIF RO4643777.<br>
                            <span class="alineat_span"></span><strong>Bunuri</strong> - orice produs mentionat in <em>Comanda</em>, care se regaseste prezentat pe site si care urmeaza a fi livrat de catre <em>Vanzator</em>, <em>Cumparatorului</em>.<br>
                            <span class="alineat_span"></span><strong>Comanda</strong> - un document electronic (eMail), scris, scanat, trimis prin fax, sau sub orice alt format, ce intervine ca forma de comunicare intre Vanzator si Cumparator, prin care Vanzatorul este de acord sa livreze Bunurile, si Cumparatorul este de acord sa primeasca aceste Bunuri si sa faca plata acestora.<br>
                            <span class="alineat_span"></span><strong>Contract</strong> - Orice Comanda confirmata de catre Vanzator, se supune conditiilor contractuale stipulate pe factura, sau intr-un contract separat.<br>
                            <span class="alineat_span"></span><strong>Specificatii</strong> - toate specificatiile si/ sau descrierile Bunurilor asa cum sunt precizate in Comanda.<br>
                            <span class="alineat_span"></span><strong>Drepturi de Proprietate Intelectuala</strong> (in cele ce urmeaza DPI) - toate drepturile imateriale, cum ar fi know-how, dreptul de autor si drepturi in natura de autor, drepturile de baza de date, drepturi de proiectare, drepturi de model, patente, marci inregistrate si inregistrari ale numelor de domenii pentru oricare din cele de mai sus.
                        </p>
                        <h2 class="h2-style">2. DOCUMENTE CONTRACTUALE</h2>
                        <p><span class="alineat_span"></span>Prin lansarea unei comenzi electronice, telefonice, sau prin orice alte cai, pentru site-ul anterior mentionat, Cumparatorul este de acord cu forma de comunicare <em>prin e-mail sau telefonic</em> prin care Vanzatorul isi deruleaza operatiunile. Comanda va fi compusa din urmatoarele documente, in ordinea importantei:<br>
                            <span class="alineat_span"></span><strong>a. Comanda</strong> (impreuna cu mentiunile clare asupra datelor de livrare si facturare) si conditiile sale specifice.<br>
                            <span class="alineat_span"></span><strong>b. Specificatiile Cumparatorului</strong> (acolo unde este cazul).<br>
                            <span class="alineat_span"></span>Daca Vanzatorul confirma comanda, acest lucru va implica o acceptare completa a termenilor Comenzii. Acceptarea comenzii de catre Vanzator se considera finalizata atunci cand exista o confirmare verbala (telefonica), sau electronica (e-mail), din partea Vanzatorului catre Cumparator, fara a necesita o confirmare de primire din partea acestuia. Termenii si conditiile generale de vanzare vor sta la baza Contractului astfel incheiat, in completarea acestora fiind Certificatul de Conformitate emis de catre Vanzator.
                        </p>
                        <h2 class="h2-style">3. FACTURARE - plati si livrare</h2>
                        <p><span class="alineat_span"></span><strong>Pretul, modalitatea de plata si termenul de plata</strong> sunt specificate in Comanda, sau in Oferta trimisa de catre Vanzator. In mod curent, sistemul agreat este plata <em>Facturii Proforma</em>, confirmarea acestei plati, urmata de predarea marfurilor catre curierul agreat, in urmatoarele 24 de ore.<br>
                            <span class="alineat_span"></span><strong>Livrare</strong> - vanzatorul se obliga sa expedieze Bunurile in sistem de curierat door-to-door catre Cumparator. La livrare, Vanzatorul va emite catre Cumparator o Factura Fiscala pentru Bunurile livrate, obligatia Cumparatorului fiind sa furnizeze toate informatiile necesare emiterii facturii conform cu legislatia in vigoare.<br>
                            <span class="alineat_span"></span><strong>Transport / Ambalare</strong> - Vanzatorul se descarca de riscurile si responsabilitatile asociate cu Bunurile, in momentul predarii acestora catre vanzatorul de curierat intern cu care Vanzatorul colaboreaza, sau catre reprezentantul Cumparatorului. Vanzatorul va asigura ambalarea corespunzatoare a Bunurilor si va asigura transmiterea documentelor insotitoare.<br>
                            <span class="alineat_span"></span>Vanzatorul nu are obligatia implicita de a asigura tranportul bunurilor. Toate preturile comunicate de vanzator, reprezinta preturi ex-works, iar in cazul in care vanzatorul nu poate asigura transportul, din diverse cauze, acesta nu poate fi tras la raspundere pentru nelivrarea produselor.<br>
                            <span class="alineat_span"></span><strong>Plata transportului</strong> este in sarcina cumparatorului.
                        </p>
                        <h2 class="h2-style">4. LIMITAREA RASPUNDERII</h2>
                        <p><span class="alineat_span"></span>Imaginile sunt prezentate pe site cu titlu orientativ, si pot fi modificate oricand fara o comunicare prealabila. Produsele livrate pot diferi de imaginile prezentate in orice mod, datorita diferentelor inerente care pot sa apara intre poze si realitate, cat si datorita unor modificari de design ale site-ului, sau de prezentare a etichetelor, functie de modificarile legislatiei.<br>
                            <span class="alineat_span"></span>Romtehnochim s.r.l. isi rezerva dreptul sa completeze sau sa modifice orice informatie de pe site.<br>
                            <span class="alineat_span"></span>Romtehnochim s.r.l. nu raspunde pentru prejudiciile create ca urmare a nefunctionarii site-ului.<br>
                            <span class="alineat_span"></span>Valoarea maxima a obligatiilor Societatii fata de orice cumparator in cazul nelivrarii sau livrarii necorespunzatoare este valoarea sumelor incasate de Societate de la cumparatorul respectiv.<br>
                            <span class="alineat_span"></span>Romtehnochim s.r.l. nu va fi raspunzator pentru nici un fel de pagube directe, indirecte, accidentale, speciale, inclusiv, dar nu limitat la, pagube pentru pierderi de profit, bunavointa, posibilitatii de folosire, date sau alte pierderi intangibile sau incomensurabile (chiar daca Romtehnochim s.r.l. a fost informat anterior de posibilitatea aparitiei unor asemenea pierderi), rezultand din:<br>
                            <span class="alineat_span"></span>- utilizarea sau imposibilitatea utilizarii informatiilor site-ului,<br>
                            <span class="alineat_span"></span>- costul procurarii de bunuri sau servicii complementare rezultand din orice bunuri, date, informatii sau servicii achizitionate sau obtinute, mesaje primite, tranzactii incepute prin/ de pe site-urile Romtehnochim s.r.l.,<br>
                            <span class="alineat_span"></span>- acces neautorizat la, sau deteriorarea transmisiilor sau datelor utilizatorului, <br>
                            <span class="alineat_span"></span>- declaratii sau actiuni ale oricarei terte parti asupra serviciilor site-ului,<br>
                            <span class="alineat_span"></span>- orice alta problema legata de serviciile site-ului.<br>
                            <span class="alineat_span"></span>Daca se considera ca orice material pus la dispozitie pe site, postat de Romtehnochim s.r.l., de catre terti sau utilizatori, violeaza drepturile de copyright sau orice alte drepturi, este necesara semnalarea acestei situatii la adresa <a href="mailto:office@emex.ro"><span class="link_color1"><em>office@emex.ro</em></span></a>.<br>
                            <span class="alineat_span"></span>Pentru sectiunile site-ului care pot cuprinde opinii ale cititorilor, raspunderea asupra continutului opiniilor revine in intregime autorilor acestora. Romtehnochim s.r.l. isi rezerva dreptul de a nu face publice acele opinii care contravin termenilor si conditiilor de utilizare sau pe care le considera daunatoare, sub orice forma, propriei imagini, partenerilor sau tertilor.<br>
                            <span class="alineat_span"></span>Acest site este oferit in aceasta forma, fara alte garantii. Romtehnochim s.r.l.nu este si nu poate fi facut responsabil pentru nepotriviri, indisponibilitati sau alte defecte ale acestui site sau ale continutului sau.
                        </p>
                        <br>
                        <p class="text-center">
                            <img width="216" height="20" src="{{ asset('resources/images/general/End-of-page.png') }}" alt="Emex by Romtehnochim - Incheiere pagina">
                        </p>
                    </div>
                </div>
                    
            </div>
            
            <div id="Pagina2" class="tab-content">
                <div class="tab-pane" id="ab">
                    <h2 class="h2-style">5. GARANTIILE SI DISPONIBILITATEA PRODUSELOR</h2>
                    <p><span class="alineat_span"></span>Produsele cumparate prin intermediul site-ului <em>&#8220;Emex&#8221;</em> beneficieaza de garantia obisnuita a fiecarui produs in parte, mentionate fie pe eticheta produsului, fie in Fisa Tehnica a acestuia, cu respectarea conditilor de garantie conform legislatiei in vigoare.<br>
                        <span class="alineat_span"></span>Romtehnochim s.r.l. asigura garantia tuturor produselor comercializate, potrivit dispozitiilor Legii 449/2003 privind vanzarea produselor si garantiile asociate acestora (cu modificarile ulterioare), si conform informatiilor privind garantia produselor descrise in Certificatul de Conformitate a produsului, pentru fiecare produs in parte. Inlocuirea produsului va avea loc in termen de 15 zile de la data la care firma a fost informata asupra defectului ! Garantia se valideaza cu Certificatul de Conformitate si cu factura din colet.<br>
                        <span class="alineat_span"></span>Lipsa Certificatului de Conformitate al produsului trebuie semnalata in maxim 48 ore de la receptia marfii pe adresa <a href="mailto:office@emex.ro"><span class="link_color1"><em>office@emex.ro</em></span></a>. Sesizarea ulterioara nu va fi luata in considerare.<br>
                        <span class="alineat_span"></span>Romtehnochim s.r.l. nu garanteaza disponibilitatea in stoc a produselor afisate. Toate produsele puse in vanzare de Romtehnochim s.r.l. sunt realizate doar la comanda, stocurile existente fiind limitate, datorita varietatii foarte mari de produse si culori solicitate. Vanzatorul va avea dreptul de a nu livra, partial sau integral, o anumita comanda, si se obliga sa anunte cumparatorul, in cel mai scurt timp, despre situatia aparuta.<br>
                        <span class="alineat_span"></span>In cazul in care preturile sau alte detalii referitoare la produse au fost afisate gresit, inclusiv din cauza faptului ca au fost introduse gresit in baza de date, Romtehnochim s.r.l. isi rezerva dreptul de a anula livrarea respectivului produs, si de a anunta cumparatorul in cel mai scurt timp despre eroarea aparuta, daca livrarea nu s-a efectuat inca.
                    </p>
                    <h2 class="h2-style">6. DISPONIBILITATEA SERVICIULUI</h2>
                    <p><span class="alineat_span"></span>Romtehnochim s.r.l. isi rezerva dreptul de a modifica sau de a intrerupe, temporar sau permanent, partial sau in totalitate, serviciile puse la dispozitie prin intermediul acestui site, cu sau fara o notificare prealabila.<br>
                        <span class="alineat_span"></span>Romtehnochim s.r.l. nu este raspunzator fata de utilizator, orice terta persoana fizica sau juridica sau institutie pentru modificarea, suspendarea sau intreruperea serviciilor disponibile prin intermediul site-ului.<br>
                        <span class="alineat_span"></span>Romtehnochim s.r.l. poate schimba in orice moment continutul si conditiile de folosire a site-ului. Noile conditii devin valabile in momentul in care au fost facute publice, si nu au caracter retroactiv.
                    </p>
                    <h2 class="h2-style">7. LITIGII</h2>
                    <p><span class="alineat_span"></span>Orice litigiu aparut intre Cumparatori si Societate va fi rezolvata prin cale amiabila. In cazul in care nu s-a reusit stingerea conflictului pe cale amiabila, competenta revine instantelor de judecata romane din raza teritoriala a Romtehnochim s.r.l.</p>
                    <h2 class="h2-style">8. RETURNAREA PRODUSELOR</h2>
                    <p><span class="alineat_span"></span>Consumatorul poate solicita returnarea produselor in urmatoarele situatii:<br>
                        <span class="alineat_span"></span>- Produsul nu este conform cu specificatiile de pe site. Daca produsul comandat se dovedeste a nu fi conform cu specificatiile din oferta noastra, Consumatorul poate solicita returnarea acestuia pentru inlocuire sau rambursarea integrala a contravalorii. Daca se agreeaza inlocuirea cu un produs de o valoare mai mare, va plati diferenta, respectiv daca valoarea este mai mica, va primi o rambursare partiala pana la valoarea produsului inlocuitor. Costurile de retur si de transport pentru produsul inlocuitor, daca este cazul, sunt suportate de Romtehnochim s.r.l.<br>
                        <span class="alineat_span"></span>- Produse ce au fost livrate gresit: livrarea altor produse decat cele solicitate trebuie semnalata imediat, iar Consumatorul va refuza receptia. Consumatorul poate solicita returnarea acestuia pentru inlocuire, iar daca produsul nu mai este pe stoc, poate opta pentru inlocuire sau rambursarea integrala a contravalorii. Daca se agreeaza inlocuirea cu un produs de o valoare mai mare, va plati diferenta, respectiv daca valoarea este mai mica, va primi o rambursare partiala pana la valoarea produsului inlocuitor. Costurile de retur si de transport pentru produsul inlocuitor, daca este cazul, sunt suportate de Romtehnochim s.r.l.<br>
                        <span class="alineat_span"></span>Potrivit prevederilor legale in vigoare, &#8220;consumatorul are dreptul sa notifice in scris comerciantului ca renunta la cumparare, fara penalitati si fara invocarea unui motiv, in termen de 10 zile lucratoare de la primirea produsului&#8221;.<br>
                        <span class="alineat_span"></span>Produsele care nu satisfac cerintele consumatorului, vor fi expediate inapoi la firma Romtehnochim s.r.l. pe propria cheltuiala, impreuna cu <strong>Formularul de Retur</strong> completat. <em>Nu avem posibilitatea de a prelua colete cu ramburs. Produsele vor fi expediate in forma lor originala, fara a fi deteriorate sau utilizate. Va rugam sa returnati produsele in cutiile originale, ambalate corespunzator cu materiale de protectie (hartie, folii, pungi, carton etc.) pentru a evita deteriorarea acestora. Sunt refuzate retururile ale caror cutii nu sunt protejate corespunzator.</em><br>
                        <span class="alineat_span"></span>Va rugam sa ne informati in cazul in care ati efectuat un retur. Contravaloarea marfii returnate va fi restituita in 14 de zile de la momentul primirii acestei informatii. In cazul in care nu primim acesta informatie, banii va vor fi returnati in 14 de zile din momentul preluarii produselor returnate.<br>
                        <span class="alineat_span"></span>Va rugam sa respectati termenul prevazut pentru inapoierea marfii. Contravaloarea marfii returnate va fi restituita prin transfer bancar. Noua marfa comandata va fi expediata cu plata ramburs.<br>
                        <span class="alineat_span"></span>Va rugam sa pastrati dovada de expediere a coletului returnat pana la incheierea procesului de analizare a eventualei reclamatii, iar in cazul marfii returnate pana la momentul rambursarii banilor.<br>
                        <span class="alineat_span"></span>Daca dumneavoastra doriti sa returnati un colet trebuie sa o faceti prin intermediul unei firme de curierat, Taxa de curier <strong>va va fi returnata</strong>, doar in urmatoarele conditii: daca produsul primit este necorespunzator, sau nu este produsul comandat de dumneavoastra. In cazul in care produsul nu satisface asteptarile dumneavoastra, sau exista interpretari privind culorile solicitate (albastru de culoarea cerului, rosu de culoarea sangelui, etc.), taxa <strong>nu va va fi returnata</strong>.
                    </p>
                    <br>
                    <p class="text-center">
                        <img width="216" height="20" src="{{ asset('resources/images/general/End-of-page.png') }}" alt="Emex by Romtehnochim - Incheiere pagina">
                    </p>
                </div>
            </div>
        
            <div id="Pagina3" class="tab-content">
                <div class="tab-pane" id="am">
                    <h2 class="h2-style">9. RENUNTAREA LA CUMPARARE</h2>
                    <p><span class="alineat_span"></span>Consumatorul are dreptul sa notifice in scris comerciantului ca renunta la cumparare, fara penalitati si fara invocarea unui motiv, in termen de 10 zile lucratoare de la primirea produsului. Cumparatorul va putea solicita schimbarea produsului, in termen de 10 zile lucratoare de la data primirii coletului, fara penalitati si fara invocarea unui motiv.<br>
                        <span class="alineat_span"></span>In cazul solicitatii unui alt produs se va achita diferenta de pret, daca produsul este mai scump. In situatia in care cumparatorul opteaza pentru un produs mai ieftin, va primi o rambursare partiala pana la valoarea produsului inlocuitor. Romtehnochim s.r.l. va trimite produsul solicitat la schimb, numai dupa ce Cumparatorul a returnat produsul cumparat initial. Noua marfa comandata va fi expediata cu plata ramburs. Rambursarea contravalorii produsului ori, dupa caz, inlocuirea acestuia, se va face in cel mult 14 de zile de la retur.<br>
                        <span class="alineat_span"></span>Returnarea banilor ori, dupa caz, inlocuirea produselor fara penalitati si fara invocarea unui motiv, se poate efectua in urmatoarele conditii: in cazul in care produsele au un sigiliu, acesta nu are voie sa fie desfacut - produsul trebuie returnat sigilat; starea produselor achizitionate trebuie sa fie la fel ca la primirea lor.<br>
                        <span class="alineat_span"></span>Aceste dispozitii se aplica conf. O.G. 130/2000, in cazul achizitionarii de produse din acest site folosind tehnicile de comunicare la distanta. Cumparatorul nu are dreptul sa opteze decat o singura data pentru returnarea/inlocuirea unui produs in conditiile art 4 alin.1 lit b) din O.G. 130/2000.<br>
                        <span class="alineat_span"></span>In toate cazurile returnarii/inlocuirii produselor ca urmare a renuntarii la cumparare, costurile de returnare/inlocuire sunt suportate de catre cumparator. Renuntarea la cumparare in mod repetat va putea fi considerata un abuz. De asemenea, ne rezervam dreptul de a refuza acceptarea returului in situatia unor abuzuri (returnari repetate).<br>
                        <span class="alineat_span"></span><strong>NOTA: In orice situatie de returnare a produselor, acestea trebuie sa fie in aceeasi stare, in cutia originala, cu etichetele intacte si impreuna cu toate documentele care l-au insotit (factura, certificate de garantie etc.). In momentul efectuarii unei comenzi prin e-mail, sau direct din formularul de contact de pe site, Cumparatorul declara ca a luat cunostinta si este intru totul de acord cu cele mentionate mai sus. Acceptarea acestor termeni si conditii da nastere unui veritabil contract intre parti, aplicandu-se astfel clauzele Codului Civil si Comercial.</strong><br>
                        <span class="alineat_span"></span>Va rugam totodata sa consultati si pagina referitoare la <a href="politica-de-retur" title="Politica de retur a Romtehnochim"><span class="link_color1"><em>Politica de Retur</em></span>.</a>
                    </p>
                    <h2 class="h2-style">10. CONFIDENTIALITATE SI INFORMATII PERSONALE</h2>
                    <p><span class="alineat_span"></span>Informatiile utilizatorilor site-ului Emex sunt confidentiale si vor putea fi folosite numai pentru comunicari comerciale cu partenerii acestuia. Orice date specifice privitoare la situatia si starea produselor se pot obtine contactandu-ne online, la coordonatele cuprinse in prezentul site.<br>
                        <span class="alineat_span"></span>Pe site-ul <em>&#8220;Emex&#8221;</em>, utilizatorul este responsabil pentru toate activitatile care survin prin accesarea contului si parolei personale. Vanzatorul Romtehnochim s.r.l. nu poate fi facut responsabil pentru erorile survenite in urma neglijentei utilizatorului privind securitatea si confidentialitatea contului si parolei sale.<br>
                        <span class="alineat_span"></span>Informatiile personale, puse la dispozitia site-ului <em>&#8220;Emex&#8221;</em>, pentru a putea primi sau utiliza unele servicii sunt protejate in conditiile legii Legea 677/2001.<br>
                        <span class="alineat_span"></span>Prin completarea campurilor din formularele de inregistrare on-line utilizatorii sunt de acord ca datele personale pe care le inregistreaza sa intre in baza de date Romtehnochim s.r.l. si sa primeasca mesaje cu privire la produse si servicii, promotii, concursuri sau orice alte actiuni editoriale si de marketing desfasurate in viitor de catre Romtehnochim s.r.l. si de partenerii sai agreati.<br>
                        <span class="alineat_span"></span>Utilizatorul este in intregime responsabil pentru pastrarea confidentialitatii asupra parolei asociate accesului la serviciile <em>&#8220;Emex&#8221;</em>, conditionate de logare.<br>
                        <span class="alineat_span"></span>Utilizatorul este in intregime responsabil de toate informatiile care sunt facute publice din contul sau. In cazul accesarii neautorizate a contului de catre terte persoane, Romtehnochim s.r.l. nu isi asuma nici o responsabilitate fata de consecintele care pot aparea.<br>
                        <span class="alineat_span"></span>La solicitarea explicita a utilizatorului adresata la <a href="mailto:office@emex.ro"><span class="link_color1"><em>office@emex.ro</em></span></a>, Romtehnochim s.r.l. se obliga sa rectifice, actualizeze, blocheze, stearga sau transforme in date anonime, si sa inceteze prelucrarea datelor personale ale utilizatorului, in mod gratuit, conform dispozitiilor Legii nr. 677/2001 privind protectia persoanelor cu privire la prelucrarea datelor cu caracter personal si libera circulatie a acestor date.<br>
                        <span class="alineat_span"></span>Romtehnochim s.r.l. se obliga sa nu faca publica adresa de e-mail a utilizatorilor si sa nu o dezvaluie unei terte parti, daca aceasta nu se afla intre partenerii agreati in mod expres, in afara cazului in care acest lucru este necesar pentru a respecta legea si/ sau procedurile judiciare.<br>
                        <span class="alineat_span"></span>Romtehnochim s.r.l. nu raspunde de atacurile avand ca scop furtul sau vandalismul si care ar putea conduce la dezvaluirea sau compromiterea datelor.<br>
                        <span class="alineat_span"></span>Romtehnochim s.r.l. nu-si asuma nici un fel de responsabilitate pentru situatiile in care utilizatorul isi publica adresa sau orice alte date personale, din proprie initiativa, intr-un mesaj public, pe oricare dintre paginile <em>&#8220;Emex&#8221;</em>.<br>
                        <span class="alineat_span"></span>Politica site-ului Emex este de a nu accepta sau de a nu lua in consideratie materialele nesolicitate. Daca utilizatorii site-ului trimit astfel de materiale, Romtehnochim s.r.l. isi rezerva dreptul de a considera aceste materiale neconfidentiale si lipsite de protectia drepturilor personale, sau de proprietate. Astfel de materiale si drepturi devin proprietatea Romtehnochim s.r.l., libera de orice pretentii emise de o persoana sau un grup de persoane, putand fi utilizate in orice scop de catre Romtehnochim s.r.l., fara obligatia de a acorda compensantii pentru utilizarea lor.<br>
                        <span class="alineat_span"></span>Identitatea utilizatorilor nu va fi dezvaluita in cazul in care, prin informatiile postate, acestia ar putea fi pusi pericol. La inregistrare, utilizatorii au posibilitatea sa aleaga numele de utilizator (username) si parola (password). Utilizatorii accepta sa nu imprumute niciodata parola (password) unui alt utilizator, pentru propria protectie si pentru validitatea informatiilor transmise. De asemenea, accepta sa nu utilizeze niciodata parola altui membru pentru a posta mesaje.<br>
                        <span class="alineat_span"></span><em>&#8220;Emex&#8221;</em> foloseste &#8220;cookies&#8221; pentru a identifica utilizatorii. Acestea nu contin nici un fel de date personale ale utilizatorului si nu prezinta risc in cazul in care sunt interceptate de terte parti. Daca browser-ul este configurat sa nu le accepte, anumite pagini pot sa nu functioneze partial sau in totalitate. Mai multe delatii despre cookies veti gasi in pagina despre <a href="https://emex.ro/cookies" title="Cookies Emex"><span class="link_color1"><em>cookies</em></span></a>.
                    </p>
                    <br>
                    <p class="text-center">
                        <img width="216" height="20" src="{{ asset('resources/images/general/End-of-page.png') }}" alt="Emex by Romtehnochim - Incheiere pagina">
                    </p>
                </div>     
            </div>
        
            <div id="Pagina4" class="tab-content">
                <div class="tab-pane" id="pagina-4-termeni-conditii">
                    <p><span class="alineat_span"></span>Intregul continut al site-ului <em>&#8220;Emex&#8221;</em>, incluzand, enumerativ, dar nu limitativ, imagini, texte, butoane, programe, scripturi si orice alte date, este proprietatea Romtehnochim s.r.l. si este protejat conform Legii drepturilor de autor si legilor privind dreptul de proprietate intelectuala si industriala.<br>
                        <span class="alineat_span"></span>Folosirea fara acordul scris a Romtehnochim s.r.l. a oricaror elemente enumerate mai sus este sanctionata conform legilor in vigoare.<br>
                        <span class="alineat_span"></span>Pentru raportarea problemelor legate de drepturile de proprietate intelectuala va rugam sa ne contactati, in scris, la adresa de email: <a href="mailto:office@emex.ro"><span class="link_color1"><em>office@emex.ro</em></span></a>.<br>
                        <span class="alineat_span"></span>Romtehnochim s.r.l. ofera acces liber la site-ul EMEX si va autorizeaza sa vizualizati, imprimati si sa transmiteti informatii existente pe site doar in scopuri personale, noncomerciale.<br>
                        <span class="alineat_span"></span>Dreptul de copyright pentru informatiile existente pe acest site este detinut de Romtehnochim s.r.l. sau de partenerii sai. Nici un material de pe acest site, incluzand textele, grafica, fotografiile, software-ul, logo-urile, etc. nu poate fi reprodus partial, integral sau modificat fara permisiunea anterioara explicita, prin acord scris al Romtehnochim s.r.l. sau al partenerilor sai, si nicidecum nu poate fi copiat, reprodus integral sau partial alterat, in scopul de a fi utilizat la crearea de site-uri similare. Continutul acestui site, textele, grafica, fotografiile, software-ul, logo-urile si orice alte materiale prezente pe site sunt protejate de legea dreptului de autor si sunt proprietatea Romtehnochim s.r.l. sau a partenerilor sai.<br>
                        <span class="alineat_span"></span>Romtehnochim isi rezerva dreptul de a actiona, in virtutea legii, pentru sanctionarea conform legislatiei in vigoare a celor vinovati de incalcarea dreptului de copyright, in orice forma s-ar produce aceasta, si de a solicita daune-prejudicii, in situatia in care se dovedeste, ca parti ale site-ului <em>&#8220;Emex&#8221;</em> au fost folosite la alcatuirea/ construirea/ documentarea, etc. altui site, fara acordul expres al Romtehnochim.<br>
                        <span class="alineat_span"></span>Este interzisa crearea de legaturi cu acest site ale altor site-uri sau invers, fara un acord prealabil, in scris. In situatiile in care acest lucru se intampla fara acordul scris, explicit al Romtehnochim s.r.l., aceasta nu isi asuma responsabilitatea pentru site-urile neafiliate cu care acesta ar putea fi legat, pentru materialele postate pe acest site de catre alte persoane decat cele autorizate de Romtehnochim s.r.l., si isi rezerva dreptul de a solicita sanctionarea conform legislatiei in vigoare, orice actiune de acest tip, care nu are acordul sau prealabil.<br>
                        <span class="alineat_span"></span>Romtehnochim s.r.l. sau terte parti pot furniza autorizat, prin intermediul site-ului, legaturi (&#8220;link&#8221;-uri) catre alte pagini sau resurse World Wide Web. Romtehnochim s.r.l. nu garanteaza, nu este si nu poate fi facut responsabil, in nici un fel de disponibilitatea acestora, de forma, continutul, publicitatea, produsele sau alte materiale disponibile pe site-urile respective.<br>
                        <span class="alineat_span"></span>Romtehnochim s.r.l. nu va fi responsabil sau pasibil de a plati despagubiri, direct sau indirect, pentru orice paguba sau pierdere cauzata sau presupusa a fi fost cauzata de, sau in legatura cu, folosirea sau increderea in informatiile, continutul, bunurile sau serviciile puse la dispozitie de site-urile respective.<br>
                        <span class="alineat_span"></span>Reproducerea, copierea, multiplicarea, vinderea, revinderea sau exploatarea unei parti a serviciilor, accesul sau folosirea serviciilor sau informatiilor puse la dispozitie de Romtehnochim s.r.l. prin intermediul site-ului intr-un mod care violeaza legislatia romaneasca sau internationala in materie de drept de autor si proprietate intelectuala, implica raspunderea civila sau penala pentru astfel de actiuni.<br>
                        <span class="alineat_span"></span>Romtehnochim s.r.l. isi rezerva dreptul de a impiedica prin orice mijloace contactarea si utilizarea acestui site, si de a solicita sanctionarea conform legislatiei in vigoare a persoanelor implicate, daca exista dovada ca scopul este distrugerea sau alterarea site-lui, a continutului sau securitatii acestuia, sau incercarea de a ataca sau discredita Romtehnochim s.r.l. sau partenerii sai, produsele, serviciile si angajatii acestora.<br>
                        <span class="alineat_span"></span>Orice eventual litigiu in legatura cu acest site este de competenta instantelor de drept comun din Romania.
                    </p>
                    <h2 class="h2-style">12. FORTA MAJORA</h2>
                    <p><span class="alineat_span"></span>Nici una din parti nu va fi raspunzatoare pentru neexecutarea obligatiilor sale contractuale, daca o astfel de neexecutare este datorata unui eveniment de forta majora. Forta majora este evenimentul imprevizibil, definit prin lege, in afara controlului partilor si care nu poate fi evitat.</p>
                    <h2 class="h2-style">13. FRAUDA</h2>
                    <p><span class="alineat_span"></span><strong>ORICE INCERCARE DE A ACCESA DATELE PERSONALE ALE ALTUI UTILIZATOR, DE A MODIFICA CONTINUTUL SITE-ULUI &#8220;EMEX&#8221;, SAU DE A AFECTA PERFORMANTELE SERVERULUI PE CARE RULEAZA SITE-UL &#8220;EMEX&#8221; VA FI CONSIDERATA O TENTATIVA DE FRAUDARE SI VA DUCE LA SOLICITATEA INCEPERII CERCETARII PENALE IMPOTRIVA ACELUIA SAU ACELORA CARE A(U) INCERCAT ACEST FAPT</strong>.</p>
                    <p><span class="alineat_span"></span>Romtehnochim s.r.l. isi rezerva dreptul de a modifica, revizui, completa aceste reguli in orice moment. Orice modificare va fi facuta publica in aceasta pagina si va intra efectiv in vigoare din momentul postarii ei pe site.</p>
                    <br>
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

@endsection


