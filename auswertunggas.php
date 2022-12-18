<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Auswertung zum Gasverbrauch</title>
	<?php
	include("header.php"); 
	?>
	
</head>

<body>
	
	<?php
	
	$kubikmeter = 5;
	$brennwert = 4;
	$zustandszahl=6;

	$ergebnis = $kubikmeter*$brennwert*$zustandszahl;
	
	echo "<p>Ihr persönlicher Gasverbrauch liegt bei: ".
     ($kubikmeter * $brennwert * $zustandszahl) . "</p>";
?>
	
	
	
</body>
</html>
