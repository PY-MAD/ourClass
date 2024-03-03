<?php 
$user_id = $_SESSION["user_id"];
$query = $mysqli->query("SELECT * FROM subjects ORDER BY level");
$result = $query->fetch_all();
$level = "";
for ($i = 0; $i < count($result); $i++) {
    if ($level != $result[$i][4]) {
        $level = $result[$i][4]; ?>
        <div class="level d-flex align-items-center mb-5" id="<?php echo $level ?>">
            <div class="level_box ml-2 <?php echo $level; ?>" id='level-<?php echo $level ?>'>المستوى
                <?php echo $level; ?>
            </div>
            <?php for ($j = 0; $j < count($result); $j++) {
                if ($level == $result[$j][4]) {
                    $id = $result[$j][0];
                    $name = $result[$j][1];
                    $code = $result[$j][2];
                    $hour = $result[$j][3];
                    $active_color = "active_orange";
                    $doneSubjects = $mysqli->query("
                                SELECT * FROM users_subjects_done as subDone RIGHT JOIN subjects ON subDone.subject_id = subjects.id where user_id = '$user_id'and subject_id = '$id' limit 1");
                    $currentSubjects = $mysqli->query("
                                SELECT * FROM users_subjects_current as subCurrent RIGHT JOIN subjects ON subCurrent.subject_id = subjects.id where user_id = '$user_id' and subject_id = '$id' limit 1");
                    if ($doneSubjects->num_rows) { 
                        $active_color = "active_green";
                       // this is end if statement to check if subject in done or not
                    }elseif($currentSubjects->num_rows){
                            $active_color = "active_red";
                    } // this is end if statement to check if subject in current or not
                    
                    
                    ?>
                        <div class="position-relative">
                            <div class="subjects_box d-flex flex-column  <?php echo $active_color."  level-".$level; ?>" id="<?php echo $code; ?>">
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
                    <?php 
                }// this is end if statement to check if the subjects in the same level
            } // this is end forLoop to get Subjects
            ?>
        </div>

    <?php } // this is end if statement to check if level change or not
} // this is end forLoop to get build level and container to save all of subjects in the same level?>
</div>