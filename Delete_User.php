<?php
session_start();
require "lib.php";
if(empty($_SESSION['user'])){   // If User Empty Go To Login
    header("LOCATION: login.php");
}

$user_email = $_SESSION['user']['email']; //Select email User 

if($user_email == $_GET['email']){  // Compare IF My Email Admin Login = Same email Can't Delete
    echo "Your Are Admin Can't Delete";
}else{
$res = delete_user($_GET['email']);
if($res == true){
    header("LOCATION: in.php");
}
}

?>