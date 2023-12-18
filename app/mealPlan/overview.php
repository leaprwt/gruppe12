<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Importing Material Icons-->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/app/app.css" />
    <link rel="stylesheet" href="/app/mealPlan/overview.css" />
    <link rel="stylesheet" href="/app/navbar/navbar.css" />
    <title>Study Companion | Mensa Plan</title>
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
        </ul>
      </div>
    </header>

    <main class="main">
      <div class="headline">
        <h1>Mensaplan</h1>
        <button class="checkout-button">
          <span class="material-icons">shopping_bag</span>
          <a href="#">Bestellen : 0€</a>
        </button>
      </div>
      <div class="weekly-meals"></div>
    </main>

    <script src="/app/navbar/navbar.js"></script>
    <script src="/app/mealPlan/overview.js"></script>
    <script src="/app/mealPlan/payment.js"></script>
    <script src="/app/mealPlan/shoppingCard.js"></script>
  </body>
</html>
