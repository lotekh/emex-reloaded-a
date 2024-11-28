<?php //Corporation ?>
<?php
$corporation_json = <<<js
{
  "@context":"http://www.schema.org",
  "@type":"Corporation",
  "name":"Emex by Romtehnochim",
  "alternateName":"Emex - Vopsele | Tencuieli | Pardoseli",
  "url":"https://emex.ro/",
  "logo":"https://emex.ro/images/Logo-json.png",
  "image":{
     "@type":"imageObject",
     "url":"https://emex.ro/images/general/Fabrica-Emex.jpg",
     "width":"1920",
     "height":"1080"
  },
  "description":"Romtehnochim firma certificata ISO 9001, 14001 si 18001 este producatoare de vopsea lavabila, tencuiala decorativa, vopsea clorcauciuc de trafic sau piscina, vopsea si pardoseala epoxidica sau poliuretanica, vopsea de tigla, vopsea metalizata, vopsele pentru trafic rutier, vopsea termorezistenta, alte vopsele profesionale.",
  "address":{
     "@type":"PostalAddress",
     "streetAddress":"Str. Steaua Sudului, Nr. 22",
     "addressLocality":"Jilava",
     "addressRegion":"Ilfov",
     "postalCode":"77120",
     "addressCountry":"Romania"
  },
  "contactPoint":{
     "@type":"ContactPoint",
     "telephone":"[+40724509552]",
     "name":"secretariat",
     "email":[
        "office@emex.ro",
        "marketing@emex.ro"
     ],
     "contacttype":"customer support"
  }
}
js;

return $corporation_json;
?>
