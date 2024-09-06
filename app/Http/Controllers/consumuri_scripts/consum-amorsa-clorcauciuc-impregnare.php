<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Sapa" ) {
  $consum_vopsea = $suprafata * 0.14;
  $grund = $suprafata * 0.11;
  $diluant = ( $consum_vopsea + $grund ) * 0.10;
  $diluant = number_format( $diluant, 2, ",", "." );
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
}
if ( $tipsuprafata == "Sapa Sclivisita" ) {
  $consum_vopsea = $suprafata * 0.13;
  $grund = $suprafata * 0.12;
  $diluant = ( $consum_vopsea + $grund ) * 0.10;
  $diluant = number_format( $diluant, 2, ",", "." );
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
}
if ( $tipsuprafata == "Beton Elicopterizat" ) {
  $consum_vopsea = $suprafata * 0.12;
  $grund = $suprafata * 0.10;
  $diluant = ( $consum_vopsea + $grund ) * 0.10;
  $diluant = number_format( $diluant, 2, ",", "." );
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
}
if ( $tipsuprafata == "Mozaic" ) {
  $consum_vopsea = $suprafata * 0.11;
  $grund = $suprafata * 0.10;
  $diluant = ( $consum_vopsea + $grund ) * 0.10;
  $diluant = number_format( $diluant, 2, ",", "." );
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Mediu:</strong></p>
<span class="small">la 1 strat</span>
<p class="num-res"><?php echo $consum_vopsea; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Sapa" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Grund Clorcauciuc pentru Amorsare Pardoseli  &ldquo;Emex&rdquo;</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Sapa Sclivisita" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Grund Clorcauciuc pentru Amorsare Pardoseli  &ldquo;Emex&rdquo;</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Beton Elicopterizat" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Grund Clorcauciuc pentru Amorsare Pardoseli  &ldquo;Emex&rdquo;</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Mozaic" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Grund Clorcauciuc pentru Amorsare Pardoseli  &ldquo;Emex&rdquo;</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
