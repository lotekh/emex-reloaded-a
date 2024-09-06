
                <?php
                $tipsuprafata = $_GET['TipSuprafata'];
                $suprafata = $_GET['Suprafata'];
                $tipvopsea = $_GET['TipProdus'];
                if ($tipsuprafata == "Metal") {
                  $consum_vopsea = $suprafata * 0.13;
                  $diluant = $consum_vopsea * 0.1;
                  $consum_vopsea = number_format($consum_vopsea, 2, ",", ".");
                  $diluant = number_format($diluant, 2, ",", ".");
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
                        if ($tipsuprafata == "Metal") {
                          echo "<b>Consumul Mediu</b> (la 1 strat) de <span class='RaspunsEchoBold'>Grund Anticoroziv cu Uscare la Cuptor</span> pentru<br />";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br /> va fi de aprox. <span class='RaspunsEchoBold'>$consum_vopsea Kg</span> produs.<br />";
                          echo "<span id='consumurile_indirecte'>Consumurile indirecte</span> vor fi:<br />";
                          echo "Solvent cca.: <span class='RaspunsEchoBold'>$diluant L</span>.<br />";
                        }
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
             