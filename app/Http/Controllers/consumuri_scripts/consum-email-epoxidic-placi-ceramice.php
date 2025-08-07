<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Placi Ceramice" ) {
  $consum_vopsea = $suprafata * 0.12;
  $intaritor = $consum_vopsea * 1.00;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.14;
  $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
//if ( $tipsuprafata == "Metal" ) {
  //$consum_vopsea = $suprafata * 0.12;
  //$intaritor = $consum_vopsea * 1.00;
  //$cons_total = $consum_vopsea + $intaritor;
  //$grund = $suprafata * 0.14;
  //$diluant = ( $consum_vopsea + $intaritor ) * 0.05;
 // $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
//  $intaritor = number_format( $intaritor, 2, ",", "." );
//  $grund = number_format( $grund, 2, ",", "." );
//  $diluant = number_format( $diluant, 2, ",", "." );
 // $cons_total = number_format( $cons_total, 2, ",", "." );
//}
if ( $tipsuprafata == "Beton/Tencuiala" ) {
  $consum_vopsea = $suprafata * 0.18;
  $intaritor = $consum_vopsea * 1.00;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.14;
  $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Glet" ) {
  $consum_vopsea = $suprafata * 0.14;
  $intaritor = $consum_vopsea * 1.00;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.15;
  $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
//if ( $tipsuprafata == "Lemn" ) {
  //$consum_vopsea = $suprafata * 0.13;
  //$intaritor = $consum_vopsea * 1.00;
 // $cons_total = $consum_vopsea + $intaritor;
//  $grund = $suprafata * 0.15;
 // $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
 // $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  //$intaritor = number_format( $intaritor, 2, ",", "." );
 // $grund = number_format( $grund, 2, ",", "." );
 // $diluant = number_format( $diluant, 2, ",", "." );
 // $cons_total = number_format( $cons_total, 2, ",", "." );
//}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Total:</strong></p>
<span class="small">2 straturi</span>
<p class="num-res"><?php echo $cons_total ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Placi Ceramice" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Email Epoxidic pentru Gresie si Faianta “Emex QSF-3E”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa Epoxidica Emulsionata: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
//if ( $tipsuprafata == "Metal" ) {
 // echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Email Epoxidic pentru Gresie si Faianta “Emex QSF-3E”</span> pentru<br />";
 // echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
 // echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
//  echo "Amorsa Epoxidica Emulsionata: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
//  echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
//}
if ( $tipsuprafata == "Beton/Tencuiala" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Email Epoxidic pentru Gresie si Faianta “Emex QSF-3E”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa Epoxidica Emulsionata: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
if ( $tipsuprafata == "Glet" ) {
  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Email Epoxidic pentru Gresie si Faianta “Emex QSF-3E”</span> pentru<br />";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
  echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
  echo "Amorsa Epoxidica Emulsionata: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
  echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
}
//if ( $tipsuprafata == "Lemn" ) {
//  echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Email Epoxidic pentru Gresie si Faianta “Emex QSF-3E”</span> pentru<br />";
 // echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> vopsea si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
 // echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
 // echo "Amorsa Epoxidica Emulsionata: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
 // echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
//}
?>
</p>
</div>
</div>
</div>
