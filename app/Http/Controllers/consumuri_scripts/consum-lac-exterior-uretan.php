<?php
$grund = 0;
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Mobilier Gradina" ) {
  $consum_vopsea = $suprafata * 0.20;
  $diluant = $consum_vopsea * 0.12;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
}
if ( $tipsuprafata == "Lemn Slefuit" ) {
  $consum_vopsea = $suprafata * 0.24;
  $diluant = $consum_vopsea * 0.10;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
}
if ( $tipsuprafata == "Supralacuire" ) {
  $consum_vopsea = $suprafata * 0.16;
  $diluant = $consum_vopsea * 0.10;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
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
if ( $tipsuprafata == "Mobilier Gradina" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Lac Transparent pentru Lemn si Mobilier Exterior “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span><br />";
  echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>";
}
if ( $tipsuprafata == "Lemn Slefuit" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Lac Transparent pentru Lemn si Mobilier Exterior “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span><br />";
  echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>";
}
if ( $tipsuprafata == "Supralacuire" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Lac Transparent pentru Lemn si Mobilier Exterior “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span><br />";
  echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>";
}
?>
</p>
</div>
</div>
</div>
