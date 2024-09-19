@extends('layout.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/retur.css') }}">
@endsection

@section('breadcrumbs')

@endsection

@section('content')
<div class="hidden-xs">
    <div class="header_img_bg" id="retur_header">
        <div class="hibc">
            <div class="hibcsc">
                <h1>POLITICA DE RETUR A ROMTEHNOCHIM</h1>
            </div>
        </div>
    </div>
</div>

<div class="main-container col politica" id="despre_noi_content_wrapper">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="despre_noi_content_wrapper">
            <div class="despre_noi_section">
                <div class="politica_overwrite_div" id="ap">
                    <h2 class="font-xl-red text-center">POLITICA DE RETURNARE A PRODUSELOR</h2>
                    <h2 class="h2-style">1. GENERALITATI</h2>
                    <p><span class="alineat_span"></span>Produsele “Emex” sunt destinate utilizarii profesionale...</p>
                    <!-- Restul conținutului copiat din versiunea ta -->
                    <p class="text-center">
                        <img width="216" height="20" src="{{ asset('resources/images/general/End-of-page.png') }}" alt="Emex by Romtehnochim - Incheiere pagina">
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


