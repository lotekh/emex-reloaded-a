@extends('layout.layout')

@section('seo')
<title>Politica de mediu Emex by Romtehnochim</title>
<meta name="description" content="Politica de mediu Emex by Romtehnochim producator de tencuieli pardoseli emailuri grunduri vopsele lavabile - certificat ISO 14001">
<meta name="keywords" content="ISO 14001, politica de mediu, protejarea mediului, prevenirea poluarii">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Politica de Mediu a Romtehnochim">
<meta property="og:image" content="https://emex.ro/images/social/Politica-de-mediu-Romtehnochim-sm.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Politica-de-mediu-Romtehnochim-sm.jpg" />
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="628"/>
<meta property="og:image:alt" content="Romtehnochim - vopsele cu COV redus"/>
<meta property="og:description" content="Informatii despre politica de mediu a Romtehnochim producator certificat ISO - management integrat - vopsele tencuieli si pardoseli “Emex”">
<meta property="og:url" content="https://emex.ro/politica-de-mediu">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website"/>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ minify('css/bundled/politica-de-mediu.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Politica de Mediu</li></ul>
@endsection

@section('content')

<div class="politica relative w-full">
    <div class="header_img_bg col justify-center align-center" id="header_img_bg" style="background-image: url('{{ asset('resources/images/politica-de-mediu.jpg') }}'); height: 500px;">
        <h1 class="text-center" id="politica_de_mediu_header">
            POLITICA ROMTEHNOCHIM <br> PRIVIND MEDIUL
        </h1>
    </div>
</div>




<div class="main-container col">
    <div id="despre_noi_content_wrapper">
        <h2>ANGAJAMENTUL ROMTEHNOCHIM FATA DE MEDIU</h2>
        <p class="mt-32">Conducerea S.C. “ROMTEHNOCHIM” SRL considera protectia mediului inconjurator o prioritate si, in consecinta, cauta prin toate mijloacele minimizarea impactului activitatilor firmei asupra mediului.</p>
        <p class="mt-32">
            <span class="alineat_span"></span>In acest sens, angajamentul nostru este sa:
        </p>
        <ul>
            <li>Prevenim poluarea atat prin utilizarea celor mai bune tehnici si tehnologii disponibile, cat si prin adoptarea si implementarea tehnologiilor si echipamentelor cu impact redus asupra mediului;</li>
            <li>Asiguram conformarea cu legislatia de mediu aplicabila considerand ca aceasta este un minim standard de actiune in raport cu protectia mediului;</li>
            <li>Identificam toate aspectele semnificative de mediu si sa actionam pentru a minimiza impactul acestora;</li>
            <li>Stabilim obiective care vor conduce la reducerea poluarii si imbunatatirea performantelor privind protectia mediului si sa monitorizam realizarea acestor obiective, pe termen mediu si lung;</li>
            <li>Asiguram constientizarea si implicarea angajatilor S.C. “ROMTEHNOCHIM” SRL pentru realizarea politicii si obiectivelor privind protectia mediului;</li>
            <li>Dezvoltam si implementam programe de minimizare a consumurilor de resurse;</li>
            <li>Dezvoltam si implementam programe de colectare, reutilizare si reciclare ale deseurilor;</li>
            <li>Asiguram transparenta si informarea publica asupra politicii si actiunilor S.C. “ROMTEHNOCHIM” SRL in domeniul protectiei mediului.</li>
        </ul>
        <p class="mt-32">
            <span class="alineat_span"></span>Ne afirmam inca o data angajamentul ferm pentru prevenirea poluarii si protejarea mediului, care trebuie ocrotit si utilizat conform obiectivului prioritar al omenirii, de dezvoltare durabila.
        </p>

        <div class="col justify-center align-center w-full mt-32">
            <img src="{{ asset('resources/images/general/End-of-page.png') }}" alt="Emex by Romtehnochim - Incheiere pagina" width="216" height="20">
        </div>
    </div>
</div>



@endsection