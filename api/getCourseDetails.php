<?php
    //imports utils
    require_once "api/includes/config.php";
    require_once "api/includes/connectDB.php";

    if($_SERVER["REQUEST_METHOD"] === "GET") {
        $dbname = STUDY_PLANER_DATABASE;
        //Connects to database
        $conn = connectDB(STUDY_PLANER_HOST, STUDY_PLANER_USER,STUDY_PLANER_PASSWORD, $dbname);
    

        //Get course ID from request
        $courseID = $_GET['courseID'];

        //gets all course details
        $sql = "SELECT courses.course_name, courses.description, courses.ects,
                       courses.lecture_time_one, courses.lecture_time_two, 
                       professors.professor_name, examtypes.examType_name
                FROM courses 
                INNER JOIN  professors ON courses.professor_id = professors.professor_id
                LEFT JOIN examtypes ON courses.type_of_exam_id = examtypes.examType_id
                WHERE course_id = {$courseID}";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response[] = array(
                    'course_name' => $row["course_name"],
                    'description' => $row["description"],
                    'ects' => $row["ects"],
                    'professor_name' => $row['professor_name'],
                    //checks if null, returns default value
                    'type_of_exam' => ($row['examType_name'] === null) ? "keine Prüfung" : $row['examType_name'],
                    'lecture_time_one' => $row['lecture_time_one'],
                    'lecture_time_two' => $row['lecture_time_two']
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
