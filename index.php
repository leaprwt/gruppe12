<?php 
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
   //App Routes
    case '/':
       require("app/studyPlaner/studyPlaner.html");
       break;
   //API Routes
}
?>
