<?php include('includes/header.php') ?>
<?php include('components/navbar/user-navbar.php') ?>
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

    <div class="w-100">
        <!-- ======================= RADIO BUTTONS ======================= -->
        <div class="user-table">
            <div class="filter-row">
                <div class="form-check w-100">
                    <input class="form-check-input" type="radio" value="Student" name="selected_radio" id="student-wise-radio" onclick="showFields('student-wise', 'batch-wise')">
                    <label class="form-check-label" for="student-wise-radio">Student-wise</label>
                </div>

                <div class="form-check w-100">
                    <input class="form-check-input" type="radio" value="Batch" name="selected_radio" id="batch-wise-radio" onclick="showFields('batch-wise', 'student-wise')">
                    <label class="form-check-label" for="batch-wise-radio">Batch-wise</label>
                </div>
            </div>
        </div>


        <!-- ======================= STUDENT WISE ======================= -->
        <form method="POST" target="_blank" action="user-student-wise-generated-report.php">
            <div class="user-table" style="display: none;" id="student-wise">
                <input type="text" name="selected_radio" value="Student" hidden>
                <div class="filter-row w-100 mb-3">
                    <div class="w-100">
                        <label for="exampleInputEmail1" class="form-label">From</label>
                        <input type="date" name="date_from" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="w-100">
                        <label for="exampleInputEmail1" class="form-label">To</label>
                        <input type="date" name="date_to" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="student_wise_data" class="form-control w-100" aria-label="Text input with dropdown button" placeholder="Enter UID">
                </div>

                <button type="submit" name="generate_student_wise" class="mt-3 p-2 btn btn-outline-success w-100">Generate
                    Report</button>
            </div>
        </form>



        <!-- ======================= BATCH WISE ======================= -->
        <form action="user-batch-wise-generated-report.php" method="POST" target="_blank">
            <div class="user-table" id="batch-wise" style="display: none;">
                <div class="filter-row mb-3">
                    <div class="w-100 m-1">
                        <label for="exampleInputEmail1" class="form-label">From</label>
                        <input type="date" name="date_from" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="w-100 m-1">
                        <label for="exampleInputEmail1" class="form-label">To</label>
                        <input type="date" name="date_to" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="filter-row ">
                    <div class="w-100 m-1">
                        <label class="form-check-label mb-2">Course</label>
                        <select name="batch_wise_course" class="form-select" aria-label="Default select example">
                            <option value="null">Click here to open courses</option>
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

                    <div class="w-100 m-1">
                        <label for="exampleFormControlInput1" class="form-label">Select Batch</label>
                        <select class="form-select" name="batch_wise_year" aria-label="Default select example">
                            <option selected>Select Batch</option>
                            <option value="2015-2016">2015-2016</option>
                            <option value="2016-2017">2016-2017</option>
                            <option value="2017-2018">2017-2018</option>
                            <option value="2018-2019">2018-2019</option>
                            <option value="2019-2020">2019-2020</option>
                            <option value="2020-2021">2020-2021</option>
                            <option value="2021-2022">2021-2022</option>
                            <option value="2022-2023">2022-2023</option>
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026">2025-2026</option>
                            <option value="2026-2027">2026-2027</option>
                            <option value="2027-2028">2027-2028</option>
                            <option value="2028-2029">2028-2029</option>
                            <option value="2029-2030">2029-2030</option>
                        </select>
                        <!-- <input type="number" name="batch_wise_year" min="1999" max="2025" class="form-control" id="exampleFormControlInput1" placeholder=""> -->
                    </div>
                </div>
                <button type="submit" name="generate_batch_wise" class="mt-3 p-2 btn btn-outline-success w-100">Generate
                    Report</button>
            </div>
        </form>
    </div>
</div>
<?php include('includes/footer.php') ?>