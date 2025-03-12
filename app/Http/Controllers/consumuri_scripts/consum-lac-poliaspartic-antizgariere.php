<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
$grund = 0;
if ( $tipsuprafata == "Microbeton" ) {
  $consum_vopsea = $suprafata * 0.17;
  $intaritor = $consum_vopsea * 0.6;
  $cons_total = $consum_vopsea + $intaritor;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Pardoseli cimentice" ) {
  $consum_vopsea = $suprafata * 0.19;
  $intaritor = $consum_vopsea * 0.6;
  $cons_total = $consum_vopsea + $intaritor;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Supralacuire" ) {
  $consum_vopsea = $suprafata * 0.16;
  $intaritor = $consum_vopsea * 0.6;
  $cons_total = $consum_vopsea + $intaritor;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Total:</strong></p>
<span class="small">la 2 straturi</span>
<p class="num-res"><?php echo $cons_total; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Microbeton" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>(2 straturi)</span> <span class='RaspunsEchoBold'>Lac Poliaspartic de Mare Duritate “Emex L32-AS”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
  echo "<span class='strat mark'>Pentru diluare vezi Fisa Tehnica</span>.<br />";
}
if ( $tipsuprafata == "Pardoseli cimentice" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>(3 straturi)</span> <span class='RaspunsEchoBold'>Lac Poliaspartic de Mare Duritate “Emex L32-AS”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
  echo "<span class='strat mark'>Pentru diluare vezi Fisa Tehnica</span>.<br />";
}
if ( $tipsuprafata == "Supralacuire" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>(2 straturi)</span> <span class='RaspunsEchoBold'>Lac Poliaspartic de Mare Duritate “Emex L32-AS”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
  echo "<span class='strat mark'>Pentru diluare vezi Fisa Tehnica</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
