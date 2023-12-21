//fetch all meals from api
const BASE_URL = 'http://m12242-30.kurs.jade-hs.de';
async function fetchData() {
  try {
    const response = await fetch(`${BASE_URL}/api/getMealsOverview`);

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
  const meals = await fetchData();
  const days = ['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag'];

  days.forEach((day) => {
    //filter meals based on day, display data
    let filteredMeals = meals.filter((meal) => meal.day === day);

    //create container for all meals on day "day"
    const mealContainer = document.createElement('div');
    mealContainer.classList.add('daily-meals');
    mealContainer.innerHTML = `<h4>${day}</h4>`;

    //add main dishes
    const mainDishes = document.createElement('div');
    mainDishes.classList.add('main-dishes');
    mainDishes.classList.add('dish');
    mainDishes.innerHTML = '<h6>Hauptgericht</h6>';
    filteredMeals
      .filter((meal) => meal.type_of_meal === 'Hauptgericht')
      .forEach((meal) => {
        const mealElement = document.createElement('div');
        mealElement.classList.add('meal');
        mealElement.innerHTML = `
          <a href="/gerichtdetails?mealID=${meal.meal_id}">${meal.meal_name}</a>
          <p>${meal.meal_price}€</p>
          <span class="material-icons" onclick=addToShoppingCard(${meal.meal_id},${meal.meal_price},"${meal.meal_name}")>add_circle_outlined</span>
        `;
        mainDishes.appendChild(mealElement);
      });

    //add side dishes
    const sideDishes = document.createElement('div');
    sideDishes.classList.add('side-dishes');
    sideDishes.classList.add('dish');
    sideDishes.classList.add('dish');
    sideDishes.innerHTML = '<h6>Beilagen</h6>';
    filteredMeals
      .filter((meal) => meal.type_of_meal === 'Beilage')
      .forEach((meal) => {
        const mealElement = document.createElement('div');
        mealElement.classList.add('meal');
        mealElement.innerHTML = `
        <a href="/gerichtdetails?mealID=${meal.meal_id}">${meal.meal_name}</a>
        <p>${meal.meal_price}€</p>
        <span class="material-icons" onclick=addToShoppingCard(${meal.meal_id},${meal.meal_price},"${meal.meal_name}")>add_circle_outlined</span>
      `;
        sideDishes.appendChild(mealElement);
      });

    //add desserts
    const desserts = document.createElement('div');
    desserts.classList.add('desserts');
    desserts.classList.add('dish');
    desserts.classList.add('dish');
    desserts.innerHTML = '<h6>Desserts</h6>';
    filteredMeals
      .filter((meal) => meal.type_of_meal === 'Dessert')
      .forEach((meal) => {
        const mealElement = document.createElement('div');
        mealElement.classList.add('meal');
        mealElement.innerHTML = `
        <a href="/gerichtdetails?mealID=${meal.meal_id}">${meal.meal_name}</a>
        <p>${meal.meal_price}€</p>
        <span class="material-icons" onclick=addToShoppingCard(${meal.meal_id},${meal.meal_price},"${meal.meal_name}")>add_circle_outlined</span>
      `;
        desserts.appendChild(mealElement);
      });
    // append everything
    mealContainer.appendChild(mainDishes);
    mealContainer.appendChild(sideDishes);
    mealContainer.appendChild(desserts);
    document.querySelector('.weekly-meals').appendChild(mealContainer);
  });
})();
