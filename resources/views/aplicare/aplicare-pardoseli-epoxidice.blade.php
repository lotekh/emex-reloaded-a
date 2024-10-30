@extends('aplicare.layout') 

@section('css')
  <link rel="stylesheet" href="{{ minify('css/aplicare.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/servicii">Servicii</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Aplicare pardoseli epoxidice</li></ul>
@endsection

@section('content')
<div class="aplicari relative w-full">
    <div class="header_img_bg col justify-center align-center" id="aplicari_pardoseli_epoxidice_paralax_img" style="background-image: url('resources/images/aplicare-pardoseli-epoxidice/Aplicari-pardoseli-epoxidice-industriale.jpg');">
      <h1 class="z-10" id="aplicare_produs">
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