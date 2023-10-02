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
  <title>E02 - login</title>
  <link rel="stylesheet" href=".\.\style4.css">
</head>

<body>

  <header class="header">

     <h2 href="#">VTC. E02 - Learning Platform. </h2>
     
     <nav class="navlist">
        <a href="#">Home</a>
        <a href="#">Paper 1</a>
        <a href="#">Paper 2(MC)</a>
        <a href="#">Learing</a>
     </nav>
    <?php

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
      {
        echo "
        <div class='user'>         
        $_SESSION[username] - <a href='logout.php'> Logout </a>
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

  <?php 
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
    {
      echo"<h1 style='text-align: center; margin-top: 200px> WELCOME TO THIS WEBSITE - $_SESSION[username]</h1>";
    }
  ?>

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
  
</body>
</html>