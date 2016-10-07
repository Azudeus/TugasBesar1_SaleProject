<?php
    $servername = "localhost:3307";
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
    
    $prodid = $_GET["prod_id"];
    $delete_query = "DELETE FROM product WHERE prod_id = ".$prodid;
    if($conn->query($delete_query)){
        header("Location : yourProduct.php");
        exit();
    }
    else{
        echo "alert('Deletion failed')";
        header("Location : yourProduct.php");
        exit();
    }
?>

