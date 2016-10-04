<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saleproject";
session_start();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$_SESSION["username"] = "Anthony";

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

<h1 id = "title"><span id="sale">Sale</span><span id="project">Project</span></h1>


<h2 id = "hellouser">Hi, <?php echo $_SESSION["username"]; ?> !</h2>
<h2 id = "logout">logout</h3><br>

<table id = "catalog">
	<tr>
		<td class = "blue"><a href="catalog.php" id ="bluelink">catalog</a></td>
		<td class = "nobg"><a href="yourproduct.php">your product</a></td>
		<td class = "nobg"><a href="addproduct.php">add product</a></td>
		<td class = "nobg"><a href="sales.php">sales</a></td>
		<td class = "nobg"><a href="purchases.php">purchases</a></td>
	</tr>
</table>
<p id = "SubHeader">What are you going to buy today?</p>
<hr>
<p> insert search engine here</p>

<?php
	$query = "SELECT username,product_description,product_price,likes,purchase,product_datetime,product_name,imgsrc from product";
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
				<td colspan = '2'> " . $row["likes"] . " likes </td>
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
				<td class = 'small likebuy like'> like </td>
				<td class = 'small likebuy buy'> buy </td>
			</tr>
			</table>
			<br>
			<hr>
				"
			;
		}
		
	}?>
</body>
</html>