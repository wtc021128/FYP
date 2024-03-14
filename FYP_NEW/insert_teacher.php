<?php
include 'config2.php';
if(isset($_POST['submit'])){

    
    $usr_id = mysqli_real_escape_string($conn, $_POST['usr_id']);
    $usr_name = mysqli_real_escape_string($conn, $_POST['usr_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    // $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    // $image = mysqli_real_escape_string($conn, $_POST['image']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);

    
      $insertquery =  "INSERT INTO registered_users_ac(usr_id, usr_name, email, password,phone,user_type,remark)
                     VALUES ('$usr_id','$usr_name','$email','$password','$phone','user','$remark')";

    //   $insertquery =  "INSERT INTO registered_users_ac(usr_id, usr_name, email, password,phone,user_type,image,remark)
    //                      VALUES ('$usr_id','$usr_name','$email','$password','$phone','$user_type','$image','$remark')";

        $mysqliquery = mysqli_query($conn, $insertquery);
    if($insertquery){
        ?>
    <script>
        window.location.replace("teacher_index.php");
    </script>

<?php 

    }else{
        echo 'Not Inserted';
    }



}



?>