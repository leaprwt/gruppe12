<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gasverbräuche</title>
</head>
	
<body>
	
	<h1>Ihren Gasverbrauch berechnen</h1>
	
	
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
            <form action="auswertunggas.php" id="formular">
                <table>
                    <tr>
                        <td>Kubikmeter m³</td>
                        <td><input type="text" name="name" id="name"></td>
                    </tr>
                    <tr>
                        <td>Brennwert</td>
                        <td><input type="text" name="surname" id="surname"></td>
                    </tr>
                    <tr>
                        <td>Zustandszahl</td>
                        <td><input type="text" name="email" id="email"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Jetzt berechnen" name="send" id="send"></td>
                    </tr>
                </table>
            </form>
        </section>
	
	
	
	<?php
	
$kubikmeter = 5;
$brennwert = 4;
$zustandszahl=6;

$ergebnis = $kubikmeter*$brennwert*$zustandszahl;

	?>
	
	<form action="auswertunggas.php" method="post">
		
   <label>Kubikmeter m³
      <input type="number" name="username" value="" placeholder="ihre persönlichen Daten" />
   </label>
		
		<label>Brennwert 
      <input type="text" name="username" value="" placeholder="ihr Brennwert" />
   </label>
		
		<label>Zustandszahl 
      <input type="text" name="username" value="" placeholder="Zustandszahl einfügen" />
   </label>
 
   <label><input type="submit" value="Jetzt berechnen" /><label>
</form>

	
	
	
	
</body>
</html>
