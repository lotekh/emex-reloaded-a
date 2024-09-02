<?php
$tipsuprafata = $_GET[ 'TipSuprafata' ];
$suprafata = $_GET[ 'Suprafata' ];
$tipamorsa = $_GET[ 'TipProdus' ];
if ( $tipsuprafata == "Zidarie" ) {
  $consum_amorsa_min = $suprafata * 0.05;
  $consum_apa_max = $suprafata * 0.15;
  $consum_amorsa_max = $suprafata * 0.10;
  $consum_apa_min = $suprafata * 0.10;
  $consum_amorsa_min = number_format( $consum_amorsa_min, 2, ",", "." );
  $consum_apa_max = number_format( $consum_apa_max, 2, ",", "." );
  $consum_amorsa_max = number_format( $consum_amorsa_max, 2, ",", "." );
  $consum_apa_min = number_format( $consum_apa_min, 2, ",", "." );
}
if ( $tipsuprafata == "Tencuiala driscuita" ) {
  $consum_amorsa_min = $suprafata * 0.05;
  $consum_apa_max = $suprafata * 0.15;
  $consum_amorsa_max = $suprafata * 0.10;
  $consum_apa_min = $suprafata * 0.10;
  $consum_amorsa_min = number_format( $consum_amorsa_min, 2, ",", "." );
  $consum_apa_max = number_format( $consum_apa_max, 2, ",", "." );
  $consum_amorsa_max = number_format( $consum_amorsa_max, 2, ",", "." );
  $consum_apa_min = number_format( $consum_apa_min, 2, ",", "." );
}
if ( $tipsuprafata == "Glet de ipsos" ) {
  $consum_amorsa_min = $suprafata * 0.05;
  $consum_apa_max = $suprafata * 0.15;
  $consum_amorsa_max = $suprafata * 0.08;
  $consum_apa_min = $suprafata * 0.12;
  $consum_amorsa_min = number_format( $consum_amorsa_min, 2, ",", "." );
  $consum_apa_max = number_format( $consum_apa_max, 2, ",", "." );
  $consum_amorsa_max = number_format( $consum_amorsa_max, 2, ",", "." );
  $consum_apa_min = number_format( $consum_apa_min, 2, ",", "." );
}
if ( $tipsuprafata == "Rigips" ) {
  $consum_amorsa_min = $suprafata * 0.05;
  $consum_apa_max = $suprafata * 0.15;
  $consum_amorsa_max = $suprafata * 0.08;
  $consum_apa_min = $suprafata * 0.12;
  $consum_amorsa_min = number_format( $consum_amorsa_min, 2, ",", "." );
  $consum_apa_max = number_format( $consum_apa_max, 2, ",", "." );
  $consum_amorsa_max = number_format( $consum_amorsa_max, 2, ",", "." );
  $consum_apa_min = number_format( $consum_apa_min, 2, ",", "." );
}
if ( $tipsuprafata == "Revopsita" ) {
  $consum_amorsa_min = $suprafata * 0.05;
  $consum_apa_max = $suprafata * 0.15;
  $consum_amorsa_max = $suprafata * 0.08;
  $consum_apa_min = $suprafata * 0.12;
  $consum_amorsa_min = number_format( $consum_amorsa_min, 2, ",", "." );
  $consum_apa_max = number_format( $consum_apa_max, 2, ",", "." );
  $consum_amorsa_max = number_format( $consum_amorsa_max, 2, ",", "." );
  $consum_apa_min = number_format( $consum_apa_min, 2, ",", "." );
}
?>
<div class="paint-50 bor-bg">
<div class="results">
<div class="cosum text-center">
<p class="p-space"><strong>Consumul Mediu:</strong></p>
<span class="small">1 strat</span>
<p class="num-res"><?php echo "$consum_amorsa_min ÷ $consum_amorsa_max"; ?></p>
<p><strong>Kg produs</strong></p>
<p>
<?php
if ( $tipsuprafata == "Zidarie" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Amorsa Acrilica Antimucegai “Emex”</span> pentru<br/>";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/>
este de minim <span class='RaspunsEchoBold'>$consum_amorsa_min l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_max l</span> de apa <br/>
pana la maxim <span class='RaspunsEchoBold'>$consum_amorsa_max l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_min l</span> de apa.<br/><br/>";
}
if ( $tipsuprafata == "Tencuiala driscuita" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Amorsa Acrilica Antimucegai “Emex”</span> pentru<br/>";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/>
este de minim <span class='RaspunsEchoBold'>$consum_amorsa_min l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_max l</span> de apa <br/>
pana la maxim <span class='RaspunsEchoBold'>$consum_amorsa_max l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_min l</span> de apa.<br/><br/>";
}
if ( $tipsuprafata == "Glet de ipsos" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Amorsa Acrilica Antimucegai “Emex”</span> pentru<br/>";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/>
este de minim <span class='RaspunsEchoBold'>$consum_amorsa_min l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_max l</span> de apa <br/>
pana la maxim <span class='RaspunsEchoBold'>$consum_amorsa_max l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_min l</span> de apa.<br/><br/>";
}
if ( $tipsuprafata == "Rigips" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Amorsa Acrilica Antimucegai “Emex”</span> pentru<br/>";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/>
este de minim <span class='RaspunsEchoBold'>$consum_amorsa_min l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_max l</span> de apa <br/>
pana la maxim <span class='RaspunsEchoBold'>$consum_amorsa_max l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_min l</span> de apa.<br/><br/>";
}
if ( $tipsuprafata == "Revopsita" ) {
  echo "<strong>Consumul Mediu</strong> <span class='strat mark'>la 1 strat</span> de <span class='RaspunsEchoBold'>Amorsa Acrilica Antimucegai “Emex”</span> pentru<br/>";
  echo "Suprafata de tip <span class='RaspunsEchoBold'>$tipsuprafata</span> de <span class='RaspunsEchoBold'>$suprafata mp</span>,<br/>
este de minim <span class='RaspunsEchoBold'>$consum_amorsa_min l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_max l</span> de apa <br/>
pana la maxim <span class='RaspunsEchoBold'>$consum_amorsa_max l</span> - la o diluare cu <span class='RaspunsEchoBold'>$consum_apa_min l</span> de apa.<br/>";
}
?>
</p>
</div>
</div>
</div>
