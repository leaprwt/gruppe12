//fetch all courses from api
const BASE_URL = 'http://localhost:8888';
async function fetchData() {
  try {
    const response = await fetch(`${BASE_URL}/api/getBooksOverview`);

    if (!response.ok) {
      throw new Error('Response not ok');
    }

    const data = await response.json();

    return data;
  } catch (error) {
    console.error(error);
  }
}

(async () => {
  const books = await fetchData();

  //display books on website
  const resultsNode = document.querySelector('.results');
  books.forEach((book) => {
    //build card UI with values from the response
    const card = document.createElement('div');
    card.classList.add('card');

    //set unique book id
    card.setAttribute('book_id', book.book_id);

    card.innerHTML = `
        <div class="card">
            <img src="${book.cover_image_link}" class="cover-image" />
            <h6 class="book-title">${book.book_title}</h6>
            <button class="details-button">
                <a href="/buchdetails?bookID=${book.book_id}">Zum Buch</a>
                <span class="material-icons">chevron_right</span>
            </button>
        </div>
    `;
    resultsNode.appendChild(card);
  });
})();

//dynamic search
const searchInput = document.querySelector('.search-input');

searchInput.addEventListener('input', function (event) {
  const cards = document.querySelectorAll('.card');

  // show all cards
  cards.forEach((card) => (card.style.display = 'flex'));

  //filter courses based on event input
  const visibleCards = Array.from(cards).filter((card) => {
    const courseName = card
      .querySelector('.book-title')
      .textContent.toLowerCase();
    const inputValue = event.target.value.toLowerCase();
    return courseName.includes(inputValue);
  });

  // hide cards that do not match the search criteria
  cards.forEach((card) => {
    visibleCards.includes(card)
      ? (card.style.display = 'flex')
      : (card.style.display = 'none');
  });
});
