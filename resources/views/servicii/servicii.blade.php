@extends('layout.layout')

@section('seo')
<title>Servicii de aplicare vopsele si pardoseli</title>
<meta name="keywords" content="sevicii vopsitorie, aplicare pardoseli, montaj pardoseli epoxidice">
<meta name="description" content="Romtehnochim asigura aplicrea profesionala a vopselelor si pardoselilor si a celorlalte produse realizate sub marca Emex">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Servicii de aplicare vopsele si pardoseli">
<meta property="og:image" content="https://emex.ro/images/social/Servicii-generale-sm.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Servicii-generale-sm.jpg" />
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="628"/>
<meta property="og:image:alt" content="Servicii de vopsire si aplicare pardoseli"/>
<meta property="og:description" content="Romtehnochim asigura aplicarea profesionala a vopselelor si pardoselilor epoxidice sau poliuretanice dar si a altor produse realizate sub marca Emex">
<meta property="og:url" content="https://emex.ro/servicii">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website"/>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/servicii.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class=" -ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Servicii</li></ul>
@endsection


@section('content')

<div class="servicii relative w-full col justify-center align-center header" style="background-image: url('{{ asset('resources/images/Banner-general-Emex-vopsele.jpg') }}');" id="servicii_header">
  <h1 class="z-10">
      SERVICII DE VOPSIRE - <br>SI APLICARE PARDOSELI
  </h1>
</div>

<div class="servicii main-container mt-32 " id="main">
    <div class="col" id="mcdnr">
        <h2 class="text-center" id="ap">SERVICII EXECUTATE DE ROMTEHNOCHIM</h2>
        <div class="col" id="despre_noi_content_wrapper">
            <p>
                Asiguram punerea in opera a tuturor produselor noastre la preturile pietei.
                Veti avea certitudinea obtinerii unei maxime calitati a acoperirilor.
            </p>
            <p>
                In acest scop am stabilit un sistem de management al calitatii in cadrul caruia opereaza toate procesele cerute pentru realizarea serviciului. 
                In cadrul sistemului de management al calitatii identificam acele dorinte si asteptari ce trebuiesc indeplinite de societatea noastra, pentru a furniza servicii care 
                sa poata satisface toti clientii nostri.
            </p>
            <p>
                Serviciile oferite cuprind:
            </p>
            <ul id="landing_first_list">
                <li>Vopsiri interioare;</li>
                <li>Vopsiri exterioare;</li>
                <li>Aplicare tencuiala decorativa structurata;</li>
                <li>Aplicare vopsea texturata;</li>
                <li>Vopsiri cu emailuri bicomponente;</li>
                <li>
                    <a href="{{ url('/aplicari-vopsele-pardoseli') }}" title="Vopsiri de pardoseli industriale">
                        Vopsiri speciale pentru pardoseli industriale
                    </a>
                </li>
                <li>
                    <a href="{{ url('/aplicare-pardoseli-epoxidice') }}" title="Aplicare de pardoseala epoxidica">
                        Aplicari pardoseli epoxidice autonivelante
                    </a>
                </li>
                <li>Aplicari pardoseli poliuretanice autonivelante;</li>
                <li>Efectuare pardoseli elicopterizate.</li>
            </ul>
        </div>

    </div>
    <div class="col justify-center align-center w-full mt-32">
        <img 
            width="216" 
            height="20" 
            src="{{ asset('resources/images/general/End-of-page.png') }}" 
            alt="Emex by Romtehnochim - Incheiere pagina"
        />
    </div>
</div>

@endsection
