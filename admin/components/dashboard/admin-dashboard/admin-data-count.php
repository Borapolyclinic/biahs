<div class="container user-form-container">
    <div class="dashboard-greeting">
        <h4>Welcome,</h4>
        <p><?php echo $user_name ?></p>
    </div>

    <?php
    $query = "SELECT * FROM `bora_student`";
    $res = mysqli_query($connection, $query);
    $student_count = mysqli_num_rows($res);
    $user_query = "SELECT * FROM `bora_users` WHERE `user_type` = 2";
    $user_res = mysqli_query($connection, $user_query);
    $count = mysqli_num_rows($user_res);
    ?>

    <div class="w-100 mb-3">
        <form action="search-student-data.php" method="POST" class="filter-row w-100 dashboard-tab p-3">
            <div class="w-100 m-1">
                <select name="search_type" class="form-select" aria-label="Default select example">
                    <option selected>Click here for options</option>
                    <option value="1">Name</option>
                    <option value="2">Mobile Number</option>
                    <option value="3">UID</option>
                </select>
            </div>
            <div class="w-100 m-1">
                <input type="text" name="student_search" class="form-control filter-input-box"
                    id="exampleFormControlInput1" placeholder="Enter Name, Mobile Number, UID to search user" required>
            </div>
            <button type="submit" name="search" class="btn btn-outline-success">Search</button>
        </form>
    </div>

    <div class="w-100 mt-2 container-row">
        <div class="dashboard-tab">
            <p>Students</p>
            <h5><?php echo $student_count ?></h5>
        </div>

        <div class="dashboard-tab">
            <p>Users</p>
            <h5><?php echo $count ?></h5>
        </div>
    </div>

    <div class="w-100 mt-3">
        <p>Filter Students by Course and Year</p>
        <form action="view-students-by-course.php" method="POST" class="dashboard-tab p-4">
            <div class="filter-row">
                <select name="course_id" class="form-select m-1" aria-label="Default select example">
                    <option selected>Select Course</option>
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

                <select name="course_year" class="form-select m-1" aria-label="Default select example">
                    <option selected>Select Year</option>
                    <?php
                    $fetch_course_year = "SELECT * FROM `bora_student`";
                    $fetch_course_year_res = mysqli_query($connection, $fetch_course_year);

                    while ($row = mysqli_fetch_assoc($fetch_course_year_res)) {
                        $student_admission_year = $row['student_admission_year'];
                    ?>
                    <option value="<?php echo $student_admission_year ?>"><?php echo $student_admission_year ?></option>
                    <?php } ?>
                </select>
                <button type="submit" name="filter-course" class="btn w-100 btn-success">Filter</button>
            </div>
        </form>
    </div>

    <div class="w-100 mt-3">
        <p>Last Login</p>
        <div class="table-responsive dashboard-tab p-3">

            <table class="table table-bordered">
                <thead class="table-active">
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">LOGIN TIME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $results_per_page = 5;
                    $fetch_login = "SELECT * FROM `bora_user_activity_tracker`";
                    $fetch_login_res = mysqli_query($connection, $fetch_login);
                    $number_of_result = mysqli_num_rows($fetch_login_res);

                    $number_of_page = ceil($number_of_result / $results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $page_first_result = ($page - 1) * $results_per_page;

                    $fetch_login_q = "SELECT * FROM `bora_user_activity_tracker` ORDER BY `activity_tracker_id` DESC LIMIT " . $page_first_result . ',' . $results_per_page;
                    $result = mysqli_query($connection, $fetch_login_q);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $activity_tracker_user_contact = $row['activity_tracker_user_contact'];
                        $activity_tracker_time = $row['activity_tracker_time'];
                    ?>
                    <tr>
                        <th scope="row">

                            <?php
                                $fetch_user = "SELECT * FROM `bora_users` WHERE `user_id` = '$activity_tracker_user_contact'";
                                $fetch_user_res = mysqli_query($connection, $fetch_user);
                                $user_name = "";
                                while ($row = mysqli_fetch_assoc($fetch_user_res)) {
                                    $user_name = $row['user_name'];
                                }
                                echo $user_name ?>
                        </th>
                        <td><?php echo $activity_tracker_time ?></td>
                    </tr>
                    <?php } ?>
                </tbody>


            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    for ($page = 1; $page <= $number_of_page; $page++) {
                        echo '<li class="page-item"><a class="page-link" href = "dashboard.php?page=' . $page . '">' . $page . ' </a></li>';
                    }
                    ?>




                </ul>
            </nav>
        </div>
    </div>
</div>