<?php 
  require('connection.php'); 
?>

<?php
include_once 'adminpage01.php';
?>

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
  <table border="0">
    <tr>
      <td width="400">
      </td>
      <td colspan="3" align="center" width="400">
      <font color="00000" size"8"><B><U>數學科選擇題練習</font>
  </td>
  <td width="400">
  </td>
  </tr>
  <td>
  <font color="00000"><B>﹙請選擇想要進行練習的題數﹚</font>
  </td>
  <tr>
    <td>
    <div class="container">
        <form action="quiz.php" method="POST">
            <label for="num_questions"><B>請選擇題目數量：</label>
            <input type="number" name="num_questions" min="1" max="10" required><font color="00000">(MAX:10)</font>
            <br>
            <input type="submit" value="開始出題">
        </form>
    </div>
  </td>
  <td width="400">
      </td>
      <td width="400">
      <font color="00000" size="5">本網站提供不同的數學選擇題練習，<br>練習完成後將會有提供正確答案和成績。請盡力完成練習！</font>
      </td>
  </tr>
</body>
</html>