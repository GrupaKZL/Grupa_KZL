<?php
error_reporting(E_ALL ^ E_NOTICE);

$connect = mysql_connect("localhost", "root", "") or die("Sprawdź połączenie z serwerem");

mysql_select_db('turystyka');



	mysql_query("SET CHARSET utf8");
    mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

function hotele() {
	global $place;
	global $sort;
	
$query = "SELECT nazwa, telefon, email, usluga, gwiazdki, obiekt, adres FROM hotele WHERE adres LIKE '%".$place."%'";
$sql = mysql_query($query);
 
$ile = mysql_num_rows($sql);
$na_strone = 10; 
$stron = ceil ($ile / $na_strone);
 
for ($i = 1; $i < $stron; $i++) echo ' <a href="?strona='.($i+1).'&miejsce='.$place.'&hotele=1">strona '.($i+1).'</a> ';
if (!isset($_GET['strona'])) $strona = 1; else $strona = (int)$_GET['strona'];
$sql = mysql_query("SELECT nazwa, telefon, email, usluga, gwiazdki, obiekt, adres FROM hotele WHERE adres LIKE '%".$place."%' LIMIT ".(($strona-1)*$na_strone).','.($strona*$na_strone));
 
$results=mysql_fetch_array($sql);
	
echo "<table>\n";
echo "<tr bgcolor='#33FFFF'>\n";
echo "<td witdh=500px>Nazwa</td>";
echo "<td>Telefon</td>";
echo "<td>Email</td>";
echo "<td>Usługa</td>";
echo "<td>Gwiazdki</td>";
echo "<td>Obiekt</td>";
echo "<td>Adres</td>";
echo "</tr>";

$i = 0;

while ($row = mysql_fetch_assoc($sql)) {
	
	if (is_int(($i+1)/2)==TRUE)$tlo = "#FFFFFF";
else $tlo = "#9ec2ff";
	
	echo "<tr bgcolor='$tlo'>\n";
	foreach($row as $wartosc) {
		echo "<td>\n";
		echo $wartosc;
		echo " </td>\n";
	}
	echo "</tr>\n";
	$i++;
}
echo "</table>\n";


}

function muzea() {
	global $place;
	$sort= 'Nazwa_Muzeum';
	
$query = "SELECT Nazwa_Muzeum, Kod_pocztowy, Miejscowosc, Ulica, nr_budynku FROM muzea WHERE Miejscowosc LIKE '%".$place."%'";
$results = mysql_query($query) or die(mysql_error());

echo "<table>\n";
echo "<tr bgcolor='#33FFFF'>\n";
echo "<td>Nazwa Muzeum</td>";
echo "<td>Kod Pocztowy</td>";
echo "<td>Miejscowosc</td>";
echo "<td>Ulica</td>";
echo "<td>Nr Budynku</td>";
echo "</tr>";

$i = 0;

while ($row = mysql_fetch_assoc($results)) {
	
	if (is_int(($i+1)/2)==TRUE) $tlo = "#FFFFFF";
	else $tlo = "#9ec2ff";
	
	echo "<tr bgcolor='$tlo'>\n";
	foreach($row as $wartosc) {
		echo "<td>\n";
		echo $wartosc;
		echo " </td>\n";
	}
	echo "</tr>\n";
	$i++;
}
echo "</table>\n";

}

function zoo() {
	global $place;
	
$query = "SELECT Nazwa_ogrodu_zoologicznego, PNA, Miejscowosc, Nazwa_ulicy, Nr_budynku FROM ogrody_zoologiczne WHERE Miejscowosc LIKE '%".$place."%'";
$results = mysql_query($query) or die(mysql_error());

echo "<table>\n";
echo "<tr bgcolor='#33FFFF'>\n";
echo "<td>Nazwa Ogrodu Zoologicznego</td>";
echo "<td>Kod Pocztowy</td>";
echo "<td>Miejscowosc</td>";
echo "<td>Ulica</td>";
echo "<td>Nr Budynku</td>";
echo "</tr>";

$i = 0;

while ($row = mysql_fetch_assoc($results)) {
	
	if (is_int(($i+1)/2)==TRUE) $tlo = "#FFFFFF";
	else $tlo = "#9ec2ff";
	
	echo "<tr bgcolor='$tlo'>\n";
	foreach($row as $wartosc) {
		echo "<td>\n";
		echo $wartosc;
		echo " </td>\n";
	}
	echo "</tr>\n";
	$i++;
}
echo "</table>\n";

}

function punkt() {
	global $place;
	
$query = "SELECT NAZWA_PUNKTU_INFORMACJI_TURYSTYCZNEJ, KOD_POCZTOWY, MIASTO, ADRES, E_MAIL, NUMER_TELEFONU FROM punkt_info_turystyczn WHERE MIASTO LIKE '%".$place."%'";
$results = mysql_query($query) or die(mysql_error());

echo "<table>\n";
echo "<tr bgcolor='#33FFFF'>\n";
echo "<td>Nazwa Punktu Informacyjnego</td>";
echo "<td>Kod Pocztowy</td>";
echo "<td>Miejscowosc</td>";
echo "<td>Ulica</td>";
echo "<td>Email</td>";
echo "<td>Nr Telefonu</td>";
echo "</tr>";

$i = 0;

while ($row = mysql_fetch_assoc($results)) {
	
	if (is_int(($i+1)/2)==TRUE) $tlo = "#FFFFFF";
	else $tlo = "#9ec2ff";
	
	echo "<tr bgcolor='$tlo'>\n";
	foreach($row as $wartosc) {
		echo "<td>\n";
		echo $wartosc;
		echo " </td>\n";
	}
	echo "</tr>\n";
	$i++;
}
echo "</table>\n";

}

?>