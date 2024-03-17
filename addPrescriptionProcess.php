<?php

require "connection.php";

$id = $_GET["id"];
$pid = $_POST["pid"];
$name = $_POST["name"];
$date = $_POST["date"];
$age = $_POST["age"];
$occupation = $_POST["occupation"];
$va_r = $_POST["va_r"];
$va_l = $_POST["va_l"];
$ph_r = $_POST["ph_r"];
$ph_l = $_POST["ph_l"];
$sph_r_dist = $_POST["sph_r_dist"];
$cyl_r_dist = $_POST["cyl_r_dist"];
$axis_r_dist = $_POST["axis_r_dist"];
$sph_r_near = $_POST["sph_r_near"];
$cyl_r_near = $_POST["cyl_r_near"];
$axis_r_near = $_POST["axis_r_near"];
$sph_l_dist = $_POST["sph_l_dist"];
$cyl_l_dist = $_POST["cyl_l_dist"];
$axis_l_dist = $_POST["axis_l_dist"];
$sph_l_near = $_POST["sph_l_near"];
$cyl_l_near = $_POST["cyl_l_near"];
$axis_l_near = $_POST["axis_l_near"];
$hbl_r = $_POST["hbl_r"];
$hbl_l = $_POST["hbl_l"];
$remarks = $_POST["remarks"];
$pd = $_POST["pd"];
$sh = $_POST["sh"];

// echo "id".$pid;
// echo "<br/>name".$name;
// echo "<br/>date".$date;
// echo "<br/>age".$age;
// echo "<br/>occupation".$occupation;
// echo "<br/>va_r".$va_r;
// echo "<br/>va_l".$va_l;
// echo "<br/>ph_r".$ph_r;
// echo "<br/>ph_l".$ph_l;
// echo "<br/>sph_r_dist".$sph_r_dist;
// echo "<br/>cyl_r_dist".$cyl_r_dist;
// echo "<br/>axis_r_dist".$axis_r_dist;
// echo "<br/>sph_r_near".$sph_r_near;
// echo "<br/>cyl_r_near".$cyl_r_near;
// echo "<br/>axis_r_near".$axis_r_near;
// echo "<br/>sph_l_dist".$sph_l_dist;
// echo "<br/>cyl_l_dist".$cyl_l_dist;
// echo "<br/>axis_l_dist".$axis_l_dist;
// echo "<br/>sph_l_near".$sph_l_near;
// echo "<br/>cyl_l_near".$cyl_l_near;
// echo "<br/>axis_l_near".$axis_l_near;
// echo "<br/>hbl_r".$hbl_r;
// echo "<br/>hbl_l".$hbl_l;
// echo "<br/>remarks".$remarks;
// echo "<br/>pd".$pd;
// echo "<br/>sh".$sh;

if (empty($name)) {
    echo "Please enter Name.";
} else if (empty($date)) {
    echo "Please enter Date.";
} else if (empty($age)) {
    echo "Please enter Age.";
} else {


    Database::iud("INSERT INTO `prescription` (`id`,`customer_id`,`age`,`date`,`occupation`,`va_r`,`va_l`,`ph_r`,`ph_l`,`sph_r_dist`,`cyl_r_dist`,`axis_r_dist`,`sph_r_near`,`cyl_r_near`,`axis_r_near`,`sph_l_dist`,`cyl_l_dist`,`axis_l_dist`,`sph_l_near`,`cyl_l_near`,`axis_l_near`,`hbl_r`,`hbl_l`,`remark`,`pd`,`sh`,`status_id`) VALUES 
                                                ('" . $pid . "','" . $id . "','" . $age . "','" . $date . "','" . $occupation . "','" . $va_r . "','" . $va_l . "','" . $ph_r . "','" . $ph_l . "','" . $sph_r_dist . "','" . $cyl_r_dist . "','" . $axis_r_dist . "','" . $sph_r_near . "','" . $cyl_r_near . "','" . $axis_r_near . "','" . $sph_l_dist . "','" . $cyl_l_dist . "','" . $axis_l_dist . "','" . $sph_l_near . "','" . $cyl_l_near . "','" . $axis_l_near . "','" . $hbl_r . "','" . $hbl_l . "','" . $remarks . "','" . $pd . "','" . $sh . "','1')");

    echo "Success";
}
