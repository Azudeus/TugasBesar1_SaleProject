<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 id="title"><span id="sale">Sale</span><span id="project">Project</span></span></h1>
<h3 id="subHeader"> Please Login </h3>
<hr>

<form action = "process_login.php" method ="GET" onSubmit="return validateLogin()">

Email or Username <br>
<input type="text" name="username" id="formField"><br><br>

Password <br>
<input type="password" name="password" id="formField"><br><br>

<div id="submitAlign"><div class="right">
<input type="submit" value="LOGIN" class="button"></div><br>
</div>
</form>
<br><br>

<h2 id="account">Don't have an account yet? Register
<a href="register.php" class="bluelink">here</a>
<br><br>