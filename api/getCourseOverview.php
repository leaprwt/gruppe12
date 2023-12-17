 <?php
     //imports utils
    require_once "api/includes/config.php";
    require_once "api/includes/connectDB.php";


    if($_SERVER["REQUEST_METHOD"] === "GET") {
        $dbname = "studyplaner";
        //Connects to database
        $conn = connectDB(HOST, USER, PASSWORD, $dbname);
    
        //Selects course name and description from all courses
        $sql = "SELECT course_id, course_name, description FROM courses";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response[] = array(
                    'course_id' => $row['course_id'],
                    'course_name' => $row["course_name"],
                    'description' => $row["description"]
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
