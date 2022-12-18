<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Auswertung zum Stromverbrauch</title>
</head>

<body>
	
	<?php
	
$leistung = 6534;
$zeit = 45;

$ergebnis = $leistung*$zeit;
	
	echo "<p>Ihr persönlicher Stromverbrauch liegt bei: ".
     ($leistung * $zeit) . "</p>";

	?>
	
</body>
</html>
