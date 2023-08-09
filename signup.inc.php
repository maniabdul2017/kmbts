<?php


require_once "conn.php";
require_once "functions.php";
require_once "function.inc.php";

if(isset($_POST["submit"])){

    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $email     = $_POST['email'];
    $address   = $_POST['address'];
    $country   = $_POST['country'];
    $occupation  = $_POST['occupation'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordrepeat = $_POST['passwordrepeat'];
    


  


    if(emptyInputSignup($firstname,$lastname,$email,$address,$country,$occupation,$username,$password,$passwordrepeat)!==false){
        header("location:signup1.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username) !==false) {
        header("location:signup1.php?error=invalidusername");
        exit();
    }
    if(invalidEmail($email) !==false) {
        header("location:signup1.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($password,$passwordrepeat) !==false){
        header("location:signup1.php?error=passworddontmatch");
        exit();
    }
    if(usernameExists($conn, $username ) !==false) {
        header("location:signup1.php?error=usernametaken");
        exit();
    }
    if(emailExists($conn, $email ) !==false) {
        header("location:signup1.php?error=emailtaken");
        exit();
    }


    if(isset($_FILES['pic']))   {
        $img_path= "pics/";
        $posted='pic'; 
        if ($_FILES[$posted]['name']){			
            $uploaded_file=upload($posted, $img_path); 
            if ($uploaded_file){ 
                createUser($conn,$username, $password, $firstname, $lastname, $email, $address, $country,$occupation,$uploaded_file);
                print  $message;
            }
            else {
                header("location:signup1.php?error=chooserighttype");
                $message  .= " - USER IMAGE FAILED TO UPLOAD.";
            }
        }
        else{

        
        header("location:signup1.php?error=blank");		
    }
}

    

    
}
else{
    header("location:../signup1.php");
    exit();
}



?>