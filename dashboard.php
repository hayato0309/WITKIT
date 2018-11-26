<?php
session_start();

$accountid = $_SESSION['accountid'];
if($accountid == 0){
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/dashboard.css">
	<title>WITKIT_dashboard</title>
</head>
<body>
	<div class="WITKIT_logo">
		<img src="images/WITKIT.jpg" width="150">
	</div>
	<div class="lower">
		<form>
			<div class="links">
				<a href="ask.question.php">
					<div class="askquestion">Ask Question</div>
				</a><br>
				<a href="question.list.php">
					<div class="questionlist">Question List</div>
				</a><br>
				<a href="edit.profile.php">
					<div class="editprofile">Edit Profile</div>
				</a><br>
				<a href="logout.php">
					<div class="logout">Logout</div>
				</a>
				<br>
			</div>
		</form>
	</div>
</body>
</html>