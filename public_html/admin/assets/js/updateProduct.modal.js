document.addEventListener("DOMContentLoaded", (event) => {
  const modalLink = document.querySelector("#updateProd-modal-button");
  const closeButton = document.querySelector("#close-modal-updateProd");
  const modal = document.querySelector("#updateProd-modal-content");

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
