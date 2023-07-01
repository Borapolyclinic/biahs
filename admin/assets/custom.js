let logoutTimer;
function startLogoutTimer() {
  logoutTimer = setTimeout(logoutUser, 600000);
}
function resetLogoutTimer() {
  clearTimeout(logoutTimer);
  startLogoutTimer();
}
function logoutUser() {
  window.location.href = "logout.php";
}
startLogoutTimer();
document.addEventListener("mousemove", resetLogoutTimer);
document.addEventListener("mousedown", resetLogoutTimer);
document.addEventListener("keydown", resetLogoutTimer);

function getInput() {
  const inputField = document.getElementById("myInput");
  const outputDiv = document.getElementById("output");
  inputField.addEventListener("input", function () {
    outputDiv.textContent = "₹" + inputField.value;
  });
}

const collectingAmountInput = document.getElementById("collectingAmount");
const discountInput = document.getElementById("discount");
const outputDiv = document.getElementById("output");
const differenceDiv = document.getElementById("difference");
collectingAmountInput.addEventListener("input", calculateAmount);
discountInput.addEventListener("input", calculateAmount);

function calculateAmount() {
  const collectingAmount = parseFloat(collectingAmountInput.value) || 0;
  const discount = parseFloat(discountInput.value) || 0;
  const calculatedAmount = collectingAmount - discount;
  const difference = collectingAmount - calculatedAmount;
  outputDiv.textContent = "₹" + calculatedAmount;
  differenceDiv.textContent = "₹" + difference;
}

function handleCheckboxChange(checkbox) {
  document.getElementById("paymentIdField").style.display = "none";
  document.getElementById("chequeFields").style.display = "none";
  if (checkbox.checked) {
    switch (checkbox.value) {
      case "cash":
        break;
      case "cheque":
        document.getElementById("chequeFields").style.display = "block";
        break;
      case "online":
        document.getElementById("paymentIdField").style.display = "block";
        break;
    }
  }
}

function showFields(showId, hideId) {
  var showElement = document.getElementById(showId);
  var hideElement = document.getElementById(hideId);
  showElement.style.display = "block";
  hideElement.style.display = "none";
  var hideRadioButtons = hideElement.querySelectorAll('input[type="radio"]');
  for (var i = 0; i < hideRadioButtons.length; i++) {
    hideRadioButtons[i].checked = false;
  }
}
