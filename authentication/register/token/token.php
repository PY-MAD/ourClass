<?php
include "../../senderMail/senderTokenCode.php";
if(!isset($_GET["token"]) || !$_GET["token"]){
    die("error 4042");
}
$now = date("Y-m-d H:i:s");
$query = "SELECT * from verify_password where token = ? and expiary_at > '$now' ";
$mysqli->query("DELETE from verify_password where expiary_at < '$now' ");
$searchUser = $mysqli->prepare($query);
$searchUser->bind_param("s", $token);
$token = $_GET["token"];
$searchUser->execute();
$result = $searchUser->get_result();
$userId ;
$codeDB ;
if($result->num_rows > 0){
    $printCode = $result->fetch_assoc();
    $userId = $printCode["user_id"];
    $codeDB = $printCode["code"];
}else{
    die("error 4042");
}
$email = $mysqli->query("SELECT email from users where id='$userId' ")->fetch_assoc()["email"];
$send = new senderToken($email, $codeDB);
$send->sendEmail();

$error = [];
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $code = $_POST["num1"].$_POST["num2"].$_POST["num3"].$_POST["num4"];
    if(strlen($code) != 4){
        array_push($error , "يجب أن تكمل جميع الخانات");
    }
    if(empty($error)){
        if($code == $codeDB){
            $query = "UPDATE users SET isVerify = '1' where id='$userId'";
            $mysqli->query($query);
            $_SESSION["msg"] ="تم تفعيل حسابك شكرًا لك";
            $mysqli->query("DELETE from verify_password where user_id ='$userId'");
            
            header("location:../../login/login.php");
        }
    }
    
}