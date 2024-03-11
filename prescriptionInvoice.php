<?php
require "connection.php";

$prid = $_GET["prid"];

Database::iud("UPDATE `prescription` SET `status_id`='0' WHERE `id`='" . $prid . "'");

echo "success";
