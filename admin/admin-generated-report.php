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


        <table class="w-100 table table-bordered">
            <thead>
                <tr>
                    <th scope="col">NAME</th>
                    <th scope="col">UID</th>
                    <th scope="col">CONTACT</th>
                    <th scope="col">COURSE</th>
                    <th scope="col">ADMISSION YEAR</th>
                    <th scope="col">RECEIPT NUMBER</th>
                    <th scope="col">RECEIPT DATE</th>
                    <th scope="col">FEE TYPE</th>
                    <th scope="col">PAID FOR</th>
                    <th scope="col">CASH</th>
                    <th scope="col">BANK</th>
                    <th scope="col">DUE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('includes/connection.php');

                // =========== STUDENT WISE ===========
                if (isset($_POST['generate_student_wise'])) {
                    $date_from = date('Y-m-d', strtotime($_POST['date_from']));
                    $date_to = date('Y-m-d', strtotime($_POST['date_to']));
                    $selected_radio = $_POST['selected_radio'];
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
                    <th scope="row"><?php echo $bora_invoice_student ?></th>
                    <td><?php echo $bora_invoice_student_en_no ?></td>
                    <td><?php echo $bora_invoice_student_contact ?></td>

                    <td><?php echo $bora_invoice_student_course; ?></td>
                    <td><?php echo $bora_invoice_student_admission_year ?></td>
                    <td><?php echo $bora_invoice_number ?></td>
                    <td><?php echo $bora_invoice_date ?></td>
                    <td><?php echo $bora_invoice_for ?></td>
                    <td><?php echo $bora_invoice_tenure ?></td>

                    <?php if ($bora_invoice_payment_mode == 'cash') { ?>
                    <td>₹<?php echo $bora_invoice_grand_total ?></td>
                    <td>NA</td>
                    <td>NA</td>
                    <td>
                        <form action="" method="post">
                            <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>"
                                hidden>
                            <button class="btn btn-sm btn-outline-success">SHOW INVOICE</button>
                        </form>
                    </td>
                    <?php } ?>

                    <?php if ($bora_invoice_payment_mode == 'cheque' || $bora_invoice_payment_mode == 'online') { ?>
                    <td>NA</td>
                    <td>₹<?php echo $bora_invoice_grand_total ?></td>

                    <td>
                        <form action="" method="post">
                            <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>"
                                hidden>
                            <button class="btn btn-sm btn-outline-success">SHOW RECEIPT</button>
                        </form>
                    </td>
                    <?php } ?>
                </tr>
                <?php
                        }
                    }
                }

                // =========== BATCH WISE ===========
                if (isset($_POST['generate_batch_wise'])) {
                    $date_from = date('Y-m-d', strtotime($_POST['date_from']));
                    $date_to = date('Y-m-d', strtotime($_POST['date_to']));
                    $selected_radio = $_POST['selected_radio'];
                    $batch_wise_course = $_POST['batch_wise_course'];
                    $batch_wise_year = $_POST['batch_wise_year'];

                    if ($date_from == '1970-01-01') {
                        echo "<script>dateFromModal()</script>";
                    } else if ($date_to == '1970-01-01') {
                        echo "<script>dateToModal()</script>";
                    } else if ($batch_wise_course == 'null') {
                        echo "<script>batchWiseModal()</script>";
                    } else if (empty($batch_wise_year)) {
                        echo "<script>batchWiseDataModal()</script>";
                    } else {
                        $batch_query = "SELECT * FROM `bora_invoice` WHERE `bora_invoice_student_course_id` = '$batch_wise_course' AND `bora_invoice_student_admission_year` = '$batch_wise_year'";
                        $batch_query .= "AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";


                        $res = mysqli_query($connection, $batch_query);

                        while ($row = mysqli_fetch_assoc($res)) {
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
                    <th scope="row"><?php echo $bora_invoice_student ?></th>
                    <td><?php echo $bora_invoice_student_en_no ?></td>
                    <td><?php echo $bora_invoice_student_contact ?></td>

                    <td><?php echo $bora_invoice_student_course; ?></td>
                    <td><?php echo $bora_invoice_student_admission_year ?></td>
                    <td><?php echo $bora_invoice_number ?></td>
                    <td><?php echo $bora_invoice_date ?></td>
                    <td><?php echo $bora_invoice_for ?></td>
                    <td><?php echo $bora_invoice_tenure ?></td>

                    <?php if ($bora_invoice_payment_mode == 'cash') { ?>
                    <td>₹<?php echo $bora_invoice_grand_total ?></td>
                    <td>NA</td>
                    <td>NA</td>
                    <td>
                        <form action="" method="post">
                            <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>"
                                hidden>
                            <button class="btn btn-sm btn-outline-success">SHOW INVOICE</button>
                        </form>
                    </td>
                    <?php } ?>

                    <?php if ($bora_invoice_payment_mode == 'cheque' || $bora_invoice_payment_mode == 'online') { ?>
                    <td>NA</td>
                    <td>₹<?php echo $bora_invoice_grand_total ?></td>

                    <td>
                        <form action="" method="post">
                            <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>"
                                hidden>
                            <button class="btn btn-sm btn-outline-success">SHOW RECEIPT</button>
                        </form>
                    </td>
                    <?php } ?>
                </tr>
                <?php
                        }
                    }
                } ?>

            </tbody>
        </table>
    </div>
</div>

<?php include('includes/footer.php') ?>