<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vision Concept | Invoice</title>
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
                <div class="col-12  col-lg-8   p-3 mb-3">
                    <span class="col-12 addprohead fs-lg-1 fs-1">Invoice</span>
                    <div class=" col-5 fs-3 fw-bold"><a href="viewCustomer.php?id=<?php echo $id; ?>"><i class="bi bi-caret-left-fill"></i>Back</a></div>
                </div>

                <?php

                date_default_timezone_set("Asia/Colombo");
                $date = date("Y-m-d");


                $customer_rs = Database::search("SELECT * FROM `customer` WHERE  `id`='" . $id . "'");
                $customer_num = $customer_rs->num_rows;

                $customer_data = $customer_rs->fetch_assoc();

                $age = (int)$date - (int)$customer_data["dob"];

                // $iuid = date_create()->format('Uv');

                $invoice_num_rs = Database::search("SELECT MAX(invoice.id) as invo_id FROM invoice");
                $invoice_num_data = $invoice_num_rs->fetch_assoc();

                $iuid = $invoice_num_data['invo_id'] + 1;
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
                            <span class="col-12 addprohead fs-lg-1 fs-1">Add To Invoice</span>
                        </div>

                        <div class="col-12  mb-3 mt-3">
                            <div class="row">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Description
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="text" class="form-control mx-lg-3" placeholder="Enter Description" id="desc">
                                </div>
                            </div>
                        </div>

                        <div class="col-12   mt-3">
                            <div class="row">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Price
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="text" class="form-control mx-lg-3" placeholder="Enter Price" id="price">
                                </div>
                            </div>
                        </div>

                        <div class="col-12  mb-3 mt-3">
                            <div class="row">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Quantity
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="number" class="form-control mx-lg-3" placeholder="Enter Qty" id="qty">
                                </div>
                            </div>
                        </div>


                        <div class="offset-lg-2 offset-1 col-10">
                            <div class="row">
                                <div class=" offset-lg-2 col-lg-4 col-12 d-grid mb-5 mt-5">
                                    <button class="btn btn-dark ms-lg-5" type="button" onclick="addInvoiceProcess();">Add to Invoice &nbsp;&nbsp;&nbsp;<i class="bi bi-plus-circle-fill"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12  col-lg-10 text-center p-3 mt-5">
                            <span class="col-12 addprohead fs-lg-1 fs-1">Invoice Table</span>
                        </div>

                        <div class="mt-2 bg-light">
                            <div class="row p-3">
                                <table class="table table-bordered border-dark" id="invoTable">
                                    <thead>
                                        <tr class="border border-0 border-dark ">
                                            <th class="text-center border-dark border border-1" style="width: 40px;">Qty</th>
                                            <th class="text-center border-dark border border-1">Description</th>
                                            <th class="text-center border-dark border border-1" style="width: 80px;">Rate</th>
                                            <th class="text-center border-dark border border-1" style="width: 100px;">Rs.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--  <tr class="border border-0 border-dark ">
                                            <td class="text-center text-dark border-0"></td>
                                            <td class="text-end text-dark fw-bold border-0">Amount&nbsp;</td>
                                            <td class="text-center text-dark">text</td>
                                            <td class="text-center text-dark">text</td>
                                        </tr>
                                        <tr class="border border-0 border-dark ">
                                            <td class="text-center text-dark border-0"></td>
                                            <td class="text-end text-dark fw-bold border-0">Advance&nbsp;</td>
                                            <td class="text-center text-dark border-dark border border-1">text</td>
                                            <td class="text-center text-dark border-dark border border-1">text</td>
                                        </tr>
                                        <tr class="border border-0 border-dark">
                                            <td class="text-center text-dark border-0"></td>
                                            <td class="text-end text-dark fw-bold border-0">Balance&nbsp;</td>
                                            <td class="text-center text-dark border-dark border border-1">text</td>
                                            <td class="text-center text-dark border-dark border border-1">text</td>
                                        </tr>
                                        <tr class="border border-0 border-dark ">
                                            <td class="text-center text-dark border-0"></td>
                                            <td class="text-end text-dark border-0 fw-bold">Total&nbsp;</td>
                                            <td class="text-end text-dark fw-bold border-0"></td>
                                            <td class="text-center text-dark border-dark border border-1">text</td>
                                        </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-4 mt-3">
                            <div class="row" hidden id="payType">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Payment Type
                                </label>
                                <div class="col-lg-10 col-12">
                                    <select class="form-select mx-lg-3" id="paymentType" onchange="paymentType();">
                                        <option value="0" selected>Select</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Card</option>
                                        <option value="3">Bank Transfer</option>
                                        <option value="4">Cash & Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="row">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Payment Status
                                </label>
                                <div class="col-lg-10 col-12">
                                    <select class="form-select mx-lg-3" id="paymentOption" onchange="paymentOption();">
                                        <option value="0" selected>Select</option>
                                        <option value="1">Paid</option>
                                        <option value="2">Advanced</option>
                                        <option value="3">Unpaid</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4   mt-3">
                            <div class="row">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Amount
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="text" class="form-control mx-lg-3" value="0" placeholder="Price" id="amount" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="row" hidden id="cashdiv">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Cash
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="number" class="form-control mx-lg-3" onkeyup="cash();" value="0" id="cash">
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="row" hidden id="advancediv">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Advance
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="number" class="form-control mx-lg-3" onkeyup="advance();" value="0" placeholder="Enter Advance Price" id="advance">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-7"></div> -->
                        <div class="col-4   mt-3">
                            <div class="row">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Discount
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="text" class="form-control mx-lg-3" onkeyup="aftDiscount();" value="0" placeholder="Enter Discount Price" id="discount">
                                </div>
                            </div>
                        </div>
                        <div class="col-4   mt-3">
                            <div class="row" hidden id="carddiv">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Card
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="number" class="form-control mx-lg-3" onkeyup="card();" value="0" id="card">
                                </div>
                            </div>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4   mt-3">
                            <div class="row">
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    After Discount
                                </label>
                                <div class="col-lg-10 col-12">
                                    <input type="number" class="form-control mx-lg-3 text-success fw-bold" value="0" placeholder="Enter Discount Price" id="aftdiscount" disabled>
                                </div>
                            </div>
                        </div>




                        <div class=" col-12 d-grid mx-3 mb-5 mt-5">
                            <button class="btn fw-bold fs-4 text-light" onclick="addNewInvoice(<?php echo $id; ?>,<?php echo $iuid; ?>);" style="background:  #7f0eb4;">Add Invoice</button>
                        </div>

                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

</html>