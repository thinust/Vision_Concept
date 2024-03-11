<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vision Concept | Invoice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <link rel="icon" href="res/logo3.png" /> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
</head>

<body class="body">
    <div class="container  mb-5">
        <div class="row">

            <?php

            $custid = $_GET["custid"];

            ?>

            <div class="d-none d-lg-block">

                <?php

                require "sideBar.php"

                ?>
            </div>

            <div class=" col-6 text-center" id="pheading">
                <span class="col-12 addprohead fs-1">Invoice</span>
                <div class=" col-11 fs-3 fw-bold"><a href="customers.php"><i class="bi bi-caret-left-fill"></i>Back</a></div>
            </div>

            <div class="col-6 btn-toolbar justify-content-end " id="printbtn">
                <button class="btn btn-dark me-2" onclick="printInvoice(<?php echo $custid; ?>)"><i class="bi bi-printer-fill"></i> Print</button>
            </div>

            <div class="col-lg-8 bg-body offset-lg-2 rounded mb-3" id="page">
                <div class="row">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-2">
                                <span class="col-4 text-lg-start title01">
                                    <img src="logo.png" style="height: 80px; cursor: pointer;" onclick="himg();">
                                </span>

                            </div>

                            <div class="col-6 text-primary text-dark fw-bold" style="font-size: 9px;">
                                <span class="col-12 fs-5">VISION CONCEPT</span><br />
                                <span>No.211, Hospital Rd, Kalubowila.</span><br />
                                <span>Tel: 011 2765512, 071 1989195</span><br>
                                <span>Email: vision.concept@gmail.com</span>
                            </div>

                            <div class="col-4">
                                <span class="col-4 text-lg-start">
                                    <i class="bi bi-facebook"></i>
                                    <label class="form-label" style="font-size: 12px;">visionconcept</label>
                                </span><br />
                                <span class="col-4 text-lg-start">
                                    <i class="bi bi-whatsapp"></i>
                                    <label class="form-label" style="font-size: 12px;">071 9880693</label>
                                </span><br />

                            </div>

                        </div>
                    </div>
                    <hr class="rounded mt-3 bg-dark">
                    <div class="mt-3">
                        <div class="row">
                            <?php

                            require "connection.php";

                            // $date = date('Y-m-d');

                            $invoid = $_GET["invoid"];

                            $customer_rs = Database::search("SELECT * FROM `invoice` JOIN `customer` ON `invoice`.`customer_id`=`customer`.`id` WHERE `invoice`.`id`='" . $invoid . "'");
                            $customer_num = $customer_rs->num_rows;

                            $customer_data = $customer_rs->fetch_assoc();

                            ?>
                            <div class="col-8">
                                <label class="form-label fw-bold" style="font-size: 12px;">Customer :</label>
                                <label class="form-label" style="font-size: 12px;"><?php echo $customer_data["name"]; ?></label>

                            </div>

                            <div class="col-4">
                                <label class="form-label fw-bold" style="font-size: 12px;">Invo. No:</label>
                                <label class="form-label" style="font-size: 12px;"><?php echo $invoid; ?></label>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold" style="font-size: 12px;">Address:</label>
                                <label class="form-label" style="font-size: 12px;"><?php echo $customer_data["address"]; ?></label>
                            </div>

                            <div class="col-8">
                                <label class="form-label fw-bold" style="font-size: 12px;">Contact:</label>
                                <label class="form-label" style="font-size: 12px;"><?php echo $customer_data["mobile"]; ?></label>
                            </div>
                            <div class="col-4">
                                <label class="form-label fw-bold" style="font-size: 12px;">Date:</label>
                                <label class="form-label" style="font-size: 12px;"><?php echo $customer_data["date"]; ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-1">
                        <div class="row">
                            <table class="table table-bordered border-dark" style="font-size: 12px;">
                                <thead>
                                    <tr class="border border-0 border-dark ">
                                        <th class="text-center border-dark border border-1" style="width: 40px;">Qty</th>
                                        <th class="text-center border-dark border border-1">Description</th>
                                        <th class="text-center border-dark border border-1" style="width: 80px;">Rate</th>
                                        <th class="text-center border-dark border border-1" style="width: 100px;">Rs.</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $invoice_rs = Database::search("SELECT * FROM `invoice_item` WHERE `invoice_id`='" . $invoid . "'");
                                    $invoice_num = $invoice_rs->num_rows;

                                    // $invoice_data = $invoice_rs->fetch_assoc();

                                    for ($i = 0; $i < $invoice_num; $i++) {
                                        $invoice_data = $invoice_rs->fetch_assoc();

                                    ?>
                                        <tr>
                                            <td class="text-center text-dark"><?php echo $invoice_data["qty"]; ?></td>
                                            <td class="text-center text-dark"><?php echo $invoice_data["description"]; ?></td>
                                            <td class="text-center text-dark"><?php echo $invoice_data["rate"]; ?></td>
                                            <td class="text-center text-dark"><?php echo $invoice_data["qty"] * $invoice_data["rate"]; ?></td>

                                        </tr>
                                    <?php

                                    }



                                    $invoicesum_rs = Database::search("SELECT SUM(rate) AS sumrate, SUM(rate*qty) AS sumprice FROM `invoice_item` WHERE `invoice_id`='" . $invoid . "'");
                                    $invoicesum_num = $invoicesum_rs->num_rows;

                                    $invoicesum_data = $invoicesum_rs->fetch_assoc();


                                    ?>

                                    <tr class="border border-0 border-dark ">
                                        <td class="text-center text-dark border-0"></td>
                                        <td class="text-center text-dark border-dark border border-0"></td>
                                        <td class="text-end text-dark fw-bold border-0">Amount&nbsp;</td>
                                        <td class="text-center text-dark fw-bold"><?php echo $invoicesum_data["sumprice"]; ?></td>
                                    </tr>

                                    <?php
                                    if ($customer_data["discount"] == 0) {
                                    } else {


                                    ?>

                                        <tr class="border border-0 border-dark ">
                                            <td class="text-center text-dark border-0"></td>
                                            <td class="text-center text-dark border-dark border border-0"></td>
                                            <td class="text-end text-dark fw-bold border-0">Discount&nbsp;</td>
                                            <td class="text-center text-dark fw-bold border-dark fw-bold border border-1"><?php echo $customer_data["discount"]; ?></td>
                                        </tr>

                                        <tr class="border border-0 border-dark ">
                                            <td class="text-center text-dark border-0"></td>
                                            <td class="text-center text-dark border-dark border border-0"></td>
                                            <td class="text-end text-dark fw-bold border-0">Total&nbsp;</td>
                                            <td class="text-center text-dark fw-bold border-dark fw-bold border border-1"><?php echo $customer_data["price"]; ?></td>
                                        </tr>

                                    <?php  }

                                    if ($customer_data["payment_status_id"] == 2) {
                                    ?>
                                        <tr class="border border-0 border-dark ">
                                            <td class="text-center text-dark border-0"></td>
                                            <td class="text-center text-dark border-dark border border-0"></td>
                                            <td class="text-end text-dark fw-bold border-0">Advance&nbsp;</td>
                                            <td class="text-center text-success border-dark fw-bold border border-1"><?php echo $customer_data["payment"]; ?></td>
                                        </tr>
                                    <?php
                                    } else {
                                    }
                                    ?>
                                    <tr class="border border-0 border-dark">
                                        <td class="text-center text-dark border-0"></td>
                                        <td class="text-center text-dark border-0"></td>
                                        <td class="text-end text-dark fw-bold border-0">Balance&nbsp;</td>
                                        <td class="text-center text-danger fw-bold border-dark border border-1"><?php if ($customer_data["payment_status_id"] == 1) {
                                                                                                                    echo "0";
                                                                                                                } else {
                                                                                                                    echo $customer_data["price"] - $customer_data["payment"];
                                                                                                                }  ?></td>
                                    </tr>
                                    <!-- <tr class="border border-0 border-dark ">
                                        <td class="text-center text-dark border-0"></td>
                                        <td class="text-end text-dark fw-bold border-0"></td>
                                        <td class="text-end text-dark border-0 fw-bold">Total&nbsp;</td>
                                        <td class="text-center text-dark border-dark border border-1">text</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>



                    <?php if ($customer_data["payment_status_id"] == 1) {
                    ?>
                        <div class="offset-5 col-7"><img style="position: absolute;margin-top: -80px;" width="100px" src="res/paid_seal.png" /></div>
                    <?php
                    }
                    ?>



                    <div class="mt-1" style="font-size: 12px;">
                        <div class="row">
                            <div class="col-8">

                            </div>
                            <div class="col-4">
                                <label class="form-label fw-bold">Cashier:&nbsp;</label>
                                <label class="form-label  mx-3">Admin</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>