
<html>
<head>
	
<script language="javascript" type="text/javascript" src="javascript.js"></script>
<link href="./stylesheet.css" rel="stylesheet" type="text/css">

<meta charset="utf-8">

<title>Gruppe12</title>
	
</head>

<body>
<?php
	include 'dbconnect.inc.php';
	
	$res = mysqli_query($con, "SELECT * FROM stromverbrauch"); /* SQL-Abfrage ausführen */

	$num = mysqli_num_rows($res); /* Anzahl Datensätze ermitteln und ausgeben */
   	if($num > 0)	
?>
	
<?php
	include 'dbconnect.inc.php';
	
	$res = mysqli_query($con, "SELECT * FROM gasverbrauch"); /* SQL-Abfrage ausführen */

	$num = mysqli_num_rows($res); /* Anzahl Datensätze ermitteln und ausgeben */
   	if($num > 0)	
?>
	
	<section class="Daten">
	<?php
		 $datum = date("d.m.Y",$timestamp);
			echo $datum;
			?> -
		<?php
		 		$uhrzeit = date("H:i",$timestamp);
				echo $uhrzeit;
			?>
	</section>
	
<section class="h1">
	<h1>Strom- und Gasverbräuche</h1>
</section>	

<section class="header"> <!-- Hintergrundbild intern eingebaut, da es extern nicht funktioniert -->
<style>
body
{
  	background-image: url('bild1.jpeg');
	min-height: 100vh;
    width: 100%;
    background-image: linear-gradient(rgba(4,9,30,0.7), rgba(4,9,30,0.7)), url(bild1.jpeg);
    background-position:center;
    background-size:cover;
    position:relative;
}
</style>
		</section>
	
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

<section class="h3">
	<h3> Geben Sie Ihre Stromverbräuche an</h3>
</section>
	
<section class="Stromverbrauch">
<form name="myForm" action="/connect.php" method="post">
	<fieldset>
		<p>
		<legend></legend>
		Ablesedatum:<input name="ablesedatum2" type="datetime-local" id="ablesedatum2" required>
		<p> 
		Verbrauch: <input name="verbrauche" type="number" id="verbrauche" required>
		</p>
		Entstandene Kosten: <input name="entstandene" type="number" id="entstandene" required>
		<p></p>
		<input id="submit" class="button" type="submit" value="Speichern">
	</fieldset>
</form>
</section>
		
<section class="h4">
	<h3>Geben Sie Ihre Gasverbräuche an</h4>
</section>
	
	<section class="Gasverbrauch">
<form name="myForm" action="gasconnect.php" method="post">
	<fieldset>
		<p>
		<legend></legend>
		Ablesedatum: <input name="ablesedatum" type="datetime-local" id="ablesedatum" required>
		<p> 
		Verbrauch: <input name="verbrauch" type="number" id="verbrauch" required>
		</p>
		Entstandene Kosten: <input name="entstanden" type="number" id="entstanden" required>
		<p></p>
		<input id="submit" class="button" type="submit" value="Speichern">
	</fieldset>
</form>
	</section>
	
</body>
</html>

