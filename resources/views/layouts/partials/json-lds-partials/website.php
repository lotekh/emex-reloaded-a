<?php
$website_json = <<<js
{
  "@context":"http://schema.org",
  "@type":"WebSite",
  "inLanguage":"ro-RO",
  "isFamilyFriendly":"http://schema.org/True",
  "copyrightHolder":{
     "@type":"Corporation",
     "name":"Emex by Romtehnochim"
  },
  "copyrightYear":"2020",
  "name":"Emex by Romtehnochim",
  "alternateName":"Emex – Vopsele | Tencuieli | Pardoseli",
  "url":"https://emex.ro",
  "image":{
     "@type":"imageObject",
     "url":"https://emex.ro/images/general/Fabrica-Emex.webp",
     "width":"1920",
     "height":"1080"
  },
  "headline":"Romtehnochim este producator de vopsele, tencuieli, pardoseli sub brandul “Emex”",
  "description":"Romtehnochim, este ✅ Producator de Lacuri, Vopsele, Tencuieli si Pardoseli sub brandul ⭐ “Emex”, ca: vopsea epoxidica, tencuiala decorativa, vopsea lavabila, pardoseala epoxidica sau poliuretanica. Brandul “Emex” se remarca in Romania, in special, prin calitatea excelenta si constanta acesteia. ",
  "publisher":{
     "@type":"Corporation",
     "name":"Emex by Romtehnochim",
     "logo":{
        "@type":"imageObject",
        "url":"https://emex.ro/images/Logo-json.png",
        "width":"750",
        "height":"300"
     }
  },
  "potentialAction":{
     "@type":"SearchAction",
     "target":"https://query.emex.ro/search?q={search_term_string}",
     "query-input":"required name=search_term_string"
  }
}
js;

return $website_json;
?>