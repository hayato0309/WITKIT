<?php
session_start();
include 'dbconnect_myproject.php';

$accountid = $_SESSION['accountid'];
if($accountid == 0){
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/ask.question.css">
	<title>WITKIT_ask.question</title>
</head>
<body>
	<div class="WITKIT_logo">
		<img src="images/WITKIT.jpg" width="150">
	</div>
	<div class="banner_backgcolor">
		<div class="banner">
			<a href="ask.question.php"><div class="ask_question">Ask Question</div></a>
			<a href="question.list.php"><div class="question_list">Question List</div></a>
			<a href="edit.profile.php"><div class="edit_profile">Edit Profile</div></a>
			<a href="logout.php"><div class="logout">Logout</div></a>
		</div>
	</div>
	<div class="lower">
		<div class="text">What's your problem?</div>
		<form action="ask.question.confirmation.php" method="POST">
			<div class="add_question">
				<div class="username">User Name : 
					<?php
					echo $_SESSION['username'];
					?>
				</div>
				<hr>
				<div class="question">
					<textarea name="question" rows="7" cols="54" placeholder="What's your problem?" maxlength="2000" required></textarea>
				</div>
			</div>
			<div class="buttons">
					<input type="submit" name="post" value="Post"><br>
					<a href="dashboard.php"><input type="button" name="home" value="Home"></a>
			</div>
		</form>
	</div>
</body>
</html>