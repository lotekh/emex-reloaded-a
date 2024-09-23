<?php
$grosime = $_GET[ 'Grosime' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $grosime == "1 mm" ) {
  $consum_vopsea = $suprafata * 1.70;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
}
if ( $grosime == "2 mm" ) {
  $consum_vopsea = $suprafata * 3.30;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
}
if ( $grosime == "3 mm" ) {
  $consum_vopsea = $suprafata * 4.40;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Total:</strong></p>
<span class="small">la 1 strat</span>
<p class="num-res"><?php echo $consum_vopsea; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $grosime == "1 mm" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Vopsea de Marcaj Rutier Bicomponenta &ldquo;Emex Trafic&rdquo;</span> cu<br />";
  echo "grosimea de <span class='RaspunsEchoBold'>$grosime</span> pentru o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de <span class='RaspunsEchoBold'>aprox. $consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
  echo "<span class='strat mark'>Calculul include si intaritor cf. Fisa Tehnica</span>.";
}
if ( $grosime == "2 mm" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Vopsea de Marcaj Rutier Bicomponenta &ldquo;Emex Trafic&rdquo;</span> cu<br />";
  echo "grosimea de <span class='RaspunsEchoBold'>$grosime</span> pentru o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de <span class='RaspunsEchoBold'>aprox. $consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "<span class='strat mark'>Calculul include si intaritor cf. Fisa Tehnica</span>.";
}
if ( $grosime == "3 mm" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Vopsea de Marcaj Rutier Bicomponenta &ldquo;Emex Trafic&rdquo;</span> cu<br />";
  echo "grosimea de <span class='RaspunsEchoBold'>$grosime</span> pentru o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de <span class='RaspunsEchoBold'>aprox. $consum_vopsea Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "<span class='strat mark'>Calculul include si intaritor cf. Fisa Tehnica</span>.";
}
?>
</p>
</div>
</div>
</div>
