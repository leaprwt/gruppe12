<?php
    //import utils
    require_once "api/includes/config.php";
    require_once "api/includes/connectDB.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
        //get values from request
        $meal_name = $_POST["meal_name"];
        $price = $_POST["price"];
        $calories = $_POST["calories"];
        $protein = $_POST["protein"];
        $fat = $_POST["fat"];
        $carbs = $_POST["carbs"];
        $typeOfMeal = $_POST["typeOfMeal"];
        $typeOfNutrition = $_POST["typeOfNutrition"];
        //get days as array
        $selectedWeekdays = $_POST['weekdays'];

        //specify image path
        $target_dir = "app/assets/meals/";
        //generate unique file name
        $uniqueFilename = uniqid('image_', true) . '.' . strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $target_file = $target_dir . $uniqueFilename;
 
        //uploading file
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        //insert values into database
        $dbname = MEAL_PLAN_DATABASE;
        $conn = connectDB(MEAL_PLAN_HOST, MEAL_PLAN_USER, MEAL_PLAN_PASSWORD, $dbname);


        $sql = "INSERT INTO `meals` (meal_id, price, calories, protein, fat, carbonhydrate,
                                    name, type_of_meal_id, type_of_nutrition_id, path_to_image) 
                VALUES (NULL, '$price', '$calories', '$protein', '$fat', '$carbs', '$meal_name',
                        '$typeOfMeal', '$typeOfNutrition', '$target_file')
                ";

        $result = $conn->multi_query($sql);

        if ($result) {
            //get latest id for linking table
            $lastInsertedID = $conn->insert_id;

            //wildcard sql statement
            $linkingSql = "INSERT INTO linkingmealday (meal_id, day_id) VALUES ";

            //for each day in posted array link new added meal to day
            foreach ($selectedWeekdays as $weekdayId) {
                $linkingSql .= "('$lastInsertedID', '$weekdayId'), ";
            }
            //end statement
            $linkingSql = rtrim($linkingSql, ', ') . ';';

            $linkingResult = $conn->query($linkingSql);

            if (!$linkingResult) {
                $response .= " Fehler beim Aktualisieren der Linking-Tabelle: " . $conn->error;
            }

            $response = "Daten wurden erfolgreich erfasst";
        } else {
            $response =  "Fehler: " . $conn->error;
        }

        echo $response;
    }

?>
