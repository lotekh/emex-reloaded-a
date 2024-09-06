<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Tigla Metalica" ) {
  $consum_vopsea = $suprafata * 0.18;
  $intaritor = $consum_vopsea * 0.2;
  $cons_total = $consum_vopsea + $intaritor;
 // $grund = $suprafata * 0.14;
  $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
 // $grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Tabla Zincata" ) {
  $consum_vopsea = $suprafata * 0.213;
  $intaritor = $consum_vopsea * 0.2;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.14;
  $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Tabla Decapata" ) {
  $consum_vopsea = $suprafata * 0.20;
  $intaritor = $consum_vopsea * 0.2;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.14;
  $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Mediu:</strong></p>
<span class="small">2 straturi</span>
<p class="num-res"><?php echo $cons_total; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Tigla Metalica" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Email Alchido-Poliuretanic pentru Tigla Metalica “Emex Screenpol”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span> vor fi:<br />";
  echo "Diluant max.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Tabla Zincata" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Email Alchido-Poliuretanic pentru Tigla Metalica “Emex Screenpol”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span> vor fi:<br />";
  echo "Grund Anticoroziv Epoxidic: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Diluant total: max. <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Tabla Decapata" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Email Alchido-Poliuretanic pentru Tigla Metalica “Emex Screenpol”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span> vor fi:<br />";
  echo "Grund Anticoroziv Epoxidic: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Diluant total: max. <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
