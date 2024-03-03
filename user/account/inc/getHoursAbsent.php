<?php
$user_id = $_SESSION["user_id"];
$getData = $mysqli->query("SELECT * from absent RIGHT JOIN subjects as sub ON absent.subject_id = sub.id where user_id = '$user_id' ");
$result = $getData->fetch_all(MYSQLI_ASSOC);
foreach($result as $sub){?>
    <tr>
        <td><?php echo $sub["name_of_subject"] ?></td>
        <td id="hour"><?php echo $sub["hours_subject"] ?></td>
        <td id="<?php echo $sub["code_of_subject"]?>-absent"><?php echo $sub["allowAbsent"]?></td>
        <td id="<?php echo $sub["code_of_subject"]?>-accessAbsent"><?php echo $sub["TimesAbsent"]?></td>
        <td class="d-flex">
            <button id="<?php echo $sub["code_of_subject"]?>" class="btn btn-add btn-group btn-light button-pulse ms-2">1+</button> 
            <button id="<?php echo $sub["code_of_subject"]?>" class="btn btn-add btn-group btn-light button-mines">1-</button>
        </td>
    </tr>
<?php } ?>
