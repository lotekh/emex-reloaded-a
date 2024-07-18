@extends('layout.layout')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endsection


@section('content')

    <div class="w-full" id="homepage">
        @include('site.partials.homepage-slider')
        {{-- <div id="homepage-header" style="background-image: url('{{ asset('images/images/Lacuri-si-vopsele-emex.jpg') }}')">
            <div class="main-container grid-3">
                
                <div class="header_img_bg col justify-center align-center" id="mod_avl">
                    <h1 class="z-10">
                        Vopsele, Tencuieli, Pardoseli<br>EMEX By Romtehnochim
                    </h1>
                </div>
            </div>
        </div> --}}



        @include('site.partials.homepage-about')


        <div class="bg-blue" id="hp_first_paralax">
        <div class="container hp_paralax_text">
            &#8220;Emex&#8221; - Performanta si profesionalism !
        </div>
        </div>
        @include('site.partials.homepage-cards')
    </div>


@endsection

@include('components.sidebar-contact', ['secondary_title' => 'vopsele'])




