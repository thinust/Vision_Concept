<?php

require "connection.php";

$qty = $_POST["qty"];
$desc = $_POST["desc"];
$rate = $_POST["rate"];
$iuid = $_POST["iuid"];

Database::iud("INSERT INTO `invoice_item` (`invoice_id`,`qty`,`description`,`rate`) VALUES ('" . $iuid . "','" . $qty . "','" . $desc . "','" . $rate . "')");

echo "Success";
