@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/certificari.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Politica de Securitate</li></ul>
@endsection


@section('content')

<div class="certificari relative w-full">
    <div class="header_img_bg col justify-center align-center" id="header_img_bg" style="background-image: url('{{ asset('resources/images/Certificari-ISO-Romtehnochim.jpg') }}'); height: 500px;">
        <h1 class="text-center" id="certificari_iso_header">
            CERTIFICARI ISO DE CALITATE ALE <br> ROMTEHNOCHIM
        </h1>
    </div>
</div>

<div class="main-container">
    <h2 class="text-center">CERTIFICARI DE CALITATE ALE PRODUSELOR “EMEX”</h2>

    <div>
        <div class="relative cover certificate">
            <div id="iso_certificates_slider_wrapper" class="certificates-slider">
                <div class="certificate-slide">
                    <img src="https://emex.ro/images/general/ISO-18001.png" width="246" height="348" alt="ISO 9001:2015" class="responsive-img">
                    <div class="text-center mt-16">
                        <label class="cert_first">ISO 9001:2015</label>
                    </div>
                </div>
                <div class="certificate-slide">
                    <img src="https://emex.ro/images/general/ISO-18001.png" width="246" height="348" alt="ISO 14001:2015" class="responsive-img">
                    <div class="text-center mt-16">
                        <label class="cert_sec">ISO 14001:2015</label>
                    </div>
                </div>
                <div class="certificate-slide">
                    <img src="https://emex.ro/images/general/ISO-18001.png" width="246" height="348" alt="ISO 45001:2018" class="responsive-img">
                    <div class="text-center mt-16">
                        <label class="cert_third">ISO 45001:2018</label>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection