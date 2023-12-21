<?php
$dbname = MEAL_PLAN_DATABASE;
$conn = connectDB(MEAL_PLAN_HOST, MEAL_PLAN_USER, MEAL_PLAN_PASSWORD, $dbname);

//get quantity of all meals
$sqlQuantity = "SELECT COUNT(*) AS quantity FROM meals";
$resultQuantity = $conn->query($sqlQuantity);

if ($resultQuantity === false) {
    die("Fehler: " . $conn->error);
}

$rowQuantity = $resultQuantity->fetch_assoc();
$quantity = $rowQuantity['quantity'];


echo "<div>";
echo "<h6>Gesamtanzahl der Gerichte:</h6>";
echo "<p>" . $quantity . "</p>";
echo "</div>";

//get average price across all meals
$sqlMeanPrice = "SELECT AVG(price) AS mean_price FROM meals";
$resultsMeanPrice = $conn->query($sqlMeanPrice);

if ($resultsMeanPrice === false) {
    die("Fehler: " . $conn->error);
}

$rowMeanPrice = $resultsMeanPrice->fetch_assoc();
$mean_price = (int)$rowMeanPrice['mean_price'];

echo "<div>";
echo "<h6>Durchschnittlicher Preis:</h6>";
echo "<p>" . $mean_price . "</p>";
echo "</div>";

//get frequencies of nutrition types for every meal
$sqlFreqMeals = "SELECT
                    n.nutrition_type_id,
                    n.nutrition_name,
                    COUNT(m.meal_id) AS all_meals,
                    COUNT(m.meal_id) / (SELECT COUNT(*) FROM meals) AS rel_freq
                    FROM
                    nutritiontypes n
                    JOIN
                    meals m ON n.nutrition_type_id = m.type_of_nutrition_id
                    GROUP BY
                    n.nutrition_type_id, n.nutrition_name
                   ";

$resultFreqMeals = $conn->query($sqlFreqMeals);

if ($resultFreqMeals === false) {
    die("Fehler: " . $conn->error);
}

echo "<div>";
echo "<h6>Ernährungsanteil an Gerichten:</h6>";
echo "<table>";
echo "<tr><th>Ernährungsart</th><th>Anzahl Gerichte</th><th>Relative Häufigkeit</th></tr>";

while ($rowFreqMeals = $resultFreqMeals->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $rowFreqMeals["nutrition_name"] . "</td>";
    echo "<td>" . $rowFreqMeals["all_meals"] . "</td>";
    echo "<td>" . $rowFreqMeals["rel_freq"] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>";

echo "</div>";

$conn->close();
?>
