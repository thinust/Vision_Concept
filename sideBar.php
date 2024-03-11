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
        <a href="customers.php">Customer Details</a>
        <a href="income.php">Income</a>
        <button class="btn btn-light mx-3 fs-5 mt-4" onclick="signOut();">Sign Out</button>
        <button class="btn btn-success mx-3 fs-5 mt-4 " onclick="backupdb();">Backup Databse&nbsp;&nbsp;&nbsp;<i class="bi bi-cloud-arrow-up-fill"></i></button>
    </div>
    <script src="script.js"></script>
</body>

</html>