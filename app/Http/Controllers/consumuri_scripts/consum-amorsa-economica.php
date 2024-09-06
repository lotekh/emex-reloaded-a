                <?php

                $tipsuprafata = $_GET['TipSuprafata'];
                $suprafata = $_GET['Suprafata'];
                $tipamorsa = $_GET['TipProdus'];
                if ($tipsuprafata == "Zidarie") {
                  $consum_amorsa_min = $suprafata * 0.1;
                  $consum_apa_max = $suprafata * 0.02;
                  $consum_amorsa_max = $suprafata * 0.12;
                  $consum_apa_min = $suprafata * 0.00;
                  $consum_amorsa_min = number_format($consum_amorsa_min, 2, ",", ".");
                  $consum_apa_max = number_format($consum_apa_max, 2, ",", ".");
                  $consum_amorsa_max = number_format($consum_amorsa_max, 2, ",", ".");
                  $consum_apa_min = number_format($consum_apa_min, 2, ",", ".");
                }
                if ($tipsuprafata == "Tencuiala driscuita") {
                  $consum_amorsa_min = $suprafata * 0.1;
                  $consum_apa_max = $suprafata * 0.02;
                  $consum_amorsa_max = $suprafata * 0.12;
                  $consum_apa_min = $suprafata * 0.00;
                  $consum_amorsa_min = number_format($consum_amorsa_min, 2, ",", ".");
                  $consum_apa_max = number_format($consum_apa_max, 2, ",", ".");
                  $consum_amorsa_max = number_format($consum_amorsa_max, 2, ",", ".");
                  $consum_apa_min = number_format($consum_apa_min, 2, ",", ".");
                }
                if ($tipsuprafata == "Glet de ipsos") {
                  $consum_amorsa_min = $suprafata * 0.08;
                  $consum_apa_max = $suprafata * 0.04;
                  $consum_amorsa_max = $suprafata * 0.1;
                  $consum_apa_min = $suprafata * 0.02;
                  $consum_amorsa_min = number_format($consum_amorsa_min, 2, ",", ".");
                  $consum_apa_max = number_format($consum_apa_max, 2, ",", ".");
                  $consum_amorsa_max = number_format($consum_amorsa_max, 2, ",", ".");
                  $consum_apa_min = number_format($consum_apa_min, 2, ",", ".");
                }
                if ($tipsuprafata == "Rigips") {
                  $consum_amorsa_min = $suprafata * 0.08;
                  $consum_apa_max = $suprafata * 0.04;
                  $consum_amorsa_max = $suprafata * 0.1;
                  $consum_apa_min = $suprafata * 0.02;
                  $consum_amorsa_min = number_format($consum_amorsa_min, 2, ",", ".");
                  $consum_apa_max = number_format($consum_apa_max, 2, ",", ".");
                  $consum_amorsa_max = number_format($consum_amorsa_max, 2, ",", ".");
                  $consum_apa_min = number_format($consum_apa_min, 2, ",", ".");
                }
                if ($tipsuprafata == "Revopsita") {
                  $consum_amorsa_min = $suprafata * 0.08;
                  $consum_apa_max = $suprafata * 0.04;
                  $consum_amorsa_max = $suprafata * 0.1;
                  $consum_apa_min = $suprafata * 0.02;
                  $consum_amorsa_min = number_format($consum_amorsa_min, 2, ",", ".");
                  $consum_apa_max = number_format($consum_apa_max, 2, ",", ".");
                  $consum_amorsa_max = number_format($consum_amorsa_max, 2, ",", ".");
                  $consum_apa_min = number_format($consum_apa_min, 2, ",", ".");
                }

                ?>
                <div class="paint-50 bor-bg">
                  <div class="results">
                    <div class="cosum text-center">
                      <p class="p-space"><strong>Consumul Total:</strong></p>
                      <p>
                        <?php

                        if ($tipsuprafata == "Zidarie") {
                          echo "<b>Consumul Total</b> de <span class='RaspunsEchoBold'>Amorsa de Perete Economica</span> pentru<br/>";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/>
este de minim <span class='RaspunsEchoBold'>$consum_amorsa_min l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_max l</span> de apa <br/>
pana la maxim <span class='RaspunsEchoBold'>$consum_amorsa_max l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_min l</span> de apa.<br/><br/>";
                        }
                        if ($tipsuprafata == "Tencuiala driscuita") {
                          echo "<b>Consumul Total</b> de <span class='RaspunsEchoBold'>Amorsa de Perete Economica</span> pentru<br/>";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/>
este de minim <span class='RaspunsEchoBold'>$consum_amorsa_min l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_max l</span> de apa <br/>
pana la maxim <span class='RaspunsEchoBold'>$consum_amorsa_max l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_min l</span> de apa.<br/><br/>";
                        }
                        if ($tipsuprafata == "Glet de ipsos") {
                          echo "<b>Consumul Total</b> de <span class='RaspunsEchoBold'>Amorsa de Perete Economica</span> pentru<br/>";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/>
este de minim <span class='RaspunsEchoBold'>$consum_amorsa_min l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_max l</span> de apa <br/>
pana la maxim <span class='RaspunsEchoBold'>$consum_amorsa_max l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_min l</span> de apa.<br/><br/>";
                        }
                        if ($tipsuprafata == "Rigips") {
                          echo "<b>Consumul Total</b> de <span class='RaspunsEchoBold'>Amorsa de Perete Economica</span> pentru<br/>";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/>
este de minim <span class='RaspunsEchoBold'>$consum_amorsa_min l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_max l</span> de apa <br/>
pana la maxim <span class='RaspunsEchoBold'>$consum_amorsa_max l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_min l</span> de apa.<br/><br/>";
                        }
                        if ($tipsuprafata == "Revopsita") {
                          echo "<b>Consumul Total</b> de <span class='RaspunsEchoBold'>Amorsa de Perete Economica</span> pentru<br/>";
                          echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/>
este de minim <span class='RaspunsEchoBold'>$consum_amorsa_min l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_max l</span> de apa <br/>
pana la maxim <span class='RaspunsEchoBold'>$consum_amorsa_max l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_min l</span> de apa.<br/>";
                        }

                        ?>
                      </p>
                    </div>
                  </div>
                </div>
                