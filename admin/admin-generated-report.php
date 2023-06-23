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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">NAME</th>
                    <th scope="col">UID</th>
                    <th scope="col">CONTACT</th>
                    <th scope="col">COURSE</th>
                    <th scope="col">ADMISSION YEAR</th>
                    <th scope="col">CASH</th>
                    <th scope="col">BANK</th>
                    <th scope="col">INVOICE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('includes/connection.php');

                if (isset($_POST['generate_student_wise'])) {
                    $date_from = date('Y-m-d', strtotime($_POST['date_from']));
                    $date_to = date('Y-m-d', strtotime($_POST['date_to']));
                    $selected_radio = $_POST['selected_radio'];
                    $student_wise_details = $_POST['student_wise_details'];
                    $student_wise_data = $_POST['student_wise_data'];

                    $query = "SELECT * FROM `bora_invoice` WHERE ";
                    if ($student_wise_details == '1') {
                        $query .= "`bora_invoice_student` LIKE '%$student_wise_data%' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                    } elseif ($student_wise_details == '2') {
                        $query .= "`bora_invoice_student_en_no` LIKE '%$student_wise_data%' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                    } elseif ($student_wise_details == '3') {
                        $query .= "`bora_invoice_student_contact` LIKE '%$student_wise_data%' AND `bora_invoice_generation_date` BETWEEN '$date_from' AND '$date_to'";
                    }

                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $bora_invoice_number = $row['bora_invoice_number'];
                        $bora_invoice_student_id = $row['bora_invoice_student_id'];
                        $bora_invoice_student = $row['bora_invoice_student'];
                        $bora_invoice_student_en_no = $row['bora_invoice_student_en_no'];
                        $bora_invoice_student_contact = $row['bora_invoice_student_contact'];
                        $bora_invoice_student_course = $row['bora_invoice_student_course'];
                        $bora_invoice_payment_mode = $row['bora_invoice_payment_mode'];
                        $bora_invoice_grand_total = $row['bora_invoice_grand_total'];
                ?>
                        <tr>
                            <th scope="row"><?php echo $bora_invoice_student ?></th>
                            <td><?php echo $bora_invoice_student_en_no ?></td>
                            <td><?php echo $bora_invoice_student_contact ?></td>

                            <td>
                                <?php
                                $fetch_student_det = "SELECT * FROM `bora_student` WHERE student_id ='$bora_invoice_student_id'";
                                $fetch_student_det_r = mysqli_query($connection, $fetch_student_det);
                                $student_course = "";
                                $student_admission_year = "";
                                while ($row = mysqli_fetch_assoc($fetch_student_det_r)) {
                                    $student_course = $row['student_course'];
                                    $student_admission_year = $row['student_admission_year'];
                                }

                                $fetch_course = "SELECT * FROM `bora_course` WHERE `course_id` = '$student_course'";
                                $fetch_course_r = mysqli_query($connection, $fetch_course);
                                $course_name = "";
                                while ($row = mysqli_fetch_assoc($fetch_course_r)) {
                                    $course_name = $row['course_name'];
                                }
                                echo $course_name;
                                ?>
                            </td>
                            <td><?php echo $student_admission_year ?></td>

                            <?php if ($bora_invoice_payment_mode == 'cash') { ?>
                                <td><?php echo $bora_invoice_grand_total ?></td>
                                <td>NA</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>" hidden>
                                        <button class="btn btn-sm btn-outline-success">SHOW INVOICE</button>
                                    </form>
                                </td>
                            <?php } ?>

                            <?php if ($bora_invoice_payment_mode == 'cheque' || $bora_invoice_payment_mode == 'online') { ?>
                                <td>NA</td>
                                <td><?php echo $bora_invoice_grand_total ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>" hidden>
                                        <button class="btn btn-sm btn-outline-success">SHOW INVOICE</button>
                                    </form>
                                </td>
                            <?php } ?>




                        </tr>
                    <?php
                    }
                }
                if (isset($_POST['generate_batch_wise'])) {
                    $date_from = date('Y-m-d', strtotime($_POST['date_from']));
                    $date_to = date('Y-m-d', strtotime($_POST['date_to']));
                    $selected_radio = $_POST['selected_radio'];
                    $batch_wise_course = $_POST['batch_wise_course'];
                    $batch_wise_year = $_POST['batch_wise_year'];

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
                        $bora_invoice_payment_mode = $row['bora_invoice_payment_mode'];
                        $bora_invoice_grand_total = $row['bora_invoice_grand_total'];
                    ?>
                        <tr>
                            <th scope="row"><?php echo $bora_invoice_student ?></th>
                            <td><?php echo $bora_invoice_student_en_no ?></td>
                            <td><?php echo $bora_invoice_student_contact ?></td>

                            <td>
                                <?php
                                $fetch_student_det = "SELECT * FROM `bora_student` WHERE student_id ='$bora_invoice_student_id'";
                                $fetch_student_det_r = mysqli_query($connection, $fetch_student_det);
                                $student_course = "";
                                $student_admission_year = "";
                                while ($row = mysqli_fetch_assoc($fetch_student_det_r)) {
                                    $student_course = $row['student_course'];
                                    $student_admission_year = $row['student_admission_year'];
                                }

                                $fetch_course = "SELECT * FROM `bora_course` WHERE `course_id` = '$student_course'";
                                $fetch_course_r = mysqli_query($connection, $fetch_course);
                                $course_name = "";
                                while ($row = mysqli_fetch_assoc($fetch_course_r)) {
                                    $course_name = $row['course_name'];
                                }
                                echo $course_name;
                                ?>
                            </td>
                            <td><?php echo $student_admission_year ?></td>

                            <?php if ($bora_invoice_payment_mode == 'cash') { ?>
                                <td><?php echo $bora_invoice_grand_total ?></td>
                                <td>NA</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>" hidden>
                                        <button class="btn btn-sm btn-outline-success">SHOW INVOICE</button>
                                    </form>
                                </td>
                            <?php } ?>

                            <?php if ($bora_invoice_payment_mode == 'cheque' || $bora_invoice_payment_mode == 'online') { ?>
                                <td>NA</td>
                                <td><?php echo $bora_invoice_grand_total ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="text" name="bora_invoice_number" value="<?php echo $bora_invoice_number ?>" hidden>
                                        <button class="btn btn-sm btn-outline-success">SHOW INVOICE</button>
                                    </form>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="5">NO DATA FOUND</td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
</div>

<?php include('includes/footer.php') ?>