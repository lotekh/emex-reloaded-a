@extends('layout.layout')

@section('seo')
<title>Intrebari frecvente</title>
<meta name="keywords" content="faq, cum comand, comanda emex">
<meta name="description" content="Intrebari frecvente legate de modul de comanda pe site-ul emex">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Intrebari despre comanda site emex">
<meta property="og:image" content="https://emex.ro/images/social/Intrebari-frecvente-sm.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Intrebari-frecvente-sm.jpg" />
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="628"/>
<meta property="og:image:alt" content="Emex faq"/>
<meta property="og:description" content="Modul de utilizare al formularului de comanda din site-ul emex. Personalizare comanda si mod de plata">
<meta property="og:url" content="https://emex.ro/faq">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website"/>
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="=-ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Politica de Retur</li></ul>
@endsection

@section('content')
<div class="hidden-xs">
    <div class="header_img_bg" id="faq_header" style="background-image: url('{{ asset('resources/images/Intrebari-frecvente-header.jpg') }}');">
      <div class="hibc">
        <div class="hibcsc">
          <h1>INTREBARI FRECVENTE</h1>
        </div>
      </div>
    </div>
  </div>
  
  <!-- <h2 class="font-xl-red text-center">INTREBARI LEGATE DE COMANDA</h2> -->
  <div class="main-container faq" id="despre_noi_content_wrapper">
    <div class="row align-center">
      <div class="dot"></div>
      <h3 class="text-blue">Cum pot cauta un anumit produs in magazin ?</h3>
    </div>
    <p><span class="alineat_span"></span>Pentru a cauta un produs, va rugam sa folositi caseta de cautare existenta in partea de sus a site-ului. Introduceti informatiile cautate, iar daca acestea se regasesc pe site, vi se va afisa o lista a rezultatelor compatibile.<br>
   <span class="alineat_span"></span>Va trebui sa formulati cautarea cat mai atent, fara erori de scriere, pe cat posibil. Puteti urma de asemeni sugestiile de cautare ce va apar in lista.</p>
    <div class="row align-center">
      <div class="dot"></div>
      <h3 class="text-blue">Cum pot face o comanda personalizata ?</h3>
    </div>
    <p><span class="alineat_span"></span>Pentru o comanda personalizata de produse sau culori ce nu se regasesc pe site, este necesar sa ne contactati pe mail, prin oricare dintre formularele ce se regasesc in platforma. <strong><em>Nu se pot inregistra comenzi telefonice</em></strong>.</p>
    <div class="row align-center">
      <div class="dot"></div>
      <h3 class="text-blue">Sunt persoana fizica. Cum pot cumpara ?</h3>
    </div>
    <p><span class="alineat_span"></span>Romtehnochim, furnizor de produse peliculogene de acoperire - vopsele, tencuieli, pardoseli - onoreaza comenzile tuturor persoanelor fizice sau juridice. Pentru a primi factura fiscala cu datele dvs., va rugam sa introduceti datele care vi se vor solicita la inregistrare sau in cadrul procesului de comanda.</p>
    <div class="row align-center">
      <div class="dot"></div>
      <h3 class="text-blue">Doresc livrarea la o alta adresa. Cum procedez ?</h3>
    </div>
    <p><span class="alineat_span"></span>Puteti solicita livrarea la adresa de facturare, inregistrata in cont prin selectarea casutei care specifica “<em>Datele de livrare sunt aceleasi cu datele de facturare</em>”, sau la orice alta adresa, caz in care va trebui sa completati datele solicitate la pozitia 2, “<em>Livrare</em>”, in cadrul procesului de comanda.</p>
    <div class="row align-center">
      <div class="dot"></div>
      <h3 class="text-blue">Am uitat parola contului. Cum procedez ?</h3>
    </div>
    <p><span class="alineat_span"></span>In cazul in care nu va amintiti parola contului Dvs., va rugam sa folositi optiunea “<em>Recupereaza parola uitata</em>”, disponibila in pagina de Autentificare.</p>
    <div class="row align-center">
      <div class="dot"></div>
      <h3 class="text-blue">Cum modific datele din contul meu ?</h3>
    </div>
    <p><span class="alineat_span"></span>Pentru a modifica datele din contul de client, va rugam sa va autentificati in cont si sa accesati apoi optiunea “<em>Setari Cont</em>”, disponibila in sectiunea “<em>Contul meu</em>”.</p>
    <div class="row align-center">
      <div class="dot"></div>
      <h3 class="text-blue">Trebuie sa am cont pentru a putea cumpara ?</h3>
    </div>
    <p><span class="alineat_span"></span>Nu este obligatoriu. Totusi, pentru a putea gestiona cu usurinta datele, este recomandat sa va creeati un cont de utilizator. Crearea contului de utilizator va asigura posibilitatea de a vizualiza istoricul comenzilor, de a descarca facturi curente sau mai vechi, etc.</p>
    <div class="row align-center">
      <div class="dot"></div>
      <h3 class="text-blue">Pot modifica o comanda lansata ?</h3>
    </div>
    <p><span class="alineat_span"></span>In cazul in care doriti sa modificati o comanda, va rugam sa ne contactati folosind un formular de contact de pe site. Nu se pot face modificari telefonic, ci doar in urma unui email, in care sa fie precizate toate elemntele de identificare ale comenzii.</p>
    <div class="row align-center">
      <div class="dot"></div>
      <h3 class="text-blue">Care este modalitatea de plata ?</h3>
    </div>
    <p><span class="alineat_span"></span>In acest moment va oferim urmatoarele metode de plata:</p>
    <ul>
      <li><strong>- Carte de Credit/ Debit</strong> - Aceasta optiune poate fi folosita si pentru comenzile plasate online. Aici se regaseste si modalitatea de plata in rate.</li>
      <li><strong>- Plata la livrare</strong> - Platiti produsele ramburs la momentul livrarii.</li>
      <li><strong>- Plata cu OP</strong> - Optiune valabila in special pentru firme.</li>
      <li><strong>- Plata cash</strong> - Platiti produsele cash la momentul ridicarii de la sediul nostru. Optiune valabila pentru plati de sub 5.000 Ron pentru persoane juridice, sau 10.000 pentru persoane fizice.</li>
    </ul>
    <h3 class="text-blue">Cat costa Livrarea ?</h3>
      <p><span class="alineat_span"></span>In cadrul procesului de comanda, la punctul 5 “<em>Sumar comanda</em>” exista butonul de informatii “<em>Cost transport</em>”. Aici veti primi toate informatiile, luand in calcul distanta pana la locul de livrare si cantitatea de produse. <strong><em>Peste 250 Kg, transportul este gratuit pe teritoriul Romaniei</em></strong>.</p>
      <h3 class="text-blue">Pot afla informatii despre comenzile anterioare ?</h3>
        <p><span class="alineat_span"></span>Puteti consulta istoricul comenzilor efectuate pe site, accesand sectiunea “<em>Istoric comenzi</em>”, doar daca aveti un cont de utilizator. Sunt inregistrate numai operatiunile in care clientul este logat.</p>
        <h3 class="text-blue">Cum achizitionez un produs care nu e pe stoc ?</h3>
          <p><span class="alineat_span"></span>Pentru mai multe informatii despre disponibilitatea produsului, va rugam sa ne contactati folosind formularul de contact de pe site.</p>
          <h3 class="text-blue">Doresc sa obtin informatii suplimentare, care nu se regasesc pe site. Cum procedez ?</h3>
            <p><span class="alineat_span"></span>In acest caz, va rugam sa ne contactati folosind formularul de contact. Personalul nostru va va raspunde prompt, la orice intrebare legata de produsele noastre.</p>
  </div>
@endsection