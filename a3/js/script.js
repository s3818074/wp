const bar = document.getElementById("nav-bar");
const navLinks = document.getElementsByClassName("nav-link");
const nav_height = document.getElementsByTagName('nav')[0].clientHeight;
var sectionOffset = []
for (let i = 0; i < navLinks.length; i++) {
    let href = navLinks[i].href;
    var id = href.slice(href.lastIndexOf("#") + 1, href.length);
    console.log(document.getElementById(id).offsetTop);
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
const movieInfo =
{
    ACT: {
        title: 'Avengers: Endgame',
        rating: 'PG-13',
        src: 'https://www.youtube.com/embed/TcMBFSGVi1c',
        plot: `After the devastating events of Avengers: Infinity War (2018), the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos's actions and undo the chaos to the universe, no matter what consequences may be in store, and no matter who they face...`,
        time: {
            MON: '', TUE: '', WED: 'T21', THU: 'T21', FRI: 'T21', SAT: 'T18', SUN: 'T18'
        }
    },
    RMC: {
        title: 'Top End Wedding',
        rating: 'M',
        src: 'https://www.youtube.com/embed/uoDBvGF9pPU',
        plot: `From the makers of The Sapphires, TOP END WEDDING is a celebration of love, family and belonging, set against the spectacular natural beauty of the Northern Territory. This heartwarming romantic comedy tells the story of successful Adelaide lawyer Lauren (Tapsell) and her fiancé Ned (Lee). Engaged and in love, they have just ten days to pull off their dream Top End Wedding. First though, they need track down Lauren's mother, who has gone AWOL somewhere in the Northern Territory.`,
        time: {
            MON: 'T18', TUE: 'T18', WED: '', THU: '', FRI: '', SAT: 'T15', SUN: 'T15'
        }
    },
    ANM: {
        title: 'Dumbo',
        rating: 'PG',
        src: 'https://www.youtube.com/embed/7NiYVoqBt-8',
        plot: `The stork delivers a baby elephant to Mrs. Jumbo, veteran of the circus, but the newborn is ridiculed because of his truly enormous ears and dubbed "Dumbo". After being separated from his mother, Dumbo is relegated to the circus' clown acts; it is up to his only friend, a mouse, to assist Dumbo to achieve his full potential.`,
        time: {
            MON: 'T12', TUE: 'T12', WED: 'T18', THU: 'T18', FRI: 'T18', SAT: 'T12', SUN: 'T12'
        }
    },
    AHF: {
        title: 'The Happy Prince',
        src: 'https://www.youtube.com/embed/tXANCJQkUIE',
        plot: 'The untold story of the last days in the tragic times of Oscar Wilde, a person who observes his own failure with ironic distance and regards the difficulties that beset his life with detachment and humor.',
        rating: 'R',
        time: {
            MON: '', TUE: '', WED: 'T12', THU: 'T12', FRI: 'T12', SAT: 'T21', SUN: 'T21'
        }
    }
}
const movieList = document.getElementsByClassName("movie-panel");
const bookingButtons = document.getElementsByClassName("time-booking");
const seatOptions = document.getElementsByClassName('seat-option');
const daysInWeek = ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'];
const weekdays = ['MON', 'TUE', 'WED', 'THU', 'FRI']
const codeToTime = { '': '', T12: '12PM', T15: '3PM', T18: '6PM', T21: '9PM' }
const discountPrice = { STA: 14.00, STP: 12.50, STC: 11.00, FCA: 24.00, FCP: 22.50, FCC: 21.00 }
const fullPrice = { STA: 19.80, STP: 17.50, STC: 15.30, FCA: 30.00, FCP: 27.00, FCC: 24.00 }
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
    var price = 0;
    for (let i = 0; i < seatOptions.length; i++) {
        if (seatOptions[i].value === '') continue;
        if (selectedDay === 'MON' ||
            selectedDay === 'WED' ||
            (weekdays.indexOf(selectedDay) != -1 && selectedTime === 'T12')) {
            price += discountPrice[seatOptions[i].id] * seatOptions[i].value;
        }
        else {
            price += fullPrice[seatOptions[i].id] * seatOptions[i].value;
        }
    }
    document.getElementById('total-price').innerHTML = `Total $${price.toFixed(2)}`;
}