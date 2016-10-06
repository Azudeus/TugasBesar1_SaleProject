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
    <title> Add Product </title>
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
<-- TODO : validasi-->
<p id = "SubHeader">Please add your product here?</p>
<form method="POST">
    Name <br>
    <input type ="text" name ="Name"><br>
    Description (max 200 chars)<br>
    <input type ="text" name ="description" maxlength=200><br>
    Price(IDR)<br>
    <input type ="number" name ="price"><br>
    Photo<br>
    <table>
        <td> <input type ="button" name ="photo" onclick= "upload.php" value ="Choose File"> </td>
        <td> No file chosen </td>
    </table>
</form>
<table>
    <td> <button value ="ADD"> </button>
    <td> <button value ="CANCEL"> </button>
</table>
</body>
</html>