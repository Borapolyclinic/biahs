<?php
include('includes/header.php');
include('components/navbar/admin-navbar.php');
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
    <?php
    require('includes/connection.php');

    $bora_invoice_student_course = "";
    $bora_invoice_student_admission_year = "";
    $course_tenure = "";
    if (isset($_POST['generate_batch_wise'])) {
        $batch_wise_course = $_POST['batch_wise_course'];
        $batch_wise_year = $_POST['batch_wise_year'];
        $bora_invoice_tenure = $_POST['bora_invoice_tenure'];

        // Fetch course and year details
        $fetch_course_year = "SELECT * FROM `bora_course` WHERE `course_id` = '$batch_wise_course'";
        $fetch_course_year_r = mysqli_query($connection, $fetch_course_year);
        while ($row = mysqli_fetch_assoc($fetch_course_year_r)) {
            $bora_invoice_student_course = $row['course_name'];
            $bora_invoice_student_admission_year = $batch_wise_year;
            $course_tenure = $row['course_tenure'];
        }
    }
    ?>

    <!-- ========================================================================================================================================== 
                                                                    BATCH WISE 
    ============================================================================================================================================== -->

    <div class="user-table table-responsive w-100">
        <table class="w-100 table table-bordered table-striped ">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">COURSE</th>
                    <th scope="col">ADMISSION BATCH</th>
                </tr>
            </thead>
            <tbody>
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
                    <th scope="col">ONLINE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">DUE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['generate_batch_wise'])) {

                    // Fetch students
                    $get_students = "SELECT * FROM `bora_student` WHERE `student_batch` = '$batch_wise_year' AND `student_course` = '$batch_wise_course'";
                    $get_students_r = mysqli_query($connection, $get_students);

                    // $date_from = $_POST['date_from'];
                    // $date_to = $_POST['date_to'];
                    $batch_wise_course = $_POST['batch_wise_course'];
                    $batch_wise_year = $_POST['batch_wise_year'];

                    $bora_invoice_tenure = $_POST['bora_invoice_tenure'];

                    if ($bora_invoice_tenure == 'Year 1') {
                        $course_tenure = '1';
                    } else if ($bora_invoice_tenure == 'Year 2') {
                        $course_tenure = '2';
                    } else if ($bora_invoice_tenure == 'Year 3') {
                        $course_tenure = '3';
                    } else if ($bora_invoice_tenure == 'Year 4') {
                        $course_tenure = '4';
                    } else if ($bora_invoice_tenure == 'All Years') {
                        $course_tenure = 'All Years';
                    }



                    $fetch_invoice = "SELECT * FROM `bora_student`
                    INNER JOIN `bora_invoice` 
                    ON `bora_student`.`student_id` = `bora_invoice`.`bora_invoice_student_id`
                    AND `bora_student`.`student_course` = '$batch_wise_course'
                    AND `bora_invoice`.`bora_invoice_student_admission_year` = '$batch_wise_year'
                    GROUP BY `bora_student`.`student_id`
                    ORDER BY `bora_invoice`.`bora_invoice_generation_date` DESC ";


                    $fetch_invoice_r = mysqli_query($connection, $fetch_invoice);
                    while ($row_new = mysqli_fetch_assoc($fetch_invoice_r)) {
                        $bora_invoice_student_id = $row_new['bora_invoice_student_id'];
                        $bora_invoice_student = $row_new['bora_invoice_student'];
                        $bora_invoice_student_en_no = $row_new['bora_invoice_student_en_no'];
                        $bora_invoice_student_contact = $row_new['bora_invoice_student_contact'];
                        $bora_invoice_payment_mode = $row_new['bora_invoice_payment_mode'];
                        $bora_invoice_grand_total = $row_new['bora_invoice_grand_total'];

                        $s_name = $row_new['student_name'];
                        $s_uid = $row_new['student_roll'];
                        $s_contact = $row_new['student_contact'];


                        $fetch_total_cash = "SELECT SUM(`bora_invoice_grand_total`) AS `total_cash` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cash' AND `bora_invoice_tenure` = '$bora_invoice_tenure'";
                        $fetch_total_cash_r = mysqli_query($connection, $fetch_total_cash);
                        $total_cash = "";
                        while ($row = mysqli_fetch_assoc($fetch_total_cash_r)) {
                            $total_cash = $row['total_cash'];
                        }

                        $fetch_total_bank = "SELECT SUM(`bora_invoice_grand_total`) AS `total_bank` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cheque' AND `bora_invoice_tenure` = '$bora_invoice_tenure'";
                        $fetch_total_bank_r = mysqli_query($connection, $fetch_total_bank);
                        $total_bank = "";
                        while ($row = mysqli_fetch_assoc($fetch_total_bank_r)) {
                            $total_bank = $row['total_bank'];
                        }

                        $fetch_total_online = "SELECT SUM(`bora_invoice_grand_total`) AS `total_online` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'online' AND `bora_invoice_tenure` = '$bora_invoice_tenure'";
                        $fetch_total_online_r = mysqli_query($connection, $fetch_total_online);
                        $total_online = "";
                        while ($row = mysqli_fetch_assoc($fetch_total_online_r)) {
                            $total_online = $row['total_online'];
                        }

                        if ($bora_invoice_tenure == 'All Years') {
                            $fetch_total_cash = "SELECT SUM(`bora_invoice_grand_total`) AS `total_cash` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cash'";
                            $fetch_total_cash_r = mysqli_query($connection, $fetch_total_cash);
                            $total_cash = "";
                            while ($row = mysqli_fetch_assoc($fetch_total_cash_r)) {
                                $total_cash = $row['total_cash'];
                            }

                            $fetch_total_bank = "SELECT SUM(`bora_invoice_grand_total`) AS `total_bank` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'cheque'";
                            $fetch_total_bank_r = mysqli_query($connection, $fetch_total_bank);
                            $total_bank = "";
                            while ($row = mysqli_fetch_assoc($fetch_total_bank_r)) {
                                $total_bank = $row['total_bank'];
                            }

                            $fetch_total_online = "SELECT SUM(`bora_invoice_grand_total`) AS `total_online` FROM `bora_invoice` WHERE `bora_invoice_student_id` = '$bora_invoice_student_id' AND `bora_invoice_payment_mode` = 'online'";
                            $fetch_total_online_r = mysqli_query($connection, $fetch_total_online);
                            $total_online = "";
                            while ($row = mysqli_fetch_assoc($fetch_total_online_r)) {
                                $total_online = $row['total_online'];
                            }
                        }
                        $total_paid = $total_cash + $total_bank + $total_online;
                ?>

                        <tr>

                            <td><?php echo $s_name  ?></td>
                            <td><?php echo $s_uid  ?></td>
                            <td><?php echo $s_contact  ?></td>


                            <td><?php echo !empty($total_cash) ? $total_cash : '0'; ?></td>
                            <td><?php echo !empty($total_bank) ? $total_bank : '0'; ?></td>
                            <td><?php echo !empty($total_online) ? $total_online : '0'; ?></td>
                            <td><?php echo !empty($total_paid) ? $total_paid : '0'; ?></td>
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

                                <?php if ($course_tenure == '1') { ?>
                                    ₹<?php echo $year_1 - ($total_cash + $total_bank + $total_online) ?>
                                <?php }
                                if ($course_tenure == '2') { ?>
                                    ₹<?php echo $year_2 - ($total_cash + $total_bank + $total_online) ?>
                                <?php }
                                if ($course_tenure == '3') { ?>
                                    ₹<?php echo $year_3 - ($total_cash + $total_bank + $total_online) ?>
                                <?php }
                                if ($course_tenure == '4') { ?>
                                    ₹<?php echo $year_4 - ($total_cash + $total_bank + $total_online) ?>

                                <?php }
                                if ($course_tenure == 'All Years') { ?>
                                    ₹<?php echo ($year_1 + $year_2 +  $year_3 + $year_4) - ($total_cash + $total_bank + $total_online) ?>
                                <?php } ?>
                            </td>

                            <td>
                                <form target="_blank" action="admin-student-wise-generated-report.php" method="POST">
                                    <!-- <input type="text" name="date_to" value="<?php echo $date_to ?>" hidden>
                                    <input type="text" name="date_from" value="<?php echo $date_from ?>" hidden> -->
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


<?php include('includes/footer.php') ?>