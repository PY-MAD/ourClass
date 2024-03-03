<?php
$pageName = "reset";
include_once "../../template/headerInFile.php";?>
<link rel="stylesheet" href="../../style/auth/login.css">
<?php
include_once "../../template/navInFile.php";
include_once "../changePassword.php";
?>

<div class="container" style="height : 58vh">
<h1 class="text-center mb-4">نسيت الرقم السري</h1>
    <form class="loginForm form form-container" action="" method="POST">
        <input style="border-color : <?php echo $passwordColor ?>" class="form-control" name="password" id="email1" type="password" placeholder="كلمة المرور">
        <input style="border-color : <?php echo $passwordConfirmColor ?>" class="form-control" name="passwordConfirm" id="passwordConfirm" type="password" placeholder="تأكيد كلمة المرور">
        <input type="submit" class="btn btn-primary w-50 m-auto text-center" id="loginExistAccount" value="طلب التغيير !"></input>
    </form>
</div>
<?php include_once "../template/footer.php" ?>