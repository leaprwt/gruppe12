//fetch all courses from api
const BASE_URL = 'http://localhost:8888';
async function fetchData() {
  try {
    const response = await fetch(`${BASE_URL}/api/getCoursesOverview`);

    if (!response.ok) {
      throw new Error('Response not ok');
    }

    const data = await response.json();

    return data;
  } catch (error) {
    console.error(error);
  }
}

//UI Building
(async () => {
  const courses = await fetchData();

  //display number of results on website
  const numberOfResultsNode = document.querySelector('.count-of-results');
  numberOfResultsNode.innerHTML = `${courses.length} Ergebnis${
    courses.length == 1 ? '' : 'se'
  }`;

  //display courses on website
  const resultsNode = document.querySelector('.results');
  courses.forEach((course) => {
    //reduce description text to a specific number of characters
    let trimmedDescription;
    window.innerWidth <= 1000
      ? (trimmedDescription = course.description.slice(0, 30).trim())
      : (trimmedDescription = course.description.slice(0, 100).trim());

    //build card UI with values from the response
    const card = document.createElement('div');
    card.classList.add('card');
    //set unique course id and trimmed description
    card.setAttribute('course_id', course.course_id);
    card.innerHTML = `
            <h6 class="course-name">${course.course_name}</h6>
            <p class="small description">
                ${trimmedDescription}...
            </p>
            <a class="details-button" href="/kursdetails?courseID=${course.course_id}">
                <p class="small">Details</p>
                <span class="arrow-right-icon material-icons"> chevron_right </span>
            </a>
            `;
    resultsNode.appendChild(card);
  });
})();

//dynamic search
const searchInput = document.querySelector('.search-input');

searchInput.addEventListener('input', function (event) {
  const cards = document.querySelectorAll('.card');

  // show all cards
  cards.forEach((card) => (card.style.display = 'grid'));

  //filter courses based on event input
  const visibleCards = Array.from(cards).filter((card) => {
    const courseName = card
      .querySelector('.course-name')
      .textContent.toLowerCase();
    const inputValue = event.target.value.toLowerCase();
    return courseName.includes(inputValue);
  });

  //display results and text based on filtered cards
  document.querySelector('.count-of-results').innerHTML = `${
    visibleCards.length
  } Ergebnis${visibleCards.length == 1 ? '' : 'se'}`;

  // hide cards that do not match the search criteria
  cards.forEach((card) => {
    visibleCards.includes(card)
      ? (card.style.display = 'grid')
      : (card.style.display = 'none');
  });
});
