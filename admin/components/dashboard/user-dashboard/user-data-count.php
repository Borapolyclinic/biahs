<div class="container user-form-container">
    <div class="dashboard-greeting">
        <h4>Welcome,</h4>
        <p><?php echo $user_name ?></p>
    </div>


    <?php
    $query = "SELECT * FROM `bora_student`";
    $res = mysqli_query($connection, $query);
    $student_count = mysqli_num_rows($res);
    ?>

    <div class="w-100 mb-3">
        <form action="user-search-student-data.php" method="POST" class="filter-row w-100">
            <input type="text" name="student_search" class="form-control filter-input-box" id="exampleFormControlInput1"
                placeholder="Enter Mobile Number, Aadhaar card number, Roll number, Name or Course to search user"
                required>
            <button type="submit" name="search" class="btn btn-outline-success">Search</button>
        </form>
    </div>

    <div class="w-100 mt-3">
        <p>Filter Students by Course</p>
        <form action="user-view-students-by-course.php" method="POST" class="dashboard-tab p-4">
            <select name="course_id" class="form-select" aria-label="Default select example">
                <option selected>Click here to get course</option>
                <?php
                $fetch_course = "SELECT * FROM `bora_course`";
                $fetch_course_res = mysqli_query($connection, $fetch_course);

                while ($row = mysqli_fetch_assoc($fetch_course_res)) {
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];
                ?>
                <option value="<?php echo $course_id ?>"><?php echo $course_name ?></option>
                <?php } ?>
            </select>
            <button type="submit" name="filter-course" class="btn w-100 mt-3 btn-success">Filter</button>
        </form>
    </div>

    <!-- <div class="w-100 mt-3 container-row">
        <div class="dashboard-tab">
            <p>Students</p>
            <h5><?php echo $student_count ?></h5>
        </div>
    </div> -->
</div>