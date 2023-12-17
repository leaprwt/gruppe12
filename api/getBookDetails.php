<?php
    //imports utils
    require_once "api/includes/config.php";
    require_once "api/includes/connectDB.php";

    if($_SERVER["REQUEST_METHOD"] === "GET") {
        $dbname = "library";
        //Connects to database
        $conn = connectDB(HOST, USER, PASSWORD, $dbname);
    

        //Get course ID from request
        $bookID = $_GET['bookID'];

        //gets all course details
        $sql = "SELECT books.title, books.cover_image_link, books.description, books.date_published,
                       authors.name as authors_name, languages.name as language_name
                FROM books 
                INNER JOIN  authors ON books.author_id = authors.id
                LEFT JOIN languages ON books.language_id = languages.id
                WHERE book_id = {$bookID}";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response[] = array(
                    'book_title' => $row["title"],
                    'description' => $row["description"],
                    'date_published' => $row["date_published"],
                    'cover_image_link' => $row['cover_image_link'],
                    'author' => $row['authors_name'],
                    'language' => $row['language_name']
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
