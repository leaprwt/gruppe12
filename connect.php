<?php

if(isset($_POST['submit']))
      {
          $ablesedatum = $_POST['ablesedatum'];
          $kwh = $_POST['kwh'];
          $entstandene = $_POST['entstandene'];

          $con = mysqli_connect("localhost", "m11575-30", "FrLAwd2QV", "m11575_30");
if (!$con)
          {
die("Connection failed!" . mysqli_connect_error());
          }
          $query = "INSERT INTO stromverbrauch (id, ablesedatum, kwh, entstandene VALUES $ablesedatum, $kwh, $entstandene";
          $run = mysqli_query($con, $query);
if (run)
          {
echo"Success";
          }
mysqli_close($con);
      }


?>