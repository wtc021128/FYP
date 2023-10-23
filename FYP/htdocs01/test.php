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
    body{background-image: url(mbg.jfif);
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
        <a href="#">Learing</a>
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
  <table border="0" align="center">
    <tr>
        <td width="2000" height="1" align="center">
        </td>
    </tr>
</table>

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

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Ka Ho">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="keywords" content="E02-Login&registerpage">
  <link rel="stylesheet" href=".\.\style4.css">
  <meta charset="UTF-8">
    <title>試題練習</title>
    <link rel="stylesheet" type="text/css" href="styles1.css">
</head>

<body>
    <div class="container">
        <form action="quiz.php" method="POST">
            <label for="num_questions">要做多少題：</label>
            <input type="number" name="num_questions" min="1" max="10" required>
            <br>
            <input type="submit" value="開始出題">
        </form>
    </div>
</body>
</html>