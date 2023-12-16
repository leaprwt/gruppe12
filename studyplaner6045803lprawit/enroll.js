//TBD
const enrollLink = '#';

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

  //input field
  const studentNumberInput = document.createElement('div');
  studentNumberInput.classList.add('student-number-input');

  const studentNumberIcon = document.createElement('span');
  studentNumberIcon.classList.add('material-icons');
  studentNumberIcon.innerHTML = 'confirmation_number';
  studentNumberIcon.classList.add('student-number-icon');

  const studentNumberInputField = document.createElement('input');
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
  enrollButton.innerHTML = `<a href=${enrollLink}>Einschreiben</a><span class="arrow-right-icon material-icons">chevron_right</span>`;

  //appending elements to popup
  popup.appendChild(title);
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
  enrollButton.innerHTML = `<a href=${enrollLink}>Einschreiben</a><span class="arrow-right-icon material-icons">chevron_right</span>`;

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
