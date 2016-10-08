<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saleproject";

$tab = "catalog";
$account_id = $_POST['id'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$account_query = "SELECT username from account where account_id =".$account_id;
$account_query_result = $conn->query($account_query);
$account_query_assoc = $account_query_result->fetch_assoc();
$account_username = $account_query_assoc["username"];

?>
<script src="script/like.js"></script>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include "header.php"; ?>

<p id = "SubHeader">Search Result</p>
<hr>


<form name="search" action = "process_search.php" method ="POST">
<table border='0' width = '100%'>
	<tr>
		<td colspan="2"><div id="formField"><input type="text" name="key" id="formField" placeholder="Search catalog ..."></div></td>
		<td><div id="formField"><input type="submit" value="GO" class="button"></div></td>
	</tr>
	<tr>
		<td width="10%" rowspan="2">by</td>
		<td><input type="radio" name="type" value="product">product</td>
		<td width="10%"><input type="hidden" name="id" value=<?php echo htmlspecialchars($account_id);?>></td>
	</tr>
	</tr>
		<td><input type="radio" name="type" value="store">store</td>
</table>
</form>

<?php
if (isset($_POST['key']) && (isset($_POST['type']))) {
	$key = $_POST['key'];
	$type= $_POST['type'];

	if ($type == "product") {
		$query = "select product_id,username,product_description,product_price,likes,purchase,product_datetime,product_name,imgsrc from product where product_name like '%$key%'";
	} else {
		$query = "select product_id,username,product_description,product_price,likes,purchase,product_datetime,product_name,imgsrc from product where username like '%$key%'";
	}
	$check = mysqli_query($conn,$query);
	$checkrows = mysqli_num_rows($check);
	

	if ($checkrows>0) {
		$q_result = $conn->query($query);

		while($row = $q_result-> fetch_assoc()){
			$phpdate = strtotime($row["product_datetime"]);
			$mysqldate1 = date('l, d F Y',$phpdate);
			$mysqldate2 = date('H i',$phpdate);
			$query_checksame = $conn->query("SELECT EXISTS(SELECT * FROM likes where product_id =". $row["product_id"] ." and account_id =". $account_id.") as exist");
			$checksame_row = $query_checksame -> fetch_assoc();
			$checksame = $checksame_row["exist"];
			echo "<p id = 'product'><b>". $row["username"] .
			"</b> <br> added this on ". $mysqldate1 .", at ". $mysqldate2 ."<br><hr>".
			"<table class = 'producttable'>
			<tr> 
				<td rowspan = '5' width = 128px> <img src = 'img/" . $row["imgsrc"] . "' style = 'width:128px;height:128px;' > </td>
				<td colspan = '2' > <span id = 'itemname'>" . $row["product_name"] . "</span> </td>
			</tr>
			<tr>
				<td> <span id = 'price_".$row['product_id']."'></span><script>writePrice(".$row['product_price'].",".$row['product_id'].")</script> </td>
				<td colspan = '2' class ='like_count_" .$row["product_id"]. "	'>"  . $row["likes"] . " likes </td>
			</tr>
			<tr> 
				<td> ". $row["product_description"] . "</td>
				<td colspan = '2'> ". $row["purchase"] ." purchase </td>
			</tr>
			<tr height = 22>
				<!-- dummy -->
				<td colspan = '3'></td>
			</tr>
			
			<tr>
				<td></td>
				<td class = 'likebuy'> <a id = 'like_".$row["product_id"]."' class ='bluelink' account_id=".$account_id." product_id=". $row["product_id"] . "  href='javascript:void(0)' onclick = 'like(this)' >like</a></td>
				<td class = 'likebuy'> <a href='confirmbuy.php?product_id=" .$row["product_id"]."&account_id=".$account_id."' class = 'greenlink'> buy</td>
			</tr>
			</table>
			<br>
			<hr>
			<script>update(".$row["product_id"].",". $checksame . ")</script>
			";
		}
	} else {
		echo "Search not found";
	}
} else {
	header ("Location:catalog.php?account_id=".$account_id);
}
?>


</body>
</html>