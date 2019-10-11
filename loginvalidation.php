<?php

$user = "root";   //hard coded password and username is 'root'
$pass = "root";

session_start();

$username = $_POST['username'];
$password = "";
$loginToken = "";
$message = "";

// print_r($_POST);

if (isset($_SESSION['logintoken'])){       //passing the token created for the loggin session in to a fixed variable
    $loginToken = $_SESSION['logintoken'];
}

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['csrf'])) //checking whether the inputs are set
{

    if ($loginToken == $_POST['csrf']) //comparing the POST-ed token with the created token to verify
    {

        if ($_POST['username'] == $user && $_POST['password'] == $pass) //checking credetials
        {

            $sessionID = session_id();
 	          setcookie('sessionid', $sessionID, time() + 3600, '/'); //creating a session cookie


            $_SESSION['loggedin'] = 1; //setting loggedin as true


            header("Location: portal.php"); //redirecting to the portal


            unset($_SESSION['logintoken']); //releasing the login token
        }

        else
            $message = "Invalid Credentials";  //error control
    }
    else{die('INVALID REQUEST');}
}
?>

<?php if($_SESSION["loggedin"] != 1){ ?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<div class="container">
  <div class="row">
    <div class="col-sm">
<div class="alert alert-danger" role="alert">
      <?php echo $message ?>
</div>
<button type="button" class="btn btn-lg btn-outline-primary" onclick="window.location.href='login.php'">Log In</button>
</div>
</div>
</div>

</head>
<body>





</body>
</html>

<?php } ?>
