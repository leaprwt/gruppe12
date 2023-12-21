<?php
    //imports utils
    require_once "api/includes/config.php";
    require_once "api/includes/connectDB.php";

    if($_SERVER["REQUEST_METHOD"] === "GET") {
        $dbname = MEAL_PLAN_DATABASE;
        //Connects to database
        $conn = connectDB(MEAL_PLAN_HOST, MEAL_PLAN_USER, MEAL_PLAN_PASSWORD, $dbname);

        //Get mealID from request
        $mealID = $_GET['mealID'];

        //gets all meal details
        $sql = "SELECT meals.name as meal_name, 
                meals.calories, meals.protein, meals.fat, meals.carbonhydrate,
                meals.path_to_image,
                nutritiontypes.nutrition_name,
                ingredients.ingredients_name
                FROM meals
                JOIN nutritiontypes ON meals.type_of_nutrition_id = nutritiontypes.nutrition_type_id
                LEFT JOIN linkingMealIngredients ON meals.meal_id = linkingMealIngredients.meal_id
                LEFT JOIN ingredients ON linkingMealIngredients.ingredient_id = ingredients.ingredients_id
                WHERE meals.meal_id = {$mealID}";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response[] = array(
                    'meal_name' => $row["meal_name"],
                    'calories' => $row["calories"],
                    'protein' => $row["protein"],
                    'fat' => $row['fat'],
                    'carbonhydrate' => $row['carbonhydrate'],
                    'path_to_image' => $row['path_to_image'],
                    'nutrition_name' => $row['nutrition_name'],
                    'ingredients_name' => ($row['ingredients_name'] === null) ? "keine besonderen Inhaltsstoffe" : $row['ingredients_name'],   
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
