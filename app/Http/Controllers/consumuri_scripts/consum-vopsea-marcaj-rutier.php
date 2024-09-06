<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Asfalt" ) {
  $consum_vopsea = $suprafata * 0.50;
  $diluant = ( $consum_vopsea + $grund ) * 0.05;
  $diluant = number_format( $diluant, 2, ",", "." );
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
}
if ( $tipsuprafata == "Beton" ) {
  $consum_vopsea = $suprafata * 0.45;
  $diluant = ( $consum_vopsea + $grund ) * 0.05;
  $diluant = number_format( $diluant, 2, ",", "." );
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consum Mediu Recomandat:</strong></p>
<span class="small">1 strat</span>
<p class="num-res"><?php echo $consum_vopsea; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Asfalt" ) {
  echo "<strong>Consumul Total Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Vopsea pentru Marcaj Rutier “Emex Route”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri conexe</span>:<br />";
  echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Beton" ) {
  echo "<strong>Consumul Total Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Vopsea pentru Marcaj Rutier “Emex Route”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri conexe</span>:<br />";
  echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
