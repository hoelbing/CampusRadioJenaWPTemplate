<?php
# Name: playlist.php
# File Description: Playlist auslesen und variabler text auslesen
# Author: Carsten Hoelbing
# Web: http://www.hoelbing.net/
# Update: 2011-09-21
# Version: 2.0.3
# Copyright 2011, Carsten Hoelbing carsten@hoelbing.net

/*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/*

----Tabellenaufbau

CREATE TABLE IF NOT EXISTS `playlisttable` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `interpret` tinytext COLLATE latin1_general_ci NOT NULL,
  `title` tinytext COLLATE latin1_general_ci NOT NULL,
  `playdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_stop` tinyint(2) NOT NULL DEFAULT '0',
  `typ` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
) ;

*/
###################################################################################################
//wordpress Einstellungen laden
require('../../../wp-blog-header.php');

//Einstellungen werden geladen
require_once('settings.php');

if (isset($_REQUEST['year'])) $year = $_REQUEST['year']; else $year = date("Y",time());
if (isset($_REQUEST['month'])) $month = $_REQUEST['month']; else $month = date("m",time());
if (isset($_REQUEST['day'])) $day = $_REQUEST['day']; else $day = date("d",time());

if (checkdate($month, $day, $year) == true)
{
	$date = mktime(0, 0, 0, $month, $day, $year);
}
else
	$date = date(PLAYLIST_DATE_FORMAT, time());

/*
###################################################################################################
Funktionen Start
###################################################################################################
*/

/**
*Alles ueber der Trennlienen wird hier ausgegeben
*/
function ausgabe_header($date)
{
	$date_prev = $date-86400;
	$date_next = $date+86400;
	
/*	$ausgabe_html_header  = '<html>'."\n";
	$ausgabe_html_header .= '<header>'."\n";
	$ausgabe_html_header .= '<title>'.HTML_TITLE_PLAYLIST.'</title>'."\n";
	$ausgabe_html_header .= '<meta name="description" content="Campusradio Jena" />'."\n";
	$ausgabe_html_header .= '<meta name="keywords" content="Campusradio Jena, Campusradio, Jena" />'."\n";
	//$ausgabe_html_header .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n";
	$ausgabe_html_header .= '<meta http-equiv="Content-Style-Type" content="text/css" />'."\n";
	$ausgabe_html_header .= '<meta http-equiv="content-language" content="de" />'."\n";
	$ausgabe_html_header .= '<meta http-equiv="pragma" content="no-cache" />'."\n";

	// CSS
	$ausgabe_html_header .= '<style type="text/css">'."\n";
	$ausgabe_html_header .= 'body { font-size:15px;font-family: Arial; }'."\n";	
	$ausgabe_html_header .= '.playlist { font-size:15px;font-family: Arial; }'."\n";
	$ausgabe_html_header .= '.zeile1 { background-color: #E5E5E5; }'."\n";
	$ausgabe_html_header .= '.zeile2 { background-color: #FFFFFF; }'."\n";	
	$ausgabe_html_header .= '</style>'."\n";
	
	$ausgabe_html_header .= '</header>'."\n";
	$ausgabe_html_header .= '<body>'."\n";
*/
	$ausgabe_html_header = '<style type="text/css">'."\n";
	$ausgabe_html_header .= 'body { font-size:15px;font-family: Arial; }'."\n";	
	$ausgabe_html_header .= '.playlist { font-size:15px;font-family: Arial; }'."\n";
	$ausgabe_html_header .= '.zeile1 { background-color: #E5E5E5; }'."\n";
	$ausgabe_html_header .= '.zeile2 { background-color: #FFFFFF; }'."\n";	
	$ausgabe_html_header .= '</style>'."\n";

	//HTML body tag
	$ausgabe_text = "Playlist von 8-11 und 21-24 Uhr". "<br><br>"."\n";
	$ausgabe_text .= '<table border=0 cellspacing=4 width="100%">'."\n";
	$ausgabe_text .= '<tr>';
	$ausgabe_text .= '<td width="35%">&nbsp</td>'."\n";
	$ausgabe_text .= '<td>';


	if ( date("Y",$date_prev) > "2003")
	{
		$ausgabe_text .= '<a href="?year='.date("Y",$date_prev).'&month='.date("m",$date_prev).'&day='.date("d",$date_prev).'"> << </a> ';
	}
	else
		$ausgabe_text .= ' <<  ';

	$ausgabe_text .= date("l",$date);
	$ausgabe_text .= ', ';
	$ausgabe_text .= date("d.m.Y",$date);

	if ($date < time()-86400)
	{
		$ausgabe_text .= ' <a href="?year='.date("Y",$date_next).'&month='.date("m",$date_next).'&day='.date("d",$date_next).'"> >> </a>';
	}
	else
		$ausgabe_text .= ' >> ';

	$ausgabe_text .= '</td>';
	$ausgabe_text .= '</tr>'."\n";
	$ausgabe_text .= '</table>'."\n";
	$ausgabe_text .= '<hr>';
	$ausgabe_text .= '<br>'."\n";
//	$ausgabe_text .= '</body></html>'."\n";

	echo $ausgabe_html_header;
	echo $ausgabe_text;
}

function erstelle_date_sql_string($date)
{
	$time_start_1 = "07:59:00"; // Sendungs - Start
	$time_stop_1 = "11:00:00";  // Sendungs - Ende
	$time_start_2 = "21:00:00";	// Latenight - Start
	$time_stop_2 = "23:59:59";	// Latenight - Ende
	$timedate = date(PLAYLIST_DATE_FORMAT, $date);

	$sql = "SELECT interpret, title, playdate, is_stop, typ ";
	$sql .= " FROM playlisttable ";
	$sql .= " WHERE (playdate>'".$timedate." ".$time_start_1."' and playdate<'".$timedate." ".$time_stop_1."') ";
	$sql .= "	 or (playdate>'".$timedate." ".$time_start_2."' and playdate<'".$timedate." ".$time_stop_2."') ";
	$sql .= " ORDER BY playdate asc";

	return $sql;
}

/*
###################################################################################################
Funktionen Ende
###################################################################################################
*/

// html Header ausgeben
get_header();

echo '<div id="box_content">';

ausgabe_header($date);

// Verbindung zum Server herstellen
$connection = mysql_connect(
					DB_SERVER_PLAYLIST,
					DB_USER_PLAYLIST, 
					DB_PASSWORD_PLAYLIST,
					DB_NAME_PLAYLIST,
					DB_PORT_PLAYLIST
				);
 
if( !$connection )
  die("Keine Verbindung m�glich: " . mysql_error());

// Datenbank auswaehlen
if( !mysql_select_db(DB_NAME_PLAYLIST) )
  die("Auswahl der Datenbank fehlgeschlagen: " . mysql_error());


$sql = erstelle_date_sql_string($date);

$result = mysql_query($sql) OR die(mysql_error(). "<br>SQL: ". $sql);

$schleifen_counter = 0;
$tmp_interpret = "";
$tmp_title = "";
$row = array();
$playlist_array = array();

while ($row = mysql_fetch_array($result)) 
{
	//info: if Feld $row['is_stop'] == 0 dann Titels wurde gestartet
	//	    if Feld $row['is_stop'] == 1 dann Titels wurde gestopt

	if ($row['is_stop'] == 0)
	{
		$playlist_array[$schleifen_counter]['interpret'] = $row['interpret'];
		$playlist_array[$schleifen_counter]['title'] = $row['title'];
		$playlist_array[$schleifen_counter]['typ'] = $row['typ'];
		$playlist_array[$schleifen_counter]['playdate_start'] = substr($row['playdate'],11,5);
			$schleifen_counter++;
	}

}
/*
###################################################################################################
Ausgabe (html)
###################################################################################################
*/

if ( mysql_num_rows($result) != 0)
{
	$playlist_tab = '<table border=0 cellspacing=4 cellpadding=4>'."\n"."\n";
	$playlist_tab .= '<tr><th>Zeit</th><th>Titel</th><th>Interpret</th></tr>'."\n";
	$i=0;
	$zeilewert=1;
	for ($i = count($playlist_array)-1; $i >= 0; $i-- )
	{
		$playlist_tab .= '<tr class="zeile'.$zeilewert.'">'."\n";
		$playlist_tab .= '  <td class="playlist"><!--start-->'.$playlist_array[$i]['playdate_start']."\n";
		if ($playlist_array[$i]['playdate_stop'] != "")
			$playlist_tab .= ' - '.$playlist_array[$i]['playdate_stop'].'<!--(Ende)-->';
		$playlist_tab .= '  </td>'."\n";
		$playlist_tab .= '  <td class="playlist"><!--Titel-->'.$playlist_array[$i]['title'].'</td>'."\n";
		$playlist_tab .= '  <td class="playlist"><!--Interpret-->'.$playlist_array[$i]['interpret'].'</td>'."\n";
		$playlist_tab .= '</tr>'."\n";
		if ($zeilewert==1)
			$zeilewert=2;
		else
			$zeilewert=1;
	}

	$playlist_tab .= '</table>';

	echo $playlist_tab;
	//echo '</body></html>'."\n";

}
else
{
	echo '<br><p>Leider ist f&uuml;r diesen Tag keine Playliste verf&uuml;gbar.</p>';
}

// Verbindung beenden
mysql_close( $connection );

echo '</div>';

get_sidebar();

get_footer();

?>