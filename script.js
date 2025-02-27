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
    // Hier kun je een redirect of AJAX-aanroep doen naar de juiste categoriepagina
    console.log("Categorie geopend: " + categoryName);
}
function openCategory(categoryName) {
    // Zoek de juiste div met items en toggle de display
    const alcoholItems = document.getElementById("alcoholItems");
    if (alcoholItems) {
        alcoholItems.style.display = 'block'; // Laat de items zien
    }

    // Hier kun je verdere acties toevoegen, zoals AJAX-aanroepen om items dynamisch te laden
}
