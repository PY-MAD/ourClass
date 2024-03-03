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
        $subjects_detail = $checkCourse->fetch_array();
        $subjects_id = $subjects_detail["id"];
        $subjects_hours = $subjects_detail["hour_of_subject"]; 
        $AllowAbsent = (int)$subjects_hours*3;

        if($checkUser->num_rows){
            $user_id = $checkUser->fetch_array()["id"];
            addSubjectCurrent($user_id, $subjects_id);
            addAbsent($user_id, $subjects_id,$subjects_hours, $AllowAbsent,0);
        }
    }else{
        echo "can't find the course !";
    }
}