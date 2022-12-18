<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Stromverbräuche</title>
	
</head>
	
<body>
	
	<h1>Ihren Stromverbrauch berechnen</h1>
	
	
	<?php
		 $datum = date("d.m.Y",$timestamp);
			echo $datum;
			?> -
		<?php
		 		$uhrzeit = date("H:i",$timestamp);
				echo $uhrzeit;
			?>
	
	<br></br>
	

	
	
	<section id="form">
            <form action="auswertungstrom.php" id="formular">
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
	
	<form action="auswertungstrom.php" method="post">
		
   <label>Leistung
      <input type="number" name="username" value="" placeholder="Watt" />
   </label>
		
		<label>Zeit 
      <input type="text" name="username" value="" placeholder="Stunden" />
   </label>
 
   <label><input type="submit" value="Jetzt berechnen" /><label>
</form>

		
	
	
</body>
</html>
