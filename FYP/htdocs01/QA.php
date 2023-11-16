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
  <table border="0" align="center">
    <tr>
        <td width="2000" height="50" align="center">
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
  <table border="0" class="tableInner">

<tr>
  <td >
  </td>
  <td align="center">
    <font size="6" id="top"><B>數學/Mathematics</f><B>
  </td>
  <td >
  </td>
<tr>
  <td align="center" width="400">
  <font size="4"><li><a href="#one">By Topic</a></li></f>
  </td>
  <td align="center" width="400">
  <font size="4"><li><a href="#two">DSE (中)</f></a></li>
  </td>
  <td align="center" width="400">
  <font size="4"><li><a href="#three">DSE (英)</f></a></li>
  </td>
  <tr>
    <td height="30">
    </td>
    <td>
    </td>
    <td>
    </td>
<tr>
  <td align="center">
  <font size="4"><a href="#four">Math&Stat</f></a>
  </td>
  <td align="center">
  <font size="4"><a href="#five">PureMaths</f></a>
  </td>
  <td align="center">
  <font size="4"><a href="#six">AddMaths</f></a>
  </td>
</tr>
<tr>
    <td height="100">
    </td>
    <td>
    </td>
    <td>
    </td>
<Tr align="center">
  <td>
  </td>
    <td align="center">
      <br id="one">
      <font size="6">By Topic</f>
    </td>
  <td>
  </td>
<tr>
  <td><h1><font size="6" >Paper 1</td></f></h1>
  <td>
  </td>
  <td>
  </td>
<tr>
  <td colspan="3" class="black-solid-border"><font size="5"> Topic 1 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/1.pdf"><B>Estimation</a></b>
  Topic 2 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/2.pdf">Percentages</a></b> 
  Topic 3 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/3.pdf">Indices and Logarithms</a></b> 
  Topic 4 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/4.pdf">Polynomials</a></b> 
  Topic 5 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/5.pdf">Formulas</a></b> 
  Topic 6 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/6.pdf">Identities, Equations and the Number System</a></b> 
  Topic 7 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/7.pdf">Functions and Graphs</a></b> 
  Topic 8 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/8.pdf">Rate, Ratio and Variation</a></b> 
  Topic 9 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/9.pdf">Arithmetic and Geometric Sequences</a></b> 
  Topic 10 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/10.pdf">Inequalities and Linear Programming</a></b>
  Topic 11 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/11.pdf">Geometry of Rectilinear Figure</a></b> 
  Topic 12 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/12.pdf">Geometry of Circles</a></b> 
  Topic 13 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/13.pdf">Basic Trigonometry</a></b> 
  Topic 14 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/14.pdf">Applications of Trigonometry</a></b> 
  Topic 15 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/15.pdf">Mensuration</a></b> 
  Topic 16 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/16.pdf">Coordinate Geometry</a></b> 
  Topic 17 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/17.pdf">Counting Principles and Probability</a></b> 
  Topic 18 <a href="https://dse.life/static/pp/m0/eng/bytopic/p1/18.pdf">Statistics</a></b>
  <br><a href="https://dse.life/static/pp/m0/eng/bytopic/p1/bk1.pdf">Book 1 Topic 1-18</a></b></f>
  </td>
  <tr>
    <td height="100">
    </td>
    <td>
    </td>
    <td>
    </td>
<Tr align="center">
  <td>
  </td>
    <td align="center">
      <br id="two">
      <font size="6">DSE (中)</f><a href="#top"><font size="2">Go to Top</f>
    </td>
  <td>
  </td>
  <tr>
    <td height="50">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>練習紙</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/pp/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/pp/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>樣本紙</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/sp/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/sp/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2012</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/2012/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/2012/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2013</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/2013/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/2013/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2014</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/2014/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/2014/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2015</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/2015/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/2015/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2016</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/2016/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/2016/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2017</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/2017/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/2017/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2018</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/2018/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/2018/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2019</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/2019/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/2019/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2020</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/2020/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/2020/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2021</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/2021/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/2021/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2022</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/2022/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/2022/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2023</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/chi/dse/2023/p1.pdf">練習1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/chi/dse/2023/ans.pdf">答案</a>
  </td>
  <tr>
    <td height="100">
    </td>
    <td>
    </td>
    <td>
    </td>
<Tr align="center">
  <td>
  </td>
    <td align="center">
      <br id="three">
      <font size="6">DSE (英)</f><a href="#top"><font size="2">Go to Top</f>
    </td>
  <td>
  </td>
  <tr>
    <td height="50">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>Practice Paper</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/pp/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/pp/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
    <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>Sample Paper</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/sp/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/sp/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2012</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/2012/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/2012/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2013</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/2013/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/2013/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2014</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/2014/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/2014/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2015</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/2015/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/2015/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2016</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/2016/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/2016/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2017</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/2017/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/2017/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2018</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/2018/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/2018/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2019</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/2019/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/2019/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2020</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/2020/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/2020/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2021</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/2021/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/2021/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2022</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/2022/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/2022/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2023</f>
    <br><font size="5"><a href="https://dse.life/static/pp/m0/eng/dse/2023/p1.pdf">Paper1</a>
    &nbsp; &nbsp; &nbsp; <a href="https://dse.life/static/pp/m0/eng/dse/2023/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="100">
    </td>
    <td>
    </td>
    <td>
    </td>
<Tr align="center">
  <td>
  </td>
    <td align="center">
      <br id="four">
      <font size="6">Mathematics & Statistics</f><a href="#top"><font size="2">Go to Top</f>
    </td>
  <td>
  </td>
  <tr>
    <td height="50">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1996</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/1996.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/1996ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
    <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1997</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/1997.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/1997ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1998</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/1998.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/1998ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1999</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/1999.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/1999ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2000</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2000.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2000ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2001</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2001.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2001ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2002</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2002.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2002ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2003</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2003.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2003ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2004</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2004.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2004ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2005</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2005.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2005ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2006</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2006.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2006ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2007</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2007.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2007ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2008</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2008.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2008ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2009</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2009.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2009ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2010</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2010.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2010ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2011</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2011.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2011ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2012</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2012.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2012ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2013</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m1/mands/2013.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m1/mands/2013ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="100">
    </td>
    <td>
    </td>
    <td>
    </td>
<Tr align="center">
  <td>
  </td>
    <td align="center">
      <br id="five">
      <font size="6">Pure Maths</f><a href="#top"><font size="2">Go to Top</f>
    </td>
  <td>
  </td>
  <tr>
    <td height="50">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1980</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1980.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1980ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
    <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1981</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1981.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1981ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1982</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1982.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1982ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1983</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1983.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1983ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1984</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1984.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1984ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1985</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1985.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1985ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1986</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1986.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1986ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1987</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1987.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1987ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1988</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1988.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1988ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1989</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1989.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1989ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1990</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1990.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1990ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1991</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1991.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1991ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1992</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1992.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1992ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1993</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1993.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1993ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1994</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1994.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1994ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1995</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/pmaths/1995.pdf">Paper1&2</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/pmaths/1995ms.pdf">Answer</a>
  </td>
  <tr>
    <td height="100">
    </td>
    <td>
    </td>
    <td>
    </td>
<Tr align="center">
  <td>
  </td>
    <td align="center">
      <br id="six">
      <font size="6">Add Maths</f><a href="#top"><font size="2">Go to Top</f>
    </td>
  <td>
  </td>
  <tr>
    <td height="50">
    </td>
    <td>
    </td>
    <td>
    </td>
  <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1980</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1980/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1980/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1980/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1980/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td>
    <tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1981</f>
    <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1981/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1981/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1981/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1981/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1982</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1982/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1982/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1982/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1982/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1983</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1983/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1983/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1983/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1983/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1984</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1984/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1984/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1984/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1984/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1985</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1985/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1985/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1985/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1985/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1986</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1986/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1986/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1986/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1986/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1987</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1987/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1987/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1987/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1987/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1988</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1988/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1988/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1988/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1988/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1989</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1989/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1989/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1989/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1989/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1990</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1990/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1990/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1990/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1990/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1991</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1991/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1991/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1991/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1991/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1992</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1992/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1992/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1992/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1992/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1993</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1993/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1993/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1993/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1993/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1994</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1994/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1994/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1994/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1994/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1995</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1995/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1995/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1995/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1995/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1996</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1996/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1996/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1996/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1996/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1997</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1997/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1997/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1997/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1997/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1998</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1998/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1998/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1998/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1998/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>1999</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/1999/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1999/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1999/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/1999/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2000</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/2000/p1.pdf">Section A</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2000/p2.pdf">Section B</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2000/p1ans.pdf">Section A Answer</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2000/p2ans.pdf">Section B Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2001</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/2001/pp.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2001/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2002</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/2002/pp.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2002/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2003</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/2003/pp.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2003/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2004</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/2004/pp.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2004/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2005</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/2005/pp.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2005/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2006</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/2006/pp.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2006/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2007</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/2007/pp.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2007/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2008</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/2008/pp.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2008/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2009</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/2009/pp.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2009/ans.pdf">Answer</a>
  </td>
  <tr>
    <td height="25">
    </td>
    <td>
    </td>
    <td>
    </td><tr>
  <td colspan="3" class="black-solid-border"><font size="6"><B>2011</f>
  <br><font size="5"><a href="https://www.dse.life/static/pp/m2/amaths/2011/pp.pdf">Question Paper</a>
    &nbsp; &nbsp; &nbsp; <a href="https://www.dse.life/static/pp/m2/amaths/2011/ans.pdf">Answer</a>
  </td>