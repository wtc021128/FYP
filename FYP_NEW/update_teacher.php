<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: rgb(156,131,33);
	background: #f5f5f5;
	font-family: "Poppins, sans-serif";
	font-size: 13px;
   
}
.button{
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  margin: 4px 2px;
  cursor: pointer;
}	
</style>
<script>
$(document).ready(function(){
    // 自动打开编辑模态框
    $('#editEmployeeModal').modal('show');
});
</script>

</head>
<body>
<?php
include 'config2.php';
$id = $_GET['id'];
$update = "SELECT * FROM registered_users_ac WHERE id = $id";
$updatequery = mysqli_query($conn, $update);
$result = mysqli_fetch_assoc($updatequery);


if(isset($_POST['submit'])){
    $id = $_GET['id'];
	$usr_id = mysqli_real_escape_string($conn, $_POST['usr_id']);
    $usr_name = mysqli_real_escape_string($conn, $_POST['usr_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    // $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    // $image = mysqli_real_escape_string($conn, $_POST['image']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);

      $insertquery =  "UPDATE registered_users_ac SET usr_id ='$usr_id', usr_name ='$usr_name', email ='$email',password='$password',phone='$phone',remark='$remark' WHERE id = $id";
      //$updatequery = "UPDATE registered_users_ac SET usr_name='$usr_name', email='$email', password='$password', phone='$phone', user_type='$user_type', remark='$remark' WHERE id=$id";
  
	  $mysqliquery = mysqli_query($conn, $insertquery);
    if($insertquery){
        ?>
    <script>
        window.location.replace("teacher_index.php");
    </script>
<?php 

    }else{
        echo 'Not Updated';
    }



}




?>


<div style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; text-align: center; font-size: 30px; position: relative; top: 150px;">
<a href="#editEmployeeModal" class="edit" data-toggle="modal">Click Here to Update<i class="material-icons" data-toggle="tooltip" title="Update">&#xE254;</i></a>
<br>
<a href="teacher_index.php">Back_Home</a>
</div>							

<!-- Update Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="">
				<div class="modal-header">						
					<h4 class="modal-title">Update Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

				<div class="form-group">
    			<label>user_id</label>
    			<input type="text" name="usr_id" class="form-control" value="<?php echo $result['usr_id']; ?>" required>
				</div>
				
					<div class="form-group">
						<label>usr_name</label>
						<input type="text" name="usr_name" class="form-control" value="<?php echo $result['usr_name']; ?>" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo $result['email']; ?>" required>
					</div>
					<div class="form-group">
						<label>password</label>
						<input type="text" name="password" class="form-control" value="<?php echo $result['password']; ?>" required>
					</div>
					<div class="form-group">
						<label>phone</label>
						<input type="text" name="phone" class="form-control" value="<?php echo $result['phone']; ?>" required>
					</div>
					<!-- <div class="form-group">
						<label>user_type</label>
						<input type="text" name="user_type" class="form-control" value="<?php echo $result['user_type']; ?>" required>
					</div>	 -->
					<div class="form-group">
						<label>remark</label>
						<input type="text" name="remark" class="form-control" value="<?php echo $result['remark']; ?>" >
					</div>						
				</div>
				<div class="modal-footer">
					<!-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Back"> -->
					<h4><a href="teacher_index.php" class="button">Back_Home</a></h4>
					<input type="submit" name="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- delete modele -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Back">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<script>
    $(document).ready(function(){
        $('#editEmployeeModal').modal('show');
    });
    </script>
	<script>
// 返回到其他页面的函数
function goBack() {
    window.location.href = "teachear_index.php"; // 将页面重定向到other_page.php
}
</script>
</body>
</html>
