<?php
    //get all data
    $dbname = STUDY_PLANER_DATABASE;
    //Connects to database
    $conn = connectDB(STUDY_PLANER_HOST, STUDY_PLANER_USER, STUDY_PLANER_PASSWORD, $dbname);

    //Selects book names and cover-image path
    $sql = "SELECT courses.*, professors.professor_name FROM courses
            JOIN professors ON courses.professor_id = professors.professor_id
            WHERE courses.ects != 0
            ORDER BY courses.course_name 
            LIMIT 10 ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $studyData[] = array(
                'Kurs ID' => $row['course_id'],
                'Kursname' => $row['course_name'],
                'ECTS' => $row['ects'],
                'Professor' => $row['professor_name'],
                

            );
        }
    } else {
        echo "Keine Ergebnisse gefunden";
    }

    $conn->close();
    //create table
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Kurs ID</th>";
    echo "<th>Kursname</th>";
    echo "<th>ECTS</th>";
    echo "<th>Professor</th>";
    echo "</tr>";

    foreach ($studyData as $row) {
        echo "<tr>";
        echo "<td>" . $row['Kurs ID'] . "</td>";
        echo "<td>" . $row['Kursname'] . "</td>";
        echo "<td>" . $row['ECTS'] . "</td>";
        echo "<td>" . $row['Professor'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";


?>
