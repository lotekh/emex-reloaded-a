
                <?php
                $grund = 0;
                $tipsuprafata = $_GET['TipSuprafata'];
                $suprafata = $_GET['Suprafata'];
                $tipvopsea = $_GET['TipProdus'];
                if ($tipsuprafata == "3 mm") {
                  $consum_vopsea = $suprafata * 0.06;
                  $diluant = $consum_vopsea * 0.10;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $grund = number_format($grund, 2, ",", ".");
                  $diluant = number_format($diluant, 2, ",", ".");
                }
                if ($tipsuprafata == "4 mm") {
                  $consum_vopsea = $suprafata * 0.09;
                  $diluant = $consum_vopsea * 0.10;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $grund = number_format($grund, 2, ",", ".");
                  $diluant = number_format($diluant, 2, ",", ".");
                }
                if ($tipsuprafata == "5 mm") {
                  $consum_vopsea = $suprafata * 0.12;
                  $diluant = $consum_vopsea * 0.10;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $grund = number_format($grund, 2, ",", ".");
                  $diluant = number_format($diluant, 2, ",", ".");
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
                        if ($tipsuprafata == "3 mm") {
                          echo "<b>Consumul Total</b> (2 straturi) de <span class='RaspunsEchoBold'>Lac pentru Rosturi de Gresie sau Faianta</span> pentru<br />";
                          echo "o latime a rosturilor de <span class='RaspunsEchoBold'>$tipsuprafata</span> si o lungime totala de <span class='RaspunsEchoBold'>$suprafata ml</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
                        }
                        if ($tipsuprafata == "4 mm") {
                          echo "<b>Consumul Total</b> (2 straturi) de <span class='RaspunsEchoBold'>Lac pentru Rosturi de Gresie sau Faianta</span> pentru<br />";
                          echo "o latime a rosturilor de <span class='RaspunsEchoBold'>$tipsuprafata</span> si o lungime totale de <span class='RaspunsEchoBold'>$suprafata ml</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
                        }
                        if ($tipsuprafata == "5 mm") {
                          echo "<b>Consumul Total</b> (2 straturi) de <span class='RaspunsEchoBold'>Lac pentru Rosturi de Gresie sau Faianta</span> pentru<br />";
                          echo "o latime a rosturilor de <span class='RaspunsEchoBold'>$tipsuprafata</span> si o lungime totale de <span class='RaspunsEchoBold'>$suprafata ml</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "Apa cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
                        }
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
              