<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Metal" ) {
  $consum_vopsea = $suprafata * 0.24;
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
if ( $tipsuprafata == "Aluminiu" ) {
  $consum_vopsea = $suprafata * 0.25;
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
if ( $tipsuprafata == "Lemn" ) {
  $consum_vopsea = $suprafata * 0.26;
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
if ( $tipsuprafata == "Produs Mat" ) {
  $consum_vopsea = $suprafata * 0.28;
  $intaritor = $consum_vopsea * 0.25;
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
<p class="p-space"><strong>Consumul Total:</strong></p>
<span class="small">la 2 straturi</span>
<p class="num-res"><?php echo $cons_total ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Metal" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>(2 straturi)</span> de <span class='RaspunsEchoBold'>Email Poliesteric “Emex Estada”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Grund Poliesteric: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Diluant total: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Aluminiu" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>(2 straturi)</span> de <span class='RaspunsEchoBold'>Email Poliesteric “Emex Estada”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "<strong class='strat mark'>Obligatoriu:</strong><br />";
  echo "Grund Poliesteric: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "<strong class='strat mark'>Recomandat:</strong><br />";
  echo "Diluant total: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Lemn" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>(2 straturi)</span> de <span class='RaspunsEchoBold'>Email Poliesteric “Emex Estada”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa Poliesterica: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Diluant total: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Produs Mat" ) {
  echo "<strong>Consumul Estimativ</strong> <span class='strat mark'>(2 straturi)</span> de <span class='RaspunsEchoBold'>Email Poliesteric “Emex Estada” Mat sau Semimat</span> pentru<br />";
  echo "<span class='RaspunsEchoBold'>orice suport acceptat</span> in suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Grund Poliesteric: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Diluant total: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
