<?php
session_start();
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/.css">
	<title>WITKIT_admin.login.check</title>
</head>
<body>
	<?php
	$admin_name = $_POST["admin_name"];
	$admin_password = $_POST["admin_password"];

	if($admin_name == "Hayato" && $admin_password == "19950309"){
		$_SESSION['admin_name'] = $admin_name;
		$_SESSION['admin_password'] = $admin_password;
		header('Location: admin.dashboard.php');
	}else{
		header('Location: admin.login.php');
	}
	?>
</body>
</html>