//fetch all courses from api
const BASE_URL = 'http://localhost:8888';
//get courseID based on client URL
const courseID = new URLSearchParams(window.location.search).get('courseID');
async function fetchData() {
  try {
    const response = await fetch(
      `${BASE_URL}/api/getCourseDetails?courseID=${courseID}`
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
  const courseDetails = await fetchData();
  console.log(courseDetails[0]);

  document.querySelector('.title').innerHTML = courseDetails[0].course_name;
  document
    .querySelectorAll('.professor')
    .forEach(
      (item) =>
        (item.querySelector('h6').innerHTML = courseDetails[0].professor_name)
    );
  document
    .querySelectorAll('.ects')
    .forEach(
      (item) =>
        (item.querySelector('h6').innerHTML = `${courseDetails[0].ects}.0 ECTS`)
    );
  document
    .querySelectorAll('.exam-type')
    .forEach(
      (item) =>
        (item.querySelector('h6').innerHTML = courseDetails[0].type_of_exam)
    );
  document.querySelector('.description').innerHTML =
    courseDetails[0].description;
  //process lecture times
  const daysOfWeek = ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'];
  const lectureTime = `${
    daysOfWeek[new Date(courseDetails[0].lecture_time_one).getDay()]
  } ${new Date(courseDetails[0].lecture_time_one).getHours()}:${new Date(
    courseDetails[0].lecture_time_one
  ).getMinutes()} / ${
    daysOfWeek[new Date(courseDetails[0].lecture_time_two).getDay()]
  } ${new Date(courseDetails[0].lecture_time_two).getHours()}:${new Date(
    courseDetails[0].lecture_time_two
  ).getMinutes()}`;

  //set lecture time UI
  document
    .querySelectorAll('.lecture-dates')
    .forEach((item) => (item.querySelector('h6').innerHTML = lectureTime));
})();
