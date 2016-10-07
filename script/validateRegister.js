function validateRegister() {
  	var name = document.forms["register"]["name"].value;
    var username = document.forms["register"]["username"].value;
    var email = document.forms["register"]["email"].value;
    var password = document.forms["register"]["password"].value;
    var confirm = document.forms["register"]["confirm"].value;
    var address = document.forms["register"]["address"].value;
    var postal = document.forms["register"]["postal"].value;
    var number = document.forms["register"]["number"].value;
    

    if (name == null || name == "") {
        alert("Name must be filled out");
        return false;
    }

    if (username == null || username == "") {
        alert("username must be filled out");
        return false;
    }

    if (email == null || email == "") {
        alert("Email must be filled out");
        return false;
    }

    if (password == null || password == "") {
        alert("Password must be filled out");
        return false;
    }

    if (confirm == null || confirm == "") {
        alert("Confirm Password must be filled out");
        return false;
    }

    if (password != confirm) {
    	alert("Password and Password Confirmation didn't match");
    	return false;
    }

    if (address == null || address == "") {
        alert("Address must be filled out");
        return false;
    }

    if (postal == null || postal == "") {
        alert("Postal must be filled out");
        return false;
    }

    if (number == null || number == "") {
        alert("Name must be filled out");
        return false;
    }
}

