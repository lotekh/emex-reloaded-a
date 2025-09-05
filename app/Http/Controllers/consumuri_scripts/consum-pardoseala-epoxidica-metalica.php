<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipvopsea = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Sapa" ) {
  $consum_vopsea = $suprafata * 1.20;
  $intaritor = $consum_vopsea * 0.50;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.14;
  $fond = $suprafata * 0.25;
  $pigment = $cons_total * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $fond = number_format( $fond, 2, ",", "." );
  $pigment = number_format( $pigment, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Sapa Sclivisita" ) {
  $consum_vopsea = $suprafata * 1.14;
  $intaritor = $consum_vopsea * 0.50;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.14;
  $fond = $suprafata * 0.25;
  $pigment = $cons_total * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $fond = number_format( $fond, 2, ",", "." );
  $pigment = number_format( $pigment, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Beton Elicopterizat" ) {
  $consum_vopsea = $suprafata * 1.12;
  $intaritor = $consum_vopsea * 0.50;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.12;
  $fond = $suprafata * 0.25;
  $pigment = $cons_total * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $fond = number_format( $fond, 2, ",", "." );
  $pigment = number_format( $pigment, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
if ( $tipsuprafata == "Mozaic" ) {
  $consum_vopsea = $suprafata * 1.10;
  $intaritor = $consum_vopsea * 0.50;
  $cons_total = $consum_vopsea + $intaritor;
  $grund = $suprafata * 0.11;
  $fond = $suprafata * 0.25;
  $pigment = $cons_total * 0.05;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $intaritor = number_format( $intaritor, 2, ",", "." );
  $grund = number_format( $grund, 2, ",", "." );
  $fond = number_format( $fond, 2, ",", "." );
  $pigment = number_format( $pigment, 2, ",", "." );
  $cons_total = number_format( $cons_total, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
  <div class="results">
    <div class="cosum text-center">
      <p class="p-space"><strong>Consumul Total:</strong></p>
      <span class="small">la 1 strat</span>
      <p class="num-res"><?php echo $cons_total ?></p>
      <p><strong>Kg produs</strong></p>
      <p>
        <?php
        if ( $tipsuprafata == "Sapa" ) {
          echo "<strong>Consumul</strong> la 1 strat de <strong class='strat mark'>grosime = 1 mm</strong> de <span class='RaspunsEchoBold'>Pardoseala Epoxidica Autonivelanta cu Pigmenti Metalizati „Emex Lucent SL”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "Grund Epoxidic de Amorsare: <span class='RaspunsEchoBold'>$grund Kg</span><br />";
          echo "Vopsea Epoxidica de Pardoseala „Emex”: <span class='RaspunsEchoBold'>$fond Kg</span><br />";
          echo "Pigment metalic: cca. <span class='RaspunsEchoBold'>$pigment Kg</span><br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span><br />";
        }
        if ( $tipsuprafata == "Sapa Sclivisita" ) {
          echo "<strong>Consumul</strong> la 1 strat de <strong class='strat mark'>grosime = 1 mm</strong> de <span class='RaspunsEchoBold'>Pardoseala Epoxidica Autonivelanta cu Pigmenti Metalizati „Emex Lucent SL”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "Grund Epoxidic de Amorsare: <span class='RaspunsEchoBold'>$grund Kg</span><br />";
          echo "Vopsea Epoxidica de Pardoseala „Emex”: <span class='RaspunsEchoBold'>$fond Kg</span><br />";
          echo "Pigment metalic: cca. <span class='RaspunsEchoBold'>$pigment Kg</span><br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span><br />";
        }
        if ( $tipsuprafata == "Beton Elicopterizat" ) {
          echo "<strong>Consumul</strong> la 1 strat de <strong class='strat mark'>grosime = 1 mm</strong> de <span class='RaspunsEchoBold'>Pardoseala Epoxidica Autonivelanta cu Pigmenti Metalizati „Emex Lucent SL”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "Grund Epoxidic de Amorsare: <span class='RaspunsEchoBold'>$grund Kg</span><br />";
          echo "Vopsea Epoxidica de Pardoseala „Emex”: <span class='RaspunsEchoBold'>$fond Kg</span><br />";
          echo "Pigment metalic: cca. <span class='RaspunsEchoBold'>$pigment Kg</span><br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span><br />";
        }
        if ( $tipsuprafata == "Mozaic" ) {
          echo "<strong>Consumul</strong> la 1 strat de <strong class='strat mark'>grosime = 1 mm</strong> de <span class='RaspunsEchoBold'>Pardoseala Epoxidica Autonivelanta cu Pigmenti Metalizati „Emex Lucent SL”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> baza si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
          echo "<span id='consumurile_indirecte'>Consum indirect</span>:<br />";
          echo "Grund Epoxidic de Amorsare: <span class='RaspunsEchoBold'>$grund Kg</span><br />";
          echo "Vopsea Epoxidica de Pardoseala „Emex”: <span class='RaspunsEchoBold'>$fond Kg</span><br />";
          echo "Pigment metalic: cca. <span class='RaspunsEchoBold'>$pigment Kg</span><br />";
          echo "<span class='strat mark'><strong>Nu se va folosi diluant</strong></span><br />";
        }
        ?>
      </p>
    </div>
  </div>
</div>
