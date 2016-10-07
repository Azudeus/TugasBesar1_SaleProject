function validateRegister() {
    var username = document.forms["register"]["username"].value;
    var password = document.forms["register"]["password"].value;    

    if (username == null || username == "") {
        alert("username must be filled out");
        return false;
    }

    if (password == null || password == "") {
        alert("Password must be filled out");
        return false;
    }
}

