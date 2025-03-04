<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Sapa" ) {
  $consum_vopsea = $suprafata * 0.283;
  $intaritor = $suprafata * 0.416;
  $faina_cuart = $suprafata * 8.33;
  $grund = $suprafata * 0.14;
  $cons_total = $consum_vopsea + $intaritor + $faina_cuart;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $faina_cuart = number_format( $faina_cuart, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Informativ:</strong></p>
<span class="small">la granula de 2 &divide; 4 mm</span>
<p class="num-res"><?php echo $cons_total ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Sapa" ) {
  echo "<strong>Consumul</strong> de <span class='RaspunsEchoBold'>Covor Poliuretanic de Piatra “Emex Pebble”</span> cu granula de <strong class='strat mark'>2 &divide; 4 mm </strong>pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span> va fi:<br />";
  echo "- <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> Lac Poliuretanic,<br />";
  echo "- <span class='RaspunsEchoBold'>$intaritor Kg</span> Intaritor Poliuretanic Solvent-Free, si<br />";
  echo "- <span class='RaspunsEchoBold'>$faina_cuart Kg</span> Granule de Marmura de 2 &divide; 4 mm.<br />";
  echo "<span id='consumurile_indirecte'>Materiale conexe</span>:<br />";
  echo "Lac Poliuretanic Final: <span class='RaspunsEchoBold'>$grund Kg/ strat</span>.<br />";
  echo "<span class='strat mark'><strong>Nu se va folosi diluant sau apa</strong></span>.<br />";
}
?>
</p>
</div>
</div>
</div>
