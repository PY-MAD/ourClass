<?php


include $_SERVER['DOCUMENT_ROOT']."/ourClass/db/connection.php";

function addSubjectDone($user_id , $subject_id){
    global $mysqli;
    $mysqli->query("INSERT INTO users_subjects_done (user_id, subject_id) VALUES('$user_id','$subject_id')");
}
function addSubjectCurrent($user_id , $subject_id){
    global $mysqli;
    $mysqli->query("INSERT INTO users_subjects_Current (user_id, subject_id) VALUES('$user_id','$subject_id')");
}
function addAbsent($user_id , $subject_id , $hours, $AllowAbsent, $TimesAbsent){
    global $mysqli;
    $mysqli->query("INSERT INTO absent (user_id, subject_id,hours_subject, allowAbsent, TimesAbsent) VALUES('$user_id','$subject_id','$hours','$AllowAbsent', '$TimesAbsent')");
}
function UpdateAbsent($user_id , $subject_id , $AllowAbsent, $TimesAbsent){
    global $mysqli;
    $mysqli->query("UPDATE absent set allowAbsent = '$AllowAbsent', TimesAbsent = '$TimesAbsent' where user_id = '$user_id' and subject_id = '$subject_id' limit 1");
}
function removeAbsent($user_id , $subject_id){
    global $mysqli;
    $mysqli->query("DELETE FROM absent where user_id = '$user_id' and subject_id = '$subject_id' limit 1");
}
function RemoveSubjectDone($user_id , $subject_id){
    global $mysqli;
    $mysqli->query("DELETE FROM users_subjects_done where user_id = '$user_id' and subject_id = '$subject_id' limit 1");
}
function RemoveSubjectCurrent($user_id , $subject_id){
    global $mysqli;
    $mysqli->query("DELETE FROM users_subjects_Current where user_id = '$user_id' and subject_id = '$subject_id' limit 1");
}