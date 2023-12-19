<?php
        //imports utils
        require_once "api/includes/config.php";
        require_once "api/includes/connectDB.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/app/app.css" />
    <link rel="stylesheet" href="/app/navbar/navbar.css" />
    <link rel="stylesheet" href="/app/addData.css" />
    <title>Study Companion | Studiplaner</title>
</head>
<body>
<header>
      <div id="brand"><a href="/">Study Companion</a></div>
      <nav>
        <!--Desktop Menu-->
        <ul>
          <li><a href="/studiplaner">Studiplaner</a></li>
          <li><a href="/bibliothek">Bibliothek</a></li>
          <li><a href="/mensaplan">Mensaplan</a></li>
          <li><a href="/datenerfassen">Daten erfassen</a></li>
          <li><a href="/statistiken">Statistiken</a></li>
        </ul>
      </nav>
      <!--Toggle Icon-->
      <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <!--Mobile Menu-->
        <ul class="mobile-menu">
          <li><a href="/studiplaner">Studiplaner</a></li>
          <li><a href="/bibliothek">Bibliothek</a></li>
          <li><a href="/mensaplan">Mensaplan</a></li>
          <li><a href="/datenerfassen">Daten erfassen</a></li>
          <li><a href="/statistiken">Statistiken</a></li>
        </ul>
      </div>
    </header>
    <main>
    <div class="add-course-container">
      <h2>Studiplaner | Kurs hinzufügen</h2>
      <?php
          //import file
          require_once "app/studyPlaner/addData.inc.php";
      ?>
    </div>
    <div class="add-book-container">
      <h2>Bibliothek | Buch hinzufügen</h2>
        <?php
            //import file
            require_once "app/library/addData.inc.php";
        ?>
    </div>
    <div class="add-meal-container">
      <h2>Mensaplan | Gericht hinzufügen</h2>
        <?php
            //import file
            require_once "app/mealPlan/addData.inc.php";
        ?>
    </div>

    </main>
    

    <script src="/app/navbar/navbar.js"></script>
</body>
</html>
