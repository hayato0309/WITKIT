<?php
session_start();
include 'dbconnect_myproject.php';

$admin_name = $_SESSION["admin_name"];
if(!$admin_name){
	header('Location: admin.login.php');
	// var_dump($admin_name);
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/admin.dashboard.css">
	<title>WITKIT_admin.dashboard</title>
</head>
<body>
	<div class="WITKIT_logo">
		<img src="images/WITKIT.jpg" width="150">
	</div>
	<div class="lower">
		<form>
			<div class="links">
				<a href="admin.question.list.php">
					<div class="questionlist">Question List</div>
				</a><br>
				<a href="admin.account.list.php">
					<div class="accountlist">Account List</div>
				</a><br>
				<a href="admin.logout.php">
					<div class="logout">Logout</div>
				</a>
				<br>
			</div>
		</form>
	</div>
</body>
</html>