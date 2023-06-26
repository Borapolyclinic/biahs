<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="index.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Reports</h5>
    </div>

    <?php
    require('includes/connection.php');
    if (isset($_POST['generate'])) {
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];
        $selected_radio = $_POST['selected_radio'];
        $student_wise_details = $_POST['student_wise_details'];
        $student_wise_data = $_POST['student_wise_data'];
        $batch_wise_course = $_POST['batch_wise_course'];
        $batch_wise_year = $_POST['batch_wise_year'];
    }
    ?>

    <form action="admin-generated-report.php" class="w-100" method="POST">
        <div class="user-table">
            <div class="filter-row">
                <div class="w-100 m-1">
                    <label for="exampleInputEmail1" class="form-label">From</label>
                    <input type="date" name="date_from" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>

                <div class="w-100 m-1">
                    <label for="exampleInputEmail1" class="form-label">To</label>
                    <input type="date" name="date_to" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
            </div>
        </div>

        <!-- ======================= RADIO BUTTONS ======================= -->
        <div class="user-table">
            <div class="filter-row">
                <div class="form-check w-100">
                    <input class="form-check-input" type="radio" value="Student" name="selected_radio"
                        id="student-wise-radio" onclick="showFields('student-wise', 'batch-wise')">
                    <label class="form-check-label" for="student-wise-radio">Student Wise</label>
                </div>

                <div class="form-check w-100">
                    <input class="form-check-input" type="radio" value="Batch" name="selected_radio"
                        id="batch-wise-radio" onclick="showFields('batch-wise', 'student-wise')">
                    <label class="form-check-label" for="batch-wise-radio">Batch Wise</label>
                </div>
            </div>
        </div>


        <!-- ======================= STUDENT WISE ======================= -->
        <div class="user-table" style="display: none;" id="student-wise">
            <div class="input-group mb-3">
                <select name="student_wise_details" class="form-select" aria-label="Default select example">
                    <option selected>Open this menu for options</option>
                    <option value="1">Name</option>
                    <option value="2">UID</option>
                    <option value="3">Contact Number</option>
                </select>
                <input type="text" name="student_wise_data" class="form-control"
                    aria-label="Text input with dropdown button">
            </div>

            <button type="submit" name="generate_student_wise" class="mt-3 p-2 btn btn-outline-success w-100">Generate
                Report</button>
        </div>


        <!-- ======================= BATCH WISE ======================= -->
        <div class="user-table" id="batch-wise" style="display: none;">
            <div class="filter-row">
                <div class="form-check w-100">
                    <label class="form-check-label">Course</label>
                    <select name="batch_wise_course" class="form-select" aria-label="Default select example">
                        <option selected>Click here to open courses</option>
                        <?php
                        $fetch_course = "SELECT * FROM `bora_course`";
                        $fetch_course_r = mysqli_query($connection, $fetch_course);

                        while ($row = mysqli_fetch_assoc($fetch_course_r)) {
                            $course_id = $row['course_id'];
                            $course_name = $row['course_name'];
                        ?>
                        <option value="<?php echo $course_id ?>"><?php echo $course_name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-check w-100">
                    <label for="exampleFormControlInput1" class="form-label">Enter Admission Year</label>
                    <input type="number" name="batch_wise_year" min="1999" max="2025" class="form-control"
                        id="exampleFormControlInput1" placeholder="">
                </div>

                <!-- <div class="form-check w-100">
                    <label class="form-check-label">Admission Year</label>
                    <select name="batch_wise_year" class="form-select" aria-label="Default select example">
                        <option selected>Click here for options</option>
                        <?php
                        $fetch_stu = "SELECT * FROM `bora_student`";
                        $fetch_stu_r = mysqli_query($connection, $fetch_stu);

                        while ($row = mysqli_fetch_assoc($fetch_stu_r)) {
                            $student_admission_year = $row['student_admission_year'];
                        ?>
                        <option value="<?php echo $student_admission_year ?>"><?php echo $student_admission_year ?>
                        </option>
                        <?php } ?>
                    </select>
                </div> -->

            </div>
            <button type="submit" name="generate_batch_wise" class="mt-3 p-2 btn btn-outline-success w-100">Generate
                Report</button>
        </div>


    </form>
</div>
<?php include('includes/footer.php') ?>