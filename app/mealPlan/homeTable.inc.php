<?php
    $dbname = MEAL_PLAN_DATABASE;
    //Connects to database
    $conn = connectDB(MEAL_PLAN_HOST, MEAL_PLAN_USER, MEAL_PLAN_PASSWORD, $dbname);

    //Selects book names and cover-image path
    $sql = "SELECT meals.*, mealtype.name as meal_type_name FROM meals
            JOIN mealtype ON meals.type_of_meal_id = mealtype.meal_type_id
            WHERE meals.price != 0
            ORDER BY meals.name 
            LIMIT 10";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mealData[] = array(
                'Gericht ID' => $row['meal_id'],
                'Name' => $row['name'],
                'Preis' => $row['price'],
                'Ernährungsart' => $row['meal_type_name'],
                

            );
        }
    } else {
        echo "Keine Ergebnisse gefunden";
    }

    //create table
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Gericht ID</th>";
    echo "<th>Name</th>";
    echo "<th>Preis</th>";
    echo "<th>Ernährungsart</th>";
    echo "</tr>";

    foreach ($mealData as $row) {
        echo "<tr>";
        echo "<td>" . $row['Gericht ID'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Preis'] . "€</td>";
        echo "<td>" . $row['Ernährungsart'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";


    $conn->close();
?>
