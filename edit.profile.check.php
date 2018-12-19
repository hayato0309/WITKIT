<?php
session_start();
include 'dbconnect_myproject.php';

$accountid = $_SESSION['accountid'];
if($accountid == 0){
	header('Location: login.php');
}

$_SESSION["edit_username"] = $_POST["edit_username"];
$username = $_SESSION["edit_username"];	
$sql = "SELECT AccountID FROM userinfo WHERE UserName = '$username'";
$result = $conn->query($sql);
// var_dump($result);
$accountid = $result->fetch_assoc();


if($accountid){
	$_SESSION["exist_username"] = "on";
	header('Location: edit.profile.php');
}

if($_POST){
	$_SESSION['password1'] = $_POST['password1'];
	$_SESSION['password2'] = $_POST['password2'];

	$password1 = $_SESSION["password1"];
	$password2 = $_SESSION["password2"];

	if($password1 !== $password2){
		$_SESSION["wrong_password"] = "on";
		header('Location: edit.profile.php');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/edit.profile.check.css">
	<title>WITKIT_edit.profile.check</title>
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
		<form action="edit.profile.confirmation.php" method="POST">
			<div class="user_information">
				<table>
					<tr>
						<td class="left_column">User Name</td>
						<td colspan="2"><input type="text" name="username" pattern=".*\S+.*" maxlength="20" placeholder="User Name" value="<?php echo $_SESSION['edit_username']?>" size="25" autofocus required readonly></td>
					</tr>
					<tr>
						<td class="left_column">Email Address</td>
						<td colspan="2"><input type="email" name="emailaddress" maxlength="40" placeholder="Email Address" value="<?php echo $_POST['emailaddress']?>" size="25" autofocus required readonly></td>
					</tr>
					<tr>
						<td class="left_column">Password</td>
						<td><input type="password" id="password" name="password1" value="<?php echo $_SESSION['password1']?>" size="16" readonly></td>
						<td><button type="button" onclick="if (password.type == 'text') password.type = 'password';
	  						else password.type = 'text';">Show</button></td>
					</tr>
				</table>
			</div>
			<br>
			<div class="buttons">
				<a href="edit.profile.php"><input class="back_button" type="button" name="back" value="Back"></a>
				<a href="edit.profile.confirmation.php"><input class="register_button" type="submit" name="register" value="Register"></a>
			</div>
		</form>
	</div>
</body>
</html>