<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="confirmation-alert">

        <?php
        require('includes/connection.php');
        if (isset($_COOKIE['user_id'])) {
            $user_contact = $_COOKIE['user_id'];
            $fetch_data = "SELECT * FROM `bora_users` WHERE `user_contact` = '$user_contact'";
            $fetch_res = mysqli_query($connection, $fetch_data);
            $user_name = "";
            while ($row = mysqli_fetch_assoc($fetch_res)) {
                $user_name = $row['user_name'];
            }
        }

        if (isset($_POST['update_success'])) {
            $bora_invoice_id = $_POST['bora_invoice_id'];
            $bora_invoice_for = $_POST['bora_invoice_for'];
            $bora_invoice_tenure = $_POST['bora_invoice_tenure'];
            $bora_invoice_tenure_id = $_POST['bora_invoice_tenure_id'];
            $bora_invoice_payment_mode = $_POST['bora_invoice_payment_mode'];
            $bora_invoice_payment_id = $_POST['bora_invoice_payment_id'];
            $bora_invoice_cheque_number = $_POST['bora_invoice_cheque_number'];
            $bora_invoice_bank_name = $_POST['bora_invoice_bank_name'];
            $bora_invoice_ifsc = $_POST['bora_invoice_ifsc'];
            $bora_invoice_value = $_POST['bora_invoice_value'];
            $bora_invoice_disc = $_POST['bora_invoice_disc'];
            $bora_invoice_grand_total = $bora_invoice_value - $bora_invoice_disc;

            if ($bora_invoice_payment_mode == 'cash') {
                $update_query = "UPDATE
                `bora_invoice`
            SET
                `bora_invoice_for` = '$bora_invoice_for',
                `bora_invoice_tenure` = '$bora_invoice_tenure',
                `bora_invoice_tenure_id` = '$bora_invoice_tenure_id',
                `bora_invoice_payment_mode` = '$bora_invoice_payment_mode',
                `bora_invoice_value` = '$bora_invoice_value',
                `bora_invoice_disc` = '$bora_invoice_disc',
                `bora_invoice_grand_total` = '$bora_invoice_grand_total',
                `bora_invoice_updated_by` = '$user_name'
            WHERE
                `bora_invoice_id` = '$bora_invoice_id'";
                $update_query_r = mysqli_query($connection, $update_query);
                if ($update_query_r) { ?>
        <div class="mt-3 mb-3 w-100 alert alert-success" role="alert">Receipt Updated! <a
                href="admin-past-payments.php">Click here</a> to go back.</div>

        <?php }
            } 
            
            if ($bora_invoice_payment_mode == 'cheque') {
                $update_query = "UPDATE
                `bora_invoice`
            SET
                `bora_invoice_for` = '$bora_invoice_for',
                `bora_invoice_tenure` = '$bora_invoice_tenure',
                `bora_invoice_tenure_id` = '$bora_invoice_tenure_id',
                `bora_invoice_payment_mode` = '$bora_invoice_payment_mode',
                `bora_invoice_cheque_number` = '$bora_invoice_cheque_number',
                `bora_invoice_bank_name` = '$bora_invoice_bank_name',
                `bora_invoice_ifsc` = '$bora_invoice_ifsc',
                `bora_invoice_value` = '$bora_invoice_value',
                `bora_invoice_disc` = '$bora_invoice_disc',
                `bora_invoice_grand_total` = '$bora_invoice_grand_total',
                `bora_invoice_updated_by` = '$user_name'
            WHERE
                `bora_invoice_id` = '$bora_invoice_id'";
                $update_query_r = mysqli_query($connection, $update_query);
                if ($update_query_r) { ?>
        <div class="mt-3 mb-3 w-100 alert alert-success" role="alert">Receipt Updated! <a
                href="admin-past-payments.php">Click here</a> to go back.</div>
        <?php }
            } 
            if ($bora_invoice_payment_mode == 'online') {
                $update_query = "UPDATE
                `bora_invoice`
            SET
                `bora_invoice_for` = '$bora_invoice_for',
                `bora_invoice_tenure` = '$bora_invoice_tenure',
                `bora_invoice_tenure_id` = '$bora_invoice_tenure_id',
                `bora_invoice_payment_mode` = '$bora_invoice_payment_mode',
                `bora_invoice_payment_id` = '$bora_invoice_payment_id',
                `bora_invoice_value` = '$bora_invoice_value',
                `bora_invoice_disc` = '$bora_invoice_disc',
                `bora_invoice_grand_total` = '$bora_invoice_grand_total',
                `bora_invoice_updated_by` = '$user_name'
            WHERE
                `bora_invoice_id` = '$bora_invoice_id'";
                $update_query_r = mysqli_query($connection, $update_query);
                if ($update_query_r) { ?>
        <div class="mt-3 mb-3 w-100 alert alert-success" role="alert">Receipt Updated! <a
                href="admin-past-payments.php">Click here</a> to go back.</div>
        <?php
                }
            }
        }
        ?>
    </div>
</div>

<?php include('includes/footer.php') ?>