<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Tencuiala driscuita" ) {
  $consum_grund = $suprafata * 0.16;
  $consum_apa = $consum_grund * 0.15;
  $consum_grund = number_format( $consum_grund, 2, ",", "." );
  $consum_apa = number_format( $consum_apa, 2, ",", "." );
}
if ( $tipsuprafata == "Tencuiala sclivisita" ) {
  $consum_grund = $suprafata * 0.14;
  $consum_apa = $consum_grund * 0.15;
  $consum_grund = number_format( $consum_grund, 2, ",", "." );
  $consum_apa = number_format( $consum_apa, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consum Mediu:</strong></p>
<span class="small">la 1 strat</span>
<p class="num-res"><?php echo $consum_grund; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Tencuiala driscuita" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Grund Acrilic de Amorsare cu Cuartz “Emex”</span> pentru<br/>";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/> este de cca. <span class='RaspunsEchoBold'>$consum_grund Kg</span> produs,<br/>";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Apa max.: <span class='RaspunsEchoBold'>$consum_apa L</span>.<br />";

}
if ( $tipsuprafata == "Tencuiala sclivisita" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Grund Acrilic de Amorsare cu Cuartz “Emex”</span> pentru<br/>";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/> este de cca. <span class='RaspunsEchoBold'>$consum_grund Kg</span> produs,<br/>";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "Apa max.: <span class='RaspunsEchoBold'>$consum_apa L</span>.<br />";
}
?>
</p>
</div>
</div>
</div>
