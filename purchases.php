<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "saleproject";
    session_start();
    // Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$account_id = $_GET["account_id"];
	$tab = "purchases";

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


<p id = "SubHeader">Here are your purchases</p>
<hr>
<br>
<script src="script/buy.js"></script>

<?php

	$query = "SELECT p.*,product_price,product_name,imgsrc,username from purchases as p, product as pr where account_id = ".$account_id." and p.product_id = pr.product_id";
	$q_result = $conn->query($query);
	
	if($q_result-> num_rows > 0){
		
		//output data of each row from database
		while($row = $q_result-> fetch_assoc()){
			$phpdate = strtotime($row["purchase_datetime"]);
			$mysqldate1 = date('l, d F Y',$phpdate);
			$mysqldate2 = date('H.i',$phpdate);
			$product_id = $row["product_id"];
			
			echo "<b>".$mysqldate1."</b><br>".$mysqldate2."<br><hr>";
			echo"
			<table class ='producttable'>
				<tr>
					<td rowspan = '5' width = 20%;><img src = 'img/" . $row["imgsrc"] . ".JPG' style = 'width:128px;height:128px;'></td>
					<td width = 40% class = 'font20' ><b> ". $row['product_name']."</b></td>
					<td width = 40% class = 'font16 top'>Delivery to <b>". $row['consignee'] . " </b></td>
				</tr>
					<td width = 40%> <span class = 'font20' id = 'total_price_".$row['purchase_id']."'></span><script>writeTotalPrice(".$row['product_price'] * $row['quantity'].",".$row['purchase_id'].")</script></td>
					<td width = 40% class = 'font16 top' rowspan = 2>".$row['full_address']. " </td>
				<tr>
					<td class = 'font20'>".$row['quantity']." pcs</td>
				</tr>
					<td width = 40% class = 'font20'>@<span id = 'price_".$row['purchase_id']."'></span><script>writePrice(".$row['product_price'].",".$row['purchase_id'].")</script></td>
					<td width = 40% class = 'font16 top'> ".$row['postal_code']."</td>
				<tr>
					<td width = 40%></td>
					<td width = 40% class = 'font16 top' >".$row['phone_number']."</td>
				</tr>
				
				<tr>
					<td width 20%></td>
					<td class = 'font18 top'>bought from <b>".$row['username']."</b></td>
				</tr>
				
				<tr height = 120 px;>
				</tr>
				
			</table>
			<br><br>";
			
			
		}
		
	}?>

</body>
</html>