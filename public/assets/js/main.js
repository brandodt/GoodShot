// Path: public_html/public/index.php
document.addEventListener('DOMContentLoaded', (event) => {
    const forgetPasswordLink = document.querySelector('#forgetPassword');
    const cancelButton = document.querySelector('.modal-card-foot .button');
    const closeButton = document.querySelector('.modal-card-head .delete');
    const modal = document.querySelector('#passwordModal');

    const closeModal = () => {
        modal.classList.remove('is-active');
    };

    const openModal = () => {
        modal.classList.add('is-active');
    };

    forgetPasswordLink.addEventListener('click', openModal);
    cancelButton.addEventListener('click', closeModal);
    closeButton.addEventListener('click', closeModal);
});

