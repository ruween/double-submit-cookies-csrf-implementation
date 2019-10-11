<?php


if(isset($_POST['generateNow'])){

    if($_POST['generateNow'] == "set"){

        $token = Token::generate();
    }
    //else
    else{
        $token = "Invalid request";
    }
    exit;
}

//put your function inside a class for addition protection ? oop power
class Token{
public static function generate(){

    $token = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32);


	   setcookie("csrf", $token, time() + (86400 * 30), "/"); //storing the newly created token as a cookie


    return $token;
}
}
?>
