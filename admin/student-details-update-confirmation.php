<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container w-100 user-form-container">
    <div class="confirmation-alert">
        <?php
        require('includes/connection.php');
        if (isset($_POST['update'])) {
            $student_id = $_POST['student_id'];
            $student_name = mysqli_real_escape_string($connection, $_POST['student_name']);
            $student_contact = mysqli_real_escape_string($connection, $_POST['student_contact']);
            $student_father = mysqli_real_escape_string($connection, $_POST['student_father']);
            $student_mother = mysqli_real_escape_string($connection, $_POST['student_mother']);
            $student_guardian_contact = mysqli_real_escape_string($connection, $_POST['student_guardian_contact']);
            $student_guardian_contact_2 = mysqli_real_escape_string($connection, $_POST['student_guardian_contact_2']);
            $student_roll = mysqli_real_escape_string($connection, $_POST['student_roll']);
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
        }
        ?>
        <form action="student-details.php" method="POST" class="w-50">
            <input hidden type="text" name="student_id" value="<?php echo $student_id ?>">
            <input hidden type="text" name="student_name" value="<?php echo $student_name ?>">
            <input hidden type="text" name="student_contact" value="<?php echo $student_contact ?>">
            <input hidden type="text" name="student_father" value="<?php echo $student_father ?>">
            <input hidden type="text" name="student_mother" value="<?php echo $student_mother ?>">
            <input hidden type="text" name="student_guardian_contact" value="<?php echo $student_guardian_contact ?>">
            <input hidden type="text" name="student_guardian_contact_2"
                value="<?php echo $student_guardian_contact_2 ?>">
            <input hidden type="text" name="student_roll" value="<?php echo $student_roll ?>">
            <input hidden type="text" name="student_course" value="<?php echo $student_course ?>">
            <input hidden type="text" name="student_admission_date" value="<?php echo $student_admission_date ?>">
            <input hidden type="text" name="student_aadhar_number" value="<?php echo $student_aadhar_number ?>">
            <input hidden type="text" name="student_aadhar_address" value="<?php echo $student_aadhar_address ?>">
            <input hidden type="text" name="student_comm_address" value="<?php echo $student_comm_address ?>">
            <input hidden type="text" name="student_category" value="<?php echo $student_category ?>">
            <input hidden type="text" name="student_admission_mode" value="<?php echo $student_admission_mode ?>">

            <div class="w-100 alert alert-info" role="alert">
                Are you sure you want to update student's details?
            </div>
            <button type="submit" name="edit_back" class="btn btn-outline-success w-100">Yes</button>
            <button type="submit" name="edit" class="btn btn-outline-danger w-100 mt-3">No</button>
        </form>
    </div>
    <?php include('includes/footer.php') ?>