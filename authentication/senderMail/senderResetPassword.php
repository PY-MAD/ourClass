<?php
include_once "../../config/config.php";
$error = [];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = mysqli_escape_string($mysqli, $_POST["email"]);
    if(empty($_POST["email"])){
        array_push($error, "the email is reqiested");
        
    }
    if(empty($error)){
    $SearchQuery = "SELECT id, email from users where email = '$email' limit 1";
    $checkDB = $mysqli->query($SearchQuery);
    if($checkDB->num_rows){
        $userId = $checkDB->fetch_assoc()["id"];
        $tokenExist = $mysqli->query("delete from password_reset where user_id = '$userId' ");
        $token = bin2hex(random_bytes(16));
        
        $expires_at = date("Y-m-d H:i:s" , strtotime('+1 day'));
        $mysqli->query("insert into password_reset (user_id, token , expiray_at)
        VALUES('$userId','$token','$expires_at')
        ");
        // email sender
        $to = $_POST["email"];
        $reqestPassword = $config["url"]."authentication/resetPassword/token/resetPasswordToken.php?token=".$token;
        $subject = "RESET PASSWORD";
        $txt = "
        <html lang='ar'>
        <head>
        <meta charset='UTF-8'>
                <!-- google fonts -->
                <link rel='preconnect' href='https://fonts.googleapis.com'>
                <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                <link href='https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Rubik:wght@300;400;500;600;700;800;900&display=swap' rel='stylesheet'>
        </head>
        <style>
            *{
                font-family: 'Rubik';
            }
        </style>
        <body style='margin: auto;'>
            <div class='container' style='
            align-items:justify;
            align-items: center;
            background-color: #4D9DE0;
            color: white;
            padding: 20px 0px;
            border-radius: 12px;
            max-width: 70%;
            margin-left: auto;
            margin-right: auto;
            '>
                <h1 style='text-align:center'>
                    OUR <br>CLASS
                </h1>
                <p style='font-size : 28px; text-align:center'>تشرفنا فيك في موقعنا</p>
                <p style='font-size : 28px; text-align:center'>إذا حاب تغيير الرقم السري إضغط على الزر الي تحت</p>
                <h4 style='text-align:center'>
                <a style='
                text-decoration: none;
                color: white;
                background-color: white;
                color: #4D9DE0;
                font-size:18px;
                padding: 16px 20px;
                border-radius: 12px;
                font-weight: 500;
                text-align:center;
                ' href='$reqestPassword'>
                    غير الباسورد
                </a>
                </h4>
            </div>
        </body>
        </html>
        ";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: msmhawas@gmail.com' . "\r\n";


        mail($to,$subject,$txt,$headers);
        $_SESSION["reset_msg"] = "تم إرسال رابط إعادة كلمة المرور عن طريق الايميل";
        }else{
            array_push($error,"الحساب ليس موجود الرجاء التسجيل");
        }
    }
}
