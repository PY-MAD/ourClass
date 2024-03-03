<?php include_once $_SERVER['DOCUMENT_ROOT']."/ourClass/newJS/account/api/adminUsersAPI/addAdmins.php"; ?>
<div class="container-section unactive-Section flex-column" id="sectionadmin">
    <form  class="addAdmin mb-3 d-flex" style="direction: rtl;" method="POST">
        <div class="input" style="margin-left: 2%;">
        <input type="email" class=" form-control" style="direction: rtl;" name="emailUserAdmin" id="inputAdmin" placeholder="ضع إيميل الشخص هنا"></div>
        <div class="btn-add">
            <button id="add"><i class="bi bi-person-plus-fill"></i></button>
        </div>
    </form>
    <table id="table-admin" class="m-auto">
        <tr class="head">
            <th></th>
            <th>الايميل</th>
            <th>الاسم</th>
            <th>التخصص</th>
            <th>الجنس</th>
            <th>أخر تسجيل دخول</th>
            <th></th>
        </tr>
        <?php
        $getAdminUsers = "SELECT id,name,email,major,sex,dateOfRegister FROM users where typeOfuser = 'admin' ";
        $checkDB = $mysqli->query($getAdminUsers);
        ?>
        <?php if ($checkDB->num_rows > 0) {
            while ($i = $checkDB->fetch_assoc()) {
                ?>
                <tbody>
                    <td>
                        <?php echo $i["id"]; ?>
                    </td>
                    <td>
                        <?php echo $i["name"] ?>
                    </td>
                    <td>
                        <?php echo $i["email"] ?>
                    </td>
                    <td>
                        <?php echo $i["major"] ?>
                    </td>
                    <td>
                        <?php echo $i["sex"] ?>
                    </td>
                    <td>
                        <?php echo $i["dateOfRegister"] ?>
                    </td>
                    <td>
                        <button class="btn btn-delete-admin"
                        style="font-size: 40px; color: white !important;"
                        id="<?php echo $i["email"]; ?>"
                        ><i class="bi bi-person-x-fill"></i></button>
                    </td>
                </tbody>
                <?php
            }
        }
        ?>
    </table>
</div>