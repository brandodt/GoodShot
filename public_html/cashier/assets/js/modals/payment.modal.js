// Path: public_html/cashier/index.php
document.addEventListener('DOMContentLoaded', (event) => {
    const modalLink = document.querySelector('#payment-modal-button');
    // const cancelButton = document.querySelector('.modal-card-foot .button');
    const closeButton = document.querySelector('#close-payment');
    const modal = document.querySelector('#payment-modal-content');

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

function updateCashAmount(value) {
    var cashAmountInput = document.querySelector('input[name="cashAmount"]');
    if (cashAmountInput.value === '0' || cashAmountInput.value === '00') {
        if (value !== '0') {
            cashAmountInput.value = value;
        }
    } else {
        cashAmountInput.value += value;
    }
}

function clearCashAmount() {
    var cashAmountInput = document.querySelector('input[name="cashAmount"]');
    cashAmountInput.value = 0;
}