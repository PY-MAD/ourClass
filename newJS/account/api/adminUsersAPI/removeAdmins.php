<?php


include $_SERVER['DOCUMENT_ROOT']."/ourClass/db/connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = mysqli_escape_string($mysqli, $_POST["email"]);
    
    $mysqli->query("UPDATE users SET typeOfUser = 'user' where email ='$email' ");
    echo "delete is done";
}