@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ minify('css/despre.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Despre Noi</li></ul>
@endsection

@section('content')
<div class="despre relative w-full">
    <div style="background-image: url('{{ asset('resources/images/despre-emex-by-romtehnochim.jpg') }}');" class="header_img_bg col justify-center align-center" id="header_img_bg">
        <h1 class="z-10" id="despre_noi_header">DESPRE EMEX BY<br>ROMTEHNOCHIM</h1>
    </div>
</div>

<div class="main-container depsrenoi" id="mcdnr">

    <div class="row align-center mt-16">
        <h2 class="about-sec-tit"><strong>ROLUL NOSTRU PE PIATA</strong></h2>
    </div>

    <div class="row mt-16 gap-md wrap-mobile">
        <div>
            <img width="120" height="120" src="{{ asset('resources/images/vopsele-mici.png') }}" alt="Vopsele">
        </div>
        <p class="marg-left">
            <span class="alineat_span"></span>Atentia catre necesitatile clientilor, tehnologia si metodele de fabricatie, cat si certificarile privind calitatea si constanta calitatii produselor, garanteaza faptul ca <strong>ROMTEHNOCHIM</strong> produce intreaga gama de <strong><em>lacuri, emailuri, vopsele si grunduri alchidice, vopsele lavabile si superlavabile sau tencuieli decorative structurate, vopsele clorcauciuc de trafic sau de piscina, vopsele si lacuri epoxidice, vopsele bicomponente poliuretanice, sau pardoseli epoxidice autonivelante bicomponente</em></strong>, cat si alte produse necesare prioritar in segmentul de constructii, sub marca <strong> “EMEX”</strong>, la cea mai inalta calitate. Dispunem de know-how-ul necesar realizarii oricarui produs si pastrarea constantei calitatii.
        </p>
    </div>

    <div class="row align-center mt-16">
        <h2 class="about-sec-tit"><strong>ASISTENTA PROFESIONALA</strong></h2>
    </div>
    <div class="row mt-16 gap-md wrap-mobile">
        <div>
            <img width="120" height="120" src="{{ asset('resources/images/asistenta.png') }}" alt="Asistenta">
        </div>
        <p class="marg-left">
            <span class="alineat_span"></span>Romtehnochim urmareste indeaproape asigurarea unei maxime eficiente a executiei comenzilor, a constantei calitatii, dar si a utilitatii fiselor tehnice pentru punerea in opera a produselor sale. De asemenea, compania noastra se bucura de reputatia unui personal competent si deschis catre colaborare si catre nou, dispus sa asigure colaboratorilor nostri tot suportul necesar pentru obtinerea unor rezultate maxime in folosirea produselor noastre.
        </p>
    </div>

    <div class="row align-center mt-16">
        <h2 class="about-sec-tit"><strong>CALITATE SI INOVATIE</strong></h2>
    </div>
    <div class="row mt-16 gap-md wrap-mobile">
        <div>
            <img width="120" height="120" src="{{ asset('resources/images/inovatie.png') }}" alt="Inovatie">
        </div>
        <p class="marg-left">
            <span class="alineat_span"></span>Politica prioritara a companiei noastre este de a urmari in detaliu asigurarea constantei calitatii conform Sistemului de Management Integrat al Calitatii, Mediului si Securitatii Ocupationale ISO 9001, ISO 14001 si respectiv ISO 18001. Totodata urmarim alinierea produselor la standardele europene prin folosirea de noi componente, de ultima generatie, cu continut scazut de compusi organici volatili si grad scazut de toxicitate.
        </p>
    </div>

    <div class="row align-center mt-16">
        <h2 class="about-sec-tit"><strong>MEDIU PROTEJAT</strong></h2>
    </div>
    <div class="row mt-16 gap-md wrap-mobile">
        <div>
            <img width="120" height="120" src="{{ asset('resources/images/mediu.png') }}" alt="Mediu">
        </div>
        <p class="marg-left">
            <span class="alineat_span"></span>In tot ceea ce facem respectam mediul natural, sanatatea clientilor, a angajatilor si a locuitorilor din vecinatatea noastra. Dezvoltarea produselor si intreaga noastra activitate tine seama de cerintele ecologice la nivelul Uniunii Europene.
        </p>
    </div>
</div>


@endsection
