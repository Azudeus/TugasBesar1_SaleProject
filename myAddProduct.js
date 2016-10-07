//validate user input
function myProductValidate(update, productId){
    var name = document.getElementById("Name").value;
    var desc = document.getElementById("description").value;
    var prc = document.getElementById("price").value;
    var formInName = new String(name);
    var formInDesc = new String(desc);
    var formInPrice = new String(prc);
    var allvalid = true;
    //Cek kevalidan nama produk
    if(!(name && formInName.length <= 200 && !/(<*>)/.test(formInName))){
        if(!name){
            alert("Product name field cannot be empty.");
        }
        else if(formInName.length > 200){
            alert("Product name too long (max 200)");
        } 
        else
            alert("Product name invalid");
        allvalid = false;
    }
    //Cek kevalidan deskripsi produk
    if(!(desc && formInDesc.length <= 200 && !/(<*>)/.test(formInDesc))){
        if(!desc){
            alert("Product description field cannot be empty.");
        }
        else if(formInDesc.length > 200){
            alert("Description too long (max 200)");
        }
        else
            alert("Description invalid");
        allvalid = false;
    }
    //Cek kevalidan harga
    if(!(prc && formInPrice.length <= 200 && formInPrice.match(/^[0-9][0-9]*[0-9]$/))){
        if(!prc){
            alert("Price field cannot be empty");
        }
        else if(formInPrice.length > 200){
            alert("Price input too long (max 200 numbers");
        }
        else
            alert("Price must be integer and not 0");
        allvalid = false;
    }
    //Jika nama, deskripsi, dan harga valid, maka coba untuk submit
    if(allvalid){
        var data = new FormData();
        data.append("Name", name);
        data.append("description", desc);
        data.append("price", prc);
        data.append("photochoose", document.getElementById('photochoose'));
        var xconnect = new XMLHttpRequest();
        xconnect.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                switch(this.responseText){
                    case "1" : {
                            alert("Invalid image");
                            break;
                    }
                    case "2": {
                            alert("Too many image (max 1)");
                            break;
                    }
                    case "3": {
                            alert("Image already exist");
                            break;
                    }
                    case "4": {
                            alert("Unsupported file type");
                            break;
                    }
                    case "5": {
                            alert("ERROR");
                            break;
                    }
                    case "Success":{
                            alert("Success!");
                            redirect(username);
                            break;
                    }
                    default:{
                            alert(this.responseText);
                    }
                }
            }
        };
        //open connection
        if(update){
            xconnect.open("POST", "formUpdate.php?account_id="+username+"&prod_id="+productId, true);
        }
        else{
            xconnect.open("POST", "formUpload.php?account_id="+username, true);
        }
        xconnect.setRequestHeader("Content-Type", "multipart/form-data");
        xconnect.send(data);
    }
 }
        
//jika cancel, maka tampilkan dialog "Are you sure you want to cancel? dan redirect
function myProductCancel(username){
    if(confirm("Do you really want to cancel?")){
        redirect(username);
    }
    //else do nothing
}
    
function redirect(username){
    document.location.href = "yourproduct.php?account_id="+username;
}

