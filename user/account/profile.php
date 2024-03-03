<?PHP $user_id = $_SESSION["user_id"];
?>
<div class="container-section" id="sectionuser-data">
            <div class="container-card">
                <div class="data-card">
                    <div class="img">
                        <img src="../assets/svg/userAvater/male.svg" alt="">
                    </div>
                    <div class="data-detail">
                        <div class="name"><?php echo $_SESSION["name"] ?></div>
                        <div class="email">الأيميل : <?php echo $_SESSION["email"] ?></div>
                        <div class="rank">
                            مرتبتك : 0
                        </div>
                        <div class="date">
                            <div class="date-of-signUp">تاريخ تسجيل الحساب : <?php echo $_SESSION["signUpDate"] ?></div>
                            <div class="date-of-signIn">أخر تسجيل دخول : <?php echo $_SESSION["signUpDate"] ?></div>
                        </div>
                        <div class="btn-edit">
                                <a class="btn btn-primary edit" href="<?php echo $config["url"]."newJS/account/editProfile/edit.php?id=$user_id" ?>">تعديل للبيانات</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-section">
                <div class="badges">
                    <div class="title">
                        الشارات
                    </div>
                    <div class="prograss-number">
                        <div class="prograss-from">

                        </div>
                        <div class="prograss-to">
                            100%
                        </div>
                    </div>
                    <div class="prograss" id="prograss"></div>
                    <div class="badges-content">
                        <div class="badges-img">
                            <img id="java-svg" src="../assets/svg/badge/java-oop.svg" alt="">
                            <div class="badge-title">
                                جافا 1
                            </div>
                        </div>
                        <div class="badges-img">
                            <img id="java-oop-svg" src="../assets/svg/badge/java-oop-black.svg" alt="">
                            <div class="badge-title">
                                جافا 2
                            </div>
                        </div>
                        <div class="badges-img">
                            <img id="java-oop-svg" src="../assets/svg/badge/data-str-black.svg" alt="">
                            <div class="badge-title">
                                تراكيب البيانات
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ass-quiz">
                    <div class="title">
                        الدرجات
                    </div>
                    <div class="quiz mb-2">
                        <p class="d-inline-flex gap-1 flex-column w-100 mb-0">
                            <button class="btn btn-primary rounded-bottom-0" type="button" data-bs-toggle="collapse"
                                data-bs-target="#quiz" aria-expanded="false" aria-controls="quiz">
                                الأختبارات
                            </button>
                        </p>
                        <div class="collapse" id="quiz">
                            <table id="quiz-table" class="bg-bluet w-100">
                                <tr class=" border-bottom">
                                    <th>الاختبار</th>
                                    <th>الدرجة</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="ass">
                        <p class="d-inline-flex gap-1 flex-column w-100 mb-0">
                            <button class="btn btn-primary rounded-bottom-0" type="button" data-bs-toggle="collapse"
                                data-bs-target="#ass" aria-expanded="false" aria-controls="ass">
                                الواجب
                            </button>
                        </p>
                        <div class="collapse" id="ass">
                            <table id="ass-table" class="bg-bluet rounded-bottom-2 w-100">
                                <tr class="border-bottom">
                                    <th>الواجب</th>
                                    <th>الدرجة</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>