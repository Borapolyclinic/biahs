<?php include('includes/header.php') ?>
<?php include('components/navbar/admin-navbar.php') ?>
<div class="container user-form-container">
    <div class="page-marker">
        <a href="dashboard.php">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h5>Payment History</h5>
    </div>

    <?php
    require('includes/connection.php');
    if (isset($_COOKIE['user_id'])) {
        $user_contact = $_COOKIE['user_id'];
        $fetch_data = "SELECT * FROM `bora_users` WHERE `user_id` = '$user_contact'";
        $fetch_res = mysqli_query($connection, $fetch_data);
        $user_name = "";
        while ($row = mysqli_fetch_assoc($fetch_res)) {
            $user_name = $row['user_name'];
        }
    }

    if (isset($_POST['update_success'])) {
        $bora_invoice_id = $_POST['bora_invoice_id'];
        $bora_invoice_for = $_POST['bora_invoice_for'];
        $bora_invoice_tenure = $_POST['bora_invoice_tenure'];
        $bora_invoice_tenure_id = $_POST['bora_invoice_tenure_id'];
        $bora_invoice_payment_mode = $_POST['bora_invoice_payment_mode'];
        $bora_invoice_payment_id = $_POST['bora_invoice_payment_id'];
        $bora_invoice_cheque_number = $_POST['bora_invoice_cheque_number'];
        $bora_invoice_bank_name = $_POST['bora_invoice_bank_name'];
        $bora_invoice_ifsc = $_POST['bora_invoice_ifsc'];
        $bora_invoice_value = $_POST['bora_invoice_value'];
        $bora_invoice_disc = $_POST['bora_invoice_disc'];
        $bora_invoice_grand_total = $bora_invoice_value - $bora_invoice_disc;

        if ($bora_invoice_payment_mode == 'cash') {
            $update_query = "UPDATE
            `bora_invoice`
        SET
            `bora_invoice_for` = '$bora_invoice_for',
            `bora_invoice_tenure` = '$bora_invoice_tenure',
            `bora_invoice_tenure_id` = '$bora_invoice_tenure_id',
            `bora_invoice_payment_mode` = '$bora_invoice_payment_mode',
            `bora_invoice_value` = '$bora_invoice_value',
            `bora_invoice_disc` = '$bora_invoice_disc',
            `bora_invoice_grand_total` = '$bora_invoice_grand_total',
            `bora_invoice_updated_by` = '$user_name'
        WHERE
            `bora_invoice_id` = '$bora_invoice_id'";
            $update_query_r = mysqli_query($connection, $update_query);
            if ($update_query_r) { ?>
                <div class='mt-3 mb-3 w-100 alert alert-success' role='alert'>Receipt Updated!</div>

            <?php
            }
        }

        if ($bora_invoice_payment_mode == 'cheque') {
            $update_query = "UPDATE
            `bora_invoice`
        SET
            `bora_invoice_for` = '$bora_invoice_for',
            `bora_invoice_tenure` = '$bora_invoice_tenure',
            `bora_invoice_tenure_id` = '$bora_invoice_tenure_id',
            `bora_invoice_payment_mode` = '$bora_invoice_payment_mode',
            `bora_invoice_cheque_number` = '$bora_invoice_cheque_number',
            `bora_invoice_bank_name` = '$bora_invoice_bank_name',
            `bora_invoice_ifsc` = '$bora_invoice_ifsc',
            `bora_invoice_value` = '$bora_invoice_value',
            `bora_invoice_disc` = '$bora_invoice_disc',
            `bora_invoice_grand_total` = '$bora_invoice_grand_total',
            `bora_invoice_updated_by` = '$user_name'
        WHERE
            `bora_invoice_id` = '$bora_invoice_id'";
            $update_query_r = mysqli_query($connection, $update_query);
            if ($update_query_r) { ?>
                <div class='mt-3 mb-3 w-100 alert alert-success' role='alert'>Receipt Updated!</div>
            <?php
            }
        }
        if ($bora_invoice_payment_mode == 'online') {
            $update_query = "UPDATE
            `bora_invoice`
        SET
            `bora_invoice_for` = '$bora_invoice_for',
            `bora_invoice_tenure` = '$bora_invoice_tenure',
            `bora_invoice_tenure_id` = '$bora_invoice_tenure_id',
            `bora_invoice_payment_mode` = '$bora_invoice_payment_mode',
            `bora_invoice_payment_id` = '$bora_invoice_payment_id',
            `bora_invoice_value` = '$bora_invoice_value',
            `bora_invoice_disc` = '$bora_invoice_disc',
            `bora_invoice_grand_total` = '$bora_invoice_grand_total',
            `bora_invoice_updated_by` = '$user_name'
        WHERE
            `bora_invoice_id` = '$bora_invoice_id'";
            $update_query_r = mysqli_query($connection, $update_query);
            if ($update_query_r) { ?>
                <div class='mt-3 mb-3 w-100 alert alert-success' role='alert'>Receipt Updated!</div>
    <?php
            }
        }
    }
    ?>
    <div class="w-100">
        <form action="admin-fee-search-data.php" method="POST" class="filter-row w-100 dashboard-tab p-3">
            <div class="w-100 m-1">
                <select name="search_type" class="form-select" aria-label="Default select example">
                    <option value="null">Click here for options</option>
                    <option value="1">Name</option>
                    <option value="2">Mobile Number</option>
                    <option value="3">UID</option>
                    <option value="4">Receipt Number</option>
                </select>
            </div>
            <div class="w-100 m-1">
                <input type="text" name="student_search" class="form-control filter-input-box" id="exampleFormControlInput1" placeholder="" required>
            </div>
            <button type="submit" name="search" class="btn btn-outline-success">Search</button>
        </form>
    </div>

    <div class="table-responsive user-table">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">RECEIPT NUMBER</th>
                    <th scope="col">RECEIPT DATE</th>
                    <th scope="col">STUDENT NAME</th>
                    <th scope="col">COURSE</th>
                    <th scope="col">PAID FOR</th>
                    <th scope="col">YEAR</th>
                    <th scope="col">RECEIPT VALUE</th>
                    <th scope="col">GENERATED BY</th>
                    <th scope="col">ACTION</th>
                    <th scope="col">DOWNLOAD</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('includes/connection.php');

                $results_per_page = 10;

                $fetch_students = "SELECT * FROM `bora_invoice` ";
                $fetch_res = mysqli_query($connection, $fetch_students);
                $count = mysqli_num_rows($fetch_res);

                $number_of_page = ceil($count / $results_per_page);

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                $page_first_result = ($page - 1) * $results_per_page;
                $page_query = "SELECT * FROM `bora_invoice` ORDER BY `bora_invoice_id` DESC LIMIT "  . $page_first_result . ',' . $results_per_page;
                $page_result = mysqli_query($connection, $page_query);

                while ($row = mysqli_fetch_assoc($page_result)) {
                    $bora_invoice_id = $row['bora_invoice_id'];
                    $bora_invoice_number = $row['bora_invoice_number'];
                    $bora_invoice_date = $row['bora_invoice_date'];
                    $bora_invoice_student = $row['bora_invoice_student'];
                    $bora_invoice_student_course = $row['bora_invoice_student_course'];
                    $bora_invoice_for = $row['bora_invoice_for'];
                    $bora_invoice_tenure = $row['bora_invoice_tenure'];
                    $bora_invoice_grand_total = $row['bora_invoice_grand_total'];
                    $bora_invoice_by = $row['bora_invoice_by']; ?>
                    <tr>
                        <th scope="row"><?php echo $bora_invoice_number ?></th>
                        <td><?php echo $bora_invoice_date ?></td>
                        <td><?php echo $bora_invoice_student ?></td>
                        <td><?php echo $bora_invoice_student_course ?></td>
                        <td><?php echo $bora_invoice_for ?></td>
                        <td><?php echo $bora_invoice_tenure ?></td>
                        <td><?php echo $bora_invoice_grand_total ?></td>
                        <td><?php echo $bora_invoice_by ?></td>
                        <td>
                            <form action="admin-edit-receipt.php" method="post" target="_blank">
                                <input type="text" value="<?php echo $bora_invoice_id ?>" name="bora_invoice_id" hidden>
                                <button type="submit" name="edit" class="btn btn-sm btn-outline-primary">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="admin-receipt-format.php" method="post" target="_blank">
                                <input type="text" value="<?php echo $bora_invoice_id ?>" name="bora_invoice_id" hidden>
                                <button type="submit" name="download" class="btn btn-sm btn-success">Download</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation example" class="w-100 mt-3">
            <ul class="pagination">
                <?php
                for ($page = 1; $page <= $number_of_page; $page++) {
                    echo '<li class="page-item"><a class="page-link" href="user-ppast-payments.php?page=' . $page . '">' . $page . ' </a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>

<?php include('includes/footer.php') ?>