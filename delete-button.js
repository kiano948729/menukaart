// delete-button.js
class DeleteButton extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: 'open' });
    }

    connectedCallback() {
        // item-id aanroepen voor specefiek item en de actie voor delete
        const itemId = this.getAttribute('item-id');
        const action = this.getAttribute('action') || 'deleteItem.php';

        this.shadowRoot.innerHTML = `
<!--extra melding als je iets wil verwijderen-->
            <form method="POST" action="${action}" onsubmit="return confirm('Weet je zeker dat je dit item wilt verwijderen?');">
                <input type="hidden" name="delete_item_id" value="${itemId}">
                <button type="submit" style="color: red;">Verwijder</button>
            </form>
        `;
    }
}

customElements.define('delete-button', DeleteButton);
