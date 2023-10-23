<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Ka Ho">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="keywords" content="E02-Login&registerpage">
  <title>OCR</title>
  <link rel="stylesheet" href=".\.\style4.css">
  <meta charset="UTF-8">
    <title>隨機出題網站</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>歡迎來到隨機出題網站</h1>
        <form action="quiz.php" method="POST">
            <label for="num_questions">要出多少題：</label>
            <input type="number" name="num_questions" min="1" max="10" required>
            <br>
            <input type="submit" value="開始出題">
        </form>
    </div>
</body>
</html>