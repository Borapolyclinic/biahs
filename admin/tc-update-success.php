<?php require('includes/header.php') ?>
<div class="container mt-5 add-user-success">
    <?php
    require('includes/connection.php');
    if (isset($_POST['front'])) {
        $student_id = $_POST['student_id'];
        $student_tc_certificate = $_FILES["student_tc_certificate"]["name"];
        $tempname = $_FILES["student_tc_certificate"]["tmp_name"];
        $folder = "assets/tc_certificate/" . $student_tc_certificate;

        if (empty($student_tc_certificate)) { ?>
    <div class="alert alert-danger" role="alert">
        Please upload an image to update Transfer Certificate.
    </div>
    <?php } else {

            $update_query = "UPDATE
            `bora_student`
        SET
            `student_tc_certificate` = '$student_tc_certificate'
           WHERE
            `student_id` = $student_id";
            $update_res = mysqli_query($connection, $update_query);

            if ($update_res) {
                move_uploaded_file($tempname, $folder); ?>
    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_lk80fpsm.json" background="transparent" speed="1"
        style="width: 300px; height: 300px;" loop autoplay></lottie-player>
    <p>Success! Transfer Certificate Uploaded.</p>
    <form action="student-details.php" method="POST" class="w-100 d-flex justify-content-center align-items-center">
        <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
        <button type="submit" name="edit_back" class="btn btn-sm btn-outline-success">Go Back</button>
    </form>
    <?php
            }
        }
    }
    ?>
</div>
<?php require('includes/footer.php') ?>