<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vision Concept | Pending Invoice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="logo.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
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

                $cusid = $_GET["cusid"];
                $invid = $_GET["invoid"];

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
                <div class="col-12  col-lg-8   p-3 mb-3">
                    <span class="col-12 addprohead fs-lg-1 fs-1">Pending Invoice</span>
                    <div class=" col-5 fs-3 fw-bold"><a href="viewCustomer.php?id=<?php echo $cusid; ?>"><i class="bi bi-caret-left-fill"></i>Back</a></div>
                </div>

                <?php

                date_default_timezone_set("Asia/Colombo");
                $date = date("Y-m-d");


                $customer_rs = Database::search("SELECT * FROM `customer` WHERE  `id`='" . $cusid . "'");
                $customer_num = $customer_rs->num_rows;

                $customer_data = $customer_rs->fetch_assoc();

                $age = (int)$date - (int)$customer_data["dob"];

                $iuid = date_create()->format('Uv');

                ?>

                <div class="col-lg-10 col-12 offset-1">
                    <div class="row">


                        <div class="col-12  mb-3 mt-3">
                            <div class="row">
                                <div class="col-lg-10 col-12">
                                    <input type="text" class="form-control mx-lg-3" value="<?php echo $customer_data["name"]; ?>" placeholder="Enter Name" id="name" disabled>
                                </div>
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Name
                                </label>
                            </div>
                        </div>

                        <div class="col-12  mb-3 mt-3">
                            <div class="row">
                                <div class="col-lg-10 col-12">
                                    <input type="tel" class="form-control mx-lg-3" value="<?php echo $customer_data["mobile"]; ?>" placeholder="Enter Name" id="mobile" disabled>
                                </div>
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Contact
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mb-3 mt-3">
                            <div class="row">
                                <div class="col-lg-10 col-12">
                                    <input type="text" class="form-control mx-lg-3" placeholder="Enter Date" id="date" value="<?php echo $date; ?>" disabled>
                                </div>
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Date
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mb-3 mt-3">
                            <div class="row">
                                <div class="col-lg-10 col-12">
                                    <input type="text" class="form-control mx-lg-3" placeholder="Enter Age" id="age" value="<?php echo $age; ?>" disabled>
                                </div>
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Age
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mb-3 mt-3">
                            <div class="row">
                                <div class="col-lg-10 col-12">
                                    <input type="tel" class="form-control mx-lg-3" placeholder="Enter Occupation" value="<?php echo $customer_data["address"]; ?>" disabled id="address">
                                </div>
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Address
                                </label>
                            </div>
                        </div>

                        <div class="col-12  col-lg-8 text-center  p-3 mb-3">
                            <span class="col-12 addprohead fs-lg-1 fs-1">Pay Invoice</span>
                        </div>

                        <?php

                        $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `id`='" . $invid . "'");
                        $invoice_num = $invoice_rs->num_rows;

                        $invoice_data = $invoice_rs->fetch_assoc();

                        ?>

                        <div class="col-12  mb-3 mt-3">
                            <div class="row">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Invoice No
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="text" class="form-control mx-lg-3" value="<?php echo $invid; ?>" placeholder="Enter Description" id="invono" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-12   mt-3">
                            <div class="row">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Total Amount
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="text" class="form-control mx-lg-3 text-primary" value="<?php echo $invoice_data["price"]; ?>" placeholder="Enter Price" id="total" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-12   mt-3">
                            <div class="row">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Paid Amount
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="text" class="form-control mx-lg-3 text-success" value="<?php echo $invoice_data["payment"]; ?>" placeholder="Enter Price" id="payamount" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-12   mt-3">
                            <div class="row">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Payable Amount
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="text" class="form-control mx-lg-3 text-danger" value="<?php echo $invoice_data["price"] - $invoice_data["payment"]; ?>" placeholder="Enter Price" id="payableamount" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="row" id="payType">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Payment Type
                                </label>
                                <div class="col-lg-10 col-12">
                                    <select class="form-select mx-lg-3" id="paymentType" onchange="pendingPaymentType();">
                                        <option value="0" selected>Select</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Card</option>
                                        <option value="3">Bank Transfer</option>
                                        <option value="4">Cash & Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-3"></div>
                        <div class="col-6 mt-3">
                            <div class="row" hidden id="cashdiv">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Cash
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="number" class="form-control mx-lg-3" onkeyup="pendingCash();" value="0" id="cash">
                                </div>
                            </div>
                        </div>
                        <div class="col-6   mt-3">
                            <div class="row" hidden id="carddiv">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Card
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="number" class="form-control mx-lg-3" onkeyup="card();" value="0"  id="card">
                                </div>
                            </div>
                        </div>



                        <div class="offset-lg-2 offset-1 col-10">
                            <div class="row">
                                <div class=" offset-lg-2 col-lg-4 col-12 d-grid mb-5 mt-5">
                                    <button class="btn btn-dark ms-lg-5 fs-3" type="button" onclick="paypenndingInvoice(<?php echo $invid; ?>,<?php echo $cusid ?>);">PAY &nbsp;&nbsp;&nbsp;<i class="bi bi-credit-card-2-back-fill"></i></button>
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