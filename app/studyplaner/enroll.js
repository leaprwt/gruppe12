function buildEnrollUi() {
  //render depending on screen size
  window.innerWidth <= 800 ? buildEnrollUiMobile() : buildEnrollUiDesktop();
}

/* Building Desktop UI */
function buildEnrollUiDesktop() {
  //desktop
  //apply visual filter
  document.querySelector('main').style.backgroundColor = 'rgba(0,0,0,0.65)';
  //create popup
  const popup = document.createElement('div');
  popup.style.width = '80vw';
  popup.style.height = '60vh';
  popup.style.backgroundColor = 'white';
  //positioning
  popup.style.position = 'absolute';
  popup.style.top = '20vh';
  popup.style.left = '10vw';

  //define layout
  popup.style.display = 'flex';
  popup.style.flexDirection = 'column';
  popup.style.alignItems = 'center';
  popup.style.padding = '2rem';

  //create UI Elements

  //title
  const title = document.createElement('h2');
  title.innerHTML = 'Einschreiben';

  //create closing icon
  const closeIcon = document.createElement('span');
  closeIcon.classList.add('material-icons');
  closeIcon.innerHTML = 'close';
  closeIcon.style.fontSize = '3.5rem';
  closeIcon.style.position = 'absolute';
  closeIcon.style.right = '4rem';
  closeIcon.style.cursor = 'pointer';
  //close popup on click, remove filter
  closeIcon.onclick = () => {
    popup.remove();
    document.querySelector('main').style.backgroundColor = 'white';
  };

  //input field
  const studentNumberInput = document.createElement('div');
  studentNumberInput.classList.add('student-number-input');

  const studentNumberIcon = document.createElement('span');
  studentNumberIcon.classList.add('material-icons');
  studentNumberIcon.innerHTML = 'confirmation_number';
  studentNumberIcon.classList.add('student-number-icon');

  const studentNumberInputField = document.createElement('input');
  studentNumberInputField.type = 'number';
  studentNumberInputField.placeholder = 'matrikelnummer,  z.B. 12356';
  studentNumberInputField.classList.add('student-number-input-field');

  //building input field
  studentNumberInput.appendChild(studentNumberIcon);
  studentNumberInput.appendChild(studentNumberInputField);

  //checkbox
  const checkboxContainer = document.createElement('div');
  checkboxContainer.classList.add('checkbox-container');

  const checkbox = document.createElement('input');
  checkbox.type = 'checkbox';

  const checkboxText = document.createElement('p');
  checkboxText.innerHTML =
    'Hiermit akzeptiere ich die aktuelle Prüfungsordnung';

  //building checkbox confirmation
  checkboxContainer.appendChild(checkbox);
  checkboxContainer.appendChild(checkboxText);

  //enroll button
  const enrollButton = document.createElement('button');
  enrollButton.classList.add('enroll-button');
  enrollButton.innerHTML = `Einschreiben<span class="arrow-right-icon material-icons">chevron_right</span>`;
  enrollButton.id = 'submit-enroll-button';
  enrollButton.onclick = () => enrollCourse();

  //appending elements to popup
  popup.appendChild(title);
  popup.appendChild(closeIcon);
  popup.appendChild(studentNumberInput);
  popup.appendChild(checkboxContainer);
  popup.appendChild(enrollButton);

  //append whole popup*
  document.body.appendChild(popup);
}

/* Building Mobile UI */
function buildEnrollUiMobile() {
  //setting new layout for main component
  const main = document.querySelector('main');
  main.style.display = 'flex';
  main.style.flexDirection = 'column';
  main.style.alignItems = 'center';
  //disable all child elements of "main"
  document.querySelector('.course-description').style.display = 'none';
  document.querySelector('.course-details-desktop').style.display = 'none';

  //building new UI
  const titleContainer = document.createElement('div');
  titleContainer.classList.add('title-container');

  //back arrow Icon
  const backArrow = document.createElement('span');
  backArrow.style.fontSize = '2.5rem';
  backArrow.innerHTML = 'arrow_back';
  backArrow.classList.add('material-icons');
  //setting ID for event Listener
  backArrow.id = 'goBackToDetailPage';

  //title
  const title = document.createElement('h2');
  title.innerHTML = 'Einschreiben';

  //build titleContainer
  titleContainer.appendChild(backArrow);
  titleContainer.appendChild(title);

  //input field
  const studentNumberInput = document.createElement('div');
  studentNumberInput.classList.add('student-number-input');

  const studentNumberIcon = document.createElement('span');
  studentNumberIcon.classList.add('material-icons');
  studentNumberIcon.innerHTML = 'confirmation_number';
  studentNumberIcon.classList.add('student-number-icon');

  const studentNumberInputField = document.createElement('input');
  studentNumberInputField.type = 'number';
  studentNumberInputField.placeholder = 'matrikelnummer,  z.B. 12356';
  studentNumberInputField.classList.add('student-number-input-field');

  //building input field
  studentNumberInput.appendChild(studentNumberIcon);
  studentNumberInput.appendChild(studentNumberInputField);

  //checkbox
  const checkboxContainer = document.createElement('div');
  checkboxContainer.classList.add('checkbox-container');

  const checkbox = document.createElement('input');
  checkbox.type = 'checkbox';

  const checkboxText = document.createElement('p');
  checkboxText.innerHTML =
    'Hiermit akzeptiere ich die aktuelle Prüfungsordnung';
  checkboxText.classList.add('small');

  //building checkbox confirmation
  checkboxContainer.appendChild(checkbox);
  checkboxContainer.appendChild(checkboxText);

  //enroll button
  const enrollButton = document.createElement('button');
  enrollButton.classList.add('enroll-button');
  enrollButton.classList.add('enroll-button-enroll-view');
  enrollButton.innerHTML = `Einschreiben<span class="arrow-right-icon material-icons">chevron_right</span>`;
  enrollButton.id = 'submit-enroll-button';
  enrollButton.onclick = () => enrollCourse();

  //append elements to main
  main.appendChild(titleContainer);
  main.appendChild(studentNumberInput);
  main.appendChild(checkboxContainer);
  main.appendChild(enrollButton);

  //adding event Listener for closing button
  document
    .getElementById('goBackToDetailPage')
    .addEventListener('click', function () {
      //disable enroll view and restore details page
      main.querySelector('.title-container').remove();
      main.querySelector('.student-number-input').remove();
      main.querySelector('.checkbox-container').remove();
      main.querySelector('.enroll-button-enroll-view').remove();

      document.querySelector('.course-description').style.display = 'block';
      document.querySelector('.course-details-mobile').style.display = 'flex';
    });
}

//try to enroll in course
async function enrollCourse() {
  const BASE_URL = 'http://localhost:8888';
  const studentNumber = document.querySelector(
    '.student-number-input-field'
  ).value;
  const courseID = new URLSearchParams(window.location.search).get('courseID');

  //checks if checkbox is marked
  if (
    document.querySelector('.checkbox-container').querySelector('input')
      .checked &&
    studentNumber != ''
  ) {
    //get all courses based on student number
    const response = await fetch(
      `${BASE_URL}/api/getEnrolledCourses?studentNumber=${studentNumber}`
    );

    const data = await response.json();
    //checks if student number exists
    data == 'keine ergebnisse gefunden'
      ? alert('Matrikelnummer existiert nicht!')
      : null;
    //checks if student is already enrolled in course
    if (
      data.some((obj) => {
        return obj.course_id === courseID;
      })
    ) {
      alert('Bereits eingeschrieben!');
    } else {
      //enroll in course
      const requestOptions = {
        method: 'POST',
        headers: {
          'Content-type': 'application/json',
        },
        body: JSON.stringify({
          student_id: data[0].student_id,
          course_id: courseID,
        }),
      };

      const response = await fetch(
        `${BASE_URL}/api/postEnrollCourse`,
        requestOptions
      );
      alert(await response.json());
    }
  } else {
    alert('Bitte akzeptiere die Prüfungsordnung und fülle alle Felder aus');
  }
}
