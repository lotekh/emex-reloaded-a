@extends('aplicare.layout') 

@section('seo')
<title>Aplicari vopsele pardoseli</title>
<meta name="description" content="Imagini cu vopsiri de pardoseala cu vopsele bicomponente epoxidice sau poliuretanice Emex, realizate de Romtehnochim">
<meta name="keywords" content="vopsea pardoseala, epoxidica pardoseli, vopsire bicomponenta beton">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Aplicari vopsele pardoseli">
<meta property="og:image" content="https://emex.ro/images/social/Aplicari-vopsele-pardoseli-sm.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Aplicari-vopsele-pardoseli-sm.jpg" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="628" />
<meta property="og:image:alt" content="Aplicari vopsele bicomponente de pardoseala" />
<meta property="og:description" content="Romtehnochim asigura serviciu de aplicare pentru toate vopselele bicomponente, epoxidice, poliuretanice, poliesterice fabricate sub marca Emex.">
<meta property="og:url" content="https://emex.ro/aplicari-vopsele-pardoseli">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="Product" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Romtehnochim">
<meta name="twitter:image" content="https://emex.ro/images/social/Aplicari-vopsele-pardoseli-sm.jpg">
<meta name="twitter:title" content="Vopsele bicomponente de pardoseli">
<meta name="twitter:description" content="Vopsiri epoxidice, poliuretanice sau poliesterice Emex pentru pardoseli, realizate de Romtehnochim">
<meta name="twitter:url" content="https://emex.ro/aplicari-vopsele-pardoseli">
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bundled/aplicare.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bundled/servicii.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class=" -ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Aplicari Vopsele Pardoseli</li></ul>
@endsection

@section('content')
<div class="aplicari relative w-full">
  <div class="header_img_bg col justify-center align-center" id="aplicari_vopsele_pardoseli_paralax_img" style="background-image: url('resources/images/aplicari-vopsele-pardoseli/Vopsire-epoxidica-hala-industriala-servicii.jpg');">
    <h1 class="z-10" id="h1-aplicare-bg">Vopsiri Decorative si Industriale de Pardoseala</h1>
  </div>
</div>

<div class="main-container servicii mt-32" id="landing_sixth_row">
  
    <h2 class="section-title text-center" id="aplicare_produs_pardoseli">
      EXEMPLE DE VOPSIRI DE PARDOSELI DIN BETON
    </h2>

    <div class="grid grid-4 gap-lg mt-32" id="landing_carousel_wrapper">
      
      <div>
        <x-lightbox 
            id="prod-lightbox1"
            class="cover cursor-pointer"
            url="{{ asset('images/landing/autonivelanta/mici/Pardoseala-autonivelanta-epoxidica-restaurant.jpg') }}"
            lightboxSrc="{{ asset('images/landing/autonivelanta/mari/Pardoseala-epoxidica-autonivelanta-club.jpg') }}"
            alt="Pardoseala epoxidica executata de Romtehnochim"
            title="Pardoseala epoxidica executata de Romtehnochim"
            width="268"
            height="173"
            layout="responsive"
            lightboxWidth="600"
            lightboxHeight="450"
        />
      </div>
    
      <div>
          <x-lightbox 
              id="prod-lightbox2"
              class="cover cursor-pointer"
              url="{{ asset('images/landing/autonivelanta/mici/Pardoseala-autonivelanta-epoxidica-tipografie.jpg') }}"
              lightboxSrc="{{ asset('images/landing/autonivelanta/mari/Pardoseala-epoxidica-tipografie.jpg') }}"
              alt="Pardoseala epoxidica aplicata de Romtehnochim"
              title="Pardoseala epoxidica aplicata de Romtehnochim"
              width="268"
              height="173"
              layout="responsive"
              lightboxWidth="600"
              lightboxHeight="450"
          />
      </div>
      
      <div>
          <x-lightbox 
              id="prod-lightbox3"
              class="cover cursor-pointer"
              url="{{ asset('images/landing/autonivelanta/mici/Pardoseala-epoxidica-autonivelanta-crama.jpg') }}"
              lightboxSrc="{{ asset('images/landing/autonivelanta/mari/Pardoseala-autonivelanta-crama.jpg') }}"
              alt="Romtehnochim - Turnare pardoseala epoxidica autonivelanta"
              title="Romtehnochim - Turnare pardoseala epoxidica autonivelanta"
              width="268"
              height="173"
              layout="responsive"
              lightboxWidth="600"
              lightboxHeight="450"
          />
      </div>
      
      <div>
          <x-lightbox 
              id="prod-lightbox5"
              class="cover cursor-pointer"
              url="{{ asset('images/landing/autonivelanta/mici/Pardoseala-epoxidica-living.jpg') }}"
              lightboxSrc="{{ asset('images/landing/autonivelanta/mari/Pardoseala-living-vila.jpg') }}"
              alt="Turnare epoxidica autonivelanta executata de Romtehnochim"
              title="Turnare epoxidica autonivelanta executata de Romtehnochim"
              width="268"
              height="173"
              layout="responsive"
              lightboxWidth="600"
              lightboxHeight="450"
          />
      </div>
      
      <div>
          <x-lightbox 
              id="prod-lightbox8"
              class="cover cursor-pointer"
              url="{{ asset('images/landing/autonivelanta/mici/Pardoseala-epoxidica-trafic-gara.jpg') }}"
              lightboxSrc="{{ asset('images/landing/autonivelanta/mari/Pardoseala-autonivelanta-gara.jpg') }}"
              alt="Spatiu cu trafic intens - pardoseala epoxidica"
              title="Spatiu cu trafic intens - pardoseala epoxidica"
              width="268"
              height="173"
              layout="responsive"
              lightboxWidth="600"
              lightboxHeight="450"
          />
      </div>
      
      <div>
          <x-lightbox 
              id="prod-lightbox9"
              class="cover cursor-pointer"
              url="{{ asset('images/landing/autonivelanta/mici/Pardoseala-industriala-autonivelanta-hala-productie.jpg') }}"
              lightboxSrc="{{ asset('images/landing/autonivelanta/mari/Pardoseala-autonivelanta-industriala.jpg') }}"
              alt="Autonivelanta epoxidica aplicata de Romtehnochim"
              title="Autonivelanta epoxidica aplicata de Romtehnochim"
              width="268"
              height="173"
              layout="responsive"
              lightboxWidth="600"
              lightboxHeight="450"
          />
      </div>
      
      <div>
          <x-lightbox 
              id="prod-lightbox10"
              class="cover cursor-pointer"
              url="{{ asset('images/landing/autonivelanta/mici/Salon-medical-pardoseala-epoxidica.jpg') }}"
              lightboxSrc="{{ asset('images/landing/autonivelanta/mari/Epoxidica-autonivelanta-sala-radiografie.jpg') }}"
              alt="Salon medical protejat cu pardoseala epoxidica"
              title="Salon medical protejat cu pardoseala epoxidica"
              width="268"
              height="173"
              layout="responsive"
              lightboxWidth="600"
              lightboxHeight="450"
          />
      </div>
      
      <div>
          <x-lightbox 
              id="prod-lightbox11"
              class="cover cursor-pointer"
              url="{{ asset('images/landing/autonivelanta/mici/Pardoseala-industriala-epoxidica.jpg') }}"
              lightboxSrc="{{ asset('images/landing/autonivelanta/mari/Pardoseala-autonivelanta-hala-productie.jpg') }}"
              alt="Autonivelanta epoxidica industriala - executie Romtehnochim"
              title="Autonivelanta epoxidica industriala - executie Romtehnochim"
              width="268"
              height="173"
              layout="responsive"
              lightboxWidth="600"
              lightboxHeight="450"
          />
      </div>

    </div>
</div>

<div id="global-lightbox" class="lightbox hidden">
    <div class="lightbox-content">
        <span class="close-btn" style=" background-image: url('{{ asset('resources/images/sprite.png') }}');" onclick="closeServiciiLightbox()"></span>
        <img id="global-lightbox-image" src="{{ asset('images/landing/stb/mici/Pardoseala-cuartz-epoxdica-depozit-legume.jpg') }}" alt="global-lightbox image" title="Global Lightbox Image">
    </div>
</div>

<script>

  function openServiciiLightbox(image) {
      const lightbox = document.getElementById('global-lightbox');
      const lightboxImage = document.getElementById('global-lightbox-image');

      // Set the attributes for the image
      lightboxImage.src = image.getAttribute('data-lightbox-src');
      lightboxImage.alt = image.getAttribute('data-lightbox-alt') || '';
      lightboxImage.title = image.getAttribute('data-lightbox-title') || '';

      // Show the lightbox
      lightbox.classList.remove('hidden');
  }

  function closeServiciiLightbox() {
      const lightbox = document.getElementById('global-lightbox');

      // Hide the lightbox
      lightbox.classList.add('hidden');
  }

</script>

@endsection
