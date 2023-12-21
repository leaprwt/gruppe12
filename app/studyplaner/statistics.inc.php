<?php
$dbname = STUDY_PLANER_DATABASE;
$conn = connectDB(STUDY_PLANER_HOST, STUDY_PLANER_USER, STUDY_PLANER_PASSWORD, $dbname);

//get quantity of all courses
$sqlQuantity = "SELECT COUNT(*) AS quantity FROM courses";
$resultQuantity = $conn->query($sqlQuantity);

if ($resultQuantity === false) {
    die("Fehler: " . $conn->error);
}

$rowQuantity = $resultQuantity->fetch_assoc();
$quantity = $rowQuantity['quantity'];


echo "<div>";
echo "<h6>Gesamtanzahl der Kurse:</h6>";
echo "<p>" . $quantity . "</p>";
echo "</div>";

//get average ects points across all courses
$sqlMeanEcts = "SELECT AVG(ects) AS mean_ects FROM courses";
$resultMeanEcts = $conn->query($sqlMeanEcts);

if ($resultMeanEcts === false) {
    die("Fehler: " . $conn->error);
}

$rowMeanEcts = $resultMeanEcts->fetch_assoc();
$meanEcts = (int)$rowMeanEcts['mean_ects'];

echo "<div>";
echo "<h6>Durchschnittliche ECTS-Punkte:</h6>";
echo "<p>" . $meanEcts . "</p>";
echo "</div>";

//get frequencies of students for every course
$sqlFreqStudents = "SELECT c.course_id, c.course_name, 
            COUNT(l.student_id) AS abs_freq,
            COUNT(l.student_id) / (SELECT COUNT(*) FROM `linking-courses-students`) AS rel_freq
        FROM `linking-courses-students` l
        JOIN courses c ON l.course_id = c.course_id
        GROUP BY c.course_id, c.course_name";

$resultFreqStudents = $conn->query($sqlFreqStudents);

if ($resultFreqStudents === false) {
    die("Fehler: " . $conn->error);
}

echo "<div>";
echo "<h6>Studentenanzahl pro Kurs:</h6>";
echo "<table>";
echo "<tr><th>Kursname</th><th>Anzahl Studenten</th><th>Relative Häufigkeit</th></tr>";

while ($rowFreqStudents = $resultFreqStudents->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $rowFreqStudents["course_name"] . "</td>";
    echo "<td>" . $rowFreqStudents["abs_freq"] . "</td>";
    echo "<td>" . $rowFreqStudents["rel_freq"] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>";

echo "</div>";

$conn->close();
?>
