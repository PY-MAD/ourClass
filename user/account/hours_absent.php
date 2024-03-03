<div class="container-section flex-column  unactive-Section" style="direction:rtl;" id="sectionhours-map">
    <div class="add-subjects d-flex">
        <input type="text" name="" id="get-nameSubjects-hours" class="form-control" placeholder="أسم المادة">
        <input type="number" pattern="[0-9]*" inputmode="numeric" name="" id="get-hours" class="form-control"
            placeholder="ساعات المادة" max="5" min="0">
        <i class="bi bi-plus-lg pe-2" id="add-subjects-hours"></i>
    </div>
    <div class="container-subjects-hours mt-5 mb-5 d-flex justify-content-center">
        <table>
            <tbody>
                <tr>
                    <th>أسم المادة</th>
                    <th>عدد ساعات المادة في الأسبوع</th>
                    <th>عدد الغيابات</th>
                    <th>عدد الغيابات المسموحة</th>
                    <th>غياب ساعة</th>
                </tr>
            </tbody>
            <tbody id="container-subjects">
                <?php include_once "inc/getHoursAbsent.php" ?>
            </tbody>
        </table>
    </div>
</div>