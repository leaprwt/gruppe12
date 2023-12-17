<?php
    //imports utils
    require_once "api/includes/config.php";
    require_once "api/includes/connectDB.php";

    if($_SERVER["REQUEST_METHOD"] === "GET") {
        $dbname = "studyplaner";
        //Connects to database
        $conn = connectDB(HOST, USER, PASSWORD, $dbname);
    

        //Get course ID from request
        $studentNumber = $_GET['studentNumber'];

        //gets all courses of a specific student
        $sql = "SELECT courses.course_id, students.student_id
                FROM `linking-courses-students` as linking
                JOIN students ON linking.student_id = students.student_id
                JOIN courses ON linking.course_id = courses.course_id
                WHERE students.student_number = {$studentNumber}";

    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response[] = array(
                    'course_id' => $row["course_id"],
                    'student_id' => $row["student_id"],
                );
            }
        } else {
            $response = "keine ergebnisse gefunden";    
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
