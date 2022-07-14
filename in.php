<?php

session_start();
require "lib.php";
// echo "Hello Mohamed Ashraf";
if(empty($_SESSION['user'])){   // If User Empty Go To Login
    header("LOCATION: login.php");
}

$userrole = userrole(); //Admin Or Not 
$data = catch_all_data(); // Select All Data From Table And Show 
// echo "<pre>";
// print_r($data);

require "C:/xampp/htdocs/Projects_PHP/First_Project/Design/in.php";
?>