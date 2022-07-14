<?php
// session_start();

// Function Register
function register($name,$email,$password,$confirm_password,$img){  
    $con = mysqli_connect('localhost','root','','facebook');
    $x = "INSERT INTO `user` (`name`,`email`,`password`,`confirm_password`,`img`) VALUES ('$name','$email','$password','$confirm_password','$img')";
    mysqli_query($con , $x);
    $check_data = mysqli_affected_rows($con);

    if($check_data == 1){ //Check Data If Input Or Not 
        return true;
    }else{
        return false;
    }
}

//Function Of Login
function login($email,$password){ 
    $con = mysqli_connect('localhost','root','','facebook');
    $myqu = mysqli_query($con , "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password' ");
    $userdata = mysqli_fetch_assoc($myqu); // To Catch Data From Query And Put In userdata Varrible
    return $userdata;  // Return Data To Use
}

//Function Select Data And Take 
function catch_all_data(){  
    $con = mysqli_connect('localhost','root','','facebook');
    $x = "SELECT `name`,`email`,`img` FROM `user` ";
    $myqu = mysqli_query($con,$x);
    $nums_of_rows = mysqli_num_rows($myqu); // Show Num Of Rows In This Table

    if($nums_of_rows > 0 ){ //If Nums Of Row Is Not Empty 
        // $data = mysqli_fetch_assoc($all);
        $take_data = []; // This Array To Take Data And Put In UnLimited Array 
        while ( $data = mysqli_fetch_assoc($myqu) ) { // While loop for fetch All Data In Array 
            $take_data[] = $data;
        }
        return $take_data;
    }else{
        echo "Not Data";
    }

}

// To Hash Password
function hash_pass($password){ 
    return sha1($password);
}

// Premition To Check If User Admin 1 Or Not 2
function userrole(){  
    return $_SESSION['user']['user_role'];
}

//Function Delete User
function delete_user($email){  

    $con = mysqli_connect('localhost','root','','facebook');
    $x = "DELETE FROM `user` WHERE `email`= '$email' ";
    mysqli_query($con , $x);
    $check_data = mysqli_affected_rows($con);

    if($check_data == 1){ //Check Data If Input Or Not 
        return true;
    }else{
        return false;
    }
}

// Funtion Update Data User 
function update_user($email,$name,$img,$password){  

    $con = mysqli_connect('localhost','root','','facebook');
    $x = "UPDATE `user` SET ";

    if(!empty($email)){
        $x .= "`email` = '$email' ";
    }
    if(!empty($name)){
        $x .= " `name` = '$name' ";
    }
    if(!empty($password)){
        $x .= "`password` = '$password' ,";
    }
    if(!empty($img)){
        $x .= " `img` = '$img'";
    }
    $x .="WHERE `email` = $email";

    mysqli_query($con , $x);
    $check_data = mysqli_affected_rows($con);

    if($check_data == 1){ //Check Data If Input Or Not 
        return true;
    }else{
        return false;
    }
}


//Function Select Data And Take To Update
function catch_data_to_update($email){  

    $con = mysqli_connect('localhost','root','','facebook');
    $x = "SELECT `name`,`email`,`img` FROM `user` WHERE `email` = '$email' ";
    $myqu = mysqli_query($con,$x);
    $data = mysqli_fetch_assoc($myqu); // While loop for fetch All Data In Array 
        
    return $data;
}