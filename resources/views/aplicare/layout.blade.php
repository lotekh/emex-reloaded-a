@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/aplicare-extended.min.css') }}">
@endsection

@section('content')

    <div class="aplicari relative w-full">
        <div class="header_img_bg col justify-center align-center" style="background-image:url('@yield('header_image_source')');">
            <h1 class="z-10" id="h1-aplicare-bg">@yield('header_title')</h1>
        </div>
    </div>

    <div class="aplicari main-container product-page mt-32" id="product_container">
        <div class="mt-16 mt-custom">
            <div class="tabs-selector-row">
                @yield('tab-buttons')
            </div>

            <div class="tab-content-container">
                @yield('tab_contents')
            </div>
        </div>
    </div>

    <div class="main-container grid grid-3 gap-lg align-center mt-32" id="aspd">
        @yield('images')
    </div>

    <div id="global-lightbox" class="lightbox hidden">
        <div class="lightbox-content">
            <span class="close-btn" style=" background-image: url('{{ asset('resources/images/sprite.png') }}');" onclick="closeServiciiLightbox()"></span>
            <img id="global-lightbox-image" src="{{ asset('images/landing/stb/mici/Pardoseala-cuartz-epoxdica-depozit-legume.jpg') }}" alt="global-lightbox image" title="Global Lightbox Image">
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

    function openImageLightbox(image) {
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

@include('components.sidebar-contact', ['secondary_title' =>  isset($secondary_title) ? $secondary_title : 'Aplicarea Vopselelor Lavabile “Emex”'])


@endsection

