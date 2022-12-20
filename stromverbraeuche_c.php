<?php
	include('header.php'); 
	include 'homelink.inc.php';
	?>
<?php
		$kuehlschrank = $_POST['kühlschrank'];
		$fernseher = $_POST['fernseher'];
		$herd = $_POST['herd'];
		$toaster = $_POST['toaster'];

		$con = mysqli_connect("m11575-30.kurs.jade-hs.de", "m11575-30", "FrLAwd2QV", "m11575_30");
		if (!$con)
		{
			die("Connection failed!" . mysqli_connect_error());
		}
        try {
            $query = $sql="INSERT INTO kategorietabelle (kühlschrank, fernseher, herd, toaster) VALUES ('$kuehlschrank','$fernseher','$herd','$toaster')";
		    $run = mysqli_query($con, $query);
				
				echo "Ihre Daten für den Stromverbrauch wurden gespeichert.";
			
        }catch(Exception $e) {
            echo $e;
        }
		mysqli_close($con);
?> 
