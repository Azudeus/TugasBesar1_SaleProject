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
<?php include "header.php"; ?>
<script src="script/buy.js"></script>

<p id = "SubHeader">Here are your sales</p>
<hr>

<?php
	$query = "select purchase_id,product_name,product_price,quantity,account.username,consignee,full_address,postal_code,phone_number,purchase_datetime,imgsrc from purchases,account,product where purchases.account_id = account.account_id and purchases.product_id = product.product_id and product.product_id='$account_id'";
	$q_result = $conn->query($query);

if ($q_result-> num_rows > 0) {
	while($row = $q_result-> fetch_assoc()) {
		$phpdate = strtotime($row["purchase_datetime"]);
		$mysqldate1 = date('l, d F Y',$phpdate);
		$mysqldate2 = date('H i',$phpdate);

		echo "<p id='product'><b>".$mysqldate1."</b><br>"
		.$mysqldate2."<hr>".
		"<table class='producttable'>
			<tr>
				<td rowspan = '5' class = 'left' width =20%> <img src = 'img/" . $row["imgsrc"] . ".JPG' style = 'width:128px;height:128px;' > </td>
				<td  width = 40% class = 'font20'> <b>".$row["product_name"]."</b></td>
				<td  width = 40% class = 'font16'> Delivery to <b>".$row["consignee"]."</b></td>
			</tr>
			<tr>
				<td width = 40% class = 'font20'>  <span class = 'font20' id = 'total_price_".$row['purchase_id']."'></span><script>writeTotalPrice(".$row['product_price'] * $row['quantity'].",".$row['purchase_id'].")</script></td>
				<td width = 40% class = 'font16' rowspan = '2'>" .$row["full_address"]."</td>
			</tr>
			<tr>
				<td width = 40% class = 'font20'>" .$row["quantity"] . " pcs</td>
				
			</tr>
			<tr>
				<td width = 40% class = 'font20'>@<span id = 'price_".$row['purchase_id']."'></span><script>writePrice(".$row['product_price'].",".$row['purchase_id'].")</script></td>
				<td width = 40% class = 'font16'>" .$row["postal_code"]."</td>
				
			</tr>
			<tr>
				<td width = 40%></td>
				<td width = 40% class = 'font16'>" .$row["phone_number"]."</td>
			<tr>
				<td></td>
				<td><p id='product'>bought by <b>" .$row["username"] . "</b></p></td>
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