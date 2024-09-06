                <?php
                $tipsuprafata = $_GET['TipSuprafata'];
                $suprafata = $_GET['Suprafata'];
                $tipvopsea = $_GET['TipProdus'];
                if ($tipsuprafata == "Tencuiala driscuita") {
                  $consum_vopsea = $suprafata * 0.80;
                  $amorsa = $suprafata * 0.30;
                  $apa = ($consum_vopsea + $amorsa) * 0.06;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $amorsa = number_format($amorsa, 2, ",", ".");
                  $apa = number_format($apa, 2, ",", ".");
                }
                if ($tipsuprafata == "Tencuiala sclivisita") {
                  $consum_vopsea = $suprafata * 0.75;
                  $amorsa = $suprafata * 0.25;
                  $apa = ($consum_vopsea + $amorsa) * 0.06;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $amorsa = number_format($amorsa, 2, ",", ".");
                  $apa = number_format($apa, 2, ",", ".");
                }
                ?>
                <div class="paint-50 bor-bg">
                  <div class="results">
                    <div class="cosum text-center">
                      <p class="p-space"><strong>Consumul Total:</strong></p>
                      <span class="small">(1 strat)</span>
                      <p class="num-res"><?php echo $consum_vopsea; ?></p>
                      <p><strong>Kg produs</strong></p>
                      <p>
                        <?php
                        if ($tipsuprafata == "Tencuiala driscuita") {
                          echo "<b>Consumul Total</b> de <span class='RaspunsEchoBold'>$tipvopsea</span> pentru<br />";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de <span class='RaspunsEchoBold'>aprox. $consum_vopsea Kg</span> produs.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "Grund de amorsare cu cuart: <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
                          echo "Apa total (la tencuiala + amorsa): <span class='RaspunsEchoBold'>cca. $apa l</span>.";
                        }
                        if ($tipsuprafata == "Tencuiala sclivisita") {
                          echo "<b>Consumul Total</b> de <span class='RaspunsEchoBold'>$tipvopsea</span> pentru<br />";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de <span class='RaspunsEchoBold'>aprox. $consum_vopsea Kg</span> produs.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "Grund de amorsare cu cuart: <span class='RaspunsEchoBold'>$amorsa Kg</span>.<br />";
                          echo "Apa total (la tencuiala + amorsa): <span class='RaspunsEchoBold'>cca. $apa l</span>.";
                        }
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
 