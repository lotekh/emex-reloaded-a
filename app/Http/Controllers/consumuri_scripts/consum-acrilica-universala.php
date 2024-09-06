<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Lemn" ) {
 $consum_vopsea = $suprafata * 0.30;
 $diluant = $consum_vopsea * 0.1;
 $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
 $diluant = number_format( $diluant, 2, ",", "." );
}
if ( $tipsuprafata == "Metal" ) {
 $consum_vopsea = $suprafata * 0.26;
 $grund = $suprafata * 0.12;
 $diluant = ( $consum_vopsea + $grund ) * 0.1;
 $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
 $grund = number_format( $grund, 2, ",", "." );
 $diluant = number_format( $diluant, 2, ",", "." );
}
if ( $tipsuprafata == "Zidarie" ) {
 $consum_vopsea = $suprafata * 0.35;
 $diluant = $consum_vopsea * 0.1;
 $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
 $diluant = number_format( $diluant, 2, ",", "." );
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
    if ( $tipsuprafata == "Lemn" ) {
     echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de Email <span class='RaspunsEchoBold'>Vopsea Universala Acrilica “Emex Spectrum”</span> pentru<br />";
     echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
     echo "<span id='consumurile_indirecte'>Consumuri conexe</span>:<br />";
     echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
    }
    if ( $tipsuprafata == "Metal" ) {
     echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de Email <span class='RaspunsEchoBold'>Vopsea Universala Acrilica “Emex Spectrum”</span> pentru<br />";
     echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
     echo "<span id='consumurile_indirecte'>Consumuri conexe</span>:<br />";
     echo "Grund Anticoroziv <strong><em>“Emex AQ Eco”</em></strong>: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
     echo "Apa Vopsea + Grund Total: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
    }
    if ( $tipsuprafata == "Zidarie" ) {
     echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de Email <span class='RaspunsEchoBold'>Vopsea Universala Acrilica “Emex Spectrum”</span> pentru<br />";
     echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
     echo "<span id='consumurile_indirecte'>Consumuri conexe</span>:<br />";
     echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
    }
    ?>
   </p>
  </div>
 </div>
</div>
