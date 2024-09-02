<?php
$granulatie = $_GET[ 'Granulatie' ];
$suprafata = $_GET[ 'Suprafata' ];
$tiptencuiala = $_GET[ 'TipProdus' ];
if ( $granulatie == "1.2 - 1.8 mm" ) {
  $consum_tencuiala = $suprafata * 1.6;
  $grund = $suprafata * 0.12;
  $apa = ( $consum_tencuiala + $grund ) * 0.05;
  $consum_tencuiala = number_format( $consum_tencuiala, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $granulatie == "1.5 - 2.3 mm" ) {
  $consum_tencuiala = $suprafata * 2.4;
  $grund = $suprafata * 0.12;
  $apa = ( $consum_tencuiala + $grund ) * 0.05;
  $consum_tencuiala = number_format( $consum_tencuiala, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $granulatie == "2.2 - 3 mm" ) {
  $consum_tencuiala = $suprafata * 3.3;
  $grund = $suprafata * 0.14;
  $apa = ( $consum_tencuiala + $grund ) * 0.6;
  $consum_tencuiala = number_format( $consum_tencuiala, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Total Mediu:</strong></p>
<span class="small">la 1 strat</span>
<p class="num-res"><?php echo $consum_tencuiala; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $granulatie == "1.2 - 1.8 mm" ) {
  echo "<strong>Consumul Total Mediu</strong> de <span class='RaspunsEchoBold'>Tencuiala Decorativa Siliconica “Emex”</span> cu<br />";
  echo "granulatia de <span class='RaspunsEchoBold'>$granulatie</span> pentru o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de <span class='RaspunsEchoBold'>aprox. $consum_tencuiala Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa cu cuartz siliconica (valoare medie): <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Apa total (tencuiala + amorsa): <span class='RaspunsEchoBold'>cca. $apa l</span>.";
}
if ( $granulatie == "1.5 - 2.3 mm" ) {
  echo "<strong>Consumul Total Mediu</strong> de <span class='RaspunsEchoBold'>Tencuiala Decorativa Siliconica “Emex”</span> cu<br />";
  echo "granulatia de <span class='RaspunsEchoBold'>$granulatie</span> pentru o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de <span class='RaspunsEchoBold'>aprox. $consum_tencuiala Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa cu cuartz siliconica (valoare medie): <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Apa total (tencuiala + amorsa): <span class='RaspunsEchoBold'>cca. $apa l</span>.";
}
if ( $granulatie == "2.2 - 3 mm" ) {
  echo "<strong>Consumul Total Mediu</strong> de <span class='RaspunsEchoBold'>Tencuiala Decorativa Siliconica “Emex”</span> cu<br />";
  echo "granulatia de <span class='RaspunsEchoBold'>$granulatie</span> pentru o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de <span class='RaspunsEchoBold'>aprox. $consum_tencuiala Kg</span> produs.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa cu cuartz siliconica (valoare medie): <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Apa total (tencuiala + amorsa): <span class='RaspunsEchoBold'>cca. $apa l</span>.";
}
?>
</p>
</div>
</div>
</div>
