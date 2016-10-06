<?php
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "saleproject";
    session_start();
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $_SESSION["username"] = "rellons";

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title> Your Product </title>
    <link rel="stylesheet" type="text/css" href="yourProduct.css">
</head>
<body>
<h1 id = "title"><span id="sale">Sale</span><span id="project">Project</span></h1>
<h2 id = "hellouser">Hi, <?php echo $_SESSION["username"]; ?> !</h2>
<h2 id = "logout">logout</h3><br>

<table id = "catalog">
	<tr>
		<td class = "nobg"><a href="catalog.php">catalog</a></td>
		<td class = "blue"><a href="yourproduct.php" id="bluelink">your product</a></td>
		<td class = "nobg"><a href="addproduct.php">add product</a></td>
		<td class = "nobg"><a href="sales.php">sales</a></td>
		<td class = "nobg"><a href="purchases.php">purchases</a></td>
	</tr>
</table>

</body>
<p id = "SubHeader">What are you going to sell today?</p>
<?php
	$query = "SELECT * FROM product WHERE username = '$_SESSION[username]'";
	$q_result = $conn->query($query);
	if($q_result-> num_rows > 0){
		//output data of each row from database
		while($row = $q_result-> fetch_assoc()){
			$phpdate = strtotime($row["product_datetime"]);
			$mysqldate1 = date('l, d F Y',$phpdate);
			$mysqldate2 = date('H.i',$phpdate);
                        echo "<p id = 'date1'><span id = 'day1'> $mysqldate1 </span> <br> "
                                . "<span id = 'clock1'> at $mysqldate2 </span><br> ";
			echo "<p id = 'product'><b>".
                                "<span id = 'itemname'>" . $row["product_name"] . "</span><br>" .
                                "<span id = 'price'> IDR " . $row["product_price"] . "</span><br>" .
                                "<span id = 'description'>" . $row["product_description"] . "</span><br>" .
                                "<span id = 'likes'>" . $row["likes"] ." likes <br>" . 
                                "<span id = 'purchases'>" . $row["purchase"] ." purchases<br>" .
                                "<div id ='edit'><a href='editproduct.php'> EDIT </a> </div>". 
                                "<div id = 'delete'><a href = 'deleteproduct.php'> DELETE </div></div>";
		}	
	}?>
</body>
</html>