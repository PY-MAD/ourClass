<?php
$pageName = "reset";
include_once "../../template/headerInFile.php";?>
<link rel="stylesheet" href="../../style/auth/login.css">
<?php
include_once "../../template/navInFile.php";
include_once "../senderMail/senderResetPassword.php";

$emailColor ="";
foreach($error as $i){
    if(str_contains($i, "email") && !str_contains($i, "not fount !")){
        $emailColor = "red";
    }
}
?>

<div class="container" style="height : 58vh">
<h1 class="text-center mb-4">نسيت الرقم السري</h1>
    <?php if(isset($_SESSION["reset_msg"])): ?>
        <div class="alert alert-success w-50  m-auto mb-4">
            <h4>
                <?php echo $_SESSION["reset_msg"]; ?>
            </h4>
        </div>
    <?php $_SESSION["reset_msg"] = ""; ?>
    <?php endif ?>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger w-50  m-auto mb-4">
            <h4>
                <?php echo $error[0]; ?>
            </h4>
        </div>
    <?php endif ?>
    <form class="loginForm form form-container" action="" method="POST">
        <input style="border-color : <?php echo $emailColor ?>" class="form-control" name="email" id="email1" type="email" placeholder="الإيميل">
        <input type="submit" class="btn btn-primary w-50 m-auto text-center" id="loginExistAccount" value="طلب التغيير !"></input>
    </form>
</div>
<?php include_once "../../template/footer.php" ?>