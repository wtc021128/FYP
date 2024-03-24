<!-- LOGIN Connect -->
<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = $_POST['pass'];
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select = $conn->prepare("SELECT * FROM `registered_users_ac` WHERE email = ?");
   $select->execute([$email]);
   $row = $select->fetch(PDO::FETCH_ASSOC);

//    if($select->rowCount() > 0){
      
//       if($row['user_type'] == 'admin'){

//          $_SESSION['admin_id'] = $row['id'];
//          header('location:admin_index.php');

//       }elseif($row['user_type'] == 'teacher'){

//          $_SESSION['teacher_id'] = $row['id'];
//          header('location:teacher_index.php');

//       }elseif($row['user_type'] == 'user'){

//          $_SESSION['user_id'] = $row['id'];
//          header('location:user_index.php');

//       }else{
//          $message[] = 'no user found!';
//       }
      
//    }else{
//       $message[] = 'incorrect email or password!';
//    }


if($select->rowCount() > 0){
   if(password_verify($pass, $row['password'])){
      $_SESSION['user_type'] = $row['user_type'];
       switch($row['user_type']){
           case 'admin':
               $_SESSION['admin_id'] = $row['id'];
               header('location:admin_index.php');
               exit;
           case 'teacher':
               $_SESSION['teacher_id'] = $row['id'];
               header('location:teacher_index.php');
               exit;
           case 'user':
               $_SESSION['user_id'] = $row['id'];
               header('location:user_index.php');
               exit;
           default:
               $message[] = 'No valid user type found!';
               break;
       }
   } else {
       $message[] = 'Incorrect email or password!';
   }
} else {
   $message[] = 'No user found with that email!';
}
}




// }   
//    if($select->rowCount() > 0){
//       if(password_verify($pass, $row['password'])){
//          switch($row['user_type']){
//             case 'admin':
//                $_SESSION['admin_id'] = $row['id'];
//                header('location:admin_index.php');
//                exit;
//             case 'user':
//                $_SESSION['user_id'] = $row['id'];
//                header('location:admin_index.php');
//                exit;
//             case 'teacher':
//                $_SESSION['teacher_id'] = $row['id'];
//                header('location:admin_index.php');
//                exit;
//             default:
//                $message[] = 'No valid user type found!';
//                break;
//          }
//       } else {
//          $message[] = 'Incorrect email or password!';
//       }
//    } else {
//       $message[] = 'My Server - No user found!';
//    }

// }

?>
<!-- ****************************************************************************************************** -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | DSE.Maths介紹</title>
    <meta name="author" content="Ka Ho">
    <meta http-equiv="x-ua-compatible" content="ie=edgee,chrome=1">
    <!-- custon css file link -->
    <link rel="stylesheet" href="assets/css/login1.css">
    <!-- bootstrap-icons -->
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css">
    <!-- font awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Kiston icon -->
    <link rel="icon" href="assets/img/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#12a0ff" />
    <meta name="robots" content="noindex">
</head>
<!-- ****************************************************************************************************** -->


<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>


<section class="form-container">
   <form action="" method="post" enctype="multipart/form-data">
      <h3>login now</h3>

<!--Demo table-->      
  <table class="myTable">
  <tr>
  <th colspan="4">Deom Account Offer Userful</th>
</tr>
  <tr>
    <th colspan="2">Admin Account</th>
    <th>Teacher Account</th>
    <th>user Account</th>
  </tr>
  <tr>
    <td>ac:</td>
    <td>admin@gmail.com</td>
    <td>teacher@gmail.com</td>
    <td>user@gmail.com</td>
  </tr>
  <tr>
    <td>pw:</td>
    <td>admin</td>
    <td>teacher</td>
    <td>user</td>
  </tr>  
  </table>

      <input type="email" required placeholder="enter your email" class="box" name="email" >
      <input type="password" required placeholder="enter your password" class="box" name="pass">
      <p>don't have an account? <a href="register.php">register now</a></p>
      <input type="submit" value="login now" class="btn" name="submit">
      <p>Don't want to log in yet?<a href="index.php"> Home screen</a></p>
   </form>


<!-- demo account-->
</section>
<script src="assets/js/login.js"></script>
</body>
</html>