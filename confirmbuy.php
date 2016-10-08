<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saleproject";
$tab = "confirmbuy";
session_start();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$account_id = $_GET["account_id"];

$account_query = "SELECT username from account where account_id =".$account_id;
$account_query_result = $conn->query($account_query);
$account_query_assoc = $account_query_result->fetch_assoc();
$account_username = $account_query_assoc["username"];


// Check connection
if (!$conn)
	die("Connection failed: " . mysqli_connect_error());
$product_id = $_GET["product_id"];
$query = "SELECT username,product_description,product_price,likes,purchase,product_datetime,product_name,imgsrc from product WHERE product_id =".$product_id.";";
$q_result = $conn->query($query);
$row = $q_result-> fetch_assoc();
?>
<script src="script/buy.js"></script>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php include "header.php"?>
<p id = "SubHeader">Please confirm your purchase</p>
<hr>
<br>
<form action="confirmbuy_action.php?" method="get" class = "inline" onsubmit ="return buyVerification()">
<pre><div class = 'font20 lineheight15'>
Product		: <?php echo $row["product_name"]?><br>
Price 		: <span id="price"></span><br><script>writePrice(<?php echo $row["product_price"] ?>)</script>
Quantity		: <input name="quantity" price =<?php echo $row["product_price"]?> type = "text" onkeyup ="buy(this)" class = "quantity" required> pcs<br>
Total Price 	: <span class = "total_price"> Please insert Quantity</span>	<br>
Deliver to		:
</div>
</pre>
<div class = 'font18'>
Consignee<br>
<input name="consignee" type="text" required class = "width100">
<br><br>
Full Address<br>
<input name="full_address" type="text" required class = "tworow width100">
<br><br>
Postal Code<br>
<input name="postal_code" type="text" required class = "width100">
<br><br>
Phone Number<br>
<input name="phone_number" type="text" required class = "width100">
<br><br>
12 Digits Credit Card Number
<input name="credit_number" type="text" required class = "width100">
<br><br>
3 Digits Card Verification Value
<input name="credit_veri" type="text" required class = "width100">
<input name="account_id" type="hidden" value = "<?php echo $account_id?>" >
<input name="product_id" type="hidden" value = "<?php echo $product_id?>" >

<br><br>
<div class = "right">
<br>
<input type = "submit" value="Submit" class = "button" >
<a href="catalog.php" class = "button"> Cancel </a></div>
</form>




</body>