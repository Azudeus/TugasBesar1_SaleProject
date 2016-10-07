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
	$email = $_POST['email'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$postal = $_POST['postal'];
	$number = $_POST['number'];

	$check = mysqli_query($conn,"select * from account where username='$username' and email='$email'");
	$checkrows = mysqli_num_rows($check);

	if ($checkrows>0){
		echo "customer exists";
		echo "<p>Employee NOT added</p>";
		echo mysqli_error($conn);
	} else {
		mysqli_query($conn,"INSERT INTO account(username,email,password,name,address,postal,number) values ('$username','$email','$password','$name','$address','$postal','$number')");
		$query = "select * from account where username='$username' and password='$password'";
		$q_result = $conn->query($query);

		while($row = $q_result-> fetch_assoc()) {
			$id = $row["account_id"];
		}

		header ("Location:catalog.php?account_id=".$id);
	}
};
?>