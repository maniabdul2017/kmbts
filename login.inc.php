<?php
 

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once "conn.php";
    require_once "function.inc.php";

    if(emptyInputLogin($username,$password)!==false){
        header("location:Login1.php?error=emptyinput");
        exit();
    }

    
    loginUser($conn, $username, $password);
    
    
}else{

    header("location:Login1.php");
    exit();
}



