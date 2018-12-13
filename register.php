<?php
session_start();
session_destroy();
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/register.css">
	<title>WITKIT_register</title>
</head>
<body>		
	<div class="WITKIT_logo">
		<img src="images/WITKIT.jpg" width="150">
	</div>
	<div class="lower">
		<div class="to_register">
			<div>
				If you already have your account, click <a class="register_link" href="login.php">here</a>.
			</div>
		</div>
		<br>
		<form action="register_check.php" method="POST">
			<div class="user_information">
				<!-- username should be unique. if it's unique, the username will be displayed -->
				<table>
					<tr>
						<td class="left_column">User Name</td>
						<td><input type='text' name='username' pattern="^[0-9A-Za-z]+$" maxlength='20' placeholder='User Name' size='25' autofocus required ></td>
					</tr>
				</table>
					<div>
						<?php
							if(isset($_SESSION["exist_username"])){
									echo "<div class='username_error'>Your username already exists.</div>";
									$_SESSION["exist_username"] = NULL;
							}
						?>
					</div>
				<table>
					<tr>
						<td class="left_column">Email Address</td>
						<td>
							<?php if($_SESSION): ?>
								<input type="email" name="emailaddress" maxlength="40" placeholder="Email Address" value="<?php echo $_SESSION['emailaddress'] ?>" size="25" autofocus required>
							<?php else: ?>
								<input type="email" name="emailaddress" maxlength="40" placeholder="Email Address" size="25" autofocus required>
							<?php endif; ?>
						</td>
					<tr>
						<td class="left_column">Password</td>
						<td><input type="password" name="password1" placeholder="Password" maxlength="20" pattern="^[0-9A-Za-z]+$" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" size="25" autofocus required></td>
					</tr>
					<tr>
						<td class="left_column">Password*</td>
						<td><input type="password" name="password2" placeholder="Password" maxlength="20" pattern="^[0-9A-Za-z]+$" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" size="25" autofocus required></td>
					</tr>
				</table>
					<div>
						<?php
							if(isset($_SESSION["wrong_password"])){
							$password1 = $_SESSION["password1"];
							$password2 = $_SESSION["password2"];

								if($password1 !== $password2){
									echo "<div class='password_error'>Your passwords are not same.</div>";
									$_SESSION["wrong_password"] = NULL;
								}
							}
						?>
					</div>
				<br>
				<div class="password_notice">
					*Password needs more than 8 characters with capital letter, small letter, and numbers.
				</div>

				

			</div>
			<br>
			<div class="check">
				<input class="check_button" type="submit" name="Check" value="Check">
			</div>
		</form>
	</div>
</body>
</html>