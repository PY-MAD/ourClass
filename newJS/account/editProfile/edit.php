<?php
$pageName = "edit profile";
$getId = $_GET["id"];
include_once $_SERVER['DOCUMENT_ROOT']."/ourClass/template/headerInFile.php";
$user_id = $_SESSION["user_id"];
$result = $mysqli->query("SELECT email , name , major from users where id='$getId'");
if($result->num_rows){
    $result = $result->fetch_array();
    $name = $result["name"];
    $email = $result["email"];
    $major = $result["major"];
    $majors = ["علوم الحاسب","نظم المعلومات","تقنية المعلومات"];
}else{
    diePage();
}

function diePage(){
    $cardError = "
    <div class='w-100 h-100 d-flex justify-content-center mt-5'>
        <h1 style='color: #4D9DE0; font-size: 45px;'>ERROR 404</h1>
    </div>
    ";
    die($cardError);
}
if(!$getId || !isset($_GET) || $getId != $user_id){
    diePage();
}
$error = [];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = mysqli_escape_string($mysqli , $_POST["name"]);
    $email = mysqli_escape_string($mysqli , $_POST["email"]);
    $major = $_POST["major"];
    if(empty($name)){
        array_push($error , "name is not be empty");
    }
    if(empty($email)){
        array_push($error , "email is not be empty");
    }
    if(empty($error)){
        $mysqli->query("UPDATE users SET email = '$email', name = '$name', major = '$major' where id = '$user_id'");
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["major"] = $major;
        header('Location:'.$config["url"]."user/account.php");
        exit();
    }
    
    
}
include_once $_SERVER['DOCUMENT_ROOT']."/ourClass/template/navInFile.php";
?>
<div class="container-fluid mt-5" style="height: 98vh">
<h1 class="mb-5  text-center" >تعديل بيانات الحساب</h1>
<form action="" method="post" class="form w-50 m-auto">
    <div class="name m-auto w-50 mb-3">
        <label for="" class="form-label">الأسم</label>
        <input type="text" name="name" id="name" class="form-control   " value="<?php echo $name ?>" />
    </div>
    <div class="email m-auto w-50 mb-3">
        <label for="" class="form-label">الإيميل</label>
        <input type="text" name="email" id="email" class="form-control  " value="<?php echo $email ?>"/>
    </div>
    
    <div class="major m-auto w-50 mb-5">
        <label for="" class="form-label">التخصص</label>
        <select name="major" id="major" class="form-control">
            <?php foreach($majors as $i): ?>
                <?php if($i == $major){ ?>
                <option value="<?php echo $major ?>" selected ><?php echo $major ?></option>
                <?php }else{ ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="m-auto w-50 text-center">
        <button type="submit" class="btn btn-primary w-75">
            تعديل !
        </button>
    </div>
</form>
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT']."/ourClass/template/footer.php";
?>