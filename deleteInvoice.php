<?php
require "connection.php";

$invid = $_GET["invid"];

Database::iud("UPDATE `invoice` SET `status_id`='0' WHERE `id`='" . $invid . "'");

echo "success";
