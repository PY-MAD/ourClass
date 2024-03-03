<?php
include "../../db/connection.php";
$error = [];
$email = $name = "";
function generateCode(){
    $str = "";
    for($i = 0; $i<4; $i++){
        $str = $str.strval(random_int(0 , 9));
    }
    return $str;
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(!empty($_POST["name"])){
        $name = mysqli_escape_string($mysqli , $_POST["name"]);
        $name = $_POST["name"];
    }else{
        array_push($error , "name is requisted !");
    }
    if(!empty($_POST["email"])){
        $email = mysqli_escape_string($mysqli , $_POST["email"]);
        $email = $_POST["email"];
    }else{
        array_push($error , "email is requisted !");
    }
    if(!empty($_POST["password"])){
        $password = mysqli_escape_string($mysqli , $_POST["password"]);
    }else{
        array_push($error , "password is requisted !");
    }
    if(!empty($_POST["gender"])){
        $sex = mysqli_escape_string($mysqli , $_POST["gender"]);
    }else{
        array_push($error , "gender is requisted !");
    }
    if(!empty($_POST["major"])){
        $major = $_POST["major"];
    }else{
        array_push($error , "major is requisted !");
    }
    if(!empty($_POST["firstThreeNumberOfId"])){
        $threeNumberOfId = mysqli_escape_string($mysqli, $_POST["firstThreeNumberOfId"]);
    }else{
        array_push($error , "this failed is requisted !");
    }
    if(empty($error)){
        $checkError = "SELECT * from users where email = '$email' limit 1";
        $mysqliCheck = $mysqli->query($checkError);
        if($mysqliCheck->num_rows > 0){
            array_push($error , "Email is exist !!");
        }
    }
    if(empty($error)){
        $hashPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $registerDate = time();
        $insetQuery = "INSERT into users (email,name, password,sex,major,theBiggnerId)
        VALUES('$email','$name','$hashPassword','$sex','$major','$threeNumberOfId')
        ";
        $mysqli->query($insetQuery);

        $code = generateCode();
        $token = bin2hex(random_bytes(16));
        $getUser = $mysqli->query("SELECT id from users where email = '$email'")->fetch_assoc()["id"];
        $date = Date("Y-m-d H:i:s" , strtotime("+20 minutes"));
        $generateCodeQuery = " INSERT into verify_password(user_id,code ,token, expiary_at )
        VALUES('$getUser','$code','$token','$date')
        ";
        $mysqli->query($generateCodeQuery);
        header("location: verify_account/verify_account.php?token=".$token);
    }
}

