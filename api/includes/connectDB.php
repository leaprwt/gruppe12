<?php
    //establishs and returns database connection
    function connectDB($host, $user, $password, $dbname) {
        $conn = new mysqli($host, $user, $password, $dbname);

        // Checks connection and throws potential errors
        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }

        return $conn;
    }

?>
