<!DOCTYPE html>
<html lang="en">

<head>
    <title>Samurdhi | Kesbew</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="logo.png" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"> -->
    <!-- <link rel="stylesheet" href="bootstrap.css"> -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="col-12">
        <div class="row mt-1 mb-1">
            <nav class="navbar bg-white fixed-top">
                <div class="container-fluid">
                    <div class="col-5 mx-5 align-self-start" style="cursor: pointer;">
                        <span class="text-lg-start mx-4 title01">
                            <a href="home.php"> <img src="logo.png  " style="height: 70px; "></a>
                        </span>
                        <?php
                        //  session_start(); 
                        ?>

                    </div>
                    <div class="d-lg-none d-block">
                        <button class="navbar-toggler border-0 placeholder-wave mx-2 mx-lg-5" style="background-color: #683B7B;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="offcanvas offcanvas-end" style="background-color: #111111;" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <!-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Samurdhi</h5> -->
                            <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <!-- <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                                    <a class="nav-link active" aria-current="page" href="addNewCustomer.php">Add New Customer</a>
                                    <a class="nav-link active" aria-current="page" href="customers.php">Customers</a>
                                    <a class="nav-link active" aria-current="page" href="income.php">Income</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="btn btn-outline-dark" aria-current="page" href="#" onclick="signOut()">Sign Out</a>
                                </li>
                            </ul> -->
                            <div class="sidebartwo">
                                <br>
                                <br>
                                <br>
                                <h1>Vision Concept</h1>
                                <a href="home.php">Home</a>
                                <a href="addNewCustomer.php">Add New Customer</a>
                                <a href="customers.php">Customer Details</a>
                                <a href="income.php">Income</a>
                                <button class="btn btn-light mx-3 fs-5 mt-4" onclick="signOut();">Sign Out</button>
                                <button class="btn btn-success mx-3 fs-5 mt-4 " onclick="backupdb();">Backup Databse&nbsp;&nbsp;&nbsp;<i class="bi bi-cloud-arrow-up-fill"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div style="margin-top: 80px;"></div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>

</body>

</html>