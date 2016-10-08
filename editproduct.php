<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "saleproject";
    session_start();
    // Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$account_id = $_GET["account_id"];
	$tab = "your_product";

	$account_query = "SELECT username from account where account_id =".$account_id;
	$account_query_result = $conn->query($account_query);
	$account_query_assoc = $account_query_result->fetch_assoc();
	$account_username = $account_query_assoc["username"];

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
    <title> Edit Product </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src ="myEditProduct.js"></script>
</head>
<body>
<?php include "header.php"; ?>

</body>
<!-- TODO : validasi-->
<p id = "SubHeader">Please update your product here. <br>
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
<?php
$prodid = $_GET["product_id"];
$query = "SELECT * from product where product_id=".$prodid;
$q_result = $conn->query($query);

while($row = $q_result-> fetch_assoc()) {
    $pName = $row["product_name"];
    $pDesc = $row["product_description"];
    $pPrice = $row["product_price"];
}

echo "
    <div id = 'formField'>
    <form name='edit_product' action = '' method ='POST' onSubmit='return validateEdit()'>
        Name <br>
            <input type='text' name='name' id='formField' value='".$pName."'><br><br>
        Description(max 200 chars) <br>
            <textarea rows='3' cols='50' name='address' id='formField' value='".$pDesc."'></textarea><br><br>
        Price (IDR)<br>
            <input type='text' name='price' id='formField' value='".$pPrice."'><br><br>
        Photo <br>
            <input type ='file' name= 'photochoose'>
        <input type='hidden' id = 'username' value='".$username."'</p>
     <table>
         <td> <input type = 'submit' id = 'addbutton' value ='UPDATE'> </td>
         <td> <input type = 'reset' id = 'cancelbutton' value ='CANCEL'
                     onclick = 'myProductCancel(<?php echo($activeuser) ?>)'></td>
     </table>
</div>"

?>
</body>
</html>


