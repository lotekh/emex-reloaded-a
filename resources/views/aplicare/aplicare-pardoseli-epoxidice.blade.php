@extends('aplicare.layout') 

@section('seo')
<title>Aplicare pardoseli epoxidice</title>
<meta name="description" content="Imagini cu pardoseli epoxidice aplicate de Romtehnochim cu produse epoxidice bicomponente Emex">
<meta name="keywords" content="aplicare pardoseala epoxidica, montaj epoxidica, aplicare rasina epoxidica">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Aplicare pardoseli epoxidice">
<meta property="og:image" content="https://emex.ro/images/social/Pardoseala-industriala-epoxidica-servicii-sm.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Pardoseala-industriala-epoxidica-servicii-sm.jpg" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="628" />
<meta property="og:image:alt" content="Aplicari pardoseli epoxy" />
<meta property="og:description" content="Romtehnochim ofera servicii de aplicare pardoseli epoxidice bicomponente, cu utilaje profesionale si personal specializat.">
<meta property="og:url" content="https://emex.ro/aplicare-pardoseli-epoxidice">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="Product" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Romtehnochim">
<meta name="twitter:image" content="https://emex.ro/images/social/Pardoseala-industriala-epoxidica-servicii-sm.jpg">
<meta name="twitter:title" content="Aplicare pardoseli industriale">
<meta name="twitter:description" content="Romtehnochim asigura servicii de aplicare pardoseli epoxidice">
<meta name="twitter:url" content="https://emex.ro/aplicare-pardoseli-epoxidice">
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bundled/aplicare.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/servicii">Servicii</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Aplicare pardoseli epoxidice</li></ul>
@endsection

@section('content')
<div class="aplicari relative w-full">
    <div class="header_img_bg col justify-center align-center" id="aplicari_pardoseli_epoxidice_paralax_img" style="background-image: url('resources/images/aplicare-pardoseli-epoxidice/Aplicari-pardoseli-epoxidice-industriale.jpg');">
      <h1 class="z-10">
        Vopsiri Decorative si Industriale de Pardoseala
      </h1>
    </div>
  </div>
  
  <div class="main-container aplicari mt-32" id="main">
    <h2 class="section-title text-center" id="aplicare_produs">EXEMPLE DE APLICARE PARDOSEALA EPOXIDICA &#8220;EMEX&#8221;</h2>
    <div class="grid grid-3" id="main_container_despre_noi_row">
      
      <!-- Imagine 1 -->
      <div class="aplicari_img_thumbnail">
        <x-lightbox 
          id="pardoseli-epoxidice-1"
          class="cover cursor-pointer"
          url="{{ asset('resources/images/aplicare-pardoseli-epoxidice/Epoxidica-Studio-Kanal-D.jpg') }}"
          lightboxSrc="{{ asset('resources/images/aplicare-pardoseli-epoxidice/Epoxidica-Studio-Kanal-D.jpg') }}"
          alt="Epoxidica Studio Kanal D"
          title="Epoxidica Studio Kanal D"
          width="355"
          height="265"
          layout="responsive"
          lightboxWidth="400"
          lightboxHeight="300"
        />
      </div>
  
      <!-- Imagine 2 -->
      <div class="aplicari_img_thumbnail">
        <x-lightbox 
          id="pardoseli-epoxidice-2"
          class="cover cursor-pointer"
          url="{{ asset('resources/images/aplicare-pardoseli-epoxidice/Epoxidica-Studio-Televiziune.jpg') }}"
          lightboxSrc="{{ asset('resources/images/aplicare-pardoseli-epoxidice/Epoxidica-Studio-Televiziune.jpg') }}"
          alt="Epoxidica Studio Televiziune"
          title="Epoxidica Studio Televiziune"
          width="355"
          height="265"
          layout="responsive"
          lightboxWidth="400"
          lightboxHeight="300"
        />
      </div>
  
      <!-- Imagine 3 -->
      <div class="aplicari_img_thumbnail">
        <x-lightbox 
          id="pardoseli-epoxidice-3"
          class="cover cursor-pointer"
          url="{{ asset('resources/images/aplicare-pardoseli-epoxidice/Pardoseala-Decorativa-Epoxidica.jpg') }}"
          lightboxSrc="{{ asset('resources/images/aplicare-pardoseli-epoxidice/Pardoseala-Decorativa-Epoxidica.jpg') }}"
          alt="Pardoseala Decorativa Epoxidica"
          title="Pardoseala Decorativa Epoxidica"
          width="355"
          height="265"
          layout="responsive"
          lightboxWidth="400"
          lightboxHeight="300"
        />
      </div>
  
      <!-- Imagine 4 -->
      <div class="aplicari_img_thumbnail">
        <x-lightbox 
          id="pardoseli-epoxidice-4"
          class="cover cursor-pointer"
          url="{{ asset('resources/images/aplicare-pardoseli-epoxidice/Pardoseala-Epoxidica-Kanal-D.jpg') }}"
          lightboxSrc="{{ asset('resources/images/aplicare-pardoseli-epoxidice/Pardoseala-Epoxidica-Kanal-D.jpg') }}"
          alt="Pardoseala Epoxidica Kanal D"
          title="Pardoseala Epoxidica Kanal D"
          width="355"
          height="265"
          layout="responsive"
          lightboxWidth="400"
          lightboxHeight="300"
        />
      </div>
  
      <!-- Imagine 5 -->
      <div class="aplicari_img_thumbnail">
        <x-lightbox 
          id="pardoseli-epoxidice-5"
          class="cover cursor-pointer"
          url="{{ asset('resources/images/aplicare-pardoseli-epoxidice/Pardoseala-Epoxidica-Studio-TV.jpg') }}"
          lightboxSrc="{{ asset('resources/images/aplicare-pardoseli-epoxidice/Pardoseala-Epoxidica-Studio-TV.jpg') }}"
          alt="Pardoseala Epoxidica Studio TV"
          title="Pardoseala Epoxidica Studio TV"
          width="355"
          height="265"
          layout="responsive"
          lightboxWidth="400"
          lightboxHeight="300"
        />
      </div>
  
      <!-- Imagine 6 -->
      <div class="aplicari_img_thumbnail">
        <x-lightbox 
          id="pardoseli-epoxidice-6"
          class="cover cursor-pointer"
          url="{{ asset('resources/images/aplicare-pardoseli-epoxidice/Pardoseala-Epoxidica-Televiziune.jpg') }}"
          lightboxSrc="{{ asset('resources/images/aplicare-pardoseli-epoxidice/Pardoseala-Epoxidica-Televiziune.jpg') }}"
          alt="Pardoseala Epoxidica Televiziune"
          title="Pardoseala Epoxidica Televiziune"
          width="355"
          height="265"
          layout="responsive"
          lightboxWidth="400"
          lightboxHeight="300"
        />
      </div>
  
    </div>
  
    <div class="col align-center">
      <div class="text-center mt-32">
        Calitatea mai slaba a pozelor este datorata extragerii lor din alt format. Toate imaginile sunt preluate din filmul care s-a realizat in timpul executarii lucrarilor.
        Filmul a fost realizat intr-un format mic, destinat canalelor internet.
      </div>
      <div class="row justify-center mt-32">
        <img width="216" height="20" src="{{ asset('resources/images/End-of-page.png') }}" alt="Emex by Romtehnochim - Incheiere pagina">
      </div>
    </div>
  </div>
  @endsection