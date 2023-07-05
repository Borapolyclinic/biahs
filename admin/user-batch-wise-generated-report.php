<?php
include('includes/header.php');
include('components/navbar/user-navbar.php');
?>
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

<!-- ======================= BATCH WISE MODAL ======================= -->
<div class="modal fade hide" id="batchWise" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade hide" id="batchWiseYear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<div class="container user-form-container">
    <div class="page-marker">
        <a href="admin-reports.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Generated Report</h5>
    </div>


    <!-- ========================================================================================================================================== 
                                                                    BATCH WISE 
    ============================================================================================================================================== -->

    <div class="user-table table-responsive w-100 mb-3">
        <table class="w-100 table table-bordered table-striped ">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">COURSE</th>
                    <th scope="col">ADMISSION YEAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('includes/connection.php');
                if (isset($_POST['generate_batch_wise'])) {
                    $date_from = $_POST['date_from'];
                    $date_to = $_POST['date_to'];
                    $batch_wise_course = $_POST['batch_wise_course'];
                    $batch_wise_year = $_POST['batch_wise_year'];

                    $fetch = "SELECT * FROM `bora_invoice` WHERE `bora_invoice_student_course_id` = '$batch_wise_course' AND `bora_invoice_student_admission_year` = '$batch_wise_year' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                    $fetch_r = mysqli_query($connection, $fetch);
                    $bora_invoice_student_course = "";
                    $bora_invoice_student_admission_year = "";
                    while ($row = mysqli_fetch_assoc($fetch_r)) {
                        $bora_invoice_student_course = $row['bora_invoice_student_course'];
                        $bora_invoice_student_admission_year = $row['bora_invoice_student_admission_year'];
                    }
                }
                ?>
                <tr>
                    <td><?php echo $bora_invoice_student_course ?></td>
                    <td><?php echo $bora_invoice_student_admission_year ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="user-table table-responsive w-100">
        <table class="w-100 table table-bordered">
            <thead class="table-secondary">
                <tr class="table-heading">
                    <th scope="col">STUDENT NAME</th>
                    <th scope="col">UID</th>
                    <th scope="col">CONTACT NUMBER</th>
                    <th scope="col">CASH</th>
                    <th scope="col">BANK</th>
                    <th scope="col">CASH + BANK</th>
                    <th scope="col">DUE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['generate_batch_wise'])) {
                    $date_from = $_POST['date_from'];
                    $date_to = $_POST['date_to'];
                    $batch_wise_course = $_POST['batch_wise_course'];
                    $batch_wise_year = $_POST['batch_wise_year'];

                    $fetch_invoice = "SELECT * FROM `bora_invoice` WHERE `bora_invoice_student_course_id` = '$batch_wise_course' AND `bora_invoice_student_admission_year` = '$batch_wise_year' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to' GROUP BY `bora_invoice_student_id` ORDER BY `bora_invoice_number` DESC";
                    $fetch_invoice_r = mysqli_query($connection, $fetch_invoice);
                    while ($row_new = mysqli_fetch_assoc($fetch_invoice_r)) {
                        $bora_invoice_student_id = $row_new['bora_invoice_student_id'];
                        $bora_invoice_student = $row_new['bora_invoice_student'];
                        $bora_invoice_student_en_no = $row_new['bora_invoice_student_en_no'];
                        $bora_invoice_student_contact = $row_new['bora_invoice_student_contact'];
                        $bora_invoice_payment_mode = $row_new['bora_invoice_payment_mode'];
                        $bora_invoice_grand_total = $row_new['bora_invoice_grand_total'];


                        $fetch_total_cash = "SELECT SUM(`bora_invoice_grand_total`) AS `total_cash` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cash'";
                        $fetch_total_cash_r = mysqli_query($connection, $fetch_total_cash);
                        $total_cash = "";
                        while ($row = mysqli_fetch_assoc($fetch_total_cash_r)) {
                            $total_cash = $row['total_cash'];
                        }

                        $fetch_total_bank = "SELECT SUM(`bora_invoice_grand_total`) AS `total_bank` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cheque' OR `bora_invoice_payment_mode` = 'online'";
                        $fetch_total_bank_r = mysqli_query($connection, $fetch_total_bank);
                        $total_bank = "";
                        while ($row = mysqli_fetch_assoc($fetch_total_bank_r)) {
                            $total_bank = $row['total_bank'];
                        }
                ?>
                        <tr>
                            <td><?php echo $bora_invoice_student  ?></td>
                            <td><?php echo $bora_invoice_student_en_no  ?></td>
                            <td><?php echo $bora_invoice_student_contact  ?></td>

                            <td><?php echo $total_cash  ?></td>
                            <td><?php echo $total_bank  ?></td>
                            <td><?php echo $total_cash + $total_bank ?></td>
                            <td>
                                <?php
                                $fetch_due = "SELECT * FROM `bora_course` WHERE `course_id` = '$batch_wise_course'";
                                $fetch_due_r = mysqli_query($connection, $fetch_due);
                                $tenure = "";
                                $year_1 = "";
                                $year_2 = "";
                                $year_3 = "";
                                $year_4 = "";
                                while ($row = mysqli_fetch_assoc($fetch_due_r)) {
                                    $tenure = $row['course_tenure'];
                                    $year_1 = $row['course_year_1_fee'];
                                    $year_2 = $row['course_year_2_fee'];
                                    $year_3 = $row['course_year_3_fee'];
                                    $year_4 = $row['course_year_4_fee'];
                                } ?>

                                <?php if ($tenure == '1') { ?>
                                    ₹<?php echo $year_1 - ($total_cash + $total_bank) ?>
                                <?php }
                                if ($tenure == '2') { ?>
                                    ₹<?php echo ($year_1 + $year_2) - ($total_cash + $total_bank) ?>
                                <?php }
                                if ($tenure == '3') { ?>
                                    ₹<?php echo ($year_1 + $year_2 + $year_3) - ($total_cash + $total_bank) ?>
                                <?php }
                                if ($tenure == '4') { ?>
                                    ₹<?php echo ($year_1 + $year_2 +  $year_3 + $year_4) - ($total_cash + $total_bank) ?>

                                <?php
                                }
                                ?>

                            <td>
                                <form target="_blank" action="user-student-wise-generated-report.php" method="POST">
                                    <input type="text" name="date_to" value="<?php echo $date_to ?>" hidden>
                                    <input type="text" name="date_from" value="<?php echo $date_from ?>" hidden>
                                    <input type="text" name="student_wise_data" value="<?php echo $bora_invoice_student_en_no ?>" hidden>
                                    <button type="submit" name="generate_student_wise" class="btn btn-sm btn-success">Get
                                        Details</button>
                                </form>
                            </td>

                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>







</div>


<?php include('includes/footer.php') ?>