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
				<div>User Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="username" maxlength="20" placeholder="User Name" value="<?php echo $_POST['username']?>" size="25" autofocus required></div><br>

				<div>Email Address&nbsp;<input type="email" name="emailaddress" maxlength="40" placeholder="Email Address" value="<?php echo $_POST['emailaddress']?>" size="25" autofocus required></div><br>
	  			
	 			Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" id="password" name="password1" value="<?php echo $_POST['password1']?>" size="17"/>
					<button type="button" onclick="if (password.type == 'text') password.type = 'password';
	  				else password.type = 'text';">Show</button>

				<?php
					if($_POST){
						$password1 = $_POST["password1"];
						$password2 = $_POST["password2"];

						if($password1 !== $password2){
							header('Location: edit.profile.php');
						}
					}	
				?>
			</div>
			<div class="register">
				<a href="edit.profile.confirmation.php"><input class="register_button" type="submit" name="register" value="Register"></a>
			</div>
		</form>
	</div>
</body>
</html>