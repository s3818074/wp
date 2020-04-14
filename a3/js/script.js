/* Insert your javascript here */


// nav
const bar = document.getElementById("nav-bar");
const navLinks = document.getElementsByClassName("nav-link");
var sectionOffset = []
for (let i = 0; i < navLinks.length; i++) {
    let href = navLinks[i].href;
    var id = href.slice(href.lastIndexOf("#") + 1, href.length);
    console.log(document.getElementById(id).offsetTop);
    sectionOffset.push(document.getElementById(id).offsetTop - 50);
}
console.log(sectionOffset)
var removeHighlight = (item) => {
    item.classList.remove("highlight");
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
window.onscroll = onScroll;

// synopsis
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
const daysInWeek = ['MON', 'TUE', 'WED', 'THU', 'FRI','SAT','SUN'];
const codeToTime = {'':'',T12:'12PM',T15:'3PM',T18:'6PM',T21:'9PM'}
var selectedMovie = 'ACT';

for (let i = 0; i < movieList.length; i++) {
    movieList[i].addEventListener('click', () => displaysynopsis(movieList[i].id))
}
displaysynopsis('ACT')
function displaysynopsis(id) {
    selectedMovie = movieInfo[id];
    document.getElementById("synopsis-title").innerHTML = selectedMovie['title'];
    document.getElementById("plot-description").innerHTML = selectedMovie['plot'];
    document.getElementById("age-rating").innerHTML = selectedMovie['rating'];
    document.getElementById("trailer").src = selectedMovie['src'];
    for (let i = 0; i < bookingButtons.length; i++) {
        bookingButtons[i].innerHTML = `${daysInWeek[i]} - ${codeToTime[selectedMovie['time'][daysInWeek[i]]]}`
    }
}