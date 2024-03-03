<?php
$pageName = "verify Account";
include ($_SERVER['DOCUMENT_ROOT']."/ourclass/config/ServerInclude.php");

include ($serverInclude."template/headerInFile.php");
?>

<link rel="stylesheet" type="text/css" href="<?php echo $config["url"]."style/auth/login.css";?>" >
<?php
include_once ($serverInclude."template/navInFile.php");
include_once ($serverInclude."/authentication/register/token/token.php");
?>

<div class="container" style="height : 58vh">
<h1 class="text-center mb-4">توثيق الحساب</h1>
    <form class="loginForm form form-container" action="" method="POST">
        <div class="inputs d-flex flex-row flex-row-reverse">
        <input style="border-color : <?php echo $emailColor ?>" class="form-control w-25 p-3 text-center" name="num1" id="num" type="number" placeholder="" maxlength="1" min="0" max="9" size="1">
        <input style="border-color : <?php echo $emailColor ?>" class="form-control w-25 text-center" name="num2" id="num2" type="number" placeholder="" maxlength="1" min="0" max="9" size="1">
        <input style="border-color : <?php echo $emailColor ?>" class="form-control w-25 text-center" name="num3" id="num3" type="number" placeholder="" maxlength="1" min="0" max="9" size="1">
        <input style="border-color : <?php echo $emailColor ?>" class="form-control w-25 text-center" name="num4" id="num4" type="number" placeholder="" maxlength="1" min="0" max="9" size="1">
        </div>
        <input type="submit" class="btn btn-primary" id="loginExistAccount" value="تسجيل الدخول"></input>
    </form>
</div>
<?php include_once ($serverInclude."template/footer.php"); ?>