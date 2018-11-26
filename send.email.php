<?php
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>WITKIT_send.email</title>
</head>
<body>
	<?php
	if($_POST['getpassword']){
		$login_username = $_POST['username'];
		$login_emailaddress = $_POST['emailaddress'];

		$sql = "SELECT UserName, Password FROM userinfo WHERE UserName='$login_username' AND EmailAddress='$login_emailaddress'";

		$result = $conn->query($sql);

		$informations = $result->fetch_assoc();
			$username = $informations['UserName'];
			$password = $informations['Password'];

		// var_dump($username);
		// var_dump($password);
		// var_dump($email);

		$msg = "Hi, $username! This is your password : $password";

		mail("$login_emailaddress","Your Password","$msg");

		header('Location: login.php');
	}
	?>
</body>
</html>