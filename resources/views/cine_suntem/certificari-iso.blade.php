@extends('layout.layout')

@section('seo')
<title>Certificare sistem de management integrat ISO</title>
<meta name="keywords" content="certificare ISO, calitate ISO vopsele, management integrat al calitatii">
<meta name="description" content="Certificarea sistemului de management integrat al calitatii pentru producerea de lacuri, vopsele, tencuieli decorative si pardoseli epoxidice">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Management integrat al calitatii">
<meta property="og:image" content="https://emex.ro/images/social/Certificate-ISO-Instagram.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Certificate-ISO-Instagram.jpg"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="628"/>
<meta property="og:image:alt" content="Acreditari ISO ale Romtehnochim"/>
<meta property="og:description" content="Romtehnochim produce lacuri vopsele grunduri si tencuieli decorative profesionale sub certificarea sistemului ISO de management integrat al calitatii.">
<meta property="og:url" content="https://emex.ro/certificari-iso">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website"/>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/certificari.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Politica de Securitate</li></ul>
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
        <div class="slider-container">
            <button class="prev" onclick="prevSlide()">❮</button>
            <div class="relative cover certificate">
                <div id="iso_certificates_slider_wrapper" class="certificates-slider">
                    <div class="certificate-slide">
                        <img src="https://emex.ro/images/general/ISO-18001.png" width="246" height="348" alt="ISO 9001" class="responsive-img">
                        <div class="text-center mt-16">
                            <label class="cert_first">ISO-9001</label>
                        </div>
                    </div>
                    <div class="certificate-slide">
                        <img src="https://emex.ro/images/general/ISO-18001.png" width="246" height="348" alt="ISO 14001" class="responsive-img">
                        <div class="text-center mt-16">
                            <label class="cert_sec">ISO-14001</label>
                        </div>
                    </div>
                    <div class="certificate-slide">
                        <img src="https://emex.ro/images/general/ISO-18001.png" width="246" height="348" alt="ISO 18001" class="responsive-img">
                        <div class="text-center mt-16">
                            <label class="cert_third">ISO-18001</label>
                        </div>
                    </div>
                </div>
            </div>
            <button class="next" onclick="nextSlide()">❯</button>
        </div>
    </div>


</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const slides = document.querySelectorAll('.certificate-slide');
        const totalSlides = slides.length;

        function showSlide(index) {
            const sliderWrapper = document.getElementById('iso_certificates_slider_wrapper');
            if (index >= totalSlides) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = totalSlides - 1;
            } else {
                currentIndex = index;
            }
            sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        function nextSlide() {
            showSlide(currentIndex + 1);
        }

        function prevSlide() {
            showSlide(currentIndex - 1);
        }

        // Attach the functions to buttons
        document.querySelector('.next').addEventListener('click', nextSlide);
        document.querySelector('.prev').addEventListener('click', prevSlide);

    });
</script>

@endsection



