<?php //Local Business ?>
<?php
$local_business_json = <<<js
{
  "@context":"http://www.schema.org",
  "@type":"HomeAndConstructionBusiness",
  "name":"Emex by Romtehnochim",
  "alternateName":"Emex - Vopsele | Tencuieli | Pardoseli",
  "telephone":"[+40214571693]",
  "email":[
     "office@emex.ro",
     "marketing@emex.ro"
  ],
  "url":"https://emex.ro/",
  "image":{
     "@type":"imageObject",
     "url":"https://emex.ro/images/general/Fabrica-Emex.jpg",
     "width":"1920",
     "height":"1080"
  },
  "description":"Productie lacuri vopsele tencuieli pardoseli. Productie vopsele epoxidice poliuretanice poliesterice clorcauciuc. Servicii de aplicari profesionale de pardoseli epoxidice si poliuretanice.",
  "priceRange":"10 - 100 Ron",
  "paymentAccepted":[
     "cash",
     "check",
     "credit card",
     "invoice"
  ],
  "address":{
     "@type":"PostalAddress",
     "streetAddress":"Str. Steaua Sudului Nr. 22",
     "addressLocality":"Jilava",
     "addressRegion":"Ilfov",
     "postalCode":"77120",
     "addressCountry":"Romania"
  },
  "geo":{
     "@type":"GeoCoordinates",
     "latitude":"44.328689",
     "longitude":"26.067273"
  },
  "hasMap":"https://www.google.com/maps/@44.3284708,26.0671007,16z",
  "openingHours":"Mo, Tu, We, Th, Fr 08:00-16:30",
  "contactPoint":{
     "@type":"ContactPoint",
     "contactType":"customer support",
     "telephone":"[+40724509552]"
  }
}
js;

return $local_business_json;
?>
