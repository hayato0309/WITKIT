<?php
session_start();
include 'dbconnect_myproject.php';

if($_POST){
$_SESSION["username"] = $_POST["username"];
$_SESSION["emailaddress"] = $_POST["emailaddress"];
$_SESSION["password1"] = $_POST["password1"];
$_SESSION["password2"] = $_POST["password2"];
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/register.check.css">
	<title>WITKIT_register.check</title>
</head>
<body>
	<div class="WITKIT_logo">
		<img src="images/WITKIT.jpg" width="150">
	</div>
	<div class="lower">
		<form action="register.confirmation.php" method="POST">
			<div class="user_information">
				<div>User Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="username" maxlength="20" placeholder="User Name" value="<?php echo $_SESSION['username']?>" size="25" autofocus required></div><br>

				<div>Email Address&nbsp;&nbsp;&nbsp;<input type="email" name="emailaddress" maxlength="40" placeholder="Email Address" value="<?php echo $_SESSION['emailaddress']?>" size="25" autofocus required></div><br>
	  			
	 			Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" id="password" name="password1" value="<?php echo $_SESSION['password1']?>" size="17"/>
					<button type="button" onclick="if (password.type == 'text') password.type = 'password';
	  				else password.type = 'text';">Show</button>

				<?php
					if($_POST){
						$password1 = $_SESSION["password1"];
						$password2 = $_SESSION["password2"];

						if($password1 !== $password2){
							header('Location: register.php');
						}
					}

					$username = $_SESSION["username"];	
					$sql = "SELECT AccountID FROM userinfo WHERE UserName = '$username'";
					$result = $conn->query($sql);
					// var_dump($result);
					$accountid = $result->fetch_assoc();

					if($accountid){
						header('Location: register.php');
					}
				?>

			</div>
			<br>
			<div class="register">
				<a href="resister.confirmation.php"><input class="register_button" type="submit" name="register" value="Register"></a>
			</div>
		</form>
	</div>
</body>
</html>