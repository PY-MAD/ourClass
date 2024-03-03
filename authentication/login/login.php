<?php
$pageName = "login";
include_once "../../template/headerInFile.php";?>
<link rel="stylesheet" href="../../style/auth/login.css">
<?php
include_once "../../template/navInFile.php";
include_once "authLogin.php";

$emailColor = $passwordColor = "";
foreach($error as $i){
    if(str_contains($i, "email") && !str_contains($i, "not fount !")){
        $emailColor = "red";
    }
    if(str_contains($i, "password") && !str_contains($i, "not correct") ){
        $passwordColor = "red";
    }
}
?>

<div class="container" style="height : 58vh">
<?php foreach($error as $i): ?>
    <?php if(str_contains($i, "not correct") || str_contains($i, "Email not fount !")): ?>
    <div class="alert alert-danger mb-3" style="max-width: 30%; margin:auto;">
        <h4 class="mb-3">
            <?php echo "هذا الحساب ليس موجود او الرقم السري غير صحيح" ?>
        </h4>
        <p style="color: darkred !important; font-size: 16px;">إذا كنت ناسي الرقم السري الرجاء إعادة رقم السري من خلال تسجيل الدخول</p>
    </div>
    <?php endif ?>
    <?php endforeach ?>
    <?php if(isset($_SESSION["msg"] )){
            if(!empty($_SESSION["msg"])){?>
    <div class="alert alert-success mb-3" style="max-width: 30%; margin:auto;">
        <h4><?php echo $_SESSION["msg"] ?></h4>
    </div>
    <?php $_SESSION["msg"] = "";
    }}?>
<h1 class="text-center mb-4">تسجيل الدخول</h1>
    <form class="loginForm form form-container" action="" method="POST">
        <input style="border-color : <?php echo $emailColor ?>" class="form-control" name="email" id="email1" type="email" placeholder="الإيميل" value="<?php echo $email ?>">
        <input style="border-color : <?php echo $passwordColor ?>" class="form-control" name="password" id="password1" type="password" placeholder="الرقم السري">
        <a class="forget-passwords" href="../resetPassword/resetPassword.php">نسيت الرقم السري ؟</a>
        <input type="submit" class="btn btn-primary" id="loginExistAccount" value="تسجيل الدخول"></input>
    </form>
</div>
<?php include_once "../../template/footer.php" ?>