<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="index.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Add User</h5>
    </div>
    <form class="add-user-form" method="POST" action="add-user-success.php">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Full Name</label>
            <input type="text" name="user_name" required class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="contactNumber" class="form-label">Contact Number</label>
            <input type="number" name="user_contact" maxlength="10" required class="form-control" id="contactNumber">
        </div>
        <!-- <div class="mb-3">
            <label for="eMail" class="form-label">Email</label>
            <input type="email" name="user_email" required class="form-control" id="eMail">
        </div> -->
        <!-- <div class="mb-3">
            <label for="userPassword" class="form-label">Password</label>
            <input type="password" name="user_password" class="form-control" required id="userPassword"
                onkeyup="checkPassword()">
        </div> -->

        <!-- <ul id="passwordRequirements">
            <li id="passwordLength">Password should be at least 8 characters</li>
            <li id="passwordSpecialChar">Password should have at least 1 special character</li>
            <li id="passwordUppercase">Password should have at least 1 uppercase character</li>
        </ul> -->
        <button type="submit" name="submit" class="btn btn-primary" id="createButton" disabled>Create</button>
    </form>
</div>

<script>
// function checkPassword() {
//     var password = document.getElementById("userPassword").value;
//     var requirements = document.getElementById("passwordRequirements");
//     var passwordLength = document.getElementById("passwordLength");
//     var passwordSpecialChar = document.getElementById("passwordSpecialChar");
//     var passwordUppercase = document.getElementById("passwordUppercase");
//     var createButton = document.getElementById("createButton");

//     // Reset styles
//     requirements.style.color = "";
//     passwordLength.style.textDecoration = "";
//     passwordSpecialChar.style.textDecoration = "";
//     passwordUppercase.style.textDecoration = "";

//     if (password.length >= 8) {
//         passwordLength.style.textDecoration = "line-through";
//     }

//     if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
//         passwordSpecialChar.style.textDecoration = "line-through";
//     }

//     if (/[A-Z]/.test(password)) {
//         passwordUppercase.style.textDecoration = "line-through";
//     }

//     if (password.length >= 8 && /[!@#$%^&*(),.?":{}|<>]/.test(password) && /[A-Z]/.test(password)) {
//         requirements.style.color = "green";
//         createButton.disabled = false;
//     } else {
//         createButton.disabled = true;
//     }
// }
</script>

<?php include('includes/footer.php') ?>