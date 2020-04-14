var bar = document.getElementById("nav-bar");
var sticky = bar.offsetTop;

var stick = () => {
  if (window.pageYOffset > sticky) {
    bar.classList.add("sticky");
  } else {
    bar.classList.remove("sticky");
  }
}
window.onscroll = stick;