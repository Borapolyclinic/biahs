<?php include('includes/header.php') ?>
<?php include('components/navbar/user-navbar.php') ?>


<div class="container user-form-container">
    <div class="page-marker">
        <a href="user-view-students.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Collect Fee</h5>
    </div>
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

    if (isset($_POST['collect'])) {
        $student_id = $_POST['student_id'];
        $fetch_data = "SELECT * FROM `bora_student` WHERE `student_id` = '$student_id'";
        $fetch_data_res = mysqli_query($connection, $fetch_data);

        $student_id = "";
        $student_batch = "";
        $student_name = "";
        $student_course_id = "";
        $student_contact = "";
        $student_roll = "";

        while ($row = mysqli_fetch_assoc($fetch_data_res)) {
            $student_id = $row['student_id'];
            $student_batch = $row['student_batch'];
            $student_name = $row['student_name'];
            $student_roll = $row['student_roll'];
            $student_course_id = $row['student_course'];
            $student_aadhar_address = $row['student_aadhar_address'];
            $student_contact = $row['student_contact'];
            $student_roll = $row['student_roll'];
            $student_batch = $row['student_batch'];
        }
    }

    ?>
    <form class="add-user-form" method="POST" action="generate-receipt.php">
        <input type="text" name="bora_invoice_student_id" value="<?php echo $student_id ?>" hidden>
        <input type="text" name="bora_invoice_student_en_no" value="<?php echo $student_roll ?>" hidden>

        <div class="receipt-upper-section">
            <img src="../assets/images/logo/brand-logo.webp" alt="">
            <p>Sewa Nagar, NH-24, Sitapur Road, Lucknow - 226201.
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
                                <h4><?php echo $student_name ?></h4>
                                <p><?php echo $student_aadhar_address ?> | <?php echo $student_contact ?></p>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="receipt-billing-info-row">
            <input type="text" name="bora_invoice_student" value="<?php echo $student_name ?>" hidden>
            <input type="text" name="bora_invoice_student_course_id" value="<?php echo $student_course_id ?>" hidden>
            <input type="text" name="bora_invoice_student_address" value="<?php echo $student_aadhar_address ?>" hidden>
            <input type="text" name="bora_invoice_student_contact" value="<?php echo $student_contact ?>" hidden>
            <input type="text" name="bora_invoice_student_batch" value="<?php echo $student_batch ?>" hidden>
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
                            <select name="invoice_for" class="form-select w-100" aria-label="Default select example">
                                <option selected>Click here to open menu</option>
                                <option value="Examination">Examination Fee</option>
                                <option value="Tution Fee">Tution Fee</option>
                                <option value="Admission Fee">Admission Fee</option>
                                <option value="Clinical Lab Fee">Clinical Lab Fee</option>
                                <option value="Library Fee">Library Fee</option>
                                <option value="Uniform Fee">Uniform Fee</option>
                                <option value="SNA Charges">SNA Charges</option>
                                <option value="Transport Fee">Transport Fee</option>
                                <option value="Miscellaneous">Miscellaneous Fee</option>
                                <option value="Security Deposit">Security Deposit</option>
                            </select>
                        </th>
                        <td style="width: 15%;">
                            <?php
                            $get_course = "SELECT * FROM `bora_course` WHERE `course_id` = '$student_course_id'";
                            $get_course_res = mysqli_query($connection, $get_course);
                            $course_name = "";
                            while ($row = mysqli_fetch_assoc($get_course_res)) {
                                $course_name = $row['course_name'];
                            }
                            echo $course_name;
                            ?>
                        </td>
                        <td>

                            <select name="invoice_tenure" class="form-select w-100" aria-label="Default select example">
                                <option selected>Click here to open menu</option>
                                <?php
                                $fetch_course_name = "SELECT * FROM `bora_course` WHERE `course_id` = '$student_course_id'";
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
                                if ($course_tenure == '1') { ?>
                                    <option value="Year 1">Year 1</option>
                                <?php }
                                if ($course_tenure == '2') { ?>
                                    <option value="Year 1">Year 1 </option>
                                    <option value="Year 2">Year 2 </option>
                                <?php }
                                if ($course_tenure == '3') { ?>
                                    <option value="Year 1">Year 1 </option>
                                    <option value="Year 2">Year 2 </option>
                                    <option value="Year 3">Year 3 </option>
                                <?php }
                                if ($course_tenure == '4') { ?>
                                    <option value="Year 1">Year 1 </option>
                                    <option value="Year 2">Year 2 </option>
                                    <option value="Year 3">Year 3 </option>
                                    <option value="Year 4">Year 4 </option>
                                <?php } ?>
                            </select>
                            <input type="text" name="bora_invoice_tenure_id" value="<?php echo $course_tenure ?>" hidden>
                        </td>

                        <td>

                            <div>
                                <input type="number" name="invoice_value" id="collectingAmount" class="form-control" id="exampleFormControlInput1" placeholder="">
                            </div>
                        </td>

                        <td>
                            <div>
                                <input type="number" name="invoice_disc" id="discount" class="form-control" id="exampleFormControlInput1" placeholder="">
                            </div>
                        </td>

                    </tr>
                </tbody>
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
                    <!-- <tr>
                        <td>
                            <div>
                                <input type="text" name="bora_invoice_payment_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Transaction ID (if in case online)">
                            </div>
                        </td>
                    </tr> -->

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

        <button type="submit" name="generate" class="btn btn-success mt-3">Generate Receipt</button>
    </form>

</div>
<?php include('includes/footer.php') ?>