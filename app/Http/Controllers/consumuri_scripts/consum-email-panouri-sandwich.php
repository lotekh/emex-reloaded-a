<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Panouri Sandwich" ) {
  $consum_vopsea = $suprafata * 0.25;
  //$grund = $suprafata * 0.12;
  $diluant = $consum_vopsea * 0.10;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  //$grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
}
if ( $tipsuprafata == "Tigla Metalica" ) {
  $consum_vopsea = $suprafata * 0.25;
  //$grund = $suprafata * 0.12;
  $diluant = $consum_vopsea * 0.10;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  //$grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
}
if ( $tipsuprafata == "Neferoase" ) {
  $consum_vopsea = $suprafata * 0.25;
  //$grund = $suprafata * 0.14;
  $diluant = $consum_vopsea * 0.10;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  //$grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
}
if ( $tipsuprafata == "Plastic" ) {
  $consum_vopsea = $suprafata * 0.24;
  //$grund = $suprafata * 0.12;
  $diluant = $consum_vopsea * 0.10;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  //$grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Total:</strong></p>
<span class="small">la 2 straturi</span>
<p class="num-res"><?php echo $consum_vopsea; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Panouri Sandwich" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Email Acrilo-Stirenic cu Microfulgi â€œEmex Panelâ€ </span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  //echo "Grund Anticoroziv Clorcauciuc: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Solvent max.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Tigla Metalica" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Email Acrilo-Stirenic cu Microfulgi â€œEmex Panelâ€ </span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  //echo "Grund Anticoroziv Clorcauciuc: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Solvent max.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Neferoase" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Email Acrilo-Stirenic cu Microfulgi â€œEmex Panelâ€ </span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  //echo "Grund Impregnare Clorcauciuc: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Solvent max.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Plastic" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Email Acrilo-Stirenic cu Microfulgi â€œEmex Panelâ€ </span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  //echo "<strong>Recomandat:</strong><br />";
  //echo "Grund Impregnare Clorcauciuc: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  //echo "<strong>Obligatoriu:</strong><br />";
  echo "Solvent max.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
?>
</p>
</div>
</div>
</div>