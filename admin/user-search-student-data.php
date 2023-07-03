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
    $user_query = "SELECT * FROM `bora_users` WHERE `user_type` = 2";
    $user_res = mysqli_query($connection, $user_query);
    $count = mysqli_num_rows($user_res);
    ?>

    <div class="w-100 mb-3">
        <script>
        function openEmptyModal() {
            $(document).ready(function() {
                $("#emptyModal").modal("show");
            });
        }

        function notFound() {
            $(document).ready(function() {
                $("#notFoundModal").modal("show");
            });
        }
        </script>
        <!-- ======================= MODAL ======================= -->
        <div class="modal fade hide" id="emptyModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>Search category cannot be empty!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <a href="dashboard.php" class="btn btn-primary">Go back</a>
                    </div>
                </div>
            </div>
        </div>



        <!-- ======================= NOT FOUND ======================= -->
        <div class="modal fade hide" id="notFoundModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Oops!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>No Student found!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <a href="dashboard.php" class="btn btn-primary">Go back</a>
                    </div>
                </div>
            </div>
        </div>
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
                <input type="text" name="student_search" class="form-control filter-input-box"
                    id="exampleFormControlInput1" placeholder="Enter Name, Mobile Number, UID to search user" required>
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
    </script>

    <div class="table-responsive user-table">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">UID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Course</th>
                    <th scope="col">Admission Year</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <!-- <th scope="col">Admission Status</th> -->
                    <th scope="col">Fee</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('includes/connection.php');

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
                    echo '<script>openModal(' . $student_id . ');</script>'; ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Admission Status</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    <div>
                                        <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                                        <select name="student_status" class="form-select"
                                            aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">Graduated</option>
                                            <option value="2">Active</option>
                                            <option value="3">Left</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="update_status" class="btn btn-primary">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                }
                if (isset($_POST['search'])) {
                    $search_type = $_POST['search_type'];
                    $student_search = $_POST['student_search'];

                    if ($search_type = 'null') {
                        echo "<script>openEmptyModal()</script>";
                    } else {
                        $query = "SELECT * FROM `bora_student` WHERE ";
                        if ($search_type == '1') {
                            $query .= "`student_name` LIKE '%$student_search%'";
                        } elseif ($search_type == '2') {
                            $query .= "`student_contact` LIKE '%$student_search%'";
                        } elseif ($search_type == '3') {
                            $query .= "`student_roll` LIKE '%$student_search%'";
                        }

                        $res = mysqli_query($connection, $query);
                        if ($res) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $student_id = $row['student_id'];
                                $student_img = "assets/student/" . $row['student_img'];
                                $student_name = $row['student_name'];
                                $student_contact = $row['student_contact'];
                                $student_course = $row['student_course'];
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

                                        $fetch_course = "SELECT * FROM `bora_course` WHERE `course_id` = '$student_course'";
                                        $fetch_course_r = mysqli_query($connection, $fetch_course);
                                        $course_name = "";
                                        while ($row = mysqli_fetch_assoc($fetch_course_r)) {
                                            $course_name = $row['course_name'];
                                        }
                                        echo $course_name ?></td>
                    <td><?php echo $student_admission_year ?></td>
                    <td>
                        <?php if ($student_status == '1') { ?>
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
                            <button type="submit" name="edit" class="btn btn-sm btn-outline-success">Edit
                                Details</button>
                        </form>
                    </td>
                    <td>
                        <form action="user-collect-fee.php" method="POST">
                            <input type="text" value="<?php echo $student_id ?>" name="student_id" hidden>
                            <button type="submit" name="collect" class="btn btn-sm btn-outline-warning">Collect
                                Fee</button>
                        </form>
                    </td>
                    <!-- <td>
                        <form action="" method="POST">
                            <input type="text" value="<?php echo $student_id ?>" name="student_id" hidden>
                            <button type="submit" name="change" class="btn btn-sm btn-primary">Change Status</button>
                        </form>
                    </td> -->
                </tr>
                <?php
                            }
                        } else {
                            echo "Not Found";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('includes/footer.php') ?>