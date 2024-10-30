@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ minify('css/produs.css') }}">
    <link rel="stylesheet" href="{{ minify('css/product-card.css') }}">
    <link rel="stylesheet" href="{{ minify('css/product-page.css') }}">
    <link rel="stylesheet" href="{{ minify('css/tabs.css') }}">
    <link rel="stylesheet" href="{{ minify('css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ minify('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ minify('css/aplicare.css') }}">
@endsection

@section('content')

    <div class="aplicari relative w-full">
        <div class="header_img_bg col justify-center align-center" style="background-image:url('@yield('header_image_source')');">
            {{-- <h1 class="z-10" id="h1-aplicare-bg">{!! @yield('header_title') !!}</h1> --}}
            <h1 class="z-10" id="h1-aplicare-bg">@yield('header_title')</h1>
        </div>
    </div>

    <div class="main-container product-page mt-32" id="product_container">
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
    </script>

@endsection

