
                <?php
                $tipsuprafata = $_GET['TipSuprafata'];
                $suprafata = $_GET['Suprafata'];
                $tipvopsea = $_GET['TipProdus'];
                if ($tipsuprafata == "Tencuiala driscuita") {
                  $consum_grund = $suprafata * 0.156;
                  $consum_apa = $suprafata * 0.014;
                  $consum_grund = number_format($consum_grund, 2, ",", ".");
                  $consum_apa = number_format($consum_apa, 2, ",", ".");
                }
                if ($tipsuprafata == "Tencuiala sclivisita") {
                  $consum_grund = $suprafata * 0.136;
                  $consum_apa = $suprafata * 0.014;
                  $consum_grund = number_format($consum_grund, 2, ",", ".");
                  $consum_apa = number_format($consum_apa, 2, ",", ".");
                }
                ?>
                <div class="paint-50 bor-bg">
                  <div class="results">
                    <div class="cosum text-center">
                      <p class="p-space"><strong>Consumul Total:</strong></p>
                      <p>
                        <?php
                        if ($tipsuprafata == "Tencuiala driscuita") {
                          echo "<b>Consumul Total Aproximativ</b> de <span class='RaspunsEchoBold'>Grund Silicatic cu Cuart pentru Tencuieli</span> pentru<br/>";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/> este de cca. <span class='RaspunsEchoBold'>$consum_grund Kg</span> produs,<br/> cu un adaos maxim de <span class='RaspunsEchoBold'>$consum_apa l</span> apa.<br/><br/>";
                        }
                        if ($tipsuprafata == "Tencuiala sclivisita") {
                          echo "<b>Consumul Total Aproximativ</b> de <span class='RaspunsEchoBold'>Grund Silicatic cu Cuart pentru Tencuieli</span> pentru<br/>";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/> este de cca. <span class='RaspunsEchoBold'>$consum_grund Kg</span> produs,<br/> cu un adaos maxim de <span class='RaspunsEchoBold'>$consum_apa l</span> apa.<br/>";
                        }
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
               