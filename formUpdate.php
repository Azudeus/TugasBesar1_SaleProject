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
        echo "Connection failed: " + mysqli_connect_error();
    }

//inspired by w3schools.com
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $productname = $_REQUEST["Name"];
    $proddesc = $_REQUEST["description"];
    $prodprice = $_REQUEST["price"];
    $prodPhoto = $_REQUEST["photochoose"];
    $target_dir = "/img/";
    $target_file = $target_dir.  basename($prodPhoto["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($prodPhoto)) {
        $check = getimagesize($_REQUEST["photochoose"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "1";
            $uploadOk = 0;
        }
    }
    else if(isset($prodPhoto) && count($prodPhoto) > 1){
        echo "2";
        $uploadOk = 0;
    }
    // Check if file already exists
    else if (file_exists($target_file)) {
        echo "3";
        $uploadOk = 0;
    }
    /*
    // Check file size
    if ($prodphoto["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }*/
    // Allow certain file formats
    else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "4";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "5";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($prodPhoto["tmp_name"], $target_file)) {
            $prodquery = "UPDATE product SET product_name = ".$productname.
                    " product_description = ".$proddesc." product_price = ".$prodprice.
                    " imgsrc = ".$target_file. "WHERE product_id = ".$prodid;
            if ($conn->query($prodquery)) {
                echo "Success";
            } else {
                echo "Failed to update photo in database.";
            }
        } else {
            alert("6");
        }
        
    }    
}
?>

