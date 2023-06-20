<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
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

    if (isset($_FILES['csvFile'])) {
        $csvFile = $_FILES['csvFile']['tmp_name'];
        $handle = fopen($csvFile, "r");
        $columnNames = fgetcsv($handle);

        $sql = "INSERT INTO `bora_student` (
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
            `student_admission_date`,
            `student_admission_year`,
            `student_category`,
            `student_admission_mode`,
            `student_gender`,
            `student_aadhar_number`,
            `student_aadhar_address`,
            `student_comm_address`
        ) VALUES (
            ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
        )";
        $stmt = $connection->prepare($sql);

        if (!$stmt) {
            die('Error: ' . $connection->error);
        }

        $stmt->bind_param(
            "sssssssssssssssssss",
            $column1,
            $column2,
            $column3,
            $column4,
            $column5,
            $column6,
            $column7,
            $column8,
            $column9,
            $column10,
            $column11,
            $column12,
            $column13,
            $column14,
            $column15,
            $column16,
            $column17,
            $column18,
            $column19
        );

        while (($data = fgetcsv($handle)) !== false) {
            $column1 = $data[2] ?? '';
            $column2 = $data[3] ?? '';
            $column3 = $data[4] ?? '';
            $column4 = $data[5] ?? '';
            $column5 = $data[6] ?? '';
            $column6 = $data[7] ?? '';
            $column7 = $data[8] ?? '';
            $column8 = $data[9] ?? '';
            $column9 = $data[10] ?? '';
            $column10 = $data[11] ?? '';
            $column11 = $data[12] ?? '';
            $column12 = $data[14] ?? '';
            $column13 = $data[15] ?? '';
            $column14 = $data[19] ?? '';
            $column15 = $data[20] ?? '';
            $column16 = $data[21] ?? '';
            $column17 = $data[22] ?? '';
            $column18 = $data[25] ?? '';
            $column19 = $data[26] ?? '';

            if (!$stmt->execute()) {
                die('Error: ' . $stmt->error);
            }
        }

        fclose($handle);
        echo "
        <lottie-player src='https://assets10.lottiefiles.com/packages/lf20_lk80fpsm.json' background='transparent' speed='1' style='width: 300px; height: 300px;' loop autoplay></lottie-player>
        <p>Student Data Uploaded</p>
        <a href='dashboard.php' class='go-back-btn'>Go Back</a>";
    }
    ?>
</div>
<?php include('includes/footer.php') ?>