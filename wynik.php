<html>
	<head>
		<meta charset="utf-8"/>
		<title>cowmiescie.pl</title>
		<link rel="Stylesheet" type="text/css" href="style.css" />
	</head>

	<body>
		<div id="container">
			<div id="glowna">
				<font class="logo"><a href="index.html">Wyszukaj...</a></font>
			</div>
		<div id="mapa">

		
<?php 
error_reporting(E_ALL ^ E_NOTICE);

include("skrypt.php");

$sort="";
$place="";
$place=$_GET['miejsce'];

$muzea=$_GET['muzea'];
$zoo=$_GET['zoo'];
$punkt=$_GET['punkt'];
$hotele=$_GET['hotele'];


if (isset($hotele) && $hotele == 1) {
	hotele();
}
if (isset($zoo) && $zoo == 2) {
	zoo();
}
if (isset($punkt) && $punkt == 3) {
	punkt();
}
if (isset($muzea) && $muzea == 4) {
	muzea();
}

?>

		
	</div>
	<div id="stopka">
		<font class="stopka">© 2018 Kopiowanie treści bez zgody autora zabronione!</stopka>
	</div>
</div>
</div>
 </body>
</html>