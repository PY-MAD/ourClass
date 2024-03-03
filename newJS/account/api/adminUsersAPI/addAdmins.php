<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST["emailUserAdmin"])){
            $email = mysqli_escape_string($mysqli, $_POST["emailUserAdmin"]);
        }
        if(!empty($email)){
            $mysqli->query("UPDATE users SET typeOfUser = 'admin' where email ='$email' ");
        }
    }

