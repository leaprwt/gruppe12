//fetch all courses from api
const BASE_URL = 'http://m12242-30.kurs.jade-hs.de';
//get courseID based on client URL
const mealID = new URLSearchParams(window.location.search).get('mealID');

async function fetchData() {
  try {
    const response = await fetch(
      `${BASE_URL}/api/getMealDetails?mealID=${mealID}`
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

(async () => {
  const meal = await fetchData();
  console.log(meal);

  //update UI based on data
  document.querySelector('.meal-cover').src = meal[0].path_to_image;
  document.querySelector('.title').innerHTML = meal[0].meal_name;
  document.querySelector('.nutrition-type').querySelector('h6').innerText =
    meal[0].nutrition_name;
  document.querySelector('.calories').querySelector('h6').innerText =
    meal[0].calories + ' kcal';
  document.querySelector('.proteins').querySelector('h6').innerText =
    meal[0].protein + ' P';
  document.querySelector('.fat').querySelector('h6').innerText =
    meal[0].fat + ' F';
  document.querySelector('.carbs').querySelector('h6').innerText =
    meal[0].carbonhydrate + ' K';

  //get all ingredients and concatenate to string
  let ingredientsString = '';
  meal.forEach((item) => {
    ingredientsString += item.ingredients_name + ' ';
  });

  document.querySelector('.description').innerText = ingredientsString;
})();
