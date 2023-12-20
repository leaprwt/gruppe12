<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="app/app.css" />
    <link rel="stylesheet" href="app/navbar/navbar.css" />
    <link rel="stylesheet" href="app/main.css"/>
    <title>Study Companion | Home</title>
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
          <li><a href="/statistik">Statistiken</a></li>
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
          <li><a href="/statistik">Statistiken</a></li>
        </ul>
      </div>
    </header>
    <main>
      <?php
          //imports utils
          require_once "api/includes/config.php";
          require_once "api/includes/connectDB.php";

          //include files
          include_once('app/studyPlaner/homeTable.inc.php');
          include_once('app/library/homeTable.inc.php');
          include_once('app/mealPlan/homeTable.inc.php');
        ?>
    </main>
    <script src="app/navbar/navbar.js"></script>
  </body>
</html>
