<div class="container user-form-container">
    <div class="page-marker">
        <a href="index.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>View Students</h5>
    </div>

    <div>
        <!-- Add various filter here -->
    </div>

    <div class="table-responsive user-table">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Course</th>
                    <th scope="col">Roll No.</th>
                    <th scope="col">Admission Date</th>
                    <th scope="col">Added By</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('includes/connection.php');

                $fetch_students = "SELECT * FROM `bora_student` ORDER BY student_added_date DESC";
                $fetch_res = mysqli_query($connection, $fetch_students);

                while ($row = mysqli_fetch_assoc($fetch_res)) {
                    $student_id = $row['student_id'];
                    $student_img = "assets/student/" . $row['student_img'];
                    $student_name = $row['student_name'];
                    $student_contact = $row['student_contact'];
                    $student_course = $row['student_course'];
                    $student_roll = $row['student_roll'];
                    $student_admission_date = $row['student_admission_date'];
                    $student_added_by = $row['student_added_by']; ?>
                    <tr>
                        <th scope="row"><?php echo $student_name ?></th>
                        <td><?php echo $student_contact ?></td>
                        <td><?php echo $student_course ?></td>
                        <td><?php echo $student_roll ?></td>
                        <td><?php echo $student_admission_date ?></td>
                        <td><?php echo $student_added_by ?></td>
                        <td>
                            <form action="student-details.php" method="post">
                                <input type="text" value="<?php echo $student_id ?>" name="student_id" hidden>
                                <button type="submit" name="edit" class="btn btn-sm btn-outline-success">View
                                    Details</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>