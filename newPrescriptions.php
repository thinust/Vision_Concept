<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vision Concept | New Prescription</title>
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
                <div class=" col-5 mb-5 mt-5 fs-3 fw-bold"><a href="viewCustomer.php?id=<?php echo $id; ?>"><i class="bi bi-caret-left-fill"></i>Back</a></div>
                <div class="col-12  col-lg-8  text-center p-3 mb-3">
                    <span class="col-12 addprohead fs-lg-1 fs-1">Prescriptions</span>
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
                                    <input type="tel" class="form-control mx-lg-3" placeholder="Enter Occupation" id="occupation">
                                </div>
                                <label class="form-label fw-bold lbl1 mx-4 col-10">
                                    Occupation
                                </label>
                            </div>
                        </div>


                        <div class="mt-5">
                            <div class="row">
                                <table class="table table-bordered border-dark" style="font-size: 12px;">
                                    <thead>
                                        <tr class="border border-0   border-dark ">
                                            <th colspan="1" class="border-0"></th>
                                            <th colspan="3" class="text-center border-left-0">R</th>
                                        </tr>
                                        <tr class="border border-0 border-dark ">
                                            <th colspan="1" class="border-0"></th>
                                            <th class="text-center border-dark border border-1">SPH</th>
                                            <th class="text-center border-dark border border-1">CYL</th>
                                            <th class="text-center border-dark border border-1">Axis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class=" text-center pt-3 fw-bold text-dark tbltxt" style="font-size: 12px;width: 40px;">Dist <br />ance</td>
                                            <td class="text-center pt-3 text-dark"><input type="text" class="form-control" placeholder="Enter" id="sph_r_dist"></td>
                                            <td class="text-center pt-3 text-dark"><input type="text" class="form-control" placeholder="Enter" id="cyl_r_dist"></td>
                                            <td class="text-center pt-3 text-dark"><input type="text" class="form-control" placeholder="Enter" id="axis_r_dist"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center fw-bold pt-3 text-dark tbltxt" style="width: 40px;">Near</td>
                                            <td class="text-center pt-3 text-dark"><input type="text" class="form-control" placeholder="Enter" id="sph_r_near"></td>
                                            <td class="text-center pt-3 text-dark"><input type="text" class="form-control" placeholder="Enter" id="cyl_r_near"></td>
                                            <td class="text-center pt-3 text-dark"><input type="text" class="form-control" placeholder="Enter" id="axis_r_near"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="row">
                                <table class="table table-bordered border-dark" style="font-size: 12px;">
                                    <thead>
                                        <tr class="border border-0   border-dark ">
                                            <th colspan="1" class="border-0"></th>
                                            <th colspan="3" class="text-center border-left-0">L</th>
                                        </tr>
                                        <tr class="border border-0 border-dark ">
                                            <th colspan="1" class="border-0"></th>
                                            <th class="text-center border-dark border border-1">SPH</th>
                                            <th class="text-center border-dark border border-1">CYL</th>
                                            <th class="text-center border-dark border border-1">Axis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class=" text-center pt-3 fw-bold text-dark tbltxt" style="font-size: 12px;width: 40px;">Dist <br />ance</td>
                                            <td class="text-center pt-3 text-dark"><input type="text" class="form-control" placeholder="Enter" id="sph_l_dist"></td>
                                            <td class="text-center pt-3 text-dark"><input type="text" class="form-control" placeholder="Enter" id="cyl_l_dist"></td>
                                            <td class="text-center pt-3 text-dark"><input type="text" class="form-control" placeholder="Enter" id="axis_l_dist"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center fw-bold pt-3 text-dark tbltxt" style="width: 40px;">Near</td>
                                            <td class="text-center pt-3 text-dark"><input type="text" class="form-control" placeholder="Enter" id="sph_l_near"></td>
                                            <td class="text-center pt-3 text-dark"><input type="text" class="form-control" placeholder="Enter" id="cyl_l_near"></td>
                                            <td class="text-center pt-3 text-dark"><input type="text" class="form-control" placeholder="Enter" id="axis_l_near"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="row">
                                <div class="col-6 ">
                                    <div class="row">
                                        <div class="col-2">
                                            <label class="form-label fw-bold mt-4">VA</label>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label fw-bold">R:&nbsp;</label>
                                            <label class="form-label"><input type="text" class="form-control" placeholder="Enter" id="va_r"></label><br />
                                            <label class="form-label fw-bold">L: &nbsp;</label>
                                            <label class="form-label"><input type="text" class="form-control" placeholder="Enter" id="va_l"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2">
                                            <label class="form-label fw-bold mt-3">PH</label>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label fw-bold">R:&nbsp;</label>
                                            <label class="form-label"><input type="text" class="form-control" placeholder="Enter" id="ph_r"></label><br />
                                            <label class="form-label fw-bold">L:&nbsp;</label>
                                            <label class="form-label"><input type="text" class="form-control" placeholder="Enter" id="ph_l"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="" style="font-size: 12px;">
                            <div class="row">
                                <div class="col-3"><label class="form-label fw-bold text-decoration-underline">HBL</label></div>
                            </div>
                            <div class="row px-1">
                                <div class="col-6">
                                    <label class="form-label fw-bold">R/&nbsp;</label>
                                    <label class="form-label"><input type="text" class="form-control" placeholder="Enter" id="hbl_r"></label>
                                </div>
                                <div class="col-6">
                                    <label class="form-label fw-bold">L/&nbsp;</label>
                                    <label class="form-label"><input type="text" class="form-control" placeholder="Enter" id="hbl_l"></label>
                                </div>
                            </div>
                        </div>


                        <div class="mt-5">
                            <div class="row">
                                <label class="form-label fw-bold">Remarks:</label>
                                <label class="form-label  mx-3"><textarea id="remarks"  class="form-control" placeholder="Enter" name="w3review" rows="4" cols="100" ></textarea></label>
                                <!-- <label class="form-label  mx-3"><input type="text" class="form-control" placeholder="Enter" id="remarks"></label>   -->
                            </div>
                        </div>


                        <div class="mt-5">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label fw-bold">PD &nbsp;</label>
                                    <label class="form-label  mx-3"><input type="text" class="form-control" placeholder="Enter" id="pd"></label>
                                </div>
                                <div class="col-6">
                                    <label class="form-label fw-bold">SH &nbsp;</label>
                                    <label class="form-label  mx-3"><input type="text" class="form-control" placeholder="Enter" id="sh"></label>
                                </div>
                            </div>
                        </div>


                        <div class=" col-12 d-grid mx-3 mb-5 mt-5">
                            <button class="btn fw-bold fs-4 text-light" onclick="addPrescription(<?php echo $id; ?>,<?php echo $puid; ?>);" style="background:  #7f0eb4;">Add Prescription</button>
                        </div>

                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

</html>