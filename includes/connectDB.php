<?php
    function connectDB($host, $user, $password, $dbname) {
        $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }

        return $conn;
    }

?>
