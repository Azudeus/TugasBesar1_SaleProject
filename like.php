<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saleproject";
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
	
	$sql = "INSERT INTO likes(product_id, account_id) VALUES (" .$_GET["product_id"]. ",".$_GET["account_id"].");";
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
}	
else if($_GET["operation"] == "min"){
	$sql = "UPDATE product SET likes = likes - 1 WHERE product_id=".$_GET["product_id"].";";
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	
	$sql = "DELETE FROM likes where product_id = ".$_GET["product_id"]." and account_id =".$_GET["account_id"]." ;";
		if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

}
	

?>


