<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container-fluid w-100 user-form-container">
    <div class="page-marker">
        <a href="view-students.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>View | Edit Student Details</h5>
    </div>

    <?php
    require('includes/connection.php');

    if (isset($_POST['edit']) || isset($_POST['edit_back'])) {
        $student_id = $_POST['student_id'];

        $fetch = "SELECT * FROM `bora_student` WHERE `student_id` = '$student_id'";
        $result = mysqli_query($connection, $fetch);

        $student_id = "";
        $student_img = "";
        $student_enrollment_number = "";
        $student_name = "";
        $student_contact = "";
        $student_email = "";
        $student_dob = "";
        $student_father = "";
        $student_mother = "";
        $student_dob = "";
        $student_guardian_name = "";
        $student_guardian_contact = "";
        $student_guardian_contact_2 = "";
        $student_guardian_relation = "";
        $student_roll = "";
        $student_course = "";
        $student_admission_date = "";
        $student_admission_year = "";
        $student_10th_marksheet = "";
        $student_tc_certificate = "";
        $student_alot_letter = "";
        $student_graduation_marksheet = "";
        $student_category = "";
        $student_admission_mode = "";
        $student_gender = "";
        $student_aadhar_number = "";
        $student_aadhar_file = "";
        $student_aadhar_back_file = "";
        $student_aadhar_address = "";
        $student_comm_address = "";
        $student_status = "";

        while ($row = mysqli_fetch_assoc($result)) {
            $student_id = $row['student_id'];
            $student_img = "assets/student/" . $row['student_img'];
            $student_enrollment_number = $row['student_enrollment_number'];
            $student_name = $row['student_name'];
            $student_contact = $row['student_contact'];
            $student_email = $row['student_email'];
            $student_dob = $row['student_dob'];
            $student_father = $row['student_father'];
            $student_mother = $row['student_mother'];
            $student_father_contact = $row['student_father_contact'];
            $student_dob = $row['student_dob'];
            $student_guardian_name = $row['student_guardian_name'];
            $student_guardian_contact = $row['student_guardian_contact'];
            $student_guardian_contact_2 = $row['student_guardian_contact_2'];
            $student_guardian_relation = $row['student_guardian_relation'];
            $student_roll = $row['student_roll'];
            $student_course = $row['student_course'];
            $student_admission_date = $row['student_admission_date'];
            $student_admission_year = $row['student_admission_year'];
            $student_10th_marksheet = "assets/marksheet/" . $row['student_10th_marksheet'];
            $student_tc_certificate = "assets/tc_certificate/" . $row['student_tc_certificate'];
            $student_alot_letter = "assets/alot_letter/" . $row['student_alot_letter'];
            $student_graduation_marksheet = "assets/grad_marksheet/" . $row['student_graduation_marksheet'];
            $student_category = $row['student_category'];
            $student_admission_mode = $row['student_admission_mode'];
            $student_gender = $row['student_gender'];
            $student_aadhar_number = $row['student_aadhar_number'];
            $student_aadhar_file = "assets/student_aadhar_image/" . $row['student_aadhar_file'];
            $student_aadhar_back_file = "assets/student_aadhar_image/" . $row['student_aadhar_back_file'];
            $student_aadhar_address = $row['student_aadhar_address'];
            $student_comm_address = $row['student_comm_address'];
            $student_status = $row['student_status'];
        }
    }
    ?>
    <div class="container-row w-100">
        <form class="w-100 m-1" method="POST" action="student-details-update-confirmation.php"
            enctype="multipart/form-data">
            <div class="add-user-form">
                <input class="form-control" name="student_id" hidden type="text" value="<?php echo $student_id ?>"
                    id="formFile">

                <div class="add-user-form-row mb-3">
                    <div class="w-100 mobile-input m-1">
                        <label for="studentName" class="form-label">Student Name</label>
                        <input type="text" class="form-control" name="student_name" value="<?php echo $student_name ?>"
                            id="studentName" aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Mobile Number</label>
                        <input type="number" class="form-control" name="student_contact"
                            value="<?php echo $student_contact ?>" id="studentNumber" aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Email</label>
                        <input type="email" class="form-control" name="student_email"
                            value="<?php echo $student_email ?>" id="studentNumber" aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">DOB</label>
                        <input type="date" class="form-control" name="student_dob" value="<?php echo $student_dob ?>"
                            id="studentNumber" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="w-100 mb-3">
                    <div class="w-100 mobile-input w-100">
                        <label for="studentName" class="form-label">Enrollment Number</label>
                        <input type="text" class="form-control" name="student_enrollment_number"
                            value="<?php echo $student_enrollment_number ?>" id="studentName"
                            aria-describedby="emailHelp">
                    </div>
                </div>


                <div class="add-user-form-row mb-3">
                    <div class="w-100 mobile-input m-1">
                        <label for="studentName" class="form-label">UID</label>
                        <input type="text" class="form-control" value="<?php echo $student_roll ?>" name="student_roll"
                            id="studentName" aria-describedby="emailHelp">
                    </div>
                    <?php
                    $fetch_name = "SELECT * FROM `bora_course` WHERE `course_id` = '$student_course'";
                    $fetch_name_res = mysqli_query($connection, $fetch_name);
                    $new_course_id = "";
                    $new_course_name = "";
                    while ($row = mysqli_fetch_assoc($fetch_name_res)) {
                        $new_course_id = $row['course_id'];
                        $new_course_name = $row['course_name'];
                    }
                    ?>
                    <!-- <div class="w-100 mobile-input m-1">
                        <label for="studentAdmissionDate" class="form-label">Selected Course</label>
                        <input type="text" class="form-control" value="<?php echo $new_course_name  ?>"
                            id="studentAdmissionDate" aria-describedby="emailHelp" disabled>
                    </div> -->
                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Change Course</label>
                        <select class="form-select" name="student_course" aria-label="Default select example">
                            <?php
                            $fetch_existing_course = "SELECT * FROM `bora_course` WHERE `course_id` = '$student_course'";
                            $fetch_existing_course_r = mysqli_query($connection, $fetch_existing_course);
                            while ($row = mysqli_fetch_assoc($fetch_existing_course_r)) {
                                $id = $row['course_id'];
                                $course = $row['course_name'];
                            }
                            ?>
                            <option value="<?php echo $id ?>"><?php echo $course ?> (Selected)</option>
                            <?php
                            $fetch_course_name = "SELECT * FROM `bora_course` WHERE `course_id` != '$new_course_id'";
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
                        <input type="date" class="form-control" name="student_admission_date"
                            value="<?php echo $student_admission_date  ?>" id="studentAdmissionDate"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="studentAdmissionDate" class="form-label">Admission Year</label>
                        <input type="text" class="form-control" name="student_admission_year"
                            value="<?php echo $student_admission_year  ?>" id="studentAdmissionDate"
                            aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="add-user-form-row mb-3">
                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Category</label>
                        <select class="form-select" name="student_category" aria-label="Default select example">
                            <option value="<?php echo $student_category ?>"><?php echo $student_category ?> (Selected)
                            </option>
                            <?php
                            $fetch_name = "SELECT * FROM `bora_student` WHERE `student_id` = '$student_id'";
                            $fetch_name_res = mysqli_query($connection, $fetch_name);
                            $new_student_category = "";
                            while ($row = mysqli_fetch_assoc($fetch_name_res)) {
                                $new_student_category = $row['student_category'];
                            }
                            if ($student_category == 'General') { ?>
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                            <option value="OBC">OBC</option>
                            <option value="Minority">Minority</option>
                            <?php
                            } else if ($student_category == 'SC') { ?>
                            <option value="General">General</option>
                            <option value="ST">ST</option>
                            <option value="OBC">OBC</option>
                            <option value="Minority">Minority</option>
                            <?php
                            } else if ($student_category == 'SC') { ?>
                            <option value="General">General</option>
                            <option value="ST">ST</option>
                            <option value="OBC">OBC</option>
                            <option value="Minority">Minority</option>
                            <?php } else if ($student_category == 'OBC') { ?>
                            <option value="General">General</option>
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                            <option value="Minority">Minority</option>
                            <?php } else if ($student_category == 'Minority') { ?>
                            <option value="General">General</option>
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                            <option value="OBC">OBC</option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Mode of Admission</label>
                        <select class="form-select" name="student_admission_mode" aria-label="Default select example">
                            <option value="<?php echo $student_admission_mode ?>"><?php echo $student_admission_mode ?>
                                (Selected)</option>
                            <?php
                            $fetch_name = "SELECT * FROM `bora_student` WHERE `student_id` = '$student_id'";
                            $fetch_name_res = mysqli_query($connection, $fetch_name);
                            $student_admission_mode = "";
                            while ($row = mysqli_fetch_assoc($fetch_name_res)) {
                                $student_admission_mode = $row['student_admission_mode'];
                            }
                            if ($student_admission_mode == 'Counselling') { ?>
                            <option value="Direct">Direct</option>
                            <?php } else if ($student_admission_mode == 'Direct') { ?>
                            <option value="Counselling">Counselling</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Gender</label>
                        <select class="form-select" name="student_gender" aria-label="Default select example">
                            <option value="<?php echo $student_gender ?>"><?php echo $student_gender ?>(Selected)
                            </option>
                            <?php
                            $fetch_name = "SELECT * FROM `bora_student` WHERE `student_id` = '$student_id'";
                            $fetch_name_res = mysqli_query($connection, $fetch_name);
                            $student_gender = "";
                            while ($row = mysqli_fetch_assoc($fetch_name_res)) {
                                $student_gender = $row['student_gender'];
                            }
                            if ($student_gender == 'Male') { ?>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                            <?php } else if ($student_gender == 'Female') { ?>
                            <option value="Male">Male</option>
                            <option value="Other">Other</option>
                            <?php } else if ($student_gender == 'Other') { ?>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="add-user-form mt-3">
                <div class="add-user-form-row mb-3">
                    <div class="w-100 mobile-input m-1">
                        <label for="fathersName" class="form-label">Father's Name</label>
                        <input type="text" class="form-control" name="student_father"
                            value="<?php echo $student_father ?>" id="fathersName" aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="mothersName" class="form-label">Mother's Name</label>
                        <input type="text" class="form-control" name="student_mother" id="mothersName"
                            value="<?php echo $student_mother ?>" aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="mothersName" class="form-label">Father's Contact Number</label>
                        <input type="text" class="form-control" name="student_father_contact" id="mothersName"
                            value="<?php echo $student_father_contact ?>" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="add-user-form-row mb-3">
                    <div class="w-100 mobile-input m-1">
                        <label for="fathersName" class="form-label">Guardian's Name</label>
                        <input type="text" class="form-control" name="student_guardian_name"
                            value="<?php echo $student_guardian_name ?>" id="fathersName" aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="fathersName" class="form-label">Guardian's Contact No.</label>
                        <input type="text" class="form-control" name="student_guardian_contact"
                            value="<?php echo $student_guardian_contact ?>" id="fathersName"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="fathersName" class="form-label">Additional Number (Optional)</label>
                        <input type="text" class="form-control" name="student_guardian_contact_2"
                            value="<?php echo $student_guardian_contact_2 ?>" id="fathersName"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="mothersName" class="form-label">Relation</label>
                        <select class="form-select" name="student_guardian_relation"
                            aria-label="Default select example">
                            <option selected>
                                <?php echo $student_guardian_relation ?> (Selected)</option>
                            <?php if ($student_guardian_relation == 'Father') { ?>
                            <option value="Mother">Mother</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                            <option value="Relative">Relative</option>
                            <?php } else if ($student_guardian_relation == 'Mother') { ?>
                            <option value="Father">Father</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                            <option value="Relative">Relative</option>
                            <?php } else if ($student_guardian_relation == 'Brother') { ?>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Sister">Sister</option>
                            <option value="Relative">Relative</option>
                            <?php } else  if ($student_guardian_relation == 'Sister') { ?>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Brother">Brother</option>
                            <option value="Relative">Relative</option>
                            <?php } else if ($student_guardian_relation == 'Relative') { ?>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                            <?php } ?>
                        </select>
                        <!-- <input type="text" class="form-control"  id="mothersName"
                            value="" aria-describedby="emailHelp"> -->
                    </div>
                </div>
            </div>

            <div class="add-user-form mt-3">
                <div class="mb-3 w-100">
                    <div class="col-md-4 mobile-input m-1">
                        <label for="fathersName" class="form-label">Aadhar Card Number</label>
                        <input type="number" class="form-control w-100" value="<?php echo $student_aadhar_number  ?>"
                            name="student_aadhar_number" id="fathersName" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Address (as on Aadhar Card)*</label>
                    <input style="height: 100px" type="text" class="form-control" name="student_aadhar_address"
                        id="mothersName" value="<?php echo $student_aadhar_address ?>" aria-describedby="emailHelp">
                </div>
                <div class="form-check mb-3" onclick="hideInputField()">
                    <input class="form-check-input" type="checkbox" value="1" id="addressCheckBox">
                    <label class="form-check-label" for="addressCheckBox">
                        Same as above
                    </label>
                </div>
                <div class="mb-3" id="communicationAddress">
                    <label for="exampleFormControlTextarea1" class="form-label">Communication Address</label>
                    <input style="height: 100px" type="text" class="form-control" name="student_comm_address"
                        id="mothersName" value="<?php echo $student_comm_address ?>" aria-describedby="emailHelp">
                </div>
                <button type="submit" name="update" class="w-100 btn btn-outline-primary">Update</button>
            </div>
        </form>

        <div class="col-md-4 m-1">
            <div class="student-right-img">
                <img src="<?php echo $student_img  ?>" alt="">
            </div>
            <form method="POST" action="admin-change-student-profile.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="change_picture" class="student-doc-btn">
                    Upload | Change Profile Picture
                </button>
            </form>
            <form method="POST" action="view-student-document.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="view" class="student-doc-btn">
                    Upload | View Aadhaar Card
                </button>
            </form>
            <form method="POST" action="10th-marksheet-update.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="view" class="student-doc-btn">
                    Upload | View 10th Marksheet
                </button>
            </form>
            <form method="POST" action="12th-marksheet-update.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="view" class="student-doc-btn">
                    Upload | View 12th Marksheet
                </button>
            </form>
            <form method="POST" action="cast-certificate-update.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="view" class="student-doc-btn">
                    Upload | View Cast Certificate
                </button>
            </form>
            <form method="POST" action="tc-update.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="view" class="student-doc-btn">
                    Upload | View Transfer/Migration Certificate
                </button>
            </form>
            <form method="POST" action="alot-update.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="view" class="student-doc-btn">
                    Upload | View Allotment Letter
                </button>
            </form>
            <?php
            if ($student_status === '1') {
            ?>
            <form method="POST" action="grad-marksheet.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="view" class="student-doc-btn">
                    View Graduation Marksheet
                </button>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>