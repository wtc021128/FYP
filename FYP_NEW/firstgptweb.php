<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>二元一次方程</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">


        <div id="output-text">
			<dl id="theList">
			</dl>
		</div>

        <textarea id="input-text" placeholder="請輸入不同類型的數學問題"></textarea>
        <button id="submit-button">生成問題</button>	


		<script src="script.js"></script>
    </div>
</body>
</html>
