<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Polistiren Expandat" ) {
  $consum_vopsea = $suprafata * 1.00;
  $faina_cuart = $suprafata * 0.6;
  $cons_total = $consum_vopsea;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $faina_cuart = number_format( $faina_cuart, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Polistiren Extrudat" ) {
  $consum_vopsea = $suprafata * 1.00;
  $faina_cuart = $suprafata * 0.5;
  $cons_total = $consum_vopsea;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $faina_cuart = number_format( $faina_cuart, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Suporturi Minerale" ) {
  $consum_vopsea = $suprafata * 1.00;
  $faina_cuart = $suprafata * 0.6;
  $cons_total = $consum_vopsea;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $faina_cuart = number_format( $faina_cuart, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
  <div class="results">
    <div class="cosum text-center">
      <p class="p-space"><strong>Consumul Total:</strong></p>
      <span class="small">la 2 straturi</span>
      <p class="num-res"><?php echo $cons_total ?></p>
      <p><strong>Kg produs</strong></p>
      <p>
        <?php
        if ( $tipsuprafata == "Polistiren Expandat" ) {
          echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Rasina Poliuretanica Monocomponenta “Emex Yrocoat HD”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>:<br /> va fi cca. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> rasina poliuretanica monocomponenta.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "in medie <span class='RaspunsEchoBold'>$faina_cuart Kg</span> faina de cuartz.<br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
        }
        if ( $tipsuprafata == "Polistiren Extrudat" ) {
          echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Rasina Poliuretanica Monocomponenta “Emex Yrocoat HD”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>:<br /> va fi cca. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> rasina poliuretanica monocomponenta.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "in medie <span class='RaspunsEchoBold'>$faina_cuart Kg</span> faina de cuartz.<br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
        }
        if ( $tipsuprafata == "Suporturi Minerale" ) {
          echo "<strong>Consumul Total</strong> <span class='strat mark'>la 2 straturi</span> de <span class='RaspunsEchoBold'>Rasina Poliuretanica Monocomponenta “Emex Yrocoat HD”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>:<br /> va fi cca. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> rasina poliuretanica monocomponenta.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "in medie <span class='RaspunsEchoBold'>$faina_cuart Kg</span> faina de cuartz.<br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
        }
        ?>
      </p>
    </div>
  </div>
</div>
