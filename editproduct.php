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
</head>
<body>
<?php include "header.php"; ?>

<script src="script/validateEdit.js"></script>

<p id = "SubHeader">Please update your product here. <br>

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
    <form name='edit_product' action='' method='post' onSubmit='return validateEdit()'>
        <input type='hidden' name='username' value='".$account_username."'>
        Name <br>
            <input type='text' name='name' id='formField' value='".$pName."'><br><br>
        Description(max 200 chars) <br>
            <textarea rows='3' cols='200' name='description' id='formField'>".$pDesc."</textarea><br><br>
        Price (IDR)<br>
            <input type='text' name='price' id='formField' value='".$pPrice."'><br><br>
        Photo <br>
            <input type ='file' name= 'photochoose'>
     <table>
         <td> <input type = 'submit' id = 'addbutton' value ='UPDATE'> </td>
         <td> <input type = 'reset' id = 'cancelbutton' value ='CANCEL'></form></td</div>
     </table>
</div>"

?>
</body>
</html>


<?php
include "process_edit.php"
?>