<?php
class senderToken{
    public $code;
    public  $to;
    function __construct($to , $code){
        $this->to = $to;
        $this->code = $code;
    }

        PUBLIC $subject = "توثيق الحساب"; 
        function setCode($code){
            $this->code = $code;
        }
        function setTo($to){
            $this->to = $to;
        }
        function getCode(){
            return $this->code;
        }
        
        function bodyText($code){
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
                    <p style='font-size : 28px; text-align:center'>رمز الكود لتوثيق الحساب هو :</p>
                    <div class='code' style='
                    margin-left: auto;
                    margin-right: auto;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    justify-content: space-around;
                    padding: 0 120px;
                    '>
                    <h4 style='font-size: 60px; font-weight: 400'>".$code."</h4>
                    </div>
                </div>
            </body>
            </html>
            ";
            return $txt;
        }


        // Always set content-type when sending HTML email
        PUBLIC  $headers = "MIME-Version: 1.0" . "\r\n"."Content-type:text/html;charset=UTF-8" . "\r\n".'From: msmhawas@gmail.com' . "\r\n";

        function sendEmail(){
            mail($this->to,$this->subject,$this->bodyText($this->getCode()),$this->headers);
        }
}

