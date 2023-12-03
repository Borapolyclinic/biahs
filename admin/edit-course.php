<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="add-course.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Edit Course</h5>
    </div>

    <script>
        function confirmFormSubmission() {
            var confirmation = confirm("Are you sure you want to update?");
            return confirmation;
        }
    </script>

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
    ?>

    <div class="table-responsive user-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="width: 25%;">COURSE NAME</th>
                    <th scope="col">COURSE LENGTH</th>
                    <th scope="col">YEAR 1</th>
                    <th scope="col">YEAR 2</th>
                    <th scope="col">YEAR 3</th>
                    <th scope="col">YEAR 4</th>
                    <th scope="col">UPDATE</th>
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

                if (isset($_POST['edit-fee']) || isset($_POST['update_success_1']) || isset($_POST['update_success_2']) || isset($_POST['update_success_3']) || isset($_POST['update_success_4'])) {
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
                        $course_year_1_fee = $row['course_year_1_fee'];
                        $course_year_2_fee = $row['course_year_2_fee'];
                        $course_year_3_fee = $row['course_year_3_fee'];
                        $course_year_4_fee = $row['course_year_4_fee'];
                    }
                }
                ?>
                <tr>
                    <th scope="row" class="w-30"><?php echo $course_name; ?></th>
                    <td><?php echo $course_tenure ?> Year</td>

                    <!-- =========== COURSE TENURE 1 =========== -->
                    <?php if ($course_tenure == '1') { ?>
                        <form action="" method="POST" onsubmit="return confirmFormSubmission()">
                            <td>
                                <input type="number" name="course_year_1_fee" value="<?php echo $course_year_1_fee ?>" class="form-control" id="yearOne" placeholder="₹₹<?php echo $course_year_1_fee ?>">
                            </td>
                            <td><input type="number" class="form-control" id="yearOne" placeholder="NA" disabled></td>
                            <td><input type="number" class="form-control" id="yearOne" placeholder="NA" disabled></td>
                            <td><input type="number" class="form-control" id="yearOne" placeholder="NA" disabled></td>
                            <td>
                                <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                <button type="submit" name="update_success_1" class="btn btn-sm btn-outline-success">Update</button>
                            </td>
                        </form>

                        <!-- =========== COURSE TENURE 2 =========== -->
                    <?php } else if ($course_tenure == '2') { ?>
                        <form action="" method="POST" onsubmit="return confirmFormSubmission()">
                            <td>
                                <input type="number" name="course_year_1_fee" value="<?php echo $course_year_1_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_1_fee ?>">
                            </td>
                            <td>
                                <input type="number" name="course_year_2_fee" value="<?php echo $course_year_2_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_2_fee ?>">
                            </td>
                            <td><input type="number" class="form-control" id="yearOne" placeholder="NA" disabled></td>
                            <td><input type="number" class="form-control" id="yearOne" placeholder="NA" disabled></td>
                            <td>

                                <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                <button type="submit" name="update_success_2" class="btn btn-sm btn-outline-success">Update</button>

                            </td>
                        </form>
                        <!-- =========== COURSE TENURE 3 =========== -->
                    <?php } else if ($course_tenure == '3') {  ?>
                        <form action="" method="POST" onsubmit="return confirmFormSubmission()">
                            <td>
                                <input type="number" name="course_year_1_fee" value="<?php echo $course_year_1_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_1_fee ?>">
                            </td>
                            <td>
                                <input type="number" name="course_year_2_fee" value="<?php echo $course_year_2_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_2_fee ?>">
                            </td>
                            <td>
                                <input type="number" name="course_year_3_fee" value="<?php echo $course_year_3_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_3_fee ?>">
                            </td>
                            <td><input type="number" class="form-control" id="yearOne" placeholder="NA" disabled></td>
                            <td>

                                <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                <button type="submit" name="update_success_3" class="btn btn-sm btn-outline-success">Update</button>

                            </td>
                        </form>
                        <!-- =========== COURSE TENURE 4 =========== -->
                    <?php } else if ($course_tenure == '4') { ?>
                        <form action="" method="POST" onsubmit="return confirmFormSubmission()">
                            <td>
                                <input type="number" name="course_year_1_fee" value="<?php echo $course_year_1_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_1_fee ?>">
                            </td>
                            <td>
                                <input type="number" name="course_year_2_fee" value="<?php echo $course_year_2_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_2_fee ?>">
                            </td>
                            <td>
                                <input type="number" name="course_year_3_fee" value="<?php echo $course_year_3_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_3_fee ?>">
                            </td>
                            <td>
                                <input type="number" name="course_year_4_fee" value="<?php echo $course_year_4_fee ?>" class="form-control" id="yearOne" placeholder="₹<?php echo $course_year_4_fee ?>">
                            </td>

                            <td>

                                <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                <button type="submit" name="update_success_4" class="btn btn-sm btn-outline-success">Update</button>

                            </td>
                        </form>
                    <?php } ?>

                </tr>

            </tbody>
        </table>

    </div>
</div>
<?php include('includes/footer.php') ?>