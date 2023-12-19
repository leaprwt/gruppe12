<?php
    //import utils
    require_once "api/includes/config.php";
    require_once "api/includes/connectDB.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
        //get values from request
        $book_name = $_POST["book_name"];
        $isbn = $_POST["isbn"];
        $description = $_POST["description"];
        $date = $_POST["date"];
        $category = $_POST["category"];
        $language = $_POST["language"];
        $bookType = $_POST["book-type"];
        $author = $_POST["author"];

        //specify image path
        $target_dir = "app/assets/books/";
        //generate unique file name
        $uniqueFilename = uniqid('image_', true) . '.' . strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $target_file = $target_dir . $uniqueFilename;

        //uploading file
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        
        //insert values into database
        $dbname = "library";
        $conn = connectDB(HOST, USER, PASSWORD, $dbname);


        $sql = "INSERT INTO `books` (book_id, isbn, cover_image_link, description, title, date_published,
                                    category_id, language_id, book_type_id, author_id) 
                VALUES (NULL, '$isbn', '$target_file', '$description', '$book_name', '$date',
                        '$category', '$language', '$bookType', '$author')";

        $result = $conn->query($sql);

        if ($result) {
            $response = "Erfolgreich eingeschrieben";
        } else {
            $response =  "Fehler: " . $conn->error;
        }

        echo $response;
    }

?>
