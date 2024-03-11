<?php

require "connection.php";

$id = $_POST["id"];
$invodate = $_POST["invodate"];

?>
<table>
    <thead>
        <tr class="border border-0 border-dark fs-4">
            <th class="text-center border-dark border border-2" style="width: 250px;">Invoice No</th>
            <th class="text-center border-dark border border-2" style="width: 200px;">Date</th>
            <th class="text-center border-dark border border-0" style="width: 100px;"></th>
        </tr>
    </thead>
    <tbody>


        <?php
        date_default_timezone_set("Asia/Colombo");
        $date = date('Y-m-d');
        $day = date("d", strtotime($invodate));
        $month = date("m", strtotime($invodate));
        $year = date("Y", strtotime($invodate));

        $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `customer_id`='" . $id . "' AND MONTH(`date`) = '" . $month . "'
    AND DAY(`date`) = '" . $day . "'
    AND YEAR(`date`) = '" . $year . "' ORDER BY `date` ASC");
        $invoice_num = $invoice_rs->num_rows;

        for ($i = 0; $i <  $invoice_num; $i++) {

            $invoice_data = $invoice_rs->fetch_assoc();

        ?>
            <tr>
                <td class="text-center pt-3 border-dark border border-2 text-dark"><?php echo $invoice_data['id']; ?></td>
                <td class="text-center pt-3 border-dark border border-2 text-dark"><?php echo $invoice_data['date']; ?></td>
                <td class="text-center pt-3 border-dark border border-2">
                    <button class="btn btn-dark border-0" style="background:  #7f0eb4;" onclick="viewInvoice(<?php echo $id; ?>,<?php echo $invoice_data['id']; ?>)">View</button>
                </td>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>