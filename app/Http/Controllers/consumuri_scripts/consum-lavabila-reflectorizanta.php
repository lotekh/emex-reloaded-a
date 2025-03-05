<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Glet de Ipsos" ) {
  $consum_vopsea = $suprafata * 0.50;
  $amorsa = $suprafata * 0.14;
  $apa = ( $consum_vopsea + $amorsa ) * 0.1;
  $grund = $suprafata * 0.14;
  $microsfere = $suprafata * 0.36;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  //$rezultat_microsfere = number_format( $apa, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Rigips" ) {
  $consum_vopsea = $suprafata * 0.50;
  $amorsa = $suprafata * 0.14;
  $apa = ( $consum_vopsea + $amorsa ) * 0.1;
  $grund = $suprafata * 0.12;
  $microsfere = $suprafata * 0.36;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  // $rezultat_microsfere = number_format( $apa, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Revopsita" ) {
  $consum_vopsea = $suprafata * 0.50;
  $amorsa = $suprafata * 0.10;
  $apa = ( $consum_vopsea + $amorsa ) * 0.1;
  $microsfere = $suprafata * 0.36;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
  // $rezultat_microsfere = number_format( $apa, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Total:</strong></p>
<span class="small">1 strat</span>
<p class="num-res"><?php echo $consum_vopsea; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Glet de Ipsos" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Vopsea Lavabila Reflectorizanta “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "<strong>Recomandat:</strong><br />";
  echo "Grund de Amorsare si Umplere Pori: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "<strong>Obligatoriu:</strong><br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
}
if ( $tipsuprafata == "Rigips" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Vopsea Lavabila Reflectorizanta “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "<strong>Recomandat:</strong><br />";
  echo "Grund de Amorsare si Umplere Pori: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "<strong>Obligatoriu:</strong><br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
}
if ( $tipsuprafata == "Revopsita" ) {
 echo "<strong>Consumul Total</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Vopsea Lavabila Reflectorizanta “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
  echo "Microsfere de Sticla: <span class='RaspunsEchoBold'>$microsfere Kg</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Glet de Ipsos" ) {
  $consum_vopsea = $suprafata * 0.50;
  $amorsa = $suprafata * 0.14;
  $apa = ( $consum_vopsea + $amorsa ) * 0.1;
  $grund = $suprafata * 0.14;
  $microsfere = $suprafata * 0.36;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  //$rezultat_microsfere = number_format( $apa, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Rigips" ) {
  $consum_vopsea = $suprafata * 0.50;
  $amorsa = $suprafata * 0.14;
  $apa = ( $consum_vopsea + $amorsa ) * 0.1;
  $grund = $suprafata * 0.12;
  $microsfere = $suprafata * 0.36;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  // $rezultat_microsfere = number_format( $apa, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Revopsita" ) {
  $consum_vopsea = $suprafata * 0.50;
  $amorsa = $suprafata * 0.10;
  $apa = ( $consum_vopsea + $amorsa ) * 0.1;
  $microsfere = $suprafata * 0.36;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
  // $rezultat_microsfere = number_format( $apa, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Total:</strong></p>
<span class="small">1 strat</span>
<p class="num-res"><?php echo $consum_vopsea; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Glet de Ipsos" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Vopsea Lavabila Reflectorizanta “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "<strong>Recomandat:</strong><br />";
  echo "Grund de Amorsare si Umplere Pori: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "<strong>Obligatoriu:</strong><br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
}
if ( $tipsuprafata == "Rigips" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Vopsea Lavabila Reflectorizanta “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "<strong>Recomandat:</strong><br />";
  echo "Grund de Amorsare si Umplere Pori: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "<strong>Obligatoriu:</strong><br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
}
if ( $tipsuprafata == "Revopsita" ) {
 echo "<strong>Consumul Total</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Vopsea Lavabila Reflectorizanta “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
  echo "Microsfere de Sticla: <span class='RaspunsEchoBold'>$microsfere Kg</span>.<br />";
}
?>
</p>
</div>
</div>
</div>