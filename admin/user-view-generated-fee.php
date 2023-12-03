<?php include('includes/header.php') ?>
<?php include('components/navbar/user-navbar.php') ?>


<div class="container user-form-container">
    <div class="page-marker">
        <a href="user-past-payments.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Collect Fee</h5>
    </div>
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

    if (isset($_POST['edit'])) {
        $bora_invoice_id = $_POST['bora_invoice_id'];
        $fetch_data = "SELECT * FROM `bora_invoice` WHERE `bora_invoice_id` = '$bora_invoice_id'";
        $fetch_data_res = mysqli_query($connection, $fetch_data);

        $bora_invoice_id = "";
        $bora_invoice_number = "";
        $bora_invoice_date = "";
        $bora_invoice_student = "";
        $bora_invoice_student_address = "";
        $bora_invoice_student_contact = "";
        $bora_invoice_student_course = "";
        $bora_invoice_for = "";
        $bora_invoice_tenure = "";
        $bora_invoice_payment_mode = "";
        $bora_invoice_cheque_number = "";
        $bora_invoice_bank_name = "";
        $bora_invoice_ifsc = "";
        $bora_invoice_payment_id = "";
        $bora_invoice_dd_number = "";
        $bora_invoice_value = "";
        $bora_invoice_disc = "";
        $bora_invoice_grand_total = "";
        $bora_invoice_by = "";

        while ($row = mysqli_fetch_assoc($fetch_data_res)) {
            $bora_invoice_id = $row['bora_invoice_id'];
            $bora_invoice_number = $row['bora_invoice_number'];
            $bora_invoice_date = $row['bora_invoice_date'];
            $bora_invoice_student = $row['bora_invoice_student'];
            $bora_invoice_student_address = $row['bora_invoice_student_address'];
            $bora_invoice_student_contact = $row['bora_invoice_student_contact'];
            $bora_invoice_student_course = $row['bora_invoice_student_course'];

            $bora_invoice_for = $row['bora_invoice_for'];
            $bora_invoice_tenure = $row['bora_invoice_tenure'];
            $bora_invoice_payment_mode = $row['bora_invoice_payment_mode'];

            $bora_invoice_cheque_number = $row['bora_invoice_cheque_number'];
            $bora_invoice_bank_name = $row['bora_invoice_bank_name'];
            $bora_invoice_ifsc = $row['bora_invoice_ifsc'];
            $bora_invoice_payment_id = $row['bora_invoice_payment_id'];
            $bora_invoice_dd_number = $row['bora_invoice_dd_number'];

            $bora_invoice_value = $row['bora_invoice_value'];
            $bora_invoice_disc = $row['bora_invoice_disc'];
            $bora_invoice_grand_total = $row['bora_invoice_grand_total'];
            $bora_invoice_by = $row['bora_invoice_by'];
        }
    }

    ?>
    <form target="_blank" class="add-user-form" method="POST" action="generate-invoice.php">
        <input type="text" name="bora_invoice_student_id" value="<?php echo $bora_invoice_id ?>" hidden>
        <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>" hidden>

        <div class="receipt-upper-section">
            <img src="../assets/images/logo/brand-logo.webp" alt="">
            <h5>Bora Institute of Allied Health Sciences</h5>
            <p>Sewa Nagar, NH-24, Sitaur Road, Lucknow - 226201.
                <strong>Contact:</strong> +91 9305748634 | +91 9569863933. <br><strong>Email:</strong>
                info@borainstitue.com.
                <strong>Website:</strong> borainstitute.com
            </p>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" colspan="4" class="table-active">RECEIPT NUMBER</th>
                        <th scope="col" class="table-active">RECEIPT DATE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" colspan="4"><strong><?php echo $bora_invoice_number; ?></strong></th>
                        <td>
                            <p><?php echo $bora_invoice_date; ?></p>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" colspan="4" class="table-active">BILL TO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" colspan="4">
                            <div class="recipient">
                                <h4><?php echo $bora_invoice_student ?></h4>
                                <p><?php echo $bora_invoice_student_address ?> |
                                    <?php echo $bora_invoice_student_contact ?></p>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered ">
                <thead class="table-active">
                    <tr>
                        <th scope="col">FEE TYPE</th>
                        <th scope="col">COURSE</th>
                        <th scope="col">PAID FOR</th>
                        <th scope="col">AMOUNT</th>
                        <th scope="col">DISCOUNT</th>
                        <th scope="col">GRAND TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <p><?php echo $bora_invoice_for ?></p>
                        </th>
                        <td>
                            <p><?php echo $bora_invoice_student_course ?></p>
                        </td>
                        <td>
                            <p><?php echo $bora_invoice_tenure ?></p>
                        </td>

                        <td>
                            <p>₹<?php echo $bora_invoice_value ?></p>
                        </td>
                        <?php if (empty($bora_invoice_disc)) { ?>
                            <td>
                                <p>₹0</p>
                            </td>
                        <?php } else { ?>
                            <td>
                                <p>₹<?php echo $bora_invoice_disc ?></p>
                            </td>
                        <?php } ?>

                        <td>
                            <p>₹<?php echo $bora_invoice_grand_total ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <table style="margin-top: 5px; width: 100%; ">
            <?php
            if ($bora_invoice_payment_mode == 'cash') {
            ?>
                <thead>
                    <tr>
                        <th scope="col" colspan="4" style="border: 1px solid #e7e7e7e7; width: 100%; padding: 5px;">PAYMENT
                            MODE:<strong><?php echo strtoupper($bora_invoice_payment_mode) ?> </strong></th>
                    </tr>
                </thead>
            <?php } else if ($bora_invoice_payment_mode == 'cheque') { ?>
                <thead>
                    <th scope="col" colspan="4" style="border: 1px solid #e7e7e7e7; width: 100%; padding: 5px;">PAYMENT
                        MODE: <strong>CHEQUE | DEMAND DRAFT</th>
                </thead>
                <thead>
                    <th scope="col" colspan="4" style="border: 1px solid #e7e7e7e7; width: 100%; padding: 5px;">CHEQUE
                        NUMBER | DD NUMBER:
                        <?php echo strtoupper($bora_invoice_cheque_number) ?></th>
                </thead>
                <thead>
                    <th scope="col" colspan="4" style="border: 1px solid #e7e7e7e7; width: 100%; padding: 5px;">BANK NAME:
                        <?php echo strtoupper($bora_invoice_bank_name) ?></th>
                </thead>
                <thead>
                    <th scope="col" colspan="4" style="border: 1px solid #e7e7e7e7; width: 100%; padding: 5px;">BANK IFSC
                        CODE:
                        <?php echo strtoupper($bora_invoice_ifsc) ?></th>
                </thead>

            <?php } else if ($bora_invoice_payment_mode == 'online') { ?>
                <thead>
                    <tr>
                        <th scope="col" colspan="4" style="border: 1px solid #e7e7e7e7; width: 100%; padding: 5px;">PAYMENT
                            MODE: <strong><?php echo strtoupper($bora_invoice_payment_mode) ?> </th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="4" style="border: 1px solid #e7e7e7e7; width: 100%; padding: 5px;">PAYMENT
                            ID:
                            <?php echo $bora_invoice_payment_id ?>
                        </th>
                    </tr>
                </thead>

            <?php } else if ($bora_invoice_payment_mode == 'DemandDraft') { ?>
                <thead>
                    <tr>
                        <th scope="col" colspan="4" style="border: 1px solid #e7e7e7e7; width: 100%; padding: 5px;">PAYMENT
                            MODE: <strong><?php echo strtoupper($bora_invoice_payment_mode) ?> </th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="4" style="border: 1px solid #e7e7e7e7; width: 100%; padding: 5px;">DD
                            NUMBER:
                            <?php echo $bora_invoice_dd_number ?>
                        </th>
                    </tr>
                </thead>
            <?php } ?>
        </table>

        <div class="table-responsive mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="table-active">
                            <div class="receipt-calculation">
                                <h6>Collected By: <?php echo $bora_invoice_by; ?></h6>
                                <p id="difference"></p>
                            </div>
                        </th>
                        <!-- <th scope="col" class="table-active">
                            <div class="receipt-calculation">
                                <h6>Total Amount: </h6>
                                <p id="output"> </p>
                            </div>
                        </th> -->
                    </tr>
                </thead>
            </table>
        </div>

        <!-- <button type="submit" name="generate" class="btn btn-success mt-3">Generate Invoice</button> -->
    </form>

</div>
<?php include('includes/footer.php') ?>