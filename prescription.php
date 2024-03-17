<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vision Concept | Prescription</title>
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

<body class="body" style="color: #0E097D;">
    <div class="container ">
        <div class="row">

            <!-- <div class="d-none d-lg-block col-3"></div> -->
            <?php
            require "head.php";
            $id = $_GET["id"];
            $pid = $_GET["pid"];

            ?>
            <div class="d-none d-lg-block">

                <?php

                require "sideBar.php"

                ?>
            </div>

            <div class=" col-6 text-center" id="pheading">
                <span class="col-12 addprohead fs-1">Prescription</span>
                <div class=" col-10 fs-3 fw-bold"><a href="customers.php"><i class="bi bi-caret-left-fill"></i>Back</a></div>
            </div>

            <!-- <button onclick="history.go(-1);">Back </button> -->

            <div class="col-6 btn-toolbar justify-content-end " id="printbtn">
                <button class="btn btn-dark me-2" onclick="printPrescrip(<?php echo $id; ?>)"><i class="bi bi-printer-fill"></i> Print</button>
                <!-- <button class="btn btn-dark me-2" type="button" onclick="downloadPDF()">Download PDF</button> -->
            </div>

            <!-- <div class=" col-12 fs-3 fw-bold"><a href="customers.php">Back</a></div> -->

            <div class="col-lg-8 bg-body offset-lg-2 rounded mt-0 p-0" id="page">
                <div class="row p-0">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-8">
                                <span class="col-4 text-lg-start title01">
                                    <img src="logo_prec.png" style="height: 90px; cursor: pointer;" onclick="himg();">
                                </span>
                                <span class="col-8 fs-2">VISION CONCEPT</span>
                            </div>

                            <div class="col-4 fw-bold  text-end" style="font-size: 12px;">

                                <span>211, Hospital Rd, Kalubowila.</span><br>
                                <span>011 2765512, 071 1989195</span><br>
                                <span>vision.concept@gmail.com</span>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="rounded mt-3 bg-dark">
                    </div>


                    <?php

                    require "connection.php";








                    $prescription_rs = Database::search("SELECT * FROM `customer` JOIN `prescription` ON `customer`.`id`=`prescription`.`customer_id` WHERE  `prescription`.`customer_id`='" . $id . "' AND `prescription`.`id`='" . $pid . "'");
                    $prescription_num = $prescription_rs->num_rows;

                    $prescription_data = $prescription_rs->fetch_assoc();

                    ?>

                    <div class="col-12 text-center mt-0">
                        <span class="col-8 fs-1">The Prescription</span>
                    </div>


                    <div class="mt-0">
                        <div class="row p-3">
                            <table class="table table-bordered " style="font-size: 12px;color: #0E097D;">
                                <thead>
                                    <tr class=" border-0 ">
                                        <th colspan="1" class="border-0"></th>
                                        <th colspan="3" class="text-center  prescriptablebordercolor">R</th>
                                        <th colspan="3" class="text-center border-0">L</th>
                                    </tr>
                                    <tr class="prescriptablebordercolor">
                                        <th colspan="1" class="border-1"></th>
                                        <th class="text-center prescriptablebordercolor border-1">SPH</th>
                                        <th class="text-center prescriptablebordercolor border-1">CYL</th>
                                        <th class="text-center prescriptablebordercolor border-1">Axis</th>
                                        <th class="text-center prescriptablebordercolor border-1">SPH</th>
                                        <th class="text-center prescriptablebordercolor border-1">CYL</th>
                                        <th class="text-center prescriptablebordercolor border-1">Axis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="prescriptablebordercolor" style="font-size: 15px;">
                                        <td class=" text-center fw-bold tbltxt" style="font-size: 12px;width: 40px;">Dist.</td>
                                        <td class="text-center prescriptablebordercolor border-1"><?php echo $prescription_data["sph_r_dist"]; ?></td>
                                        <td class="text-center prescriptablebordercolor border-1"><?php echo $prescription_data["cyl_r_dist"]; ?></td>
                                        <td class="text-center prescriptablebordercolor border-1"><?php echo $prescription_data["axis_r_dist"]; ?></td>
                                        <td class="text-center prescriptablebordercolor border-1"><?php echo $prescription_data["sph_l_dist"]; ?></td>
                                        <td class="text-center prescriptablebordercolor border-1"><?php echo $prescription_data["cyl_l_dist"]; ?></td>
                                        <td class="text-center prescriptablebordercolor border-1"><?php echo $prescription_data["axis_l_dist"]; ?></td>
                                    </tr>
                                    <tr style="font-size: 15px;border-color: #0E097D;">
                                        <td class="text-center fw-bold tbltxt" style="font-size: 12px;width: 40px;">Near</td>
                                        <td class="text-center prescriptablebordercolor border-1"><?php echo $prescription_data["sph_r_near"]; ?></td>
                                        <td class="text-center prescriptablebordercolor border-1"><?php echo $prescription_data["cyl_r_near"]; ?></td>
                                        <td class="text-center prescriptablebordercolor border-1"><?php echo $prescription_data["axis_r_near"]; ?></td>
                                        <td class="text-center prescriptablebordercolor border-1"><?php echo $prescription_data["sph_l_near"]; ?></td>
                                        <td class="text-center prescriptablebordercolor border-1"><?php echo $prescription_data["cyl_l_near"]; ?></td>
                                        <td class="text-center prescriptablebordercolor border-1"><?php echo $prescription_data["axis_l_near"]; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-0" style="font-size: 12px;">
                        <div class="row">
                            <div class="col-6 ">
                                <div class="row">
                                    <div class="col-3">
                                        <label class="form-label mx-3 fw-bold mt-3">VA</label>
                                    </div>
                                    <div class="col-9">
                                        <label class="form-label fw-bold">R:&nbsp;</label>
                                        <label class="form-label"><?php echo $prescription_data["va_r"]; ?></label><br />
                                        <label class="form-label fw-bold">L:&nbsp;</label>
                                        <label class="form-label"><?php echo $prescription_data["va_l"]; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-3">
                                        <label class="form-label mx-3 fw-bold mt-3">PH</label>
                                    </div>
                                    <div class="col-9">
                                        <label class="form-label fw-bold">R:&nbsp;</label>
                                        <label class="form-label"><?php echo $prescription_data["ph_r"]; ?></label><br />
                                        <label class="form-label fw-bold">L:&nbsp;</label>
                                        <label class="form-label"><?php echo $prescription_data["ph_l"]; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" style="font-size: 12px;">
                        <div class="row">
                            <div class="col-3"><label class="form-label fw-bold text-decoration-underline">HBL</label></div>
                        </div>
                        <div class="row px-1">
                            <div class="col-6">
                                <label class="form-label fw-bold">R/&nbsp;</label>
                                <label class="form-label"><?php echo $prescription_data["hbl_r"]; ?></label>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">L/&nbsp;</label>
                                <label class="form-label"><?php echo $prescription_data["hbl_l"]; ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" style="font-size: 12px;">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label fw-bold">PD &nbsp;</label>
                                <label class="form-label  mx-3"><?php echo $prescription_data["pd"]; ?></label>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">SH &nbsp;</label>
                                <label class="form-label  mx-3"><?php echo $prescription_data["sh"]; ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" style="font-size: 12px;">
                        <div class="row">
                            <label class="form-label fw-bold">Remarks:</label>
                            <label class="form-label mx-3"><?php echo $prescription_data["remark"]; ?></label>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="row">
                            <div class="col-7">
                                <div class="row">
                                    <div class="col-3"><label class="form-label fw-bold" style="font-size: 12px;">Name:</label></div>
                                    <div class="col-9"><label class="form-label" style="font-size: 12px;"><?php echo $prescription_data["name"]; ?></label></div>
                                </div>
                            </div>

                            <?php
                            $date = date('Y-m-d');
                            ?>
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-3"><label class="form-label fw-bold" style="font-size: 12px;">Date:</label></div>
                                    <div class="col-9"><label class="form-label" style="font-size: 12px;"><?php echo $prescription_data["date"]; ?></label></div>
                                </div>
                            </div>

                            <div class="col-7">

                                <label class="form-label fw-bold" style="font-size: 12px;">Occupation:</label>
                                <label class="form-label" style="font-size: 12px;"><?php echo $prescription_data["occupation"]; ?></label>

                            </div>

                            <div class="col-5">
                                <div class="row">
                                    <div class="col-3"><label class="form-label fw-bold" style="font-size: 12px;">Age:</label></div>
                                    <div class="col-9"><label class="form-label" style="font-size: 12px;"><?php echo $prescription_data["age"]; ?></label></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>