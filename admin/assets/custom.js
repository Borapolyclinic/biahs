function hideInputField() {
  var addressCheckBox = document.getElementById("addressCheckBox");
  var inputField = document.getElementById("communicationAddress");

  if (addressCheckBox.checked) {
    inputField.style.display = "none";
  } else {
    inputField.style.display = "block";
  }
}
