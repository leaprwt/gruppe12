<!doctype html>
<html>
<head>
	
	<meta name="viewport" content="width=device–width ,initial–scale=1-0" />
	
	
<script language="javascript" type="text/javascript" src="javascript.js"></script>
	<link href="stylesheet.css" rel="stylesheet" type="text/css">
	
<meta charset="utf-8">
	

<title>Gruppe12</title>
	
</head>

<body>
	
	
	<?php
	
	$servername = "localhost";
	$user = "m11575-30";
	$pw = "FrLAwd2QV";
	
	$con = new mysqli($servername, $user, $pw);
	
	if($con->connect_error) {
		die("death".$con->connect_error);
	}
	echo "connected";
	
	?>
	
	<h1>hallo du Karlo</h1>
	
	<input type="datetime-local" value="">
	
	<section class="header"></section>
				
	<nav> 
		
		<ul id="navibereich">
  	<li id="navi01"><a href="gasverbräuche.php">Gasverbräuche</a></li>
  	<li id="navi02"><a href="stromverbräuche.php">Stromverbräuche</a></li>
	<li id="navi03"><a href="kategorien.php">Kategorien</a></li>
	<li id="navi04"><a href="tippszumgaseinsparen.php">Tipps zum Gas einsparen</a></li>
	<li id="navi05"><a href="tippszumgaseinsparen.php">Tipps zum Strom einsparen</a></li>
	<li id="navi06"><a href="auswertung für gasverbrauch.php">Auswertung für den Gasverbrauch</a></li>
	<li id="navi07"><a href="auswertung für den stromverbrauch.php">Auswertung für den Stromverbrauch</a></li>
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
