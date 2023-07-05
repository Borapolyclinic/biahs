<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>


<div class="container user-form-container">
    <div class="page-marker">
        <a href="dashboard.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Edit Receipt</h5>
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
        $bora_invoice_student_course_id = "";
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
            $bora_invoice_student_course_id = $row['bora_invoice_student_course_id'];
            $bora_invoice_student_course = $row['bora_invoice_student_course'];

            $bora_invoice_for = $row['bora_invoice_for'];
            $bora_invoice_tenure_id = $row['bora_invoice_tenure_id'];
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
    <form class="add-user-form" method="POST" action="admin-edit-receipt-confirmation.php">
        <input type="text" name="bora_invoice_id" value="<?php echo $bora_invoice_id ?>" hidden>
        <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>" hidden>

        <div class="receipt-upper-section">
            <img src="../assets/images/logo/brand-logo.webp" alt="">
            <h5>Bora Institute of Allied Health Sciences</h5>
            <p>Sewa Nagar, NH-24, Sitapur Road. Lucknow - 226201.
                <strong>Contact:</strong> +91 9305748634 | +91 9569863933. <br><strong>Email:</strong>
                info@borainstitute.com.
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
                    <?php
                    $current_month = date('m');
                    $current_year = date('y');
                    $new_query = "SELECT * FROM `bora_invoice`";
                    $new_res = mysqli_query($connection, $new_query);
                    $bora_invoice_number = "";
                    while ($row = mysqli_fetch_assoc($new_res)) {
                        $bora_invoice_number = $row['bora_invoice_number'];
                    }
                    if ($bora_invoice_number && strpos($bora_invoice_number, $current_month . $current_year) !== false) {
                        $last_number = intval(substr($bora_invoice_number, -4)) + 1;
                    } else {
                        $last_number = 1;
                    }
                    $receipt_number = 'BIAHS' . $current_month . $current_year . str_pad($last_number, 4, '0', STR_PAD_LEFT);
                    ?>
                    <tr>
                        <th scope="row" colspan="4"><strong><?php echo $receipt_number; ?></strong></th>
                        <td>
                            <?php echo date('d-m-Y'); ?>
                        </td>
                    </tr>
                    <input type="text" name="bora_invoice_number" value="<?php echo $receipt_number ?>" hidden>
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
                        <th scope="col" style="width: 15%;">COURSE NAME</th>
                        <th scope="col">PAID FOR</th>
                        <th scope="col">RECEIPT AMOUNT</th>
                        <th scope="col">DISCOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <select name="bora_invoice_for" class="form-select w-100" aria-label="Default select example">
                                <?php
                                if ($bora_invoice_for == 'Examination') { ?>
                                    <option value="<?php echo $bora_invoice_for ?>"><?php echo $bora_invoice_for ?>
                                        (Selected)</option>
                                    <option value="Tution Fee">Tution Fee</option>
                                    <option value="Admission Fee">Admission Fee</option>
                                    <option value="Clinical Lab Fee">Clinical Lab Fee</option>
                                    <option value="Library Fee">Library Fee</option>
                                    <option value="Uniform Fee">Uniform Fee</option>
                                    <option value="SNA Charges">SNA Charges</option>
                                    <option value="Transport Fee">Transport Fee</option>
                                    <option value="Miscellaneous">Miscellaneous Fee</option>
                                    <option value="Security Deposit">Security Deposit</option>

                                <?php } else if ($bora_invoice_for == 'Tution Fee') { ?>
                                    <option value="<?php echo $bora_invoice_for ?>"><?php echo $bora_invoice_for ?>
                                        (Selected)</option>
                                    <option value="Examination">Examination Fee</option>
                                    <option value="Admission Fee">Admission Fee</option>
                                    <option value="Clinical Lab Fee">Clinical Lab Fee</option>
                                    <option value="Library Fee">Library Fee</option>
                                    <option value="Uniform Fee">Uniform Fee</option>
                                    <option value="SNA Charges">SNA Charges</option>
                                    <option value="Transport Fee">Transport Fee</option>
                                    <option value="Miscellaneous">Miscellaneous Fee</option>
                                    <option value="Security Deposit">Security Deposit</option>

                                <?php } else if ($bora_invoice_for == 'Admission Fee') { ?>
                                    <option value="<?php echo $bora_invoice_for ?>"><?php echo $bora_invoice_for ?>
                                        (Selected)</option>
                                    <option value="Examination">Examination Fee</option>
                                    <option value="Tution Fee">Tution Fee</option>
                                    <option value="Clinical Lab Fee">Clinical Lab Fee</option>
                                    <option value="Library Fee">Library Fee</option>
                                    <option value="Uniform Fee">Uniform Fee</option>
                                    <option value="SNA Charges">SNA Charges</option>
                                    <option value="Transport Fee">Transport Fee</option>
                                    <option value="Miscellaneous">Miscellaneous Fee</option>
                                    <option value="Security Deposit">Security Deposit</option>

                                <?php } else if ($bora_invoice_for == 'Clinical Lab Fee') { ?>
                                    <option value="<?php echo $bora_invoice_for ?>"><?php echo $bora_invoice_for ?>
                                        (Selected)</option>
                                    <option value="Examination">Examination Fee</option>
                                    <option value="Tution Fee">Tution Fee</option>
                                    <option value="Admission Fee">Admission Fee</option>
                                    <option value="Library Fee">Library Fee</option>
                                    <option value="Uniform Fee">Uniform Fee</option>
                                    <option value="SNA Charges">SNA Charges</option>
                                    <option value="Transport Fee">Transport Fee</option>
                                    <option value="Miscellaneous">Miscellaneous Fee</option>
                                    <option value="Security Deposit">Security Deposit</option>
                                <?php } else if ($bora_invoice_for == 'Library Fee') { ?>
                                    <option value="<?php echo $bora_invoice_for ?>"><?php echo $bora_invoice_for ?>
                                        (Selected)</option>
                                    <option value="Examination">Examination Fee</option>
                                    <option value="Tution Fee">Tution Fee</option>
                                    <option value="Admission Fee">Admission Fee</option>
                                    <option value="Clinical Lab Fee">Clinical Lab Fee</option>
                                    <option value="Uniform Fee">Uniform Fee</option>
                                    <option value="SNA Charges">SNA Charges</option>
                                    <option value="Transport Fee">Transport Fee</option>
                                    <option value="Miscellaneous">Miscellaneous Fee</option>
                                    <option value="Security Deposit">Security Deposit</option>
                                <?php } else if ($bora_invoice_for == 'Uniform Fee') { ?>
                                    <option value="<?php echo $bora_invoice_for ?>"><?php echo $bora_invoice_for ?>
                                        (Selected)</option>
                                    <option value="Examination">Examination Fee</option>
                                    <option value="Tution Fee">Tution Fee</option>
                                    <option value="Admission Fee">Admission Fee</option>
                                    <option value="Clinical Lab Fee">Clinical Lab Fee</option>
                                    <option value="Library Fee">Library Fee</option>
                                    <!-- <option value="Uniform Fee">Uniform Fee</option> -->
                                    <option value="SNA Charges">SNA Charges</option>
                                    <option value="Transport Fee">Transport Fee</option>
                                    <option value="Miscellaneous">Miscellaneous Fee</option>
                                    <option value="Security Deposit">Security Deposit</option>
                                <?php } else if ($bora_invoice_for == 'SNA Charges') { ?>
                                    <option value="<?php echo $bora_invoice_for ?>"><?php echo $bora_invoice_for ?>
                                        (Selected)</option>
                                    <option value="Examination">Examination Fee</option>
                                    <option value="Tution Fee">Tution Fee</option>
                                    <option value="Admission Fee">Admission Fee</option>
                                    <option value="Clinical Lab Fee">Clinical Lab Fee</option>
                                    <option value="Library Fee">Library Fee</option>
                                    <option value="Uniform Fee">Uniform Fee</option>
                                    <!-- <option value="SNA Charges">SNA Charges</option> -->
                                    <option value="Transport Fee">Transport Fee</option>
                                    <option value="Miscellaneous">Miscellaneous Fee</option>
                                    <option value="Security Deposit">Security Deposit</option>
                                <?php } else if ($bora_invoice_for == 'Transport Fee') { ?>
                                    <option value="<?php echo $bora_invoice_for ?>"><?php echo $bora_invoice_for ?>
                                        (Selected)</option>
                                    <option value="Examination">Examination Fee</option>
                                    <option value="Tution Fee">Tution Fee</option>
                                    <option value="Admission Fee">Admission Fee</option>
                                    <option value="Clinical Lab Fee">Clinical Lab Fee</option>
                                    <option value="Library Fee">Library Fee</option>
                                    <option value="Uniform Fee">Uniform Fee</option>
                                    <option value="SNA Charges">SNA Charges</option>
                                    <!-- <option value="Transport Fee">Transport Fee</option> -->
                                    <option value="Miscellaneous">Miscellaneous Fee</option>
                                    <option value="Security Deposit">Security Deposit</option>
                                <?php } else if ($bora_invoice_for == 'Miscellaneous') { ?>
                                    <option value="<?php echo $bora_invoice_for ?>"><?php echo $bora_invoice_for ?>
                                        (Selected)</option>
                                    <option value="Examination">Examination Fee</option>
                                    <option value="Tution Fee">Tution Fee</option>
                                    <option value="Admission Fee">Admission Fee</option>
                                    <option value="Clinical Lab Fee">Clinical Lab Fee</option>
                                    <option value="Library Fee">Library Fee</option>
                                    <option value="Uniform Fee">Uniform Fee</option>
                                    <option value="SNA Charges">SNA Charges</option>
                                    <option value="Transport Fee">Transport Fee</option>
                                    <!-- <option value="Miscellaneous">Miscellaneous Fee</option> -->
                                    <option value="Security Deposit">Security Deposit</option>
                                <?php } else if ($bora_invoice_for == 'Security Deposit') { ?>
                                    <option value="<?php echo $bora_invoice_for ?>"><?php echo $bora_invoice_for ?>
                                        (Selected)</option>
                                    <option value="Examination">Examination Fee</option>
                                    <option value="Tution Fee">Tution Fee</option>
                                    <option value="Admission Fee">Admission Fee</option>
                                    <option value="Clinical Lab Fee">Clinical Lab Fee</option>
                                    <option value="Library Fee">Library Fee</option>
                                    <option value="Uniform Fee">Uniform Fee</option>
                                    <option value="SNA Charges">SNA Charges</option>
                                    <option value="Transport Fee">Transport Fee</option>
                                    <option value="Miscellaneous">Miscellaneous Fee</option>
                                    <!-- <option value="Security Deposit">Security Deposit</option> -->
                                <?php } ?>
                            </select>
                        </th>
                        <td style="width: 15%;">
                            <?php
                            $get_course = "SELECT * FROM `bora_course` WHERE `course_id` = '$bora_invoice_student_course_id'";
                            $get_course_res = mysqli_query($connection, $get_course);
                            $course_name = "";
                            while ($row = mysqli_fetch_assoc($get_course_res)) {
                                $course_name = $row['course_name'];
                            }
                            echo $course_name;
                            ?>
                        </td>
                        <td>
                            <input type="text" name="bora_invoice_tenure_id" value="<?php echo $bora_invoice_tenure_id ?>" hidden>
                            <select name="bora_invoice_tenure" class="form-select w-100" aria-label="Default select example">
                                <option value="<?php echo $bora_invoice_tenure ?>"><?php echo $bora_invoice_tenure ?>
                                    (Selected)</option>
                                <?php
                                $fetch_course_name = "SELECT * FROM `bora_course` WHERE `course_id` = '$bora_invoice_student_course_id'";
                                $fetch_course_name_res = mysqli_query($connection, $fetch_course_name);

                                $course_id = "";
                                $course_name = "";
                                $course_tenure = "";
                                $course_year_1_fee = "";
                                $course_year_2_fee = "";
                                $course_year_3_fee = "";
                                $course_year_4_fee = "";

                                while ($row = mysqli_fetch_assoc($fetch_course_name_res)) {
                                    $course_id = $row['course_id'];
                                    $course_name = $row['course_name'];
                                    $course_tenure = $row['course_tenure'];
                                    $course_year_1_fee = $row['course_year_1_fee'];
                                    $course_year_2_fee = $row['course_year_2_fee'];
                                    $course_year_3_fee = $row['course_year_3_fee'];
                                    $course_year_4_fee = $row['course_year_4_fee'];
                                }
                                if ($bora_invoice_tenure == 'Year 1 Fee') { ?>
                                    <option value="Year 2 Fee">Year 2 Fee</option>
                                    <option value="Year 3 Fee">Year 3 Fee</option>
                                    <option value="Year 4 Fee">Year 4 Fee</option>
                                <?php } else if ($bora_invoice_tenure == 'Year 2 Fee') { ?>
                                    <option value="Year 1 Fee">Year 1 Fee</option>
                                    <option value="Year 3 Fee">Year 3 Fee</option>
                                    <option value="Year 4 Fee">Year 4 Fee</option>
                                <?php } else if ($bora_invoice_tenure == 'Year 3 Fee') { ?>
                                    <option value="Year 1 Fee">Year 1 Fee</option>
                                    <option value="Year 2 Fee">Year 2 Fee</option>
                                    <option value="Year 4 Fee">Year 4 Fee</option>
                                <?php } else if ($bora_invoice_tenure == 'Year 4 Fee') { ?>
                                    <option value="Year 1 Fee">Year 1 Fee</option>
                                    <option value="Year 2 Fee">Year 2 Fee</option>
                                    <option value="Year 3 Fee">Year 3 Fee</option>
                                <?php } ?>
                            </select>
                        </td>

                        <td>
                            <div>
                                <input type="number" name="bora_invoice_value" value="<?php echo $bora_invoice_value ?>" id="collectingAmount" class="form-control" placeholder="">
                            </div>
                        </td>

                        <?php
                        if (empty($bora_invoice_disc)) { ?>
                            <td>
                                <div>
                                    <input type="number" name="bora_invoice_disc" id="discount" value="0" class="form-control" placeholder="">
                                </div>
                            </td>
                        <?php } else { ?>
                            <td>
                                <div>
                                    <input type="number" name="bora_invoice_disc" id="discount" value="<?php echo $bora_invoice_disc ?>" class="form-control" placeholder="">
                                </div>
                            </td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <?php
                if ($bora_invoice_payment_mode == 'cash') {
                    $new_payment_mode = "CASH";
                ?>
                    <thead class="table-active">
                        <tr>
                            <th>SELECTED PAYMENT MODE: <?php echo $new_payment_mode  ?></th>
                        </tr>
                    </thead>
                <?php } else if ($bora_invoice_payment_mode == 'cheque') {
                    $new_payment_mode = "CHEQUE";
                ?>
                    <thead class="table-active">
                        <tr>
                            <th>SELECTED PAYMENT MODE: <?php echo $new_payment_mode  ?></th>
                        </tr>
                    </thead>
                    <thead class="table-active">
                        <tr>
                            <th>CHEQUE | DD NUMBER: <?php echo $bora_invoice_cheque_number  ?></th>
                        </tr>
                    </thead>
                    <thead class="table-active">
                        <tr>
                            <th>BANK NAME: <?php echo $bora_invoice_bank_name  ?></th>
                        </tr>
                    </thead>
                    <thead class="table-active">
                        <tr>
                            <th>IFSC CODE: <?php echo $bora_invoice_ifsc  ?></th>
                        </tr>
                    </thead>
                <?php } ?>

            </table>
        </div>


        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-active">
                    <tr>
                        <th scope="col" colspan="4">Payment Mode</th>
                        <th scope="col">Selection</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" colspan="4">Cash</th>
                        <td>
                            <div class="form-check">
                                <input name="bora_invoice_payment_mode" class="form-check-input" type="radio" value="cash" onchange="handleCheckboxChange(this)" id="flexCheckDefault">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4">Cheque | Demand Draft</th>
                        <td>
                            <div class="form-check">
                                <input name="bora_invoice_payment_mode" class="form-check-input" type="radio" value="cheque" onchange="handleCheckboxChange(this)" id="flexCheckDefault">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4">Online (Bank Transfer/UPI)</th>
                        <td>
                            <div class="form-check">
                                <input name="bora_invoice_payment_mode" class="form-check-input" type="radio" value="online" id="flexCheckDefault" onchange="handleCheckboxChange(this)">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="paymentIdField" style="display: none;" class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-active">
                    <tr>
                        <th scope="col">Transaction ID</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div>
                                <input type="text" name="bora_invoice_payment_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive" id="chequeFields" style="display: none;">
            <table class="table table-bordered">
                <thead class="table-active">
                    <tr>
                        <th scope="col">Cheque Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div>
                                <input type="text" name="bora_invoice_cheque_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cheque Number | DD Number">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div>
                                <input type="text" name="bora_invoice_bank_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bank Name">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div>
                                <input type="text" name="bora_invoice_ifsc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bank IFSC Code">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>



        <div class="table-responsive mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="table-active">
                            <div class="receipt-calculation">
                                <h6>Discount:</h6>
                                <p id="difference"></p>
                            </div>
                        </th>
                        <th scope="col" class="table-active">
                            <div class="receipt-calculation">
                                <h6>Total Amount: </h6>
                                <p id="output"> </p>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>

        <button type="submit" name="update" class="btn btn-success mt-3">Update Receipt</button>
    </form>

</div>
<?php include('includes/footer.php') ?>