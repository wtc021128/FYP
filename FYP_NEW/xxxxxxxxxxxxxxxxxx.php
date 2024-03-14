<!-- 注意事項
******建議改動前做一份你依家嗰份最新backup先， 改動發現有問題可以立即回車。
1.這樣可以控制三個不同user show邊個nav list， 減少使用製作更多的php檔案。 這樣會統一曬用adminpage01.php 做主要的檔案， 其他teacherpage.php 和userpage.php 就可以不用做改動。 
等於你想要show嗰part做一次全部在adminpage01.php就可以，不用改動三個頁面。 
不過你有些如果admin同teacher 有完全的功能可以用同一個php link， 但user 如果有些功能不一樣要另外新開一個php， 之後塞返條link落去。
2. 你每part舊同新咁樣對住改。
因為我得未更新嗰個版本， 所以舊同新都有畀你， 對住嚟改。
 如果你發現當中自己嗰part有什麼改過格式之類， 你要看著放返上去。
3.要將teacher_index.php 和 user_index.php→本身用teacherpage.php 和userpage.php改用adminpage.php。
 -->
<!-- old -->
<!-- 1.	adminpage01.php   1-17 line-->
<!-- old -->
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

<!-- new  -->
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


<!-- 2.	adminpage01.php   54-61 line  另外two嗰度都可以咁樣調節 -->
<!-- old -->
<!-- one -->          
<li><a href="#" onmouseover="toggleSubMenu('submenu')" onmouseout="hideSubMenu('submenu')">Ace Maths Classroom</a>
    <ul id="submenu" class="submenu" onmouseover="toggleSubMenu('submenu')" onmouseout="hideSubMenu('submenu')">
      <li><a href="#">Submenu Item 1</a></li>
      <li><a href="#">Submenu Item 2</a></li>
      <li><a href="#">Submenu Item 3</a></li>
    </ul>
  </li>

<!-- new  -->
<!-- one -->          
<li><a href="#" onmouseover="toggleSubMenu('submenu')" onmouseout="hideSubMenu('submenu')">Ace Maths Classroom</a>
    <ul id="submenu" class="submenu" onmouseover="toggleSubMenu('submenu')" onmouseout="hideSubMenu('submenu')">
    <?php if ($user_type == 'admin'): ?>
        <li><a href="#">Submenu Item 1</a></li>
        <li><a href="#">Submenu Item 2</a></li>
        <li><a href="#"></a></li>
    <?php elseif ($user_type == 'teacher'): ?>
        <li><a href="#">Submenu Item 2</a></li>
        <li><a href="#">Submenu Item 3</a></li>
    <?php elseif ($user_type == 'user'): ?>
        <li><a href="#">Submenu Item 3</a></li>
    <?php endif; ?>
    </ul>
  </li>


  <!-- 3.	adminpage01.php   82-85 line -->
<!-- old -->
<span><?= $fetch_profile['usr_name']; ?>
          <i class="fa-solid fa-angle-down"></i>
          </span>
        </div>

<!-- new  -->
<span>
            <?php if (isset($fetch_profile) && $fetch_profile !== null && isset($fetch_profile['usr_name'])): ?>
                <?= $fetch_profile['usr_name']; ?>
            <?php else: ?>
                User Name Unavailable
            <?php endif; ?>
            <i class="fa-solid fa-angle-down"></i>
        </span>
    </div>