<?php
include $_SERVER['DOCUMENT_ROOT']."/ourClass/db/connection.php";
include "insertData.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $code = mysqli_escape_string($mysqli, $_POST["code"]);
    $email = mysqli_escape_string($mysqli, $_POST["email"]);
    $checkCourse = $mysqli->query("SELECT * FROM subjects where code_of_subject = '$code'");
    $checkUser = $mysqli->query("SELECT * FROM users where email = '$email'");
    $subjects_id;
    $user_id;
    if($checkCourse->num_rows){
        $subjects_id = $checkCourse->fetch_array()["id"];
        if($checkUser->num_rows){
            $user_id = $checkUser->fetch_array()["id"];
            RemoveSubjectCurrent($user_id, $subjects_id);
            removeAbsent($user_id, $subjects_id);
        }
    }else{
        echo "can't find the course !";
    }
}