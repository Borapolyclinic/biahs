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
        <form action="user-search-student-data.php" method="POST" class="filter-row w-100 dashboard-tab p-3">
            <div class="w-100 m-1">
                <select name="search_type" class="form-select" aria-label="Default select example">
                    <option value="null">Click here for options</option>
                    <option value="1">Name</option>
                    <option value="2">Mobile Number</option>
                    <option value="3">UID</option>
                </select>
            </div>
            <div class="w-100 m-1">
                <input type="text" name="student_search" class="form-control filter-input-box"
                    id="exampleFormControlInput1" placeholder="" required>
            </div>
            <button type="submit" name="search" class="btn btn-outline-success">Search</button>
        </form>
    </div>

    <div class="w-100 mt-3">
        <p>Filter Students by Course and Year</p>
        <form action="user-view-students-by-course.php" method="POST" class="dashboard-tab p-4">
            <div class="filter-row">
                <select name="course_id" class="form-select m-1" aria-label="Default select example">
                    <option value="null">Select Course</option>
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

                <div class="w-100 m-1">
                    <input type="number" maxlength="4" min="1999" max="2025" name="course_year" class="form-control"
                        id="exampleFormControlInput1" placeholder="Enter Year">
                </div>

                <!-- <select name="course_year" class="form-select m-1" aria-label="Default select example" required>
                    <option selected>Select Year</option>
                    <?php
                    $fetch_course_year = "SELECT * FROM `bora_student`";
                    $fetch_course_year_res = mysqli_query($connection, $fetch_course_year);

                    while ($row = mysqli_fetch_assoc($fetch_course_year_res)) {
                        $student_admission_year = $row['student_admission_year'];
                    ?>
                    <option value="<?php echo $student_admission_year ?>"><?php echo $student_admission_year ?></option>
                    <?php } ?>
                </select> -->
                <button type="submit" name="filter-course" class="btn w-100 btn-success">Filter</button>
            </div>
        </form>
    </div>

    <!-- <div class="w-100 mt-3 container-row">
        <div class="dashboard-tab">
            <p>Students</p>
            <h5><?php echo $student_count ?></h5>
        </div>
    </div> -->
</div>