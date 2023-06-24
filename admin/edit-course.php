<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="add-course.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Edit Course</h5>
    </div>

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


    if (isset($_POST['edit-fee'])) {
        $course_id = $_POST['course_id'];
        $fetch_course_query = "SELECT * FROM `bora_course` WHERE `course_id` = '$course_id'";
        $fetch_course_query_res = mysqli_query($connection, $fetch_course_query);

        $course_id = "";
        $course_name = "";
        $course_tenure = "";

        while ($row = mysqli_fetch_assoc($fetch_course_query_res)) {
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
            $course_tenure = $row['course_tenure'];
        }
    }

    ?>

    <!-- add-course-success.php -->
    <form class="add-user-form" method="POST" action="add-course.php">
        <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
        <div id="inputFieldsContainer">
            <div class="add-user-form-row">
                <div class="m-1 mobile-input col-md-6">
                    <label for="courseName1" class="form-label">Course Name</label>
                    <input type="text" name="course_name" value="<?php echo $course_name ?>" required
                        class="form-control" id="courseName1">
                </div>
                <div class="m-1 mobile-input col-md-5">
                    <label for="courseYear1" class="form-label">Course Year</label>
                    <select class="form-select" name="course_tenure" id="courseYear1">
                        <option selected><?php echo $course_tenure ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <button type="submit" name="update-course" class="mobile-input btn btn-sm btn-primary mt-4">+
                    Add</button>
            </div>
        </div>
    </form>
</div>
<?php include('includes/footer.php') ?>