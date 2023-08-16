<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>

<div class="container user-form-container">
    <div class="page-marker">
        <a href="add-student.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Bulk Upload Student Data</h5>
    </div>
    <a href="assets/format/bora_student.zip" target="_blank" class="download-form-btn">Download Format <ion-icon name="download-outline"></ion-icon></a>
    <!-- <p>Note: Insert data into the columns of this .CSV file.</p> -->


    <form class="add-user-form" method="POST" action="upload-data.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">Select Course to Insert Data</label>
            <select name="course_name" class="form-select" aria-label="Default select example" required>
                <option value="null">Open this select menu</option>
                <?php
                require('includes/connection.php');
                $fetch_course_query = "SELECT * FROM `bora_course`";
                $fetch_course_res = mysqli_query($connection, $fetch_course_query);
                while ($row = mysqli_fetch_assoc($fetch_course_res)) {
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];

                ?>
                    <option value="<?php echo $course_id ?>"><?php echo $course_name ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload File</label>
            <input class="form-control" name="csvFile" type="file" id="formFile">
        </div>
        <button type="submit" name="submit" class="btn btn-outline-success w-100">Upload</button>
    </form>
</div>

<?php include('includes/footer.php') ?>