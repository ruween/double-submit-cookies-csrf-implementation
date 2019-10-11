<?php

$username = "";
$username_err = $password_err = "";
session_start();

if(isset($_COOKIE["sessionid"]) && isset($_SESSION["loggedin"])){

    header("Location: ./portal.php");
}

$_SESSION['logintoken'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32);

?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>

<body>

	<h1 class="pt-5 pl-5">Double Submit Cookies Pattern Implementation</h1>
  	<h2 class="pt-5 pl-5">Login Form</h2>

<div class="container mt-3">
  <div class="row">
    <div class="col-">
	<form action="./loginvalidation.php" method="POST">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo $username; ?>">
    <span class="error" id="user_err"></span>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    <span class="error" id="pass_err"></span>
  </div>
    <input type="hidden" name="csrf" id="csrf" value="<?php echo $_SESSION['logintoken']; ?>"/>
  <button type="submit" name="sub" class="btn btn-primary">Login</button>
	</form>
</div>
</div>
</div>
</body>
</html>
