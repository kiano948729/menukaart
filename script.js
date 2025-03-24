document.addEventListener("DOMContentLoaded", function () {
    // Zorg ervoor dat de eerste tab automatisch opent
    const firstTabLink = document.querySelector(".menuLinks");
    if (firstTabLink) firstTabLink.click();
    updateCartDOM();
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

    const cartItemsList = document.getElementById("cart-items"); // Winkelwagen UL
    const increaseButtons = document.querySelectorAll(".increase-btn");
    const decreaseButtons = document.querySelectorAll(".decrease-btn");

    // Winkelwagen object
    const cart = {};

    // Plus-knop Functionaliteit
    increaseButtons.forEach(button => {
        button.addEventListener("click", function () {
            const itemName = button.dataset.name;
            const itemPrice = parseFloat(button.dataset.price); // Zorg ervoor dat je een numerieke prijs hebt
            const quantityElement = document.querySelector(`.item-quantity[data-name="${itemName}"]`);
            const stockElement = document.querySelector(`.item-stock[data-name="${itemName}"]`);

            let quantity = parseInt(quantityElement.textContent, 10);
            let stock = parseInt(stockElement.textContent, 10);

            // Controleer of er voorraad is
            if (stock > 0) {
                // Update voorraad en hoeveelheid
                quantity++;
                stock--;
                quantityElement.textContent = quantity;
                stockElement.textContent = stock;

                // Voeg product toe aan winkelwagen of update hoeveelheid
                if (cart[itemName]) {
                    cart[itemName].quantity++;
                    cart[itemName].totalPrice += itemPrice; // Total prijs bijwerken
                } else {
                    cart[itemName] = {
                        name: itemName,
                        price: itemPrice,
                        quantity: 1,
                        totalPrice: itemPrice // Bij een enkel item is de prijs gelijk aan de totale prijs
                    };
                }

                // Update winkelwagen DOM
                updateCartDOM();
            } else {
                alert("Niet genoeg voorraad beschikbaar!");
            }
        });
    });

    // Min-knop Functionaliteit
    // Min-knop Functionaliteit

    decreaseButtons.forEach(button => {
        button.addEventListener("click", function () {
            const itemName = button.dataset.name;
            const quantityElement = document.querySelector(`.item-quantity[data-name="${itemName}"]`);
            const stockElement = document.querySelector(`.item-stock[data-name="${itemName}"]`);

            // Haal huidige voorraad en hoeveelheid uit DOM
            let quantity = parseInt(quantityElement.textContent, 10);
            let stock = parseInt(stockElement.textContent, 10);

            // Controleer of er daadwerkelijk een item in de winkelwagen zit
            if (cart[itemName] && cart[itemName].quantity > 0) {
                // Verminder hoeveelheid en verhoog voorraad
                quantity--;
                stock++;

                // Werk de hoeveelheden bij in het winkelwagen object
                cart[itemName].quantity--;

                // Verwijder het item als de hoeveelheid 0 is
                if (cart[itemName].quantity === 0) {
                    delete cart[itemName];
                }

                // Update DOM elementen
                quantityElement.textContent = quantity; // Update visuele hoeveelheid
                stockElement.textContent = stock; // Update visuele voorraad

                // Update winkelwagen in de DOM
                updateCartDOM();
            } else {
                alert("Geen items meer in het winkelwagentje om te verwijderen.");
            }
        });
    });

    // Winkelwagen DOM Bijwerken
    function updateCartDOM() {
        cartItemsList.innerHTML = ""; // Leeg de UL
        if(Object.keys(cart).length === 0) return (
            cartItemsList.innerHTML = "<li class='img-no-items'><img src='/img/Ontwerp zonder titel (6).png' alt='foto' class='no-items-img'></li><li>Je hebt nog geen items in je winkelwagen.</li>"
        )

        for (const itemName in cart) {
            const cartItem = cart[itemName];

            // Winkelwagen item + Delete-knop
            const li = document.createElement("li");
            li.innerHTML = `
            ${cartItem.name} - Aantal: ${cartItem.quantity} - Prijs: €${cartItem.totalPrice.toFixed(2)}
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
                const quantityElement = document.querySelector(`.item-quantity[data-name="${itemName}"]`);

                if (cart[itemName]) {
                    // Verhoog voorraad
                    let quantity = parseInt(quantityElement.textContent, 10);
                    let stock = parseInt(stockElement.textContent, 10);
                    stock += cart[itemName].quantity;
                    stockElement.textContent = stock;
                    quantity = 0;
                    quantityElement.textContent = quantity;
                    stockElement.textContent = stock;

                    // Verwijder item volledig uit winkelwagen
                    delete cart[itemName];
                    // Update DOM winkelwagen
                    updateCartDOM();
                }
            });
        });
    }
document.addEventListener("DOMContentLoaded", function () {
    const numberNavItems = document.querySelectorAll(".main-number-nav > div");
    const sections = document.querySelectorAll(".main-number-nav-text > div");
    let currentIndex = 0;

    // Begin standaard met de eerste zichtbaar en actief
    numberNavItems[currentIndex].classList.add("active");
    sections.forEach((section, index) => {
        section.style.display = index === 0 ? "block" : "none";
    });

    function showNextSection() {
        // Verberg huidige sectie en verwijder actieve status voor nummer
        sections[currentIndex].style.display = "none";
        numberNavItems[currentIndex].classList.remove("active");

        // Ga naar de volgende sectie (of reset naar de eerste)
        currentIndex = (currentIndex + 1) % sections.length;

        // Toon de volgende sectie en voeg actieve status toe aan nummer
        sections[currentIndex].style.display = "block";
        numberNavItems[currentIndex].classList.add("active");
    }

    // Wissel elke 4 seconden naar de volgende sectie en nummer
    setInterval(showNextSection, 4000);
});
