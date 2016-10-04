<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1 id="title"><span id = "sale"> Sale </span><span id="project">Project </span></h1>
<h3 id="subHeader"> Please Register </h3>
<hr>

<form action = "welcome.php" method ="post">
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
<input type="password" name="password" id="formField"><br><br>

Full Address <br>
<textarea rows="3" cols="50" name="address" id="formField"></textarea><br><br>

Postal Code<br>
<input type="text" name="postal" id="formField"><br><br>

Phone Number<br>
<input type="number" name="number" id="formField"><br><br>

<div id="submitAlign">
<input type="submit" value="Register" id="submitButton"><br>
</div>
</form>
<br><br>

<h2 id="account">Already registered? Login 
<a href="login.php" id="link">here</a></h2>
<br><br>