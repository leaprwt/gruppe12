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
    <link rel="stylesheet" href="/app/navbar/navbar.css" />
    <link rel="stylesheet" href="/app/library/bookDetails.css" />
    <title>Study Companion | Buchdetails</title>
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

    <main>
      <div class="book-description">
        <h2 class="title">Ein super Buchtitel</h2>

        <!--Mobile Details only-->
        <div class="book-details-mobile">
          <img src="/app/assets/book_cover_2.webp" class="book-cover" />

          <div class="details-container-mobile">
            <div class="details author">
              <span class="material-icons">person</span>
              <h6>Max Mustermann</h6>
            </div>
            <div class="details published">
              <span class="material-icons">date_range</span>
              <h6>2013</h6>
            </div>
            <div class="details language">
              <span class="material-icons">language</span>
              <h6>Deutsch</h6>
            </div>
          </div>
        </div>

        <h5>Beschreibung</h5>
        <p class="description">
          Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
          nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
          sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
          rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
          ipsum dolor sit amet.
        </p>
        <button class="download-button">
          <a class="downloadLink" href="#" download="example.pdf">
            Downloaden
          </a>
          <span class="arrow-right-icon material-icons">download</span>
        </button>
      </div>

      <!--Only on Desktop-->
      <div class="vertical-separator"></div>

      <div class="book-details-desktop">
        <img src="/app/assets/books/book_cover_2.webp" class="book-cover" />

        <div class="details author">
          <span class="material-icons">person</span>
          <h6>Max Mustermann</h6>
        </div>
        <div class="details published">
          <span class="material-icons">date_range</span>
          <h6>2013</h6>
        </div>
        <div class="details language">
          <span class="material-icons">language</span>
          <h6>Deutsch</h6>
        </div>
      </div>
    </main>
    <script src="/app/navbar/navbar.js"></script>
    <script src="/app/library/bookDetails.js"></script>
  </body>
</html>
