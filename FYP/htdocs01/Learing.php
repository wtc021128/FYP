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

<style>
    body{background-image: url(L1.jpg);
    background-size: cover;background-attachment: fixed;
    background-repeat: no-repeat;background-position: center;
    }
    .black-solid-border {
    border: 1px solid black;
  }

</style>

  <header class="header">

      <font align="center" size="6" ><B> DSE <br>Subject:Math</font></B>
     
     <nav class="navlist">
        <a href="login2.php">主頁</a>
        <a href="QA.php">試題庫</a>
        <a href="test.php">試題練習</a>
        <a href="Learing.php">Learing</a>
     </nav>

     
    <?php

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
      {
        echo "
        <div class='user'>         
        <a href='logout.php'>$_SESSION[username] -  Logout </a>
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
  <title>Learing</title> 
  <body>
  <font color="00000"><h2>誤差公式 Estimation and Error Formula</h2> 
    1. 最大誤差 = [準確度/2]<br>
    Maximum Error = [Precision/2]<p>
    2. 相對誤差  = [最大誤差/ 量度值] 或 [最大誤差/ 真實值]<br>
    Relative Error = [Maximum Error/ Measured Value] or [Maximum Error/ True Value]<p>
    3. 百分誤差 = [相對誤差 × 100%]  或 [最大誤差/ 量度值  × 100%]<br>
    Percentage Error = [Relative Error × 100%] or [Maximum Error/ Measured Value × 100%]<p>
    4. 上限 = [量度值 ＋ 最大誤差]<br>
    Upper Limit  = [Measured Value + Maximum Error]<p>
    5. 下限 = [量度值 － 最大誤差]<br>
    Lower Limit = [Measured Value － Maximum Error]<p>
    6. 可能範圍 = 下限 至 上限 之間<br>
    Range = Lower Limit to Upper Limit<p>

<h2>百分比公式 Percentage Formula</h2>
1. 增值 = [新值 － 原值]<br>
Value Increased = [New Value － Original Value]<p>
減值 = [原值 － 新值]<br>
Value Decreased = [Original value － New value]<p>
2. 百分數增加 = [增值 / 原值] = [(新值 － 原值)/ 原值]<br>
Percentage Increased = [Value Increased / Original Value] = [(New value －Original value)/ Original value]<p>
3. 百分數減少 = [減值 / 原值] = [(原值 － 新值)/ 原值]<br>
Percentage Decreased = [Value Decreased / Original Value] = [(Original value －New value)/ Original value]<p>
4. 新值 = [原值 × (1 + 增加%)]<br>
New Value = [Original Value × (1 + % Increase)]<p>
新值 = [原值 × (1 － 減少%)]<br>
New Value = [Original Value × (1 － % Decrease)]<p>
5. 折扣 = [標價 － 售價]<br>
Discount = [Marked Price － Selling Price]<p>
6. 折扣% = [折扣/ 標價 × 100%]<br>
Discount% = [Discount/ Marked Price × 100%]<p>
7. 售價 = [標價 × (1 － 折扣%)]<br>
Selling Price = [Marked Price × (1 － Discount%)]<p>
8. 盈利 = [售價 － 成本]<br>
Profit = [Selling Price － Cost]<p>
虧蝕 = [成本 － 售價]<br>
Loss = [Cost － Selling Price]<p>
9. 售價 = [成本 × (1 + 盈利%)]<br>
Selling Price = [Cost × (1 + Profit%)]<p>

<h2>比率與比例公式 Rate and Ratio Formula</h2>
速率 = [距離/ 時間]<br>
Speed = [Distance/ Time]