<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
	include('header.php'); 
	include 'homelink.inc.php';
	?>
<p> <a href="stromverbraeuche.php">Zurück</a></p>
<?php
if (isset($_POST["auswahl"]))
{
    /* Verbindung aufnehmen und Datenbank auswählen */
    /* Include der Datei mit den Datenbankzugriffen */
    include 'dbconnect.inc.php'; 
   $sql = "SELECT * FROM kategorietabelle = "
      . $_POST["auswahl"];
   

   echo "<p>Wählen Sie eine Kategorie und geben Sie den Verbrauch an:</p>";
   echo "<form action = 'stromverbraeuche_c.php' method = 'post'>";

   echo "<p><input name='verbrauch' value='"
      . $dsatz["kategorietabelle"] . "'> Verbrauch</p>";
   
   echo "<p><input name='kategorie' value='"
      . $_POST["auswahl"] . "'> Kategorie</p>";
   
   echo "<p><input type='submit' value='Speichern'>";
   echo " <input type='reset'></p>";
   echo "</form>";
   
   mysqli_close($con);
}
else
   echo "<p>Keine Auswahl getroffen</p>";
?>
</body></html>
