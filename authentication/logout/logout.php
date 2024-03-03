<?php
include_once "../../config/config.php";
session_start();
if(isset($_SESSION["logged_in"])){
    $_SESSION = [];
    print_r($_SESSION);
    $_SESSION["logged_in"] = false;
}
$index = $config["url"]."index.php";
header("location:".$index);