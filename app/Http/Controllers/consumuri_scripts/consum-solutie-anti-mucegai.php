<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Piatra" ) {
  $consum_vopsea = $suprafata * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
}
if ( $tipsuprafata == "Tencuiala" ) {
  $consum_vopsea = $suprafata * 0.10;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
}
if ( $tipsuprafata == "Zidarie" ) {
  $consum_vopsea = $suprafata * 0.10;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Rigips" ) {
  $consum_vopsea = $suprafata * 0.08;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
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
if ( $tipsuprafata == "Piatra" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Sanitizant Antimucegai “Emex Forte”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Nu exista consumuri conexe</span><br />";
}
if ( $tipsuprafata == "Tencuiala" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Sanitizant Antimucegai “Emex Forte”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Nu exista consumuri conexe</span><br />";
}
if ( $tipsuprafata == "Zidarie" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Sanitizant Antimucegai “Emex Forte”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Nu exista consumuri conexe</span><br />";
}
if ( $tipsuprafata == "Rigips" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Sanitizant Antimucegai “Emex Forte”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Nu exista consumuri conexe</span><br />";
}
?>
</p>
</div>
</div>
</div>