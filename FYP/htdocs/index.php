<?php

if(isset($_GET['page']) AND !empty($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = "main";
}

include('header.php'); // 載入共用的頁首
switch($page){  // 依照 GET 參數載入共用的內容
    case "main";
      include('main.php');
    break;
    case "QA";
      include('QA.php');
    break;
    case "hero";
      include('hero.php');
    break;
}