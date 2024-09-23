<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Piatra" ) {
  $consum_vopsea = $suprafata * 0.20;
  $apa = $consum_vopsea * 0.10;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Tencuiala" ) {
  $consum_vopsea = $suprafata * 0.22;
  $apa = $consum_vopsea * 0.10;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Zidarie" ) {
  $consum_vopsea = $suprafata * 0.24;
  $apa = $consum_vopsea * 0.10;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
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
if ( $tipsuprafata == "Piatra" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Lac Acrilic pentru Piatra “Emex AQS”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span><br />";
  echo "Apa: <span class='RaspunsEchoBold'>$apa Kg</span>.<br />";
}
if ( $tipsuprafata == "Tencuiala" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Lac Acrilic pentru Piatra “Emex AQS”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span><br />";
  echo "Apa: <span class='RaspunsEchoBold'>$apa Kg</span>.<br />";
}
if ( $tipsuprafata == "Zidarie" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Lac Acrilic pentru Piatra “Emex AQS”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span><br />";
  echo "Apa: <span class='RaspunsEchoBold'>$apa Kg</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
