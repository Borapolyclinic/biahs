<?php require('includes/header.php') ?>
<div class="container mt-5 add-user-success">
    <?php
    require('includes/connection.php');
    if (isset($_POST['front'])) {
        $student_id = $_POST['student_id'];
        $student_img = $_FILES["student_img"]["name"];
        $tempname = $_FILES["student_img"]["tmp_name"];
        $folder = "assets/student/" . $student_img;

        if (empty($student_img)) { ?>
    <div class="alert alert-danger" role="alert">
        Please upload an Image to update the Profile Picture.
    </div>
    <?php } else {

            $update_query = "UPDATE
            `bora_student`
        SET
            `student_img` = '$student_img'
           WHERE
            `student_id` = $student_id";
            $update_res = mysqli_query($connection, $update_query);

            if ($update_res) {
                move_uploaded_file($tempname, $folder); ?>
    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_lk80fpsm.json" background="transparent" speed="1"
        style="width: 300px; height: 300px;" loop autoplay></lottie-player>
    <p>Success! Profile Image Updated.</p>
    <form action="view-students.php" method="POST" class="w-100 d-flex justify-content-center align-items-center">
        <input type="text" name="student_img" value="<?php echo $student_img ?>" hidden>
        <button type="submit" name="edit" class="btn btn-sm btn-outline-success">Go Back</button>
    </form>
    <?php

            }
        }
    }
    ?>
</div>
<?php require('includes/footer.php') ?>