const add_meal_to_card_button = 'add_meal_to_card';

function addToShoppingCard(id, price, name) {
  //get shopping card object if existing
  const shopping_card = localStorage.getItem('shopping_card')
    ? JSON.parse(localStorage.getItem('shopping_card'))
    : [];
  //add meal to local storage shopping_card
  const obj = {
    id: id,
    price: price,
    name: name,
  };
  shopping_card.push(obj);
  localStorage.setItem('shopping_card', JSON.stringify(shopping_card));

  //update checkout_price
  savePrice(price);
}
