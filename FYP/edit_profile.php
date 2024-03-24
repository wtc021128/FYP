<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['update'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   
   $update_profile = $conn->prepare("UPDATE `registered_users_ac` SET usr_name = ?, email = ? WHERE id = ?");
   $update_profile->execute([$name, $email, $admin_id]);

   $select_profile = $conn->prepare("SELECT * FROM `registered_users_ac` WHERE id = ?");
   $select_profile->execute([$admin_id]);
   $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

   $old_image = $_POST['old_image'];
   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   $image_folder = 'assets/register_image/'.$image;


   if(!empty($image)){

      if($image_size > 2000000){
         $message[] = 'image size is too large';
      }else{
         $update_image = $conn->prepare("UPDATE `registered_users_ac` SET image = ? WHERE id = ?");
         $update_image->execute([$image, $admin_id]);

         if($update_image){
            move_uploaded_file($image_tmp_name, $image_folder);
            if(file_exists('assets/register_image/'.$old_image)){
            unlink('assets/register_image/'.$old_image);
         }
            $message[] = 'image has been updated!';
         }
      }

   }
   $old_pass = $_POST['old_pass'];
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $previous_pass = md5($_POST['previous_pass']);
   $previous_pass = filter_var($previous_pass, FILTER_SANITIZE_STRING);
   $new_pass = md5($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = md5($_POST['confirm_pass']);
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);
   
   if(!empty($previous_pass) || !empty($new_pass) || !empty($confirm_pass)){
      
      // if($previous_pass != $old_pass){
         if($fetch_profile['password'] != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         $update_password = $conn->prepare("UPDATE `registered_users_ac` SET password = ? WHERE id = ?");
         $update_password->execute([$new_pass, $admin_id]);
         $message[] = 'password has been updated!';
      }
   }}
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
    <link rel="stylesheet" href="assets/css/login.css">
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

<body>

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

<h1 class="title"> update profile </h1>

<section class="update-profile-container">

   <?php
      $select_profile = $conn->prepare("SELECT * FROM `registered_users_ac` WHERE id = ?");
      $select_profile->execute([$admin_id]);
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="assets/register_image/<?= $fetch_profile['image']; ?>" alt="">
      <div class="flex">
         <div class="inputBox">
            <span>username : </span>
            <input type="text" name="name" required class="box" placeholder="enter your name" value="<?= $fetch_profile['usr_name']; ?>">
            <span>email : </span>
            <input type="email" name="email" required class="box" placeholder="enter your email" value="<?= $fetch_profile['email']; ?>">
            <span>profile pic : </span>
            <input type="hidden" name="old_image" value="<?= $fetch_profile['image']; ?>">
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?= $fetch_profile['password']; ?>">
            <span>old password :</span>
            <input type="password" class="box" name="previous_pass" placeholder="enter previous password" >
            <span>new password :</span>
            <input type="password" class="box" name="new_pass" placeholder="enter new password" >
            <span>confirm password :</span>
            <input type="password" class="box" name="confirm_pass" placeholder="confirm new password" >
         </div>
      </div>
      <div class="flex-btn">
         <input type="submit" value="update profile" name="update" class="btn">
         <a href="admin_index.php" class="option-btn">go back</a>
      </div>
   </form>

</section>

</body>
</html>