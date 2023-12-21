<?php
    //imports utils
    require_once "api/includes/config.php";
    require_once "api/includes/connectDB.php";

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $dbname = STUDY_PLANER_DATABASE;
        //Connects to database
        $conn = connectDB(STUDY_PLANER_HOST, STUDY_PLANER_USER, STUDY_PLANER_PASSWORD, $dbname);
    

        //Get json from request
        $jsonData = file_get_contents('php://input');
        $data =json_decode($jsonData, true);


        $course_id = $data['course_id'];
        $student_id = $data['student_id'];
        //gets all courses of a specific student
        $sql = "INSERT INTO `linking-courses-students` 
                (course_id, student_id) 
                VALUES ($course_id, $student_id)";

        $result = $conn->query($sql);
    
        if ($result) {
            $response = "Erfolgreich eingeschrieben";
        } else {
            $response =  "Fehler: " . $conn->error;
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
