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
    <link rel="stylesheet" href="/app/studyPlaner/courseDetails.css" />
    <link rel="stylesheet" href="/app/studyPlaner/enroll.css" />
    <title>Study Companion | Kursdetails</title>
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
      <div class="course-description">
        <h2 class="title"></h2>

        <!--Mobile Details only-->
        <div class="course-details-mobile">
          <div class="prof-etcs-grid-item">
            <div class="details professor">
              <span class="material-icons">person</span>
              <h6></h6>
            </div>
            <div class="details ects">
              <span class="material-icons">assessment</span>
              <h6></h6>
            </div>
          </div>
          <div class="details lecture-dates">
            <span class="material-icons">date_range</span>
            <h6></h6>
          </div>
          <div class="details exam-type">
            <span class="material-icons">fact_check</span>
            <h6></h6>
          </div>
        </div>

        <h5></h5>
        <p class="description"></p>
        <button onclick="buildEnrollUi()" class="enroll-button">
          <a> Einschreiben </a>
          <span class="arrow-right-icon material-icons">chevron_right</span>
        </button>
      </div>

      <!--Only on Desktop-->
      <div class="vertical-separator"></div>

      <div class="course-details-desktop">
        <div class="details professor">
          <span class="material-icons">person</span>
          <h6>Prof. Dr. Max Mustermann</h6>
        </div>
        <div class="details ects">
          <span class="material-icons">assessment</span>
          <h6>20.0 ECTS</h6>
        </div>
        <div class="details lecture-dates">
          <span class="material-icons">date_range</span>
          <h6>Mo. 16:00-18:30 / Mi 11:30-13:00</h6>
        </div>
        <div class="details exam-type">
          <span class="material-icons">fact_check</span>
          <h6>Online Klausur</h6>
        </div>
      </div>
    </main>

    <script src="/app/navbar/navbar.js"></script>
    <script src="/app/studyPlaner/enroll.js"></script>
    <script src="/app/studyPlaner/courseDetails.js"></script>
  </body>
</html>
