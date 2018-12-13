<?php
session_start();
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>WITKIT_login.check</title>
</head>
<body>
	<?php
		$informations = array();
		if($_POST){
			$login_username = $_POST['username'];
			$login_password = $_POST['password'];

			$sql = "SELECT AccountID, UserName, EmailAddress, deleted FROM userinfo WHERE UserName='$login_username' AND Password='$login_password'";

			$result = $conn->query($sql);

			$informations = $result->fetch_assoc();
				$_SESSION['accountid'] = $informations['AccountID'];
				$_SESSION['username'] = $informations['UserName'];
				$_SESSION['emailaddress'] = $informations['EmailAddress'];
				$_SESSION['deleted'] = $informations['deleted'];						

				if($_SESSION['accountid'] == 0 || $_SESSION['deleted'] == 1){
					$_SESSION["wrong_info"] = "on";
					header('Location: login.php');
				} else{
					header('Location: dashboard.php');
				}
		}
	?>
</body>
</html>