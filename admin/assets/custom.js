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

function handleTabClosure() {
  logoutUser();
}

startLogoutTimer();

document.addEventListener("mousemove", resetLogoutTimer);
document.addEventListener("mousedown", resetLogoutTimer);
document.addEventListener("keydown", resetLogoutTimer);
window.addEventListener("beforeunload", handleTabClosure);

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

function disableInput() {
  var admissionModeSelect = document.getElementById("admissionMode");
  var allotmentLetterInput = document.getElementById("alotLetterFile");

  admissionModeSelect.addEventListener("click", function () {
    if (admissionModeSelect.value === "Direct") {
      allotmentLetterInput.disabled = true;
    } else {
      allotmentLetterInput.disabled = false;
    }
  });
}

function getCategory() {
  var selectedCategory = document.getElementById("selectedCat");
  var castField = document.getElementById("castSection");

  selectedCategory.addEventListener("click", function () {
    if (selectedCategory.value === "General") {
      castField.disabled = true;
    } else {
      castField.disabled = false;
    }
  });
}
