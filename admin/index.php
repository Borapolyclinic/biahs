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

    function generateOTP()
    {
        $otp = rand(100000, 999999);
        return $otp;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_contact = mysqli_real_escape_string($connection, $_POST['user_contact']);

        if (empty($user_contact)) { ?>
            <div class="alert alert-danger w-50" role="alert">
                Please enter Registered Mobile Number
            </div>
    <?php
        } else {
            try {
                $search_user_query = "SELECT * FROM `bora_users` WHERE `user_contact` = '$user_contact'";
                $search_user_result = mysqli_query($connection, $search_user_query);
                $search_user_count = mysqli_num_rows($search_user_result);
                if ($search_user_count == 1) {
                    $OTP = generateOTP();
                    $curl = curl_init();
                    $numberList = json_encode(array("$user_contact"));
                    $message = json_encode("Your 'Billing Panel Login' (Powered by Edumarc Technologies) OTP for verification is: $OTP. Code is valid for 2 minutes. OTP is confidential, refrain from sharing it with anyone.");
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
                    $user_id = "";
                    $user_email = "";
                    $user_contact = "";
                    while ($row = mysqli_fetch_assoc($search_user_result)) {
                        $user_id = $row['user_id'];
                        $user_email = $row['user_email'];
                        $user_contact = $row['user_contact'];
                    }

                    $insert_otp = "INSERT INTO `bora_otp_ver`(
                            `otp_user_id`,
                            `otp_pass`
                        )
                        VALUES(
                            '$user_id',
                            '$OTP'
                        )";
                    $insert_otp_r = mysqli_query($connection, $insert_otp);

                    if ($insert_otp_r) {
                        header("Location: otp_verification.php?user_id=$user_id");
                        // $to = $user_email;
                        // $subject = 'BIAHS | LOGIN Verification';
                        // $message = 'Your One Time Password is: ' . $OTP;
                        // $headers = 'From: info@borainstitute.com';

                        // if (mail($to, $subject, $message, $headers)) {
                        //     header("Location: otp_verification.php?user_id=$user_id");
                        //     exit;
                        // } else {
                        //     echo "Failed to send OTP. Please try again.";
                        // }
                    }
                } else {
                    echo "This user does not exist in our system.";
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
            <input type="number" name="user_contact" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" name="submit" class="btn btn-outline-success w-100">Login</button>
    </form>
</div>

<?php include('includes/footer.php') ?>