<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vision Concept | New Customer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="logo.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
</head>

<body class="body">
    <div class="row g-0">

        <div class="d-none d-lg-block col-3"></div>
        <main class="my-5 offset-lg-0 col-lg-9 col-md-12 col-10 col-sm-12 offset-md-0">
            <div class="container">

                <?php


                require "head.php";

                // session_start();

                // if (isset($_SESSION["sa"])) {


                ?>
                <div class="d-none d-lg-block">

                    <?php

                    require "sideBar.php"

                    ?>
                </div>

                <div class="row gy-3">

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12  col-lg-8  text-center p-3 mb-3">
                                <span class="col-12 addprohead fs-lg-1 fs-1">Add new Customer</span>
                            </div>

                            <div class="col-10 offset-1">
                                <div class="row">

                                    <div class="col-12  mb-3 mt-3">
                                        <div class="row">
                                            <div class="col-lg-8 col-12">
                                                <input type="text" class="form-control mx-lg-3" placeholder="Enter Name" id="name">
                                            </div>
                                            <label class="form-label fw-bold lbl1 mx-4 col-10">
                                                Name
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3 mt-3">
                                        <div class="row">
                                            <div class="col-lg-8 col-12">
                                                <input type="text" class="form-control mx-lg-3" placeholder="Enter Address" id="address">
                                            </div>
                                            <label class="form-label fw-bold lbl1 mx-4 col-10">
                                                Address
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3 mt-3">
                                        <div class="row">
                                            <div class="col-lg-8 col-12">
                                                <input type="tel" class="form-control mx-lg-3" placeholder="Enter Telephone No" id="etno">
                                            </div>
                                            <label class="form-label fw-bold lbl1 mx-4 col-10">
                                                Telephone No
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mb-3 mt-3">
                                        <div class="row">
                                            <div class="col-lg-8 col-12">
                                                <input type="date" class="form-control mx-lg-3" placeholder="Enter Birthday" id="dob">
                                            </div>
                                            <label class="form-label fw-bold lbl1 mx-4 col-10">
                                                Date of Birth
                                            </label>
                                        </div>
                                    </div>

                                    <div class=" col-lg-8 col-12 d-grid mx-3 mb-5 mt-5">
                                        <button class="btn fw-bold fs-4 text-light" onclick="addCustomer();" style="background:  #7f0eb4;">Add Customer</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
</body>

</html>