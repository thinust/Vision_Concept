<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vision Concept | Home</title>
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

                // session_start();
                require "connection.php";
                require "head.php";




                ?>
                <div class="d-none d-lg-block">

                    <?php

                    require "sideBar.php"

                    ?>
                </div>

                <div class="col-12  col-lg-10  text-center p-3 mb-3">
                    <span class="col-12 addprohead fs-lg-1 fs-1">Today Birthdays</span>
                </div>

                <div class="col-12">
                    <div class="row row-cols-1 row-cols-md-4 row-cols-sm-2 row" id="viewarea">
                        <?php

                        date_default_timezone_set("Asia/Colombo");
                        $date = date('Y-m-d');
                        $day = date("d", strtotime($date));
                        $month = date("m", strtotime($date));

                        $customerDOB_rs = Database::search("SELECT * FROM `customer` WHERE  MONTH(dob) = '" . $month . "' AND DAY(dob) = '" . $day . "' ORDER BY `name` ASC");
                        $customerDOB_num = $customerDOB_rs->num_rows;

                        if ($customerDOB_num == 0) {
                            for ($i = 0; $i <  4; $i++) {
                        ?>
                                <!-- <div class='col-12 text-center text-danger fs-3'>No Any Birthdays Today</div> -->
                                <div class="col-12 g-4">
                                    <div class="card itemcard " aria-hidden="true">
                                        <!-- <img src="res/thumbnail.png" class="card-img-top img-fluid primg mt-4" alt="..." onclick="" style="cursor: pointer;" title="Click To View"> -->
                                        <div class="card-body text-center">
                                            <div class="mt-5 mb-4">
                                                <h5 class="card-title col-12">
                                                    <div class="row">
                                                        <div class="col-12 ovf1 fw-bold text-danger">
                                                            <span>No Any Birthdays Today</span>
                                                        </div>
                                                    </div>
                                                </h5>
                                                <p class="card-text placeholder-glow">
                                                </p>
                                                <span class="col-12"></span><br>
                                                <span class="col-12">Date: DD / MM / YYYY</span><br>
                                            </div>
                                            <!-- <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="">Add To Cart</a> -->
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            // echo "<div class='col-12 text-center text-danger fs-3'>Today Birthdays</div>";
                            for ($i = 0; $i <  $customerDOB_num; $i++) {

                                $customerDOB_data = $customerDOB_rs->fetch_assoc();

                            ?>

                                <div class="col-12 g-4">
                                    <div class="card itemcard " aria-hidden="true">
                                        <!-- <img src="res/thumbnail.png" class="card-img-top img-fluid primg mt-4" alt="..." onclick="" style="cursor: pointer;" title="Click To View"> -->
                                        <div class="card-body text-center">
                                            <div class="mt-5 mb-4">
                                                <h5 class="card-title col-12">
                                                    <div class="row">
                                                        <div class="col-12 ovf1 fw-bold text-danger">
                                                            <span><?php echo $customerDOB_data["name"]; ?></span>
                                                        </div>
                                                    </div>
                                                </h5>
                                                <p class="card-text placeholder-glow">
                                                </p>
                                                <span class="col-12">DOB : <?php echo $customerDOB_data["dob"]; ?></span><br>
                                                <span class="col-12">Mobile : <?php echo $customerDOB_data["mobile"]; ?></span><br>
                                            </div>
                                            <!-- <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="">Add To Cart</a> -->
                                        </div>
                                    </div>
                                </div>
                        <?php


                            }
                        }
                        ?>





                    </div>

                </div>
            </div>
        </main>
    </div>
</body>

</html>