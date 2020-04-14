var displayDate = () => {
    document.getElementById("dd-text").value = new Date();
}
document.getElementById("dd-button").onclick=displayDate
document.getElementById("copyright").innerHTML+= new Date().getFullYear();