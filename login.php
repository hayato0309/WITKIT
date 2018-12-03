<?php
session_start();

// ログイン後に戻るボタンを押してもlogin画面に移動しない（未完成）
// $accountid = $_SESSION['accountid'];
// if($accountid !== 0){
	// header('Location: dashboard.php');
// }
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/login.css">
	<title>WITKIT_login</title>
</head>
<body>
	<div class="WITKIT_logo">
		<img src="images/WITKIT.jpg" width="150">
	</div>
	<div class="lower">
		<form action="login.check.php" method="POST">
			<div class="user_information">
				<div>User Name&nbsp;&nbsp;&nbsp;<input type="text" name="username" maxlength="20" placeholder="User Name" size="25" autofocus required></div><br>

				<div>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" size="25" autofocus required></div><br>

				<div class="forgotpassword"><a class="forgotpassword_link" href="forgot.password.php">Forgot Password</a></div>
			</div>

			<div class="login">
				<input class="login_button" type="submit" name="login" value="Login">
			</div>
			<br>
			<div class="to_register">
				<div>
				If you go to Register page, click <a class="register_link" href="register.php">here</a>.
				</div>
			</div>
			<br>
			<!-- <div class="loginSNS">
				<div>Login with SNS</div><br>
				<img src="../images/facebook.png">
				<img src="../images/twitter.png">
			</div> -->
			<br>
		</form>
	</div>
</body>
</html>