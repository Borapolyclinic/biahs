<?php require('includes/header.php') ?>
<div class="container mt-5 add-user-success">
    <?php
    require('includes/connection.php');
    if (isset($_POST['back'])) {
        $student_id = $_POST['student_id'];
        $student_aadhar_back_file = $_FILES["student_aadhar_back_file"]["name"];
        $tempname = $_FILES["student_aadhar_back_file"]["tmp_name"];
        $folder = "assets/student_aadhar_image/" . $student_aadhar_back_file;

        $update_query = "UPDATE
        `bora_student`
    SET
        `student_aadhar_back_file` = '$student_aadhar_back_file'
       WHERE
        `student_id` = $student_id";
        $update_res = mysqli_query($connection, $update_query);

        if ($update_res) {
            move_uploaded_file($tempname, $folder); ?>

    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_lk80fpsm.json" background="transparent" speed="1"
        style="width: 300px; height: 300px;" loop autoplay></lottie-player>
    <p>Success! Image Updated.</p>
    <form action="student-details.php" method="POST" class="w-100 d-flex justify-content-center align-items-center">
        <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
        <button type="submit" name="edit" class="btn btn-sm btn-outline-success">Go Back</button>
    </form>
    <?php
        }
    }
    ?>
</div>
<?php require('includes/footer.php') ?>