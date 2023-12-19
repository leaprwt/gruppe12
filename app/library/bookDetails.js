//fetch all courses from api
const BASE_URL = 'http://localhost:8888';
//get bookID based on client URL
const bookID = new URLSearchParams(window.location.search).get('bookID');
async function fetchData() {
  try {
    const response = await fetch(
      `${BASE_URL}/api/getBookDetails?bookID=${bookID}`
    );

    if (!response.ok) {
      throw new Error('Response not ok');
    }

    const data = await response.json();

    return data;
  } catch (error) {
    console.error(error);
  }
}

//BUILD UI
(async () => {
  const bookDetails = await fetchData();

  //set book title
  document.querySelector('.title').innerHTML = bookDetails[0].book_title;

  //set image cover
  document
    .querySelectorAll('.book-cover')
    .forEach((item) => (item.src = `${bookDetails[0].cover_image_link}`));

  //set author
  document
    .querySelectorAll('.author')
    .forEach(
      (item) => (item.querySelector('h6').innerHTML = bookDetails[0].author)
    );

  //set publishing date
  document
    .querySelectorAll('.published')
    .forEach(
      (item) =>
        (item.querySelector('h6').innerHTML = bookDetails[0].date_published)
    );

  //set language
  document
    .querySelectorAll('.language')
    .forEach(
      (item) => (item.querySelector('h6').innerHTML = bookDetails[0].language)
    );

  //set description
  document.querySelector('.description').innerHTML = bookDetails[0].description;

  //set example download link
  const downloadLink = document.querySelector('.downloadLink');
  const pdfPath = `localhost:8888/app/assets/books/example.pdf`;
  const dataURL = 'data:application/pdf;base64' + btoa(pdfPath);
  downloadLink.href = dataURL;
})();
