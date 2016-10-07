<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saleproject";
session_start();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_GET["operation"] == "add"){
	$sql = "UPDATE product SET likes = likes + 1 WHERE product_id=".$_GET["product_id"].";";
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
		}
	}	
else	 if($_GET["operation"] == "min"){
	$sql = "UPDATE product SET likes = likes - 1 WHERE product_id=".$_GET["product_id"].";";
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;

	}
}
	

?>


