<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saleproject";
session_start();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$_SESSION["username"] = "Anthony";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php include "header.php"?>

</body>