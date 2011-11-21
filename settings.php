<?php
/**
 * Allgemeine Config Datei
 * dies Datei wurde automatisch generiert
 * daher diese
 * DATEI NICHT MANUEL AENDERN !!!
 */

//Fehlerreporting
//error_reporting(E_ALL);

//DEBUG-MODUS (wenn true, wird die Debug-Konsole angezeigt)
define('DEBUG',true);

//HTML-TITEL
define('HTML_TITLE_PLAYLIST',"Playlist (Campusradio-Jena Edition)");

//seit PHP 5.3 sollte die Zeitzone gesetzt werden
date_default_timezone_set('Europe/Berlin');

//Datenbankbenutzer
define('PLAYLIST_DATE_FORMAT',"Y-m-d");


/*
################################################################
############################  MySQL ############################
################################################################
*/

//DATENBANKVERBINDUNGS-DATEN
define('DB_SERVER_PLAYLIST',"");//Tabellen Host
define('DB_PORT_PLAYLIST',"");
define('DB_NAME_PLAYLIST',"");

//Datenbankbenutzer
define('DB_USER_PLAYLIST',"");

//Benutzerpasswort
define('DB_PASSWORD_PLAYLIST',"");


?>
