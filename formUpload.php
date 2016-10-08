<?php
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SaleProject";
    session_start();
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //$_SESSION["username"] = "rellons";
    $activeuser = $_POST["account_username"];
    // Check connection
    if (!$conn) {
        echo "Connection failed: " + mysqli_connect_error();
    }
	$account_id = $_POST ["account_id"];

//inspired by w3schools.com

    $productname = $_POST["name"];
    $proddesc = $_POST["description"];
    $prodprice = $_POST["price"];
    $target_dir = "img/";
	$file_db = basename($_FILES["photochoose"]["name"]);
    $target_file = $target_dir.basename($_FILES["photochoose"]["name"]);
    $uploadOk = 1;
    
  $prodquery = "INSERT INTO product(username,product_description,product_price,product_name,imgsrc)
					VALUES ('".$activeuser."','".$proddesc."',".$prodprice.",'".$productname."','".$file_db."');";
	if ($conn->query($prodquery)) {
		echo "Success";
	} else {
		echo "Connection failed: " + mysqli_connect_error();
	}	
	
    if (!file_exists($target_file)) {
        move_uploaded_file($_FILES["photochoose"]["tmp_name"], $target_file);
    }    
	
	echo "<script> document.location.href = 'catalog.php?account_id='+".$account_id.";</script>";	


?>