<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="index.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>View Students</h5>
    </div>
    <?php
    require('includes/connection.php');
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

    <div class="table-responsive user-table">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">UID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Course</th>
                    <th scope="col">Admission Year</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('includes/connection.php');
                if (isset($_POST['delete'])) {
                    $student_id = $_POST['student_id'];

                    $delete_query = "DELETE FROM `bora_student` WHERE `student_id` = '$student_id'";
                    $delete_res = mysqli_query($connection, $delete_query);

                    if ($delete_res) { ?>
                <div class="w-100 alert alert-success mt-3 mb-3" role="alert">Student Deleted!</div>
                <?php
                    }
                }

                if (isset($_POST['search'])) {
                    $search_type = $_POST['search_type'];
                    $student_search = $_POST['student_search'];

                    $results_per_page = 10;

                    $fetch_students = "SELECT * FROM `bora_student` ORDER BY `student_added_date` DESC";
                    $fetch_res = mysqli_query($connection, $fetch_students);
                    $count = mysqli_num_rows($fetch_res);

                    $number_of_page = ceil($count / $results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $page_first_result = ($page - 1) * $results_per_page;
                    $page_query = "SELECT * FROM `bora_student` WHERE ";
                    if ($search_type == '1') {
                        $page_query .= "`student_name` LIKE '%$student_search%' LIMIT " . $page_first_result . ',' . $results_per_page;
                    } else if ($search_type == '2') {
                        $page_query .= "`student_contact` LIKE '%$student_search%' LIMIT " . $page_first_result . ',' . $results_per_page;
                    } else if ($search_type == '3') {
                        $page_query .= "`student_enrollment_number` LIKE '%$student_search%' LIMIT " . $page_first_result . ',' . $results_per_page;
                    }

                    $page_result = mysqli_query($connection, $page_query);

                    while ($row = mysqli_fetch_assoc($page_result)) {
                        $student_id = $row['student_id'];
                        $student_img = "assets/student/" . $row['student_img'];
                        $student_name = $row['student_name'];
                        $student_contact = $row['student_contact'];
                        $student_course = $row['student_course'];
                        $student_enrollment_number = $row['student_enrollment_number'];
                        $student_admission_year = $row['student_admission_year'];
                        $student_added_by = $row['student_added_by']; ?>
                <tr>

                    <td><?php echo $student_enrollment_number ?></td>
                    <th scope="row"><?php echo $student_name ?></th>
                    <td><?php echo $student_contact ?></td>
                    <td><?php
                                $fetch_course_name = "SELECT * FROM `bora_course` WHERE `course_id` = '$student_course'";
                                $fetch_course_name_res = mysqli_query($connection, $fetch_course_name);
                                $course_name = "";
                                while ($row = mysqli_fetch_assoc($fetch_course_name_res)) {
                                    $course_name = $row['course_name'];
                                }
                                echo $course_name ?></td>
                    <td><?php echo $student_admission_year ?></td>
                    <td>
                        <form action="student-details.php" method="post">
                            <input type="text" value="<?php echo $student_id ?>" name="student_id" hidden>
                            <button type="submit" name="edit" class="btn btn-sm btn-outline-success">View
                                Details</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="POST">
                            <input type="text" value="<?php echo $student_id ?>" name="student_id" hidden>
                            <button type="submit" name="delete" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('includes/footer.php') ?>