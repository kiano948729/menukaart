document.addEventListener("DOMContentLoaded", function () {
    const numberNavItems = document.querySelectorAll(".main-number-nav > div");
    const sections = document.querySelectorAll(".main-number-nav-text > div");
    let currentIndex = 0;

    // Begin standaard met de eerste sectie zichtbaar en actief
    function initializeSections() {
        numberNavItems.forEach((item, index) => {
            if (index === 0) {
                item.classList.add("active"); // Maak de eerste navigatie actief
            } else {
                item.classList.remove("active"); // Verwijder actieve status voor anderen
            }
        });

        sections.forEach((section, index) => {
            section.style.display = index === 0 ? "block" : "none"; // Alleen de eerste sectie tonen
        });
    }

    initializeSections();

    // Functie om naar de volgende sectie te gaan
    function showNextSection() {
        // Verberg de huidige sectie en verwijder actieve status van het nummer
        sections[currentIndex].style.display = "none";
        numberNavItems[currentIndex].classList.remove("active");

        // Ga naar de volgende sectie (of reset naar de eerste als aan het einde)
        currentIndex = (currentIndex + 1) % sections.length;

        // Toon de volgende sectie en activeer het bijbehorende nummer
        sections[currentIndex].style.display = "block";
        numberNavItems[currentIndex].classList.add("active");
    }

    // Wissel elke 4 seconden automatisch naar de volgende sectie
    setInterval(showNextSection, 4000);

    // Voeg klikfunctionaliteit toe om handmatig naar een bepaalde sectie te gaan
    numberNavItems.forEach((item, index) => {
        item.addEventListener("click", function () {
            // Verberg huidige sectie en verwijder actieve status
            sections[currentIndex].style.display = "none";
            numberNavItems[currentIndex].classList.remove("active");

            // Update de index naar de aangeklikte sectie
            currentIndex = index;

            // Toon de geklikte sectie en voeg actieve status toe
            sections[currentIndex].style.display = "block";
            numberNavItems[currentIndex].classList.add("active");
        });
    });
});


// Winkelwagen object om items bij te houden
const cart = {};

// Functie om tabs te beheren
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

// Functie om categorieën te tonen of te verbergen
function openCategory(categoryName) {
    const itemSections = document.querySelectorAll(".item-section");

    itemSections.forEach(section => {
        if (section.id === categoryName + "Items") {
            section.style.display = section.style.display === 'block' ? 'none' : 'block';
        } else {
            section.style.display = 'none';
        }
    });
}

// Verhoog de hoeveelheid van een item met de knop
const increaseButtons = document.querySelectorAll(".increase-btn");
increaseButtons.forEach(button => {
    button.addEventListener("click", function () {
        const itemName = button.dataset.name;
        const itemPrice = parseFloat(button.dataset.price) || 0;
        const quantityElement = document.querySelector(`.item-quantity[data-name="${itemName}"]`);
        const stockElement = document.querySelector(`.item-stock[data-name="${itemName}"]`);

        let quantity = parseInt(quantityElement.textContent, 10);
        let stock = parseInt(stockElement.textContent, 10);

        if (stock > 0) {
            // Update de voorraad en hoeveelheid
            quantity++;
            stock--;
            quantityElement.textContent = quantity;
            stockElement.textContent = stock;

            // Werk het cart-object bij
            if (cart[itemName]) {
                cart[itemName].quantity++;
                cart[itemName].totalPrice += itemPrice;
            } else {
                cart[itemName] = {
                    name: itemName,
                    price: itemPrice,
                    quantity: 1,
                    totalPrice: itemPrice
                };
            }

            // Update winkelwagen DOM en totale prijs
            updateCartDOM();
            updateTotalPrice();
        } else {
            alert("Niet genoeg voorraad beschikbaar!");
        }
    });
});

// Verminder hoeveelheid van een item met de knop
const decreaseButtons = document.querySelectorAll(".decrease-btn");
decreaseButtons.forEach(button => {
    button.addEventListener("click", function () {
        const itemName = button.dataset.name;
        const itemPrice = parseFloat(button.dataset.price) || 0;
        const quantityElement = document.querySelector(`.item-quantity[data-name="${itemName}"]`);
        const stockElement = document.querySelector(`.item-stock[data-name="${itemName}"]`);

        let quantity = parseInt(quantityElement.textContent, 10);
        let stock = parseInt(stockElement.textContent, 10);

        if (cart[itemName] && cart[itemName].quantity > 0) {
            // Verminder de hoeveelheid en verhoog de voorraad
            quantity--;
            stock++;
            cart[itemName].quantity--;
            cart[itemName].totalPrice -= itemPrice;

            // Verwijder het item uit de winkelwagen als de hoeveelheid 0 is
            if (cart[itemName].quantity === 0) {
                delete cart[itemName];
            }

            // Werk DOM bij
            quantityElement.textContent = quantity;
            stockElement.textContent = stock;

            updateCartDOM();
            updateTotalPrice();
        }
    });
});

// Verwijder een item volledig met de 'verwijder-knop'
function addRemoveButtonListeners() {
    const removeButtons = document.querySelectorAll(".delete-btn");
    removeButtons.forEach(button => {
        button.addEventListener("click", function () {
            const itemName = button.dataset.name;
            const quantityElement = document.querySelector(`.item-quantity[data-name="${itemName}"]`);
            const stockElement = document.querySelector(`.item-stock[data-name="${itemName}"]`);

            if (cart[itemName]) {
                // Herstel de voorraad naar de oorspronkelijke waarde
                const quantity = cart[itemName].quantity;
                const stock = parseInt(stockElement.textContent, 10) + quantity;

                stockElement.textContent = stock; // Voorraad herstellen
                quantityElement.textContent = "0"; // Hoeveelheid op 0 zetten

                delete cart[itemName]; // Verwijder het item uit de winkelwagen

                // Update de winkelwagen weergave en totale prijs
                updateCartDOM();
                updateTotalPrice();
            }
        });
    });
}

// Functie om de winkelwagen in de DOM bij te werken
function updateCartDOM() {
    const cartItemsList = document.getElementById("cart-items");
    cartItemsList.innerHTML = ""; // Leeg de huidige lijst
    const itemCount = Object.keys(cart).length;

    if (itemCount > 8) {
        alert("Je kan maximaal 8 verschillende items toevoegen aan je winkelmandje.");
    }
    for (const itemName in cart) {
        const item = cart[itemName];
        const li = document.createElement("li");

        li.innerHTML = `
            ${item.name} - €${item.price.toFixed(2)} x ${item.quantity} = €${item.totalPrice.toFixed(2)}
            <button class="delete-btn" data-name="${item.name}">Verwijderen</button>
        `;
        cartItemsList.appendChild(li);
    }

    addRemoveButtonListeners();
}

// Bereken de totale prijs van de winkelwagen
function calculateTotalPrice() {
    let totalPrice = 0;

    for (const itemName in cart) {
        if (cart.hasOwnProperty(itemName)) {
            totalPrice += cart[itemName].totalPrice;
        }
    }

    return totalPrice;
}

// Update de totale prijs in de DOM
function updateTotalPrice() {
    const totalPrice = calculateTotalPrice();
    const totalPriceElement = document.getElementById("total-price");

    if (totalPriceElement) {
        totalPriceElement.textContent = totalPrice > 0
            ? "€" + totalPrice.toFixed(2)
            : "€0,00";
    }
}
function openTab(evt, tabName) {
    const tabcontentWork = document.getElementsByClassName("tabcontentWork");
    for (let i = 0; i < tabcontentWork.length; i++) {
        tabcontentWork[i].style.display = "none"; // Verberg alle tabinhoud
    }

    const worklinks = document.getElementsByClassName("menuLinks");
    for (let i = 0; i < worklinks.length; i++) {
        worklinks[i].classList.remove("active"); // Verwijder de actieve klasse van alle links
    }

    document.getElementById(tabName).style.display = "block"; // Toon de gewenste tab
    evt.currentTarget.classList.add("active"); // Voeg de actieve klasse toe aan de link die is aangeklikt

    // Toon of verberg de 'menu-table-checkout' afhankelijk van de actieve tab
    const checkoutDiv = document.getElementById('menu-table-checkout');
    if (tabName === "third") {
        checkoutDiv.classList.remove('hidden'); // Verwijder 'hidden' class als 'third' actief is
    } else {
        checkoutDiv.classList.add('hidden'); // Voeg 'hidden' class toe als andere tab actief is
    }
}
function ifClicked(element) {
    const buttons = document.querySelectorAll('.payment-click');

    buttons.forEach(btn => btn.classList.remove('active'));

    element.classList.add('active');
}

