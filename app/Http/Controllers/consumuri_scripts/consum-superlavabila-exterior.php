<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];

if ( $tipsuprafata == "Zidarie" ) {
  $consum_vopsea = $suprafata * 0.36;
  $amorsa = $suprafata * 0.14;
  $apa = ( $consum_vopsea + $amorsa ) * 0.1;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Tencuiala driscuita" ) {
  $consum_vopsea = $suprafata * 0.34;
  $amorsa = $suprafata * 0.14;
  $apa = ( $consum_vopsea + $amorsa ) * 0.1;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Tencuiala sclivisita" ) {
  $consum_vopsea = $suprafata * 0.28;
  $amorsa = $suprafata * 0.11;
  $apa = ( $consum_vopsea + $amorsa ) * 0.1;
  $grund = $suprafata * 0.14;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Revopsita" ) {
  $consum_vopsea = $suprafata * 0.26;
  $amorsa = $suprafata * 0.12;
  $apa = ( $consum_vopsea + $amorsa ) * 0.1;
  $grund = $suprafata * 0.12;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
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
if ( $tipsuprafata == "Zidarie" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Vopsea Superlavabila de Exterior “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
}
if ( $tipsuprafata == "Tencuiala driscuita" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Vopsea Superlavabila de Exterior “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
}
if ( $tipsuprafata == "Tencuiala sclivisita" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Vopsea Superlavabila de Exterior “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
}
if ( $tipsuprafata == "Revopsita" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Vopsea Superlavabila de Exterior “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
