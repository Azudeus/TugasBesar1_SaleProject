<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saleproject";

if (isset($_GET['username'])) {
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection Failed: " . $conn -> connect_error);
	}


	$username = $_GET['username'];
	$password = $_GET['password'];

	$query = "select * from account where (username='$username' or email='$username') and password='$password'";
	$check = mysqli_query($conn,$query);
	$checkrows = mysqli_num_rows($check);
	$q_result = $conn->query($query);


	if ($checkrows>0){
		while($row = $q_result-> fetch_assoc()) {
			$id = $row["account_id"];
		}
		header ("Location:catalog.php?account_id=".$id);
	} else {
		echo "Account not found";	
		echo mysqli_error($conn);
	}
};
?>