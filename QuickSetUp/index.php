<?php
$servername = "localhost";
$username = "QuickSetUp";
$password = "qui20210101!";
$dbname = "quicksetup";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM program_info WHERE verification='1' ORDER BY download_count";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-4.5.3/css/bootstrap.min.css">
    <title>Quick Set Up</title>
    <style>
        .i{
            position: absolute;
            opacity: 1;
        }
    </style>
</head>
<body>
    <?php include "header.php";?>

    <?php include "main.php";?>
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
</body>
</html>