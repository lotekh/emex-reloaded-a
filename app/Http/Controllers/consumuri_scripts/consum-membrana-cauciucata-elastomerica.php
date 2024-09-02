<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Beton" ) {
  $consum_vopsea = $suprafata * 1.70;
  $amorsa = $suprafata * 0.14;
  $apa = ( $consum_vopsea + $amorsa ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Zidarie" ) {
  $consum_vopsea = $suprafata * 1.70;
  $amorsa = $suprafata * 0.14;
  $apa = ( $consum_vopsea + $amorsa ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Tabla" ) {
  $consum_vopsea = $suprafata * 1.50;
  $amorsa = $suprafata * 0.14;
  $apa = ( $consum_vopsea + $amorsa ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Panou Sandwich" ) {
  $consum_vopsea = $suprafata * 1.50;
  $amorsa = $suprafata * 0.12;
  $apa = ( $consum_vopsea + $amorsa ) * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
  <div class="results">
    <div class="cosum text-center">
      <p class="p-space"><strong>Consumul Total:</strong></p>
      <span class="small">2 straturi</span>
      <p class="num-res"><?php echo $consum_vopsea; ?></p>
      <p><strong>Kg produs</strong></p>
      <p>
        <?php
        if ( $tipsuprafata == "Beton" ) {
          echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Membrana Cauciucata Elastomerica “Emex Supra MX”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
          echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
          echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
          echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
        }
        if ( $tipsuprafata == "Zidarie" ) {
          echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Membrana Cauciucata Elastomerica “Emex Supra MX”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
          echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
          echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
          echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
        }
        if ( $tipsuprafata == "Tabla" ) {
          echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Membrana Cauciucata Elastomerica “Emex Supra MX”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
          echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
          echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
          echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
        }
        if ( $tipsuprafata == "Panou Sandwich" ) {
          echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Membrana Cauciucata Elastomerica “Emex Supra MX”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br />va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
          echo "<span id='consumurile_indirecte'>Consumuri indirecte</span>:<br />";
          echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
          echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
        }
        ?>
      </p>
    </div>
  </div>
</div>
