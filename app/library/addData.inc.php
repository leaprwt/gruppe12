<form id="book_form" onsubmit="submitBookForm(event)" enctype="multipart/form-data">

        <label for="book_name">Buchtitel:</label>
        <input type="text" name="book_name" required><br>

        <label for="isbn">ISBN:</label>
        <input type="number" name="isbn" required><br>

        <label for="">Beschreibung:</label>
        <input type="text" name="description" required><br>

        <label for="date">Veröffentlicht:</label>
        <input type="number" name="date" required>

        <label for="category">Kategorie:</label>
        <select name="category" required>
        <?php
            //get all possible values from database
            $dbname = LIBRARY_DATABASE;
            $conn = connectDB(LIBRARY_HOST, LIBRARY_USER, LIBRARY_PASSWORD, $dbname);

            $sql = "SELECT * FROM bookcategories";
            $professors = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($professors)) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            $conn->close();
        ?>
        </select><br>

        <label for="language">Sprache:</label>
        <select name="language" required>
        <?php
            //get all possible values from database
            $dbname = LIBRARY_DATABASE;
            $conn = connectDB(LIBRARY_HOST, LIBRARY_USER, LIBRARY_PASSWORD, $dbname);

            $sql = "SELECT * FROM languages";
            $professors = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($professors)) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            $conn->close();
        ?>
        </select><br>

        <label for="book-type">Kategorie:</label>
        <select name="book-type" required>
        <?php
            //get all possible values from database
            $dbname = LIBRARY_DATABASE;
            $conn = connectDB(LIBRARY_HOST, LIBRARY_USER, LIBRARY_PASSWORD, $dbname);

            $sql = "SELECT * FROM booktypes";
            $professors = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($professors)) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            $conn->close();
        ?>
        </select><br>

        <label for="author">Autor:</label>
        <select name="author" required>
        <?php
            //get all possible values from database
            $dbname = LIBRARY_DATABASE;
            $conn = connectDB(LIBRARY_HOST, LIBRARY_USER, LIBRARY_PASSWORD, $dbname);

            $sql = "SELECT * FROM authors";
            $professors = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($professors)) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            $conn->close();
        ?>
        </select><br>
        
        <!--Upload Cover Image-->
        <label for="image">Bild auswählen:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <br>

        <input type="submit" value="Submit">
</form>

<script>
    function submitBookForm(event) {
            event.preventDefault(); 

            //post data to api
            fetch('http://localhost:8888/api/postInsertBook', {
                method: 'POST',
                body: new FormData(document.getElementById('book_form')),
            })
            .then(response => response.text())
            .then(data => {
                alert(data); 
                document.getElementById('book_form').reset(); 
            })
            .catch(error => console.error('Error:', error));
        }
</script>
