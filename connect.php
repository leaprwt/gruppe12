<?php
	include('header.php');
	include 'homelink.inc.php';
?>  

<?php
		$ablesedatum = date('Y-m-d G:i:s');
		$verbrauche = $_POST['verbrauche'];
		$entstandene = $_POST['entstandene'];

		$con = mysqli_connect("m11575-30.kurs.jade-hs.de", "m11575-30", "FrLAwd2QV", "m11575_30");
		if (!$con)
		{
			die("Connection failed!" . mysqli_connect_error());
		}
        try {
            $query = $sql="INSERT INTO stromverbrauch (ablesedatum, verbrauche, entstandene) VALUES ('$ablesedatum','$verbrauche','$entstandene')";
		    $run = mysqli_query($con, $query);
				
				echo "Ihre Daten für den Stromverbrauch wurden gespeichert." . "<br>";
				echo "Hier finden Sie Ihre letzten 10 Einträge:" . "<br>";
				
			
        }catch(Exception $e) {
            echo $e;
        }
		

		$sql = "SELECT ablesedatum, verbrauche, entstandene FROM stromverbrauch LIMIT 10";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		  echo " Ablesedatum: " . $row["ablesedatum"]. "<br>";
		  " Verbräuche: " . $row["verbrauche"]. "<br>";
		  " Entstandene Kosten: " . $row["entstandene"]. "<br>";
	  }
	} else {
	  echo "0 results";
	}
	$con->close();
?>
