
<html>
<head>
	
<script language="javascript" type="text/javascript" src="javascript.js"></script>
<link href="stylesheet.css" rel="stylesheet" type="text/css">

<meta charset="utf-8">

<title>Gruppe12</title>
	
</head>

<body>
	


	<?php

/*Verbindung zur Datenbank aufnehmen */

$con = mysqli_connect("localhost", "m11575-30", "FrLAwd2QV", "m11575_30");

	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	
	echo "Connected successfully";
	
// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($con->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $con->error;
}

$con->close();
?>	

	
	
	
	<div class="header">
		<h1>Strom- und Gasverbräuche</h1>
	</div>
	
	<input type="datetime-local" value="">
	
	<?php
	
$d = time();                   
$d = strtotime("+1 days", $d); 
echo date("d.m.Y h:i:s", $d);
	
	
	?>
	
	
	<nav> 
		
		<ul id="navibereich">
  	<li id="navi01"><a href="gasverbraeuche.php">Gasverbräuche</a></li>
  	<li id="navi02"><a href="stromverbraeuche.php">Stromverbräuche</a></li>
	<li id="navi03"><a href="kategorien.php">Kategorien</a></li>
	<li id="navi04"><a href="gaseinsparen.php">Tipps Gas einsparen</a></li>
	<li id="navi05"><a href="stromeinsparen.php">Tipps Strom einsparen</a></li>
	<li id="navi06"><a href="auswertunggas.php">Auswertung Gasverbrauch</a></li>
	<li id="navi07"><a href="auswertungstrom.php">Auswertung Stromverbrauch</a></li>
</ul>
	
	</nav>
	
	
	
	<p>Stromverbrauch Tabelle</p>
		<form action="index.php" method="post">
			<p><input name ="ablesedatum"> Ablesedatum</p>
			<p><input name ="kumulierterverbrauch"> Kumulierter Verbrauch</p>
			<p><input name ="enstandenekosten"> Entstandene Kosten</p>
			<p><input name ="tendenzsymbol"> Tendenzsymbol</p>
			<p><input name ="motivation"> Motivationsspruch</p>
			<p><input name ="hinweis"> Hinweis</p>
			<p><input name ="medaille"> Medaille</p>
			
		
	
		</form>
</body>
</html>
