<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Metal" ) {
  $consum_vopsea = $suprafata * 0.25;
  $grund = $suprafata * 0.13;
  $diluant = ( $consum_vopsea + $grund ) * 0.1;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
  <div class="results">
    <div class="cosum text-center">
      <p class="p-space"><strong>Consumul Total:</strong></p>
      <span class="small">(2 straturi)</span>
      <p class="num-res"><?php echo $consum_vopsea; ?></p>
      <p><strong>Kg produs</strong></p>
      <p>
        <?php
        if ( $tipsuprafata == "Metal" ) {
          echo "<strong>Consumul Total</strong> (2 straturi) de <span class='RaspunsEchoBold'>Email Tip Auto pentru Utilaje “Emex”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
          echo "Grund Anticoroziv: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
          echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
        }
        ?>
      </p>
    </div>
  </div>
</div>
