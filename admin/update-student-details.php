<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container w-100 user-form-container">
    <div class="confirmation-alert">
        <?php
        require('includes/connection.php');
        if (isset($_POST['edit_back'])) {
            $student_id = $_POST['student_id'];
            $student_name = mysqli_real_escape_string($connection, $_POST['student_name']);
            $student_contact = mysqli_real_escape_string($connection, $_POST['student_contact']);
            $student_whatsapp = mysqli_real_escape_string($connection, $_POST['student_whatsapp']);
            $student_email = mysqli_real_escape_string($connection, $_POST['student_email']);
            $student_father = mysqli_real_escape_string($connection, $_POST['student_father']);
            $student_mother = mysqli_real_escape_string($connection, $_POST['student_mother']);
            $student_guardian_contact = mysqli_real_escape_string($connection, $_POST['student_guardian_contact']);
            $student_roll = mysqli_real_escape_string($connection, $_POST['student_roll']);
            $student_enrollment_number = mysqli_real_escape_string($connection, $_POST['student_enrollment_number']);
            $student_course = mysqli_real_escape_string($connection, $_POST['student_course']);
            $student_admission_date = mysqli_real_escape_string($connection, $_POST['student_admission_date']);
            $student_aadhar_number = mysqli_real_escape_string($connection, $_POST['student_aadhar_number']);
            $student_aadhar_address = mysqli_real_escape_string($connection, $_POST['student_aadhar_address']);
            $student_comm_address = mysqli_real_escape_string($connection, $_POST['student_comm_address']);
            $student_category = mysqli_real_escape_string($connection, $_POST['student_category']);
            $student_admission_mode = mysqli_real_escape_string($connection, $_POST['student_admission_mode']);

            if (empty($student_comm_address)) {
                $student_comm_address = "Same as Aadhar Address";
            }

            $update_query = "UPDATE
                    `bora_student`
                SET
                    `student_name` = '$student_name',
                    `student_contact` = '$student_contact',
                    `student_whatsapp` = '$student_whatsapp',
                    `student_email` = '$student_email',
                    `student_father` = '$student_father',
                    `student_mother` = '$student_mother',
                    `student_guardian_contact` = '$student_guardian_contact',
                    `student_category` = '$student_category',
                    `student_admission_mode` = '$student_admission_mode',
                    `student_enrollment_number` = '$student_enrollment_number',
                    `student_roll` = '$student_roll',
                    `student_course` = '$student_course',
                    `student_admission_date` = '$student_admission_date',
                    `student_aadhar_number` = '$student_aadhar_number',
                    `student_aadhar_address` = '$student_aadhar_address',
                    `student_comm_address` = '$student_comm_address'
                WHERE
                    `student_id` = '$student_id'";

            $update_res = mysqli_query($connection, $update_query);

            if ($update_res) { ?>
                <form action="student-details.php" method="POST" class="w-50">
                    <input hidden type="text" name="student_id" value="<?php echo $student_id ?>">
                    <div class="w-100 alert alert-success" role="alert">
                        Student Details Updated!
                    </div>
                    <button type="submit" name="edit_back" class="btn btn-outline-success w-100">Go back</button>
                    <!-- <button type="submit" name="edit" class="btn btn-outline-danger w-100 mt-3">No</button> -->
                </form>
        <?php
            }
        }
        ?>
    </div>
    <?php include('includes/footer.php') ?>