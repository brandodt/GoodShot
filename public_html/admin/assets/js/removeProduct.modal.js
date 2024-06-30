document.addEventListener("DOMContentLoaded", (event) => {
  const modalLink = document.querySelector("#removeProduct-modal-button");
  const closeButton = document.querySelector("#close-modal-removeProduct");
  const modal = document.querySelector("#removeProduct-modal-content");

  const closeModal = () => {
    modal.classList.remove("is-active");
  };

  const openModal = () => {
    modal.classList.add("is-active");
  };

  modalLink.addEventListener("click", openModal);
  // cancelButton.addEventListener('click', closeModal);
  closeButton.addEventListener("click", closeModal);
});

document.addEventListener("DOMContentLoaded", function () {
  // Select the checkbox and the quantity input
  var checkbox = document.querySelector('input[type="checkbox"]');
  var quantityInput = document.getElementById("quantityInput"); // Make sure to add the id="quantityInput" to your quantity input element

  // Listen for changes on the checkbox
  checkbox.addEventListener("change", function () {
    // If the checkbox is checked, disable the quantity input
    if (checkbox.checked) {
      quantityInput.disabled = true;
    } else {
      // Otherwise, enable it
      quantityInput.disabled = false;
    }
  });
});
