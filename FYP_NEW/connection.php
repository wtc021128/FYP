<?php
$conn=mysqli_connect("localhost","root","","e02_db") or die("Unable to connect");

if(mysqli_connect_error()){
    echo "<script>alert('Unable to connect to the database');</script>";
    exit();
}
    // 檢查連接是否成功
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}
?>
