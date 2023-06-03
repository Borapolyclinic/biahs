<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="dashboard.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Collect Fee</h5>
    </div>
    <?php
    require('includes/connection.php');

    if (isset($_POST['collect'])) {
        $student_id = $_POST['student_id'];

        $fetch_data = "SELECT * FROM `bora_student` WHERE `student_id` = '$student_id'";
        $fetch_data_res = mysqli_query($connection, $fetch_data);

        $student_name = "";
        $student_course = "";
        $student_contact = "";
        $student_roll = "";

        while ($row = mysqli_fetch_assoc($fetch_data_res)) {
            $student_name = $row['student_name'];
            $student_course = $row['student_course'];
            $student_contact = $row['student_contact'];
            $student_roll = $row['student_roll'];
        }
    }
    ?>
    <form class="add-user-form" method="POST" action="edit-user-success.php">
        <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>


        <div class="mb-3">
            <label for="studentName" class="form-label">Student Name</label>
            <input disabled type="text" name="student_name" class="form-control" value="<?php echo $student_name ?>"
                id="studentName" aria-describedby="emailHelp">
        </div>

        <div class="add-user-form-row mb-3 w-100">
            <div class="col-md-4 m-1">
                <label for="studentCourse" class="form-label">Course</label>
                <input disabled type="text" name="student_course" class="form-control"
                    value="<?php echo $student_course ?>" id="studentCourse" aria-describedby="emailHelp">
            </div>


            <div class="col-md-4 m-1">
                <label for="studentContact" class="form-label">Student Contact</label>
                <input disabled type="text" name="student_contact" class="form-control"
                    value="<?php echo $student_contact ?>" id="studentContact" aria-describedby="emailHelp">
            </div>

            <div class="col-md-4 m-1">
                <label for="studentRoll" class="form-label">Roll Number</label>
                <input disabled type="text" name="student_roll" class="form-control" value="<?php echo $student_roll ?>"
                    id="studentRoll" aria-describedby="emailHelp">
            </div>
        </div>

        <div class="mb-3">
            <label for="studentSemester" class="form-label">Collecting Fee for</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <?php
                $fetch_course = "SELECT * FROM `bora_course`";
                $fetch_course_res = mysqli_query($connection, $fetch_course);

                $course_name = "";
                $course_fee = "";
                $course_fee_six = "";
                $course_fee_qtr = "";
                $course_fee_monthly = "";

                while ($row = mysqli_fetch_assoc($fetch_course_res)) {
                    $course_name = $row['course_name'];
                    $course_fee = $row['course_fee'];
                    $course_fee_six = $row['course_fee'] / 2;
                    $course_fee_qtr = $row['course_fee'] / 4;
                    $course_fee_monthly = $row['course_fee'] / 12;
                }
                ?>
                <option value="Annual Fee">Annual - (₹<?php echo $course_fee ?>)</option>
                <option value="Half Yearly Fee">Half Yearly - (₹<?php echo $course_fee_six ?>)</option>
                <option value="Quarterly Fee">Quarterly - (₹<?php echo $course_fee_qtr ?>)</option>
                <option value="Monthly Fee">Monthly - (₹<?php echo $course_fee_monthly ?>)</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">For the month of</label>
            <input type="month" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
    </form>

</div>
<?php include('includes/footer.php') ?>