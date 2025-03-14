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
document.addEventListener("DOMContentLoaded", function () {
    const cartItemsList = document.getElementById("cart-items"); // Winkelwagen UL
    const increaseButtons = document.querySelectorAll(".increase-btn");
    const decreaseButtons = document.querySelectorAll(".decrease-btn");

    // Winkelwagen object
    const cart = {};

    // Plus-knop Functionaliteit
    increaseButtons.forEach(button => {
        button.addEventListener("click", function () {
            const itemName = button.dataset.name;
            const itemPrice = button.dataset.price;
            const stockElement = document.querySelector(`.item-stock[data-name="${itemName}"]`);

            let stock = parseInt(stockElement.textContent, 10);

            // Controleer of er voorraad is
            if (stock > 0) {
                // Update voorraad
                stock--;
                stockElement.textContent = stock;

                // Voeg item toe aan winkelwagen of verhoog hoeveelheid
                if (cart[itemName]) {
                    cart[itemName].quantity++;
                } else {
                    cart[itemName] = {
                        name: itemName,
                        price: parseFloat(itemPrice),
                        quantity: 1
                    };
                }

                // Update de Winkelwagen in de DOM
                updateCartDOM();
            } else {
                alert("Niet genoeg voorraad beschikbaar!");
            }
        });
    });

    // Min-knop Functionaliteit
    decreaseButtons.forEach(button => {
        button.addEventListener("click", function () {
            const itemName = button.dataset.name;
            const stockElement = document.querySelector(`.item-stock[data-name="${itemName}"]`);

            if (cart[itemName] && cart[itemName].quantity > 0) {
                // Verminder hoeveelheid
                cart[itemName].quantity--;

                // Verhoog voorraad
                let stock = parseInt(stockElement.textContent, 10);
                stock++;
                stockElement.textContent = stock;

                // Verwijder item uit winkelwagen als hoeveelheid 0 is
                if (cart[itemName].quantity === 0) {
                    delete cart[itemName];
                }

                // Update DOM winkelwagen
                updateCartDOM();
            } else {
                alert("Geen items meer in het winkelwagentje om te verwijderen.");
            }
        });
    });

    // Winkelwagen DOM Bijwerken
    function updateCartDOM() {
        cartItemsList.innerHTML = ""; // Leeg de UL

        for (const itemName in cart) {
            const cartItem = cart[itemName];

            // Winkelwagen item + Delete-knop
            const li = document.createElement("li");
            li.innerHTML = `
                ${cartItem.name} - Aantal: ${cartItem.quantity} - Prijs: €${(cartItem.price * cartItem.quantity).toFixed(2)}
                <button class="delete-btn" data-name="${cartItem.name}">Verwijder</button>
            `;

            cartItemsList.appendChild(li);
        }

        // Voeg eventlistener toe aan nieuwe verwijderknoppen
        addDeleteEventListeners();
    }

    // Delete-knoppen Functionaliteit
    function addDeleteEventListeners() {
        const deleteButtons = document.querySelectorAll(".delete-btn");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function () {
                const itemName = button.dataset.name;
                const stockElement = document.querySelector(`.item-stock[data-name="${itemName}"]`);

                if (cart[itemName]) {
                    // Verhoog voorraad
                    let stock = parseInt(stockElement.textContent, 10);
                    stock += cart[itemName].quantity;
                    stockElement.textContent = stock;

                    // Verwijder item volledig uit winkelwagen
                    delete cart[itemName];

                    // Update DOM winkelwagen
                    updateCartDOM();
                }
            });
        });
    }
});
