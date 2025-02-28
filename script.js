document.addEventListener("DOMContentLoaded", function () {
    // Zorg ervoor dat de eerste tab automatisch opent
    const firstTabLink = document.querySelector(".menuLinks");
    if (firstTabLink) firstTabLink.click();
});

function openTab(evt, tabName) {
    const tabcontentWork = document.getElementsByClassName("tabcontentWork");
    for (let i = 0; i < tabcontentWork.length; i++) {
        tabcontentWork[i].style.display = "none";
    }

    const worklinks = document.getElementsByClassName("menuLinks");
    for (let i = 0; i < worklinks.length; i++) {
        worklinks[i].classList.remove("active");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");
}
function openCategory(categoryName) {
    // Selecteer alle secties met items
    const itemSections = document.querySelectorAll(".item-section");

    // Loop door alle secties en sluit ze, behalve als ze overeenkomen met de categorie
    itemSections.forEach(section => {
        if (section.id === categoryName + "Items") {
            // Toggle de zichtbaarheid als er opnieuw op wordt geklikt
            section.style.display = section.style.display === 'block' ? 'none' : 'block';
        } else {
            section.style.display = 'none'; // Sluit alle andere secties
        }
    });
}
let counter = document.getElementById('counter');
let increaseButton = document.getElementById('increase');
let decreaseButton = document.getElementById("decrease");
let count = 0;

function functionIncrease() {
    count ++;
    counter.innerHTML = count+"";
}
function functionDecrease() {
    count--;
    counter.innerHTML = count+"";
}
function functionReset() {
    count = 0;
    counter.innerHTML = count+"";
}
increaseButton.addEventListener("click", functionIncrease);
decreaseButton.addEventListener("click", functionDecrease);
