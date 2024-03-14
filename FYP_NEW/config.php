<?php

$db_name = "mysql:host=localhost;dbname=e02_db";
$username = "root";
$password = "";

$conn = new PDO($db_name, $username, $password);

?>

<style>
    .result {
        position: fixed;
        bottom: 10px;
        right: 10px;
        background-color: #f1f1f1;
        padding: 10px;
        border: 1px solid #ccc;
    }
</style>

<div class="result" id="result">
    <?php
    if ($conn) {
        echo 'Connection Successfully!!!';
    } else {
        echo 'Not Connected';
    }
    ?>
</div>

<script>
    setTimeout(function() {
        var resultElement = document.getElementById('result');
        resultElement.style.display = 'none';
    }, 5000);
</script>