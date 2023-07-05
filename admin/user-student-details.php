<?php include('includes/header.php') ?>
<?php include('components/navbar/user-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="user-view-students.php">
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
        $student_whatsapp = "";
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
            $student_whatsapp = $row['student_whatsapp'];
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
        <form class="w-100 m-1" method="POST" action="" enctype="multipart/form-data">
            <div class="add-user-form">
                <input class="form-control" name="student_id" hidden type="text" value="<?php echo $student_id ?>"
                    id="formFile">

                <div class="add-user-form-row mb-3">
                    <div class="w-100 mobile-input m-1">
                        <label for="studentName" class="form-label">Student Name</label>
                        <input type="text" class="form-control" name="student_name" value="<?php echo $student_name ?>"
                            id="studentName" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Mobile Number</label>
                        <input type="number" class="form-control" name="student_contact"
                            value="<?php echo $student_contact ?>" id="studentNumber" aria-describedby="emailHelp"
                            disabled>
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Whatsapp</label>
                        <input type="number" class="form-control" name="student_whatsapp"
                            value="<?php echo $student_whatsapp ?>" id="studentNumber" aria-describedby="emailHelp"
                            disabled>
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Email</label>
                        <input type="email" class="form-control" name="student_email"
                            value="<?php echo $student_email ?>" id="studentNumber" aria-describedby="emailHelp"
                            disabled>
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">DOB</label>
                        <input type="date" class="form-control" name="student_dob" value="<?php echo $student_dob ?>"
                            id="studentNumber" aria-describedby="emailHelp" disabled>
                    </div>
                </div>

                <div class="w-100 mb-3">
                    <div class="w-100 mobile-input w-100">
                        <label for="studentName" class="form-label">Enrollment Number</label>
                        <input type="text" class="form-control" name="student_enrollment_number"
                            value="<?php echo $student_enrollment_number ?>" id="studentName"
                            aria-describedby="emailHelp" disabled>
                    </div>
                </div>


                <div class="add-user-form-row mb-3">
                    <div class="w-100 mobile-input m-1">
                        <label for="studentName" class="form-label">UID</label>
                        <input type="text" class="form-control" value="<?php echo $student_roll ?>" name="student_roll"
                            id="studentName" aria-describedby="emailHelp" disabled>
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

                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Change Course</label>
                        <select class="form-select" name="student_course" aria-label="Default select example" disabled>
                            <?php
                            $selected_course = "SELECT * FROM `bora_course` WHERE `course_id` = '$student_course'";
                            $selected_course_res = mysqli_query($connection, $selected_course);
                            $course_name = "";
                            while ($row = mysqli_fetch_assoc($selected_course_res)) {
                                $course_id = $row['course_id'];
                                $course_name = $row['course_name'];
                            }
                            ?>
                            <option selected><?php echo $course_name ?></option>
                            <?php
                            $fetch_course_name = "SELECT * FROM `bora_course`";
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
                            aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="studentAdmissionDate" class="form-label">Admission Year</label>
                        <input type="text" class="form-control" name="student_admission_year"
                            value="<?php echo $student_admission_year  ?>" id="studentAdmissionDate"
                            aria-describedby="emailHelp" disabled>
                    </div>
                </div>

                <div class="add-user-form-row mb-3">
                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Category</label>
                        <select class="form-select" name="student_category" aria-label="Default select example"
                            disabled>
                            <?php
                            $fetch_name = "SELECT * FROM `bora_student` WHERE `student_id` = '$student_id'";
                            $fetch_name_res = mysqli_query($connection, $fetch_name);
                            $student_category = "";
                            while ($row = mysqli_fetch_assoc($fetch_name_res)) {
                                $student_category = $row['student_category'];
                            }
                            ?>
                            <option selected><?php echo $student_category ?></option>
                            <option value="General">General</option>
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                            <option value="OBC">OBC</option>
                            <option value="Minority">Minority</option>

                        </select>
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Mode of Admission</label>
                        <select class="form-select" name="student_admission_mode" aria-label="Default select example"
                            disabled>
                            <?php
                            $fetch_name = "SELECT * FROM `bora_student` WHERE `student_id` = '$student_id'";
                            $fetch_name_res = mysqli_query($connection, $fetch_name);
                            $student_admission_mode = "";
                            while ($row = mysqli_fetch_assoc($fetch_name_res)) {
                                $student_admission_mode = $row['student_admission_mode'];
                            }
                            ?>
                            <option selected><?php echo $student_admission_mode ?></option>
                            <option value="Counselling">Counselling</option>
                            <option value="Direct">Direct</option>
                        </select>
                    </div>

                    <div class="w-100 mobile-input m-1">
                        <label for="studentNumber" class="form-label">Gender</label>
                        <select class="form-select" name="student_gender" aria-label="Default select example" disabled>
                            <?php
                            $fetch_name = "SELECT * FROM `bora_student` WHERE `student_id` = '$student_id'";
                            $fetch_name_res = mysqli_query($connection, $fetch_name);
                            $student_gender = "";
                            while ($row = mysqli_fetch_assoc($fetch_name_res)) {
                                $student_gender = $row['student_gender'];
                            }
                            ?>
                            <option selected><?php echo $student_gender ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="add-user-form mt-3">
                <div class="add-user-form-row mb-3">
                    <div class="w-100 mobile-input m-1">
                        <label for="fathersName" class="form-label">Father's Name</label>
                        <input disabled type="text" class="form-control" name="student_father"
                            value="<?php echo $student_father ?>" id="fathersName" aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="mothersName" class="form-label">Mother's Name</label>
                        <input disabled type="text" class="form-control" name="student_mother" id="mothersName"
                            value="<?php echo $student_mother ?>" aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="mothersName" class="form-label">Father's Contact Number</label>
                        <input disabled type="text" class="form-control" name="student_father_contact" id="mothersName"
                            value="<?php echo $student_father_contact ?>" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="add-user-form-row mb-3">
                    <div class="w-100 mobile-input m-1">
                        <label for="fathersName" class="form-label">Guardian's Name</label>
                        <input disabled type="text" class="form-control" name="student_guardian_name"
                            value="<?php echo $student_guardian_name ?>" id="fathersName" aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="fathersName" class="form-label">Guardian's Contact No.</label>
                        <input disabled type="text" class="form-control" name="student_guardian_contact"
                            value="<?php echo $student_guardian_contact ?>" id="fathersName"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="fathersName" class="form-label">Contact No. (Optional)</label>
                        <input disabled type="text" class="form-control" name="student_guardian_contact_2"
                            value="<?php echo $student_guardian_contact_2 ?>" id="fathersName"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="w-100 mobile-input m-1">
                        <label for="mothersName" class="form-label">Relation</label>
                        <select class="form-select" name="student_guardian_relation" aria-label="Default select example"
                            disabled>
                            <option value="<?php echo $student_guardian_relation ?>" selected>
                                <?php echo $student_guardian_relation ?>(Selected)</option>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                            <option value="Relative">Relative</option>
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
                        <input disabled type="number" class="form-control w-100"
                            value="<?php echo $student_aadhar_number  ?>" name="student_aadhar_number" id="fathersName"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Address (as on Aadhar Card)*</label>
                    <input disabled style="height: 100px" type="text" class="form-control" name="student_aadhar_address"
                        id="mothersName" value="<?php echo $student_aadhar_address ?>" aria-describedby="emailHelp">
                </div>
                <div class="form-check mb-3" onclick="hideInputField()">
                    <input disabled class="form-check-input" type="checkbox" value="1" id="addressCheckBox">
                    <label class="form-check-label" for="addressCheckBox">
                        Same as above
                    </label>
                </div>
                <div class="mb-3" id="communicationAddress">
                    <label for="exampleFormControlTextarea1" class="form-label">Communication Address</label>
                    <input disabled style="height: 100px" type="text" class="form-control" name="student_comm_address"
                        id="mothersName" value="<?php echo $student_comm_address ?>" aria-describedby="emailHelp">
                </div>
                <button type="submit" name="update" class="w-100 btn btn-outline-primary">Update Student
                    Details</button>
            </div>
        </form>

        <div class="col-md-4 m-1">
            <div class="student-right-img">
                <img src="<?php echo $student_img  ?>" alt="">
            </div>
            <form method="POST" action="user-change-student-profile.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="change_picture" class="student-doc-btn">
                    View Profile Picture
                </button>
            </form>
            <form method="POST" action="user-view-student-document.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="view" class="student-doc-btn">
                    View Aadhaar Card
                </button>
            </form>
            <form method="POST" action="user-10th-marksheet-update.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="view" class="student-doc-btn">
                    View 10th Marksheet
                </button>
            </form>
            <form method="POST" action="user-12th-marksheet-update.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="view" class="student-doc-btn">
                    View 12th Marksheet
                </button>
            </form>
            <form method="POST" action="user-cast-certificate-update.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="view" class="student-doc-btn">
                    View Cast Certificate
                </button>
            </form>
            <form method="POST" action="user-tc-update.php" class="add-user-form-tab">
                <input type="text" name="student_id" value="<?php echo $student_id ?>" hidden>
                <button type="submit" name="view" class="student-doc-btn">
                    View Transfer Certificate
                </button>
            </form>
            <?php if ($student_status === '1') { ?>
            <form method="POST" action="user-grad-marksheet.php" class="add-user-form-tab">
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