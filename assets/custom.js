function showOption() {
  const selectedOption = document.getElementById("programOption").value;
  const hiddenOption1 = document.getElementById("option1");
  const hiddenOption2 = document.getElementById("option2");
  const hiddenOption3 = document.getElementById("option3");
  const hiddenOption4 = document.getElementById("option4");

  if (selectedOption == "Masters Degree Programme") {
    hiddenOption1.style.display = "block";
  } else {
    hiddenOption1.style.display = "none";
  }

  if (selectedOption == "Basic Degree Programme") {
    hiddenOption2.style.display = "block";
  } else {
    hiddenOption2.style.display = "none";
  }

  if (selectedOption == "Diploma Programme") {
    hiddenOption3.style.display = "block";
  } else {
    hiddenOption3.style.display = "none";
  }

  if (selectedOption == "Certificate Course") {
    hiddenOption4.style.display = "block";
  } else {
    hiddenOption4.style.display = "none";
  }
}
