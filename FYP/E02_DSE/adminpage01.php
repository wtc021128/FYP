<?php

include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>
      <?php
      $select_profile = $conn->prepare("SELECT * FROM `registered_users_ac` WHERE id = ?");
      $select_profile->execute([$admin_id]);
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | DSE.Maths介紹</title>
    <meta name="author" content="Ka Ho">
    <meta http-equiv="x-ua-compatible" content="ie=edgee,chrome=1">
    <!-- custon css file link -->
    <link rel="stylesheet" href="assets/css/admin_page01.css">
    <!-- bootstrap-icons -->
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css">   
    <!-- font awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Kiston icon -->
    <link rel="icon" href="assets/img/faviacon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#12a0ff" />
    <meta name="robots" content="noindex">
</head>

<body>
<!-- nav bar -->

<!-- -->    
<nav class="navbar">
      <img src="assets/img/ive_club.jpg" class="navbar-logo" alt="logo" />
      
<!-- Welcome xxxname  --> 

      <!-- <h3>&emsp;Welcome ~ Account: <?= $fetch_profile['usr_name']; ?></h3> --> 
     
<!-- -->      

<!--nav list --> 
      <ul class="navbar-list">
        <li><a href="admin_index.php">Home</a></li>
<!-- one -->          
    <li><a href="#" onmouseover="toggleSubMenu('submenu')" onmouseout="hideSubMenu('submenu')">Ace Maths Classroom</a>
    <ul id="submenu" class="submenu" onmouseover="toggleSubMenu('submenu')" onmouseout="hideSubMenu('submenu')">
      <li><a href="#">Submenu Item 1</a></li>
      <li><a href="#">Submenu Item 2</a></li>
      <li><a href="#">Submenu Item 3</a></li>
    </ul>
  </li>
<!-- two -->  
  <li><a href="#" onmouseover="toggleSubMenu('submenu2')" onmouseout="hideSubMenu('submenu2')">AI Tutor</a>
    <ul id="submenu2" class="submenu" onmouseover="toggleSubMenu('submenu2')" onmouseout="hideSubMenu('submenu2')">
      <li><a href="#">Submenu Item 1</a></li>
      <li><a href="#">Submenu Item 2</a></li>
      <li><a href="#">Submenu Item 3</a></li>
    </ul>

        <li><a href="#">Convenient Feature</a></li>
        <li><a href="#">Relax Area</a></li>
      </ul>

&emsp;  
<!-- --> 
      <div class="profile-dropdown">
        <div onclick="toggle()" class="profile-dropdown-btn">
          <div class="profile-img">
          <img class="profile-img" src="assets/register_image/<?= $fetch_profile['image']; ?>" alt="">
            <i class="fa-solid fa-circle"></i>
          </div>
          <span><?= $fetch_profile['usr_name']; ?>
          <i class="fa-solid fa-angle-down"></i>
          </span>
        </div>

        <ul class="profile-dropdown-list">
          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-regular fa-user"></i>
              Edit Profile
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-regular fa-envelope"></i>
              Inbox
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-solid fa-chart-line"></i>
              Analytics
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-solid fa-sliders"></i>
              Settings
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-regular fa-circle-question"></i>
              Help & Support
            </a>
          </li>
          <hr />

          <li class="profile-dropdown-list-item">
            <a href="logout.php">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              Log out
            </a>
          </li>
        </ul>
      </div>
    </nav>
<!-- Jquery --> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- bootstrap -->    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/admin_page01.js"></script>
  </body>
</html>