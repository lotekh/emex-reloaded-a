@extends('layout.layout')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endsection


@section('content')

    <div class="w-full" id="homepage">
        @include('site.partials.homepage-slider')



        @include('site.partials.homepage-about')


        <div class="bg-blue" id="hp_first_paralax">
        <div class="container hp_paralax_text">
            &#8220;Emex&#8221; - Performanta si profesionalism !
        </div>
        </div>
        @include('site.partials.homepage-cards')
    </div>


@endsection

{{-- @include('components.sidebar-contact', ['secondary_title' => 'vopsele']) --}}




