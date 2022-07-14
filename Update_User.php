<?php
session_start();
require "lib.php";
// echo "Hello Mohamed Ashraf";
if(empty($_SESSION['user'])){   // If User Empty Go To Login
    header("LOCATION: login.php");
}

if(isset($_POST['name'])){
    $email = $_POST['email'];
    $name =  $_POST['name'];
    $password = $_POST['password'];

    //img
    if(!empty($_FILES['img']['tmp_name'])){
    $img = $_FILES['img']['tmp_name'];
    $type =$_FILES['img']['type'];
    $type= explode("/",$type);
    $ext_img = $type[1];
    $full_name_img = $name.".".$ext_img;
    //Function Upload File Image 
    move_uploaded_file($img,'C:/xampp/htdocs/Projects_PHP/First_Project/user_img/'.$full_name_img); // Function To Move Image To Path
    }

    //Password Hash
   $newpass = hash_pass($password); // To Hash Password
    

   //Call Function Update_User
   $update = update_user($email,$name,$full_name_img,$newpass);
   if($update  == true){
    header("LOCATION: in.php");
   } 
}
else{
    $user_email = $_GET['email'];
    $user_data = catch_data_to_update($user_email);
}


require "C:/xampp/htdocs/Projects_PHP/First_Project/Design/update.php";
?>