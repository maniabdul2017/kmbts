<?php
  
function emptyInputSignup($firstName,$lastname,$email,$address,$country,$occupation,$username,$password,$passwordrepeat) {
    $result;
    if(empty($firstName) || empty($lastname) || empty($email) || empty($address) || empty($country) || empty($occupation) || empty($password) || empty($passwordrepeat) ) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

            $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL )) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function pwdMatch($password,$passwordrepeat) {
    $result;
    if($password !== $passwordrepeat){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username , $email) {

    $sql = "Select * from bts where username = ? Or email = ?; ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:signup1.php?error=stmtfailure");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username , $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function usernameExists($conn, $username ) {

    $sql = "Select * from bts where username = ? ; ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:signup1.php?error=stmtfailure");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username );
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function emailExists($conn,  $email) {

    $sql = "Select * from bts where  email = ?; ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:signup1.php?error=stmtfailure");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s",  $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function  createUser($conn,$username, $password, $firstname, $lastname, $email, $address, $country,$occupation,$profileImage){

    $sql = "INSERT INTO  bts
					(username, password, firstname, lastname, email, address, country, occupation,pic)
					VALUES
					(?,?,?,?,?,?,?,?,?)";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:signup1.php?error=queryfailure");
        exit();
    }
    
    $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssssssss", $username, $hashedPwd, $firstname, $lastname, $email, $address, $country,$occupation,$profileImage);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location:signup1.php?error=none");
    
    exit();
}

function emptyInputLogin($username,$password) {
    $result;
    if(empty($username) || empty($password) ) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password) {
   
    $uidExists = uidExists($conn, $username , $username);

    if($uidExists === false){
        header("location:Login1.php?error=wrongLogin");
        exit();
    }
   
   
    $pwdHashed = $uidExists["password"];
    $checkpwd = password_verify($password , $pwdHashed );
    if($checkpwd === false) {
        header("location:Login1.php?error=wrongLogin1");
        exit();
    }
    else if ($checkpwd === true) {
        session_start();
        $_SESSION["id"] = $uidExists["id"];
        $_SESSION["firstname"] = $uidExists["firstname"];
        header("location:index1.php");
        exit();

    }
}
?>