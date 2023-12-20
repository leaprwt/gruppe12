<?php
$dbname = LIBRARY_DATABASE;
$conn = connectDB(LIBRARY_HOST, LIBRARY_USER, LIBRARY_PASSWORD, $dbname);

//get quantity of all books
$sqlQuantity = "SELECT COUNT(*) AS quantity FROM books";
$resultQuantity = $conn->query($sqlQuantity);

if ($resultQuantity === false) {
    die("Fehler: " . $conn->error);
}

$rowQuantity = $resultQuantity->fetch_assoc();
$quantity = $rowQuantity['quantity'];


echo "<div>";
echo "<h6>Gesamtanzahl der Bücher:</h6>";
echo "<p>" . $quantity . "</p>";
echo "</div>";

//get average date_published across all books
$sqlMeanDate = "SELECT AVG(date_published) AS mean_date FROM books";
$resultsMeanDate = $conn->query($sqlMeanDate);

if ($resultsMeanDate === false) {
    die("Fehler: " . $conn->error);
}

$rowMeanDate = $resultsMeanDate->fetch_assoc();
$mean_date = (int)$rowMeanDate['mean_date'];

echo "<div>";
echo "<h6>Durchschnittliches Erscheinungsjahr:</h6>";
echo "<p>" . $mean_date . "</p>";
echo "</div>";

//get frequencies of authors for every book
$sqlFreqAuthors = "SELECT
                    a.id,
                    a.name,
                    COUNT(b.book_id) AS books_written,
                    COUNT(b.book_id) / (SELECT COUNT(*) FROM books) AS rel_freq
                    FROM
                    authors a
                    JOIN
                    books b ON a.id = b.author_id
                    GROUP BY
                    a.id, a.name;
                   ";

$resultFreqAuthors = $conn->query($sqlFreqAuthors);

if ($resultFreqAuthors === false) {
    die("Fehler: " . $conn->error);
}

echo "<div>";
echo "<h6>Autorenanteil an Büchern:</h6>";
echo "<table>";
echo "<tr><th>Autor</th><th>Anzahl an Büchern</th><th>Relative Häufigkeit</th></tr>";

while ($rowFreqAuthors = $resultFreqAuthors->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $rowFreqAuthors["name"] . "</td>";
    echo "<td>" . $rowFreqAuthors["books_written"] . "</td>";
    echo "<td>" . $rowFreqAuthors["rel_freq"] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>";

echo "</div>";

$conn->close();
?>
