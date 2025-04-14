// delete-button.js
// Maakt een custom HTML element <delete-button>
class DeleteButton extends HTMLElement {
    constructor() {
        super();
        // Zet shadow DOM aan (gescheiden stijl/structuur)
        // De Shadow DOM is een manier om een stukje HTML, CSS en JavaScript los te koppelen van de rest van je pagina.
        this.attachShadow({ mode: 'open' });
    }

    // Wordt uitgevoerd als het element in de pagina staat
    connectedCallback() {
        // Haalt item-id op uit attribuut
        const itemId = this.getAttribute('item-id');

        // Haalt actie op, standaard is 'deleteItem.php'
        const action = this.getAttribute('action') || 'deleteItem.php';

        // Zet de HTML in de shadow DOM
        this.shadowRoot.innerHTML = `
            <!-- Form met bevestiging voor verwijderen -->
            <form method="POST" action="${action}" 
                onsubmit="return confirm('Weet je zeker dat je dit item wilt verwijderen?');">

                <!-- Verborgen input met het item-id -->
                <input type="hidden" name="delete_item_id" value="${itemId}">
                
                <!-- Verwijderknop -->
                <button type="submit" style="color: red;">Verwijder</button>
            </form>
        `;
    }
}

// Registreert het nieuwe element bij de browser
customElements.define('delete-button', DeleteButton);
