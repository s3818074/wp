/* Insert your javascript here */


// nav
var bar = document.getElementById("nav-bar");
var navLinks = document.getElementsByClassName("nav-link");
var sectionOffset = []
for (let i = 0; i < navLinks.length; i++) {
    let href = navLinks[i].href;
    var id = href.slice(href.lastIndexOf("#") + 1, href.length);
    console.log(document.getElementById(id).offsetTop);
    sectionOffset.push(document.getElementById(id).offsetTop-50);
}
console.log(sectionOffset)
var removeHighlight = (item) =>{
    item.classList.remove("highlight");
}
function onScroll(){
    if (window.pageYOffset > bar.offsetTop) {
        bar.classList.add("sticky");
    } else {
        bar.classList.remove("sticky");
    }
    for (let i = 0;i<navLinks.length;i++)
    {
        navLinks[i].classList.remove("highlight");
    }
    for (let i = sectionOffset.length-1; i >=0;i--) {
        if(window.pageYOffset>=sectionOffset[i])
        {
            navLinks[i].classList.add("highlight");
            break
        }
    }
}
window.onscroll = onScroll;