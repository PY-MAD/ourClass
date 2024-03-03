<?php
include $_SERVER['DOCUMENT_ROOT']."/ourClass/db/connection.php";
include_once "../APIroadMap/insertData.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST["user_email"];
    $codeSubject = $_POST["code_subject"];
    $AllowAbsent = $_POST["allowAbsent"];
    $timeAbsent = $_POST["timeAbsent"];

    $getUserId = $mysqli->query("SELECT id from users where email = '$email' ")->fetch_array()["id"];
    $getSubjectId = $mysqli->query("SELECT id from subjects where code_of_subject = '$codeSubject'")->fetch_array()["id"];
    UpdateAbsent($getUserId, $getSubjectId, $AllowAbsent , $timeAbsent);
}