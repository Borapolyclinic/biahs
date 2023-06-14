<div class="container user-form-container">
    <div class="dashboard-greeting">
        <h4>Welcome,</h4>
        <p><?php echo $user_name ?></p>
    </div>


    <?php
    $query = "SELECT * FROM `bora_student`";
    $res = mysqli_query($connection, $query);
    $student_count = mysqli_num_rows($res);

    $user_query = "SELECT * FROM `bora_users` WHERE `user_type` = 2";
    $user_res = mysqli_query($connection, $user_query);
    $count = mysqli_num_rows($user_res);
    ?>

    <div class="w-100 mb-3">
        <form action="search-student-data.php" method="POST" class="filter-row w-100">
            <input type="text" name="student_search" class="form-control filter-input-box" id="exampleFormControlInput1"
                placeholder="Enter Mobile Number, Aadhaar card number, Roll number, Name or Course to search user"
                required>
            <button type="submit" name="search" class="btn btn-outline-success">Search</button>
        </form>
    </div>

    <div class="w-100 container-row">
        <div class="dashboard-tab">
            <p>Students</p>
            <h5><?php echo $student_count ?></h5>
        </div>

        <div class="dashboard-tab">
            <p>Users</p>
            <h5><?php echo $count ?></h5>
        </div>
    </div>


    <div class="w-100 mt-3">
        <p>Last Login</p>
        <div class="table-responsive dashboard-tab p-3">

            <table class="table table-bordered">
                <thead class="table-active">
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">LOGIN TIME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $fetch_login = "SELECT * FROM `bora_user_activity_tracker`";
                    $fetch_login_res = mysqli_query($connection, $fetch_login);

                    while ($row = mysqli_fetch_assoc($fetch_login_res)) {
                        $activity_tracker_user_contact = $row['activity_tracker_user_contact'];
                        $activity_tracker_time = $row['activity_tracker_time'];
                    ?>
                    <tr>
                        <th scope="row"><?php
                                            $fetch_user = "SELECT * FROM `bora_users` WHERE `user_id` = '$activity_tracker_user_contact'";
                                            $fetch_user_res = mysqli_query($connection, $fetch_user);
                                            $user_name = "";
                                            while ($row = mysqli_fetch_assoc($fetch_user_res)) {
                                                $user_name = $row['user_name'];
                                            }
                                            echo $user_name ?></th>
                        <td><?php echo $activity_tracker_time ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>