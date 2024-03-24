<!-- ****************************************************************************************************** -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | DSE.Maths介紹</title>
    <meta name="author" content="Ka Ho">
    <meta http-equiv="x-ua-compatible" content="ie=edgee,chrome=1">
    <!-- custon css file link -->
    <link rel="stylesheet" href="assets/css/admin_manager.css">

    <!-- bootstrap-icons -->
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- font awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- api link--->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    
    

    <!-- Kiston icon -->
    <link rel="icon" href="assets/img/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#12a0ff" />
    <meta name="robots" content="noindex">
</head>
<!-- ****************************************************************************************************** -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#usr_id, #email').on('blur', function() {
        var field = $(this).attr('id');
        var value = $(this).val();
        var postData = {
            [field]: value
        };

        $.post('check_duplicates.php', postData, function(response) {
            // 处理响应
            if(response === 'duplicate_usr_id') {
                $('#usr_id_error').text('該ID已被使用。');
            } else if(response === 'duplicate_email') {
                $('#email_error').text('該電子郵箱已被使用。');
            } else {
                $('#' + field + '_error').text('');
            }
        });
    });
});

</script>

<body>

<div class="crud">
		<h1>Admin Manager control</h1>
	</div>
    <br>
<!-- <div class="container-xl">
	<div class="table-responsive"> -->
		<div class="table-wrapper">
			<div class="table-title">				
				<div class="row">
					<div class="col-sm-6">
						<h2>DSE E02. <b>All Users & All Record Control</b></h2>
					</div>
					<div class="col-sm-4">  
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Customer</span></a>
						<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
					</div>
				</div>
			</div>
			
			<table class="table table-striped table-hover">
				<thead>
					<tr>	
						<!-- <th>id</th> -->
						<th>CNA</th>
						<th>Usr_name</th>
						<th>Email</th>
						<th>Password</th>
                        <th>Phone</th>
                        <th>User_type</th>
                        <!-- <th>image</th> -->
                        <th>Remark</th>
						<th>Rtime</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>
			<?php
			include 'config2.php';
			$query = 'SELECT * FROM registered_users_ac';
			$mysqliquery = mysqli_query($conn, $query);
			while ($result = mysqli_fetch_assoc($mysqliquery)) {
			?>
				<!-- database record-->
                <tr>
					<!-- <td>-->
						 <!-- <?php echo $result['id']; ?> -->
					<!--</td> -->
					<td>
						<?php echo $result['usr_id']; ?>
					</td>
					<td>
						<?php echo $result['usr_name']; ?>
					</td>
					<td>
						<?php echo $result['email']; ?>
					</td>
                    <td>
						<?php echo $result['password']; ?>
					</td>
                    <td>
						<?php echo $result['phone']; ?>
					</td>
                    <td>
						<?php echo $result['user_type']; ?>
					</td>
                    <!-- <td>-->
						<!-- <?php echo $result['image']; ?> -->
					<!--</td> -->
                    <td>
						<?php echo $result['remark']; ?>
					</td>
					<td>
						<?php echo $result['registrationtime']; ?>
					</td>
					<td>
						<a href="update.php?id=<?php echo $result['id']; ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Update">&#xE254;</i></a>
						<a href="delete.php?ids=<?php echo $result['id']; ?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
					</td>
				</tr>
			<?php
			}
			?>			
				</tbody>
			</table>
	</div>        
</div>

<!-- Add User HTML -->
<div id="addEmployeeModal" class="modal fade"><!--Add New Customer-->
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="insert.php" >
				<div class="modal-header">						
					<h3 class="modal-title">New Add Customer</h3>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>cna<a style="color:red">*請輸入九位數字</a></label>
						<input type="text" name="usr_id" class="form-control" required maxlength="9" pattern="[0-9]+">
						<span id="usr_id_error" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label>usr_name<a style="color:red">*</a></label>
						<input type="text" name="usr_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>	email <a style="color:red">*必須有@</a></label>
						<input type="email" name="email" class="form-control" required>
						<span id="email_error" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label>password<a style="color:red">*</a></label>
						<input type="text"  class="form-control" name="password" required maxlength="15">
					</div>	
                    <div class="form-group">
						<label>phone<a style="color:red">* 只可以輸入數字<p>請輸入香港電話號碼八位數字</p></a></label>
						<input type="text"  class="form-control" name="phone" required maxlength="8" pattern="[0-9]+">
					</div>
                    <div class="form-group">
						<label>user_type<a style="color:red">*</a></label>
						<!-- <input type="text"  class="form-control" name="user_type" required> -->
						<select class="form-control" name="user_type" required>
                            <option value="admin">admin</option>
                            <option value="user">teacher</option>
                            <option value="teacher">user</option>
                        </select>
					</div>		
                    <!-- <div class="form-group">
						<label>image</label>
                        <input type="file" name="image" class="form-control" accept="image/jpg, image/png, image/jpeg" onchange="uploadFile(this)">
                        <form method="POST" action="insert.php" enctype="multipart/form-data">
					</div> -->
                    <div class="form-group">
						<label>remark</label>
						<textarea class="form-control" name="remark"  ></textarea>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>



<!-- Update Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Update Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>cna<a style="color:red">*請輸入九位數字</a></label>
						<input type="text" name="usr_id" class="form-control" required maxlength="9" pattern="[0-9]+">
					</div>
					<div class="form-group">
						<label>usr_name<a style="color:red">*</a></label>
						<input type="text" name="usr_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>	email <a style="color:red">*必須有@</a></label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>password<a style="color:red">*</a></label>
						<input type="text"  class="form-control" name="password" required>
					</div>	
                    <div class="form-group">
						<label>phone<a style="color:red">* 只可以輸入數字<p>請輸入香港電話號碼八位數字</p></a></label>
						<input type="text"  class="form-control" name="phone" required maxlength="8" pattern="[0-9]+">
					</div>
                    <div class="form-group">
						<label>user_type<a style="color:red">*</a></label>
						<!-- <input type="text"  class="form-control" name="user_type" required> -->
						<select class="form-control" name="user_type" required>
                            <option value="admin">admin</option>
                            <option value="user">teacher</option>
                            <option value="teacher">user</option>
						</select>
					</div>		
                    <!-- <div class="form-group">
						<label>image</label>
                        <input type="file" name="image" class="form-control" accept="image/jpg, image/png, image/jpeg" onchange="uploadFile(this)">
                        <form method="POST" action="insert.php" enctype="multipart/form-data">
					</div> -->
                    <div class="form-group">
						<label>remark</label>
						<textarea class="form-control" name="remark"  ></textarea>
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
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>


<script src="assets/js/admin_manager.js"></script>
<!-- jQuery 库 -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
