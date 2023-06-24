let logoutTimer;

function startLogoutTimer() {
  logoutTimer = setTimeout(logoutUser, 600000);
}

function resetLogoutTimer() {
  clearTimeout(logoutTimer);
  startLogoutTimer();
}

function logoutUser() {
  // Perform logout actions here
  // For example, redirecting the user to a logout page:
  window.location.href = "logout.php";
}

// Call startLogoutTimer whenever the user logs in or the page loads
startLogoutTimer();

// Call resetLogoutTimer on user activity
document.addEventListener("mousemove", resetLogoutTimer);
document.addEventListener("mousedown", resetLogoutTimer);
document.addEventListener("keydown", resetLogoutTimer);

function hideInputField() {
  var addressCheckBox = document.getElementById("addressCheckBox");
  var inputField = document.getElementById("communicationAddress");

  if (addressCheckBox.checked) {
    inputField.style.display = "none";
  } else {
    inputField.style.display = "block";
  }
}

function getInput() {
  const inputField = document.getElementById("myInput");
  const outputDiv = document.getElementById("output");

  inputField.addEventListener("input", function () {
    outputDiv.textContent = "₹" + inputField.value;
  });
}

// Get references to the input fields and the output divs
const collectingAmountInput = document.getElementById("collectingAmount");
const discountInput = document.getElementById("discount");
const outputDiv = document.getElementById("output");
const differenceDiv = document.getElementById("difference");

// Add event listeners to the input fields
collectingAmountInput.addEventListener("input", calculateAmount);
discountInput.addEventListener("input", calculateAmount);

function calculateAmount() {
  // Get the values from the input fields
  const collectingAmount = parseFloat(collectingAmountInput.value) || 0;
  const discount = parseFloat(discountInput.value) || 0;

  // Perform the subtraction
  const calculatedAmount = collectingAmount - discount;

  // Calculate the difference
  const difference = collectingAmount - calculatedAmount;

  // Update the content of the output divs
  // outputDiv.textContent = "Grand Total: " + "₹" + calculatedAmount;
  // differenceDiv.textContent = "Discount: " + "₹" + difference;

  outputDiv.textContent = "₹" + calculatedAmount;
  differenceDiv.textContent = "₹" + difference;
}

function handleCheckboxChange(checkbox) {
  // Hide all input fields by default
  document.getElementById("paymentIdField").style.display = "none";
  document.getElementById("chequeFields").style.display = "none";
  // document.getElementById("ddNumberField").style.display = "none";

  if (checkbox.checked) {
    switch (checkbox.value) {
      case "cash":
        // No additional fields to show for Cash option
        break;
      case "cheque":
        document.getElementById("chequeFields").style.display = "block";
        break;
      case "online":
        document.getElementById("paymentIdField").style.display = "block";
        break;
      // case "DemandDraft":
      //   document.getElementById("ddNumberField").style.display = "block";
      //   break;
    }
  }
}

function showFields(showId, hideId) {
  var showElement = document.getElementById(showId);
  var hideElement = document.getElementById(hideId);

  showElement.style.display = "block";
  hideElement.style.display = "none";

  // Uncheck the radio button in the hideElement
  var hideRadioButtons = hideElement.querySelectorAll('input[type="radio"]');
  for (var i = 0; i < hideRadioButtons.length; i++) {
    hideRadioButtons[i].checked = false;
  }
}
