<?php

$date = $_POST["date"];

require "connection.php";

if (empty($date)) {
    echo "Please enter Date.";
} else {

    date_default_timezone_set("Asia/Colombo");
    $month = date("m", strtotime($date));
    $year = date("Y", strtotime($date));

    $d_income_rs = Database::search("SELECT SUM(`payments`.`amount`) FROM `payments` JOIN `invoice` ON `payments`.`invoice_id`=`invoice`.`id` WHERE `invoice`.`status_id`='1' AND  YEAR(`payments`.`date`) = '" . $year . "' AND MONTH(`payments`.`date`) = '" . $month . "' ORDER BY `payments`.`date` ASC");
    $d_income_num = $d_income_rs->num_rows;

    $d_income_data = $d_income_rs->fetch_assoc();


?>

    <div class="col-12 g-4">
        <div class="card itemcard " aria-hidden="true">
            <!-- <img src="res/thumbnail.png" class="card-img-top img-fluid primg mt-4" alt="..." onclick="" style="cursor: pointer;" title="Click To View"> -->
            <div class="card-body text-center">
                <div class="mt-5 mb-4">
                    <h5 class="card-title col-12">
                        <div class="row">
                            <div class="col-12 ovf1 fw-bold text-success">
                                <span><?php echo $date ?> - Income</span>
                            </div>
                        </div>
                    </h5>
                    <p class="card-text placeholder-glow">
                    </p>

                    <span class="col-12">Rs. <?php echo $d_income_data["SUM(`payments`.`amount`)"]; ?> .00</span><br>
                </div>
                <!-- <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="">Add To Cart</a> -->
            </div>
        </div>
    </div>

<?php
}
