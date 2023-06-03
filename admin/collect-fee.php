<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="dashboard.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Collect Fee</h5>
    </div>
    <?php
    require('includes/connection.php');

    if (isset($_POST['collect'])) {
        $student_id = $_POST['student_id'];

        $fetch_data = "SELECT * FROM `bora_student` WHERE `student_id` = '$student_id'";
        $fetch_data_res = mysqli_query($connection, $fetch_data);

        $student_name = "";
        $student_course = "";
        $student_contact = "";
        $student_roll = "";

        while ($row = mysqli_fetch_assoc($fetch_data_res)) {
            $student_name = $row['student_name'];
            $student_course = $row['student_course'];
            $student_contact = $row['student_contact'];
            $student_roll = $row['student_roll'];
        }
    }
    ?>
    <form class="add-user-form" method="POST" action="">
        <div class="receipt-upper-section">
            <img src="../assets/images/logo/brand-logo.webp" alt="">
            <h5>Bora Institute of Allied Health Sciences</h5>
            <p>Bora Institute of Nursing & Paramedical Sciences. Sewa Nagar, NH-24 Sitaur Road. Lucknow - 226201.
                <strong>Contact:</strong> +91 9569863933 | +91 9305748634. <br><strong>Email:</strong> abc@xyz.com.
                <strong>Website:</strong> borainstitute.com
            </p>
        </div>
    </form>

</div>
<?php include('includes/footer.php') ?>