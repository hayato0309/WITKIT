<?php
session_start();
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
			<div>If you already have your account, click <a class="register_link" href="login.php">here</a>.</div>
		</div>
		<br>
		<form action="register_check.php" method="POST">
			<div class="user_information">
				<!-- username should be unique. if it's unique, the username will me displayed -->
				<?php
					if(!$_SESSION){
						echo "<div>User Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='username' maxlength='20' placeholder='User Name' size='25' autofocus required ></div><br>";
					}else{
						$username = $_SESSION["username"];	
						$sql = "SELECT AccountID FROM userinfo WHERE UserName = '$username'";
						$result = $conn->query($sql);
						// var_dump($result);
						$accountid = $result->fetch_assoc();

							if($accountid){
								echo "<div>User Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='username' maxlength='20' placeholder='User Name' size='25' autofocus required ></div>
									<div class='username_error'>Your username already exists.</div>";
							}else{
								echo "<div>User Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='username' maxlength='20' placeholder='User Name' value='$username' size='25' autofocus required ></div><br>";
							}
					}
				?>

				<!-- echo $emailaddress so that users doesn't have to enter their email address -->
				<?php
					if($_SESSION){
						$emailaddress = $_SESSION["emailaddress"];
					
						echo "<div>Email Address&nbsp;<input type='email' name='emailaddress' maxlength='40' placeholder='Email Address' value='$emailaddress' size='25' autofocus required></div><br>";
					}else{
						echo "<div>Email Address&nbsp;<input type='email' name='emailaddress' maxlength='40' placeholder='Email Address' size='25' autofocus required></div><br>";
					}
				?>

				<div>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password1" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" size="25" autofocus required> </div><br>

				<div>Password*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password2" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" size="25" autofocus required></div>
				<br>
				<div class="password_notice">*Password needs more than 8 characters with capital letter, small letter, and numbers.</div>

				<!-- user's passwords must be same -->
				<?php
				if($_SESSION){
					$password1 = $_SESSION["password1"];
					$password2 = $_SESSION["password2"];

					if($password1 !== $password2){
						echo "<div class='password_error'>Your passwords are not same.</div>";
					}
				}
				?>

			</div>
			<br>
			<div class="check">
				<input class="check_button" type="submit" name="Check" value="Check">
			</div>
		</form>
	</div>
</body>
</html>