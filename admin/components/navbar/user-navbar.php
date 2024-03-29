<nav class="navbar admin-navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <ion-icon name="home-outline"></ion-icon>
                    <a class="nav-link active" aria-current="page" href="dashboard.php">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <ion-icon name="people-outline"></ion-icon>
                    <a class="nav-link" aria-current="page" href="user-view-students.php">
                        Students
                    </a>
                </li>
                <li class="nav-item">
                    <ion-icon name="stats-chart-outline"></ion-icon>
                    <a class="nav-link" aria-current="page" href="user-past-payments.php">
                        Payment History
                    </a>
                </li>
                <li class="nav-item">
                    <ion-icon name="document-attach-outline"></ion-icon>
                    <a class="nav-link" aria-current="page" href="user-reports.php">
                        Reports
                    </a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Students
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="user-view-students.php">View Student</a></li>
                    </ul>
                </li> -->

            </ul>
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->

            <ul class="navbar-nav ">
                <li class="nav-item">
                    <ion-icon name="log-out-outline"></ion-icon>
                    <a class="nav-link active" aria-current="page" href="logout.php">
                        Logout
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>