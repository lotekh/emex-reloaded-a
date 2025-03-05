<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "1 cm" ) {
  $consum_vopsea = $suprafata * 1.52;
  $intaritor = $consum_vopsea * 0.50;
  $cons_total = $consum_vopsea + $intaritor;
  // $grund = $suprafata * 0.14;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  //$grund = number_format( $grund, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "2 cm" ) {
  $consum_vopsea = $suprafata * 2.96;
  $intaritor = $consum_vopsea * 0.50;
  $cons_total = $consum_vopsea + $intaritor;
  // $grund = $suprafata * 0.14;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  //$grund = number_format( $grund, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "3 cm" ) {
  $consum_vopsea = $suprafata * 4.45;
  $intaritor = $consum_vopsea * 0.50;
  $cons_total = $consum_vopsea + $intaritor;
  // $grund = $suprafata * 0.14;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  //$grund = number_format( $grund, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "4 cm" ) {
  $consum_vopsea = $suprafata * 5.93;
  $intaritor = $consum_vopsea * 0.50;
  $cons_total = $consum_vopsea + $intaritor;
  // $grund = $suprafata * 0.14;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  //$grund = number_format( $grund, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "5 cm" ) {
  $consum_vopsea = $suprafata * 7.43;
  $intaritor = $consum_vopsea * 0.50;
  $cons_total = $consum_vopsea + $intaritor;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Informativ:</strong></p>
<span class="small">la 1 strat</span>
<p class="num-res"><?php echo $cons_total ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "1 cm" ) {
  echo "<strong>Consumul</strong> de <span class='RaspunsEchoBold'>Rasina Epoxidica de Turnare in Strat Gros “Emex TopCast“</span> pentru<br />";
  echo "Grosimea de <span class='RaspunsEchoBold'>$tipsuprafata</span>, la o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza epoxidica si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br /><br>";
  echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
}
if ( $tipsuprafata == "2 cm" ) {
  echo "<strong>Consumul</strong> de <span class='RaspunsEchoBold'>Rasina Epoxidica de Turnare in Strat Gros “Emex TopCast“</span> pentru<br />";
  echo "Grosimea de <span class='RaspunsEchoBold'>$tipsuprafata</span>, la o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza epoxidica si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br /><br>";
  echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
}
if ( $tipsuprafata == "3 cm" ) {
  echo "<strong>Consumul</strong> de <span class='RaspunsEchoBold'>Rasina Epoxidica de Turnare in Strat Gros “Emex TopCast“</span> pentru<br />";
  echo "Grosimea de <span class='RaspunsEchoBold'>$tipsuprafata</span>, la o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza epoxidica si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br /><br>";
  echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
}
if ( $tipsuprafata == "4 cm" ) {
  echo "<strong>Consumul</strong> de <span class='RaspunsEchoBold'>Rasina Epoxidica de Turnare in Strat Gros “Emex TopCast“</span> pentru<br />";
  echo "Grosimea de <span class='RaspunsEchoBold'>$tipsuprafata</span>, la o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza epoxidica si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br /><br>";
  echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
}
if ( $tipsuprafata == "5 cm" ) {
  echo "<strong>Consumul</strong> de <span class='RaspunsEchoBold'>Rasina Epoxidica de Turnare in Strat Gros “Emex TopCast“</span> pentru<br />";
  echo "Grosimea de <span class='RaspunsEchoBold'>$tipsuprafata</span>, la o suprafata de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza epoxidica si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br /><br>";
  echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
}
?>
</p>
</div>
</div>
</div>
