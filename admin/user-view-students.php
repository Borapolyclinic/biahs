<?php include('includes/header.php') ?>
<?php include('components/navbar/user-navbar.php') ?>
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
    $user_query = "SELECT * FROM `bora_users` WHERE `user_type` = '2'";
    $user_res = mysqli_query($connection, $user_query);
    $count = mysqli_num_rows($user_res);

    if ($student_count > 0) {
    ?>

        <div class="w-100 mb-3">
            <form action="user-search-student-data.php" method="POST" class="filter-row w-100 dashboard-tab p-3">
                <div class="w-100 m-1">
                    <select name="search_type" class="form-select" aria-label="Default select example">
                        <option selected>Click here for options</option>
                        <option value="1">Name</option>
                        <option value="2">Mobile Number</option>
                        <option value="3">UID</option>
                    </select>
                </div>
                <div class="w-100 m-1">
                    <input type="text" name="student_search" class="form-control filter-input-box" id="exampleFormControlInput1" placeholder="" required>
                </div>
                <button type="submit" name="search" class="btn btn-outline-success">Search</button>
            </form>
        </div>

        <script>
            function openModal(studentId) {
                $(document).ready(function() {
                    $("#exampleModal").modal("show");
                });
            }

            function deleteStudentModal(studentId) {
                $(document).ready(function() {
                    $("#deleteStudent").modal("show");
                });
            }
        </script>

        <div class="table-responsive user-table">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">UID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Course</th>
                        <!-- <th scope="col">Admission Year</th> -->
                        <th scope="col">Admission Batch</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        <!-- <th scope="col">Delete</th> -->
                        <!-- <th scope="col">Admission Status</th> -->
                        <th scope="col">Fee</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (isset($_POST['update_status'])) {
                        $student_id = $_POST['student_id'];
                        $student_status = $_POST['student_status'];

                        $change_status_query = "UPDATE
                        `bora_student`
                    SET
                        `student_status` = '$student_status'
                    WHERE
                        `student_id` = '$student_id'";
                        $change_status_query_r = mysqli_query($connection, $change_status_query);
                    }

                    if (isset($_POST['change'])) {
                        $student_id = $_POST['student_id'];
                        echo '<script>openModal(' . $student_id . ');</script>';
                    ?>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Admission Status</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal-body">
                                            <div>
                                                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                                                <select name="student_status" class="form-select" aria-label="Default select example">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">Graduated</option>
                                                    <option value="2">Active</option>
                                                    <option value="3">Left</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="update_status" class="btn btn-primary">Save
                                                changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }

                    $results_per_page = 20;
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
                    $page_query = "SELECT * FROM `bora_student` LIMIT "  . $page_first_result . ',' . $results_per_page;
                    $page_result = mysqli_query($connection, $page_query);
                    while ($row = mysqli_fetch_assoc($page_result)) {
                        $student_id = $row['student_id'];
                        $student_img = "assets/student/" . $row['student_img'];
                        $student_batch = $row['student_batch'];
                        $student_name = $row['student_name'];
                        $student_contact = $row['student_contact'];
                        $student_course = $row['student_course'];
                        $student_enrollment_number = $row['student_enrollment_number'];
                        $student_roll = $row['student_roll'];
                        $student_admission_year = $row['student_admission_year'];
                        $student_added_by = $row['student_added_by'];
                        $student_status = $row['student_status'];
                    ?>
                        <tr>
                            <td><?php echo $student_roll ?></td>
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
                            <!-- <td><?php echo $student_admission_year ?></td> -->
                            <td><?php echo $student_batch ?></td>
                            <td>
                                <?php
                                if ($student_status == '1') { ?>
                                    <p class="btn btn-sm btn-dark">Graduated</p>
                                <?php } elseif ($student_status == '2') { ?>
                                    <p class="btn btn-sm btn-success">Active</p>
                                <?php } elseif ($student_status == '3') { ?>
                                    <p class="btn btn-sm btn-primary">Left</p>
                                <?php } elseif (empty($student_status)) { ?>
                                    <p class="btn btn-sm btn-info">Not Updated</p>
                                <?php } ?>
                            </td>
                            <td>
                                <form action="user-student-details.php" method="post">
                                    <input type="text" value="<?php echo $student_id ?>" name="student_id" hidden>
                                    <button type="submit" name="edit" class="btn btn-sm btn-outline-success">View
                                        Details</button>
                                </form>
                            </td>
                            <!-- <td>
                        <form action="" method="POST">
                            <input type="text" value="<?php echo $student_id ?>" name="student_id" hidden>
                            <button type="submit" name="change" class="btn btn-sm btn-primary">Change Status</button>
                        </form>
                    </td> -->
                            <td>
                                <form action="user-collect-fee.php" method="POST">
                                    <input type="text" value="<?php echo $student_id ?>" name="student_id" hidden>
                                    <button type="submit" name="collect" class="btn btn-sm btn-outline-warning">Collect
                                        Fee</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation example" class="w-100 mt-3">
                <ul class="pagination">
                    <?php
                    // Check if there are more than 10 pages
                    if ($number_of_page > 10) {
                        // If the current page is not the first page, show the "Previous" button
                        if ($page > 1) {
                            echo '<li class="page-item"><a class="page-link" href="user-view-students.php?page=' . ($page - 1) . '">Previous</a></li>';
                        }

                        // Show only 10 pages at a time, starting from the current page
                        $start_page = max(1, $page - 4);
                        $end_page = min($start_page + 9, $number_of_page);

                        // Display the page links
                        for ($i = $start_page; $i <= $end_page; $i++) {
                            echo '<li class="page-item"><a class="page-link" href="user-view-students.php?page=' . $i . '">' . $i . ' </a></li>';
                        }

                        // If the current page is not the last page, show the "Next" button
                        if ($page < $number_of_page) {
                            echo '<li class="page-item"><a class="page-link" href="user-view-students.php?page=' . ($page + 1) . '">Next</a></li>';
                        }
                    } else {
                        // If there are 10 pages or less, display all page links
                        for ($i = 1; $i <= $number_of_page; $i++) {
                            echo '<li class="page-item"><a class="page-link" href="user-view-students.php?page=' . $i . '">' . $i . ' </a></li>';
                        }
                    }
                    ?>
                </ul>
            </nav>

        </div>

    <?php } else if ($student_count == 0) { ?>
        <div class="alert alert-danger w-100 mt-3 mb-3" role="alert">
            No students found
        </div>
    <?php } ?>
</div>
<?php include('includes/footer.php') ?>