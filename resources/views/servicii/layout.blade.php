@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/servicii.min.css') }}">
@endsection

<?php
$baseUrl = url('/');
?>

@section('content')

<div class="servicii relative w-full col justify-center align-center header" id="acesh" style="background-image: url('resources/images/pardoseala-cuartz-epoxidica-stb-cover.jpg');">
    <h1 class="z-10">
        @yield('header_title')
    </h1>
    <a class="solicita z-10 mb-64 rounded-sm" href="{{ url('/solicita-cotatie') }}" title="Contact ofertare vopsire de pardoseli">
        Solicita Cotatie
    </a>
</div>

<div class="servicii main-container grid grid-2 gap-lg mt-32 rounded-sm section-gradient " id="aplicare_covor_epoxidic">
    <div class="px-8" id="landing_second_row">
        <h2>@yield('section_1_title')</h2>
        <p>
            <span class="alineat_span"></span>
            @yield('section_1_text')
        </p>
        <div class="row align-center justify-between mt-32">
            <a href="@yield('link_vezi_produsul')" class="btn btn-blue-outline rounded-sm font-700">Vezi Produsul</a>
            <a href="@yield('link_fisa_tehnica')" class="btn btn-blue rounded-sm font-700">Fisa Tehnica</a>
        </div>
    </div>

    <div class="px-8" id="landing_fourth_row">
        <h2>@yield('section_2_title')</h2>
        <p>
            <span class="alineat_span"></span>
            @yield('section_2_text')
        </p>
        <ul class="ul-feature" style="list-style: url('{{ asset('resources/images/checklist-icon.png') }}') none outside;">
            @yield('section_2_list')
        </ul>
    </div>
</div>

<div class="servicii main-container mt-32">
    <h2 class="text-center">@yield('section_3_title')</h2>
    <div class="mt-32">
        <p>
            <span class="alineat_span"></span>
            @yield('section_3_text')
        </p>
        <ul id="landing_first_list">
            @yield('section_3_list')
        </ul>
    </div>
    <div id="landing_video_wrapper">
        @yield('video')
    </div>
</div>

<div class="main-container servicii" id="landing_fifth_row">
    <h2 class="text-center mb-16">@yield('section_4_title')</h2>
    <div>
        <p>
            @yield('section_4_text')
        </p>
        <ul>
            @yield('section_4_list')
        </ul>
    </div>
</div>

<div class="sixth_top"></div>
<div class="main-container servicii mt-32" id="landing_sixth_row">
    <h2 class="text-center font-700">
        @yield('section_5_title')
    </h2>
    <div class="grid grid-4 gap-lg mt-32" id="landing_carousel_wrapper">
        @yield('section_5_images')
    </div>
</div>

<div id="global-lightbox" class="lightbox hidden">
    <div class="lightbox-content">
        <span class="close-btn-servicii" style=" background-image: url('{{ asset('resources/images/sprite.png') }}');" onclick="closeServiciiLightbox()"></span>
        <img id="global-lightbox-image" src="{{ asset('images/landing/stb/mici/Pardoseala-cuartz-epoxdica-depozit-legume.jpg') }}" alt="global-lightbox image" title="Global Lightbox Image">
    </div>
</div>

<script>

    function openServiciiLightbox(image) {
        const lightbox = document.getElementById('global-lightbox');
        const lightboxImage = document.getElementById('global-lightbox-image');

        // Set the attributes for the image
        lightboxImage.src = image.getAttribute('data-lightbox-src');
        lightboxImage.alt = image.getAttribute('data-lightbox-alt') || '';
        lightboxImage.title = image.getAttribute('data-lightbox-title') || '';

        // Show the lightbox
        lightbox.classList.remove('hidden');
    }

    function closeServiciiLightbox() {
        const lightbox = document.getElementById('global-lightbox');

        // Hide the lightbox
        lightbox.classList.add('hidden');
    }

</script>

@endsection
