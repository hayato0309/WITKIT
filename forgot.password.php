<?php
	session_start();
?>

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
				<table>
					<tr>
						<td class="left_column">User Name</td>
						<td><input type="text" name="username" maxlength="20" pattern="^[0-9A-Za-z]+$" placeholder="User Name" size="25" autofocus required ></td>
					</tr>
					<tr>
						<td class="left_column">Email Address</td>
						<td><input type="email" name="emailaddress" maxlength="40" placeholder="Email Address" size="25" autofocus required></td>
					</tr>
				</table>
				<div>
					<?php
						if(isset($_SESSION["error"])){
							// var_dump($_SESSION["error"]);
							echo "<div class='error'>Your name or email address is incorrect.</div>";
							$_SESSION["error"] = NULL;
						}
					?>
				</div>
			</div>
			<div class="getpassword">
				<input class="click_button" type="submit" name="getpassword" value="Click">
			</div>
			<div class="text">Click this button to get your password.</div>
		</form>
	</div>
</body>
</html>