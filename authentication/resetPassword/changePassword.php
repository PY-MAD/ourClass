<?php
$error = [];
if(!isset($_GET["token"]) || !$_GET["token"]){
    die("error 4041");
}

$now = date("Y-m-d H:i:s");
$checkDate = $mysqli->prepare("SELECT * from password_reset where token = ? and expiray_at > '$now' ");
$checkDate->bind_param('s',$token);
$token = $_GET["token"];
$checkDate->execute();

$result = $checkDate->get_result();
$userId;

if($result->num_rows > 0){
    $userId = $result->fetch_assoc()["user_id"];
}else{
    die("error 4042");
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $password = mysqli_escape_string($mysqli , $_POST["password"]);
    $passwordConfirm = mysqli_escape_string($mysqli , $_POST["passwordConfirm"]);
    if(empty($_POST["password"])){
        array_push($error, "password is empty");
    }
    if(empty($_POST["passwordConfirm"])){
        array_push($error, "password is empty");
    }
    if($password != $passwordConfirm){
        array_push($error, "passwords does not match !!!");
    }
    if(empty($error)){
        $newPassword = password_hash($password , PASSWORD_DEFAULT);
        $mysqli->query("
        UPDATE users SET password = '$newPassword' where id='$userId'
        ");
        $mysqli->query("
        DELETE from password_reset where user_id='$userId'
        ");
        header("location:login.php");
    }
}