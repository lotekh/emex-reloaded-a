<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Beton" ) {
  $consum_vopsea = $suprafata * 0.70;
  $amorsa = $suprafata * 0.12;
  $apa = ( $consum_vopsea + $amorsa ) * 0.07;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Zidarie" ) {
  $consum_vopsea = $suprafata * 0.60;
  $amorsa = $suprafata * 0.14;
  $apa = ( $consum_vopsea + $amorsa ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Glet" ) {
  $consum_vopsea = $suprafata * 0.50;
  $amorsa = $suprafata * 0.12;
  $apa = ( $consum_vopsea + $amorsa ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Metal" ) {
  $consum_vopsea = $suprafata * 0.50;
  $amorsa = $suprafata * 0.12;
  $apa = ( $consum_vopsea + $amorsa ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
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
if ( $tipsuprafata == "Beton" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Vopsea Hidroizolanta Elastica “Emex AQ Bar”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
}
if ( $tipsuprafata == "Zidarie" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Vopsea Hidroizolanta Elastica “Emex AQ Bar”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
}
if ( $tipsuprafata == "Glet" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Vopsea Hidroizolanta Elastica “Emex AQ Bar”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
}
if ( $tipsuprafata == "Metal" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Vopsea Hidroizolanta Elastica “Emex AQ Bar”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Grund Anticoroziv Hidosolubil: <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
