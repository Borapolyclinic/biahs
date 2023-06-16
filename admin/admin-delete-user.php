<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <?php
    require('includes/connection.php');

    if (isset($_POST['del'])) {
        $user_id = $_POST['user_id'];

        $del_user = "";
        $del_user_name = "";

        $fetch_user_details = "SELECT * FROM `bora_users` WHERE `user_id` = '$user_id'";
        $fetch_user_res = mysqli_query($connection, $fetch_user_details);
        while ($row = mysqli_fetch_assoc($fetch_user_res)) {
            $del_user = $row['user_id'];
            $del_user_name = $row['user_name'];
        }
    }
    ?>

    <div class="user-table">

        <p>Are you sure you want to delete <?php echo $del_user_name ?>?</p>
        <div class="btn-row-end">
            <form action="view-user.php" method="POST">
                <button type="submit" name="no-del" class="btn btn-danger">No</button>
            </form>

            <form action="view-user.php" method="post">
                <input type="text" name="user_id" value="<?php echo $del_user ?>" hidden>
                <button type="submit" name="yes-del" class="btn btn-success">Yes</button>
            </form>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>