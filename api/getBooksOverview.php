<?php
     //imports utils
    require_once "api/includes/config.php";
    require_once "api/includes/connectDB.php";


    if($_SERVER["REQUEST_METHOD"] === "GET") {
        $dbname = LIBRARY_DATABASE;
        //Connects to database
        $conn = connectDB(LIBRARY_HOST, LIBRARY_USER, LIBRARY_PASSWORD, $dbname);
    
        //Selects book names and cover-image path
        $sql = "SELECT book_id, title, cover_image_link FROM books";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response[] = array(
                    'book_id' => $row['book_id'],
                    'book_title' => $row["title"],
                    'cover_image_link' => $row['cover_image_link']

                );
            }
        } else {
            echo "Keine Ergebnisse gefunden";
        }
    

        
        // Returns response
        header('Content-Type: application/json');
        echo json_encode($response);
    
        // Closes connection
        $conn->close();
    }else {
        http_response_code(400);
        echo json_encode(array('error' => 'Ungültige Methode'));
    }

 ?>
