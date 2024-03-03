<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
include_once "db/connection.php";
$code = "subjects_CS443.json";
$read = file_get_contents($code);
$users = json_decode($read, true);
$sub = "sub";
$codeOfSub = "code";
$hour = "hour";
$ss = "CS443";
?>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">subjects</th>
            <th scope="col">code</th>
            <th scope="col">hours</th>
            <th scope="col">level</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // var_dump($users[0]->$name[0]->$email);
            foreach($users[$ss] as $i){?>
                <?php foreach(array_keys($i) as $j){
                    $level = $j;
                ?>
                <?php foreach($i[$level] as $j) {?>
                    <?php?>
                    <tr>
                    <td></td>
                        <td><?php $subDB =  $j["sub"]?></td>
                        <td><?php $codeDB = $j["code"]?></td>
                        <td><?php $hourDB = $j["hour"]?></td>
                        <td><?php echo $levelDB = explode("_",$level)[1];?></td>
                        <?php $mysqli->query("INSERT INTO subjects(name_of_subject , code_of_subject, hour_of_subject , level , major) 
                        VALUES('$subDB','$codeDB','$hourDB','$levelDB','CS')
                        "); ?>

                    </tr>
            <?php }}}  ?>
    </tbody>
</table>






<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>