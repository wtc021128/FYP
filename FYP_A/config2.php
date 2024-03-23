<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "e02_db";
$conn = mysqli_connect($server,$username,$password,$db);


if($conn){
    echo 'Connection Successfully!!!';
    
    }else{
        echo 'Not Connected';
    }

?>