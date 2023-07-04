<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="view-user.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Edit User</h5>
    </div>
    <?php
    require('includes/connection.php');
    if (isset($_POST['update'])) {
        $user_id = $_POST['user_id'];
        $user_name = $_POST['user_name'];
        $user_contact = $_POST['user_contact'];
        $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);
        $encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);

        $update = "UPDATE `bora_users` SET `user_name` = '$user_name', `user_contact` = '$user_contact', `user_password` = '$encrypted_password' WHERE `user_id` = '$user_id'";
        $res = mysqli_query($connection, $update);

        if ($res) { ?>
            <div class="alert alert-success w-100 mt-3 mb-3" role="alert">
                User details updated
            </div>
        <?php
        } else { ?>

            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_ckcn4hvm.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
            <p>Oops! Looks like there was some problem updating this users details.</p>
            <a href="users.php" class="go-back-btn">Go Back</a>
    <?php
        }
    }
    if (isset($_POST['edit'])) {
        $user_id = $_POST['user_id'];

        $query = "SELECT * FROM `bora_users` WHERE `user_id` = '$user_id'";
        $result = mysqli_query($connection, $query);

        $user_name = "";
        $user_contact = "";
        $user_password = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $user_name = $row['user_name'];
            $user_contact = $row['user_contact'];
            $user_password = $row['user_password'];
        }
    }
    ?>
    <form class="add-user-form" method="POST" action="edit-user-confirm.php">
        <input type="text" name="user_id" value="<?php echo $user_id ?>" hidden>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Full Name</label>
            <input type="text" name="user_name" required class="form-control" value="<?php echo $user_name ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="contactNumber" class="form-label">Contact Number</label>
            <input type="number" name="user_contact" maxlength="10" required class="form-control" value="<?php echo $user_contact ?>" id="contactNumber">
        </div>
        <div class="mb-3">
            <label for="userPassword" class="form-label">Password</label>
            <input type="password" name="user_password" value="<?php echo $user_password ?>" class="form-control" required id="userPassword" onkeyup="checkPassword()">
        </div>

        <ul id="passwordRequirements">
            <li id="passwordLength">Password should be at least 8 characters</li>
            <li id="passwordSpecialChar">Password should have at least 1 special character</li>
            <li id="passwordUppercase">Password should have at least 1 uppercase character</li>
        </ul>
        <!-- <button type="submit" name="update" class="btn btn-primary">Update</button> -->
        <button type="submit" name="update" class="btn btn-primary" id="createButton" disabled>Update</button>
    </form>
</div>
<script>
    function checkPassword() {
        var password = document.getElementById("userPassword").value;
        var requirements = document.getElementById("passwordRequirements");
        var passwordLength = document.getElementById("passwordLength");
        var passwordSpecialChar = document.getElementById("passwordSpecialChar");
        var passwordUppercase = document.getElementById("passwordUppercase");
        var createButton = document.getElementById("createButton");

        // Reset styles
        requirements.style.color = "";
        passwordLength.style.textDecoration = "";
        passwordSpecialChar.style.textDecoration = "";
        passwordUppercase.style.textDecoration = "";

        if (password.length >= 8) {
            passwordLength.style.textDecoration = "line-through";
        }

        if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
            passwordSpecialChar.style.textDecoration = "line-through";
        }

        if (/[A-Z]/.test(password)) {
            passwordUppercase.style.textDecoration = "line-through";
        }

        if (password.length >= 8 && /[!@#$%^&*(),.?":{}|<>]/.test(password) && /[A-Z]/.test(password)) {
            requirements.style.color = "green";
            createButton.disabled = false;
        } else {
            createButton.disabled = true;
        }
    }
</script>
<?php include('includes/footer.php') ?>