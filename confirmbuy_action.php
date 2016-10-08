
<?php 
	$quantity = $_GET["quantity"];
	$consignee = $_GET["consignee"];
	$full_address = $_GET["full_address"];
	$postal_code = $_GET["postal_code"];
	$phone_number = $_GET["phone_number"];
	$credit_number = $_GET["credit_number"];
	$credit_veri = $_GET["credit_veri"];
	$account_id = $_GET["account_id"];
	$product_id = $_GET["product_id"];
	
	
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "saleproject";
    session_start();
    // Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	$sql = "INSERT INTO purchases(product_id, account_id, consignee, full_address, postal_code, phone_number, credit_number, credit_veri,quantity)
		VALUES(". $product_id.",". $account_id.",'". $consignee ."','". $full_address ."','". $postal_code."','". $phone_number."','". $credit_number."',". $credit_veri.",". $quantity.")
		";
	$conn->query($sql);
	
	$sql = "UPDATE product SET purchase = purchase + 1 WHERE product_id =". $product_id. ";";
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	echo "<script> document.location.href = 'catalog.php?account_id='+".$account_id.";</script>";	


?>