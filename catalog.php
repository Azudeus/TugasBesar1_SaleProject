<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saleproject";
session_start();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$_SESSION["username"] = "Anthony";

$tab = "catalog";


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<script>
	var user_id = "<?php echo "$_SESSION[username]"?>";
</script>
<script src="script/like.js"></script>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php include "header.php"; ?>

<p id = "SubHeader">What are you going to buy today?</p>
<hr>
<p> insert search engine here</p>

<?php
	$query = "SELECT product_id,username,product_description,product_price,likes,purchase,product_datetime,product_name,imgsrc from product";
	$q_result = $conn->query($query);
	
	if($q_result-> num_rows > 0){
		//output data of each row from database
		while($row = $q_result-> fetch_assoc()){
			$phpdate = strtotime($row["product_datetime"]);
			$mysqldate1 = date('l, d F Y',$phpdate);
			$mysqldate2 = date('H i',$phpdate);
			echo "<p id = 'product'><b>". $row["username"] .
			"</b> <br> added this on ". $mysqldate1 .", at ". $mysqldate2 ."<br><hr>".
			"<table class = 'producttable'>
			<tr> 
				<td rowspan = '5' class = 'left' width = 128px> <img src = 'img/" . $row["imgsrc"] . ".JPG' style = 'width:128px;height:128px;' > </td>
				<td colspan = '2' class = 'left'> <span id = 'itemname'>" . $row["product_name"] . "</span> </td>
			</tr>
			<tr>
				<td> <span id = 'price'> IDR " . $row["product_price"] . "</span> </td>
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
				<td class = 'likebuy'> <a class ='bluelink' product_id=". $row["product_id"] . "  href='javascript:void(0)' onclick = 'like(this)' >like</a></td>
				<td class = 'likebuy'> <a href='confirmbuy.php?product_id=" .$row["product_id"]."' class = 'greenlink'> buy</td>
			</tr>
			</table>
			<br>
			<hr>";
		}
		
	}?>
</body>
</html>