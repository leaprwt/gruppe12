<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Stromverbräuche</title>
	
	<script language="javascript" type="text/javascript" src="javascript.js"></script>
	
	<?php
	include('header.php'); 
	?>
	
</head>
	
<body>
	<?php
		 $datum = date("d.m.Y",$timestamp);
			echo $datum;
			?> -
		<?php
		 		$uhrzeit = date("H:i",$timestamp);
				echo $uhrzeit;
			?>
	
	<h1>Ihren Stromverbrauch berechnen</h1>
	
	
	
	<br></br>
	

	
	
	<section id="form">
            <form action="berechneStromKosten.php" id="formular">
                <table>
                    <tr>
                        <td>Leistung</td>
                        <td><input type="text" name="name" id="name" placeholder="Watt"></td>
                    </tr>
                    <tr>
                        <td>Zeit</td>
                        <td><input type="text" name="surname" id="surname" placeholder="Stunden"></td>
                    </tr>
                
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Jetzt berechnen" name="send" id="send"></td>
                    </tr>
                </table>
            </form>
        </section>
	
	
	
	<?php
	
$leistung = 6534;
$zeit = 45;

$ergebnis = $leistung*$zeit;

	?>
	
	<form action="berechneStromKosten.php" method="post">
		
   <label>Leistung
      <input type="number" name="username" value="" placeholder="Watt" />
   </label>
		
		<label>Zeit 
      <input type="text" name="username" value="" placeholder="Stunden" />
   </label>
 
   <label><input type="submit" value="Jetzt berechnen" /><label>
</form>
	   
	   
	   <br></br>
	   <form method="post" action="verarbeitung.php" onsubmit="return checkform(this)" >

<input type="radio" name="anrede" value="Frau">
<input type="radio" name="anrede" value="Herr">

<input type="text" name="name" size="">

<input type="checkbox" name="thema[]" value="HTML">
<input type="checkbox" name="thema[]" value="PHP">
							
</form>

		<?php  include 'homelink.inc.php';?>
<p>Treffen Sie Ihre Auswahl:</p>
<form action = "stromverbraeuche_b.php" method = "post">
<?php
    /* Verbindung aufnehmen und Datenbank auswählen */
    /* Include der Datei mit den Datenbankzugriffen */
    include 'dbconnect.inc.php';  
    $res = mysqli_query($con, "SELECT * FROM kategorietabelle");

   // Tabellenbeginn
   echo "<table border='1'>";

   // Überschrift
   echo "<tr> <td>Auswahl</td> <td>Kategorie</td>";
   
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo "<tr>";
      echo "<td><input type='radio' name='auswahl'";
      echo " value='" . $dsatz["kühlschrank"] . "'></td>";
      echo "<td>" . $dsatz["kühlschrank"] . "</td>";
      echo "</tr>";
      echo "<td><input type='radio' name='auswahl'";
      echo " value='" . $dsatz["fernseher"] . "'></td>";
      echo "<td>" . $dsatz["fernseher"] . "</td>";
      echo "</tr>";
	  echo "<td><input type='radio' name='auswahl'";
      echo " value='" . $dsatz["herd"] . "'></td>";
      echo "<td>" . $dsatz["herd"] . "</td>";
      echo "</tr>";
	  echo "<td><input type='radio' name='auswahl'";
      echo " value='" . $dsatz["toaster"] . "'></td>";
      echo "<td>" . $dsatz["toaster"] . "</td>";
      echo "</tr>";
   }

   // Tabellenende
   echo "</table>";
   
   mysqli_close($con);
?>
<p><input type="submit" value="Datensatz anzeigen"></p>
</form>
</body></html>

	
	
</body>
</html>
