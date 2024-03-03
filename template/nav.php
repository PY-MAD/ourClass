<?php
include_once "config/config.php";
$logoutDirFile = $config["url"]."authentication/logout/logout.php";

function addUser($name , $photo_src){
    global $logoutDirFile;
    $user = "
    <div class='user-side'>
    <div class='user'>
        <div class='dropdown'>
            <button class='btn border-0' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                <div class='userAvatar'>
                    <img id='user-Photo' src='$photo_src' alt='user Avatar'>
                    <div id='user-name'>$name</div>
                </div>
            </button>
            <ul class='dropdown-menu drop-down-anmi' style='width: 100%;
            text-align: right;'>
            <li class='drop-down-user'>
                <a class='dropdown-item border-bottom' href='user/account.php'>
                    <i class='fa-solid fa-user text-light'></i>
                    <div>الحساب</div>
                </a>
            </li>
                <li class='drop-down-user'>
                <a class='dropdown-item border-bottom' href='user/favorite.php'>
                    <i class='fa-solid fa-star text-light'></i>
                    <div>المفضلة</div>
                </a>
            </li>
              <li class='drop-down-user'>
                    <a class='dropdown-item' href=$logoutDirFile id='signOutBtn' type='submit'>
                    <i class='fa-solid fa-arrow-right-from-bracket text-light'></i>
                    <div>تسجيل الخروج</div>
                </a>
            </li>
            </ul>
          </div>
    </div>
</div>
    ";
    return $user;
}
?>
<title><?php echo $pageName." | ".$config["appName"] ?></title>
</head>
<body>
    <header id="header">
        <nav id="laptop">
            <button class="navbar-toggler" id="navbar-toggler" type="button">
                <i class="bi bi-list color-nav"></i>
                </button>
                <div class="nav-side unactive-nav">
                <button id="close">
                    <i class="bi bi-x-lg"></i>
                </button>
                <?php if(!$_SESSION["logged_in"]){?>
                    <div class="login-side mt-3">
                    <div class="login">
                    <a href="<?php echo $config["url"]."authentication/login/login.php" ?>" class="mx-3">تسجيل الدخول</a>
                        <a href="<?php echo $config["url"]."authentication/register/register.php" ?>">تسجيل</a>
                    </div>
                </div>
                <?php } else { 
                    echo addUser($_SESSION["name"], $_SESSION["photo_src"]);
                } ?>
            <div class="middle">
                <a href="ourClass/user/courses.html" >الدروس</a>
                <a href="ourClass/user/blog.html" >المدونة</a>
                <a href="ourClass/user/conversation.html">المناقشات</a>
                <a href="ourClass/user/homeworks.html">الواجبات</a>
                <a href="ourClass/user/exams.html">الإختبارات</a>
            </div>
                </div>
        <a href="ourClass/user/home.php">
            <div class="logo">
                OUR <div>CLASS.</div>
            </div>
        </a>
        </nav>
    </header>