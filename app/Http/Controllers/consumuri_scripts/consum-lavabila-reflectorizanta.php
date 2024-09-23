
                <?php
                $tipsuprafata = $_GET['TipSuprafata'];
                $suprafata = $_GET['Suprafata'];
                $tipvopsea = $_GET['TipProdus'];
                if ($tipsuprafata == "Glet de ipsos") {
                  $consum_vopsea = $suprafata * 0.50;
                  $amorsa = $suprafata * 0.14;
                  $apa = ($consum_vopsea + $amorsa) * 0.1;
                  $grund = $suprafata * 0.14;
                  $microsfere = $suprafata * 0.36;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $grund = number_format($grund, 2, ",", ".");
                  $rezultat_microsfere = number_format($apa, 2, ",", ".");
                  $amorsa = number_format($amorsa, 2, ",", ".");
                  $apa = number_format($apa, 2, ",", ".");
                }
                if ($tipsuprafata == "Rigips") {
                  $consum_vopsea = $suprafata * 0.50;
                  $amorsa = $suprafata * 0.14;
                  $apa = ($consum_vopsea + $amorsa) * 0.1;
                  $grund = $suprafata * 0.12;
                  $microsfere = $suprafata * 0.36;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $grund = number_format($grund, 2, ",", ".");
                  $rezultat_microsfere = number_format($apa, 2, ",", ".");
                  $amorsa = number_format($amorsa, 2, ",", ".");
                  $apa = number_format($apa, 2, ",", ".");
                }
                if ($tipsuprafata == "Revopsita") {
                  $consum_vopsea = $suprafata * 0.50;
                  $amorsa = $suprafata * 0.10;
                  $apa = ($consum_vopsea + $amorsa) * 0.1;
                  $microsfere = $suprafata * 0.36;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $amorsa = number_format($amorsa, 2, ",", ".");
                  $apa = number_format($apa, 2, ",", ".");
                  $rezultat_microsfere = number_format($apa, 2, ",", ".");
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
                        if ($tipsuprafata == "Glet de ipsos") {
                          echo "<b>Consumul Total</b> (2 straturi) de <span class='RaspunsEchoBold'>Vopsea $tipvopsea</span> pentru<br />";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "<b>Recomandat:</b><br />";
                          echo "Grund de Amorsare si Umplere Pori: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
                          echo "<b>Obligatoriu:</b><br />";
                          echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
                          echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
                          echo "Microsfere de Sticla: <span class='RaspunsEchoBold'>$rezultat_microsfere Kg</span>.<br />";
                        }
                        if ($tipsuprafata == "Rigips") {
                          echo "<b>Consumul Total</b> (2 straturi) de <span class='RaspunsEchoBold'>Vopsea $tipvopsea</span> pentru<br />";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "<b>Recomandat:</b><br />";
                          echo "Grund de Amorsare si Umplere Pori: <span class='RaspunsEchoBold'>$grund Kg</span>.<br />";
                          echo "<b>Obligatoriu:</b><br />";
                          echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
                          echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
                          echo "Microsfere de Sticla: <span class='RaspunsEchoBold'>$rezultat_microsfere Kg</span>.<br />";
                        }
                        if ($tipsuprafata == "Revopsita") {
                          echo "<b>Consumul Total</b> (2 straturi) de <span class='RaspunsEchoBold'>Vopsea $tipvopsea</span> pentru<br />";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "Amorsa (valoare medie): <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
                          echo "Apa (valoare medie): <span class='RaspunsEchoBold'>$apa l</span>.<br />";
                          echo "Microsfere de Sticla: <span class='RaspunsEchoBold'>$rezultat_microsfere Kg</span>.<br />";
                        }
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
             