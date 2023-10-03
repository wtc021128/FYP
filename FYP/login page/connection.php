<?php
$con=mysqli_connect("localhost","root","","e02_db") or die("Unable to connect");

if(mysqli_connect_error()){
    echo "<script>alert('Unable to connect to the database');</script>";
    exit();
}
?>
