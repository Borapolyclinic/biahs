<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker-row">
        <div class="page-marker">
            <a href="index.php">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a>
            <h5>Add Student</h5>
        </div>

        <a href="bulk-upload-student-data.php" class="page-marker-anchor">
            <ion-icon name="cloud-upload-outline"></ion-icon> Bulk Upload Student Data
        </a>
    </div>


    <script>
        function confirmFormSubmission() {
            var confirmation = confirm("Are you sure you want to submit the form?");
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
        echo $user_name;
    }


    if (isset($_POST['add-student'])) {
        $student_img = $_FILES["student_img"]["name"];
        $student_enrollment_number = mysqli_real_escape_string($connection, $_POST['student_enrollment_number']);
        $student_name = mysqli_real_escape_string($connection, $_POST['student_name']);
        $student_batch = mysqli_real_escape_string($connection, $_POST['student_batch']);
        $student_contact = mysqli_real_escape_string($connection, $_POST['student_contact']);
        $student_email = mysqli_real_escape_string($connection, $_POST['student_email']);
        $student_dob = mysqli_real_escape_string($connection, $_POST['student_dob']);
        $student_roll = mysqli_real_escape_string($connection, $_POST['student_roll']);
        $student_course = mysqli_real_escape_string($connection, $_POST['student_course']);
        $student_admission_date = mysqli_real_escape_string($connection, $_POST['student_admission_date']);
        $student_admission_year = mysqli_real_escape_string($connection, $_POST['student_admission_year']);
        $student_10th_marksheet = $_FILES["student_10th_marksheet"]["name"];
        $student_12th_marksheet = $_FILES["student_12th_marksheet"]["name"];
        $student_tc_certificate = $_FILES["student_tc_certificate"]["name"];
        $student_category = mysqli_real_escape_string($connection, $_POST['student_category']);
        $student_admission_mode = mysqli_real_escape_string($connection, $_POST['student_admission_mode']);
        $student_gender = mysqli_real_escape_string($connection, $_POST['student_gender']);
        $student_father = mysqli_real_escape_string($connection, $_POST['student_father']);
        $student_mother = mysqli_real_escape_string($connection, $_POST['student_mother']);
        $student_father_contact = mysqli_real_escape_string($connection, $_POST['student_father_contact']);
        $student_guardian_name = mysqli_real_escape_string($connection, $_POST['student_guardian_name']);
        $student_guardian_contact = mysqli_real_escape_string($connection, $_POST['student_guardian_contact']);
        $student_guardian_contact_2 = mysqli_real_escape_string($connection, $_POST['student_guardian_contact_2']);
        $student_guardian_relation = mysqli_real_escape_string($connection, $_POST['student_guardian_relation']);
        $student_aadhar_number = mysqli_real_escape_string($connection, $_POST['student_aadhar_number']);
        $student_aadhar_file = $_FILES["student_aadhar_file"]["name"];
        $student_aadhar_address = mysqli_real_escape_string($connection, $_POST['student_aadhar_address']);
        $student_comm_address = mysqli_real_escape_string($connection, $_POST['student_comm_address']);
        $student_added_by = $user_name;
        $student_status = "2";

        if ($student_admission_mode == 'Direct') {
            $student_alot_letter = 'null';
        } else if ($student_admission_mode == 'Counselling') {
            $student_alot_letter = $_FILES["student_alot_letter"]["name"];
            $tempname_alot_letter = $_FILES["student_alot_letter"]["tmp_name"];
            $folder_alot_letter = "assets/alot_letter/" . $student_alot_letter;
        }

        if ($student_category == 'General') {
            $student_cast_certificate = 'General';
        } else {
            $student_cast_certificate = $_FILES["student_cast_certificate"]["name"];
            $tempname_student_cast_certificate = $_FILES["student_cast_certificate"]["tmp_name"];
            $folder_student_cast_certificate = "assets/cast/" . $student_cast_certificate;
        }

        $tempname_student = $_FILES["student_img"]["tmp_name"];
        $tempname = $_FILES["student_aadhar_file"]["tmp_name"];
        $tempname_marksheet = $_FILES["student_10th_marksheet"]["tmp_name"];
        $tempname_marksheet_12 = $_FILES["student_12th_marksheet"]["tmp_name"];
        $tempname_tc_certificate = $_FILES["student_tc_certificate"]["tmp_name"];

        // $tempname_student_cast_certificate = $_FILES["student_cast_certificate"]["tmp_name"];

        $folder = "assets/student_aadhar_image/" . $student_aadhar_file;
        $folder_student = "assets/student/" . $student_img;
        $folder_marksheet = "assets/marksheet/" . $student_10th_marksheet;
        $folder_marksheet_12 = "assets/marksheet/" . $student_12th_marksheet;
        $folder_tc_certificate = "assets/tc_certificate/" . $student_tc_certificate;

        // $folder_student_cast_certificate = "assets/cast/" . $student_cast_certificate;

        if (empty($student_comm_address)) {
            $student_comm_address = "Same as Aadhar Address";
        }

        $fetch_entry = "SELECT * FROM `bora_student` WHERE `student_contact` = '$student_contact' AND `student_roll` = '$student_roll'";
        $fetch_entry_result = mysqli_query($connection, $fetch_entry);
        $count = mysqli_num_rows($fetch_entry_result);

        if ($count == 0) {

            $insert = "INSERT INTO `bora_student`(
                        `student_img`,
                        `student_enrollment_number`,
                        `student_name`,
                        `student_batch`,
                        `student_contact`,
                        `student_email`,
                        `student_dob`,
                        `student_father`,
                        `student_mother`,
                        `student_father_contact`,
                        `student_guardian_name`,
                        `student_guardian_contact`,
                        `student_guardian_contact_2`,
                        `student_guardian_relation`,
                        `student_roll`,
                        `student_course`,
                        `student_admission_date`,
                        `student_admission_year`,
                        `student_10th_marksheet`,
                        `student_12th_marksheet`,
                        `student_tc_certificate`,
                        `student_alot_letter`,
                        `student_cast_certificate`,
                        `student_category`,
                        `student_admission_mode`,
                        `student_gender`,
                        `student_aadhar_number`,
                        `student_aadhar_file`,
                        `student_aadhar_address`,
                        `student_comm_address`,
                        `student_status`,
                        `student_added_by`
                    )
                    VALUES(
                        '$student_img',
                        '$student_enrollment_number',
                        '$student_name',
                        '$student_batch',
                        '$student_contact',
                        '$student_email',
                        '$student_dob',
                        '$student_father',
                        '$student_mother',
                        '$student_father_contact',
                        '$student_guardian_name',
                        '$student_guardian_contact',
                        '$student_guardian_contact_2',
                        '$student_guardian_relation',
                        '$student_roll',
                        '$student_course',
                        '$student_admission_date',
                        '$student_admission_year',
                        '$student_10th_marksheet',
                        '$student_12th_marksheet',
                        '$student_tc_certificate',
                        '$student_alot_letter',
                        '$student_cast_certificate',
                        '$student_category',
                        '$student_admission_mode',
                        '$student_gender',
                        '$student_aadhar_number',
                        '$student_aadhar_file',
                        '$student_aadhar_address',
                        '$student_comm_address',
                        '$student_status',
                        '$student_added_by'
                    )";
            $insert_res = mysqli_query($connection, $insert);

            if ($insert_res) {
                if ($student_admission_mode == 'Direct' || $student_category == 'General') {
                    $success = move_uploaded_file($tempname, $folder) &&
                        move_uploaded_file($tempname_student, $folder_student) &&
                        move_uploaded_file($tempname_marksheet, $folder_marksheet) &&
                        move_uploaded_file($tempname_marksheet_12, $folder_marksheet_12) &&
                        move_uploaded_file($tempname_tc_certificate, $folder_tc_certificate);
                } else {
                    $success = move_uploaded_file($tempname, $folder) &&
                        move_uploaded_file($tempname_student, $folder_student) &&
                        move_uploaded_file($tempname_marksheet, $folder_marksheet) &&
                        move_uploaded_file($tempname_marksheet_12, $folder_marksheet_12) &&
                        move_uploaded_file($tempname_tc_certificate, $folder_tc_certificate) &&
                        move_uploaded_file($tempname_alot_letter, $folder_alot_letter) &&
                        move_uploaded_file($tempname_student_cast_certificate, $folder_student_cast_certificate);
                }

                if ($success) {
    ?>
                    <div class="alert alert-success w-100" role="alert">Student Added!</div>
            <?php
                } else {
                    echo "Error: File upload failed.";
                }
            } elseif (!$insert_res) {
                echo "Error: " . mysqli_error($connection);
            }
        } else if ($count > 0) {

            ?>
            <div class="alert alert-danger w-100" role="alert">This student already exists in the system!</div>

    <?php }
    } ?>

    <form class="w-100" method="POST" action="" enctype="multipart/form-data" onsubmit="return confirmFormSubmission()">
        <div class="add-user-form">
            <div class="mobile-input m-1 w-100">
                <label for="studentName" class="form-label">Select Batch</label>
                <select class="form-select" name="student_batch" aria-label="Default select example">
                    <option selected>Open this select menu</option>
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
            </div>
        </div>

        <div class="add-user-form mt-3">
            <div class="add-user-form-row mb-3">
                <div class="w-100 mobile-input">
                    <label for="formFile" class="form-label">Upload Student Image</label>
                    <input class="form-control w-100" name="student_img" type="file" id="formFile" required>
                </div>
            </div>

            <div class="add-user-form-row mb-3 w-100">
                <div class="mobile-input m-1 w-100">
                    <label for="studentName" class="form-label">Student Name</label>
                    <input type="text" class="form-control w-100" name="student_name" id="studentName" aria-describedby="emailHelp" required>
                </div>
                <div class="mobile-input m-1 w-100">
                    <label for="studentNumber" class="form-label">Mobile Number</label>
                    <input type="number" class="form-control w-100" name="student_contact" id="studentNumber" aria-describedby="emailHelp" required>
                </div>
                <div class="mobile-input m-1 w-100">
                    <label for="studentNumber" class="form-label">Whatsapp Number</label>
                    <input type="number" class="form-control w-100" name="student_whatsapp" id="studentNumber" aria-describedby="emailHelp" required>
                </div>
                <div class="mobile-input m-1 w-100">
                    <label for="studentEmail" class="form-label">Email Address</label>
                    <input type="email" class="form-control w-100" name="student_email" id="studentEmail" aria-describedby="emailHelp" required>
                </div>
                <div class="mobile-input m-1 w-100">
                    <label for="studentNumber" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control w-100" name="student_dob" id="studentNumber" aria-describedby="emailHelp" required>
                </div>
            </div>

            <div class="add-user-form-row mb-3">
                <div class="w-100 mobile-input">
                    <label for="studentName" class="form-label">Enrollment Number</label>
                    <input type="text" class="form-control" name="student_enrollment_number" id="studentName" aria-describedby="emailHelp">
                </div>
            </div>

            <div class="add-user-form-row mb-3">
                <div class="w-100 mobile-input m-1">
                    <label for="studentName" class="form-label">UID</label>
                    <input type="text" class="form-control" name="student_roll" id="studentName" aria-describedby="emailHelp" required>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="studentNumber" class="form-label">Selected Course</label>
                    <select required class="form-select" name="student_course" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <?php
                        require('includes/connection.php');
                        $fetch_course_name = "SELECT * FROM `bora_course` WHERE `course_status` = '1'";
                        $fetch_course_res = mysqli_query($connection, $fetch_course_name);

                        while ($row = mysqli_fetch_assoc($fetch_course_res)) {
                            $course_id = $row['course_id'];
                            $course_name = $row['course_name'];
                        ?>
                            <option value="<?php echo $course_id ?>"><?php echo $course_name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="studentAdmissionDate" class="form-label">Admission Date</label>
                    <input type="date" class="form-control" placeholder="Enter Year" name="student_admission_date" id="studentAdmissionDate" aria-describedby="emailHelp" required>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="studentAdmissionDate" class="form-label">Admission Year</label>
                    <input type="number" class="form-control" placeholder="Enter Year" name="student_admission_year" id="studentAdmissionDate" aria-describedby="emailHelp" required>
                </div>
            </div>


            <div class="add-user-form-row mb-3">
                <div class="w-100 mobile-input m-1">
                    <label for="studentNumber" class="form-label">Category</label>
                    <select onclick="getCategory()" required class="form-select" id="selectedCat" name="student_category" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="General">General</option>
                        <option value="SC">SC</option>
                        <option value="ST">ST</option>
                        <option value="OBC">OBC</option>
                        <option value="Minority">Minority</option>
                    </select>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="studentNumber" class="form-label">Mode of Admission</label>
                    <select onclick="disableInput()" class="form-select" name="student_admission_mode" aria-label="Default select example" id="admissionMode">
                        <option selected>Open this select menu</option>
                        <option value="Counselling">Counselling</option>
                        <option value="Direct">Direct</option>
                    </select>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="studentNumber" class="form-label">Gender</label>
                    <select required class="form-select" name="student_gender" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="add-user-form mt-3">
            <div class="add-user-form-row mb-3">
                <div class="m-1 w-100 mobile-input">
                    <label for="formFile" class="form-label">Upload 10th Marksheet</label>
                    <input class="form-control" name="student_10th_marksheet" type="file" id="formFile" required>
                </div>
                <div class="m-1 w-100 mobile-input">
                    <label for="formFile" class="form-label">Upload 12th Marksheet</label>
                    <input class="form-control" name="student_12th_marksheet" type="file" id="formFile" required>
                </div>
                <div class="m-1 w-100 mobile-input">
                    <label for="formFile" class="form-label">Upload TC | Migration Certificate</label>
                    <input class="form-control" name="student_tc_certificate" type="file" id="formFile" required>
                </div>
            </div>
            <div class="add-user-form-row mb-3">
                <div class="m-1 w-100 mobile-input">
                    <label for="formFile" class="form-label">Upload Allotment Letter</label>
                    <input class="form-control" name="student_alot_letter" type="file" id="alotLetterFile">
                </div>
                <div class="m-1 w-100 mobile-input">
                    <label for="formFile" class="form-label">Upload Cast Certificate</label>
                    <input class="form-control" name="student_cast_certificate" type="file" required id="castSection">
                </div>
            </div>
        </div>

        <div class="add-user-form mt-3">
            <div class="add-user-form-row mb-3">
                <div class="w-100 mobile-input m-1">
                    <label for="fathersName" class="form-label">Father's Name</label>
                    <input type="text" class="form-control" name="student_father" id="fathersName" aria-describedby="emailHelp" required>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="mothersName" class="form-label">Mother's Name</label>
                    <input type="text" class="form-control" name="student_mother" id="mothersName" aria-describedby="emailHelp" required>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="fathersName" class="form-label">Father's Contact Number</label>
                    <input type="number" class="form-control" name="student_father_contact" id="fathersName" aria-describedby="emailHelp" required>
                </div>
            </div>

            <div class="add-user-form-row mb-3">
                <div class="w-100 mobile-input m-1">
                    <label for="fathersName" class="form-label">Guardian's Name</label>
                    <input type="text" class="form-control" name="student_guardian_name" id="fathersName" aria-describedby="emailHelp" required>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="fathersName" class="form-label">Guardian's Contact Number</label>
                    <input type="number" class="form-control" name="student_guardian_contact" id="fathersName" aria-describedby="emailHelp" required>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="fathersName" class="form-label">Additional Number (Optional)</label>
                    <input type="number" class="form-control" name="student_guardian_contact_2" id="fathersName" aria-describedby="emailHelp">
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="mothersName" class="form-label">Relationship with Student</label>
                    <select name="student_guardian_relation" class="form-select" aria-label="Default select example" required>
                        <option selected>Click here to open menu</option>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Brother">Brother</option>
                        <option value="Sister">Sister</option>
                        <option value="Relative">Relative</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="add-user-form mt-3">
            <div class="add-user-form-row mb-3">
                <div class="col-md-6 mobile-input m-1">
                    <label for="fathersName" class="form-label">Aadhaar Card Number</label>
                    <input type="number" class="form-control" name="student_aadhar_number" id="fathersName" aria-describedby="emailHelp" required>
                </div>
                <div class="m-1 col-md-6 mobile-input">
                    <label for="formFile" class="form-label">Upload Aadhaar Card Image *</label>
                    <input class="form-control" name="student_aadhar_file" type="file" id="formFile" required>
                </div>
                <!-- <div class="m-1 col-md-4 mobile-input">
                    <label for="formFile" class="form-label">Upload Aadhar Card Back Image *</label>
                    <input class="form-control" name="student_aadhar_back_file" type="file" id="formFile">
                </div> -->
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Permanent Address</label>
                <textarea class="form-control" name="student_aadhar_address" id="exampleFormControlTextarea1" required rows="3"></textarea>
            </div>
            <div class="form-check mb-3" onclick="hideInputField()">
                <input class="form-check-input" type="checkbox" value="1" id="addressCheckBox">
                <label class="form-check-label" for="addressCheckBox">
                    Same as above
                </label>
            </div>
            <div class="mb-3" id="communicationAddress">
                <label for="exampleFormControlTextarea1" class="form-label">Mailing Address</label>
                <textarea class="form-control" name="student_comm_address" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" name="add-student" class="w-100 btn btn-outline-primary">Add Student</button>
            <!-- <button type="button" class="w-100 btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#confirmModal">
                Add Student
            </button> -->
        </div>
    </form>
</div>
<script>
    function hideInputField() {
        var addressCheckBox = document.getElementById("addressCheckBox");
        var inputField = document.getElementById("communicationAddress");

        if (addressCheckBox.checked) {
            inputField.style.display = "none";
            inputField.setAttribute("disabled", true); // Add this line
        } else {
            inputField.style.display = "block";
            inputField.removeAttribute("disabled"); // Add this line
        }
    }
</script>
<?php include('includes/footer.php') ?>