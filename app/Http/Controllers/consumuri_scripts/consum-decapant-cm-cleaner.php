<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Fara Pori" ) {
  $consum_vopsea = $suprafata * 0.36;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Mediu:</strong></p>
<span class="small">la 2 straturi</span>
<p class="num-res"><?php echo $consum_vopsea; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Fara Pori" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Pasta Decapanta “Emex CM Cleaner”</span> pentru<br />";
  echo "Suprafata <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "<strong class='strat mark'>Nu este cazul</strong>.<br />";
}
?>
</p>
</div>
</div>
</div>
