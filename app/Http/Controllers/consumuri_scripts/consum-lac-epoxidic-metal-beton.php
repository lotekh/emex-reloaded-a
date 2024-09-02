
                <?php $tipsuprafata = $_GET['TipSuprafata'];
                $suprafata = $_GET['Suprafata'];
                $tipvopsea = $_GET['TipProdus'];
                if ($tipsuprafata == "Metal") {
                  $consum_vopsea = $suprafata * 0.20;
                  $grund = $consum_vopsea * 0.10;
                  $intaritor = $consum_vopsea * 0.3;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $grund = number_format($grund, 2, ",", ".");
                  $intaritor = number_format($intaritor, 2, ",", ".");
                }
                if ($tipsuprafata == "Sapa Sclivisita") {
                  $consum_vopsea = $suprafata * 0.28;
                  $grund = $consum_vopsea * 0.10;
                  $intaritor = $consum_vopsea * 0.32;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $grund = number_format($grund, 2, ",", ".");
                  $intaritor = number_format($intaritor, 2, ",", ".");
                }
                if ($tipsuprafata == "Beton Elicopterizat") {
                  $consum_vopsea = $suprafata * 0.24;
                  $grund = $consum_vopsea * 0.10;
                  $intaritor = $consum_vopsea * 0.32;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $grund = number_format($grund, 2, ",", ".");
                  $intaritor = number_format($intaritor, 2, ",", ".");
                }
                if ($tipsuprafata == "Lemn") {
                  $consum_vopsea = $suprafata * 0.24;
                  $grund = $consum_vopsea * 0.10;
                  $intaritor = $consum_vopsea * 0.3;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $grund = number_format($grund, 2, ",", ".");
                  $intaritor = number_format($intaritor, 2, ",", ".");
                } ?>
                <div class="paint-50 bor-bg">
                  <div class="results">
                    <div class="cosum text-center">
                      <p class="p-space"><strong>Consumul Total:</strong></p>
                      <span class="small">(2 straturi)</span>
                      <p class="num-res"><?php echo $consum_vopsea; ?></p>
                      <p><strong>Kg produs</strong></p>
                      <p>
                        <?php if ($tipsuprafata == "Metal") {
                          echo "<b>Consumul Total</b> (2 straturi) de <span class='RaspunsEchoBold'>Lac Epoxidic Solventat</span> pentru<br />";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> lac si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "Diluant: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
                        }
                        if ($tipsuprafata == "Sapa Sclivisita") {
                          echo "<b>Consumul Total</b> (2 straturi) de <span class='RaspunsEchoBold'>Lac Epoxidic Solventat</span> pentru<br />";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> lac si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "Diluant: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
                        }
                        if ($tipsuprafata == "Beton Elicopterizat") {
                          echo "<b>Consumul Total</b> (2 straturi) de <span class='RaspunsEchoBold'>Lac Epoxidic Solventat</span> pentru<br />";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> lac si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "Diluant: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
                        }
                        if ($tipsuprafata == "Lemn") {
                          echo "<b>Consumul Total</b> (2 straturi) de <span class='RaspunsEchoBold'>Lac Epoxidic Solventat</span> pentru<br />";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> lac si <span class='RaspunsEchoBold'>$intaritor Kg</span> intaritor.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "Diluant: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
                        } ?>
                      </p>
                    </div>
                  </div>
                </div>
              