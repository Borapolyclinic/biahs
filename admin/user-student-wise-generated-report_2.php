<?php
include('includes/header.php');
include('components/navbar/user-navbar.php');
?>

<div class="container user-form-container">
    <div class="page-marker">
        <a href="user-reports.php">
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
                        <a href="user-reports.php" class="btn btn-primary">Go back</a>
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
                        <a href="user-reports.php" class="btn btn-primary">Go back</a>
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
                        <a href="user-reports.php" class="btn btn-primary">Go back</a>
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
                        <a href="user-reports.php" class="btn btn-primary">Go back</a>
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
                        <a href="user-reports.php" class="btn btn-primary">Go back</a>
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
                        <a href="user-reports.php" class="btn btn-primary">Go back</a>
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
                        $query = "SELECT * FROM `bora_invoice` WHERE `bora_invoice_student_en_no` LIKE '%$student_wise_data%' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                        $result = mysqli_query($connection, $query);
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
                        <form action="user-invoice-format.php" method="post" target="_blank">
                            <input type="text" name="bora_invoice_id" value="<?php echo $bora_invoice_id ?>" hidden>
                            <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>"
                                hidden>
                            <button type="submit" name="download" class="btn btn-sm btn-outline-success">SHOW
                                RECEIPT</button>
                        </form>
                    </td>
                    <?php } ?>

                    <?php if ($bora_invoice_payment_mode == 'cheque') { ?>
                    <td class="text-center">-</td>
                    <td>₹<?php echo $bora_invoice_grand_total ?></td>



                    <td>
                        <form action="user-invoice-format.php" method="post" target="_blank">
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
                ?>
                <div class="table-responsive">
                    <table class="w-100 table table-bordered">
                        <thead class="table-info">
                            <tr class="table-heading">
                                <th scope="col">TOTAL ANNUAL FEE</th>
                                <th scope="col">TOTAL COLLECTION (CASH + BANK)</th>
                                <th scope="col">DUE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
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

                                        if ($tenure == '1') { ?>
                                <td>₹<?php echo $year_1 ?></td>
                                <?php } elseif ($tenure == '2') { ?>
                                <td>₹<?php echo $year_1 + $year_2 ?></td>
                                <?php } elseif ($tenure == '3') { ?>
                                <td>₹<?php echo $year_1 + $year_2 +  $year_3 ?></td>
                                <?php } elseif ($tenure == '4') { ?>
                                <td>₹<?php echo $year_1 + $year_2 +  $year_3 + $year_4 ?> </td>
                                <?php
                                        }

                                        $fetch_cash = "SELECT SUM(`bora_invoice_grand_total`) AS `total_cash` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id'";
                                        $fetch_cash_r = mysqli_query($connection, $fetch_cash);
                                        $total_cash = "";
                                        while ($row = mysqli_fetch_assoc($fetch_cash_r)) {
                                            $total_cash = $row['total_cash'];
                                        } ?>
                                <td>₹<?php echo $total_cash ?> </td>
                                <?php
                                        if ($tenure == '1') { ?>
                                <td>₹<?php echo $year_1 - $total_cash ?></td>

                                <?php
                                        } elseif ($tenure == '2') { ?>
                                <td>₹<?php echo ($year_1 + $year_2) - $total_cash ?></td>
                                <?php } elseif ($tenure == '3') { ?>
                                <td>₹<?php echo ($year_1 + $year_2 + $year_3) - $total_cash ?></td>
                                <?php
                                        } elseif ($tenure == '4') { ?>
                                <td>₹<?php echo ($year_1 + $year_2 + $year_3 + $year_4) - $total_cash ?></td>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </tbody>
        </table>
    </div>
</div>

<?php include('includes/footer.php') ?>