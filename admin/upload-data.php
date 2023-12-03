<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container mt-5 add-user-success">
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
        // echo "USER NAME : " . $user_name;
    }
    if (isset($_POST["submit"])) {
        $csvFile = $_FILES["csvFile"]["tmp_name"];
        $course_name = $_POST['course_name'];

        if (empty($csvFile) || $course_name == 'null') { ?>
            <div class="alert alert-danger w-100 mt-3 mb-3" role="alert">
                Looks like you have not uploaded any file or you have not selected any course!
            </div>

            <?php } else {            // $phonebook_cat = $_POST['phonebook_cat'];
            if (($handle = fopen($csvFile, "r")) !== false) {
                $sql = "INSERT INTO `bora_student` (
            `student_enrollment_number`, 
            `student_batch`, 
            `student_name`, 
            `student_contact`, 
            `student_email`, 
            `student_whatsapp`, 
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
            `student_category`,
            `student_admission_mode`,
            `student_gender`,
            `student_aadhar_number`,
            `student_aadhar_address`,
            `student_comm_address`,
            `student_status`,
            `student_added_by`) VALUES ";

                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    $student_enrollment_number = mysqli_real_escape_string($connection, $data[0]);
                    $student_batch = mysqli_real_escape_string($connection, $data[1]);
                    $student_name = mysqli_real_escape_string($connection, $data[2]);
                    $student_contact = mysqli_real_escape_string($connection, $data[3]);
                    $student_email = mysqli_real_escape_string($connection, $data[4]);
                    $student_whatsapp = mysqli_real_escape_string($connection, $data[5]);
                    $student_dob = mysqli_real_escape_string($connection, $data[6]);
                    $student_father = mysqli_real_escape_string($connection, $data[7]);
                    $student_mother = mysqli_real_escape_string($connection, $data[8]);
                    $student_father_contact = mysqli_real_escape_string($connection, $data[9]);
                    $student_guardian_name = mysqli_real_escape_string($connection, $data[10]);
                    $student_guardian_contact = mysqli_real_escape_string($connection, $data[11]);
                    $student_guardian_contact_2 = mysqli_real_escape_string($connection, $data[12]);
                    $student_guardian_relation = mysqli_real_escape_string($connection, $data[13]);
                    $student_roll = mysqli_real_escape_string($connection, $data[14]);
                    $student_admission_date = mysqli_real_escape_string($connection, $data[15]);
                    $student_category = mysqli_real_escape_string($connection, $data[17]);
                    $student_admission_mode = mysqli_real_escape_string($connection, $data[18]);
                    $student_gender = mysqli_real_escape_string($connection, $data[19]);
                    $student_aadhar_number = mysqli_real_escape_string($connection, $data[20]);
                    $student_aadhar_address = mysqli_real_escape_string($connection, $data[21]);
                    $student_comm_address = mysqli_real_escape_string($connection, $data[22]);

                    $sql .= "(
                '$student_enrollment_number',
                '$student_batch', 
                '$student_name', 
                '$student_contact', 
                '$student_email', 
                '$student_whatsapp', 
                '$student_dob', 
                '$student_father', 
                '$student_mother', 
                '$student_father_contact', 
                '$student_guardian_name', 
                '$student_guardian_contact' , 
                '$student_guardian_contact_2',
                '$student_guardian_relation',
                '$student_roll',
                '$course_name',
                '$student_admission_date',
                '$student_category',
                '$student_admission_mode',
                '$student_gender',
                '$student_aadhar_number',
                '$student_aadhar_address',
                '$student_comm_address',
                '2',
                '$user_name'
            ), ";
                }
                $sql = rtrim($sql, ", ");
                $res = mysqli_query($connection, $sql);
                if ($res) { ?>
                    <lottie-player src='https://assets10.lottiefiles.com/packages/lf20_lk80fpsm.json' background='transparent' speed='1' style='width: 300px; height: 300px;' loop autoplay></lottie-player>
                    <p>Student Data Uploaded</p>
                    <a href='dashboard.php' class='go-back-btn'>Go Back</a>
    <?php } else {
                    echo "Error";
                    // $toast_class = "class='toast align-items-center text-bg-danger border-0'";
                    // $toast_message = "Error: " . $sql . "<br>" . $mysqli->error;
                    // echo "<script>showToast()</script>";
                }

                fclose($handle);
            }
        }
    }
    ?>
</div>
<?php include('includes/footer.php') ?>