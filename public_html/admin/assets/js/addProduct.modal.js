document.addEventListener("DOMContentLoaded", (event) => {
  const modalLink = document.querySelector("#addProduct-modal-button");
  const closeButton = document.querySelector("#close-modal-addProduct");
  const modal = document.querySelector("#addProduct-modal-content");

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
