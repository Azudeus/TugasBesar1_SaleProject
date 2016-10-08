<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saleproject";

if (isset($_POST['username'])) {
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection Failed: " . $conn -> connect_error);
	}

	$username = $_POST['username'];
	$name = $_POST['name'];
	$desc = $_POST['description'];
	$price = $_POST['price'];

	echo $name;
	echo $desc;
	echo $price;

	$check = mysqli_query($conn,"select * from product where username='$username'");
	$checkrows = mysqli_num_rows($check);

	if ($checkrows>0){		
		mysqli_query($conn,"UPDATE product set product_description='$desc',product_name='$name',product_price=$price where username='$username'");
		$query = "select * from product,account where account.username=product.username AND account.username='$username'";
		$q_result = $conn->query($query);

		while($row = $q_result-> fetch_assoc()) {
			$id = $row["account_id"];
		}
		echo "succeed";
		header ("Location:yourproduct.php?account_id=".$id);
	} else {
		echo "no username";
	}
};
?>