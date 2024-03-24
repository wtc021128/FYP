<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_type'])) {
    header('location: login.php');
    exit;
}

$user_type = $_SESSION['user_type'];

if ($user_type === 'admin') {
    $user_id = $_SESSION['admin_id'];
} elseif ($user_type === 'teacher') {
    $user_id = $_SESSION['teacher_id'];
} elseif ($user_type === 'user') {
    $user_id = $_SESSION['user_id'];
}

$select_profile = $conn->prepare("SELECT usr_name, image FROM `registered_users_ac` WHERE id = ?");
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

if (!$fetch_profile) {
    exit("Profile not found!");
}
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
      <?php if ($user_type == 'admin'): ?>
        <li><a href="admin_index.php">Home</a></li>
    <?php elseif ($user_type == 'teacher'): ?>
        <li><a href="teacher_index.php">Home</a></li>
    <?php elseif ($user_type == 'user'): ?>
        <li><a href="user_index.php">Home</a></li>
    <?php endif; ?>
       
<!-- one -->          
    <li><a href="#" onmouseover="toggleSubMenu('submenu')" onmouseout="hideSubMenu('submenu')">Ace Maths Classroom</a>
    <ul id="submenu" class="submenu" onmouseover="toggleSubMenu('submenu')" onmouseout="hideSubMenu('submenu')">
    <?php if ($user_type == 'admin'): ?>
        <li><a href="QA_A.php">Reference questions and internships</a></li>
        <li><a href="test.php">Question Bank</a></li>
        <li><a href="Learning.php">Learning</a></li>
    <?php elseif ($user_type == 'teacher'): ?>
        
        <li><a href="QA_A.php">Reference questions and internships</a></li>
        <li><a href="test.php">Question Bank</a></li>
        <li><a href="Learning.php">Learning</a></li>
    <?php elseif ($user_type == 'user'): ?>
        
        <li><a href="QA_A.php">Reference questions and internships</a></li>
       <li><a href="test.php">Question Bank</a></li>
       <li><a href="Learning.php">Learning</a></li>
    <?php endif; ?>
    </ul>
  </li>
<!-- two -->  
  <li><a href="#" onmouseover="toggleSubMenu('submenu2')" onmouseout="hideSubMenu('submenu2')">AI Tutor</a>
    <ul id="submenu2" class="submenu" onmouseover="toggleSubMenu('submenu2')" onmouseout="hideSubMenu('submenu2')">
      <li><a href="firstgptweb.php">Ramdom GPT</a></li>
      <li><a href="ocr.php">OCR</a></li>
    </ul>
        <li><a href="calculator.php">Convenient Feature</a></li>  
        <li><a href="game.php">Relax Area</a></li>
      </ul>

&emsp;  
<!-- --> 
<div class="profile-dropdown">
    <div onclick="toggle()" class="profile-dropdown-btn">
        <div class="profile-img">
            <img class="profile-img" src="assets/register_image/<?= isset($fetch_profile['image']) ? $fetch_profile['image'] : 'default_image.jpg'; ?>" alt="">
            <i class="fa-solid fa-circle"></i>
        </div>
        <span>
            <?php if (isset($fetch_profile) && $fetch_profile !== null && isset($fetch_profile['usr_name'])): ?>
                <?= $fetch_profile['usr_name']; ?>
            <?php else: ?>
                User Name Unavailable
            <?php endif; ?>
            <i class="fa-solid fa-angle-down"></i>
        </span>
    </div>

    <ul class="profile-dropdown-list">
        <li class="profile-dropdown-list-item">
        <?php if ($user_type == 'admin'): ?>
            <a href="edit_profile.php">
                <i class="fa-regular fa-user"></i>
                Edit Profile
            </a>
    <?php elseif ($user_type == 'teacher'): ?>
        <a href="edit_profilet.php">
                <i class="fa-regular fa-user"></i>
                Edit Profile
            </a>
    <?php elseif ($user_type == 'user'): ?>
        <a href="edit_profileu.php">
                <i class="fa-regular fa-user"></i>
                Edit Profile
            </a>
    <?php endif; ?>
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