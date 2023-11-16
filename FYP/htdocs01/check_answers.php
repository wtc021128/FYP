<?php
require('connection.php');
session_start();
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Ka Ho">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="keywords" content="E02-Login&registerpage">
  <link rel="stylesheet" href=".\.\style1.css">
</head>

<body>
<title>試題庫</title>
<style>
    body{background-image: url(mbg.jfif);
    background-size: cover;background-attachment: fixed;
    background-repeat: no-repeat;background-position: center;
    color: black;
    }
    .black-solid-border {
    border: 1px solid black;
  }

  .tableInner
{
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}
</style>

  <header class="header">

  <font align="center" size="6" ><B> DSE <br>Subject:Math</font></B>
     
      <nav class="navlist">
        <a href="login2.php">主頁</a>
        <a href="QA.php">試題庫</a>
        <a href="test.php">試題練習</a>
        <a href="Learning.php">Learning</a>
     </nav>

     
    <?php

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
      {
        echo "
        <div class='user'>         
        <a href='logout.php'> $_SESSION[username] - Logout </a>
     </div>
     ";
     
     }
      else
      {
        echo"
        <div class='login_register'>
        <div class='loginstyle'>
          <button type='button' onclick=\"interface('login-interface')\">LOGIN</button>
          <button type='button' onclick=\"interface('register-interface')\">REGISTER</button>
        </div>
      ";        
      }
    ?>

  </header>
<!-- ko -->
<!---------------------------------------->
  <div class="loginstyle_full" id="login-interface">
    <div class="loginstyle">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER LOGIN</span>
          <button type="reset" onclick="interface('login-interface')">X</button>
        </h2>        
<!-- login -->
        <input type="text" placeholder="E-mail or Username" name="email_username" >
        <input type="password" id="loginPassword" placeholder="Password" name="password">
        <!-- eye -->
        <button type="button" id="toggleLoginPassword">Show Password</button>
        <button type="submit" class="login-btn" name="login">LOGIN</button>
      </form>
    </div>
  </div>
<!---------------------------------------->
<!-- register-->
  <div class="loginstyle_full" id="register-interface">
    <div class="registerstyle">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER REGISTER</span>
          <button type="reset" onclick="interface('register-interface')">X</button>
        </h2>        
<!-- register -->
        <input type="text" placeholder="CNA" name="cna">
        <input type="text" placeholder="Username" name="username">
        <input type="email" placeholder="E-mail" name="email">
        <input type="password" id="registerPassword" placeholder="Password" name="password">
        <!-- eye -->
        <button type="button" id="toggleRegisterPassword">Show Password</button>
        <button type="submit" class="register-btn" name="register">REGISTER</button>
        <script src="eye.js">
        </script>
        <!-- eye -->
      </form>
    </div>
  </div>

  <script>
    function interface(interface_name)
    {
      get_interface=document.getElementById(interface_name);
      if(get_interface.style.display=="flex")
      {
        get_interface.style.display="none";
      }
      else
      {
        get_interface.style.display="flex";
      }
    }
  </script>

<?php  
// 檢查答案
$sql = "SELECT * FROM question";
$result = $conn->query($sql);

$score = 0;
$totalQuestions = 0; // 初始化總題目數量
$selectedQuestions = 0; // 初始化使用者選擇的題目數量

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questionId = $row['ID'];
        $userAnswer = isset($_POST['answer' . $questionId]) ? $_POST['answer' . $questionId] : null;
        $correctAnswer = $row['correct_answer'];
        
        if (!empty($userAnswer)) {
            $selectedQuestions++; // 使用者選擇的題目數量加一
            
            if ($userAnswer == $correctAnswer) {
                $score++;
            }
        }
        
        $totalQuestions++; // 總題目數量加一
    }
}

// 顯示得分
echo "答對題目分數：" . $score . "/" . $selectedQuestions;

// 關閉連接
$conn->close();
?>

<p><button><a href="test.php">返回</button></a>