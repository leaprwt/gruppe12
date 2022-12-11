<!doctype html>
<html>
<head>
	
<script language="javascript" type="text/javascript" src="javascript.js"></script>

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
		
	<ul>
  		<li><a href="">Gasverbräuche</a></li>
  		<li><a href="">Stromverbräche</a></li>
 		<li><a href="">Kategorien</a></li>
  		<li><a href="">Tipps zum Gas einsparen</a></li>
		<li><a href="">Tipps zum Strom einsparen</a></li>
  		<li><a href="">Auswertung für den Gasverbrauch</a></li>
 		<li><a href="">Auswertung für den Stromverbrauch</a></li>
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
