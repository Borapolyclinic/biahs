<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="confirmation-alert">
        <?php
        require('includes/connection.php');
        if (isset($_POST['update'])) {
            $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
            $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
            $user_contact = mysqli_real_escape_string($connection, $_POST['user_contact']);
            $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);
        }
        ?>

        <form action="edit-user.php" method="POST">
            <input hidden type="text" name="user_id" value="<?php echo $user_id ?>">
            <input hidden type="text" name="user_name" value="<?php echo $user_name ?>">
            <input hidden type="text" name="user_contact" value="<?php echo $user_contact ?>">
            <input hidden type="text" name="user_password" value="<?php echo $user_password ?>">
            <div class="alert alert-info" role="alert w-100">
                Are you sure you want to update this user's details?
            </div>

            <button type="submit" name="edit" href="edit-user.php" class="btn w-100 btn-outline-primary">No</button>
            <button type="submit" name="update" class="btn w-100 btn-outline-success mt-3">Yes</button>
        </form>
    </div>
</div>
<?php include('includes/footer.php') ?>