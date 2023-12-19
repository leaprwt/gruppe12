<?php
    //imports utils
    require_once "api/includes/config.php";
    require_once "api/includes/connectDB.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $course_name = $_POST["course_name"];
        $description = $_POST["description"];
        $professor = $_POST["professor"];
        $ects = $_POST["ects"];
        $type_of_exam = $_POST["type_of_exam"];
        $lecture_time_one = $_POST["lecture_time_one"];
        $lecture_time_two = $_POST["lecture_time_two"];

        //convert into database ready date
        $lecture_time_one = date("Y-m-d H:i:s", strtotime($lecture_time_one));
        $lecture_time_two = date("Y-m-d H:i:s", strtotime($lecture_time_two));

        //connect to database and try to insert data
        $dbname = "studyplaner";
        $conn = connectDB(HOST, USER, PASSWORD, $dbname);


        $sql = "INSERT INTO `courses` (course_id, course_name, professor_id, description, ects, type_of_exam_id, lecture_time_one, lecture_time_two) 
                VALUES (NULL, '$course_name', '$professor', '$description', '$ects', 
                '$type_of_exam', '$lecture_time_one', '$lecture_time_two')";

        $result = $conn->query($sql);

        if ($result) {
            $response = "Erfolgreich eingeschrieben";
        } else {
            $response =  "Fehler: " . $conn->error;
        }

        echo $response;
    }


    $conn->close();

?>
