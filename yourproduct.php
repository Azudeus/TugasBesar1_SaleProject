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
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title> Your Product </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include "header.php"; ?>
<p id = "SubHeader">What are you going to sell today?</p>
<?php
	$query = "SELECT * FROM product WHERE username = '". $account_username."'";
	$q_result = $conn->query($query);
	if($q_result-> num_rows > 0){
		//output data of each row from database
		while($row = $q_result-> fetch_assoc()){
		

        // 	$phpdate = strtotime($row["product_datetime"]);
		// 	$mysqldate1 = date('l, d F Y',$phpdate);
		// 	$mysqldate2 = date('H.i',$phpdate);
  //                       echo "<p id = 'date1'><span id = 'day1'> $mysqldate1 </span> <br> "
  //                               . "<span id = 'clock1'> at $mysqldate2 </span><br> ";
		// 	echo "<p id = 'product'><b>".
  //                               "<span id = 'itemname'>" . $row["product_name"] . "</span><br>" .
  //                               "<span id = 'price'> IDR " . $row["product_price"] . "</span><br>" .
  //                               "<span id = 'description'>" . $row["product_description"] . "</span><br>" .
  //                               "<span id = 'likes'>" . $row["likes"] ." likes <br>" . 
  //                               "<span id = 'purchases'>" . $row["purchase"] ." purchases<br>" .
  //                               "<div id ='edit'><a href='editproduct.php?account_id=".$account_id.
  //                                   "&edit=".$row["product_id"]."'> EDIT </a> </div>". 
  //                               "<div id = 'delete'><a href = 'deleteProduct.php?prod_id=".$row["product_id"]."'>"
  //                               . "<onclick = alert('Are you sure?')> DELETE </div></div>";
		// }

            $phpdate = strtotime($row["product_datetime"]);
            $mysqldate1 = date('l, d F Y',$phpdate);
            $mysqldate2 = date('H i',$phpdate);
            $product_id = $row["product_id"];
            $query_checksame = $conn->query("SELECT EXISTS(SELECT * FROM likes where product_id =". $product_id ." and account_id =". $account_id.") as exist");
            $checksame_row = $query_checksame -> fetch_assoc();
            $checksame = $checksame_row["exist"];
            
            echo "
            <div id = 'asd'></div>
            <p id = 'product'><b>". $row["username"] .
            "</b> <br> added this on ". $mysqldate1 .", at ". $mysqldate2 ."<br><hr>".
            "<table class = 'producttable'>
            <tr> 
                <td rowspan = '5' class = 'left' width = 128px> <img src = 'img/" . $row["imgsrc"] . "' style = 'width:128px;height:128px;' > </td>
                <td colspan = '2' class = 'left'> <span id = 'itemname'>" . $row["product_name"] . "</span> </td>
            </tr>
            <tr>
                <td> <span id = 'price'> IDR " . $row["product_price"] . "</span> </td>
                <td colspan = '2' class ='like_count_" .$row["product_id"]. "   '>"  . $row["likes"] . " likes </td>
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
                <td class = 'likebuy'> <a href='editproduct.php?product_id=".$row["product_id"]."&account_id=".$account_id."' > EDIT</td>
                <td class = 'likebuy'> <a href='deleteProduct.php?product_id=" .$row["product_id"]."&account_id=".$account_id."' class = 'greenlink'> DELETE</td>
            </tr>
            </table>
            <br>
            <hr>
            <script>update(".$product_id.",". $checksame . ")</script>
            ";
        }
       
}?>

</body>
</html>