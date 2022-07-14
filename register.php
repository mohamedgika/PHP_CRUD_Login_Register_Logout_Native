<?php
session_start();
require "lib.php";

if(!empty($_SESSION['user'])){
    header("LOCATION: in.php");
}

if(isset($_POST['name'])){ //If Enter Data In Form Start Enter Post In Data 
  
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //img
    $tmp = $_FILES['img']['tmp_name']; // Image Path
    $type =$_FILES['img']['type'];     // Type Image Ex--> (image/png)
    $name_img =$_FILES['img']['name'];  // Name Image In Array EX --> (jewiofhiowef.png)
    $type_arr= explode("/",$type); // Function Divide Type in Arrays EX Array[0] = image , Array[1] = png
    $ext_img = $type_arr[1]; // Call Array[1] = png
    $full_name_img = $name.".".$ext_img; // Varrable To Connect Name And Extaintion


    //Password Hash 2
    $newpass_1 = hash_pass($confirm_password); // To Hash Password

    //Password Hash 1
    $newpass = hash_pass($password); // To Hash Password

    
    if($password == $confirm_password){

        //Function Register From lib.php
         register($name,$email,$newpass,$newpass_1,$full_name_img);

        //Function img upload
        move_uploaded_file($tmp,'C:/xampp/htdocs/Projects_PHP/First_Project/user_img/'.$full_name_img); // Function To Move Image To Path
        echo "Successfully";
    }else{
        echo "Error Your Password isn't Match";
        echo "<br>";
        echo "Try Enter Same Password";
    }
}

require "C:/xampp/htdocs/Projects_PHP/First_Project/Design/Register.html";  //Function To Make PHP File Know Path Html

// include ""; //Same Require
// require_once "";
// include_once "";
