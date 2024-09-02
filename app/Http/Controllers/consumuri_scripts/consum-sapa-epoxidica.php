<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Sapa" ) {
  $consum_vopsea = $suprafata * 0.327;
  $intaritor = $suprafata * 0.207;
  $faina_cuart = $suprafata * 0.966;
  $cons_total = $consum_vopsea + $intaritor + $faina_cuart;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $faina_cuart = number_format( $faina_cuart, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Informativ:</strong></p>
<span class="small">la strat de cca. 1 mm</span>
<p class="num-res"><?php echo $cons_total ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Sapa" ) {
  echo "<strong>Consumul</strong> la 1 strat de <strong class='strat mark'>grosime = 1 mm</strong> de <span class='RaspunsEchoBold'>Sapa de Egalizare Epoxy-Cimentica “Emex Mineral”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span> va fi:<br />";
  echo "- <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza aminica,<br />";
  echo "- <span class='RaspunsEchoBold'>$intaritor Kg</span> rasina epoxidica nesolventata, si<br />";
  echo "- <span class='RaspunsEchoBold'>$faina_cuart Kg</span> materiale pulverulente.<br />";
  echo "<span id='consumurile_indirecte'>Materiale conexe</span>:<br />";
  echo "Nu este cazul.<br />";
  echo "<span class='strat mark'><strong>Nu se va folosi diluant sau apa</strong></span>.<br />";
}
?>
</p>
</div>
</div>
</div>
