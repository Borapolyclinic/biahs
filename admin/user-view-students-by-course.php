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
        <div class="modal fade hide" id="emptyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>Please select course to search data!</p>
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
        <div class="modal fade hide" id="notFoundModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
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
        <!-- <form action="user-search-student-data.php" method="POST" class="filter-row w-100 dashboard-tab p-3">
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
        </form> -->
    </div>

    <div class="table-responsive user-table">
        <?php
        require('includes/connection.php');
        if (isset($_POST['filter-course'])) {
            $course_id = $_POST['course_id'];
            $course_year = $_POST['course_year'];

            if ($course_id == 'null') {
                echo "<script>openEmptyModal()</script>";
            } elseif (empty($course_year)) {
                echo "<script>notFound()</script>";
            } else {
                $page_query = "SELECT * FROM `bora_student` WHERE `student_course` = '$course_id' AND `student_batch` = '$course_year'";
                $page_result = mysqli_query($connection, $page_query);
                $page_result_count = mysqli_num_rows($page_result);
                if ($page_result_count > 0) { ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">UID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Course</th>
                                <th scope="col">Admission Batch</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                <th scope="col">Fee</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($page_result)) {
                                $student_id = $row['student_id'];
                                $student_img = "assets/student/" . $row['student_img'];
                                $student_batch = $row['student_batch'];
                                $student_name = $row['student_name'];
                                $student_contact = $row['student_contact'];
                                $student_course = $row['student_course'];
                                $student_roll = $row['student_roll'];
                                $student_batch = $row['student_batch'];
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

                                    <td><?php echo $student_batch ?></td>
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
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php
                } elseif ($page_result_count == 0) { ?>
                    <div class="alert alert-danger mt-3 mb-3 w-100" role="alert">
                        No Student Found!
                    </div>
        <?php }
            }
        } ?>

    </div>
</div>
<?php include('includes/footer.php') ?>