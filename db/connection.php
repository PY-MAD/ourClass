<?php



$connectionDate = [
    "host"=>"localhost",
    "user"=>"root",
    "password"=>"",
    "database"=>"ourclass",
];

$mysqli = new mysqli(
    $connectionDate["host"],
    $connectionDate["user"],
    $connectionDate["password"],
    $connectionDate["database"],
);

if($mysqli -> connect_error){
    die("connection not working ! ");
}