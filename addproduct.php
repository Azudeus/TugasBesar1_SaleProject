<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "saleproject";
    session_start();
    // Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$account_id = $_GET["account_id"];
	$tab = "add_product";

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
    <title> Add Product </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src ="myAddProduct.js"></script>
</head>
<?php include "header.php" ?>
<!-- TODO : validasi-->
<p id = "SubHeader">Please add your product here.
<hr>
<form action="formUpload.php" method="post" name ="myProductForm" onsubmit="return myProductValidate(myProductForm)" 
      action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST"
      enctype="multipart/form-data">
        <span id = "fName"> Name </span><br>
        <input type ="text" name ="name" class = "width100"><br><br>
        <span id = "fDesc"> Description (max 200 chars) </span><br>
        <input type ="text" name ="description" class = "width100 height100"  ><br><br>
        <span id = "fPrice"> Price(IDR) </span><br>
        <input type ="text" name ="price" class = "width100" ><br><br>
        <span id = "pphoto"> Photo </span> <br>
        <input type ="file" name = "photochoose">
		<input type="hidden" name = "account_username" value="<?php echo $account_username?>"</p>
        <input type="hidden" name = "account_id" value="<?php echo $account_id?>"</p>
		<div class ="right">
        <input type = "submit" id = "addbutton" class ="button" value ="ADD"> 
        <input type = "button" id = "cancelbutton" class ="button" value ="CANCEL" 
                     onclick = "myProductCancel(<?php echo $account_id ?>)">
		</div>
</form>
<!--
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
         <td> <input type = "submit" id = "addbutton" value ="ADD" onclick="myProductValidate(false)"> 
         <td> <input type = "button" id = "cancelbutton" value ="CANCEL" 
                     onclick = "myProductCancel(<?php echo($account_id) ?>)">
     </table>
</div>
-->
</body>
</html>