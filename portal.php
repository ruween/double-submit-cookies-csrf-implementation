<?php

session_start();

$messege = "";
$loggedin = 0;

if(isset($_COOKIE["sessionid"]) && isset($_SESSION["loggedin"])){
    $loggedin = 1;
}

else{
    $messege = "not logged in";
}

?>





<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="scripts/send.js"></script>

  <script>
            //generate csrf token using an ajax request
            $.ajax({
                url:'token.php',
                type:'POST',
                data:{
                    generateNow:"set"
                },
                success:function() {
                    //this section is explained in the blog
                    var cookie = document.cookie.match('(^|;) ?' + 'csrf' + '=([^;]*)(;|$)');
                    document.getElementById("csrf").value = cookie ? cookie[2] : null;
                }
            });
        </script>


</head>

<body>

<h1 class="pt-5 pl-5">Portal</h1>


<?php if($loggedin == 1){ ?>
<div class="container mt-3">
  <div class="row">
    <div class="col-">
	<form action="./process.php" method="POST" onsubmit="return send();">
  <div class="form-group">
    <label for="amount">Enter Credit Amount</label>
    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount">
  </div>
  <input type="hidden" name="csrf" id="csrf" value=""/>
  <button type="submit" class="btn btn-success">Send</button>
  <button onclick="window.location.href='./logout.php'" type="button" class="btn btn-danger">log Out</button>
	</form>

</br>
  <span id="msg"></span>
</br>

  <?php } else{ ?>
  <form action ="./login.php" method="GET">
    <div class="card">
        <div class="card-body">
          <?php echo $message ?>
  </div>
</div>
      <button type="submit" class="btn btn-primary">log In</button>
  </form>
<?php } ?>
</div>
</div>
</div>
</body>
</html>
