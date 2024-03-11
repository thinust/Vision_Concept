<?php

require "connection.php";

$custid = $_POST["custid"];
$iuid = $_POST["iuid"];
$advance = $_POST["advance"];
$discount = $_POST["discount"];
$amount = $_POST["amount"];
$paymentOption = $_POST["paymentOption"];
$paymentType = $_POST["paymentType"];
$card = $_POST["card"];
$cash = $_POST["cash"];
$datetime = $_POST["date"];

if ($paymentOption == 0) {
    echo "Please Select Payment Option";
} else {

    $afterDiscount = $amount - $discount;

    // date_default_timezone_set("Asia/Colombo");
    // $datetime = date("Y-m-d h:i:s");

    if ($paymentOption == 1) {
        Database::iud("INSERT INTO `invoice` (`id`,`date`,`customer_id`,`payment`,`price`,`discount`,`payment_status_id`,`payment_complete_date`,`status_id`) VALUES ('" . $iuid . "','" . $datetime . "','" . $custid . "','" . $afterDiscount . "','" . $afterDiscount . "','" . $discount . "','" . $paymentOption . "','" . $datetime . "','1')");
        // Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`payment_type_id`) VALUES ('" . $datetime . "','" . $iuid . "','" . $afterDiscount . "','" . $paymentType . "')");

        if ($paymentType == 3) {

            Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`cash_payments`,`card_payments`,`b_transfer_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $iuid . "','" . $afterDiscount . "','0','0','" . $afterDiscount . "','" . $paymentType . "')");
        } else if ($paymentType == 1) {
            Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`cash_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $iuid . "','" . $afterDiscount . "','" . $afterDiscount . "','" . $paymentType . "')");
        } else if ($paymentType == 2) {
            Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`card_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $iuid . "','" . $afterDiscount . "','" . $afterDiscount . "','" . $paymentType . "')");
        } else if ($paymentType == 4) {
            Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`cash_payments`,`card_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $iuid . "','" . $afterDiscount . "','" . $cash . "','" . $card . "','" . $paymentType . "')");
        }
    } else {

        Database::iud("INSERT INTO `invoice` (`id`,`date`,`customer_id`,`payment`,`price`,`discount`,`payment_status_id`,`status_id`) VALUES ('" . $iuid . "','" . $datetime . "','" . $custid . "','" . $advance . "','" . $afterDiscount . "','" . $discount . "','" . $paymentOption . "','1')");

        if ($paymentType == 3) {

            Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`cash_payments`,`card_payments`,`b_transfer_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $iuid . "','" . $advance . "','0','0','" . $advance . "','" . $paymentType . "')");
        } else if ($paymentType == 1) {
            Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`cash_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $iuid . "','" . $advance . "','" . $advance . "','" . $paymentType . "')");
        } else if ($paymentType == 2) {
            Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`card_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $iuid . "','" . $advance . "','" . $advance . "','" . $paymentType . "')");
        } else if ($paymentType == 4) {
            Database::iud("INSERT INTO `payments` (`date`,`invoice_id`,`amount`,`cash_payments`,`card_payments`,`payment_type_id`) VALUES ('" . $datetime . "','" . $iuid . "','" . $advance . "','" . $cash . "','" . $card . "','" . $paymentType . "')");
        }
    }

    echo "Success";
}
