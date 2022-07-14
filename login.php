<?php
session_start();
require "lib.php";

if(!empty($_SESSION['user'])){
    header("LOCATION: in.php");
}

if(isset($_POST['email'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $newpass = hash_pass($password);
    $userdata = login($email,$newpass); // Put This Data From Function In Varrible

    if(!empty($userdata)){               // Check raturn Data From Database user Table Is Data Or Not
        
        $_SESSION['user'] = $userdata ;  // This Return Data If Not Empty Put In Session To Use

        header("LOCATION: in.php");      // Destination When Access Data Correct
    }else{
        echo "Error";
    }
}

require "C:/xampp/htdocs/Projects_PHP/First_Project/Design/Login.html"
?>