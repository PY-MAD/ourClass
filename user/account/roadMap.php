<?php $user_id = $_SESSION["user_id"]; ?>
<div class="container-section flex-column unactive-Section"
    style="justify-content: flex-start; background-color: transparent;" id="sectionroad-map">
    <div class="container-section flex-column h-100 position-static" style="justify-content: flex-start; direction:rtl">
        <div class="choose-plane">
            <select name="" id="getMajor" class="form-select w-25">
                <option disabled hidden selected>إختر تخصصك</option>
                <option disabled>علوم الحاسب</option>
                <option value="CS_443">443 - CS</option>
                <option value="CS_444">444 - CS</option>
                <option value="CS_444">445 - CS</option>
                <option disabled>نظم المعلومات</option>
                <option value="IS_443">443 - IS</option>
                <option value="IS_444">444 - IS</option>
                <option value="IS_444">445 - IS</option>
                <option disabled>تقنية المعلومات</option>
                <option value="IT_443">443 - IT</option>
                <option value="IT_444">444 - IT</option>
                <option value="IT_444">445 - IT</option>
            </select>
        </div>
        <div class="defined mt-4 mb-5">
            <div class="box d-flex align-items-center mb-1">
                <div class="box-color active_black"></div>
                <div class="name-box">المادة لديها مطلب لم يجتاز</div>
            </div>
            <div class="box d-flex align-items-center mb-1">
                <div class="box-color active_orange"></div>
                <div class="name-box">المادة متاحة</div>
            </div>
            <div class="box d-flex align-items-center mb-1">
                <div class="box-color active_red"></div>
                <div class="name-box">مادة الترم القادم</div>
            </div>
            <div class="box d-flex align-items-center mt-1">
                <div class="box-color active_green"></div>
                <div class="name-box">تجاوزت المادة</div>
            </div>
        </div>
        <div class="total-hour mt-2 mb-5" id="total-hours-done-subjects">
            <span>مجموع الساعات التي تميتها : </span>
            <span id="total-hours-done">0</span>
        </div>
        <div class="container-levels">
            <?php include_once "inc/getCourses.php";?>

    </div>
    <div class="container-section flex-column current-level h-50 position-static mt-5"
        style="justify-content: flex-start; direction:rtl">
        <div class="title-section">قم بتحضير جدولك الترم القادم</div>
        <div class="total-hour mb-2" id="total-hours">
            <span>مجموع الساعات : </span>
            <span id="total-hours-update">0</span>
        </div>
        <div class="current-level d-flex align-items-center" id="current_level">
            <div class="level_box ml-2">المستوى القادم</div>

            <?php $getSubjects = $mysqli->query("
            SELECT * FROM users_subjects_current as subCurrent RIGHT JOIN subjects ON subCurrent.subject_id = subjects.id where user_id = '$user_id' ");
            $result = $getSubjects->fetch_all(MYSQLI_ASSOC);
            $counter = $getSubjects->num_rows;
            for($i = 0; $i<$counter; $i++){
                $code = $result[$i]["code_of_subject"];
                $name = $result[$i]["name_of_subject"];
                $hour = $result[$i]["hour_of_subject"];
            
            ?>
                <div class="position-relative" id="current-<?php echo $code; ?>">
            <div class="subjects_box d-flex flex-column active_orange current_level" >
                <span class="pd-top-bottom">
                    <?php echo $name ?>
                </span>
                <span>
                    <?php echo $code; ?>
                </span>
                <span class="pd-bottom">
                    <?php echo $hour ?>
                </span>
            </div>
            </div>
            <?php } ?>
        
    </div>
        </div>

</div>