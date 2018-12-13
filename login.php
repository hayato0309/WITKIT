<?php
session_start();
session_destroy();


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
				<table>
					<tr>
						<td class="left_column">User Name</td>
						<td><input type="text" name="username" maxlength="20" pattern="^[0-9A-Za-z]+$" placeholder="User Name" size="25" autofocus required></td>
					</tr>
					<tr>
						<td class="left_column">Password</td>
						<td><input type="password" name="password" maxlength="20" placeholder="Password" pattern="^[0-9A-Za-z]+$" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" size="25" autofocus required></td>
					</tr>
				</table>

				<?php
				if(isset($_SESSION["wrong_info"])){
					echo "<div class='error'>Your name or password is incorrect.</div>";
				}
				?>

				<br>
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