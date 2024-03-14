<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
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

<h1 class="title"> <span>admin</span> profile page </h1>

<section class="profile-container">

   <?php
      $select_profile = $conn->prepare("SELECT * FROM `registered_users_ac` WHERE id = ?");
      $select_profile->execute([$admin_id]);
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
   ?>


   <div class="profile">
      <img src="assets/register_image/<?= $fetch_profile['image']; ?>" alt="">
      
      <h3><?= $fetch_profile['usr_name']; ?></h3>
      
      <a href="admin_profile_update.php" class="btn">update profile</a>
      <a href="logout.php" class="delete-btn">logout</a>
      <div class="flex-btn">
         <a href="login.php" class="option-btn">login</a>
         <a href="register.php" class="option-btn">register</a>
      </div>
   </div>

</section>

</body>
</html>