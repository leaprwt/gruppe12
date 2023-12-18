//initial ui setup
document
  .querySelector('.checkout-button')
  .querySelector('a').innerHTML = `Bestellen: ${localStorage.getItem(
  'checkout_price'
)}€`;

function savePrice(price) {
  if (typeof Storage !== 'undefined') {
    // check price if it exists
    var currentPrice = localStorage.getItem('checkout_price');
    if (!currentPrice) {
      currentPrice = 0;
    }

    // update price
    var newPrice = parseFloat(currentPrice) + parseFloat(price);
    localStorage.setItem('checkout_price', newPrice);
  } else {
    // Error handling if local storage is not supported
    console.error('LocalStorage wird nicht unterstützt.');
    return null;
  }

  //update ui
  document
    .querySelector('.checkout-button')
    .querySelector('a').innerHTML = `Bestellen: ${newPrice}€`;
}
