@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/servicii.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
@endsection

<?php
$baseUrl = url('/');
?>

@section('content')

<div class="servicii relative w-full col justify-center align-center header" id="acesh" style="background-image: url('resources/images/pardoseala-cuartz-epoxidica-stb-cover.jpg');">
    <h1 class="z-10">
        Pardoseala Epoxidica Cuartz STB<br>“Emex Quartz”<br>
    </h1>
    <a class="solicita z-10 mb-64 rounded-sm" href="{{ url('/solicita-cotatie') }}" title="Contact ofertare vopsire de pardoseli">
        Solicita Cotatie
    </a>
</div>

<div class="servicii main-container grid grid-2 gap-lg mt-32 rounded-sm section-gradient " id="aplicare_covor_epoxidic">
    <div class="px-8" id="landing_second_row">
        <h2>APLICARE COVOR EPOXIDIC DE CUARTZ</h2>
        <p>
            <span class="alineat_span"></span>Printre pardoselile epoxidice cu caracteristici de
            inalta performanta, se numara si <strong><em>Covorul Epoxidic Decorativ “Emex Quartz”</em></strong>,
            denumit adesea si <strong><em>Pardoseala Epoxidica STB</em></strong>. Fiind realizat prin elicoperizarea
            granulelor de cuartz pe o baza epoxidica, acest tip de acoperire se constituie intr-una din cele mai
            rezistente solutii existente, cu conditia sa fie realizata conform proceselor tehnologice stabilite de
            producator, si pusa in opera de catre personal specializat.
        </p>
        <div class="row align-center justify-between mt-32">
            <a href="{{ url('/pardoseala-epoxidica-decorativa-cuartz') }}" class="btn btn-blue-outline rounded-sm font-700">Vezi Produsul</a>
            <a href="{{ url('/doc/pardoseala-epoxidica-decorativa-cuartz-STB.pdf') }}" class="btn btn-blue rounded-sm font-700">Fisa Tehnica</a>
        </div>
    </div>

    <div class="px-8" id="landing_fourth_row">
        <h2>Proprietati generale ale Pardoselii Epoxidice “Emex Quartz”</h2>
        <p>
            <span class="alineat_span"></span>Principalele proprietati ale <strong>Covorului Epoxidic “Emex Quartz”</strong>, care
            recomanda utilizarea sa in zonele cele mai expuse, pentru aplicatii mai ales industriale, sunt:
        </p>
        <ul class="ul-feature">
            <li>Produs agrementat sanitar;</li>
            <li>Durata de viata min. 10 ani;</li>
            <li>Duritate excelenta;</li>
            <li>Aspect decorativ de exceptie;</li>
            <li>Rezistenta excelenta la uzura;</li>
            <li>Rezistenta mare la agenti corozivi;</li>
            <li>Rezistenta la variatii de temperatura;</li>
            <li>Rezistenta la vibratii si socuri mecanice;</li>
            <li>Rezistenta excelenta la inghet-dezghet.</li>
        </ul>
    </div>
</div>

<div class="servicii main-container mt-32">
    <h2 class="text-center">Performante covor epoxidic decorativ</h2>
    <div class="mt-32">
        <p>
            <span class="alineat_span"></span><strong><em>Pardoseala Epoxidica Decorativa “Emex Quartz”</em></strong> este un sistem de noua generatie,
            de duritate maxim posibila, cu performante mult superioare altor sisteme epoxidice de pardoseala. De regula, acest tip de pardoseala
            contine granule divers colorate, putand prezenta chiar modele abstracte. Este realizat prin inglobarea de granule de
            cuart colorat in masa realizata din rasini epoxidice, si elicopterizarea acestora, pana la obtinerea unei suprafete dure, compacte si uniforme.
        </p>
        <ul id="landing_first_list">
            <li>
                <strong>Covorul Decorativ Epoxidic</strong> este utilizat la realizarea de pardoseli
                interioare sau exterioare de mare duritate, in zone cu trafic intens si/sau pentru protectia
                spatiilor cu trafic intens si/sau de masini grele, ori expuse la factori mecanici extremi.
            </li>
            <li>
                Are rezistenta mare fata de expunerea la agresiuni chimice, asigura o protectie superioara,
                cu intretinere usoara, cu cerinte minime de reconditionare, foarte rare, si cu termene foarte indelungate de viata.
            </li>
        </ul>
    </div>
    {{-- <div id="landing_video_wrapper">
        <video controls width="250" height="168" class="responsive" poster="{{ $baseUrl }}/videos/Filmare-covor-epoxidic-cuartz-stb.jpg">
            <source src="{{ $baseUrl }}/videos/Pardoseala-covor-de-cuart-epoxidic.mp4" type="video/mp4">
            Vopsire cu sisteme epoxidice pentru pardoseli industriale, hale, zone cu circulatie intensa, hypermarket-uri, etc.
        </video>
    </div> --}}
    <div id="landing_video_wrapper">
        <video controls width="250" height="168" class="responsive" poster="https://vopsele.xyz/videos/Filmare-covor-epoxidic-cuartz-stb.jpg">
            <source src="https://vopsele.xyz/videos/Pardoseala-covor-de-cuart-epoxidic.mp4" type="video/mp4">
            Vopsire cu sisteme epoxidice pentru pardoseli industriale, hale, zone cu circulatie intensa, hypermarket-uri, etc.
        </video>
    </div>
</div>

<div class="main-container servicii" id="landing_fifth_row">
    <h2 class="text-center mb-16">Pasi in aplicarea Pardoselii Epoxidice STB</h2>
    <div>
        <p>
            <span class="alineat_span"></span>Aplicarea de
            <a href="{{ $baseUrl }}/pardoseala-epoxidica-decorativa-cuartz" title="Pardoseala epoxidica decorativa STB">
                <span class="link_color1">
                    <strong>
                        <em>Pardoseala Epoxidica Cuartz “Emex”</em>
                    </strong>
                </span>
            </a>,
            va realiza performantele optime numai daca operatiunile necesare sunt respectate intru totul.
            Operatiunile se vor efectua in ordinea lor fireasca, pentru realizarea corecta a lucrarii.
            Astfel:
        </p>
        <ul>
            <li>Se vor inlatura toate resturile de materiale adezive, mortare, gleturi ori stropiri accidentale cu diverse vopsele;</li>
            <li>Se va face o asperizare preliminara pentru evidentierea defectelor. Asperizarea va fi inlocuita in cu sablare in cazul in care pardoseala este impregnata cu uleiuri sau alte substante contaminante;</li>
            <li>Se repara toate fisurile sau alte imperfectiuni ale suportului cu un chit sau mortar epoxidic. In cazul in care s-a folosit sablarea, se va chitui intreaga suprafata, in strat foarte fin;</li>
            <li>Dupa uscare se va efectua slefuirea finala, urmata de periere si aspirare;</li>
            <li>Se aplica un strat de
                <a href="{{ $baseUrl }}/amorsa-impregnare-pardoseli-epoxidice" title="Grund epoxidic de amorsare beton">
                    <span class="link_color1"><strong><em>Amorsa Epoxidica de Impregnare “Emex”</em></strong></span>
                </a>, pentru stabilizarea suportului si compatibilizarea straturilor. Se va distribui si faina de cuartz
                peste amorsa umeda, pentru marirea aderentei suportului.
            </li>
            <li>Se amesteca particulele colorate de cuartz cu rasina epoxidica, iar pasta rezultata se intinde pe suprafata;</li>
            <li>In timpul intinderii amestecului de rasina, se distribuie granule de cuartz, cat mai egal posibil;</li>
            <li>Se face elicopterizarea stratului final, pana la obitnerea unei suprafete netede, dure, compacte;</li>
            <li>Se recomanda lacuirea finala, fie cu
                <a href="{{ $baseUrl }}/lac-epoxidic-sigilare" title="Lac epoxidic nesolventat pentru sigilare">
                    <span class="link_color1"><strong><em>Lac Epoxidic de Sigilare “Emex Epoxy Contact”</em></strong></span>
                </a>, fie cu
                <a href="{{ $baseUrl }}/lac-poliuretanic-protectie-radiatii" title="Lac de supralacuire si protectie UV">
                    <span class="link_color1"><strong><em>Lac Poliuretanic de Protectie “Emex UV Shield”</em></strong></span>
                </a>, care are si avantajul de a asigura protectia la lumina si radiatii UV.
            </li>
        </ul>
    </div>
</div>

{{-- <div class="sixth_top"></div>
<div class="main-container servicii mt-32" id="landing_sixth_row">
    <h2 class="text-center font-700">
        Pardoseli epoxidice “Emex Quartz” executate de Romtehnochim
    </h2>
    <div class="grid grid-4 gap-lg mt-32" id="landing_carousel_wrapper">
        <div>
            @include('partials.lightbox', [
                'id' => 'prod-lightbox1',
                'class' => 'cover cursor-pointer',
                'url' => $baseUrl . '/images/landing/stb/mici/Pardoseala-cuartz-epoxdica-depozit-legume.jpg',
                'lightbox_src' => $baseUrl . '/images/landing/stb/mari/Pardoseala-stb-depozit-legume.jpg',
                'alt' => 'Aplicare pardoseala epoxidica STB hala depozitare',
                'title' => 'Aplicare pardoseala epoxidica STB hala depozitare',
                'width' => '268',
                'height' => '173',
                'layout' => 'responsive',
                'lightbox_width' => '600',
                'lightbox_height' => '450',
            ])
        </div>

        <div>
            @include('partials.lightbox', [
                'id' => 'prod-lightbox2',
                'class' => 'cover cursor-pointer',
                'url' => $baseUrl . '/images/landing/stb/mici/Pardoseala-STB-epoxidic-scari-decorative.jpg',
                'lightbox_src' => $baseUrl . '/images/landing/stb/mari/Pardoseala-STB-scari-decorative.jpg',
                'alt' => 'Scari cu covor epoxidic cuartz STB',
                'title' => 'Scari cu covor epoxidic cuartz STB',
                'width' => '268',
                'height' => '173',
                'layout' => 'responsive',
                'lightbox_width' => '600',
                'lightbox_height' => '450',
            ])
        </div>

        <div>
            @include('partials.lightbox', [
                'id' => 'prod-lightbox4',
                'class' => 'cover cursor-pointer',
                'url' => $baseUrl . '/images/landing/stb/mici/Pardoseala-epoxidica-bucatarie.jpg',
                'lightbox_src' => $baseUrl . '/images/landing/stb/mari/Pardoseala-epoxidica-stb-bucatarie.jpg',
                'alt' => 'Pardoseala epoxidica sanitara in bucatarie',
                'title' => 'Pardoseala epoxidica sanitara in bucatarie',
                'width' => '268',
                'height' => '173',
                'layout' => 'responsive',
                'lightbox_width' => '600',
                'lightbox_height' => '450',
            ])
        </div>

        <div>
            @include('partials.lightbox', [
                'id' => 'prod-lightbox5',
                'class' => 'cover cursor-pointer',
                'url' => $baseUrl . '/images/landing/stb/mici/Pardoseala-stb-decorativa-epoxidica.jpg',
                'lightbox_src' => $baseUrl . '/images/landing/stb/mari/Covor-stb-decor.jpg',
                'alt' => 'Covor epoxidic industrial',
                'title' => 'Covor epoxidic industrial',
                'width' => '268',
                'height' => '173',
                'layout' => 'responsive',
                'lightbox_width' => '600',
                'lightbox_height' => '450',
            ])
        </div>

        <div>
            @include('partials.lightbox', [
                'id' => 'prod-lightbox6',
                'class' => 'cover cursor-pointer',
                'url' => $baseUrl . '/images/landing/stb/mici/Pardoseala-stb-epoxidica-hala-depozit.jpg',
                'lightbox_src' => $baseUrl . '/images/landing/stb/mari/Pardoseala-STB-hala-depozitare.jpg',
                'alt' => 'Covor de cuartz hala agricola depozitare',
                'title' => 'Covor de cuartz hala agricola depozitare',
                'width' => '268',
                'height' => '173',
                'layout' => 'responsive',
                'lightbox_width' => '600',
                'lightbox_height' => '450',
            ])
        </div>

        <div>
            @include('partials.lightbox', [
                'id' => 'prod-lightbox7',
                'class' => 'cover cursor-pointer',
                'url' => $baseUrl . '/images/landing/stb/mici/Pardoseala-stb-cuartz-epoxidic.jpg',
                'lightbox_src' => $baseUrl . '/images/landing/stb/mari/Pardoseala-stb-cuptor.jpg',
                'alt' => 'Aplicare covor epoxidic hala cuptor industrial',
                'title' => 'Aplicare covor epoxidic hala cuptor industrial',
                'width' => '268',
                'height' => '173',
                'layout' => 'responsive',
                'lightbox_width' => '600',
                'lightbox_height' => '450',
            ])
        </div>

        <div>
            @include('partials.lightbox', [
                'id' => 'prod-lightbox8',
                'class' => 'cover cursor-pointer',
                'url' => $baseUrl . '/images/landing/stb/mici/Pardoseala-stb-cuartz-epoxidic-hala.jpg',
                'lightbox_src' => $baseUrl . '/images/landing/stb/mari/Pardoseala-STB-hala-depozitare.jpg',
                'alt' => 'Covor cuartz epoxidic hala depozitare',
                'title' => 'Covor cuartz epoxidic hala depozitare',
                'width' => '268',
                'height' => '173',
                'layout' => 'responsive',
                'lightbox_width' => '600',
                'lightbox_height' => '450',
            ])
        </div>

        <div>
            @include('partials.lightbox', [
                'id' => 'prod-lightbox10',
                'class' => 'cover cursor-pointer',
                'url' => $baseUrl . '/images/landing/stb/mici/Pardoseala-stb-epoxidica-fabrica-bauturi.jpg',
                'lightbox_src' => $baseUrl . '/images/landing/stb/mari/Pardoseala-stb-fabrica-bauturi.jpg',
                'alt' => 'Pardoseala epoxidica STB in fabrica de bauturi',
                'title' => 'Pardoseala epoxidica STB in fabrica de bauturi',
                'width' => '268',
                'height' => '173',
                'layout' => 'responsive',
                'lightbox_width' => '600',
                'lightbox_height' => '450',
            ])
        </div>
    </div>
</div> --}}

@endsection
