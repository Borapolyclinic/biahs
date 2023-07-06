<?php
include('includes/header.php');
include('components/navbar/admin-navbar.php');
?>

<div class="container user-form-container">
    <div class="page-marker">
        <a href="admin-reports.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Generated Report</h5>
    </div>
    <div class="user-table table-responsive">
        <script>
        function dateFromModal() {
            $(document).ready(function() {
                $("#dateFrom").modal("show");
            });
        }

        function dateToModal() {
            $(document).ready(function() {
                $("#dateTo").modal("show");
            });
        }

        function studentWiseModal() {
            $(document).ready(function() {
                $("#studentWise").modal("show");
            });
        }

        function studentWiseDataModal() {
            $(document).ready(function() {
                $("#studentWiseData").modal("show");
            });
        }

        function batchWiseModal() {
            $(document).ready(function() {
                $("#batchWise").modal("show");
            });
        }

        function batchWiseDataModal() {
            $(document).ready(function() {
                $("#batchWiseYear").modal("show");
            });
        }
        </script>

        <!-- ========================================================================================================================================== 
                                                                        MODAL SECTION 
        ============================================================================================================================================== -->

        <!-- ======================= DATE FROM MODAL ======================= -->
        <div class="modal fade hide" id="dateFrom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>Please select Date From Range!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <a href="admin-reports.php" class="btn btn-primary">Go back</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======================= DATE TO MODAL ======================= -->
        <div class="modal fade hide" id="dateTo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>Please select Date To Range!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <a href="admin-reports.php" class="btn btn-primary">Go back</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======================= STUDENT WISE MODAL ======================= -->
        <div class="modal fade hide" id="studentWise" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>Please select search category!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <a href="admin-reports.php" class="btn btn-primary">Go back</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======================= STUDENT WISE DATA MODAL ======================= -->
        <div class="modal fade hide" id="studentWiseData" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>Search field cannot be empty after selecting Student Wise!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <a href="admin-reports.php" class="btn btn-primary">Go back</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======================= BATCH WISE MODAL ======================= -->
        <div class="modal fade hide" id="batchWise" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>Please select course!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <a href="admin-reports.php" class="btn btn-primary">Go back</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======================= BATCH WISE YEAR MODAL ======================= -->
        <div class="modal fade hide" id="batchWiseYear" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>Please enter year!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <a href="admin-reports.php" class="btn btn-primary">Go back</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================================================================================================================================== 
                                                                        STUDENT WISE 
        ============================================================================================================================================== -->
        <?php
        require('includes/connection.php');
        if (isset($_POST['generate_student_wise'])) {
            $date_from = date('Y-m-d', strtotime($_POST['date_from']));
            $date_to = date('Y-m-d', strtotime($_POST['date_to']));
            // $selected_radio = $_POST['selected_radio'];
            $student_wise_data = $_POST['student_wise_data'];
            if ($date_from == '1970-01-01') {
                echo "<script>dateFromModal()</script>";
            } else if ($date_to == '1970-01-01') {
                echo "<script>dateToModal()</script>";
            } else if (empty($student_wise_data)) {
                echo "<script>studentWiseDataModal()</script>";
            } else {
                $query = "SELECT * FROM `bora_invoice` WHERE `bora_invoice_student_en_no` LIKE '%$student_wise_data%' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                $result = mysqli_query($connection, $query);

                $bora_invoice_student = "";
                $bora_invoice_student_en_no = "";
                $bora_invoice_student_contact = "";
                $bora_invoice_student_course = "";
                $bora_invoice_student_admission_year = "";

                while ($row = mysqli_fetch_assoc($result)) {
                    $bora_invoice_student = $row['bora_invoice_student'];
                    $bora_invoice_student_en_no = $row['bora_invoice_student_en_no'];
                    $bora_invoice_student_contact = $row['bora_invoice_student_contact'];
                    $bora_invoice_student_course = $row['bora_invoice_student_course'];
                    $bora_invoice_student_admission_year = $row['bora_invoice_student_admission_year'];
                }
            }
        }
        ?>
        <div class="table-responsive w-100">
            <table class="w-100 table table-bordered table-striped ">
                <thead class="table-secondary">
                    <tr class="table-heading">
                        <th scope="col">NAME</th>
                        <th scope="col">UID</th>
                        <th scope="col">CONTACT</th>
                        <th scope="col">COURSE</th>
                        <th scope="col">ADMISSION YEAR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $bora_invoice_student ?></td>
                        <td><?php echo $bora_invoice_student_en_no ?></td>
                        <td><?php echo $bora_invoice_student_contact ?></td>
                        <td><?php echo $bora_invoice_student_course ?></td>
                        <td><?php echo $bora_invoice_student_admission_year ?></td>
                    </tr>
                </tbody>
            </table>
        </div>


        <table class="w-100 table table-bordered">
            <thead>
                <tr class="table-heading">
                    <th scope="col">RECEIPT NUMBER</th>
                    <th scope="col">RECEIPT DATE</th>
                    <th scope="col">FEE TYPE</th>
                    <th scope="col">PAID FOR</th>
                    <th scope="col">CASH</th>
                    <th scope="col">BANK</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php


                // =========== STUDENT WISE ===========
                if (isset($_POST['generate_student_wise'])) {
                    $date_from = date('Y-m-d', strtotime($_POST['date_from']));
                    $date_to = date('Y-m-d', strtotime($_POST['date_to']));
                    // $selected_radio = $_POST['selected_radio'];
                    $student_wise_data = $_POST['student_wise_data'];

                    if ($date_from == '1970-01-01') {
                        echo "<script>dateFromModal()</script>";
                    } else if ($date_to == '1970-01-01') {
                        echo "<script>dateToModal()</script>";
                    } else if (empty($student_wise_data)) {
                        echo "<script>studentWiseDataModal()</script>";
                    } else {
                        $query = "SELECT * FROM `bora_invoice` WHERE `bora_invoice_student_en_no` LIKE '%$student_wise_data%' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to' ORDER BY `bora_invoice_number` DESC";
                        $result = mysqli_query($connection, $query);
                        $count = mysqli_num_rows($result);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $bora_invoice_id = $row['bora_invoice_id'];
                                $bora_invoice_number = $row['bora_invoice_number'];
                                $bora_invoice_student_id = $row['bora_invoice_student_id'];
                                $bora_invoice_student = $row['bora_invoice_student'];
                                $bora_invoice_student_en_no = $row['bora_invoice_student_en_no'];
                                $bora_invoice_student_contact = $row['bora_invoice_student_contact'];
                                $bora_invoice_student_course = $row['bora_invoice_student_course'];
                                $bora_invoice_for = $row['bora_invoice_for'];
                                $bora_invoice_tenure = $row['bora_invoice_tenure'];
                                $bora_invoice_payment_mode = $row['bora_invoice_payment_mode'];
                                $bora_invoice_grand_total = $row['bora_invoice_grand_total'];
                                $bora_invoice_student_admission_year = $row['bora_invoice_student_admission_year'];
                                $bora_invoice_date = $row['bora_invoice_date'];
                ?>
                <tr>
                    <td><?php echo $bora_invoice_number ?></td>
                    <td><?php echo $bora_invoice_date ?></td>
                    <td><?php echo $bora_invoice_for ?></td>
                    <td><?php echo $bora_invoice_tenure ?></td>

                    <?php if ($bora_invoice_payment_mode == 'cash') { ?>
                    <td>₹<?php echo $bora_invoice_grand_total ?></td>
                    <td class="text-center">-</td>

                    <td>
                        <form action="admin-receipt-format.php" method="post" target="_blank">
                            <input type="text" name="bora_invoice_id" value="<?php echo $bora_invoice_id ?>" hidden>
                            <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>"
                                hidden>
                            <button type="submit" name="download" class="btn btn-sm btn-outline-success">SHOW
                                RECEIPT</button>
                        </form>
                    </td>
                    <?php } ?>

                    <?php if ($bora_invoice_payment_mode == 'cheque' || $bora_invoice_payment_mode == 'online') { ?>
                    <td class="text-center">-</td>
                    <td>₹<?php echo $bora_invoice_grand_total ?></td>



                    <td>
                        <form action="admin-receipt-format.php" method="post" target="_blank">
                            <input type="text" name="bora_invoice_id" value="<?php echo $bora_invoice_id ?>" hidden>
                            <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>"
                                hidden>
                            <button type="submit" name="download" class="btn btn-sm btn-outline-success">SHOW
                                RECEIPT</button>
                        </form>
                    </td>
                    <?php } ?>
                </tr>
                <?php
                            }
                        }
                    }
                }
                ?>
                <div class="table-responsive">
                    <table class="w-100 table table-bordered">
                        <thead class="table-info">
                            <tr class="table-heading">
                                <th scope="col">YEAR</th>
                                <th scope="col">FEE</th>
                                <th scope="col">CASH</th>
                                <th scope="col">BANK</th>
                                <th scope="col">TOTAL COLLECTION (CASH + BANK)</th>
                                <th scope="col">DUE</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($_POST['generate_student_wise'])) {
                                $date_from = date('Y-m-d', strtotime($_POST['date_from']));
                                $date_to = date('Y-m-d', strtotime($_POST['date_to']));
                                // echo "Date From: " . $date_from . "<br>";
                                // echo "Date To: " . $date_to . "<br>";
                                // $selected_radio = $_POST['selected_radio'];
                                $student_wise_data = $_POST['student_wise_data'];
                                if ($date_from == '1970-01-01') {
                                    echo "<script>dateFromModal()</script>";
                                } elseif ($date_to == '1970-01-01') {
                                    echo "<script>dateToModal()</script>";
                                } elseif (empty($student_wise_data)) {
                                    echo "<script>studentWiseDataModal()</script>";
                                } else {
                                    $query = "SELECT * FROM `bora_invoice` WHERE `bora_invoice_student_en_no` LIKE '%$student_wise_data%' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                                    $result = mysqli_query($connection, $query);
                                    $count = mysqli_num_rows($result);

                                    if ($count > 0) {
                                        $bora_invoice_student_id = "";
                                        $bora_invoice_student_course_id = "";
                                        $bora_invoice_payment_mode = "";

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $bora_invoice_student_id = $row['bora_invoice_student_id'];
                                            $bora_invoice_student_course_id = $row['bora_invoice_student_course_id'];
                                            $bora_invoice_payment_mode = $row['bora_invoice_payment_mode'];
                                        }
                                        $fetch_course_details = "SELECT * FROM `bora_course` WHERE `course_id` = '$bora_invoice_student_course_id'";
                                        $fetch_course_details_r = mysqli_query($connection, $fetch_course_details);
                                        $tenure = "";
                                        $year_1 = "";
                                        $year_2 = "";
                                        $year_3 = "";
                                        $year_4 = "";
                                        while ($row = mysqli_fetch_assoc($fetch_course_details_r)) {
                                            $tenure = $row['course_tenure'];
                                            $year_1 = $row['course_year_1_fee'];
                                            $year_2 = $row['course_year_2_fee'];
                                            $year_3 = $row['course_year_3_fee'];
                                            $year_4 = $row['course_year_4_fee'];
                                        }
                            ?>
                            <?php
                                        // echo "YEAR 1 Date From: " . $date_from . "<br>";
                                        // echo "YEAR 1 Date To: " . $date_to . "<br>";
                                        $fetch_cash = "SELECT SUM(`bora_invoice_grand_total`) AS `total_cash_year_1` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cash' AND `bora_invoice_tenure` = 'Year 1' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                                        $fetch_cash_r = mysqli_query($connection, $fetch_cash);
                                        $total_cash_year_1 = "";
                                        while ($row = mysqli_fetch_assoc($fetch_cash_r)) {
                                            $total_cash_year_1 = $row['total_cash_year_1'];
                                        }

                                        $fetch_grand_total_cash = "SELECT SUM(`bora_invoice_grand_total`) AS `grand_total_cash_year_1` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cash' AND `bora_invoice_tenure` = 'Year 1'";
                                        $fetch_grand_total_cash_r = mysqli_query($connection, $fetch_grand_total_cash);
                                        $grand_total_cash_year_1 = "";
                                        while ($row = mysqli_fetch_assoc($fetch_grand_total_cash_r)) {
                                            $grand_total_cash_year_1 = $row['grand_total_cash_year_1'];
                                        }

                                        $fetch_cheque_year_1 = "SELECT SUM(`bora_invoice_grand_total`) AS `total_cheque_year_1` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cheque' AND `bora_invoice_tenure` = 'Year 1' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                                        $fetch_cheque_year_1_r = mysqli_query($connection, $fetch_cheque_year_1);
                                        $total_cheque_year_1 = "";
                                        while ($row = mysqli_fetch_assoc($fetch_cheque_year_1_r)) {
                                            $total_cheque_year_1 = $row['total_cheque_year_1'];
                                        }

                                        $fetch_grand_total_cheque_year_1 = "SELECT SUM(`bora_invoice_grand_total`) AS `grand_total_cheque_year_1` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cheque' AND `bora_invoice_tenure` = 'Year 1'";
                                        $fetch_grand_total_cheque_year_1_r = mysqli_query($connection, $fetch_grand_total_cheque_year_1);
                                        $grand_total_cheque_year_1 = "";
                                        while ($row = mysqli_fetch_assoc($fetch_grand_total_cheque_year_1_r)) {
                                            $grand_total_cheque_year_1 = $row['grand_total_cheque_year_1'];
                                        }
                                        ?>
                            <tr>
                                <td>YEAR 1</td>
                                <td><?php echo $year_1  ?></td>
                                <td><?php echo $total_cash_year_1 ?></td>
                                <td><?php echo $total_cheque_year_1 ?></td>
                                <td><?php $total_cash_bank = $total_cash_year_1 + $total_cheque_year_1;
                                                echo $total_cash_bank; ?>
                                </td>
                                <td>
                                    <?php
                                                $grand_total_year_1 = $grand_total_cash_year_1 + $grand_total_cheque_year_1;
                                                $total_remainder = $year_1  - $grand_total_year_1;
                                                echo $total_remainder;
                                                ?>
                                </td>
                            </tr>

                            <?php
                                        $fetch_cash_2 = "SELECT SUM(`bora_invoice_grand_total`) AS `total_cash_year_2` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cash' AND `bora_invoice_tenure` = 'Year 2' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                                        $fetch_cash_2_r = mysqli_query($connection, $fetch_cash_2);
                                        $total_cash_year_2 = "";
                                        while ($row = mysqli_fetch_assoc($fetch_cash_2_r)) {
                                            $total_cash_year_2 = $row['total_cash_year_2'];
                                        }

                                        $grand_total_fetch_cash_2 = "SELECT SUM(`bora_invoice_grand_total`) AS `grand_total_total_cash_year_2` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cash' AND `bora_invoice_tenure` = 'Year 2'";
                                        $grand_total_fetch_cash_2_r = mysqli_query($connection, $grand_total_fetch_cash_2);
                                        $grand_total_total_cash_year_2 = "";
                                        while ($row = mysqli_fetch_assoc($grand_total_fetch_cash_2_r)) {
                                            $grand_total_total_cash_year_2 = $row['grand_total_total_cash_year_2'];
                                        }

                                        $fetch_cheque_year_2 = "SELECT SUM(`bora_invoice_grand_total`) AS `total_cheque_year_2` FROM `bora_invoice`  WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cheque' AND `bora_invoice_tenure` = 'Year 2' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                                        $fetch_cheque_year_2_r = mysqli_query($connection, $fetch_cheque_year_2);
                                        $total_cheque_year_2 = "";
                                        while ($row = mysqli_fetch_assoc($fetch_cheque_year_2_r)) {
                                            $total_cheque_year_2 = $row['total_cheque_year_2'];
                                        }

                                        $grand_total_fetch_cheque_year_2 = "SELECT SUM(`bora_invoice_grand_total`) AS `grand_total_cheque_year_2` FROM `bora_invoice`  WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cheque' AND `bora_invoice_tenure` = 'Year 2'";
                                        $grand_total_fetch_cheque_year_2_r = mysqli_query($connection, $grand_total_fetch_cheque_year_2);
                                        $grand_total_cheque_year_2 = "";
                                        while ($row = mysqli_fetch_assoc($grand_total_fetch_cheque_year_2_r)) {
                                            $grand_total_cheque_year_2 = $row['grand_total_cheque_year_2'];
                                        }

                                        ?>

                            <tr>
                                <td>YEAR 2</td>
                                <td><?php echo $year_2  ?></td>
                                <td><?php echo $total_cash_year_2 ?></td>
                                <td><?php echo $total_cheque_year_2 ?></td>
                                <td><?php $total_cash_bank = $total_cash_year_2 + $total_cheque_year_2;
                                                echo $total_cash_bank; ?>
                                </td>
                                <td>
                                    <?php
                                                $grand_total_year_2 = $grand_total_total_cash_year_2 + $grand_total_cheque_year_2;
                                                $total_remainder_2 = $year_2  - $grand_total_year_2;
                                                echo $total_remainder_2;
                                                ?>
                                </td>
                            </tr>

                            <?php
                                        $fetch_cash_3 = "SELECT SUM(`bora_invoice_grand_total`) AS `total_cash_year_3` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cash' AND `bora_invoice_tenure` = 'Year 3' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                                        $fetch_cash_3_r = mysqli_query($connection, $fetch_cash_3);
                                        $total_cash_year_3 = "";
                                        while ($row = mysqli_fetch_assoc($fetch_cash_3_r)) {
                                            $total_cash_year_3 = $row['total_cash_year_3'];
                                        }

                                        $grand_total_fetch_cash_3 = "SELECT SUM(`bora_invoice_grand_total`) AS `grand_total_cash_year_3` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cash' AND `bora_invoice_tenure` = 'Year 3'";
                                        $grand_total_fetch_cash_3_r = mysqli_query($connection, $grand_total_fetch_cash_3);
                                        $grand_total_cash_year_3 = "";
                                        while ($row = mysqli_fetch_assoc($grand_total_fetch_cash_3_r)) {
                                            $grand_total_cash_year_3 = $row['grand_total_cash_year_3'];
                                        }

                                        $fetch_cheque_year_3 = "SELECT SUM(`bora_invoice_grand_total`) AS `total_cheque_year_3` FROM `bora_invoice`  WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cheque' AND `bora_invoice_tenure` = 'Year 3' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                                        $fetch_cheque_year_3_r = mysqli_query($connection, $fetch_cheque_year_3);
                                        $total_cheque_year_3 = "";
                                        while ($row = mysqli_fetch_assoc($fetch_cheque_year_3_r)) {
                                            $total_cheque_year_3 = $row['total_cheque_year_3'];
                                        }

                                        $grand_fetch_cheque_year_3 = "SELECT SUM(`bora_invoice_grand_total`) AS `grand_total_cheque_year_3` FROM `bora_invoice`  WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cheque' AND `bora_invoice_tenure` = 'Year 3'";
                                        $grand_fetch_cheque_year_3_r = mysqli_query($connection, $grand_fetch_cheque_year_3);
                                        $grand_total_cheque_year_3 = "";
                                        while ($row = mysqli_fetch_assoc($grand_fetch_cheque_year_3_r)) {
                                            $grand_total_cheque_year_3 = $row['grand_total_cheque_year_3'];
                                        }
                                        ?>
                            <tr>
                                <td>YEAR 3</td>
                                <td><?php echo $year_3  ?></td>
                                <td><?php echo $total_cash_year_3 ?></td>
                                <td><?php echo $total_cheque_year_3 ?></td>
                                <td><?php $total_cash_bank = $total_cash_year_3 + $total_cheque_year_3;
                                                echo $total_cash_bank; ?>
                                </td>
                                <!-- <td>
                                                <?php
                                                $total_remainder = $year_3 - $total_cash_bank;
                                                echo $total_remainder;
                                                ?>
                                            </td> -->
                                <td>
                                    <?php
                                                $grand_total_year_3 = $grand_total_cash_year_3 + $grand_total_cheque_year_3;
                                                $total_remainder_3 = $year_3  - $grand_total_year_3;
                                                echo $total_remainder_3;
                                                ?>
                                </td>
                            </tr>

                            <?php
                                        $fetch_cash_4 = "SELECT SUM(`bora_invoice_grand_total`) AS `total_cash_year_4` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cash' AND `bora_invoice_tenure` = 'Year 4' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                                        $fetch_cash_4_r = mysqli_query($connection, $fetch_cash_4);
                                        $total_cash_year_4 = "";
                                        while ($row = mysqli_fetch_assoc($fetch_cash_4_r)) {
                                            $total_cash_year_4 = $row['total_cash_year_4'];
                                        }

                                        $grand_fetch_cash_4 = "SELECT SUM(`bora_invoice_grand_total`) AS `grand_total_cash_year_4` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cash' AND `bora_invoice_tenure` = 'Year 4'";
                                        $grand_fetch_cash_4_r = mysqli_query($connection, $grand_fetch_cash_4);
                                        $grand_total_cash_year_4 = "";
                                        while ($row = mysqli_fetch_assoc($grand_fetch_cash_4_r)) {
                                            $grand_total_cash_year_4 = $row['grand_total_cash_year_4'];
                                        }

                                        $fetch_cheque_year_4 = "SELECT SUM(`bora_invoice_grand_total`) AS `total_cheque_year_4` FROM `bora_invoice`  WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cheque' AND `bora_invoice_tenure` = 'Year 4' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                                        $fetch_cheque_year_4_r = mysqli_query($connection, $fetch_cheque_year_4);
                                        $total_cheque_year_4 = "";
                                        while ($row = mysqli_fetch_assoc($fetch_cheque_year_4_r)) {
                                            $total_cheque_year_4 = $row['total_cheque_year_4'];
                                        }

                                        $grand_fetch_cheque_year_4 = "SELECT SUM(`bora_invoice_grand_total`) AS `grand_total_cheque_year_4` FROM `bora_invoice`  WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cheque' AND `bora_invoice_tenure` = 'Year 4'";
                                        $grand_fetch_cheque_year_4_r = mysqli_query($connection, $grand_fetch_cheque_year_4);
                                        $grand_total_cheque_year_4 = "";
                                        while ($row = mysqli_fetch_assoc($grand_fetch_cheque_year_4_r)) {
                                            $grand_total_cheque_year_4 = $row['grand_total_cheque_year_4'];
                                        }
                                        ?>
                            <tr>
                                <td>YEAR 4</td>
                                <td><?php echo $year_4  ?></td>
                                <td><?php echo $total_cash_year_4 ?></td>
                                <td><?php echo $total_cheque_year_4 ?></td>
                                <td><?php $total_cash_bank = $total_cash_year_4 + $total_cheque_year_4;
                                                echo $total_cash_bank; ?>
                                </td>
                                <!-- <td>
                                                <?php
                                                $total_remainder = $year_4 - $total_cash_bank;
                                                echo $total_remainder;
                                                ?>
                                            </td> -->
                                <td>
                                    <?php
                                                $grand_total_year_4 = $grand_total_cash_year_4 + $grand_total_cheque_year_4;
                                                $total_remainder_4 = $year_4  - $grand_total_year_4;
                                                echo $total_remainder_4;
                                                ?>
                                </td>
                            </tr>
                            <?php
                                    } else if ($count == '0') { ?>

                            <div class="w-100 mt-3 mb-3 alert alert-danger" role="alert">No Receipts generated for this
                                student.</div>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </tbody>
        </table>
    </div>
</div>

<?php include('includes/footer.php') ?>