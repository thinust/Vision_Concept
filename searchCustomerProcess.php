<?php


require "connection.php";

$dob = $_POST["dob"];

if (empty($dob)) {
    echo "Please enter Birthday.";
} else {


?>

    <table class="table table-bordered border-dark">
        <thead>
            <tr class="border border-0 border-dark fs-4">
                <th class="text-center border-dark border border-1" style="width: 300px;">Name</th>
                <th class="text-center border-dark border border-1" style="width: 300px;">Address</th>
                <th class="text-center border-dark border border-1" style="width: 150px;">Birthday</th>
                <th class="text-center border-dark border border-1" style="width: 150px;">Mobile</th>
                <th class="text-center border-dark border border-0"></th>
            </tr>
        </thead>
        <tbody>


            <?php

            $customer_rs = Database::search("SELECT * FROM `customer` WHERE `dob` = '" . $dob . "'");
            $customer_num = $customer_rs->num_rows;

            for ($i = 0; $i <  $customer_num; $i++) {

                $customer_data = $customer_rs->fetch_assoc();

            ?>
                <tr>
                    <td class="text-center pt-3 text-dark"><?php echo $customer_data['name']; ?></td>
                    <td class="text-center pt-3 text-dark"><?php echo $customer_data['address']; ?></td>
                    <td class="text-center pt-3 text-dark"><?php echo $customer_data['dob']; ?></td>
                    <td class="text-center pt-3 text-dark"><?php echo $customer_data['mobile']; ?></td>
                    <td class="text-center pt-3">
                        <button class="btn btn-dark border-0" style="background:  #7f0eb4;" onclick="viewCustomer(<?php echo $customer_data['id']; ?>)">View</button>
                    </td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>

<?php
}
