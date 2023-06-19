<div class="container user-form-container">
    <div class="page-marker">
        <a href="index.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Course Settings</h5>
    </div>

    <div class="user-table table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">COURSE NAME</th>
                    <th scope="col">TENURE</th>
                    <th scope="col">YEAR 1 FEE</th>
                    <th scope="col">YEAR 2 FEE</th>
                    <th scope="col">YEAR 3 FEE</th>
                    <th scope="col">YEAR 4 FEE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('includes/connection.php');
                $fetch_semester = "SELECT * FROM `bora_course`";
                $fetch_sem_res = mysqli_query($connection, $fetch_semester);
                while ($row = mysqli_fetch_assoc($fetch_sem_res)) {
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];
                    $course_tenure = $row['course_tenure'];
                    $course_year_1_fee = $row['course_year_1_fee'];
                    $course_year_2_fee = $row['course_year_2_fee'];
                    $course_year_3_fee = $row['course_year_3_fee'];
                    $course_year_4_fee = $row['course_year_4_fee'];

                ?>
                <tr>
                    <th scope="row">
                        <?php echo $course_name ?>
                    </th>
                    <td><?php echo $course_tenure ?> Year</td>
                    <?php if ($course_tenure == '1') { ?>
                    <td>₹<?php echo $course_year_1_fee ?></td>
                    <td>NA</td>
                    <td>NA</td>
                    <td>NA</td>
                    <?php } else if ($course_tenure == '2') { ?>
                    <td>₹<?php echo $course_year_1_fee ?></td>
                    <td>₹<?php echo $course_year_2_fee ?></td>
                    <td>NA</td>
                    <td>NA</td>
                    <?php } else if ($course_tenure == '3') { ?>
                    <td>₹<?php echo $course_year_1_fee ?></td>
                    <td>₹<?php echo $course_year_2_fee ?></td>
                    <td>₹<?php echo $course_year_3_fee ?></td>
                    <td>NA</td>
                    <?php } else if ($course_tenure == '4') { ?>
                    <td>₹<?php echo $course_year_1_fee ?></td>
                    <td>₹<?php echo $course_year_2_fee ?></td>
                    <td>₹<?php echo $course_year_3_fee ?></td>
                    <td>₹<?php echo $course_year_4_fee ?></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>