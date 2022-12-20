 <?php
		$ablesedatum = date('Y-m-d G:i:s');
		$verbrauch = $_POST['verbrauch'];
		$entstanden = $_POST['entstanden'];

		$con = mysqli_connect("m11575-30.kurs.jade-hs.de", "m11575-30", "FrLAwd2QV", "m11575_30");
		if (!$con)
		{
			die("Connection failed!" . mysqli_connect_error());
		}
        try {
            $query = $sql="INSERT INTO gasverbrauch (ablesedatum, verbrauch, entstanden) VALUES ('$ablesedatum','$verbrauch','$entstanden')";
		    $run = mysqli_query($con, $query);
				
				echo "Ihre Daten für den Gasverbrauch wurden gespeichert.";
			
        }catch(Exception $e) {
            echo $e;
        }
		mysqli_close($con);
?> 
