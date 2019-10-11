<?php
session_start();
	
    $csrf = $sid =  "";

	
    if(isset($_POST["amount"]) && isset($_POST['csrf'])){
		
        if(isset($_COOKIE["csrf"])){   //checking if the CSRF cookie is set and passing it into a variable
            $csrf = $_COOKIE["csrf"];
        }
		
        if($csrf != $_POST["csrf"]){    //comparing the CSRF cookie and the CSRF in POST data
            $messege = "Invalid CSRF token.";
        }
		
        elseif(!is_numeric($_POST["amount"])){
            $messege = "Please enter a valid amount";
        }
		
        else{
            $messege = "$".$_POST["amount"]." Credited";  //Sucessfully credited 
        }
    }
    else{
        $messege = "Invalid request.";
    }
echo $messege;

//Cleaning the cookie set by selecting and unsetting the CSRF token

$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        if($name == "csrf"){
            setcookie($name, '', time()-1000, "/");
        }
    }
?>
