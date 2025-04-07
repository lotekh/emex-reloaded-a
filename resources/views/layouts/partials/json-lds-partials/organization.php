<?php //Organization ?>

<?php
$organization_json = <<<js
{
  "@context":"http://schema.org",
  "@type":"Organization",
  "url":"https://emex.ro/",
  "name":"Emex by Romtehnochim",
  "alternateName":"Emex - Vopsele | Tencuieli | Pardoseli",
  "image":{
     "@type":"imageObject",
     "url":"https://emex.ro/images/general/Fabrica-Emex.jpg",
     "width":"1920",
     "height":"1080"
  },
  "brand":"Emex",
  "description":"“Romtehnochim” ofera, in cadrul gamei de produse “Emex”, atat produse industriale, profesionale, cat si DIY, cum ar fi: lacuri, vopsele si grunduri alchidice, vopsea lavabila, tencuiala decorativa acrilica si siliconica, vopsele si pardoseli epoxidice, poliuretanice sau poliesterice, vopsele pentru tigla, vopsea hidroizolanta, etc.",
  "sameAs":[
     "https://www.facebook.com/EmexByRomtehnochim/",
     "https://www.linkedin.com/company/romtehnochim",
     "https://ro.pinterest.com/romtehnochim/",
     "https://twitter.com/Romtehnochim",
     "https://www.youtube.com/c/EmexRomtehnochim",
     "https://www.instagram.com/emexbyromtehnochim/",
     "https://blog.emex.ro/",
     "https://romtehnochim.blogspot.com/"
  ],
  "address":{
     "addressCountry":"Ro",
     "addressLocality":"Jilava",
     "postalCode":"77120",
     "streetAddress":"Steaua Sudului Nr. 22",
     "addressRegion":"Jilava",
     "Telephone":"[+40214571693]"
  }
}
js;

return $organization_json;
?>
