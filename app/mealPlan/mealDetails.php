<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/app/app.css" />
    <link rel="stylesheet" href="/app/mealPlan/mealDetails.css" />
    <link rel="stylesheet" href="/app/navbar/navbar.css" />
    <title>Study Companion | Details</title>
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

    <main class="main">
      <div class="meal-description">
        <h1 class="title">Curry mit Tofu</h1>
        <img src="" class="meal-cover" />

        <!--Mobile Details only-->
        <div class="meal-details-mobile">
          <div class="details-container-mobile">
            <div class="details nutrition-type">
              <span class="material-icons">restaurant</span>
              <h6>Vegan</h6>
            </div>
            <div class="details calories">
              <span class="material-icons">local_fire_department</span>
              <h6>560 kcal</h6>
            </div>
            <div class="details proteins">
              <span class="material-icons">fitness_center</span>
              <h6>31 P</h6>
            </div>
            <div class="details fat">
              <span class="material-icons">water_drop</span>
              <h6>22 F</h6>
            </div>
            <div class="details carbs">
              <span class="material-icons">directions_run</span>
              <h6>76 K</h6>
            </div>
          </div>
          <button class="checkout-button">
            <span class="arrow-right-icon material-icons">shopping_bag</span>
            <a href="/bestellen"> Bezahlen: 23,5€ </a>
          </button>
        </div>

        <h5>Inhaltsstoffe / Allergene</h5>
        <p class="description">
          Lorem ipsum dolor sit amet, consetetur sadipscing elitr
        </p>
      </div>

      <!--Only on Desktop-->
      <div class="vertical-separator"></div>

      <div class="meal-details-desktop">
        <div class="details nutrition-type">
          <span class="material-icons">restaurant</span>
          <h6>Vegan</h6>
        </div>
        <div class="details calories">
          <span class="material-icons">local_fire_department</span>
          <h6>560 kcal</h6>
        </div>
        <div class="details proteins">
          <span class="material-icons">fitness_center</span>
          <h6>31 P</h6>
        </div>
        <div class="details fat">
          <span class="material-icons">water_drop</span>
          <h6>22 F</h6>
        </div>
        <div class="details carbs">
          <span class="material-icons">directions_run</span>
          <h6>76 K</h6>
        </div>
        <button class="checkout-button">
          <span class="arrow-right-icon material-icons">shopping_bag</span>
          <a href="/bestellen"> Bezahlen </a>
        </button>
      </div>
    </main>

    <script src="/app/navbar/navbar.js"></script>
    <script src="/app/mealPlan/mealDetails.js"></script>
    <script src="/app/mealPlan/shoppingCard.js"></script>
    <script src="/app/mealPlan/payment.js"></script>
  </body>
</html>
