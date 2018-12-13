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
				<table>
					<tr>
						<td class="left_column">User Name</td>
						<td colspan="2"><input type="text" name="username" pattern=".*\S+.*" maxlength="20" placeholder="User Name" value="<?php echo $_SESSION['username']?>" size="25" autofocus required readonly></td>
					</tr>
					<tr>
						<td class="left_column">Email Address</td>
						<td colspan="2"><input type="email" name="emailaddress" maxlength="40" placeholder="Email Address" value="<?php echo $_SESSION['emailaddress']?>" size="25" autofocus required readonly></td>
					</tr>
					<tr>
						<td class="left_column">Password</td>
						<td><input type="password" id="password" name="password1" value="<?php echo $_SESSION['password1']?>" size="16" readonly></td>
						<td><button type="button" onclick="if (password.type == 'text') password.type = 'password';
	  						else password.type = 'text';">Show</button></td>
					</tr>
				</table>
				

				<?php
					if($_POST){
						$password1 = $_SESSION["password1"];
						$password2 = $_SESSION["password2"];

						if($password1 !== $password2){
							$_SESSION["wrong_password"] = "on";
							header('Location: register.php');
						}
					}

					$username = $_SESSION["username"];	
					$sql = "SELECT AccountID FROM userinfo WHERE UserName = '$username'";
					$result = $conn->query($sql);
					// var_dump($result);
					$accountid = $result->fetch_assoc();

					if($accountid){
						$_SESSION["exist_username"] = "on";
						header('Location: register.php');
					}
				?>

			</div>
			<br>
			<div class="buttons">
				<a href="register.php"><input class="back_button" type="button" name="back" value="Back"></a>
				<a href="register.confirmation.php"><input class="register_button" type="submit" name="	register" value="Register"></a>
			</div>
		</form>
		</div>
	</div>
</body>
</html>