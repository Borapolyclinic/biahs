<?php
include('includes/header.php') ?>
<?php include('components/navbar/user-navbar.php') ?>


<div class="container mt-5 add-user-success">
    <?php
    require('includes/connection.php');
    if (isset($_COOKIE['user_id'])) {
        $user_contact = $_COOKIE['user_id'];

        $fetch_data = "SELECT * FROM `bora_users` WHERE `user_id` = '$user_contact'";
        $fetch_res = mysqli_query($connection, $fetch_data);
        $user_name = "";
        while ($row = mysqli_fetch_assoc($fetch_res)) {
            $user_name = $row['user_name'];
        }
    }

    if (isset($_POST['generate'])) {
        $bora_receipt_number = $_POST['bora_invoice_number'];
        $bora_invoice_student_en_no = $_POST['bora_invoice_student_en_no'];
        $bora_invoice_date = date('d-m-Y');
        $bora_invoice_student_id = $_POST['bora_invoice_student_id'];
        $bora_invoice_student = $_POST['bora_invoice_student'];
        $bora_invoice_student_address = $_POST['bora_invoice_student_address'];
        $bora_invoice_student_contact = $_POST['bora_invoice_student_contact'];
        $bora_invoice_student_course_id = $_POST['bora_invoice_student_course_id'];
        $bora_invoice_student_batch = $_POST['bora_invoice_student_batch'];
        $get_course = "SELECT * FROM `bora_course` WHERE `course_id` = '$bora_invoice_student_course_id'";
        $get_course_res = mysqli_query($connection, $get_course);
        $course_name = "";
        while ($row = mysqli_fetch_assoc($get_course_res)) {
            $course_name = $row['course_name'];
        }
        $bora_invoice_for = $_POST['invoice_for'];
        $bora_invoice_tenure_id = $_POST['bora_invoice_tenure_id'];
        $bora_invoice_tenure = $_POST['invoice_tenure'];
        $bora_invoice_payment_mode = $_POST['bora_invoice_payment_mode'];
        $bora_invoice_value = $_POST['invoice_value'];
        $bora_invoice_disc = $_POST['invoice_disc'];

        if (empty($bora_invoice_disc)) {
            $bora_invoice_disc = "0";
        }

        $bora_invoice_generation_date = date('Y-m-d');

        if (empty($bora_invoice_disc) || $bora_invoice_disc == '0') {
            $bora_invoice_grand_total = $bora_invoice_value;
        } else {
            $bora_invoice_grand_total = $bora_invoice_value - $bora_invoice_disc;
        }

        if ($bora_invoice_payment_mode == 'cheque') {

            $bora_invoice_cheque_number = $_POST['bora_invoice_cheque_number'];
            $bora_invoice_bank_name = $_POST['bora_invoice_bank_name'];
            $bora_invoice_ifsc = $_POST['bora_invoice_ifsc'];

            // echo "bora_invoice_payment_mode: " . $bora_invoice_payment_mode . "<br> <br>";
            // echo "bora_invoice_payment_id: " . $bora_invoice_payment_id . "<br> <br>";
            // echo "bora_invoice_cheque_number: " . $bora_invoice_cheque_number . "<br> <br>";
            // echo "bora_invoice_bank_name: " . $bora_invoice_bank_name . "<br> <br>";
            // echo "bora_invoice_ifsc: " . $bora_invoice_ifsc . "<br> <br>";

            $query = "INSERT INTO `bora_invoice`(
                `bora_invoice_number`,
                `bora_invoice_date`,
                `bora_invoice_student_en_no`,
                `bora_invoice_student_id`,
                `bora_invoice_student`,
                `bora_invoice_student_address`,
                `bora_invoice_student_contact`,
                `bora_invoice_student_course_id`,
                `bora_invoice_student_course`,
                `bora_invoice_student_admission_year`,
                `bora_invoice_for`,
                `bora_invoice_tenure`,
                `bora_invoice_tenure_id`,
                `bora_invoice_payment_mode`,
                `bora_invoice_cheque_number`,
                `bora_invoice_bank_name`,
                `bora_invoice_ifsc`,
                `bora_invoice_value`,
                `bora_invoice_disc`,
                `bora_invoice_grand_total`,
                `bora_invoice_by`,
                `bora_invoice_generation_date`
                )
                VALUES(
                '$bora_receipt_number',
                '$bora_invoice_date',
                '$bora_invoice_student_en_no',
                '$bora_invoice_student_id',
                '$bora_invoice_student',
                '$bora_invoice_student_address',
                '$bora_invoice_student_contact',
                '$bora_invoice_student_course_id',
                '$course_name',
                '$bora_invoice_student_batch',
                '$bora_invoice_for',
                '$bora_invoice_tenure',
                '$bora_invoice_tenure_id',                
                '$bora_invoice_payment_mode',
                '$bora_invoice_cheque_number',
                '$bora_invoice_bank_name',
                '$bora_invoice_ifsc',
                '$bora_invoice_value',
                '$bora_invoice_disc',
                '$bora_invoice_grand_total',
                '$user_name',
                '$bora_invoice_generation_date'
                )";
            $result = mysqli_query($connection, $query);
        } else if ($bora_invoice_payment_mode == 'cash') {
            $query = "INSERT INTO `bora_invoice`(
                    `bora_invoice_number`,
                    `bora_invoice_date`,
                    `bora_invoice_student_en_no`,
                    `bora_invoice_student_id`,
                    `bora_invoice_student`,
                    `bora_invoice_student_address`,
                    `bora_invoice_student_contact`,
                    `bora_invoice_student_course_id`,
                    `bora_invoice_student_course`,
                    `bora_invoice_student_admission_year`,
                    `bora_invoice_for`,
                    `bora_invoice_tenure`,
                    `bora_invoice_tenure_id`,
                    `bora_invoice_payment_mode`,
                    `bora_invoice_value`,
                    `bora_invoice_disc`,
                    `bora_invoice_grand_total`,
                    `bora_invoice_by`,
                    `bora_invoice_generation_date`
                    )
                    VALUES(
                    '$bora_receipt_number',
                    '$bora_invoice_date',
                    '$bora_invoice_student_en_no',
                    '$bora_invoice_student_id',
                    '$bora_invoice_student',
                    '$bora_invoice_student_address',
                    '$bora_invoice_student_contact',
                    '$bora_invoice_student_course_id',
                    '$course_name',
                    '$bora_invoice_student_batch',
                    '$bora_invoice_for',
                    '$bora_invoice_tenure',
                    '$bora_invoice_tenure_id',
                    '$bora_invoice_payment_mode',
                    '$bora_invoice_value',
                    '$bora_invoice_disc',
                    '$bora_invoice_grand_total',
                    '$user_name',
                    '$bora_invoice_generation_date'
                    )";
            $result = mysqli_query($connection, $query);
        } else if ($bora_invoice_payment_mode == 'online') {
            $bora_invoice_payment_id = $_POST['bora_invoice_payment_id'];
            $bora_invoice_payment_date = $_POST['bora_invoice_payment_date'];
            $query = "INSERT INTO `bora_invoice`(
                `bora_invoice_number`,
                `bora_invoice_date`,
                `bora_invoice_student_en_no`,
                `bora_invoice_student_id`,
                `bora_invoice_student`,
                `bora_invoice_student_address`,
                `bora_invoice_student_contact`,
                `bora_invoice_student_course_id`,
                `bora_invoice_student_course`,
                `bora_invoice_student_admission_year`,
                `bora_invoice_for`,
                `bora_invoice_tenure`,
                `bora_invoice_tenure_id`,
                `bora_invoice_payment_mode`,
                `bora_invoice_payment_id`,
                `bora_invoice_payment_date`,
                `bora_invoice_value`,
                `bora_invoice_disc`,
                `bora_invoice_grand_total`,
                `bora_invoice_by`,
                `bora_invoice_generation_date`
                )
                VALUES(
                '$bora_receipt_number',
                '$bora_invoice_date',
                '$bora_invoice_student_en_no',
                '$bora_invoice_student_id',
                '$bora_invoice_student',
                '$bora_invoice_student_address',
                '$bora_invoice_student_contact',
                '$bora_invoice_student_course_id',
                '$course_name',
                '$bora_invoice_student_batch',
                '$bora_invoice_for',
                '$bora_invoice_tenure',
                '$bora_invoice_tenure_id',
                '$bora_invoice_payment_mode',
                '$bora_invoice_payment_id',
                '$bora_invoice_payment_date',
                '$bora_invoice_value',
                '$bora_invoice_disc',
                '$bora_invoice_grand_total',
                '$user_name',
                '$bora_invoice_generation_date'
                )";
            $result = mysqli_query($connection, $query);
        }
        if ($result) {
    ?>
            <form action="receipt-format.php" method="POST" target="_blank">
                <input type="text" name="bora_receipt_number" value="<?php echo $bora_receipt_number ?>" hidden>

                <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_lk80fpsm.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                <p>Success! Receipt generated.</p>
                <button type="submit" name="invoice" class="w-100 btn btn-success">Download Receipt</button>
                <a href="user-view-students.php" class="mt-3 btn w-100 btn-outline-primary">Go Back</a>
            </form>

        <?php
        } else { ?>
            <div class="alert alert-danger" role="alert">
                Error: Some fields are mandatory!
            </div>
    <?php
        }
    }


    ?>
</div>
<?php
include('includes/footer.php');
?>