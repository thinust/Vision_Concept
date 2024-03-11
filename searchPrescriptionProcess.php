<?php

require "connection.php";

$id = $_POST["id"];
$date = $_POST["date"];

// echo $date;

?>

<table class="table table-bordered  border-dark">
    <thead>
        <tr class="border border-0 border-dark fs-4">
            <th class="text-center border-dark border border-2" style="width: 250px;">Prescription No</th>
            <th class="text-center border-dark border border-2" style="width: 200px;">Date</th>
            <th class="text-center border-dark border border-0" style="width: 100px;"></th>
        </tr>
    </thead>
    <tbody>


        <?php

        $prescription_rs = Database::search("SELECT * FROM `prescription` WHERE `customer_id`='" . $id . "' AND `date`='" . $date . "' ORDER BY `date` ASC");
        $prescription_num = $prescription_rs->num_rows;

        for ($i = 0; $i <  $prescription_num; $i++) {

            $prescription_data = $prescription_rs->fetch_assoc();

        ?>
            <tr>
                <td class="text-center pt-3 border-dark border border-2 text-dark"><?php echo $prescription_data['id']; ?></td>
                <td class="text-center pt-3 border-dark border border-2 text-dark"><?php echo $prescription_data['date']; ?></td>
                <td class="text-center pt-3 border-dark border border-2">
                    <button class="btn btn-dark border-0" style="background:  #7f0eb4;" onclick="viewPrescription   (<?php echo $prescription_data['id']; ?>)">View</button>
                </td>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>