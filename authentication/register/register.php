<?php
$pageName = "register";
include_once "../../template/headerInFile.php";
include_once "authRegister.php";
?>
<link rel="stylesheet" href="../../style/auth/login.css">
<?php
include_once "../../template/navInFile.php";
$nameColor = $emailColor = $passwordColor = "";
foreach($error as $i){
    if(str_contains($i, "name")){
        $nameColor = "red";
    }
    if(str_contains($i, "email")){
        $emailColor = "red";
    }
    if(str_contains($i, "password")){
        $passwordColor = "red";
    }
}
?>

<div class="container">
<h1 class="text-center mb-4">تسجيل</h1>
    <?php foreach($error as $i): ?>
    <?php if(str_contains($i, "exist")): ?>
    <div class="alert alert-danger mb-3" style="max-width: 30%; margin:auto;">
        <h4 class="mb-3">
            <?php echo "إيميلك بالفعل موجود !" ?>
        </h4>
        <p style="color: darkred !important; font-size: 16px;">إذا كنت ناسي الرقم السري الرجاء إعادة رقم السري من خلال تسجيل الدخول</p>
    </div>
    <?php endif ?>
    <?php endforeach ?>
    <form class="loginForm form form-container" method="post">
        <input style="border-color : <?php echo $nameColor ?>" id="name" type="text" name="name" class="form-control mb-3" placeholder="الإسم" value="<?php echo $name ?>">
        <input style="border-color : <?php echo $emailColor ?>" id="email" type="email" name="email" class="form-control mb-3" placeholder="الإيميل" value="<?php echo $email ?>">
        <input style="border-color : <?php echo $passwordColor ?>" id="password" type="password" name="password" class="form-control mb-3" placeholder="الرقم السري">
        <div class="gender d-flex justify-content-around">
            <div class="female form-check">
                <label for="female" class="form-check-label">انثى</label>
                <input type="radio" name="gender" class="form-check-input" id="female" value="female">
            </div>
            <div class="male form-check">
                <label for="male" class="form-check-label">ذكر</label>
                <input type="radio" name="gender" class="form-check-input" id="male" value="male">
            </div>
        </div>
        <div class="major w-100" style="direction: rtl;">
            <select name="major" id="major" class=" form-select">
                <option class=" form-control">علوم الحاسب</option>
                <option class=" form-control">نظم المعلومات</option>
                <option class=" form-control">تقنية المعلومات</option>
            </select>
        </div>
        <div class="major w-100 mt-3 mb-3" style="direction: rtl;">
            <select name="firstThreeNumberOfId" id="startCode" class=" form-select">
                <option value="" selected hidden disabled>أختر أول 3 أرقام من رقمك الجامعي</option>
                <option value="443" class=" form-control">443</option>
                <option value="444" class=" form-control">444</option>
                <option value="445" class=" form-control">445</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" id="signUpNew" value="تسجيل"></input>
    </form>
</div>
<?php include_once "../../template/footer.php"?>