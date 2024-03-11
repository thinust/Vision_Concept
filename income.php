<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vision Concept | Income</title>
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
        <main class="my-5 offset-lg-0 col-lg-9 col-md-12 col-sm-12 offset-md-0">
            <div class="container">
                <div class="row">

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
                    <div class="row g-0">
                        <div class="col-6 p-3">
                            <div class="row g-0">
                                <div class="col-12  col-lg-10  text-center p-3">
                                    <span class="col-12 addprohead fs-lg-1 fs-1">Daily Income</span>
                                </div>

                                <div class="col-12 g-4 border border-1 rounded-2 mb-4" style="background-color: white;">
                                    <div class="mt-1 p-3">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="row" id="viewarea">
                                                    <?php
                                                    date_default_timezone_set("Asia/Colombo");
                                                    $date = date('Y-m-d');
                                                    $day = date("d", strtotime($date));
                                                    $month = date("m", strtotime($date));
                                                    $year = date("Y", strtotime($date));

                                                    $income_rs = Database::search("SELECT SUM(`payments`.`amount`) FROM `payments` JOIN `invoice` ON `payments`.`invoice_id`=`invoice`.`id` WHERE `invoice`.`status_id`='1' AND YEAR(`payments`.`date`) = '" . $year . "' AND MONTH(`payments`.`date`) = '" . $month . "' AND DAY(`payments`.`date`) = '" . $day . "' ORDER BY `payments`.`date` ASC");
                                                    $income_num = $income_rs->num_rows;

                                                    $income_data = $income_rs->fetch_assoc();


                                                    ?>

                                                    <div class="col-12 g-4">
                                                        <div class="card itemcard " aria-hidden="true">
                                                            <!-- <img src="res/thumbnail.png" class="card-img-top img-fluid primg mt-4" alt="..." onclick="" style="cursor: pointer;" title="Click To View"> -->
                                                            <div class="card-body text-center">
                                                                <div class="mt-5 mb-4">
                                                                    <h5 class="card-title col-12">
                                                                        <div class="row">
                                                                            <div class="col-12 ovf1 fw-bold text-primary">
                                                                                <span>Today Income</span>
                                                                            </div>
                                                                        </div>
                                                                    </h5>
                                                                    <p class="card-text placeholder-glow">
                                                                    </p>

                                                                    <span class="col-12">Rs. <?php echo $income_data["SUM(`payments`.`amount`)"]; ?> .00</span><br>
                                                                </div>
                                                                <!-- <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="">Add To Cart</a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-7 text-start p-3 mb-3">
                                                <span class="col-12 addprohead fs-lg-1 fs-3">Search Income</span>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="row">
                                                    <div class="col-lg-8 col-12 d-flex ">
                                                        <input class="form-control mx-3 " style="height: 50px;" type="date" placeholder="Search" aria-label="Search" id="searchdincome">
                                                    </div>
                                                    <button class="col-lg-4 col-10 mx-4 mx-lg-0  btn btn-dark" onclick="searchDailyIncome()"> Search</button>
                                                    <div class="col-8 d-flex"></div>
                                                    <button class="col-lg-4 col-10 mt-4 mx-4 mx-lg-0 btn btn-danger" onclick="resetIncome()"> Reset</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-6 p-3">
                            <div class="row g-0">
                                <div class="col-12  col-lg-10  text-center p-3">
                                    <span class="col-12 addprohead fs-lg-1 fs-1">Monthly Income</span>
                                </div>

                                <div class="col-12 g-4 border border-1 rounded-2" style="background-color: white;">
                                    <div class=" p-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row" id="viewarea2">
                                                    <?php

                                                    $mIncome_rs = Database::search("SELECT SUM(`payments`.`amount`) FROM `payments` JOIN `invoice` ON `payments`.`invoice_id`=`invoice`.`id` WHERE `invoice`.`status_id`='1' AND  YEAR(`payments`.`date`) = '" . $year . "' AND MONTH(`payments`.`date`) = '" . $month . "' ORDER BY `payments`.`date` ASC");
                                                    $mIncome_num = $mIncome_rs->num_rows;

                                                    $mIncome_data = $mIncome_rs->fetch_assoc();


                                                    ?>
                                                    <div class="col-12 g-4">
                                                        <div class="card itemcard " aria-hidden="true">
                                                            <!-- <img src="res/thumbnail.png" class="card-img-top img-fluid primg mt-4" alt="..." onclick="" style="cursor: pointer;" title="Click To View"> -->
                                                            <div class="card-body text-center">
                                                                <div class="mt-5 mb-4">
                                                                    <h5 class="card-title col-12">
                                                                        <div class="row">
                                                                            <div class="col-12 ovf1 fw-bold text-primary">
                                                                                <span>This Month Income</span>
                                                                            </div>
                                                                        </div>
                                                                    </h5>
                                                                    <p class="card-text placeholder-glow">
                                                                    </p>

                                                                    <span class="col-12">Rs. <?php echo $mIncome_data["SUM(`payments`.`amount`)"]; ?> .00</span><br>
                                                                </div>
                                                                <!-- <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="">Add To Cart</a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7 text-start p-3 mb-3">
                                                <span class="col-12 addprohead fs-lg-1 fs-3">Search Income</span>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="row">
                                                    <div class="col-12 col-lg-8 d-flex">
                                                        <input class="form-control mx-3" style="height: 50px;" type="month" placeholder="Search" aria-label="Search" id="searchmincome">
                                                    </div>
                                                    <button class="btn btn-dark col-lg-4 col-10 mx-4 mx-lg-0" onclick="searchMonthlyIncome()"> Search</button>
                                                    <div class="col-8 d-flex"></div>
                                                    <button class="mt-4 btn  col-lg-4 col-10 mx-4 mx-lg-0 btn-danger" onclick="resetIncome()"> Reset</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 p-3">
                            <div class="row g-0">
                                <div class="col-12  col-lg-10  text-center p-3">
                                    <span class="col-12 addprohead fs-lg-1 fs-2">Daily Cash Income</span>
                                </div>

                                <div class="col-12 g-4 border border-1 rounded-2 mb-4" style="background-color: white;">
                                    <div class="mt-1 p-3">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="row" id="viewarea3">
                                                    <?php
                                                    date_default_timezone_set("Asia/Colombo");
                                                    $date = date('Y-m-d');
                                                    $day = date("d", strtotime($date));
                                                    $month = date("m", strtotime($date));
                                                    $year = date("Y", strtotime($date));

                                                    $cash_income_rs = Database::search("SELECT SUM(`payments`.`cash_payments`) FROM `payments` JOIN `invoice` ON `payments`.`invoice_id`=`invoice`.`id` WHERE `invoice`.`status_id`='1'  AND YEAR(`payments`.`date`) = '" . $year . "' AND MONTH(`payments`.`date`) = '" . $month . "' AND DAY(`payments`.`date`) = '" . $day . "' ORDER BY `payments`.`date` ASC");
                                                    $cash_income_num = $cash_income_rs->num_rows;

                                                    $cash_income_data = $cash_income_rs->fetch_assoc();


                                                    ?>

                                                    <div class="col-12 g-4">
                                                        <div class="card itemcard " aria-hidden="true">
                                                            <!-- <img src="res/thumbnail.png" class="card-img-top img-fluid primg mt-4" alt="..." onclick="" style="cursor: pointer;" title="Click To View"> -->
                                                            <div class="card-body text-center">
                                                                <div class="mt-5 mb-4">
                                                                    <h5 class="card-title col-12">
                                                                        <div class="row">
                                                                            <div class="col-12 ovf1 fw-bold text-primary">
                                                                                <span>Today Income</span>
                                                                            </div>
                                                                        </div>
                                                                    </h5>
                                                                    <p class="card-text placeholder-glow">
                                                                    </p>

                                                                    <span class="col-12">Rs. <?php echo $cash_income_data["SUM(`payments`.`cash_payments`)"]; ?> .00</span><br>
                                                                </div>
                                                                <!-- <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="">Add To Cart</a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-7 text-start p-3 mb-3">
                                                <span class="col-12 addprohead fs-lg-1 fs-3">Search Income</span>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="row">
                                                    <div class="col-lg-8 col-12 d-flex ">
                                                        <input class="form-control mx-3 " style="height: 50px;" type="date" placeholder="Search" aria-label="Search" id="searchdcincome">
                                                    </div>
                                                    <button class="col-lg-4 col-10 mx-4 mx-lg-0  btn btn-dark" onclick="searchDailyCashIncome()"> Search</button>
                                                    <div class="col-8 d-flex"></div>
                                                    <button class="col-lg-4 col-10 mt-4 mx-4 mx-lg-0 btn btn-danger" onclick="resetIncome()"> Reset</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-6 p-3">
                            <div class="row g-0">
                                <div class="col-12  col-lg-10  text-center p-3">
                                    <span class="col-12 addprohead fs-lg-1 fs-2">Monthly Cash Income</span>
                                </div>

                                <div class="col-12 g-4 border border-1 rounded-2" style="background-color: white;">
                                    <div class=" p-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row" id="viewarea4">
                                                    <?php

                                                    $cash_mIncome_rs = Database::search("SELECT SUM(`payments`.`cash_payments`) FROM `payments` JOIN `invoice` ON `payments`.`invoice_id`=`invoice`.`id` WHERE `invoice`.`status_id`='1' AND  YEAR(`payments`.`date`) = '" . $year . "' AND MONTH(`payments`.`date`) = '" . $month . "' ORDER BY `payments`.`date` ASC");
                                                    $cash_mIncome_num = $cash_mIncome_rs->num_rows;

                                                    $cash_mIncome_data = $cash_mIncome_rs->fetch_assoc();


                                                    ?>
                                                    <div class="col-12 g-4">
                                                        <div class="card itemcard " aria-hidden="true">
                                                            <!-- <img src="res/thumbnail.png" class="card-img-top img-fluid primg mt-4" alt="..." onclick="" style="cursor: pointer;" title="Click To View"> -->
                                                            <div class="card-body text-center">
                                                                <div class="mt-5 mb-4">
                                                                    <h5 class="card-title col-12">
                                                                        <div class="row">
                                                                            <div class="col-12 ovf1 fw-bold text-primary">
                                                                                <span>This Month Income</span>
                                                                            </div>
                                                                        </div>
                                                                    </h5>
                                                                    <p class="card-text placeholder-glow">
                                                                    </p>

                                                                    <span class="col-12">Rs. <?php echo $cash_mIncome_data["SUM(`payments`.`cash_payments`)"]; ?> .00</span><br>
                                                                </div>
                                                                <!-- <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="">Add To Cart</a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7 text-start p-3 mb-3">
                                                <span class="col-12 addprohead fs-lg-1 fs-3">Search Income</span>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="row">
                                                    <div class="col-12 col-lg-8 d-flex">
                                                        <input class="form-control mx-3" style="height: 50px;" type="month" placeholder="Search" aria-label="Search" id="searchmcincome">
                                                    </div>
                                                    <button class="btn btn-dark col-lg-4 col-10 mx-4 mx-lg-0" onclick="searchMonthlyCashIncome()"> Search</button>
                                                    <div class="col-8 d-flex"></div>
                                                    <button class="mt-4 btn  col-lg-4 col-10 mx-4 mx-lg-0 btn-danger" onclick="resetIncome()"> Reset</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 p-3">
                            <div class="row g-0">
                                <div class="col-12  col-lg-10  text-center p-3">
                                    <span class="col-12 addprohead fs-lg-1 fs-2">Daily Card Income</span>
                                </div>

                                <div class="col-12 g-4 border border-1 rounded-2 mb-4" style="background-color: white;">
                                    <div class="mt-1 p-3">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="row" id="viewarea5">
                                                    <?php
                                                    date_default_timezone_set("Asia/Colombo");
                                                    $date = date('Y-m-d');
                                                    $day = date("d", strtotime($date));
                                                    $month = date("m", strtotime($date));
                                                    $year = date("Y", strtotime($date));

                                                    $cash_income_rs = Database::search("SELECT SUM(`payments`.`card_payments`) FROM `payments` JOIN `invoice` ON `payments`.`invoice_id`=`invoice`.`id` WHERE `invoice`.`status_id`='1' AND YEAR(`payments`.`date`) = '" . $year . "' AND MONTH(`payments`.`date`) = '" . $month . "' AND DAY(`payments`.`date`) = '" . $day . "' ORDER BY `payments`.`date` ASC");
                                                    $cash_income_num = $cash_income_rs->num_rows;

                                                    $cash_income_data = $cash_income_rs->fetch_assoc();


                                                    ?>

                                                    <div class="col-12 g-4">
                                                        <div class="card itemcard " aria-hidden="true">
                                                            <!-- <img src="res/thumbnail.png" class="card-img-top img-fluid primg mt-4" alt="..." onclick="" style="cursor: pointer;" title="Click To View"> -->
                                                            <div class="card-body text-center">
                                                                <div class="mt-5 mb-4">
                                                                    <h5 class="card-title col-12">
                                                                        <div class="row">
                                                                            <div class="col-12 ovf1 fw-bold text-primary">
                                                                                <span>Today Income</span>
                                                                            </div>
                                                                        </div>
                                                                    </h5>
                                                                    <p class="card-text placeholder-glow">
                                                                    </p>

                                                                    <span class="col-12">Rs. <?php echo $cash_income_data["SUM(`payments`.`card_payments`)"]; ?> .00</span><br>
                                                                </div>
                                                                <!-- <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="">Add To Cart</a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-7 text-start p-3 mb-3">
                                                <span class="col-12 addprohead fs-lg-1 fs-3">Search Income</span>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="row">
                                                    <div class="col-lg-8 col-12 d-flex ">
                                                        <input class="form-control mx-3 " style="height: 50px;" type="date" placeholder="Search" aria-label="Search" id="searchdcrincome">
                                                    </div>
                                                    <button class="col-lg-4 col-10 mx-4 mx-lg-0  btn btn-dark" onclick="searchDailyCardIncome()"> Search</button>
                                                    <div class="col-8 d-flex"></div>
                                                    <button class="col-lg-4 col-10 mt-4 mx-4 mx-lg-0 btn btn-danger" onclick="resetIncome()"> Reset</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-6 p-3">
                            <div class="row g-0">
                                <div class="col-12  col-lg-10  text-center p-3">
                                    <span class="col-12 addprohead fs-lg-1 fs-2">Monthly Card Income</span>
                                </div>

                                <div class="col-12 g-4 border border-1 rounded-2" style="background-color: white;">
                                    <div class=" p-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row" id="viewarea6">
                                                    <?php

                                                    $cash_mIncome_rs = Database::search("SELECT SUM(`payments`.`card_payments`) FROM `payments` JOIN `invoice` ON `payments`.`invoice_id`=`invoice`.`id` WHERE `invoice`.`status_id`='1' AND  YEAR(`payments`.`date`) = '" . $year . "' AND MONTH(`payments`.`date`) = '" . $month . "' ORDER BY `payments`.`date` ASC");
                                                    $cash_mIncome_num = $cash_mIncome_rs->num_rows;

                                                    $cash_mIncome_data = $cash_mIncome_rs->fetch_assoc();


                                                    ?>
                                                    <div class="col-12 g-4">
                                                        <div class="card itemcard " aria-hidden="true">
                                                            <!-- <img src="res/thumbnail.png" class="card-img-top img-fluid primg mt-4" alt="..." onclick="" style="cursor: pointer;" title="Click To View"> -->
                                                            <div class="card-body text-center">
                                                                <div class="mt-5 mb-4">
                                                                    <h5 class="card-title col-12">
                                                                        <div class="row">
                                                                            <div class="col-12 ovf1 fw-bold text-primary">
                                                                                <span>This Month Income</span>
                                                                            </div>
                                                                        </div>
                                                                    </h5>
                                                                    <p class="card-text placeholder-glow">
                                                                    </p>

                                                                    <span class="col-12">Rs. <?php echo $cash_mIncome_data["SUM(`payments`.`card_payments`)"]; ?> .00</span><br>
                                                                </div>
                                                                <!-- <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="">Add To Cart</a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7 text-start p-3 mb-3">
                                                <span class="col-12 addprohead fs-lg-1 fs-3">Search Income</span>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="row">
                                                    <div class="col-12 col-lg-8 d-flex">
                                                        <input class="form-control mx-3" style="height: 50px;" type="month" placeholder="Search" aria-label="Search" id="searchmcrincome">
                                                    </div>
                                                    <button class="btn btn-dark col-lg-4 col-10 mx-4 mx-lg-0" onclick="searchMonthlyCardIncome()"> Search</button>
                                                    <div class="col-8 d-flex"></div>
                                                    <button class="mt-4 btn  col-lg-4 col-10 mx-4 mx-lg-0 btn-danger" onclick="resetIncome()"> Reset</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 p-3">
                            <div class="row g-0">
                                <div class="col-12  col-lg-10  text-center p-3">
                                    <span class="col-12 addprohead fs-lg-1 fs-2">Daily Bank Transfer Income</span>
                                </div>

                                <div class="col-12 g-4 border border-1 rounded-2 mb-4" style="background-color: white;">
                                    <div class="mt-1 p-3">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="row" id="viewarea7">
                                                    <?php
                                                    date_default_timezone_set("Asia/Colombo");
                                                    $date = date('Y-m-d');
                                                    $day = date("d", strtotime($date));
                                                    $month = date("m", strtotime($date));
                                                    $year = date("Y", strtotime($date));

                                                    $cash_income_rs = Database::search("SELECT SUM(`payments`.`b_transfer_payments`) FROM `payments` JOIN `invoice` ON `payments`.`invoice_id`=`invoice`.`id` WHERE `invoice`.`status_id`='1' AND YEAR(`payments`.`date`) = '" . $year . "' AND MONTH(`payments`.`date`) = '" . $month . "' AND DAY(`payments`.`date`) = '" . $day . "' ORDER BY `payments`.`date` ASC");
                                                    $cash_income_num = $cash_income_rs->num_rows;

                                                    $cash_income_data = $cash_income_rs->fetch_assoc();


                                                    ?>

                                                    <div class="col-12 g-4">
                                                        <div class="card itemcard " aria-hidden="true">
                                                            <!-- <img src="res/thumbnail.png" class="card-img-top img-fluid primg mt-4" alt="..." onclick="" style="cursor: pointer;" title="Click To View"> -->
                                                            <div class="card-body text-center">
                                                                <div class="mt-5 mb-4">
                                                                    <h5 class="card-title col-12">
                                                                        <div class="row">
                                                                            <div class="col-12 ovf1 fw-bold text-primary">
                                                                                <span>Today Income</span>
                                                                            </div>
                                                                        </div>
                                                                    </h5>
                                                                    <p class="card-text placeholder-glow">
                                                                    </p>

                                                                    <span class="col-12">Rs. <?php echo $cash_income_data["SUM(`payments`.`b_transfer_payments`)"]; ?> .00</span><br>
                                                                </div>
                                                                <!-- <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="">Add To Cart</a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-7 text-start p-3 mb-3">
                                                <span class="col-12 addprohead fs-lg-1 fs-3">Search Income</span>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="row">
                                                    <div class="col-lg-8 col-12 d-flex ">
                                                        <input class="form-control mx-3 " style="height: 50px;" type="date" placeholder="Search" aria-label="Search" id="searchdbtincome">
                                                    </div>
                                                    <button class="col-lg-4 col-10 mx-4 mx-lg-0  btn btn-dark" onclick="searchDailyBTIncome()"> Search</button>
                                                    <div class="col-8 d-flex"></div>
                                                    <button class="col-lg-4 col-10 mt-4 mx-4 mx-lg-0 btn btn-danger" onclick="resetIncome()"> Reset</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-6 p-3">
                            <div class="row g-0">
                                <div class="col-12  col-lg-10  text-center p-3">
                                    <span class="col-12 addprohead fs-lg-1 fs-2">Monthly Bank Transfer Income</span>
                                </div>

                                <div class="col-12 g-4 border border-1 rounded-2" style="background-color: white;">
                                    <div class=" p-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row" id="viewarea8">
                                                    <?php

                                                    $cash_mIncome_rs = Database::search("SELECT SUM(`payments`.`b_transfer_payments`) FROM `payments` JOIN `invoice` ON `payments`.`invoice_id`=`invoice`.`id` WHERE `invoice`.`status_id`='1' AND  YEAR(`payments`.`date`) = '" . $year . "' AND MONTH(`payments`.`date`) = '" . $month . "' ORDER BY `payments`.`date` ASC");
                                                    $cash_mIncome_num = $cash_mIncome_rs->num_rows;

                                                    $cash_mIncome_data = $cash_mIncome_rs->fetch_assoc();


                                                    ?>
                                                    <div class="col-12 g-4">
                                                        <div class="card itemcard " aria-hidden="true">
                                                            <!-- <img src="res/thumbnail.png" class="card-img-top img-fluid primg mt-4" alt="..." onclick="" style="cursor: pointer;" title="Click To View"> -->
                                                            <div class="card-body text-center">
                                                                <div class="mt-5 mb-4">
                                                                    <h5 class="card-title col-12">
                                                                        <div class="row">
                                                                            <div class="col-12 ovf1 fw-bold text-primary">
                                                                                <span>This Month Income</span>
                                                                            </div>
                                                                        </div>
                                                                    </h5>
                                                                    <p class="card-text placeholder-glow">
                                                                    </p>

                                                                    <span class="col-12">Rs. <?php echo $cash_mIncome_data["SUM(`payments`.`b_transfer_payments`)"]; ?> .00</span><br>
                                                                </div>
                                                                <!-- <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="">Add To Cart</a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7 text-start p-3 mb-3">
                                                <span class="col-12 addprohead fs-lg-1 fs-3">Search Income</span>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="row">
                                                    <div class="col-12 col-lg-8 d-flex">
                                                        <input class="form-control mx-3" style="height: 50px;" type="month" placeholder="Search" aria-label="Search" id="searchmbtincome">
                                                    </div>
                                                    <button class="btn btn-dark col-lg-4 col-10 mx-4 mx-lg-0" onclick="searchMonthlyBTIncome()"> Search</button>
                                                    <div class="col-8 d-flex"></div>
                                                    <button class="mt-4 btn  col-lg-4 col-10 mx-4 mx-lg-0 btn-danger" onclick="resetIncome()"> Reset</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
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