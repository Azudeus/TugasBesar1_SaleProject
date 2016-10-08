<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "saleproject";
    session_start();
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //$_SESSION["username"] = "rellons";
    // Check connection
    if (!$conn) {
        echo "Connection failed: " + mysqli_connect_error();
    }
    
    $product_id = $_GET["product_id"];
    $account_id = $_GET["account_id"];
    $delete_query = "DELETE FROM product WHERE product_id = ".$product_id;
    if($conn->query($delete_query)){
        header("Location:yourproduct.php?account_id=".$account_id);
    }
    else{
        echo "alert('Deletion failed')";
    }
?>

