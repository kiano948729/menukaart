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
document.addEventListener("DOMContentLoaded", function () {
    // Selecteer alle increase en decrease knoppen
    const increaseButtons = document.querySelectorAll(".increase-btn");
    const decreaseButtons = document.querySelectorAll(".decrease-btn");

    // Eventlisteners voor verhogen/verlagen
    increaseButtons.forEach(button => {
        button.addEventListener("click", function () {
            const itemName = button.dataset.name;
            const quantityElement = document.querySelector(`.item-quantity[data-name="${itemName}"]`);
            const stockElement = document.querySelector(`.item-stock[data-name="${itemName}"]`);

            let quantity = parseInt(quantityElement.textContent, 10);
            let stock = parseInt(stockElement.textContent, 10);

            if (stock > 0) {
                quantity++;
                stock--;
                quantityElement.textContent = quantity;
                stockElement.textContent = stock;
            }
        });
    });

    decreaseButtons.forEach(button => {
        button.addEventListener("click", function () {
            const itemName = button.dataset.name;
            const quantityElement = document.querySelector(`.item-quantity[data-name="${itemName}"]`);
            const stockElement = document.querySelector(`.item-stock[data-name="${itemName}"]`);

            let quantity = parseInt(quantityElement.textContent, 10);
            let stock = parseInt(stockElement.textContent, 10);

            if (quantity > 0) {
                quantity--;
                stock++;
                quantityElement.textContent = quantity;
                stockElement.textContent = stock;
            }
        });
    });
});

