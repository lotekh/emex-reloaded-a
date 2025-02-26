@extends('layout.layout')

@section('seo')
<title>Declaratie de principii - Emex by Romtehnochim</title>
<meta name="keywords" content="Romtehnochim producator vopsele, Emex, lacuri si vopsele">
<meta name="description" content="Declaratie de principii a Romtehnochim - producator de vopsele certificat ISO privitor la politicile de mediu, calitate si securitate in munca">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Despre Emex by Romtehnochim">
<meta property="og:image" content="https://emex.ro/images/social/Despre-noi-instagram.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Despre-noi-instagram.jpg" />
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="628"/>
<meta property="og:image:alt" content="Emex marca a Romtehnochim"/>
<meta property="og:description" content="Relatii despre politica generala a Romtehnochim producator certificat ISO – management integrat – al vopselelor tencuielilor si pardoselilor &#8220;Emex&#8221;.">
<meta property="og:url" content="https://emex.ro/despre-noi">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website"/>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/despre.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Despre Noi</li></ul>
@endsection

@section('content')
<div class="despre relative w-full">
    <div style="background-image: url('{{ asset('resources/images/despre-emex-by-romtehnochim.jpg') }}');" class="header_img_bg col justify-center align-center" id="header_img_bg">
        <h1 class="z-10" id="despre_noi_header">DESPRE EMEX BY<br>ROMTEHNOCHIM</h1>
    </div>
</div>

<div class="container">
    <div class="row-despre" id="mcdnr">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="despre_noi_content_wrapper">
            <h2 class="despre_noi_title"><strong>ROLUL NOSTRU PE PIATA</strong></h2>
            <div class="despre_noi_content">
                <div>
                    <img width="120" height="120" src="{{ asset('resources/images/vopsele-mici.png') }}" alt="Vopsele">
                </div>
                <p class="marg-left">
                    <span class="alineat_span"></span>Atentia catre necesitatile clientilor, tehnologia si metodele de fabricatie, cat si certificarile privind calitatea si constanta calitatii produselor, garanteaza faptul ca <strong>ROMTEHNOCHIM</strong> produce intreaga gama de <strong><em>lacuri, emailuri, vopsele si grunduri alchidice, vopsele lavabile si superlavabile sau tencuieli decorative structurate, vopsele clorcauciuc de trafic sau de piscina, vopsele si lacuri epoxidice, vopsele bicomponente poliuretanice, sau pardoseli epoxidice autonivelante bicomponente</em></strong>, cat si alte produse necesare prioritar in segmentul de constructii, sub marca <strong> “EMEX”</strong>, la cea mai inalta calitate. Dispunem de know-how-ul necesar realizarii oricarui produs si pastrarea constantei calitatii.
                </p>
            </div>

            <h2 class="despre_noi_title"><strong>ASISTENTA PROFESIONALA</strong></h2>
            <div class="despre_noi_content">
                <div>
                    <img class="imagine-despre-noi" width="120" height="120" src="{{ asset('resources/images/asistenta.png') }}" alt="Asistenta">
                </div>
                <p class="marg-left">
                    <span class="alineat_span"></span>Romtehnochim urmareste indeaproape asigurarea unei maxime eficiente a executiei comenzilor, a constantei calitatii, dar si a utilitatii fiselor tehnice pentru punerea in opera a produselor sale. De asemenea, compania noastra se bucura de reputatia unui personal competent si deschis catre colaborare si catre nou, dispus sa asigure colaboratorilor nostri tot suportul necesar pentru obtinerea unor rezultate maxime in folosirea produselor noastre.
                    <div class="spaces-despre-noi">
                        <br> <br> 
                    </div>
                </p>
            </div>

            <h2 class="despre_noi_title"><strong>CALITATE SI INOVATIE</strong></h2>
            <div class="despre_noi_content">
                <div>
                    <img width="120" height="120" src="{{ asset('resources/images/inovatie.png') }}" alt="Inovatie">
                </div>
                <p class="marg-left">
                    <span class="alineat_span"></span>Politica prioritara a companiei noastre este de a urmari in detaliu asigurarea constantei calitatii conform Sistemului de Management Integrat al Calitatii, Mediului si Securitatii Ocupationale ISO 9001, ISO 14001 si respectiv ISO 45001. Totodata urmarim alinierea produselor la standardele europene prin folosirea de noi componente, de ultima generatie, cu continut scazut de compusi organici volatili si grad scazut de toxicitate.
                    <div class="spaces-despre-noi">
                        <br> <br> 
                    </div>
                </p>
            </div>

            <h2 class="despre_noi_title"><strong>MEDIU PROTEJAT</strong></h2>
            <div class="despre_noi_content">
                <div>
                    <img width="120" height="120" src="{{ asset('resources/images/mediu.png') }}" alt="Mediu">
                </div>
                <p class="marg-left">
                    <span class="alineat_span"></span>In tot ceea ce facem respectam mediul natural, sanatatea clientilor, a angajatilor si a locuitorilor din vecinatatea noastra. Dezvoltarea produselor si intreaga noastra activitate tine seama de cerintele ecologice la nivelul Uniunii Europene.
                    <div class="spaces-despre-noi">
                        <br> <br> <br> <br>
                    </div>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
