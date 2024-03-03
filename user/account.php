<?php
$pageName = "account";
include_once "../template/headerInFile.php";
include "../db/connection.php";
?>

<link rel="stylesheet" href="../style/account.css">
<link rel="stylesheet" href="../style/preloader.css">
<link rel="stylesheet" href="../style/missing-account.css">
<?php
include_once "../template/navInFile.php";

$us = "SELECT name,email,major,sex,dateOfRegister FROM users";
$user = $mysqli->query($us);
$counter = 1;
?>
<section id="section" class="profile-section">
    <aside>
        <div id="user-data" class="name-data active-li active"><i class="fa-solid fa-user"></i>الحساب</div>
        <div id="road-map" class="name-data"><i class="bi bi-calendar-range-fill"></i>الخطة الدراسية</div>
        <div id="hours-map" class="name-data"><i class="bi bi-hourglass-split"></i>حساب ساعات الغياب</div>
        <?php if($_SESSION["typeOfUser"] == "admin"): ?>
            <div id="users" class="name-data"><i class="fa-solid fa-users"></i>الأعضاء</div>
            <div id="admin" class="name-data"><i class="fa-solid fa-user-gear"></i>المشرفين</div>
        <?php endif ?>
    </aside>
    <div class="container-sections">
        <?php include_once "account/profile.php" ?>
        <!-- road map -->
        <?php include_once "account/roadMap.php"; ?>
        <!-- hours -->
        <?php include_once "account/hours_absent.php"; ?>
    <?php if($_SESSION["typeOfUser"] == "admin"):?>
        <!-- users -->
        <?php include_once "account/users.php"; ?>
        <!-- admins -->
        <?php include_once "account/admins.php"; ?>
    <?php endif ?>
</section>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo $config["url"] . "js/userData/account.js" ?>"></script>
<script src="<?php echo $config["url"] . "newJS/account/roadMapJS/changeColorsSubjects.js";?>" type="module"></script>
<script src="<?php echo $config["url"] . "newJS/account/absent/absent.js";?>" type="module"></script>

<?php if($_SESSION["typeOfUser"] == "admin"): ?>
    <script src="<?php echo $config["url"] . "newJS/account/api/adminUsersAPI/APIRemoveData.js";?>" type="module"></script>
<?php endif ?>
<script src="<?php echo $config["url"] . "newJS/alertJS/alerts.js";?>" type="module"></script>
<?php include_once "../template/footer.php" ?>