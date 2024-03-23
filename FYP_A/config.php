<?php

$db_name = "mysql:host=localhost;dbname=e02_db";
$username = "root";
$password = "";

$conn = new PDO($db_name, $username, $password);

if($conn){
    echo 'Connection Successfully!!!';
    
    }else{
        echo 'Not Connected';
    }

?>