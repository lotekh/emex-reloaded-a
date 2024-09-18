@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/politica-de-calitate.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Politica de Calitate</li></ul>
@endsection

@section('content')
<div class="politica relative w-full">
    <div class="header_img_bg col justify-center align-center" id="header_img_bg" style="background-image: url('{{ asset('resources/images/Politica-de-calitate.jpg') }}'); height: 500px;">
        <h1 class="text-center" id="politica_de_calitate_header">
            POLITICA ROMTEHNOCHIM <br> PRIVIND CALITATEA
        </h1>
    </div>
</div>

<div class="main-container col">
    <div id="despre_noi_content_wrapper">
        <h2 class="text-blue text-center">ANGAJAMENTUL ROMTEHNOCHIM FATA DE CALITATE</h2>
        <p>
            <span class="alineat_span"></span>
            <strong>“ROMTEHNOCHIM” SRL</strong> considera calitatea ca fiind prioritara pentru serviciile oferite clientilor sai, dar si pentru managementul intern al proceselor.
        </p>
        <p class="mt-32">
            <span class="alineat_span"></span>Pornind de la faptul ca un client fidel constituie ratiunea noastra de a exista, dorim sa satisfacem cerintele si asteptarile clientilor nostri, respectand in acelasi timp reglementarile legale si realizarea obiectivelor pe care ni le-am propus. <span class="subs-attn">Satisfactia clientului este punctul central al activitatii noastre</span>.
        </p>
        <p class="mt-32">
            <span class="alineat_span"></span>In acest scop am stabilit un sistem de management al calitatii in cadrul caruia opereaza toate procesele cerute pentru realizarea serviciului. In cadrul sistemului de management al calitatii identificam acele dorinte si asteptari ce trebuiesc indeplinite de societatea noastra, pentru a furniza servicii care sa poata satisface toti clientii nostri.
        </p>
        <ul class="mt-16">
            <li>Determinarea necesitatilor clientilor, transformarea lor in cerinte si indeplinirea acestora;</li>
            <li>Extinderea parteneriatelor cu furnizorii si clientii nostri;</li>
            <li>Mentinerea si imbunatatirea Sistemului de Management al Calitatii in conformitate cu Standardele de referinta SR EN ISO 9001 / 2015, SR EN ISO 14001 / 2015, SR OHSAS 18001 / 2008;</li>
            <li>Imbunatatirea continua a proceselor de realizare a produselor si serviciilor noastre, pentru onorarea asteptarilor clientilor nostri si implicit cresterea nivelului de satisfactie;</li>
            <li>imbunatatirea continua a eficacitatii sistemului de management al calitatii;</li>
            <li>Constientizarea permanenta a personalului fata de relevanta si importanta activitatii sale, si de modul in care contribuie la realizarea calitatii;</li>
            <li>Realizarea programelor de investitii pentru modernizarea spatiilor conform cerintelor existente;</li>
            <li>Instruirea si evaluarea continua a personalului pentru a asigura calificarea acestuia la nivelul exigentelor cerute;</li>
            <li>Consolidarea imaginii create, atat a firmei, cat si a produselor realizate si comercializate de “ROMTEHNOCHIM” SRL.</li>
        </ul>
        <div class="col justify-center align-center w-full mt-32">
            <img src="{{ asset('resources/images/general/End-of-page.png') }}" alt="Emex by Romtehnochim - Incheiere pagina" width="216" height="20">
        </div>
    </div>
</div>


@endsection