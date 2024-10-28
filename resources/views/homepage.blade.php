@extends('layout.layout')

<?php
// dd('test');
?>
@section('css')
    <link rel="stylesheet" href="{{ minify('css/homepage.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs ellipsis"><a href="/">Acasa</a></li></ul>
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




