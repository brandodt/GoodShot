// Path: public_html/public/cashier/index.php
document.addEventListener('DOMContentLoaded', (event) => {
    const modalLink = document.querySelector('#search-modal-button');
    // const cancelButton = document.querySelector('.modal-card-foot .button');
    const closeButton = document.querySelector('.modal-card-head .delete');
    const modal = document.querySelector('#search-modal-content');

    const closeModal = () => {
        modal.classList.remove('is-active');
    };

    const openModal = () => {
        modal.classList.add('is-active');
    };

    modalLink.addEventListener('click', openModal);
    // cancelButton.addEventListener('click', closeModal);
    closeButton.addEventListener('click', closeModal);
});