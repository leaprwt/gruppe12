<?php
     //imports utils
    require_once "api/includes/config.php";
    require_once "api/includes/connectDB.php";


    if($_SERVER["REQUEST_METHOD"] === "GET") {
        $dbname = "mealplans";
        //Connects to database
        $conn = connectDB(HOST, USER, PASSWORD, $dbname);
    
        //Selects id, name, price and day from all meals
        $sql = "SELECT meals.name as meal_name, meals.meal_id, meals.price, 
                       days.day_name, mealtype.name as meal_type_name
                FROM meals
                JOIN linkingmealday ON meals.meal_id = linkingmealday.meal_id
                JOIN days ON linkingmealday.day_id = days.day_id 
                JOIN mealtype ON meals.type_of_meal_id = mealtype.meal_type_id
                ";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response[] = array(
                    'meal_id' => $row['meal_id'],
                    'meal_name' => $row["meal_name"],
                    'meal_price' => $row['price'],
                    'day' => $row['day_name'],
                    'type_of_meal' => $row['meal_type_name']

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
