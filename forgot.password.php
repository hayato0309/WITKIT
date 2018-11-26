<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/forgot.password.css">
	<title>WITKIT_forgotpassword</title>
</head>
<body>
	<div class="WITKIT_logo">
		<img src="images/WITKIT.jpg" width="150">
	</div>
	<div class="lower">
		<form action="send.email.php" method="POST">
			<div class="user_information">
				<div>User Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="username" maxlength="20" placeholder="User Name" size="25" autofocus required ></div><br>

				<div>Email Address&nbsp;&nbsp;<input type="email" name="emailaddress" maxlength="40" placeholder="Email Address" size="25" autofocus required> </div>
			</div>
			<div class="getpassword">
				<input class="click_button" type="submit" name="getpassword" value="Click">
			</div>
			<div class="text">Click this button to get your password.</div>
		</form>
	</div>
</body>
</html>