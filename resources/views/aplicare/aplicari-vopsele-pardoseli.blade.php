@extends('aplicare.layout') 

@section('css')
  <link rel="stylesheet" href="/{{ minify('css/aplicare.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Aplicari Vopsele Pardoseli</li></ul>
@endsection

@section('content')
<div class="aplicari relative w-full">
  <div class="header_img_bg col justify-center align-center" id="aplicari_vopsele_pardoseli_paralax_img" style="background-image: url('resources/images/aplicari-vopsele-pardoseli/Vopsire-epoxidica-hala-industriala-servicii.jpg');">
    <h1 class="z-10">Vopsiri Decorative si Industriale de Pardoseala</h1>
  </div>
</div>

<div class="main-container aplicari mt-32" id="main">
  <h2 class="section-title text-center" id="aplicare_produs">EXEMPLE DE VOPSIRI DE PARDOSELI DIN BETON</h2>
  
  <div class="grid grid-3" id="main_container_despre_noi_row">
    <div class="aplicari_img_thumbnail">
      <x-lightbox 
        id="produs-lightbox1"
        class="cover cursor-pointer"
        url="{{ asset('resources/aplicari-vopsele-pardoseli/Epoxidica-Hala-Productie.jpg') }}"
        lightboxSrc="{{ asset('resources/aplicari-vopsele-pardoseli/Epoxidica-Hala-Productie.jpg') }}"
        alt="Hala Productie"
        title="Hala Productie"
        width="355"
        height="265"
        layout="responsive"
        lightboxWidth="400"
        lightboxHeight="300"
      />
    </div>

    <div class="aplicari_img_thumbnail">
      <x-lightbox 
        id="produs-lightbox2"
        class="cover cursor-pointer"
        url="{{ asset('resources/aplicari-vopsele-pardoseli/Epoxidica-Service-Auto.jpg') }}"
        lightboxSrc="{{ asset('resources/aplicari-vopsele-pardoseli/Epoxidica-Service-Auto.jpg') }}"
        alt="Service Auto"
        title="Service Auto"
        width="355"
        height="265"
        layout="responsive"
        lightboxWidth="400"
        lightboxHeight="300"
      />
    </div>

    <div class="aplicari_img_thumbnail">
      <x-lightbox 
        id="produs-lightbox3"
        class="cover cursor-pointer"
        url="{{ asset('resources/aplicari-vopsele-pardoseli/Membrana-Poliuretanica-Hidroizolanta.jpg') }}"
        lightboxSrc="{{ asset('resources/aplicari-vopsele-pardoseli/Membrana-Poliuretanica-Hidroizolanta.jpg') }}"
        alt="Membrana Poliuretanica Hidroizolanta"
        title="Membrana Poliuretanica Hidroizolanta"
        width="355"
        height="265"
        layout="responsive"
        lightboxWidth="400"
        lightboxHeight="300"
      />
    </div>

    <!-- Adaugă restul de imagini în același mod -->
    <div class="aplicari_img_thumbnail">
      <x-lightbox 
        id="produs-lightbox4"
        class="cover cursor-pointer"
        url="{{ asset('resources/aplicari-vopsele-pardoseli/Vopsea-Epoxidica-Scari.jpg') }}"
        lightboxSrc="{{ asset('resources/aplicari-vopsele-pardoseli/Vopsea-Epoxidica-Scari.jpg') }}"
        alt="Vopsea Epoxidica Scari"
        title="Vopsea Epoxidica Scari"
        width="355"
        height="265"
        layout="responsive"
        lightboxWidth="400"
        lightboxHeight="300"
      />
    </div>

    <div class="aplicari_img_thumbnail">
      <x-lightbox 
        id="produs-lightbox5"
        class="cover cursor-pointer"
        url="{{ asset('resources/aplicari-vopsele-pardoseli/Vopsire-Epoxidica-Hala.jpg') }}"
        lightboxSrc="{{ asset('resources/aplicari-vopsele-pardoseli/Vopsire-Epoxidica-Hala.jpg') }}"
        alt="Vopsire Epoxidica Hala"
        title="Vopsire Epoxidica Hala"
        width="355"
        height="265"
        layout="responsive"
        lightboxWidth="400"
        lightboxHeight="300"
      />
    </div>

    <div class="aplicari_img_thumbnail">
      <x-lightbox 
          id="produs-lightbox6"
          class="cover cursor-pointer"
          url="{{ asset('resources/aplicari-vopsele-pardoseli/Vopsire-Epoxidica-Pardoseala-Bar.jpg') }}"
          lightboxSrc="{{ asset('resources/aplicari-vopsele-pardoseli/Vopsire-Epoxidica-Pardoseala-Bar.jpg') }}"
          alt="Vopsire Epoxidica Pardoseala Bar"
          title="Vopsire Epoxidica Pardoseala Bar"
          width="355"
          height="265"
          layout="responsive"
          lightboxWidth="400"
          lightboxHeight="300"
      />
  </div>
  
  <div class="aplicari_img_thumbnail">
      <x-lightbox 
          id="produs-lightbox7"
          class="cover cursor-pointer"
          url="{{ asset('resources/aplicari-vopsele-pardoseli/Vopsire-Hala-Productie.jpg') }}"
          lightboxSrc="{{ asset('resources/aplicari-vopsele-pardoseli/Vopsire-Hala-Productie.jpg') }}"
          alt="Vopsire Hala Productie"
          title="Vopsire Hala Productie"
          width="355"
          height="265"
          layout="responsive"
          lightboxWidth="400"
          lightboxHeight="300"
      />
  </div>
  
  <div class="aplicari_img_thumbnail">
      <x-lightbox 
          id="produs-lightbox8"
          class="cover cursor-pointer"
          url="{{ asset('resources/aplicari-vopsele-pardoseli/Vopsire-Poliuretanica-Alei.jpg') }}"
          lightboxSrc="{{ asset('resources/aplicari-vopsele-pardoseli/Vopsire-Poliuretanica-Alei.jpg') }}"
          alt="Vopsire Poliuretanica Alei"
          title="Vopsire Poliuretanica Alei"
          width="355"
          height="265"
          layout="responsive"
          lightboxWidth="400"
          lightboxHeight="300"
      />
  </div>
  
  <div class="aplicari_img_thumbnail">
      <x-lightbox 
          id="produs-lightbox9"
          class="cover cursor-pointer"
          url="{{ asset('resources/aplicari-vopsele-pardoseli/Vopsire-Poliuretanica-Hala.jpg') }}"
          lightboxSrc="{{ asset('resources/aplicari-vopsele-pardoseli/Vopsire-Poliuretanica-Hala.jpg') }}"
          alt="Vopsire Poliuretanica Hala"
          title="Vopsire Poliuretanica Hala"
          width="355"
          height="265"
          layout="responsive"
          lightboxWidth="400"
          lightboxHeight="300"
      />
  </div>
  

  </div>

  <div class="row justify-center mt-32">
    <img src="{{ asset('resources/images/general/End-of-page.png') }}" alt="Emex by Romtehnochim - Incheiere pagina" width="216" height="20">
  </div>
</div>
@endsection
