<?php

require "connection.php";

$invoid = $_GET["invoid"];

$total = $_POST["total"];
$payableamount = $_POST["payableamount"];
$cash = $_POST["cash"];
$card = $_POST["card"];
$paymentType = $_POST["paymentType"];

date_default_timezone_set("Asia/Colombo");
$datetime = date("Y-m-d h:i:s");

Database::iud("UPDATE `invoice` SET `payment_status_id`='1',`payment`='" . $total . "',`payment_complete_date`='" . $datetime . "' WHERE `id`='" . $invoid . "'");

if ($paymentType == 3) {

    Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`cash_payments`,`card_payments`,`b_transfer_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $invoid . "','" . $payableamount . "','" . $cash . "','" . $card . "','" . $payableamount . "','" . $paymentType . "')");
} else if ($paymentType == 1) {
    Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`cash_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $invoid . "','" . $payableamount . "','" . $payableamount . "','" . $paymentType . "')");
} else if ($paymentType == 2) {
    Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`card_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $invoid . "','" . $payableamount . "','" . $payableamount . "','" . $paymentType . "')");
} else {
    Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`cash_payments`,`card_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $invoid . "','" . $payableamount . "','" . $cash . "','" . $card . "','" . $paymentType . "')");
}

// Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`cash_payments`,`card_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $invoid . "','" . $payableamount . "','" . $cash . "','" . $card . "','" . $paymentType . "')");


echo "success";
