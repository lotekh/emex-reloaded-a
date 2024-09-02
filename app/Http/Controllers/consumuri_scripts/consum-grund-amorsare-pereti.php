<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipamorsa = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Glet de Ipsos" ) {
  $consum_grund = $suprafata * 0.20;
  $consum_apa = $consum_grund * 0.10;
  $consum_grund = number_format( $consum_grund, 2, ",", "." );
  $consum_apa = number_format( $consum_apa, 2, ",", "." );
}
if ( $tipsuprafata == "Rigips" ) {
  $consum_grund = $suprafata * 0.15;
  $consum_apa = $consum_grund * 0.10;
  $consum_grund = number_format( $consum_grund, 2, ",", "." );
  $consum_apa = number_format( $consum_apa, 2, ",", "." );
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
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Grund de Egalizare si Umplere Pori “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_grund Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$consum_apa l</span>.<br />";
}
if ( $tipsuprafata == "Rigips" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Grund de Egalizare si Umplere Pori “Emex”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_grund Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$consum_apa l</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
