<form id="course_form" onsubmit="submitStudyForm(event)">
        <label for="course_name">Kursname:</label>
        <input type="text" name="course_name" required><br>

        <label for="description">Beschreibung:</label>
        <textarea name="description" required></textarea><br>

        <label for="professor">Professor:</label>
        <select name="professor" required>
        <?php
            //get all possible values from database
            $dbname = STUDY_PLANER_DATABASE;
            $conn = connectDB(STUDY_PLANER_HOST, STUDY_PLANER_USER, STUDY_PLANER_PASSWORD, $dbname);

            $sql = "SELECT * FROM professors";
            $professors = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($professors)) {
                echo "<option value='" . $row['professor_id'] . "'>" . $row['professor_name'] . "</option>";
            }
            $conn->close();
        ?>
        </select><br>

        <label for="ects">ECTS:</label>
        <input type="number" name="ects" required><br>

        <label for="type_of_exam">Examentyp</label>
        <select name="type_of_exam" required>
        <?php
            //get all possible values from database
            $dbname = STUDY_PLANER_DATABASE;
            $conn = connectDB(STUDY_PLANER_HOST, STUDY_PLANER_USER, STUDY_PLANER_PASSWORD, $dbname);

            $sql = "SELECT * FROM examtypes";
            $professors = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($professors)) {
                echo "<option value='" . $row['examType_id'] . "'>" . $row['examType_name'] . "</option>";
            }
            $conn->close();
        ?>
        </select><br>

        <label for="lecture_time_one">Lecture Time One:</label>
        <input type="datetime-local" name="lecture_time_one" required><br>

        <label for="lecture_time_two">Lecture Time Two:</label>
        <input type="datetime-local" name="lecture_time_two" required><br>

        <input type="submit" value="Submit">
</form>

<script>
    function submitStudyForm(event) {
            event.preventDefault(); 


            //post data to api
            fetch('http://m12242-30.kurs.jade-hs.de/api/postInsertCourse', {
                method: 'POST',
                body: new FormData(document.getElementById('course_form')),
            })
            .then(response => response.text())
            .then(data => {
                alert(data); 
                document.getElementById('course_form').reset();
            })
            .catch(error => console.error('Error:', error));
        }
</script>
