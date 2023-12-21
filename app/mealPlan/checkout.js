//try to get shopping card from local storage
const shopping_card = localStorage.getItem('shopping_card')
  ? JSON.parse(localStorage.getItem('shopping_card'))
  : [];

//gets quantity of every item
var items = shopping_card.reduce(function (acc, item) {
  var currentId = item.id;

  if (!acc[currentId]) {
    acc[currentId] = {
      id: currentId,
      countOfId: 0,
      price: 0,
      name: item.name,
    };
  }
  acc[currentId].countOfId++;
  acc[currentId].price += item.price;

  return acc;
}, {});
//convert in array
var resultArray = Object.values(items);

//render based on new shopping data array
const parentNode = document.querySelector('.grid-checkout-container');
resultArray.forEach((item) => {
  const mealElement = document.createElement('div');
  mealElement.classList.add('meal');
  mealElement.innerHTML = `
    <a href="/gerichtdetails?mealID=${item.id}">${item.name}</a>
    <p>${item.countOfId}</p>
  `;
  parentNode.appendChild(mealElement);
});

//render total price
const totalPrice = document.createElement('p');
totalPrice.innerHTML = 'Summe: ' + localStorage.getItem('checkout_price') + '€';
totalPrice.style.marginTop = '4rem';
parentNode.appendChild(totalPrice);

function checkoutOrder() {
  //generate unique order number and delete local storage items if student number exists
  const inputField = document
    .querySelector('.student-number-input')
    .querySelector('input');

  if (inputField.value != '') {
    alert('Deine Bestellung ist reserviert!');
    //remove shopping card data after checkout is done
    localStorage.setItem('shopping_card', []);
    localStorage.setItem('checkout_price', 0);

    //redirect to main page
    window.location.href = 'http://m12242-30.kurs.jade-hs.de/mensaplan';
  } else {
    alert('Bitte gebe eine gültige Matrikelnummer ein!');
  }
}
