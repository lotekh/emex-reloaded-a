<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Sapa" ) {
  $consum_vopsea = $suprafata * 1.42;
  $intaritor = $consum_vopsea * 0.2;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.14;
  $faina_cuart = $suprafata * 0.3;
  $granula = $suprafata * 2.50;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $faina_cuart = number_format( $faina_cuart, 2, ",", "." );
  $granula = number_format( $granula, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Sapa Sclivisita" ) {
  $consum_vopsea = $suprafata * 1.42;
  $intaritor = $consum_vopsea * 0.2;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.14;
  $faina_cuart = $suprafata * 0.3;
  $granula = $suprafata * 2.50;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $faina_cuart = number_format( $faina_cuart, 2, ",", "." );
  $granula = number_format( $granula, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Beton Elicopterizat" ) {
  $consum_vopsea = $suprafata * 1.40;
  $intaritor = $consum_vopsea * 0.2;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.12;
  $faina_cuart = $suprafata * 0.3;
  $granula = $suprafata * 2.50;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $faina_cuart = number_format( $faina_cuart, 2, ",", "." );
  $granula = number_format( $granula, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Mozaic" ) {
  $consum_vopsea = $suprafata * 1.40;
  $intaritor = $consum_vopsea * 0.2;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.11;
  $faina_cuart = $suprafata * 0.3;
  $granula = $suprafata * 2.50;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $faina_cuart = number_format( $faina_cuart, 2, ",", "." );
  $granula = number_format( $granula, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
  <div class="results">
    <div class="cosum text-center">
      <p class="p-space"><strong>Consumul Total:</strong></p>
      <span class="small">la strat de cca. 2 mm</span>
      <p class="num-res"><?php echo $cons_total ?></p>
      <p><strong>Kg produs</strong></p>
      <p>
        <?php
        if ( $tipsuprafata == "Sapa" ) {
          echo "<strong>Consumul</strong> la 1 strat de <strong class='strat mark'>grosime = 2 mm</strong> de <span class='RaspunsEchoBold'>Covor de Cuartz Epoxidic “Emex Quartz”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>:<br /> va fi cca. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza epoxidica, <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor, si<br />";
          echo "<span id='consumurile_indirecte'>Materiale conexe</span>:<br />";
          echo "cca. <span class='RaspunsEchoBold'>$faina_cuart Kg</span> faina de cuartz.<br />";
          echo "cca. <span class='RaspunsEchoBold'>$granula Kg</span> granule colorate de cuartz.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "Grund Epoxidic de Amorsare: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
        }
        if ( $tipsuprafata == "Sapa Sclivisita" ) {
          echo "<strong>Consumul</strong> la 1 strat de <strong class='strat mark'>grosime = 2 mm</strong> de <span class='RaspunsEchoBold'>Covor de Cuartz Epoxidic “Emex Quartz”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>:<br /> va fi cca. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza epoxidica, <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor, si<br />";
          echo "<span id='consumurile_indirecte'>Materiale conexe</span>:<br />";
          echo "cca. <span class='RaspunsEchoBold'>$faina_cuart Kg</span> faina de cuartz.<br />";
          echo "cca. <span class='RaspunsEchoBold'>$granula Kg</span> granule colorate de cuartz.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "Grund Epoxidic de Amorsare: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
        }
        if ( $tipsuprafata == "Beton Elicopterizat" ) {
          echo "<strong>Consumul</strong> la 1 strat de <strong class='strat mark'>grosime = 2 mm</strong> de <span class='RaspunsEchoBold'>Covor de Cuartz Epoxidic “Emex Quartz”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>:<br /> va fi cca. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza epoxidica, <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor, si<br />";
          echo "<span id='consumurile_indirecte'>Materiale conexe</span>:<br />";
          echo "cca. <span class='RaspunsEchoBold'>$faina_cuart Kg</span> faina de cuartz.<br />";
          echo "cca. <span class='RaspunsEchoBold'>$granula Kg</span> granule colorate de cuartz.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "Grund Epoxidic de Amorsare: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
        }
        if ( $tipsuprafata == "Mozaic" ) {
          echo "<strong>Consumul</strong> la 1 strat de <strong class='strat mark'>grosime = 2 mm</strong> de <span class='RaspunsEchoBold'>Covor de Cuartz Epoxidic “Emex Quartz”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>:<br /> va fi cca. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza epoxidica, <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor, si<br />";
          echo "<span id='consumurile_indirecte'>Materiale conexe</span>:<br />";
          echo "cca. <span class='RaspunsEchoBold'>$faina_cuart Kg</span> faina de cuartz.<br />";
          echo "cca. <span class='RaspunsEchoBold'>$granula Kg</span> granule colorate de cuartz.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "Grund Epoxidic de Amorsare: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
        }
        ?>
      </p>
    </div>
  </div>
</div>
