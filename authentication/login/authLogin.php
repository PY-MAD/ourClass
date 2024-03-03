<?php
include "../../config/config.php";
$error = [];
$email = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(!empty($_POST["email"])){
        $email = mysqli_escape_string($mysqli , $_POST["email"]);
    }else{
        array_push($error , "email is requisted !");
    }
    if(!empty($_POST["password"])){
        $password = mysqli_escape_string($mysqli , $_POST["password"]);
    }else{
        array_push($error , "password is requisted !");
    }
    if(!count($error)){
        $queryUser = "SELECT * from users where email ='$email' limit 1";
        $checkUser = $mysqli->query($queryUser);
        if($checkUser->num_rows > 0){
            $getUser = $mysqli->query($queryUser)->fetch_assoc();
            $hashPassword = $getUser["password"];
            $checkPassword = password_verify($password, $hashPassword);
            if($checkPassword){
                $_SESSION["name"] = $getUser["name"];
                $_SESSION["major"] = $getUser["major"];
                $_SESSION["email"] = $getUser["email"];
                $_SESSION["signUpDate"] = $getUser["dateOfRegister"];
                $dir_photo = $config["url"]."assets/svg/userAvater/";
                $_SESSION["photo_src"] = $getUser["sex"] == "male" ? $dir_photo."male.svg":$dir_photo."female.svg";
                $_SESSION["theBiggnerId"] = $getUser["theBiggnerId"];
                $_SESSION["logged_in"] = true;
                $_SESSION["typeOfUser"] = $getUser["typeOfuser"];
                $_SESSION["user_id"] = $getUser["id"];
                header("location: ". $config["url"]."index.php");
            }else{
                array_push($error , "password is not correct !");
            }
        }else{
            array_push($error , "Email not fount !");
        }

    }
}