<div class="container-section unactive-Section" id="sectionusers">
    <table id="user-table">
        <tr class="head">
            <th></th>
            <th>الايميل</th>
            <th>الاسم</th>
            <th>التخصص</th>
            <th>الجنس</th>
            <th>أخر تسجيل دخول</th>
            <th></th>
        </tr>

        <?php if ($user->num_rows > 0) {
            while ($i = $user->fetch_assoc()) {
                ?>
                <tbody>
                    <td>
                        <?php echo $counter++; ?>
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