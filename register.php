<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<script src="script/validateRegister.js"></script>


<h1 id="title"><span id = "sale">Sale</span><span id="project">Project </span></h1>
<h3 id="subHeader"> Please Register </h3>
<hr>

<form name="register" action = "" method ="post" onSubmit="return validateRegister()">
<div id="formField">
Full Name <br>
<input type="text" name="name" id="formField"><br><br>

Username <br>
<input type="text" name="username" id="formField"><br><br>

Email <br>
<input type="text" name="email" id="formField"><br><br>

Password <br>
<input type="password" name="password" id="formField"><br><br>

Confirm Password <br>
<input type="password" name="confirm" id="formField"><br><br>

Full Address <br>
<textarea rows="3" cols="50" name="address" id="formField"></textarea><br><br>

Postal Code<br>
<input type="text" name="postal" id="formField"><br><br>

Phone Number<br>
<input type="number" name="number" id="formField"><br><br>

<div id="submitAlign">
<input type="submit" value="Register" class="button"><br>
</div>
</div>
</form>
<br><br>

<h2 id="account">Already registered? Login 
<a href="login.php" class="bluelink">here</a></h2>
<br><br>

<?php
include "process_register.php"
?>

</body>
</html>