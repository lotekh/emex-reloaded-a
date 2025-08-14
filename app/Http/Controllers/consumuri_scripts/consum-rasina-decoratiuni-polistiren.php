<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Polistiren Expandat" ) {
  $consum_vopsea = $suprafata * 1.42;
  $cons_total = $consum_vopsea + $intaritor;
  $faina_cuart = $suprafata * 1.3;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $faina_cuart = number_format( $faina_cuart, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Polistiren Extrudat" ) {
  $consum_vopsea = $suprafata * 1.42;
  $cons_total = $consum_vopsea + $intaritor;
  $faina_cuart = $suprafata * 1.3;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $faina_cuart = number_format( $faina_cuart, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Suporturi Minerale" ) {
  $consum_vopsea = $suprafata * 1.42;
  $cons_total = $consum_vopsea + $intaritor;
  $faina_cuart = $suprafata * 1.3;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $faina_cuart = number_format( $faina_cuart, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
  <div class="results">
    <div class="cosum text-center">
      <p class="p-space"><strong>Consumul Total:</strong></p>
      <span class="small">la strat de 1 mm</span>
      <p class="num-res"><?php echo $cons_total ?></p>
      <p><strong>Kg produs</strong></p>
      <p>
        <?php
        if ( $tipsuprafata == "Polistiren Expandat" ) {
          echo "<strong>Consumul</strong> la 1 strat de <strong class='strat mark'>grosime = 1 mm</strong> de <span class='RaspunsEchoBold'>Pardoseala Epoxidica Antiderapanta “Emex”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>:<br /> va fi cca. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza epoxidica si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";

          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "Grund Epoxidic de Amorsare: <span class='RaspunsEchoBold'>$grund Kg</span>, si<br />";
          echo "in medie <span class='RaspunsEchoBold'>$faina_cuart Kg</span> granule de cuartz.<br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
        }
        if ( $tipsuprafata == "Polistiren Extrudat" ) {
          echo "<strong>Consumul</strong> la 1 strat de <strong class='strat mark'>grosime = 1 mm</strong> de <span class='RaspunsEchoBold'>Pardoseala Epoxidica Antiderapanta “Emex”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>:<br /> va fi cca. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza epoxidica si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "Grund Epoxidic de Amorsare: <span class='RaspunsEchoBold'>$grund Kg</span>, si<br />";
          echo "in medie <span class='RaspunsEchoBold'>$faina_cuart Kg</span> granule de cuartz.<br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
        }
        if ( $tipsuprafata == "Suporturi Minerale" ) {
          echo "<strong>Consumul</strong> la 1 strat de <strong class='strat mark'>grosime = 1 mm</strong> de <span class='RaspunsEchoBold'>Pardoseala Epoxidica Antiderapanta “Emex”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>:<br /> va fi cca. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza epoxidica si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "Grund Epoxidic de Amorsare: <span class='RaspunsEchoBold'>$grund Kg</span>, si<br />";
          echo "in medie <span class='RaspunsEchoBold'>$faina_cuart Kg</span> granule de cuartz.<br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span>.<br />";
        }
        ?>
      </p>
    </div>
  </div>
</div>
