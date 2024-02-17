<?php
include 'config.php'; // 确保这指向您的PDO配置文件

$response = '';

// 检查usr_id重复
if(isset($_POST['usr_id'])) {
    $usr_id = $_POST['usr_id'];

    // 查询条件不再包括user_type
    $query = "SELECT * FROM registered_users_ac WHERE usr_id = :usr_id";
    $stmt = $conn->prepare($query);
    $stmt->execute(['usr_id' => $usr_id]);
    
    if($stmt->rowCount() > 0) {
        $response = 'duplicate_usr_id';
    }
}

// 检查email重复
if(isset($_POST['email'])) {
    $email = $_POST['email'];

    // 查询条件不再包括user_type
    $query = "SELECT * FROM registered_users_ac WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->execute(['email' => $email]);
    
    if($stmt->rowCount() > 0) {
        $response = 'duplicate_email';
    }
}

echo $response;
?>
