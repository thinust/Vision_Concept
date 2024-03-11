<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vision Concept | Customers</title>
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
    <div class="container">
        <div class="row gy-3">

            <div class="d-none d-lg-block col-3"></div>
            <main class="my-5 offset-lg-0 col-lg-9 col-md-12 col-10 col-sm-12 offset-md-0">

                <?php
                require "connection.php";
                require "head.php";




                ?>
                <div class="d-none d-lg-block">

                    <?php

                    require "sideBar.php"

                    ?>
                </div>

                <div class="col-12 offset-2  col-lg-8  text-center p-3 mb-3">
                    <span class="col-12 addprohead fs-lg-1 fs-1">Customers</span>
                </div>
                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="col-lg-10 col-12 d-flex">
                            <input class="form-control mx-3" style="height: 50px;" type="date" placeholder="Search" aria-label="Search" id="searchdob">
                        </div>
                        <button class="col-2 btn btn-dark col-lg-2 col-10 mx-4 mx-lg-0 fs-4" onclick="searchCustomer()"> Search</button>
                        <div class="col-10 d-flex"></div>
                        <!-- <button class="col-2 mt-4 btn btn-danger col-lg-2 col-10 mx-4 mx-lg-0 fs-4" onclick="reset()"> Reset</button> -->
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="col-lg-10 col-12 d-flex">
                            <input class="form-control mx-3" style="height: 50px;" type="number" placeholder="Enter Mobile No" aria-label="Search" id="searchmobile">
                        </div>
                        <button class="col-2 btn btn-dark col-lg-2 col-10 mx-4 mx-lg-0 fs-4" onclick="searchCustomermobile()"> Search</button>
                        <div class="col-10 d-flex"></div>
                        <button class="col-2 mt-4 btn btn-danger col-lg-2 col-10 mx-4 mx-lg-0 fs-4" onclick="reset()"> Reset</button>
                    </div>
                </div>

                <div class="col-12 bg-light p-4">
                    <div class="mt-1 ">
                        <div class="row" id="viewarea">
                            <table class="table table-bordered border-dark">
                                <thead>
                                    <tr class="border border-0 border-dark fs-4">
                                        <th class="text-center border-dark border border-1" style="width: 300px;">Name</th>
                                        <th class="text-center border-dark border border-1" style="width: 300px;">Address</th>
                                        <th class="text-center border-dark border border-1" style="width: 150px;">Birthday</th>
                                        <th class="text-center border-dark border border-1" style="width: 150px;">Mobile</th>
                                        <th class="text-center border-dark border border-0"></th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php

                                    $customer_rs = Database::search("SELECT * FROM `customer` ORDER BY `dob` ASC");
                                    $customer_num = $customer_rs->num_rows;

                                    for ($i = 0; $i <  $customer_num; $i++) {

                                        $customer_data = $customer_rs->fetch_assoc();

                                    ?>
                                        <tr>
                                            <td class="text-center pt-3 text-dark"><?php echo $customer_data['name']; ?></td>
                                            <td class="text-center pt-3 text-dark"><?php echo $customer_data['address']; ?></td>
                                            <td class="text-center pt-3 text-dark"><?php echo $customer_data['dob']; ?></td>
                                            <td class="text-center pt-3 text-dark"><?php echo $customer_data['mobile']; ?></td>
                                            <td class="text-center pt-3">
                                                <button class="btn btn-dark border-0" style="background:  #7f0eb4;" onclick="viewCustomer(<?php echo $customer_data['id']; ?>)">View</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>