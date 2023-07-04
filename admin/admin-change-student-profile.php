<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>

<?php
require('includes/connection.php');
if (isset($_POST['change_picture'])) {
    $student_id = $_POST['student_id'];
    $query = "SELECT * FROM `bora_student` WHERE `student_id` = '$student_id'";
    $res = mysqli_query($connection, $query);

    $student_id = "";
    $student_name = "";
    $student_img = "";
    $student_aadhar_back_file = "";

    while ($row = mysqli_fetch_assoc($res)) {
        $student_id = $row['student_id'];
        $student_name = $row['student_name'];
        $student_img = "assets/student/" . $row['student_img'];
        $student_aadhar_back_file = "assets/student/" . $row['student_aadhar_back_file'];
    }
}
?>
<div class="container user-form-container">
    <form action="student-details.php" method="POST" class="page-marker">
        <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
        <button type="submit" name="edit_back" class="page-marker no-btn">
            <a href="#">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a>
            <h5>Change Profile Picture</h5>
        </button>
    </form>
    <div class="w-100">
        <div class="doc-img">
            <form action="student-profile-change-success.php" method="POST" enctype="multipart/form-data" class="">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <img src="<?php echo $student_img ?>" alt="">
                <!-- <p>Front Image</p> -->
                <div class="mb-3">
                    <input class="form-control" name="student_img" type="file" id="formFile">
                </div>
                <button type="submit" name="front" class="w-100 btn btn-outline-success">Change/Upload Image</button>
            </form>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>