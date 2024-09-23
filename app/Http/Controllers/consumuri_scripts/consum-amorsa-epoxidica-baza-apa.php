<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
$grund = 0;
if ( $tipsuprafata == "Lemn Slefuit" ) {
  $consum_vopsea = $suprafata * 0.06;
  $intaritor = $consum_vopsea * 1.00;
  $cons_total = $consum_vopsea + $intaritor;
  $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Fibra de Sticla" ) {
  $consum_vopsea = $suprafata * 0.06;
  $intaritor = $consum_vopsea * 1.00;
  $cons_total = $consum_vopsea + $intaritor;
  $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Suport Mineral" ) {
  $consum_vopsea = $suprafata * 0.07;
  $intaritor = $consum_vopsea * 1.00;
  $cons_total = $consum_vopsea + $intaritor;
  $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Total:</strong></p>
<span class="small">la 1 strat</span>
<p class="num-res"><?php echo $cons_total; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Lemn Slefuit" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>(1 strat)</span> de <span class='RaspunsEchoBold'>Amorsa Epoxidica Emulsionata “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Fibra de Sticla" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>(1 strat)</span> de <span class='RaspunsEchoBold'>Amorsa Epoxidica Emulsionata “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Suport Mineral" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>(1 strat)</span> de <span class='RaspunsEchoBold'>Amorsa Epoxidica Emulsionata “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
