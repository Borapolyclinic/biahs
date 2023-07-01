<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="index.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>View User</h5>
    </div>

    <script>
    function openModal(userId) {
        $(document).ready(function() {
            $("#exampleModal").modal("show");
        });
    }
    </script>
    <?php
    require('includes/connection.php');
    if (isset($_POST['delete_user'])) {
        $user_id = $_POST['user_id'];
        $fetch_user_details = "DELETE FROM `bora_users` WHERE `user_id` = '$user_id'";
        $fetch_user_res = mysqli_query($connection, $fetch_user_details);

        if ($fetch_user_res) { ?>
    <div class="alert alert-success mt-3 w-100" role="alert">
        Success! User Deleted.
    </div>
    <?php }
    }
    ?>

    <div class="user-table">
        <?php
        require('includes/connection.php');
        if (isset($_POST['del'])) {
            $user_id = $_POST['user_id'];
            echo '<script>openModal(' . $user_id . ');</script>'; ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div>
                                <input type="text" name="user_id" value="<?php echo $user_id ?>" hidden>
                                <p>Are you sure you want to delete this user?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="delete_user" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        }
        $results_per_page = 10;
        $query = "SELECT * FROM `bora_users` WHERE `user_type` = 2";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        $number_of_page = ceil($count / $results_per_page);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $page_first_result = ($page - 1) * $results_per_page;
        $page_query = "SELECT * FROM `bora_users` WHERE `user_type` = '2' LIMIT "  . $page_first_result . ',' . $results_per_page;
        $page_result = mysqli_query($connection, $page_query);
        if ($count == 0) { ?>
        <div>
            <p>No user found</p>
        </div>
        <?php
        } else {
            while ($row = mysqli_fetch_assoc($page_result)) {
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_contact = $row['user_contact'];
            ?>
        <div class="user-card">
            <h6><?php echo $user_name ?></h6>
            <p><?php echo $user_contact ?></p>
            <form action="edit-user.php" method="POST" class="view-btn">
                <input type="text" value="<?php echo $user_id ?>" name="user_id" hidden>
                <button type="submit" name="edit" class=" btn btn-sm btn-outline-secondary">Edit</button>
            </form>
            <form action="" method="POST" class="view-btn">
                <input type="text" value="<?php echo $user_id ?>" name="user_id" hidden>
                <button type="submit" name="del" class="btn btn-sm btn-danger">
                    Delete
                </button>
            </form>
        </div>
        <?php
            }
        }
        ?>
    </div>

    <nav aria-label="Page navigation example" class="w-100 mt-3">
        <ul class="pagination">
            <?php
            for ($page = 1; $page <= $number_of_page; $page++) {
                echo '<li class="page-item"><a class="page-link" href="view-user.php?page=' . $page . '">' . $page . ' </a></li>';
            }
            ?>
        </ul>
    </nav>

</div>
<?php include('includes/footer.php') ?>