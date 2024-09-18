@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/politica-de-securitate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabs.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Politica de Mediu</li></ul>
@endsection

@section('content')
<div class="politica relative w-full">
    <div class="header_img_bg col justify-center align-center" id="header_img_bg" style="background-image: url('{{ asset('resources/images/securitate-in-munca.jpg') }}'); height: 500px;">
        <h1 class="text-center" id="politica_de_securitate_header">
            POLITICA DE SANATATE SI SECURITATE IN MUNCA A<br>ROMTEHNOCHIM
        </h1>
    </div>
</div>
@endsection