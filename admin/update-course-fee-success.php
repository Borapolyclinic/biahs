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
    ?>

    <div class="table-responsive user-table">
        <!-- <script>
        function updateCourse(courseId, courseYear1Fee) {
            $(document).ready(function() {
                $("#updateCourseModal").modal("show");
            });
        }

        function updateCourse2(courseId, courseYear1Fee, courseYear2Fee) {
            $(document).ready(function() {
                $("#updateCourseModal2").modal("show");
            });
        }

        function updateCourse3(courseId, courseYear1Fee, courseYear2Fee, courseYear3Fee) {
            $(document).ready(function() {
                $("#updateCourseModal3").modal("show");
            });
        }

        function updateCourse4(courseId, courseYear1Fee, courseYear2Fee, courseYear3Fee, courseYear4Fee) {
            $(document).ready(function() {
                $("#updateCourseModal4").modal("show");
            });
        }
        </script> -->
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
                    <!-- <th scope="col">ACTION</th>
                    <th scope="col">DELETE</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                // ====================== UPDATE YEAR 1 FEE ======================
                if (isset($_POST['add-fee-1'])) {
                    $course_id = $_POST['course_id'];
                    $course_year_1_fee = $_POST['course_year_1_fee'];
                    echo '<script>updateCourse(' . $course_id . ',' . $course_year_1_fee . ');</script>'; {

                ?>
                        <div class="modal fade" id="updateCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Course</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="add-course.php" method="POST">
                                        <div class="modal-body">
                                            <div>
                                                <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                                <input type="text" name="course_year_1_fee" value="<?php echo $course_year_1_fee ?>" hidden>
                                                <p>Are you sure you want to update this course?</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="update_success_1" class="btn btn-success">Yes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }

                // ====================== UPDATE YEAR 2 FEE ======================
                if (isset($_POST['add-fee-2'])) {
                    $course_id = $_POST['course_id'];
                    $course_year_1_fee = $_POST['course_year_1_fee'];
                    $course_year_2_fee = $_POST['course_year_2_fee'];
                    echo '<script>updateCourse2(' . $course_id . ',' . $course_year_1_fee . ',' . $course_year_2_fee . ');</script>'; { ?>
                        <div class="modal fade" id="updateCourseModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Course</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="add-course.php" method="POST">
                                        <div class="modal-body">
                                            <div>
                                                <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                                <input type="text" name="course_year_1_fee" value="<?php echo $course_year_1_fee ?>" hidden>
                                                <input type="text" name="course_year_2_fee" value="<?php echo $course_year_2_fee ?>" hidden>
                                                <p>Are you sure you want to update this course?</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="update_success_2" class="btn btn-success">Yes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                }

                // ====================== UPDATE YEAR 3 FEE ======================
                if (isset($_POST['add-fee-3'])) {
                    $course_id = $_POST['course_id'];
                    $course_year_1_fee = $_POST['course_year_1_fee'];
                    $course_year_2_fee = $_POST['course_year_2_fee'];
                    $course_year_3_fee = $_POST['course_year_3_fee'];
                    echo '<script>updateCourse3(' . $course_id . ',' . $course_year_1_fee . ',' . $course_year_2_fee . ',' . $course_year_3_fee . ');</script>'; { ?>
                        <div class="modal fade" id="updateCourseModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Course</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="add-course.php" method="POST">
                                        <div class="modal-body">
                                            <div>
                                                <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                                <input type="text" name="course_year_1_fee" value="<?php echo $course_year_1_fee ?>" hidden>
                                                <input type="text" name="course_year_2_fee" value="<?php echo $course_year_2_fee ?>" hidden>
                                                <input type="text" name="course_year_3_fee" value="<?php echo $course_year_3_fee ?>" hidden>
                                                <p>Are you sure you want to update this course?</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="update_success_3" class="btn btn-success">Yes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                }

                // ====================== UPDATE YEAR 4 FEE ======================
                if (isset($_POST['add-fee-4'])) {
                    $course_id = $_POST['course_id'];
                    $course_year_1_fee = $_POST['course_year_1_fee'];
                    $course_year_2_fee = $_POST['course_year_2_fee'];
                    $course_year_3_fee = $_POST['course_year_3_fee'];
                    $course_year_4_fee = $_POST['course_year_4_fee'];
                    echo '<script>updateCourse4(' . $course_id . ',' . $course_year_1_fee . ',' . $course_year_2_fee . ',' . $course_year_3_fee . ',' . $course_year_4_fee . ');</script>'; { ?>
                        <div class="modal fade" id="updateCourseModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Course</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="add-course.php" method="POST">
                                        <div class="modal-body">
                                            <div>
                                                <input type="text" name="course_id" value="<?php echo $course_id ?>" hidden>
                                                <input type="text" name="course_year_1_fee" value="<?php echo $course_year_1_fee ?>" hidden>
                                                <input type="text" name="course_year_2_fee" value="<?php echo $course_year_2_fee ?>" hidden>
                                                <input type="text" name="course_year_3_fee" value="<?php echo $course_year_3_fee ?>" hidden>
                                                <input type="text" name="course_year_4_fee" value="<?php echo $course_year_4_fee ?>" hidden>
                                                <p>Are you sure you want to update this course?</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="update_success_4" class="btn btn-success">Yes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
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
                        $course_year_1_fee = $row['course_year_1_fee'];
                        $course_year_2_fee = $row['course_year_2_fee'];
                        $course_year_3_fee = $row['course_year_3_fee'];
                        $course_year_4_fee = $row['course_year_4_fee'];
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
</div>
<?php include('includes/footer.php') ?>