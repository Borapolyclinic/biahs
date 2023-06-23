<!-- HTML code for OTP verification form -->
<?php include('includes/header.php') ?>
<?php
function generateOTP()
{
    $otp = rand(100000, 999999);
    return $otp;
}

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
    $user_id = $_POST['user_id'];
    $entered_otp = $_POST['entered_otp'];

    if (empty($user_id) || empty($entered_otp)) {
        echo "Invalid OTP verification request.";
        exit;
    }

    $get_otp_query = "SELECT * FROM `bora_otp_ver` WHERE `otp_user_id` = '$user_id'";
    $get_otp_statement = mysqli_query($connection, $get_otp_query);
    $get_otp_count = mysqli_num_rows($get_otp_statement);

    if ($get_otp_count == 1) {
        $otp_user_id = "";
        $stored_otp = "";
        while ($row = mysqli_fetch_assoc($get_otp_statement)) {
            $otp_user_id = $row['otp_user_id'];
            $stored_otp = $row['otp_pass'];
        }

        if ($entered_otp == $stored_otp) {
            $delete_otp_query = "DELETE FROM `bora_otp_ver` WHERE `otp_user_id` = '$otp_user_id'";
            $delete_otp_statement = mysqli_query($connection, $delete_otp_query);

            $search_user_query = "SELECT * FROM `bora_users` WHERE `user_id` = '$user_id'";
            $search_user_statement = mysqli_query($connection, $search_user_query);
            $search_user_count = mysqli_num_rows($search_user_statement);

            if ($search_user_count == 1) {
                while ($row = mysqli_fetch_assoc($search_user_statement)) {
                    setcookie("loggedin", "true", time() + (86400 * 30), "/");
                    setcookie("user_id", $user_id, time() + (86400 * 30), "/");
                    setcookie("user_contact", $row['user_contact'], time() + (86400 * 30), "/");
                    setcookie("user_type", $row['user_type'], time() + (86400 * 30), "/");
                    if ($row['user_type'] == 2) {
                        $login_time = date('Y-m-d H:i:s');
                        $user_contact = $row['user_id'];

                        $insert_activity_query = "INSERT INTO `bora_user_activity_tracker` (`activity_tracker_user_contact`, `activity_tracker_time`) VALUES (?, ?)";
                        $insert_activity_statement = mysqli_prepare($connection, $insert_activity_query);
                        mysqli_stmt_bind_param($insert_activity_statement, "ss", $user_contact, $login_time);
                        mysqli_stmt_execute($insert_activity_statement);
                    }
                    header("location:dashboard.php");
                }
                $delete_otp_query = "DELETE FROM `bora_otp_ver` WHERE `user_id` = ?";
                $delete_otp_statement = mysqli_prepare($connection, $delete_otp_query);
                mysqli_stmt_bind_param($delete_otp_statement, "s", $user_id);
                mysqli_stmt_execute($delete_otp_statement);
            }
            exit;
        } else {
            echo "Incorrect OTP. Please try again.";
        }
    } else {
        echo "Invalid OTP verification request.";
    }
}
?>

<body>
    <div class="container form-container">
        <form class="login-form" method="POST" action="">
            <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
            <input type="number" name="entered_otp" placeholder="Enter OTP" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <button type="submit" name="submit" class="mt-3 btn btn-outline-success w-100">Verify OTP</button>
        </form>
    </div>
    <?php include('includes/footer.php') ?>