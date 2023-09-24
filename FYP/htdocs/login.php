<!DOCTYPE html>
<html>
<head>
	<title>Modal Login Form</title>
	<style>
		/* 模态框的样式 */
		.modal {
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0,0,0,0.4);
		}

		/* 模态框内容的样式 */
		.modal-content {
			background-color: #fefefe;
			margin: 15% auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
			max-width: 400px;
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			position: relative;
			border-radius: 5px;
		}

		/* 关闭按钮的样式 */
		.close {
			position: absolute;
			right: 10px;
			top: 10px;
			color: #aaa;
			font-size: 28px;
			font-weight: bold;
			cursor: pointer;
		}

		.close:hover,
		.close:focus {
			color: black;
			text-decoration: none;
			cursor: pointer;
		}

		/* 头像的样式 */
		.avatar {
			width: 100%;
			margin-bottom: 20px;
			border-radius: 5px;
		}

		/* 容器的样式 */
		.container {
			padding: 16px;
		}

		/* 登录按钮的样式 */
		button[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
			border-radius: 5px;
		}

		button[type=submit]:hover {
			background-color: #45a049;
		}

		/* 取消按钮的样式 */
		.cancelbtn {
			width: auto;
			padding: 10px 18px;
			background-color: #f44336;
			color: white;
			border: none;
			cursor: pointer;
			margin-right: 10px;
			border-radius: 5px;
		}

		.cancelbtn:hover {
			background-color: #da190b;
		}

		/* 留白的样式 */
		.clearfix::after {
			content: "";
			clear: both;
			display: table;
		}

		/* 'Forgot password?' 链接的样式 */
		.psw {
			float: right;
		}

		.psw a {
			color: #2196F3;
		}

		.psw a:hover {
			text-decoration: underline;
		}
	</style>
</head>
<body>

	<h2>Modal Login Form</h2>

	<button id="loginBtn" style="width:auto;">Login</button>

	<div id="loginModal" class="modal" role="dialog">
		<div class="modal-content animate">
			<span class="close" title="Close Modal">&times;</span>
			<divclass="imgcontainer">
				<img src="img_avatar2.png" alt="Avatar" class="avatar">
			</div>

			<form class="container" action="/action_page.php" method="post">
				<label for="uname"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="uname" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<div class="clearfix">
					<label>
						<input type="checkbox" checked="checked" name="remember"> Remember me
					</label>
					<button type="submit">Login</button>
					<button type="button" class="cancelbtn">Cancel</button>
				</div>
				<div class="psw">Forgot <a href="#">password?</a></div>
			</form>
		</div>
	</div>

	<script>
		// 获取模态框和登录按钮
		var modal = document.getElementById('loginModal');
		var loginBtn = document.getElementById("loginBtn");

		// 当用户单击登录按钮时，显示模态框
		loginBtn.onclick = function() {
			modal.style.display = "block";
		}

		// 当用户单击模态框外部区域时，关闭模态框
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}

		// 当用户单击关闭按钮时，关闭模态框
		var closeBtn = document.getElementsByClassName("close")[0];
		closeBtn.onclick = function() {
			modal.style.display = "none";
		}

		// 当用户单击取消按钮时，关闭模态框
		var cancelBtn = document.getElementsByClassName("cancelbtn")[0];
		cancelBtn.onclick = function() {
			modal.style.display = "none";
		}
	</script>

</body>
</html>