const bar = document.getElementById("nav-bar");
const navLinks = document.getElementsByClassName("nav-link");
const nav_height = document.getElementsByTagName('nav')[0].clientHeight;
var sectionOffset = []
for (let i = 0; i < navLinks.length; i++) {
    let href = navLinks[i].href;
    var id = href.slice(href.lastIndexOf("#") + 1, href.length);
    sectionOffset.push(document.getElementById(id).offsetTop - nav_height);
}
function onScroll() {
    if (window.pageYOffset > bar.offsetTop) {
        bar.classList.add("sticky");
    } else {
        bar.classList.remove("sticky");
    }
    for (let i = 0; i < navLinks.length; i++) {
        navLinks[i].classList.remove("highlight");
    }
    for (let i = sectionOffset.length - 1; i >= 0; i--) {
        if (window.pageYOffset >= sectionOffset[i]) {
            navLinks[i].classList.add("highlight");
            break
        }
    }
}
window.addEventListener("scroll", onScroll);

const movieList = document.getElementsByClassName("movie-panel");
const bookingButtons = document.getElementsByClassName("time-booking");
const seatOptions = document.getElementsByClassName('seat-option');
const daysInWeek = ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'];
const weekdays = ['MON', 'TUE', 'WED', 'THU', 'FRI']
const codeToTime = { '': '', T12: '12PM', T15: '3PM', T18: '6PM', T21: '9PM' }
// const price = { STA: [19.80,14.00], STP: [17.50,12.50], STC: [15.30,11.00], FCA: [30.00,24.00], FCP: [27.00,22.50], FCC: [24.00,21.00] }
var selectedMovie = 'ACT';
var selectedDay = 'MON';
var selectedTime = ''

document.getElementById('cust-expiry').min = new Date().toISOString().substr(0, 7);
document.getElementById('booking-area').style.display = 'none';


for (let i = 0; i < movieList.length; i++) {
    movieList[i].addEventListener('click', displaysynopsis);
}
movieList[0].click();
for (let i = 0; i < bookingButtons.length; i++) {
    bookingButtons[i].addEventListener('click', showBookingForm);
    bookingButtons[i].addEventListener('click', calculatePrice);
}

for (let so = 0; so < seatOptions.length; so++) {
    seatOptions[so].innerHTML += `<option value = '' >Please select</option> `;
    for (let i = 1; i < 11; i++) {
        seatOptions[so].innerHTML += `<option value = '${i}' > ${i}</option> `;
    }
    seatOptions[so].addEventListener('change', calculatePrice);
}
function showBookingForm() {
    document.getElementById('booking-area').style.display = '';
    selectedDay = this.value;
    selectedTime = movieInfo[selectedMovie]['time'][selectedDay];
    document.getElementById('movie-id').value = selectedMovie;
    document.getElementById('movie-day').value = selectedDay;
    document.getElementById('movie-hour').value = selectedTime;
    document.getElementById('movie-info').innerHTML = `${movieInfo[selectedMovie]['title']} - ${this.innerHTML}`;
}
function displaysynopsis() {
    selectedMovie = this.id;
    document.getElementById("synopsis-title").innerHTML = movieInfo[selectedMovie]['title'];
    document.getElementById("plot-description").innerHTML = movieInfo[selectedMovie]['plot'];
    document.getElementById("age-rating").innerHTML = movieInfo[selectedMovie]['rating'];
    document.getElementById("trailer").src = movieInfo[selectedMovie]['src'];
    for (let i = 0; i < bookingButtons.length; i++) {
        let timeCode = movieInfo[selectedMovie]['time'][bookingButtons[i].value];
        if (timeCode === '') {
            bookingButtons[i].style.display = 'none';
        }
        else {
            bookingButtons[i].style.display = '';
            bookingButtons[i].innerHTML = `${bookingButtons[i].value} - ${codeToTime[timeCode]}`;
        }
    }
}
function calculatePrice() {
    var totalPrice = 0;
    for (let i = 0; i < seatOptions.length; i++) {
        if (seatOptions[i].value === '') continue;
        if (selectedDay === 'MON' ||
            selectedDay === 'WED' ||
            (weekdays.indexOf(selectedDay) != -1 && selectedTime === 'T12')) {
            totalPrice += priceList[seatOptions[i].id][1] * seatOptions[i].value;
        }
        else {
            totalPrice += priceList[seatOptions[i].id][0] * seatOptions[i].value;
        }
    }
    document.getElementById('price-display').innerHTML = `Total $${totalPrice.toFixed(2)}`;
}