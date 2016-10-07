<?php
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "saleproject";
    session_start();
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //$_SESSION["username"] = "rellons";
    $activeuser = $_GET["account_id"];
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
    <script type="text/javascript" src ="myAddProduct.js"></script>
</head>
<body>
<h1 id = "title"><span id="sale">Sale</span><span id="project">Project</span></h1>
<h2 id = "hellouser">Hi, <?php echo $activeuser; ?> !</h2>
<h2 id = "logout">logout</h3><br>

<table id = "catalog">
	<tr>
		<td class = "nobg"><a href="catalog.php">catalog</a></td>
		<td class = "nobg"><a href="yourproduct.php">your product</a></td>
		<td class = "blue"><a href="addproduct.php" id = "bluelink">add product</a></td>
		<td class = "nobg"><a href="sales.php">sales</a></td>
		<td class = "nobg"><a href="purchases.php">purchases</a></td>
	</tr>
</table>

</body>
<!-- TODO : validasi-->
<p id = "SubHeader">Please add your product here. <br>
<!--
<form name ="myProductForm" onsubmit="return myProductValidate(myProductForm)" 
      action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST"
      enctype="multipart/form-data">
        <span id = "fName"> Name </span><br>
        <input type ="text" name ="Name"><br>
        <span id = "fDesc"> Description (max 200 chars) </span><br>
        <input type ="text" name ="description"><br>
        <span id = "fPrice"> Price(IDR) </span><br>
        <input type ="text" name ="price"><br>
        <span id = "pphoto"> Photo </span> <br>
        <input type ="file" name = "photochoose">
        <input type="hidden" name = "ausername" value="<?php //$username?>"</p>
     <table>
         <td> <input type = "submit" id = "addbutton" value ="ADD"> 
         <td> <input type = "button" id = "cancelbutton" value ="CANCEL" 
                     onclick = "myProductCancel(<?php //echo($activeuser) ?>)">
     </table>
</form>-->

<div id = MyForm>
        <span id = "fName"> Name </span><br>
        <input type ="text" id ="Name"><br>
        <span id = "fDesc"> Description (max 200 chars) </span><br>
        <input type ="text" id ="description"><br>
        <span id = "fPrice"> Price(IDR) </span><br>
        <input type ="text" id ="price"><br>
        <span id = "pphoto"> Photo </span> <br>
        <input type ="file" name= "photochoose">
        <input type="hidden" id = "ausername" value="<?php $username?>"</p>
     <table>
         <td> <input type = "submit" id = "addbutton" value ="ADD" onclick="myProductValidate()"> 
         <td> <input type = "button" id = "cancelbutton" value ="CANCEL" 
                     onclick = "myProductCancel(<?php echo($activeuser) ?>)">
     </table>
</div>

<?php

?>
redirect(<?php echo($activeuser) ?>);
</body>
</html>