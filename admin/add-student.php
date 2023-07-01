<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>

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
    <form class="w-100" method="POST" action="add-student-success.php" enctype="multipart/form-data">
        <div class="add-user-form">
            <div class="add-user-form-row mb-3">
                <div class="w-100 mobile-input">
                    <label for="formFile" class="form-label">Upload Student Image</label>
                    <input class="form-control w-100" name="student_img" type="file" id="formFile" required>
                </div>
            </div>

            <div class="add-user-form-row mb-3 w-100">
                <div class="mobile-input m-1 w-100">
                    <label for="studentName" class="form-label">Student Name</label>
                    <input type="text" class="form-control w-100" name="student_name" id="studentName"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mobile-input m-1 w-100">
                    <label for="studentNumber" class="form-label">Mobile Number</label>
                    <input type="number" class="form-control w-100" name="student_contact" id="studentNumber"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mobile-input m-1 w-100">
                    <label for="studentEmail" class="form-label">Email Address</label>
                    <input type="email" class="form-control w-100" name="student_email" id="studentEmail"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mobile-input m-1 w-100">
                    <label for="studentNumber" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control w-100" name="student_dob" id="studentNumber"
                        aria-describedby="emailHelp" required>
                </div>
            </div>

            <div class="add-user-form-row mb-3">
                <div class="w-100 mobile-input">
                    <label for="studentName" class="form-label">Enrollment Number</label>
                    <input type="text" class="form-control" name="student_enrollment_number" id="studentName"
                        aria-describedby="emailHelp" required>
                </div>
            </div>

            <div class="add-user-form-row mb-3">
                <div class="w-100 mobile-input m-1">
                    <label for="studentName" class="form-label">UID</label>
                    <input type="text" class="form-control" name="student_roll" id="studentName"
                        aria-describedby="emailHelp" required>
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
                    <input type="date" class="form-control" placeholder="Enter Year" name="student_admission_date"
                        id="studentAdmissionDate" aria-describedby="emailHelp" required>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="studentAdmissionDate" class="form-label">Admission Year</label>
                    <input type="number" class="form-control" placeholder="Enter Year" name="student_admission_year"
                        id="studentAdmissionDate" aria-describedby="emailHelp" required>
                </div>
            </div>

            <div class="add-user-form-row mb-3">
                <div class="w-100 mobile-input m-1">
                    <label for="studentNumber" class="form-label">Category</label>
                    <select required class="form-select" name="student_category" aria-label="Default select example">
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
                    <select required class="form-select" name="student_admission_mode"
                        aria-label="Default select example">
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
                    <input class="form-control" name="student_alot_letter" type="file" id="formFile" required>
                </div>
                <div class="m-1 w-100 mobile-input">
                    <label for="formFile" class="form-label">Upload Cast Certificate</label>
                    <input class="form-control" name="student_cast_certificate" type="file" id="formFile" required>
                </div>
            </div>
        </div>

        <div class="add-user-form mt-3">
            <div class="add-user-form-row mb-3">
                <div class="w-100 mobile-input m-1">
                    <label for="fathersName" class="form-label">Father's Name</label>
                    <input type="text" class="form-control" name="student_father" id="fathersName"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="mothersName" class="form-label">Mother's Name</label>
                    <input type="text" class="form-control" name="student_mother" id="mothersName"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="fathersName" class="form-label">Father's Contact Number</label>
                    <input type="number" class="form-control" name="student_father_contact" id="fathersName"
                        aria-describedby="emailHelp" required>
                </div>
            </div>

            <div class="add-user-form-row mb-3">
                <div class="w-100 mobile-input m-1">
                    <label for="fathersName" class="form-label">Guardian's Name</label>
                    <input type="text" class="form-control" name="student_guardian_name" id="fathersName"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="fathersName" class="form-label">Guardian's Contact Number</label>
                    <input type="number" class="form-control" name="student_guardian_contact" id="fathersName"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="fathersName" class="form-label">Additional Number (Optional)</label>
                    <input type="number" class="form-control" name="student_guardian_contact_2" id="fathersName"
                        aria-describedby="emailHelp">
                </div>
                <div class="w-100 mobile-input m-1">
                    <label for="mothersName" class="form-label">Relationship with Student</label>
                    <select name="student_guardian_relation" class="form-select" aria-label="Default select example"
                        required>
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
                    <input type="number" class="form-control" name="student_aadhar_number" id="fathersName"
                        aria-describedby="emailHelp" required>
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
                <textarea class="form-control" name="student_aadhar_address" id="exampleFormControlTextarea1" required
                    rows="3"></textarea>
            </div>
            <div class="form-check mb-3" onclick="hideInputField()">
                <input class="form-check-input" type="checkbox" value="1" id="addressCheckBox">
                <label class="form-check-label" for="addressCheckBox">
                    Same as above
                </label>
            </div>
            <div class="mb-3" id="communicationAddress">
                <label for="exampleFormControlTextarea1" class="form-label">Mailing Address</label>
                <textarea class="form-control" name="student_comm_address" id="exampleFormControlTextarea1"
                    rows="3"></textarea>
            </div>
            <button type="submit" name="submit" class="w-100 btn btn-outline-primary">Add Student</button>
        </div>
    </form>
</div>
<?php include('includes/footer.php') ?>