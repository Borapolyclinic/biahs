<?php
include('includes/header.php') ?>
<?php include('components/navbar/user-navbar.php') ?>


<div class="container mt-5 add-user-success">
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

    if (isset($_POST['update'])) {
        $bora_invoice_id = $_POST['bora_invoice_id'];
        $bora_invoice_number = $_POST['bora_invoice_number'];
        $invoice_for = $_POST['invoice_for'];
        $invoice_tenure = $_POST['invoice_tenure'];
        $invoice_value = $_POST['invoice_value'];
        $invoice_disc = $_POST['invoice_disc'];
        $bora_invoice_payment_mode = $_POST['bora_invoice_payment_mode'];

        if (empty($invoice_disc) || $invoice_disc == '0') {
            $invoice_grand_total = $invoice_value;
        } else {
            $invoice_grand_total = $invoice_value - $invoice_disc;
        }

        // ============ PAYMENT MODE - CHEQUE ==================
        if ($bora_invoice_payment_mode == 'cheque') {
            $bora_invoice_cheque_number = $_POST['bora_invoice_cheque_number'];
            $bora_invoice_bank_name = $_POST['bora_invoice_bank_name'];
            $bora_invoice_ifsc = $_POST['bora_invoice_ifsc'];

            $query = "UPDATE
            `bora_invoice`
        SET
            `bora_invoice_for` = '$invoice_for',
            `bora_invoice_tenure` = '$invoice_tenure',
            `bora_invoice_payment_mode` = '$bora_invoice_payment_mode',
            `bora_invoice_cheque_number` = '$bora_invoice_cheque_number',
            `bora_invoice_bank_name` = '$bora_invoice_bank_name',
            `bora_invoice_ifsc` = '$bora_invoice_ifsc',
            `bora_invoice_value` = '$invoice_value',
            `bora_invoice_disc` = '$invoice_disc',
            `bora_invoice_grand_total` = '$invoice_grand_total',
            `bora_invoice_updated_by` = '$user_name'
        WHERE
            `bora_invoice_id` = '$bora_invoice_id'";
            $result = mysqli_query($connection, $query);

            // ============ PAYMENT MODE - ONLINE ==================
        } else if ($bora_invoice_payment_mode == 'online') {
            $bora_invoice_payment_id = $_POST['bora_invoice_payment_id'];

            $query = "UPDATE
            `bora_invoice`
        SET
            `bora_invoice_for` = '$invoice_for',
            `bora_invoice_tenure` = '$invoice_tenure',
            `bora_invoice_payment_mode` = '$bora_invoice_payment_mode',
            `bora_invoice_payment_id` = '$bora_invoice_payment_id',
            `bora_invoice_value` = '$invoice_value',
            `bora_invoice_disc` = '$invoice_disc',
            `bora_invoice_grand_total` = '$invoice_grand_total',
            `bora_invoice_updated_by` = '$user_name'
        WHERE
            `bora_invoice_id` = '$bora_invoice_id'";
            $result = mysqli_query($connection, $query);

            // ============ PAYMENT MODE - CASH ==================
        } else if ($bora_invoice_payment_mode == 'cash') {
            $query = "UPDATE
            `bora_invoice`
        SET
            `bora_invoice_for` = '$invoice_for',
            `bora_invoice_tenure` = '$invoice_tenure',
            `bora_invoice_payment_mode` = '$bora_invoice_payment_mode',
            `bora_invoice_value` = '$invoice_value',
            `bora_invoice_disc` = '$invoice_disc',
            `bora_invoice_grand_total` = '$invoice_grand_total',
            `bora_invoice_updated_by` = '$user_name'
        WHERE
            `bora_invoice_id` = '$bora_invoice_id'";
            $result = mysqli_query($connection, $query);
        }

        if ($result) { ?>
    <form action="invoice-format.php" method="POST">
        <input type="text" name="bora_receipt_number" value="<?php echo $bora_invoice_number ?>" hidden>

        <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_lk80fpsm.json" background="transparent"
            speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        <p>Success! Invoice generated.</p>
        <button type="submit" name="invoice" class="w-100 btn btn-success">Download Invoice</button>
    </form>

    <?php } else {
            echo ('Description: ' . mysqli_error($connection));
        }
    }


    ?>
</div>
<?php
include('includes/footer.php');
?>