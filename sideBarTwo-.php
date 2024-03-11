<?php
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
   

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="bootstrap.css"> -->
    <link rel="stylesheet" href="sideBar.css">
</head>

<body>
    <div class="sidebar">
        <br>
        <br>
        <br>
        <h1>Vision Concept</h1>
        <a href="home.php">Home</a>
        <a href="addNewCustomer.php">Add New Customer</a>
        <a href="customers.php">Search Customers</a>
        <a href='"invoice.php?id="+id'>New Invoice</a>
        <a href="">New Prescription</a>
        <button class="btn btn-light mx-3 fs-5" onclick="signOut();">Sign Out</button>
    </div>
    <script src="script.js"></script>
</body>

</html>