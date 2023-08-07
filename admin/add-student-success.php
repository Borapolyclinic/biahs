<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container mt-5 add-user-success">
    <script>
    function openModal() {
        $(document).ready(function() {
            $("#exampleModal").modal("show");
        });
    }
    </script>
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

    if (isset($_POST['submit'])) {
        // echo "Hello World";
        $student_img = $_FILES["student_img"]["name"];
        $student_enrollment_number = mysqli_real_escape_string($connection, $_POST['student_enrollment_number']);
        $student_name = mysqli_real_escape_string($connection, $_POST['student_name']);
        $student_contact = mysqli_real_escape_string($connection, $_POST['student_contact']);
        $student_email = mysqli_real_escape_string($connection, $_POST['student_email']);
        $student_dob = mysqli_real_escape_string($connection, $_POST['student_dob']);
        $student_roll = mysqli_real_escape_string($connection, $_POST['student_roll']);
        $student_course = mysqli_real_escape_string($connection, $_POST['student_course']);
        $student_admission_date = mysqli_real_escape_string($connection, $_POST['student_admission_date']);
        $student_admission_year = mysqli_real_escape_string($connection, $_POST['student_admission_year']);
        $student_10th_marksheet = $_FILES["student_10th_marksheet"]["name"];
        $student_12th_marksheet = $_FILES["student_12th_marksheet"]["name"];
        $student_tc_certificate = $_FILES["student_tc_certificate"]["name"];
        // $student_alot_letter = $_FILES["student_alot_letter"]["name"];
        $student_cast_certificate = $_FILES["student_cast_certificate"]["name"];
        $student_category = mysqli_real_escape_string($connection, $_POST['student_category']);
        $student_admission_mode = mysqli_real_escape_string($connection, $_POST['student_admission_mode']);
        $student_gender = mysqli_real_escape_string($connection, $_POST['student_gender']);
        $student_father = mysqli_real_escape_string($connection, $_POST['student_father']);
        $student_mother = mysqli_real_escape_string($connection, $_POST['student_mother']);
        $student_father_contact = mysqli_real_escape_string($connection, $_POST['student_father_contact']);
        $student_guardian_name = mysqli_real_escape_string($connection, $_POST['student_guardian_name']);
        $student_guardian_contact = mysqli_real_escape_string($connection, $_POST['student_guardian_contact']);
        $student_guardian_contact_2 = mysqli_real_escape_string($connection, $_POST['student_guardian_contact_2']);
        $student_guardian_relation = mysqli_real_escape_string($connection, $_POST['student_guardian_relation']);
        $student_aadhar_number = mysqli_real_escape_string($connection, $_POST['student_aadhar_number']);
        $student_aadhar_file = $_FILES["student_aadhar_file"]["name"];
        $student_aadhar_address = mysqli_real_escape_string($connection, $_POST['student_aadhar_address']);
        $student_comm_address = mysqli_real_escape_string($connection, $_POST['student_comm_address']);
        $student_added_by = $user_name;
        $student_status = "2";

        if ($student_admission_mode == 'Direct') {
            $student_alot_letter = 'null';
        } else if ($student_admission_mode == 'Counselling') {
            $student_alot_letter = $_FILES["student_alot_letter"]["name"];
            $tempname_alot_letter = $_FILES["student_alot_letter"]["tmp_name"];
            $folder_alot_letter = "assets/alot_letter/" . $student_alot_letter;
        }

        $tempname_student = $_FILES["student_img"]["tmp_name"];
        $tempname = $_FILES["student_aadhar_file"]["tmp_name"];
        $tempname_marksheet = $_FILES["student_10th_marksheet"]["tmp_name"];
        $tempname_marksheet_12 = $_FILES["student_12th_marksheet"]["tmp_name"];
        $tempname_tc_certificate = $_FILES["student_tc_certificate"]["tmp_name"];

        $tempname_student_cast_certificate = $_FILES["student_cast_certificate"]["tmp_name"];

        $folder = "assets/student_aadhar_image/" . $student_aadhar_file;
        $folder_student = "assets/student/" . $student_img;
        $folder_marksheet = "assets/marksheet/" . $student_10th_marksheet;
        $folder_marksheet_12 = "assets/marksheet/" . $student_12th_marksheet;
        $folder_tc_certificate = "assets/tc_certificate/" . $student_tc_certificate;

        $folder_student_cast_certificate = "assets/cast/" . $student_cast_certificate;

        $fetch_entry = "SELECT * FROM `bora_student` WHERE `student_contact` = '$student_contact' AND `student_roll` = '$student_roll'";
        $fetch_entry_result = mysqli_query($connection, $fetch_entry);
        $count = mysqli_num_rows($fetch_entry_result);

        if ($count == 0) {
            if (empty($student_comm_address)) {
                $student_comm_address = "Same as Aadhar Address";
            }

            if ($student_admission_mode == 'Counselling') {
                if (
                    move_uploaded_file($tempname, $folder) &&
                    move_uploaded_file($tempname_student, $folder_student) &&
                    move_uploaded_file($tempname_marksheet, $folder_marksheet) &&
                    move_uploaded_file($tempname_marksheet_12, $folder_marksheet_12) &&
                    move_uploaded_file($tempname_tc_certificate, $folder_tc_certificate) &&
                    move_uploaded_file($tempname_alot_letter, $folder_alot_letter) &&
                    move_uploaded_file($tempname_student_cast_certificate, $folder_student_cast_certificate)
                ) {

                    $insert = "INSERT INTO `bora_student`(
                    `student_img`,
                    `student_enrollment_number`,
                    `student_name`,
                    `student_contact`,
                    `student_email`,
                    `student_dob`,
                    `student_father`,
                    `student_mother`,
                    `student_father_contact`,
                    `student_guardian_name`,
                    `student_guardian_contact`,
                    `student_guardian_contact_2`,
                    `student_guardian_relation`,
                    `student_roll`,
                    `student_course`,
                    `student_admission_date`,
                    `student_admission_year`,
                    `student_10th_marksheet`,
                    `student_12th_marksheet`,
                    `student_tc_certificate`,
                    `student_alot_letter`,
                    `student_cast_certificate`,
                    `student_category`,
                    `student_admission_mode`,
                    `student_gender`,
                    `student_aadhar_number`,
                    `student_aadhar_file`,
                    `student_aadhar_address`,
                    `student_comm_address`,
                    `student_status`,
                    `student_added_by`
                )
                VALUES(
                    '$student_img',
                    '$student_enrollment_number',
                    '$student_name',
                    '$student_contact',
                    '$student_email',
                    '$student_dob',
                    '$student_father',
                    '$student_mother',
                    '$student_father_contact',
                    '$student_guardian_name',
                    '$student_guardian_contact',
                    '$student_guardian_contact_2',
                    '$student_guardian_relation',
                    '$student_roll',
                    '$student_course',
                    '$student_admission_date',
                    '$student_admission_year',
                    '$student_10th_marksheet',
                    '$student_12th_marksheet',
                    '$student_tc_certificate',
                    '$student_alot_letter',
                    '$student_cast_certificate',
                    '$student_category',
                    '$student_admission_mode',
                    '$student_gender',
                    '$student_aadhar_number',
                    '$student_aadhar_file',
                    '$student_aadhar_address',
                    '$student_comm_address',
                    '$student_status',
                    '$student_added_by'
                )";
                    $insert_res = mysqli_query($connection, $insert);

                    if ($insert_res) {  ?>
    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_lk80fpsm.json" background="transparent" speed="1"
        style="width: 300px; height: 300px;" loop autoplay></lottie-player>
    <p>Success! Student added.</p>
    <a href="add-student.php" class="go-back-btn">Go Back</a>
    <?php
                    } elseif (!$insert_res) {
                        echo "Error: " . mysqli_error($connection);
                    }
                }
            } else {
                if (
                    move_uploaded_file($tempname, $folder) &&
                    move_uploaded_file($tempname_student, $folder_student) &&
                    move_uploaded_file($tempname_marksheet, $folder_marksheet) &&
                    move_uploaded_file($tempname_marksheet_12, $folder_marksheet_12) &&
                    move_uploaded_file($tempname_tc_certificate, $folder_tc_certificate) &&
                    move_uploaded_file($tempname_student_cast_certificate, $folder_student_cast_certificate)
                ) {

                    $insert = "INSERT INTO `bora_student`(
                    `student_img`,
                    `student_enrollment_number`,
                    `student_name`,
                    `student_contact`,
                    `student_email`,
                    `student_dob`,
                    `student_father`,
                    `student_mother`,
                    `student_father_contact`,
                    `student_guardian_name`,
                    `student_guardian_contact`,
                    `student_guardian_contact_2`,
                    `student_guardian_relation`,
                    `student_roll`,
                    `student_course`,
                    `student_admission_date`,
                    `student_admission_year`,
                    `student_10th_marksheet`,
                    `student_12th_marksheet`,
                    `student_tc_certificate`,
                    `student_alot_letter`,
                    `student_cast_certificate`,
                    `student_category`,
                    `student_admission_mode`,
                    `student_gender`,
                    `student_aadhar_number`,
                    `student_aadhar_file`,
                    `student_aadhar_address`,
                    `student_comm_address`,
                    `student_status`,
                    `student_added_by`
                )
                VALUES(
                    '$student_img',
                    '$student_enrollment_number',
                    '$student_name',
                    '$student_contact',
                    '$student_email',
                    '$student_dob',
                    '$student_father',
                    '$student_mother',
                    '$student_father_contact',
                    '$student_guardian_name',
                    '$student_guardian_contact',
                    '$student_guardian_contact_2',
                    '$student_guardian_relation',
                    '$student_roll',
                    '$student_course',
                    '$student_admission_date',
                    '$student_admission_year',
                    '$student_10th_marksheet',
                    '$student_12th_marksheet',
                    '$student_tc_certificate',
                    '$student_alot_letter',
                    '$student_cast_certificate',
                    '$student_category',
                    '$student_admission_mode',
                    '$student_gender',
                    '$student_aadhar_number',
                    '$student_aadhar_file',
                    '$student_aadhar_address',
                    '$student_comm_address',
                    '$student_status',
                    '$student_added_by'
                )";
                    $insert_res = mysqli_query($connection, $insert);

                    if ($insert_res) {  ?>
    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_lk80fpsm.json" background="transparent" speed="1"
        style="width: 300px; height: 300px;" loop autoplay></lottie-player>
    <p>Success! Student added.</p>
    <a href="add-student.php" class="go-back-btn">Go Back</a>
    <?php
                    } elseif (!$insert_res) {
                        echo "Error: " . mysqli_error($connection);
                    }
                }
            }
        } else if ($count > 0) {
            ?>

    <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_ckcn4hvm.json" background="transparent" speed="1"
        style="width: 300px; height: 300px;" loop autoplay></lottie-player>
    <p>This student already exists in our system.</p>
    <a href="users.php" class="go-back-btn">Go Back</a>

    <?php
        }
    }

    ?>
</div>
<?php include('includes/footer.php') ?>