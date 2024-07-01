function logout() {
  var confirmation = confirm("Are you sure you want to log out?");
  if (confirmation) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/auth/logout.php", true);
    xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        window.location.href = "../?logout=success";
      }
    };
    xhr.send();
  }
}

document.addEventListener("DOMContentLoaded", function () {
  function animateValue(
    element,
    start,
    end,
    duration,
    isPercentage = false,
    isWholeNumber = false
  ) {
    let startTimestamp = null;
    const step = (timestamp) => {
      if (!startTimestamp) startTimestamp = timestamp;
      const progress = Math.min((timestamp - startTimestamp) / duration, 1);
      let currentValue = progress * (end - start) + start;
      if (isWholeNumber) {
        currentValue = Math.round(currentValue);
      }
      element.innerHTML = isPercentage
        ? currentValue.toFixed(2) + "%"
        : isWholeNumber
        ? currentValue
        : "₱" + currentValue.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
      if (progress < 1) {
        window.requestAnimationFrame(step);
      }
    };
    window.requestAnimationFrame(step);
  }

  function parseValue(text) {
    return parseFloat(text.replace(/[^\d.-]/g, ""));
  }

  // Animate counter
  let counterElement = document.getElementById("counter");
  let totalSales = parseValue(counterElement.textContent);
  animateValue(counterElement, 0, totalSales, 500);

  // Animate table numeric values and percentages
  let numericElements = document.querySelectorAll(".numeric-value");
  numericElements.forEach(function (element) {
    let endValue = parseValue(element.textContent);
    let isPercentage = element.textContent.includes("%");
    let isWholeNumber = element
      .closest(".box")
      .querySelector("h5")
      .textContent.includes("Total Items Sold");
    animateValue(element, 0, endValue, 500, isPercentage, isWholeNumber);
  });
});
