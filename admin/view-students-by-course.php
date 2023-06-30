<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="index.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>View Students</h5>
    </div>
    <script>
    function openCatModal() {
        $(document).ready(function() {
            $("#catModal").modal("show");
        });
    }
    </script>

    <!-- ======================= MODAL ======================= -->
    <div class="modal fade hide" id="catModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <p>Please select Course!</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="dashboard.php" class="btn btn-primary">Go back</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    require('includes/connection.php');
    if (isset($_POST['filter-course'])) {
        $course_id = $_POST['course_id'];
        $course_year = $_POST['course_year'];

        if ($course_id == 'null') {
            echo "<script>openCatModal()</script>";
        } else {
            $page_query = "SELECT * FROM `bora_student` WHERE `student_course` = '$course_id' AND `student_admission_year` = '$course_year'";
            $page_result = mysqli_query($connection, $page_query);
    ?>

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
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        while ($row = mysqli_fetch_assoc($page_result)) {
                            // Fetch data for each student
                            $student_id = $row['student_id'];
                            $student_img = "assets/student/" . $row['student_img'];
                            $student_name = $row['student_name'];
                            $student_contact = $row['student_contact'];
                            $student_course = $row['student_course'];
                            $student_roll = $row['student_roll'];
                            $student_admission_date = $row['student_admission_date'];
                            $student_admission_year = $row['student_admission_year'];
                            $student_added_by = $row['student_added_by'];
                        ?>
                <!-- Table rows for each student -->
                <tr>
                    <td><?php echo $student_roll ?></td>
                    <th scope="row"><?php echo $student_name ?></th>
                    <td><?php echo $student_contact ?></td>
                    <td>
                        <?php
                                    $fetch_course_name = "SELECT * FROM `bora_course` WHERE `course_id` = '$student_course'";
                                    $fetch_course_name_res = mysqli_query($connection, $fetch_course_name);
                                    $course_name = "";
                                    while ($row = mysqli_fetch_assoc($fetch_course_name_res)) {
                                        $course_name = $row['course_name'];
                                    }
                                    echo $course_name;
                                    ?>
                    </td>
                    <td><?php echo $student_admission_year ?></td>
                    <td>
                        <form action="student-details.php" method="post">
                            <input type="text" value="<?php echo $student_id ?>" name="student_id" hidden>
                            <button type="submit" name="edit" class="btn btn-sm btn-outline-success">Edit
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
                <?php }
                    }
                } ?>
            </tbody>
        </table>
        <!-- <nav aria-label="Page navigation example" class="w-100 mt-3">
            <ul class="pagination">
                <?php

                for ($page = 1; $page <= $number_of_page; $page++) {
                    echo '<li class="page-item"><a class="page-link" href="view-students-by-course.php?page=' . $page . '">' . $page . ' </a></li>';
                }

                ?>
            </ul>
        </nav> -->
    </div>
</div>
<?php include('includes/footer.php') ?>