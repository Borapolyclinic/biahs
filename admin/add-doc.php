<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>

<?php
require('includes/connection.php');
if (isset($_POST['view'])) {
    $student_id = $_POST['student_id'];

    $query = "SELECT * FROM `bora_student` WHERE `student_id` = '$student_id'";
    $res = mysqli_query($connection, $query);
    $student_id = "";
    $student_additional_doc = "";
    while ($row = mysqli_fetch_assoc($res)) {
        $student_id = $row['student_id'];
        $student_additional_doc = "assets/add_doc/" . $row['student_additional_doc'];
    }
}

?>
<div class="container user-form-container">
    <?php
    if (!empty($student_additional_doc)) { ?>
        <form action="student-details.php" method="POST" class="page-marker">
            <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
            <button type="submit" name="edit_back" class="page-marker no-btn">
                <a href="">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
                <h5>Additional Document</h5>
            </button>
        </form>
        <div class="doc-row w-100">
            <div class="col-md-6 doc-img">
                <form action="alot-update-success.php" method="POST" enctype="multipart/form-data" class="">
                    <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                    <img src="<?php echo $student_graduation_marksheet ?>" alt="">
                </form>
            </div>
        </div>
    <?php } else { ?>
        <div class="w-100 alert alert-danger" role="alert">
            No additional documents uploaded for this student!
        </div>
    <?php } ?>
</div>
<?php include('includes/footer.php') ?>