<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Beton" ) {
  $consum_vopsea = $suprafata * 0.45;
  $grund = $suprafata * 0.14;
  $diluant = ( $consum_vopsea + $grund ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
}
if ( $tipsuprafata == "Zidarie" ) {
  $consum_vopsea = $suprafata * 0.43;
  $grund = $suprafata * 0.14;
  $diluant = $consum_vopsea * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
}
if ( $tipsuprafata == "Ciment Sclivisit" ) {
  $consum_vopsea = $suprafata * 0.39;
  $grund = $suprafata * 0.12;
  $diluant = $consum_vopsea * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Total:</strong></p>
<span class="small">3 straturi</span>
<p class="num-res"><?php echo $consum_vopsea; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Beton" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>3 straturi</span> de <span class='RaspunsEchoBold'>Vopsea Clorcauciuc de Piscina “Emex Swim”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri conexe</span>:<br />";
  echo "Grund Amorsare Clorcauciuc: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Zidarie" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>(3 straturi)</span> de <span class='RaspunsEchoBold'>Vopsea Clorcauciuc de Piscina “Emex Swim”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri conexe</span>:<br />";
  echo "Grund Amorsare Clorcauciuc: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Ciment Sclivisit" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>(3 straturi)</span> de <span class='RaspunsEchoBold'>Vopsea Clorcauciuc de Piscina “Emex Swim”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri conexe</span>:<br />";
  echo "Grund Amorsare Clorcauciuc: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
