<p>Gasverbräuche</p>

<?php
$DateAndTime = date('m-d-Y h:i:s a', time());  
echo "The current date and time are $DateAndTime.";
?>

<?php 
$aktuelles_datum = date("d.m.Y"); 
$aktuelle_uhrzeit = date("H:i"); 
echo "Es ist der ",$aktuelles_datum," um ",$aktuelle_uhrzeit," Uhr";  
?>