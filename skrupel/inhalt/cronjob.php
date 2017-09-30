<?php
include ('../inc.conf.php');

$conn = @mysql_connect($server.':'.$port,$login,$password);
$db = @mysql_select_db($database,$conn);

$zeiger = @mysql_query("SELECT * FROM $skrupel_info");
$array1 = @mysql_fetch_array($zeiger);
$spiel_chat = $array1['chat'];
$spiel_anleitung = $array1['anleitung'];
$spiel_forum = $array1['forum'];
$spiel_forum_url = $array1['forum_url'];
$spiel_version = $array1['version'];
$spiel_extend = $array1['extend'];
$spiel_serial = $array1['serial'];

$zeiger_temp = @mysql_query("SELECT * FROM $skrupel_spiele WHERE phase=0 AND autozug>0 ORDER BY lasttick+3600*autozug;");
$spielanzahl = @mysql_num_rows($zeiger_temp);

if ($spielanzahl>=1) {

   $ok = @mysql_data_seek($zeiger_temp,0);
   $array2 = @mysql_fetch_array($zeiger_temp);

   $autozug = $array2['autozug'];
   $nebel = $array2['nebel'];
   $spiel = $array2['id'];
   $module = @explode(':', $array2['module']);
   $lasttick = $array2['lasttick'];
   $spieleranzahl = $array2['spieleranzahl'];
   $ziel_id = $array2['ziel_id'];
   $ziel_info = $array2['ziel_info'];

   $spieler_1 = $array2['spieler_1'];
   $spieler_2 = $array2['spieler_2'];
   $spieler_3 = $array2['spieler_3'];
   $spieler_4 = $array2['spieler_4'];
   $spieler_5 = $array2['spieler_5'];
   $spieler_6 = $array2['spieler_6'];
   $spieler_7 = $array2['spieler_7'];
   $spieler_8 = $array2['spieler_8'];
   $spieler_9 = $array2['spieler_9'];
   $spieler_10 = $array2['spieler_10'];

   for($sp=1; $sp<=10; $sp++) {
      $tmpstr = 'spieler_'.$sp;
      $spieler_id_c[$sp] = $array2[$tmpstr];
      $spieler_ziel_c[$sp] = $array2[$tmpstr.'_ziel'];
      $spieler_rasse_c[$sp] = $array2[$tmpstr.'_rasse'];
      $spieler_raus_c[$sp] = $array2[$tmpstr.'_raus'];
   }

   $plasma_wahr = $array2['plasma_wahr'];
   $plasma_max = $array2['plasma_max'];
   $plasma_lang = $array2['plasma_lang'];
   $piraten_mitte = $array2['piraten_mitte'];
   $piraten_aussen = $array2['piraten_aussen'];
   $piraten_min = $array2['piraten_min'];
   $piraten_max = $array2['piraten_max'];

   $spiel_name = $array2['name'];
   $nebel = $array2['nebel'];
   $runde = $array2['runde'];
   $spieleranzahl = $array2['spieleranzahl'];
   $umfang = $array2['umfang'];
   $aufloesung = $array2['aufloesung'];
   $spiel_out = $array2['oput'];

   $sid = $array2['sid'];
   $phase = $array2['phase'];

   $aktuell = time();
   $interval = 3600*$autozug;

   if (($aktuell>=$lasttick+$interval) && ($runde>1)) {

      $lasttick=time();

      $zeiger = mysql_query("UPDATE $skrupel_spiele SET lasttick='$lasttick' WHERE id=$spiel;");

      $main_verzeichnis = '../';
      include_once ('inc.host.php');

      $zeiger = mysql_query("UPDATE $skrupel_spiele set spieler_1_zug=0,spieler_2_zug=0,spieler_3_zug=0,spieler_4_zug=0,spieler_5_zug=0,spieler_6_zug=0,spieler_7_zug=0,spieler_8_zug=0,spieler_9_zug=0,spieler_10_zug=0 where id=$spiel;");

   }
}

@mysql_close();
?>