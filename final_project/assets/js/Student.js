//=> Course 1
const courseOneBtn = document.getElementById('courseOneBtn');
const courseOneIfr = document.getElementById('courseOneIfr');

const showOne = (e) => {
  e.preventDefault();
  courseOneIfr.style.display = 'block';
};
courseOneBtn.addEventListener('dblclick', showOne, false);

const hiddenOne = (e) => {
  e.preventDefault();
  courseOneIfr.style.display = 'none';
};
courseOneBtn.addEventListener('click', hiddenOne, false);
// =>Course 2
const courseTwoBtn = document.getElementById('courseTwoBtn');
const courseTwoIfr = document.getElementById('courseTwoIfr');

const showTwo = () => {
  courseTwoIfr.style.display = 'block';
};
courseTwoBtn.addEventListener('dblclick', showTwo, false);

const hiddenTwo = () => {
  courseTwoIfr.style.display = 'none';
};
courseTwoBtn.addEventListener('click', hiddenTwo, false);
// =>Course 3
const courseThrBtn = document.getElementById('courseThrBtn');
const courseThrIfr = document.getElementById('courseThrIfr');

const showThree = () => {
  courseThrIfr.style.display = 'block';
};
courseThrBtn.addEventListener('dblclick', showThree, false);

const hiddenThree = () => {
  courseThrIfr.style.display = 'none';
};
courseThrBtn.addEventListener('click', hiddenThree, false);
//=> course 4
const courseFourBtn = document.getElementById('courseFourBtn');
const courseFourIfr = document.getElementById('courseFourIfr');

const showFour = () => {
  courseFourIfr.style.display = 'block';
};
courseFourBtn.addEventListener('dblclick', showFour, false);

const hiddenFour = () => {
  courseFourIfr.style.display = 'none';
};
courseFourBtn.addEventListener('click', hiddenFour, false);
//=>course 5
const courseFiveBtn = document.getElementById('courseFiveBtn');
const courseFiveIfr = document.getElementById('courseFiveIfr');

const showFive = () => {
  courseFiveIfr.style.display = 'block';
};
courseFiveBtn.addEventListener('dblclick', showFive, false);

const hiddenFive = () => {
  courseFiveIfr.style.display = 'none';
};
courseFiveBtn.addEventListener('click', hiddenFive, false);


//=> instructor




