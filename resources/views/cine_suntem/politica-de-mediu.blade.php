@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="/{{ minify('css/politica-de-mediu.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Politica de Mediu</li></ul>
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