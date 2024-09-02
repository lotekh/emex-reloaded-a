<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Zidarie" ) {
  $consum_vopsea = $suprafata * 0.40;
  $amorsa = $suprafata * 0.16;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
}
if ( $tipsuprafata == "Tencuiala sclivisita" ) {
  $consum_vopsea = $suprafata * 0.36;
  $amorsa = $suprafata * 0.16;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
}
if ( $tipsuprafata == "Rigips" ) {
  $consum_vopsea = $suprafata * 0.32;
  $amorsa = $suprafata * 0.14;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
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
if ( $tipsuprafata == "Zidarie" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Vopsea Lavabila Silicatica de Interior “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
  echo "Amorsa Silicatica (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
}
if ( $tipsuprafata == "Tencuiala sclivisita" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Vopsea Lavabila Silicatica de Interior “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
  echo "Amorsa Silicatica (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
}
if ( $tipsuprafata == "Rigips" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Vopsea Lavabila Silicatica de Interior “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
  echo "Amorsa Silicatica (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
