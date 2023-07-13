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
        // $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);

        function generateOTP()
        {
            $otp = rand(100000, 999999);
            return $otp;
        }
        $otp = generateOTP();

        if (empty($user_contact)) {
            echo "<div class='alert alert-danger w-50' role='alert'>Please enter Registered Mobile Number </div>";
        }
        // else if (empty($user_password)) {
        //     echo "<div class='alert alert-danger w-50' role='alert'>
        //         Please enter Password
        //     </div>";
        // } 
        else {
            try {
                $search_user_query = "SELECT * FROM `bora_users` WHERE `user_contact` = '$user_contact'";
                $search_user_result = mysqli_query($connection, $search_user_query);
                $search_user_count = mysqli_num_rows($search_user_result);

                if ($search_user_count == 1) {
                    $curl = curl_init();
                    $numberList = json_encode(array("$user_contact"));
                    $message = json_encode("Your (Powered by Edumarc Technologies) OTP for verification is: $OTP. Code is valid for 2 minutes. OTP is confidential, refrain from sharing it with anyone.");
                    $senderId = json_encode("EDUMRC");
                    $apikey = json_encode("clk13ncuw0004v9qx5gb14egr");
                    $templateId = json_encode("1707167291733893032");



                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://smsapi.edumarcsms.com/api/v1/sendsms",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => "{\n\"apikey\":$apikey ,\n\"number\":$numberList,\n\"message\":$message,\n\"senderId\": $senderId,\n\"templateId\": $templateId\n}",
                        CURLOPT_HTTPHEADER => array(
                            "content-type: application/json",
                        ),
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                        echo "CURL Error #:" . $err;
                    } else {
                        echo $response;
                    }

                    // while ($row = mysqli_fetch_assoc($search_user_result)) {
                    //     if (password_verify($user_password, $row['user_password'])) {
                    //         setcookie("loggedin", "true", time() + (86400 * 30), "/");
                    //         setcookie("user_id", $user_contact, time() + (86400 * 30), "/");
                    //         setcookie("user_type", $row['user_type'], time() + (86400 * 30), "/");
                    //         if ($row['user_type'] == 2) {
                    //             $login_time = date('Y-m-d H:i:s');
                    //             $user_contact = $row['user_id'];

                    //             $insert_activity_query = "INSERT INTO `bora_user_activity_tracker` (`activity_tracker_user_contact`, `activity_tracker_time`) VALUES ('$user_contact', '$login_time')";
                    //             mysqli_query($connection, $insert_activity_query);
                    //         }
                    //         header("location:dashboard.php");
                    //     } else {
                    //         echo "<div class='alert alert-danger w-50' role='alert'>Invalid Password!</div>";
                    //     }
                    // }
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
        <!-- <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <div class="password-textbox-row">
                <input type="password" name="user_password" class="form-control password-input-box"
                    id="exampleInputPassword1">
                <button type="button" id="unlockButton" class="password-button" style="display: none;">
                    <ion-icon name="lock-open-outline"></ion-icon>
                </button>
                <button type="button" id="lockButton" class="password-button">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                </button>
            </div>
        </div> -->
        <button type="submit" name="submit" class="btn btn-outline-success w-100">Login</button>
    </form>
</div>

<script>
const unlockButton = document.getElementById('unlockButton');
const lockButton = document.getElementById('lockButton');
const passwordInput = document.getElementById('exampleInputPassword1');

lockButton.addEventListener('click', function() {
    passwordInput.type = 'text';
    lockButton.style.display = 'none';
    unlockButton.style.display = 'block';
});

unlockButton.addEventListener('click', function() {
    passwordInput.type = 'password';
    unlockButton.style.display = 'none';
    lockButton.style.display = 'block';
});

// Hide the password initially
passwordInput.type = 'password';
</script>

<?php include('includes/footer.php') ?>