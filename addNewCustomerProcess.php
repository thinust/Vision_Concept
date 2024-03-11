<?php

session_start();

require "connection.php";

$name = $_POST["name"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$dob = $_POST["dob"];

// $iUniqueNumber = crc32(uniqid());
$milliseconds = date_create()->format('Uv');

date_default_timezone_set("Asia/Colombo");
$datetime = date("Y-m-d h:i:s");

if (empty($name)) {
    echo "Please enter Name.";
} else if (empty($address)) {
    echo "Please enter Address.";
} else if (empty($phone)) {
    echo "Please enter Phone No.";
} else if (empty($dob)) {
    Database::iud("INSERT INTO `customer` (`id`,`name`,`address`,`dob`,`mobile`,`datetime`) VALUES ('" . $milliseconds . "','" . $name . "','" . $address . "','1000-10-10','" . $phone . "','" . $datetime . "')");
    echo "Success";
} else {
    Database::iud("INSERT INTO `customer` (`id`,`name`,`address`,`dob`,`mobile`,`datetime`) VALUES ('" . $milliseconds . "','" . $name . "','" . $address . "','" . $dob . "','" . $phone . "','" . $datetime . "')");

    echo "Success";
}
