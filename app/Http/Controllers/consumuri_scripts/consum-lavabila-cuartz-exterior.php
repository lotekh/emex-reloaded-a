<?php
// $tipsuprafata = $_GET[ 'TipSuprafata' ];
// $suprafata = $_GET[ 'Suprafata' ];
// $tipvopsea = $_GET[ 'TipProdus' ];

// $tipsuprafata = $data['Tip_Suprafață'];
// $suprafata = $data['Suprafață'];
// $tipvopsea = $data['TipProdus'];

$tipsuprafata = 0;
$suprafata = 1;
$tipvopsea = 2;
$consum_vopsea = 0;


if ( $tipsuprafata == "Zidarie" ) {
  $consum_vopsea = $suprafata * 0.75;
  $amorsa = $suprafata * 0.20;
  $apa = $consum_vopsea * 0.1;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Tencuiala driscuita" ) {
  $consum_vopsea = $suprafata * 0.66;
  $amorsa = $suprafata * 0.20;
  $apa = $consum_vopsea * 0.1;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Tencuiala sclivisita" ) {
  $consum_vopsea = $suprafata * 0.60;
  $amorsa = $suprafata * 0.20;
  $apa = $consum_vopsea * 0.1;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
if ( $tipsuprafata == "Revopsita" ) {
  $consum_vopsea = $suprafata * 0.60;
  $amorsa = $suprafata * 0.10;
  $apa = $consum_vopsea * 0.1;
  $consum_vopsea = number_format( $consum_vopsea, 2, ",", "." );
  $amorsa = number_format( $amorsa, 2, ",", "." );
  $apa = number_format( $apa, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
  <div class="results">
    <div class="cosum text-center">
      <p class="p-space"><strong>Consumul Total:</strong></p>
      <span class="small">1 strat cu fier de glet sau</span><br />
      <span class="small">2 straturi cu trafalet</span>
      <p class="num-res"><?php echo $consum_vopsea; ?></p>
      <p><strong>Kg produs</strong></p>
      <p>
        <?php
        if ( $tipsuprafata == "Zidarie" ) {
          echo "<strong>Consumul Total</strong> de <span class='RaspunsEchoBold'>Vopsea Lavabila Profesionala cu Cuartz “Emex QT”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
          echo "Amorsa grea (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
          echo "Apa Max.: <span class='RaspunsEchoBold'>$apa l</span>.<br />";
        }
        if ( $tipsuprafata == "Tencuiala driscuita" ) {
          echo "<strong>Consumul Total</strong> de <span class='RaspunsEchoBold'>Vopsea Lavabila Profesionala cu Cuartz “Emex QT”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
          echo "Amorsa grea (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
          echo "Apa Max.: <span class='RaspunsEchoBold'>$apa l</span>.<br />";
        }
        if ( $tipsuprafata == "Tencuiala sclivisita" ) {
          echo "<strong>Consumul Total</strong> de <span class='RaspunsEchoBold'>Vopsea Lavabila Profesionala cu Cuartz “Emex QT”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
          echo "Amorsa grea (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
          echo "Apa Max.: <span class='RaspunsEchoBold'>$apa l</span>.<br />";
        }
        if ( $tipsuprafata == "Revopsita" ) {
          echo "<strong>Consumul Total</strong> de <span class='RaspunsEchoBold'>Vopsea Lavabila Profesionala cu Cuartz “Emex QT”</span> pentru<br />";
          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
          echo "Amorsa grea (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
          echo "Apa Max.: <span class='RaspunsEchoBold'>$apa l</span>.<br />";
        }
        ?>
      </p>
    </div>
  </div>
</div>
