<?php

include 'config.php';

$message = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usr_id = filter_input(INPUT_POST, 'cna', FILTER_SANITIZE_STRING);
    $usr_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $confirm_password = $_POST['cpass'];
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);

    if (empty($usr_id) || empty($usr_name) || empty($email) || empty($_POST['pass']) || empty($confirm_password)) {
        $message[] = 'All fields are required.';
    } else if (!password_verify($confirm_password, $password)) {
        $message[] = 'Password and confirm password do not match.';
    } else if ($_FILES['image']['size'] > 2000000) {
        $message[] = 'Image size is too large.';
    } else {
        try {
            $select = $conn->prepare("SELECT * FROM `registered_users_ac` WHERE usr_id = ? OR email = ?");
            $select->execute([$usr_id, $email]);

            if ($select->rowCount() > 0) {
                while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                    if ($row['usr_id'] === $usr_id) {
                        $message[] = 'CNA already exists!';
                        break;
                    }
                    if ($row['email'] === $email) {
                        $message[] = 'Email already exists!';
                        break;
                    }
                }
            } else {
                $image = $_FILES['image']['name'];
                $image_tmp_name = $_FILES['image']['tmp_name'];
                $image_folder = 'assets/register_image/' . $image;
                $currentTime = date('Y-m-d H:i:s');
                // $insert = $conn->prepare("INSERT INTO `registered_users_ac`(usr_id, usr_name, email, password, image , phone) VALUES(?,?,?,?,?,?)");
                // $insert->execute([$usr_id, $usr_name, $email, $password, $image, $phone]);

                $insert = $conn->prepare("INSERT INTO `registered_users_ac`(usr_id, usr_name, email, password, image, phone, Registrationtime) VALUES(?,?,?,?,?,?,?)");
                $insert->execute([$usr_id, $usr_name, $email, $password, $image, $phone, $currentTime]);

                if ($insert) {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'Registered successfully!';
                    header('Location: login.php');
                    exit;
                }
            }
        } catch (PDOException $e) {
            $message[] = "Error: " . $e->getMessage();
        }
    }
}

?>

<!-- ****************************************************************************************************** -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | DSE.Maths介紹</title>
    <meta name="author" content="Ka Ho">
    <meta http-equiv="x-ua-compatible" content="ie=edgee,chrome=1">
    <!-- custon css file link -->
   <link rel="stylesheet" href="assets/css/register.css">
    <!-- bootstrap-icons -->
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css">
    <!-- font awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Kiston icon -->
    <link rel="icon" href="assets/img/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#12a0ff" />
    <meta name="robots" content="noindex">
</head>
<!-- ****************************************************************************************************** -->
<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<body>   
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        var confirmSubmit = confirm("Are you sure you want to register?");
        if (!confirmSubmit) {
            event.preventDefault();
        }
    });
});
</script>
<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data" id="registrationForm">
      <h3>register now</h3>
      <input type="text" required placeholder="enter your CNA*必須填寫 &emsp;&emsp; eg.210069852" class="box" name="cna" style="border: 2px solid var(--beige);" id="cnaInput" maxlength="9" onkeyup="checkCNA()">
      <span id="cnaError" style="color: red;"></span>
      <input type="text" required placeholder="enter your username*必須填寫&emsp;&emsp; eg.Lee Chi Nan  " class="box" name="name" style="border: 2px solid var(--beige);">
      
      <input type="email" required placeholder="enter your email*必須填寫&emsp;&nbsp; eg.cna + @iveclub.com" class="box" name="email" style="border: 2px solid var(--beige);" id="emailInput" onkeyup="checkEmail()">
      <span id="emailStatus"></span>
      <!-- check password strength -->
      <input type="password" required placeholder="enter your password*必須填寫&emsp;最多15位字符" class="box" name="pass" id="password" onkeyup="checkPasswordStrength()" style="border: 2px solid var(--beige);"  maxlength="15">
      <div id="password-strength" style="height: 10px; width: 0; background-color: red; margin-top: 10px;"></div>
      <div id="password-strength-text"></div>
      <!-- separate -->
      <input type="password" required placeholder="confirm your password*必須填寫&emsp;最多15位字符 " class="box" name="cpass" style="border: 2px solid var(--beige);"  maxlength="15">
      <div id="password-match-text"></div>
      <input type="text" placeholder="enter your phone number*必須填寫 &nbsp; 只接受香港號碼" class="box" name="phone" style="border: 2px solid var(--beige);" id="phoneInput" maxlength="8">
      <span id="phoneError" style="color: red;"></span>
     <!-- show photo -->
      <input type="file" name="image" class="box" accept="image/jpg, image/png, image/jpeg" onchange="uploadFile(this)">
      <label for="image" class="box" style="border: 2px solid var(--green);">請上載你的頭像照</label>

      <div id="file-upload-loader" style="display: none;">Uploading...</div>
      <div id="image-preview" style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden; margin-top: 10px;"></div>
      <!-- separate -->
      <p class="p_text">already have an account? <a href="login.php">login now</a></p>
      <input type="submit" value="register now" class="btn" name="submit">
      <br style="hidden">
      <p class="p_text">Don't want to log in yet?<a href="index.php">Home screen</a></p>
   </form>

</section>
<script src="assets/js/register.js"></script>
</script>
</body>
</html>