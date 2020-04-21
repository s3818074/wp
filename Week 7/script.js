var patt = /^c[a-f]{1,2}$/;
var input = document.getElementById("name");
var message = document.getElementById("message");
input.addEventListener("input",validate);
function validate() {
    if (patt.test(input.value)) {
        message.innerHTML = "Correct";
    }
    else {
        message.innerHTML = "Invalid";
    }
}

