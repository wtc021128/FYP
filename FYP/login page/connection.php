<?php

    $con=mysqli_connect("localhost","root","W@2915djkq#a","e02_db") or die("Unable to connect");

    if(mysqli_connect_error()){
        echo"<script>alert('connect connect to the database');</script>";
        exit();
    }
?>