<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vision Concept | View</title>
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

                <?php

                $id = $_GET["id"];

                // session_start();
                // if (isset($_SESSION["sa"])) {
                require "connection.php";
                require "head.php";

                ?>
                <div class="d-none d-lg-block">

                    <?php

                    require "sideBar.php"

                    ?>
                </div>


                <?php

                date_default_timezone_set("Asia/Colombo");
                $date = date("Y-m-d");


                $customer_rs = Database::search("SELECT * FROM `customer` WHERE  `id`='" . $id . "'");
                $customer_num = $customer_rs->num_rows;

                $customer_data = $customer_rs->fetch_assoc();

                $age = (int)$date - (int)$customer_data["dob"];

                $puid = date_create()->format('Uv');

                ?>


                <div class="col-12">
                    <div class="row ">
                        <div class="col-lg-5 col-12 text-start p-3 mb-3">
                            <span class="col-12 addprohead fs-lg-1 fs-1">Customer Details</span>
                            <div class=" col-12 fs-3 fw-bold"><a href="customers.php"><i class="bi bi-caret-left-fill"></i>Back</a></div>
                        </div>


                        <!-- <div class=" col-7 mb-5 mt-5 "></div> -->
                        <div class=" col-lg-7 col-12">
                            <div class="row">
                                <div class=" col-7 mb-5"></div>
                                <div class=" col-lg-5 mb-4 col-12 d-grid">
                                    <button class="btn btn-dark fw-bold fs-5 text-light" onclick="oldInvoice(<?php echo $id; ?>);">Old Invoice</button>
                                </div>
                                <div class=" col-7 mb-5"></div>
                                <div class=" col-lg-5 col-12 d-grid">
                                    <button class="btn btn-secondary fw-bold fs-5 text-light" onclick="newInvoice(<?php echo $id; ?>);">New Invoice</button>
                                </div>
                                <div class=" col-7 mb-lg-5"></div>
                                <div class=" col-lg-5 col-12 d-grid mb-5 mt-lg-4 mt-1">
                                    <button class="btn btn-success fw-bold fs-5 text-light" onclick="newPrescription(<?php echo $id; ?>);">New Prescription</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-8"></div> -->
                        <div class="col-lg-3 col-12 g-4">
                            <div class="card itemcard " aria-hidden="true">
                                <!-- <img src="res/thumbnail.png" class="card-img-top img-fluid primg mt-4" alt="..." onclick="" style="cursor: pointer;" title="Click To View"> -->
                                <div class="card-body">
                                    <!-- <span class="col-12 fs-5"> &nbsp;<?php echo $customer_data["dob"]; ?></span><br> -->
                                    <div class="mt-3 mb-4">
                                        <h5 class="card-title col-12">
                                            <div class="row">
                                                <div class="col-12 fs-4 ovf1 fw-bold text-danger text-center">
                                                    <span><?php echo $customer_data["name"]; ?></span>
                                                </div>
                                            </div>
                                        </h5>
                                        <p class="card-text placeholder-glow">
                                        </p>
                                        <?php
                                        $input =  $customer_data["address"];
                                        $output = str_replace(',', ',<br />', $input);
                                        ?>
                                        <div class="col-12 mb-2">
                                            <div class="row">
                                                <span class=" col-1"><i class="bi bi-geo-alt"></i></span><span class="col-10"> &nbsp;<?php echo $output; ?></span><br>
                                            </div>
                                        </div>

                                        <!-- <i class="bi bi-geo-alt"><span class="col-12"></i> &nbsp;<?php echo $customer_data["address"]; ?></span><br> -->
                                        <span class="col-12"><i class="bi bi-phone"></i> &nbsp;<?php echo $customer_data["mobile"]; ?></span><br>
                                        <span class="col-12"><i class="bi bi-award"></i> &nbsp;<?php echo $customer_data["dob"]; ?></span><br>
                                    </div>
                                    <!-- <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="">Add To Cart</a> -->
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-9 col-12 g-4 border border-1 rounded-2" style="background-color: white;">
                            <div class="mt-1 p-5">
                                <div class="row">
                                    <div class="col-5 text-start p-3 mb-3">
                                        <span class="col-12 addprohead fs-lg-1 fs-1">Search Prescription</span>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <div class="row">
                                            <div class="col-lg-10 col-12 d-flex">
                                                <input class="form-control mx-3" style="height: 50px;" type="date" placeholder="Search" aria-label="Search" id="searchdate">
                                            </div>
                                            <button class="col-lg-2 col-10 mx-4 mx-lg-0 btn btn-dark fs-4" onclick="searchPrescription(<?php echo $id; ?>)"> Search</button>
                                            <div class="col-10 d-flex"></div>
                                            <button class="col-lg-2 col-10 mt-4 mx-4 mx-lg-0 btn btn-danger fs-4" onclick="resetpres(<?php echo $id; ?>)"> Reset</button>
                                        </div>
                                    </div>
                                    <div class="col-12 g-0" id="viewarea">
                                        <table class="table table-bordered  border-dark">
                                            <thead>
                                                <tr class="border border-0 border-dark fs-4">
                                                    <th class="text-center border-dark border border-2" style="width: 250px;">Prescription No</th>
                                                    <th class="text-center border-dark border border-2" style="width: 200px;">Date</th>
                                                    <th class="text-center border-dark border border-0" style="width: 100px;"></th>
                                                    <th class="text-center border-dark border border-0" style="width: 100px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php

                                                $prescription_rs = Database::search("SELECT * FROM `prescription` WHERE `customer_id`='" . $id . "' AND `status_id`='1' ORDER BY `date` ASC");
                                                $prescription_num = $prescription_rs->num_rows;

                                                for ($i = 0; $i <  $prescription_num; $i++) {

                                                    $prescription_data = $prescription_rs->fetch_assoc();

                                                ?>
                                                    <tr>
                                                        <td class="text-center pt-3 border-dark border border-2 text-dark"><?php echo $prescription_data['id']; ?></td>
                                                        <td class="text-center pt-3 border-dark border border-2 text-dark"><?php echo $prescription_data['date']; ?></td>
                                                        <td class="text-center pt-3 border-dark border border-2">
                                                            <button class="btn btn-dark border-0" style="background:  #7f0eb4;" onclick="viewPrescription(<?php echo $id; ?>,<?php echo $prescription_data['id']; ?>)">View</button>
                                                        </td>
                                                        <td class="text-center pt-3 border-dark border border-2">
                                                            <button class="btn btn-danger border-0" onclick="deletePrescription(<?php echo $id; ?>,<?php echo $prescription_data['id']; ?>)">X</button>
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
                        </div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-9 col-12 g-4 border border-1 rounded-2" style="background-color: white;">
                            <div class="mt-1 p-5">
                                <div class="row">
                                    <div class="col-5 text-start p-3 mb-3">
                                        <span class="col-12 addprohead fs-lg-1 fs-1">Search Invoice</span>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <div class="row">
                                            <div class="col-lg-10 col-12 d-flex">
                                                <input class="form-control mx-3" style="height: 50px;" type="date" placeholder="Search" aria-label="Search" id="searchinvodate">
                                            </div>
                                            <button class="col-lg-2 col-10 mx-4 mx-lg-0 btn btn-dark fs-4" onclick="searchInvoice(<?php echo $id; ?>)"> Search</button>
                                            <div class="col-10 d-flex"></div>
                                            <button class="col-lg-2 col-10 mt-4 mx-4 mx-lg-0 btn btn-danger fs-4" onclick="resetpres(<?php echo $id; ?>)"> Reset</button>
                                        </div>
                                    </div>
                                    <div class="col-12 g-0" id="viewarea2">
                                        <table class="table table-bordered  border-dark">
                                            <thead>
                                                <tr class="border border-0 border-dark fs-4">
                                                    <th class="text-center border-dark border border-2" style="width: 100px;">Status</th>
                                                    <th class="text-center border-dark border border-2" style="width: 100px;">Payment</th>
                                                    <th class="text-center border-dark border border-2" style="width: 200px;">Invoice No</th>
                                                    <th class="text-center border-dark border border-2" style="width: 200px;">Date</th>
                                                    <th class="text-center border-dark border border-0" style="width: 100px;"></th>
                                                    <th class="text-center border-dark border border-0" style="width: 100px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php

                                                $invoice_rs = Database::search("SELECT `payment_status`.`id` AS `pstid` ,`invoice`.`id` AS `invid` , `invoice`.`date`,`payment_status`.`value` FROM `invoice` JOIN `payment_status` ON `invoice`.`payment_status_id`=`payment_status`.`id` WHERE `customer_id`='" . $id . "' AND `status_id`='1' ORDER BY `date` ASC");
                                                $invoice_num = $invoice_rs->num_rows;

                                                for ($i = 0; $i <  $invoice_num; $i++) {

                                                    $invoice_data = $invoice_rs->fetch_assoc();

                                                ?>
                                                    <tr>
                                                        <td class="text-center pt-3 border-dark border border-2 text-dark"><?php echo $invoice_data['value']; ?></td>
                                                        <td class="text-center pt-3 border-dark border border-2 text-dark">
                                                            <?php
                                                            if ($invoice_data['pstid'] == 2 || $invoice_data['pstid'] == 3) {
                                                            ?>
                                                                <button class="btn btn-dark border-0 bg-danger" onclick="payInvoicebalance(<?php echo $id; ?>,<?php echo $invoice_data['invid']; ?>)">PAY</button>

                                                            <?php
                                                            } else {
                                                            ?>
                                                                <label class="text-success fw-bold ">Done</label>

                                                            <?php
                                                            }


                                                            ?>
                                                        </td>
                                                        <td class="text-center pt-3 border-dark border border-2 text-dark"><?php echo $invoice_data['invid']; ?></td>
                                                        <td class="text-center pt-3 border-dark border border-2 text-dark"><?php echo $invoice_data['date']; ?></td>
                                                        <td class="text-center pt-3 border-dark border border-2">
                                                            <button class="btn btn-dark border-0" style="background:  #7f0eb4;" onclick="viewInvoice(<?php echo $id; ?>,<?php echo $invoice_data['invid']; ?>)">View</button>
                                                        </td>
                                                        <td class="text-center pt-3 border-dark border border-2">
                                                            <button class="btn btn-danger border-0" onclick="deleteInvoice(<?php echo $id; ?>,<?php echo $invoice_data['invid']; ?>)">X</button>
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
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>