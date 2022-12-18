
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
		echo "Funktioniert";

    /* Anzahl Datensätze ermitteln und ausgeben */
	$num = mysqli_num_rows($res);
   	if($num > 0)
		echo "Ergebnis:<br>";
   	else
		echo "Keine Ergebnisse<br>";
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
	
	if (isset($_POST["auswahl"]))
{
    /* Verbindung aufnehmen und Datenbank auswählen */
    /* Include der Datei mit den Datenbankzugriffen */
   include '../dbconnect.inc.php'; 
   $sql = "SELECT * FROM student WHERE matrikelnummer = "
      . $_POST["auswahl"];
   $res = mysqli_query($con, $sql);
   $dsatz = mysqli_fetch_assoc($res);

	   echo "<p>Bitte neue Inhalte eintragen und speichern:</p>";
	   echo "<form action = 'db_einzel_student_c.php' method = 'post'>";

	   echo "<p><input name='name' value='"
		  . $dsatz["name"] . "'> Nachname</p>";

	   echo "<p><input name='matrikelnummer' value='"
		  . $_POST["auswahl"] . "'> Matrikelnummer</p>";

	   echo "<p><input type='submit' value='Speichern'>";
	   echo " <input type='reset'></p>";
	   echo "</form>";
   
   mysqli_close($con);
}
else
   echo "<p>Keine Auswahl getroffen</p>";
?>
	
	
<h3>Geben Sie Ihre Stromverbräuche an</h3>
<form name="myForm" action="/connect.php" method="post">
	<fieldset>
	<p>
	<legend>Los:</legend>
		Ablesedatum: <input name="ablesedatum" type="datetime-local" id="ablesedatum">
		<p> 
        kwh: <input name="kwh" type="number" id="kwh">
		</p>
        Entstandene Kosten: <input name="entstandene" type="number" id="entstandene">
		<p>
	</p>
	<input id="submit" class="button" type="submit" value="Datensatz anzeigen">
	</fieldset>
	
	
	</div>
	</form>
	
				  
		 <div class="header">
		<h1>Strom- und Gasverbräuche</h1>
			 
			 <style>
body {
  background-image: url('bild1.jpeg');
	    min-height: 100vh;
    width: 100%;
    background-image: linear-gradient(rgba(4,9,30,0.7), rgba(4,9,30,0.7)), url(bild1.jpeg);
    background-position:center;
    background-size:cover;
    position:relative;
}
</style>
		
				  
		
	
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
