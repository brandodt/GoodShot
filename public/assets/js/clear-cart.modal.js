// Path: public_html/public/cashier/index.php
document.addEventListener('DOMContentLoaded', (event) => {
    const modalLink = document.querySelector('#clear-cart-modal-button');
    const cancelButton = document.querySelector('#close-clear-cart');
    // const closeButton = document.querySelector('#close-clear-cart');
    const modal = document.querySelector('#clear-cart-modal-content');

    const closeModal = () => {
        modal.classList.remove('is-active');
    };

    const openModal = () => {
        modal.classList.add('is-active');
    };

    modalLink.addEventListener('click', openModal);
    cancelButton.addEventListener('click', closeModal);
    // closeButton.addEventListener('click', closeModal);
});

function confirmClearCart() {
    var password = prompt("Please enter the admin password:");
    if (password === "12345") {
        // clear the cart
    } else {
        alert("Incorrect password.");
    }
}