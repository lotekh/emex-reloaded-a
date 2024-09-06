<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Beton Amprentat" ) {
  $consum_vopsea = $suprafata * 0.20;
  $intaritor = $consum_vopsea * 0.30;
  $cons_total = $consum_vopsea + $intaritor;
  $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Dale din Beton" ) {
  $consum_vopsea = $suprafata * 0.20;
  $intaritor = $consum_vopsea * 0.30;
  $cons_total = $consum_vopsea + $intaritor;
  $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Mozaic" ) {
  $consum_vopsea = $suprafata * 0.17;
  $intaritor = $consum_vopsea * 0.30;
  $cons_total = $consum_vopsea + $intaritor;
  $diluant = ( $consum_vopsea + $intaritor ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $diluant = number_format( $diluant, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
  <div class="results">
    <div class="cosum text-center">
      <p class="p-space"><strong>Consumul Total:</strong></p>
      <span class="small">la 2 straturi</span>
      <p class="num-res"><?php echo $cons_total; ?></p>
      <p><strong>Kg produs</strong></p>
      <p>
        <?php
        if ( $tipsuprafata == "Beton Amprentat" ) {
          echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Lac Poliuretanic Beton Amprentat “Emex PU Stamp”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> Lac si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
          echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
        }
        if ( $tipsuprafata == "Dale din Beton" ) {
          echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Lac Poliuretanic Beton Amprentat “Emex PU Stamp”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> Lac si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
          echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
        }
        if ( $tipsuprafata == "Mozaic" ) {
          echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Lac Poliuretanic Beton Amprentat “Emex PU Stamp”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> Lac si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
          echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
        }
        ?>
      </p>
    </div>
  </div>
</div>
