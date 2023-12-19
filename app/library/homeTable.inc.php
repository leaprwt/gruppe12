<?php
    //get all data
    $dbname = "library";
    //Connects to database
    $conn = connectDB(HOST, USER, PASSWORD, $dbname);

    //Selects book names and cover-image path
    $sql = "SELECT books.*, authors.name as author_name FROM books
            JOIN authors ON books.author_id = authors.id
            WHERE books.isbn != 0
            ORDER BY books.title 
            LIMIT 10";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $libraryData[] = array(
                'Buch ID' => $row['book_id'],
                'Buchtitel' => $row['title'],
                'ISBN' => $row['isbn'],
                'Autor' => $row['author_name'],
                

            );
        }
    } else {
        echo "Keine Ergebnisse gefunden";
    }

    //create table
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Buch ID</th>";
    echo "<th>Buchtitel</th>";
    echo "<th>ISBN</th>";
    echo "<th>Autor</th>";
    echo "</tr>";

    foreach ($libraryData as $row) {
        echo "<tr>";
        echo "<td>" . $row['Buch ID'] . "</td>";
        echo "<td>" . $row['Buchtitel'] . "</td>";
        echo "<td>" . $row['ISBN'] . "</td>";
        echo "<td>" . $row['Autor'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";


    $conn->close();
?>
