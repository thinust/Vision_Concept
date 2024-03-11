<?php


require "connection.php";

$usname = $_POST["usname"];
$psw = $_POST["psw"];

if (empty($usname)) {
    echo "Please enter your Username.";
} else if (empty($psw)) {
    echo "Please enter your password";
} elseif (strlen($psw) < 5 || strlen($psw) > 20) {
    echo "Invalid Password.";
} else {

    $user_rs = Database::search("SELECT * FROM `user` WHERE `username` = '" . $usname . "' AND `password` = '" . $psw . "'");

    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {

        echo "Success";
    } else {
        echo "Invalid Username & Password";
    }
}
