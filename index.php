<?php
$pageName = "home";
    include_once "template/header.php";
    include_once "template/nav.php";
?>
<head>
<link rel="stylesheet" href="style.css">
</head>
    <section class="top">
            <div class="img">
                <img src="assets/svg/homePage.min.svg" alt="">
            </div>
            <div class="text">
                <div class="top-title">
                    <h1>تعلم معنا وين ماكنت !</h1>
                </div>
                <div class="bottom-pra">
                    <p>
                        في مكان واحد، نوفر لك كل ما تحتاجه لدروسك في الجامعة مع أفضل المعلمين.
                    </p>
                </div>
            </div>
    </section>
    <section id="middle">
        <div class="title">
            <h1>وش يميزنا ؟</h1>
        </div>
        <div class="benefit">
            <div class="img-benefit">
                <img src="assets/svg/home/homeworks.min.svg" alt="">
            </div>
            <div class="text">
                <div class="title-benefit">واجبات</div>
                <div class="pra-benefit">نقدم لك تمارين عشان تساعدك في فهم المادة</div>
            </div>
        </div>
        <div class="benefit">
            <div class="img-benefit">
                <img src="assets/svg/home/chat.min.svg" alt="">
            </div>
            <div class="text">
                <div class="title-benefit">مناقشات</div>
                <div class="pra-benefit">نوفر لك بيئة مناقشات مع الطلاب لمناقشة الافكار</div>
            </div>
        </div>
        <div class="benefit">
            <div class="img-benefit">
                <img src="assets/svg/home/article.min.svg" alt="">
            </div>
            <div class="text">
                <div class="title-benefit">مصادر تعلم</div>
                <div class="pra-benefit">نقدم لك مصادر تعلم موثوقة تساعدك بالتطوير نفسك</div>
            </div>
        </div>
    </section>
    <section id="watch" class="watch">
        <div class="title">
            <h1>تقدر تتابعنا من أي جهاز </h1>
        </div>
        <div class="img">
            <img src="assets/svg/home/phones.webp" alt="">
        </div>
    </section>
<script src="index.js" ></script>
<?php include_once "template/footer.php" ?>