<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saleproject";

session_start();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$account_id = $_GET["account_id"];
$tab = "sales";

$account_query = "SELECT username from account where account_id =".$account_id;
$account_query_result = $conn->query($account_query);
$account_query_assoc = $account_query_result->fetch_assoc();
$account_username = $account_query_assoc["username"];

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<p id = "SubHeader">Here are your sales</p>
<hr>

<?php
	$query = "SELECT product_id,username,product_price,quantity,product_name,imgsrc,address,postal,`number`,purchase_datetime from account,purchases,product where account.account_id = purchases.account_id AND purchases.product_id = product.product_id AND product.account_id=$account_id";
	$q_result = $conn->query($query);

if ($q_result-> num_rows > 0) {
	while($row = $q_result-> fetch_assoc()) {
		$phpdate = strtotime($row["purchase_datetime"]);
		$mysqldate1 = date('l, d F Y',$phpdate);
		$mysqldate2 = date('H i',$phpdate);

		echo "<p id="product"><b>$mysqldate1</b><br>".
		"at".$mysqldate2."<br><hr>".
		"<table class='producttable'>
			<tr>
				<td rowspan = '5' class = 'left' width = 128px> <img src = 'img/" . $row["imgsrc"] . ".JPG' style = 'width:128px;height:128px;' > </td>
				<td colspan = '2' class = 'left'> <span id = 'itemname'>" . $row["product_name"] . "</span> </td>
				<td colspan = '2' class = 'left'> Delivery to <b>".$row["username"]."</b></td>
			</tr>
			<tr>
				<td colspan = '2'> <span id = 'price'>IDR " . $row["product_price"]*$row["quantity"] . "</span> </td>
				<td colspan = '2'>" .$row["address"]"</td>
			</tr>
			<tr>
				<td colspan = '2'>" .$row["quantity"] . " pcs</td>
				<td colspan = '2'>" .$row["postal"]"</td>
			</tr>
			<tr>
				<td colspan = '2'><span id = 'price'>@IDR " .$row["product_price"] . "</td>
				<td colspan = '2'>" .$row["number"]"</td>
			</tr>
			<tr>
				<td colspan = '2'><p id="product">bought by<b>" .$row["username"]"</td>
			</tr>
		</table>
		<br>";
	}
}
?>
</body>
</html>

		

</body>
</html>