<div class="container form-container">
    <?php
    require('includes/connection.php');
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: dashboard.php");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_contact = $_POST['user_contact'];
        $user_password = $_POST['user_password'];

        if (empty($user_contact)) { ?>
            <div class="alert alert-danger w-50" role="alert">
                Please enter Registered Mobile Number
            </div>
        <?php
        } else if (empty($user_password)) { ?>
            <div class="alert alert-danger w-50" role="alert">
                Please enter Password
            </div>
            <?php
        } else {
            $search_user_query = "SELECT * FROM `bora_users` WHERE `user_contact` = '$user_contact'";
            $search_user_result = mysqli_query($connection, $search_user_query);
            $search_user_count = mysqli_num_rows($search_user_result);

            if ($search_user_count == 1) {
                while ($row = mysqli_fetch_assoc($search_user_result)) {
                    if (password_verify($user_password, $row['user_password'])) {
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['user_id'] = $user_contact;
                        $_SESSION['user_type'] = $user['user_type'];
                        header("location: dashboard.php");
                    } else { ?>
                        <div class="alert alert-danger w-50" role="alert">
                            Invalid Password!
                        </div>
    <?php }
                }
            }
        }
    }
    ?>
    <form class="login-form" method="POST" action="">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Registered Mobile Number</label>
            <input type="number" name="user_contact" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="user_password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="submit" class="btn btn-outline-success w-100">Login</button>
    </form>


    <!-- <div class="login-developer-footer">
        <p>&#169; Copyright Bora Institute of Allied Health Sciences | Designed & Developed by <a
                href="https://onlynus.com" target="_bank"> Onlyn</a></p>
    </div> -->
</div>