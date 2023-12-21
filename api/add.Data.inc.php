<form id="meal_form" onsubmit="submitMealForm(event)" enctype="multipart/form-data">

        <label for="meal_name">Name:</label>
        <input type="text" name="meal_name" required><br>

        <label for="price">Preis:</label>
        <input type="number" step="0.01" name="price" required><br>

        <label for="calories">Kalorien:</label>
        <input type="number" name="calories" required><br>

        <label for="protein">Proteine:</label>
        <input type="number" name="protein" required><br>

        <label for="fat">Fett:</label>
        <input type="number" name="fat" required><br>

        <label for="carbs">Kohlenhydrate:</label>
        <input type="number" name="carbs" required><br>

      
        <label for="typeOfMeal">Art des Gerichts:</label>
        <select name="typeOfMeal" required>
        <?php
            //get all possible values from database
            $dbname = MEAL_PLAN_DATABASE;
            $conn = connectDB(MEAL_PLAN_HOST, MEAL_PLAN_USER, MEAL_PLAN_PASSWORD, $dbname);

            $sql = "SELECT * FROM mealtype";
            $professors = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($professors)) {
                echo "<option value='" . $row['meal_type_id'] . "'>" . $row['name'] . "</option>";
            }
            $conn->close();
        ?>
        </select><br>

        <label for="typeOfNutrition">Ernährung:</label>
        <select name="typeOfNutrition" required>
        <?php
            //get all possible values from database
            $dbname = MEAL_PLAN_DATABASE;
            $conn = connectDB(MEAL_PLAN_HOST, MEAL_PLAN_USER, MEAL_PLAN_PASSWORD, $dbname);

            $sql = "SELECT * FROM nutritiontypes";
            $professors = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($professors)) {
                echo "<option value='" . $row['nutrition_type_id'] . "'>" . $row['nutrition_name'] . "</option>";
            }
            $conn->close();
        ?>
        </select><br>


        <label><input type="checkbox" name="weekdays[]" value="1"> Montag</label>
        <label><input type="checkbox" name="weekdays[]" value="2"> Dienstag</label>
        <label><input type="checkbox" name="weekdays[]" value="3"> Mittwoch</label>
        <label><input type="checkbox" name="weekdays[]" value="4"> Donnerstag</label>
        <label><input type="checkbox" name="weekdays[]" value="5"> Freitag</label>
        <label><input type="checkbox" name="weekdays[]" value="6"> Samstag</label>
        <label><input type="checkbox" name="weekdays[]" value="7"> Sonntag</label>


        <!--Upload Cover Image-->
        <label for="image">Bild auswählen:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <br>

        <input type="submit" value="Submit">
</form>

<script>
    function submitMealForm(event) {
            event.preventDefault(); 

            //post data to api
            fetch('http://m12242-30.kurs.jade-hs.de/api/postInsertMeal', {
                method: 'POST',
                body: new FormData(document.getElementById('meal_form')),
            })
            .then(response => response.text())
            .then(data => {
                alert(data); 
                document.getElementById('meal_form').reset(); 
            })
            .catch(error => console.error('Error:', error));
        }
</script>
