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
  <link rel="stylesheet" href=".\.\style.css">
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
        <input type="text" placeholder="E-mail or Username" name="email_username"  >
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
        <input type="text" placeholder="CNA eg.a0000-Z999999" name="cna" required="required" pattern="[0-9a-z!@#$%^&*]{4,7}">
        <input type="text" placeholder="Username eg. CHAN TAI MAN" name="username" required="required">
        <input type="email" placeholder="E-mail" name="email eg. xxxxx@" required="required">
        <input type="password" id="registerPassword" placeholder="Password eg. Password1" name="password"  required="required" title="Please enter a 7-10 digit password, the first digit must be in uppercase English" pattern="^[A-Z][0-9a-zA-Z]{6,15}">
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
<table border="0" align="center">
    <tr>
        <td width="2000" height="150" align="center">
        </td>
    </tr>
</table>
<hr style="border-color: black; border-width: 2px;"> 
<table border="0" align="center">
    <tr>
        <td width="2000" height="200" align="center">
         <font size="10" color="#56D18A" ><U><B>System Introduction</B></font>
        </td>
    </tr>
</table>
<table border="0">
  <tr>
    <td width="400" align="center">
     <img src="dse.jpg" width="400" height="300">
    </td>
    <td align="center" colspan="3">
      <div>
        <font size="7" color="#454545">
          Our system is to provide a platform for dse students to learn and review mathematics independently.  
          At the same time, it can also provide teachers with a platform for automatic questioning, reducing the pressure on teachers.
        </font>
    </td>
    <td >
    </td>
    </tr>
   <!-- </table>-->
    </div>
</table>
    <hr style="border-color: black; border-width: 2px;">   

</body>
</html>