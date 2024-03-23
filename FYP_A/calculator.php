<?php
include_once 'adminpage01.php';
?>
<html>
<head>
    <title>Calculator</title>
    <link href="cal.css" rel="stylesheet" type="text/css">
    <style>
        p {
            color: red;
        }
    </style>
</head>
<body align="center">
<h1>Calculator</h1>

<!-- 记录前五个算式加答案等于的部分 -->
<div id="savedResults" style="float: right; margin-right: 20px; text-align: left;">
    <h2>Saved Results</h2>
    <ul id="savedList"></ul>
</div>

<hr>
<br>
<table id='calculate' style="margin-left: 42.5%;">
    <tr>
        <th colspan="4"><input value="0" class="result" id="inputExpression"></th>
    </tr>
    <tr>
        <td><input type="button" value="AC" class="AC" id="erase" onclick="clearNum()"></td>
        <td><input type="button" value="Ans" class="formula" id="Ans" onclick="add(this)"></td>
        <td><input type="button" value="%" class="formula" id="%" onclick="add(this)"></td>
        <td><input type="button" value="/" class="formula" id="/" onclick="add(this)"></td>
    </tr>
    <tr>
        <td><input type="button" value="7" class="number" id="7" onclick="add(this)"></td>
        <td><input type="button" value="8" class="number" id="8" onclick="add(this)"></td>
        <td><input type="button" value="9" class="number" id="9" onclick="add(this)"></td>
        <td><input type="button" value="*" class="formula" id="*" onclick="add(this)"></td>
    </tr>
    <tr>
        <td><input type="button" value="4" class="number" id="4" onclick="add(this)"></td>
        <td><input type="button" value="5" class="number" id="5" onclick="add(this)"></td>
        <td><input type="button" value="6" class="number" id="6" onclick="add(this)"></td>
        <td><input type="button" value="-" class="formula" id="-" onclick="add(this)"></td>
    </tr>
    <tr>
        <td><input type="button" value="1" class="number" id="1" onclick="add(this)"></td>
        <td><input type="button" value="2" class="number" id="2" onclick="add(this)"></td>
        <td><input type="button" value="3" class="number" id="3" onclick="add(this)"></td>
        <td><input type="button" value="+" class="formula" id="+" onclick="add(this)"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="button" value="0" class="number_0" id="0" onclick="add(this)"></td>
        <td><input type="button" value="." class="number" id="0." onclick="add(this)"></td>
        <td><input type="button" value="=" class="formula" id="=" onclick="eva()"></td>
    </tr>
</table>
</body>
<script src="cal.js"></script>
</html>
