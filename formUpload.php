<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $productname = $_POST["Name"];
    $proddesc = $_POST["description"];
    $prodprice = $_POST["price"];
    $prodPhoto = $_POST["photochoose"];
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
            //buat query untuk menentukan id terbesar
            $queryForLargestId = "SELECT MAX(product_id) FROM product";
            $largestId = $conn->query($queryForLargestId);
            $dateTime = time();
            $prodquery = "INSERT INTO product "
                    . "VALUES ('$largestId+1',$activeuser,
                        . '$proddesc','0','0','$dateTime','$productname','$target_file')";
            echo("Success");
        } else {
            alert("6");
        }
        
    }    
}
?>