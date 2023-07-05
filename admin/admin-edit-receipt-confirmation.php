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

        if (isset($_POST['update'])) {
            $bora_invoice_id = $_POST['bora_invoice_id'];
            $bora_invoice_for = $_POST['bora_invoice_for'];
            $bora_invoice_tenure_id = $_POST['bora_invoice_tenure_id'];
            $bora_invoice_tenure = $_POST['bora_invoice_tenure'];
            $bora_invoice_payment_mode = $_POST['bora_invoice_payment_mode'];
            $bora_invoice_payment_id = $_POST['bora_invoice_payment_id'];
            $bora_invoice_cheque_number = $_POST['bora_invoice_cheque_number'];
            $bora_invoice_bank_name = $_POST['bora_invoice_bank_name'];
            $bora_invoice_ifsc = $_POST['bora_invoice_ifsc'];

            $bora_invoice_value = $_POST['bora_invoice_value'];
            $bora_invoice_disc = $_POST['bora_invoice_disc'];
            $bora_invoice_grand_total = $bora_invoice_value - $bora_invoice_disc;
        }
        ?>

        <form action="admin-edit-receipt-success.php" method="POST">
            <input type="text" name="bora_invoice_id" value="<?php echo $bora_invoice_id ?>">
            <input type="text" name="bora_invoice_for" value="<?php echo $bora_invoice_for ?>">
            <input type="text" name="bora_invoice_tenure_id" value="<?php echo $bora_invoice_tenure_id ?>">
            <input type="text" name="bora_invoice_tenure" value="<?php echo $bora_invoice_tenure ?>">
            <input type="text" name="bora_invoice_payment_mode" value="<?php echo $bora_invoice_payment_mode ?>">
            <input type="text" name="bora_invoice_payment_id" value="<?php echo $bora_invoice_payment_id ?>">
            <input type="text" name="bora_invoice_cheque_number" value="<?php echo $bora_invoice_cheque_number ?>">
            <input type="text" name="bora_invoice_bank_name" value="<?php echo $bora_invoice_bank_name ?>">
            <input type="text" name="bora_invoice_ifsc" value="<?php echo $bora_invoice_ifsc ?>">
            <input type="text" name="bora_invoice_value" value="<?php echo $bora_invoice_value ?>">
            <input type="text" name="bora_invoice_disc" value="<?php echo $bora_invoice_disc ?>">
            <input type="text" name="bora_invoice_grand_total" value="<?php echo $bora_invoice_grand_total ?>">
            <div class="alert alert-info" role="alert w-100">
                Are you sure you want to update this Receipt?
            </div>

            <button type="submit" name="edit" href="admin-edit-receipt.php" class="btn w-100 btn-outline-primary">No</button>
            <button type="submit" name="update_success" class="btn w-100 btn-outline-success mt-3">Yes</button>
        </form>
    </div>
</div>

<?php include('includes/footer.php') ?>