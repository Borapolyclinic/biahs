<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="index.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Add Course</h5>
    </div>

    <?php
    require('includes/connection.php');
    if (isset($_COOKIE['user_id'])) {
        $user_contact = $_COOKIE['user_id'];

        $fetch_data = "SELECT * FROM `bora_users` WHERE `user_id` = '$user_contact'";
        $fetch_res = mysqli_query($connection, $fetch_data);
        $user_name = "";
        while ($row = mysqli_fetch_assoc($fetch_res)) {
            $user_name = $row['user_name'];
        }
    }

    if (isset($_POST['add-course'])) {
        $course_name = mysqli_real_escape_string($connection, $_POST['course_name']);
        $course_tenure = mysqli_real_escape_string($connection, $_POST['course_tenure']);
        $course_status = mysqli_real_escape_string($connection, '1');

        $insert_course = "INSERT INTO `bora_course`(
            `course_name`,
            `course_tenure`,
            `course_added_by`,
            `course_status`
        )
        VALUES(
            '$course_name',
            '$course_tenure',
            '$user_name',
            '$course_status'
        )";
        $insert_course_res = mysqli_query($connection, $insert_course);
        if ($insert_course_res) { ?>
            <div class='mt-3 mb-3 w-100 alert alert-success' role='alert'>Course Added!</div>
    <?php
        }
    }
    ?>

    <!-- add-course-success.php -->
    <form class="add-user-form" method="POST" action="">
        <div id="inputFieldsContainer">
            <div class="add-user-form-row">
                <div class="m-1 mobile-input col-md-6">
                    <label for="courseName1" class="form-label">Course Name</label>
                    <input type="text" name="course_name" required class="form-control" id="courseName1">
                </div>
                <div class="m-1 mobile-input col-md-5">
                    <label for="courseYear1" class="form-label">Course Length</label>
                    <select class="form-select" name="course_tenure" id="courseYear1">
                        <option value="1">1 Year</option>
                        <option value="2">2 Years</option>
                        <option value="3">3 Years</option>
                        <option value="4">4 Years</option>
                    </select>
                </div>
                <button type="submit" name="add-course" class="mobile-input btn btn-sm btn-primary mt-4">+
                    Add</button>
            </div>
        </div>
    </form>

    <script>
        function deletePop(courseId) {
            $(document).ready(function() {
                $("#deleteModal").modal("show");
            });
        }
    </script>

    <div class="table-responsive user-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="width: 25%;">COURSE NAME</th>
                    <th scope="col">COURSE LENGTH</th>
                    <th scope="col">1 YEAR</th>
                    <th scope="col">2 YEARS</th>
                    <th scope="col">3 YEARS</th>
                    <th scope="col">4 YEARS</th>
                    <!-- <th scope="col">UPDATE</th> -->
                    <th scope="col">ACTION</th>
                    <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // ====================== UPDATE ======================
                if (isset($_POST['update_success_1'])) {
                    $course_id = $_POST['course_id'];
                    $course_year_1_fee = $_POST['course_year_1_fee'];

                    $update_query = "UPDATE
                        `bora_course`
                    SET
                        `course_year_1_fee` = '$course_year_1_fee'
                    WHERE
                        `course_id` = '$course_id'";

                    $update_res = mysqli_query($connection, $update_query);

                    if ($update_res) { ?>
                        <div class="alert alert-success mt-3 mb-3 w-100" role="alert">
                            Course Updated!
                        </div>
                    <?php
                    }
                }

                if (isset($_POST['update_success_2'])) {
                    $course_id = $_POST['course_id'];
                    $course_year_1_fee = $_POST['course_year_1_fee'];
                    $course_year_2_fee = $_POST['course_year_2_fee'];

                    $update_query = "UPDATE
                        `bora_course`
                    SET
                        `course_year_1_fee` = '$course_year_1_fee',
                        `course_year_2_fee` = '$course_year_2_fee'
                    WHERE
                        `course_id` = '$course_id'";

                    $update_res = mysqli_query($connection, $update_query);

                    if ($update_res) { ?>
                        <div class="alert alert-success mt-3 mb-3 w-100" role="alert">
                            Course Updated!
                        </div>
                    <?php
                    }
                }

                if (isset($_POST['update_success_3'])) {
                    $course_id = $_POST['course_id'];
                    $course_year_1_fee = $_POST['course_year_1_fee'];
                    $course_year_2_fee = $_POST['course_year_2_fee'];
                    $course_year_3_fee = $_POST['course_year_3_fee'];

                    $update_query = "UPDATE
                        `bora_course`
                    SET
                        `course_year_1_fee` = '$course_year_1_fee',
                        `course_year_2_fee` = '$course_year_2_fee',
                        `course_year_3_fee` = '$course_year_3_fee'
                    WHERE
                        `course_id` = '$course_id'";

                    $update_res = mysqli_query($connection, $update_query);

                    if ($update_res) { ?>
                        <div class="alert alert-success mt-3 mb-3 w-100" role="alert">
                            Course Updated!
                        </div>
                    <?php
                    }
                }

                if (isset($_POST['update_success_4'])) {
                    $course_id = $_POST['course_id'];
                    $course_year_1_fee = $_POST['course_year_1_fee'];
                    $course_year_2_fee = $_POST['course_year_2_fee'];
                    $course_year_3_fee = $_POST['course_year_3_fee'];
                    $course_year_4_fee = $_POST['course_year_4_fee'];

                    $update_query = "UPDATE
                        `bora_course`
                    SET
                        `course_year_1_fee` = '$course_year_1_fee',
                        `course_year_2_fee` = '$course_year_2_fee',
                        `course_year_3_fee` = '$course_year_3_fee',
                        `course_year_4_fee` = '$course_year_4_fee'
                    WHERE
                        `course_id` = '$course_id'";

                    $update_res = mysqli_query($connection, $update_query);

                    if ($update_res) { ?>
                        <div class="alert alert-success mt-3 mb-3 w-100" role="alert">
                            Course Updated!
                        </div>
                    <?php
                    }
                }

                if (isset($_POST['delete_confirm'])) {
                    $course_id = $_POST['course_id'];
                    $del_query = "DELETE FROM `bora_course` WHERE `course_id` = '$course_id'";
                    $del_query_res = mysqli_query($connection, $del_query);
                }

                // ====================== DELETE ======================
                if (isset($_POST['del'])) {
                    $course_id = $_POST['course_id'];
                    echo '<script>deletePop(' . $course_id . ');</script>'; ?>
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">
                                        <div>
                                            <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                            <p>Are you sure you want to delete this course?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="delete_confirm" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                <?php

                }

                // ====================== UPDATE YEAR 1 FEE ======================
                if (isset($_POST['add-fee-1'])) {
                    $course_id = $_POST['course_id'];
                    $course_year_1_fee = $_POST['course_year_1_fee'];
                    $update_query = "UPDATE
                    `bora_course`
                SET
                    `course_year_1_fee` = '$course_year_1_fee'
                WHERE
                    `course_id` = '$course_id'";
                    $update_query_res = mysqli_query($connection, $update_query);
                }

                // ====================== UPDATE YEAR 2 FEE ======================
                if (isset($_POST['add-fee-2'])) {
                    $course_id = $_POST['course_id'];
                    $course_year_1_fee = $_POST['course_year_1_fee'];
                    $course_year_2_fee = $_POST['course_year_2_fee'];
                    $update_query = "UPDATE
                    `bora_course`
                SET
                    `course_year_1_fee` = '$course_year_1_fee',
                    `course_year_2_fee` = '$course_year_2_fee'
                WHERE
                    `course_id` = '$course_id'";
                    $update_query_res = mysqli_query($connection, $update_query);
                }

                // ====================== UPDATE YEAR 3 FEE ======================
                if (isset($_POST['add-fee-3'])) {
                    $course_id = $_POST['course_id'];
                    $course_year_1_fee = $_POST['course_year_1_fee'];
                    $course_year_2_fee = $_POST['course_year_2_fee'];
                    $course_year_3_fee = $_POST['course_year_3_fee'];
                    $update_query = "UPDATE
                    `bora_course`
                SET
                    `course_year_1_fee` = '$course_year_1_fee',
                    `course_year_2_fee` = '$course_year_2_fee',
                    `course_year_3_fee` = '$course_year_3_fee'
                WHERE
                    `course_id` = '$course_id'";
                    $update_query_res = mysqli_query($connection, $update_query);
                }

                // ====================== UPDATE YEAR 4 FEE ======================
                if (isset($_POST['add-fee-4'])) {
                    $course_id = $_POST['course_id'];
                    $course_year_1_fee = $_POST['course_year_1_fee'];
                    $course_year_2_fee = $_POST['course_year_2_fee'];
                    $course_year_3_fee = $_POST['course_year_3_fee'];
                    $course_year_4_fee = $_POST['course_year_4_fee'];
                    $update_query = "UPDATE `bora_course` SET `course_year_1_fee` = '$course_year_1_fee', `course_year_2_fee` = '$course_year_2_fee', `course_year_3_fee` = '$course_year_3_fee', `course_year_4_fee` = '$course_year_4_fee' WHERE `course_id` = '$course_id'";
                    $update_query_res = mysqli_query($connection, $update_query);
                }

                // ====================== FETCH COURSE DETAILS ======================
                $fetch_course = "SELECT * FROM `bora_course`";
                $fetch_course_res = mysqli_query($connection, $fetch_course);
                while ($row = mysqli_fetch_assoc($fetch_course_res)) {
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];
                    $course_tenure = $row['course_tenure'];
                    $course_year_1_fee = $row['course_year_1_fee'];
                    $course_year_2_fee = $row['course_year_2_fee'];
                    $course_year_3_fee = $row['course_year_3_fee'];
                    $course_year_4_fee = $row['course_year_4_fee'];
                ?>
                    <tr>
                        <th scope="row" class="w-30"><?php echo $course_name; ?></th>
                        <td><?php echo $course_tenure ?> Year</td>

                        <!-- =========== COURSE TENURE 1 =========== -->
                        <?php if ($course_tenure == '1') { ?>
                            <form action="" method="POST">
                                <td>
                                    <input type="number" name="course_year_1_fee" value="<?php echo $course_year_1_fee ?>" class="form-control" id="yearOne" placeholder="₹₹<?php echo $course_year_1_fee ?>" disabled>
                                </td>
                                <td><input type="number" class="form-control" id="yearOne" placeholder="NA" disabled></td>
                                <td><input type="number" class="form-control" id="yearOne" placeholder="NA" disabled></td>
                                <td><input type="number" class="form-control" id="yearOne" placeholder="NA" disabled></td>
                            </form>

                            <td>
                                <form action="edit-course.php" method="POST">
                                    <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                    <button name="edit-fee" type="submit" class="btn btn-sm btn-outline-warning">Edit</button>
                                </form>
                            </td>

                            <td>
                                <form action="" method="POST">
                                    <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                    <button name="del" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>

                            <!-- =========== COURSE TENURE 2 =========== -->
                        <?php } else if ($course_tenure == '2') { ?>
                            <form action="" method="POST">
                                <td>
                                    <input type="number" name="course_year_1_fee" value="<?php echo $course_year_1_fee ?> " class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_1_fee ?>" disabled>
                                </td>
                                <td>
                                    <input type="number" name="course_year_2_fee" value="<?php echo $course_year_2_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_2_fee ?>" disabled>
                                </td>
                                <td><input type="number" class="form-control" id="yearOne" placeholder="NA" disabled></td>
                                <td><input type="number" class="form-control" id="yearOne" placeholder="NA" disabled></td>
                            </form>
                            <td>
                                <form action="edit-course.php" method="POST">
                                    <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                    <button name="edit-fee" type="submit" class="btn btn-sm btn-outline-warning">Edit</button>
                                </form>
                            </td>

                            <td>
                                <form action="" method="POST">
                                    <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                    <button name="del" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>

                            <!-- =========== COURSE TENURE 3 =========== -->
                        <?php } else if ($course_tenure == '3') {  ?>
                            <form action="" method="POST">
                                <td>
                                    <input type="number" name="course_year_1_fee" value="<?php echo $course_year_1_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_1_fee ?>" disabled>
                                </td>
                                <td>
                                    <input type="number" name="course_year_2_fee" value="<?php echo $course_year_2_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_2_fee ?>" disabled>
                                </td>
                                <td>
                                    <input type="number" name="course_year_3_fee" value="<?php echo $course_year_3_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_3_fee ?>" disabled>
                                </td>
                                <td><input type="number" class="form-control" id="yearOne" placeholder="NA" disabled></td>
                            </form>
                            <td>
                                <form action="edit-course.php" method="POST">
                                    <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                    <button name="edit-fee" type="submit" class="btn btn-sm btn-outline-warning">Edit</button>
                                </form>
                            </td>

                            <td>
                                <form action="" method="POST">
                                    <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                    <button name="del" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>


                            <!-- =========== COURSE TENURE 4 =========== -->
                        <?php } else if ($course_tenure == '4') { ?>
                            <form action="" method="POST">
                                <td>
                                    <input type="number" name="course_year_1_fee" value="<?php echo $course_year_1_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_1_fee ?>" disabled>
                                </td>
                                <td>
                                    <input type="number" name="course_year_2_fee" value="<?php echo $course_year_2_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_2_fee ?>" disabled>
                                </td>
                                <td>
                                    <input type="number" name="course_year_3_fee" value="<?php echo $course_year_3_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_3_fee ?>" disabled>
                                </td>
                                <td>
                                    <input type="number" name="course_year_4_fee" value="<?php echo $course_year_4_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_4_fee ?>" disabled>
                                </td>
                            </form>
                            <td>
                                <form action="edit-course.php" method="POST">
                                    <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                    <button name="edit-fee" type="submit" class="btn btn-sm btn-outline-warning">Edit</button>
                                </form>
                            </td>

                            <td>
                                <form action="" method="POST">
                                    <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                    <button name="del" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        <?php } ?>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>
<?php include('includes/footer.php') ?>