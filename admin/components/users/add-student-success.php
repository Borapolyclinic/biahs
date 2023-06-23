<div class="container mt-5 add-user-success">
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
        $student_img = $_FILES["student_img"]["name"];
        $student_enrollment_number = mysqli_real_escape_string($connection, $_POST['student_enrollment_number']);
        $student_name = mysqli_real_escape_string($connection, $_POST['student_name']);
        $student_contact = mysqli_real_escape_string($connection, $_POST['student_contact']);
        $student_dob = mysqli_real_escape_string($connection, $_POST['student_dob']);
        $student_roll = mysqli_real_escape_string($connection, $_POST['student_roll']);
        $student_course = mysqli_real_escape_string($connection, $_POST['student_course']);
        $student_admission_date = mysqli_real_escape_string($connection, $_POST['student_admission_date']);
        $student_admission_year = mysqli_real_escape_string($connection, $_POST['student_admission_year']);
        $student_10th_marksheet = $_FILES["student_10th_marksheet"]["name"];
        $student_tc_certificate = $_FILES["student_tc_certificate"]["name"];
        $student_alot_letter = $_FILES["student_alot_letter"]["name"];
        $student_category = mysqli_real_escape_string($connection, $_POST['student_category']);
        $student_admission_mode = mysqli_real_escape_string($connection, $_POST['student_admission_mode']);
        $student_gender = mysqli_real_escape_string($connection, $_POST['student_gender']);

        $student_father = mysqli_real_escape_string($connection, $_POST['student_father']);
        $student_mother = mysqli_real_escape_string($connection, $_POST['student_mother']);
        $student_father_contact = mysqli_real_escape_string($connection, $_POST['student_father_contact']);
        $student_guardian_name = mysqli_real_escape_string($connection, $_POST['student_guardian_name']);
        $student_guardian_contact = mysqli_real_escape_string($connection, $_POST['student_guardian_contact']);
        $student_guardian_relation = mysqli_real_escape_string($connection, $_POST['student_guardian_relation']);

        $student_aadhar_number = mysqli_real_escape_string($connection, $_POST['student_aadhar_number']);
        $student_aadhar_file = $_FILES["student_aadhar_file"]["name"];
        $student_aadhar_back_file = $_FILES["student_aadhar_back_file"]["name"];

        $student_aadhar_address = mysqli_real_escape_string($connection, $_POST['student_aadhar_address']);
        $student_comm_address = mysqli_real_escape_string($connection, $_POST['student_comm_address']);
        $student_added_by = $user_name;

        $fetch_entry = "SELECT * FROM `bora_student` WHERE `student_contact` = '$student_contact'";
        $fetch_entry_result = mysqli_query($connection, $fetch_entry);
        $count = mysqli_num_rows($fetch_entry_result);

        if ($count == 0) {
            $tempname_student = $_FILES["student_img"]["tmp_name"];
            $tempname = $_FILES["student_aadhar_file"]["tmp_name"];
            $tempname_back = $_FILES["student_aadhar_back_file"]["tmp_name"];
            $tempname_marksheet = $_FILES["student_10th_marksheet"]["tmp_name"];
            $tempname_tc_certificate = $_FILES["student_tc_certificate"]["tmp_name"];
            $tempname_alot_letter = $_FILES["student_alot_letter"]["tmp_name"];

            $folder = "assets/student_aadhar_image/" . $student_aadhar_file;
            $folder_back = "assets/student_aadhar_image/" . $student_aadhar_file;
            $folder_student = "assets/student/" . $student_img;
            $folder_marksheet = "assets/marksheet/" . $student_10th_marksheet;
            $folder_tc_certificate = "assets/tc_certificate/" . $student_tc_certificate;
            $folder_alot_letter = "assets/alot_letter/" . $student_alot_letter;

            if (empty($student_comm_address)) {
                $student_comm_address = "Same as Aadhar Address";
            }
            if (
                move_uploaded_file($tempname, $folder) &&
                move_uploaded_file($tempname_back, $folder_back) &&
                move_uploaded_file($tempname_student, $folder_student) &&
                move_uploaded_file($tempname_marksheet, $folder_marksheet) &&
                move_uploaded_file($tempname_tc_certificate, $folder_tc_certificate) &&
                move_uploaded_file($tempname_alot_letter, $folder_alot_letter)
            ) {

                $insert = "INSERT INTO `bora_student`(
                    `student_img`,
                    `student_enrollment_number`,
                    `student_name`,
                    `student_contact`,
                    `student_dob`,
                    `student_father`,
                    `student_mother`,
                    `student_father_contact`,
                    `student_guardian_name`,
                    `student_guardian_contact`,
                    `student_guardian_relation`,
                    `student_roll`,
                    `student_course`,
                    `student_admission_date`,
                    `student_admission_year`,
                    `student_10th_marksheet`,
                    `student_tc_certificate`,
                    `student_alot_letter`,
                    `student_category`,
                    `student_admission_mode`,
                    `student_gender`,
                    `student_aadhar_number`,
                    `student_aadhar_file`,
                    `student_aadhar_back_file`,
                    `student_aadhar_address`,
                    `student_comm_address`,
                    `student_added_by`
                )
                VALUES(
                    '$student_img',
                    '$student_enrollment_number',
                    '$student_name',
                    '$student_contact',
                    '$student_dob',
                    '$student_father',
                    '$student_mother',
                    '$student_father_contact',
                    '$student_guardian_name',
                    '$student_guardian_contact',
                    '$student_guardian_relation',
                    '$student_roll',
                    '$student_course',
                    '$student_admission_date',
                    '$student_admission_year',
                    '$student_10th_marksheet',
                    '$student_tc_certificate',
                    '$student_alot_letter',
                    '$student_category',
                    '$student_admission_mode',
                    '$student_gender',
                    '$student_aadhar_number',
                    '$student_aadhar_file',
                    '$student_aadhar_back_file',
                    '$student_aadhar_address',
                    '$student_comm_address',
                    '$student_added_by'
                )";
                $insert_res = mysqli_query($connection, $insert);

                if ($insert_res) {  ?>
                    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_lk80fpsm.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                    <p>Success! Student added.</p>
                    <a href="add-student.php" class="go-back-btn">Go Back</a>
            <?php
                }
            }
        } else if (!$insert_res) {
            mysqli_error($connection);
            ?>

            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_ckcn4hvm.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
            <p>This student already exists in our system.</p>
            <a href="users.php" class="go-back-btn">Go Back</a>

    <?php
        }
    }
    ?>
</div>