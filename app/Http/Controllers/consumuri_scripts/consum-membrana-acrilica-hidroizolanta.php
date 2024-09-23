<?php
$granulatie = $_GET[ 'Granulatie' ];
$suprafata = $_GET[ 'Suprafata' ];
$tiptencuiala = $_GET[ 'TipProdus' ];
if ( $granulatie == "Grosime de 1.5 mm" ) {
  $consum_tencuiala = $suprafata * 1.47;
  $grund = $suprafata * 0.53;
  $cons_total = $consum_tencuiala + $grund;
  $consum_tencuiala = number_format( $consum_tencuiala, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $granulatie == "Grosime de 2 mm" ) {
  $consum_tencuiala = $suprafata * 2.21;
  $grund = $suprafata * 0.79;
  $cons_total = $consum_tencuiala + $grund;
  $consum_tencuiala = number_format( $consum_tencuiala, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $granulatie == "Grosime de 2.5 - 3 mm" ) {
  $consum_tencuiala = $suprafata * 2.73;
  $grund = $suprafata * 0.97;
  $cons_total = $consum_tencuiala + $grund;
  $consum_tencuiala = number_format( $consum_tencuiala, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Estimat:</strong></p>
<span class="small">In functie de grosime</span>
<p class="num-res"><?php echo $cons_total ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $granulatie == "Grosime de 1.5 mm" ) {
  echo "<strong>Consumul Mediu</strong> de <span class='RaspunsEchoBold'>Membrana Acrilica Hidroizolanta 2k “Emex HyPro”</span> la o <strong class='strat mark'>$granulatie</strong>,<br />";
  echo "pentru o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>, va fi de <span class='RaspunsEchoBold'>aprox. $cons_total Kg</span> amestec, din care:<br />";
  echo "- <span class='RaspunsEchoBold'>$consum_tencuiala Kg</span> materiale pulverulente, si<br />";
  echo "- <span class='RaspunsEchoBold'>$grund Kg</span> polimer acrilic.<br />";
  echo "<span id='consumurile_indirecte'>Materiale conexe</span>:<br />";
  echo "Nu este cazul.<br />";
  echo "<span class='strat mark'><strong>Nu se va folosi diluant sau apa</strong></span>.<br />";
}
if ( $granulatie == "Grosime de 2 mm" ) {
  echo "<strong>Consumul Mediu</strong> de <span class='RaspunsEchoBold'>Membrana Acrilica Hidroizolanta 2k “Emex HyPro”</span> la o <strong class='strat mark'>$granulatie</strong>,<br />";
  echo "pentru o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>, va fi de <span class='RaspunsEchoBold'>aprox. $cons_total Kg</span> amestec, din care:<br />";
  echo "- <span class='RaspunsEchoBold'>$consum_tencuiala Kg</span> materiale pulverulente, si<br />";
  echo "- <span class='RaspunsEchoBold'>$grund Kg</span> polimer acrilic.<br />";
  echo "<span id='consumurile_indirecte'>Materiale conexe</span>:<br />";
  echo "Nu este cazul.<br />";
  echo "<span class='strat mark'><strong>Nu se va folosi diluant sau apa</strong></span>.<br />";
}
if ( $granulatie == "Grosime de 2.5 - 3 mm" ) {
  echo "<strong>Consumul Mediu</strong> de <span class='RaspunsEchoBold'>Membrana Acrilica Hidroizolanta 2k “Emex HyPro”</span> la o <strong class='strat mark'>$granulatie</strong>,<br />";
  echo "pentru o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>, va fi de <span class='RaspunsEchoBold'>aprox. $cons_total Kg</span> amestec, din care:<br />";
  echo "- <span class='RaspunsEchoBold'>$consum_tencuiala Kg</span> materiale pulverulente, si<br />";
  echo "- <span class='RaspunsEchoBold'>$grund Kg</span> polimer acrilic.<br />";
  echo "<span id='consumurile_indirecte'>Materiale conexe</span>:<br />";
  echo "Se recomanda panza de fibra de sticla sau poliester.<br />";
  echo "<span class='strat mark'><strong>Nu se va folosi diluant sau apa</strong></span>.<br />";
}
?>
</p>
</div>
</div>
</div>
