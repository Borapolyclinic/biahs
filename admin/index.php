<?php include('includes/header.php') ?>
<div class="container form-container">
    <?php

    require('includes/connection.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if (isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"] === "true") {
        echo "Redirecting to dashboard...";
        header("location:dashboard.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_contact = mysqli_real_escape_string($connection, $_POST['user_contact']);
        $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);

        if (empty($user_contact)) {
            echo "<div class='alert alert-danger w-50' role='alert'>Please enter Registered Mobile Number </div>";
        } else if (empty($user_password)) {
            echo "<div class='alert alert-danger w-50' role='alert'>
                Please enter Password
            </div>";
        } else {
            try {
                $search_user_query = "SELECT * FROM `bora_users` WHERE `user_contact` = '$user_contact'";
                $search_user_result = mysqli_query($connection, $search_user_query);
                $search_user_count = mysqli_num_rows($search_user_result);

                if ($search_user_count == 1) {
                    while ($row = mysqli_fetch_assoc($search_user_result)) {
                        if (password_verify($user_password, $row['user_password'])) {
                            setcookie("loggedin", "true", time() + (86400 * 30), "/");
                            setcookie("user_id", $user_contact, time() + (86400 * 30), "/");
                            setcookie("user_type", $row['user_type'], time() + (86400 * 30), "/");
                            if ($row['user_type'] == 2) {
                                $login_time = date('Y-m-d H:i:s');
                                $user_contact = $row['user_id'];

                                $insert_activity_query = "INSERT INTO `bora_user_activity_tracker` (`activity_tracker_user_contact`, `activity_tracker_time`) VALUES ('$user_contact', '$login_time')";
                                mysqli_query($connection, $insert_activity_query);
                            }
                            header("location:dashboard.php");
                        } else {
                            echo "<div class='alert alert-danger w-50' role='alert'>Invalid Password!</div>";
                        }
                    }
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
    ?>

    <form class="login-form" method="POST" action="">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Registered Mobile Number</label>
            <input type="number" name="user_contact" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="user_password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="submit" class="btn btn-outline-success w-100">Login</button>
    </form>
</div>

<?php include('includes/footer.php') ?>