
<html>
<head>
	
<script language="javascript" type="text/javascript" src="javascript.js"></script>
<link href="stylesheet.css" rel="stylesheet" type="text/css">

<meta charset="utf-8">

<title>Gruppe12</title>
	
</head>

<body>
	


	<?php
	    include 'dbconnect.inc.php';
		echo "Connected successfully";
	

   /* SQL-Abfrage ausführen */
   $res = mysqli_query($con, "SELECT * FROM stromverbrauch");
		echo "ja";

    /* Anzahl Datensätze ermitteln und ausgeben */
   $num = mysqli_num_rows($res);
   if($num > 0) echo "Ergebnis:<br>";
   else         echo "Keine Ergebnisse<br>";

   echo "<table border='1'>";
   
   // Überschrift
   echo "<tr>
   		<td>Ablesedatum</td>
   		<td>kwh</td>
		<td>Entstandene Kosten</td>
		<td>Tendenzsymbol</td>
		<td>Motivationsspruch</td>
		<td>Hinweis</td>
		<td>Medaille</td>
		
		
		</tr>";
   
   
   
   /* Datensätze aus Ergebnis ermitteln, */
   /* in Array speichern und ausgeben    */
   
   while ($dsatz = mysqli_fetch_assoc($res))
   {
       echo "<tr>";
       echo "<td>" . $dsatz["Ablesedatum"] . "</td>";
       echo "<td>" . $dsatz["kwh"] . "</td>";
	   echo "<td>" . $dsatz["Entstandene Kosten"] . "</td>";
	   echo "<td>" . $dsatz["Tendenzsymbol"] . "</td>";
	   echo "<td>" . $dsatz["Motivationsspruch"] . "</td>";
	   echo "<td>" . $dsatz["Hinweis"] . "</td>";
	   echo "<td>" . $dsatz["Medaille"] . "</td>";
       echo "</tr>";
   }

?>
	
	<div class="header">
		<h1>Strom- und Gasverbräuche</h1>
		<img src="Gruppe12bild.jpg"

	</div>
	
	<input type="datetime-local" value="">
	
	
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

</body>
</html>
