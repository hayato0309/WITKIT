<?php
session_start();
include 'dbconnect_myproject.php';

$accountid = $_SESSION['accountid'];
if($accountid == 0){
	header('Location: login.php');
}

$accountid = $_SESSION['accountid'];

$sql = "SELECT UserName, EmailAddress, Password FROM userinfo WHERE AccountID = '$accountid'";

$result = $conn->query($sql);

$informations = array();
$informations = $result->fetch_assoc();

$username = $informations['UserName'];
$emailaddress = $informations['EmailAddress'];
$password = $informations['Password'];

?>
<!-- pop up dialog to make sure users want to delete their accounts.  -->
<script type="text/javascript">
// <![CDATA[
function yesno(){
if(window.confirm("Are you sure you want to delete your account?"))
	var accountid = document.getelementByid(accountid).value;
	location.href = "delete.account.php?accountid="+accountid+"";
} 
// ]]>
</script>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/edit.profile.css">
	<title>WITKIT_edit.profile</title>
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
		<p>Please edit your profile</p>

		<form action="edit.profile.check.php" method="POST">

			<div class="editprofile">
				<div>User Name : <?php echo $username; ?></div>
				<hr><br>
				<div>Email Address : <?php echo $emailaddress; ?></div>
				<hr><br>
				<div>Password : <?php echo $password; ?></div>
				<hr>

				<br>
				<img src="images/arrow.navy.png" width="50">
				<br><br>

					<div class="username">User Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="username" maxlength="20" placeholder="User Name" size="25" autofocus required ></div><hr><br>

					<div>Email Address&nbsp;&nbsp;<input type="email" name="emailaddress" maxlength="40" placeholder="Email Address" size="25" autofocus required></div><hr><br>

					<div>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password1" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" size="25" autofocus required></div><hr><br>

					<div>Password*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password2" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" size="25" sautofocus required></div><hr>
			</div>
			<div class="register">
				<input class="register_button" type="submit" name="register" value="Register">
			</div>
		</form>
		<form action="delete.account.php" method="GET">
			<div class="delete_account">
				<div>If you want delete your account, click this button.</div>
				<!-- pop up dialog to make sure users want to delete their accounts.  -->
				<a onclick="yesno(); return false;">
				<?php
					echo "<input type='hidden' name='delete_account' value=$accountid>";
					echo "<input type='submit' value='Delete'>";
				?>
				</a>
			</div>
		</form>


		<input type="hidden" id="accountid" name="accountid" value="<?php echo $accountid; ?>">


		<br><br>

		<p>Your Questions</p>
			<?php
			$sql = "SELECT * FROM question WHERE AccountID = $accountid";

			$result = $conn->query($sql);

			if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$questionid = $row['QuestionID'];
					$username = $row['UserName'];
					$question = $row['Question'];
				
				echo"<div class='editquestion'>
						<div class='q_username'>User Name : $username</div>
						<hr>
						<form action='edit.question.confirmation.php' method='POST'>
							<div class='question'>
								<textarea name='edit_question' rows='7' cols='63'  maxlength='500'>$question</textarea>
							</div>
							<br>
							<div class='edit_link'>
								<input type='hidden' name='edit' value=$questionid>
								<input class='edit_button' type='submit' value='Edit'>
							</div>
						</form>
						<form action='delete.question.confirmation.php' method='POST'>
							<div class='delete_link'>
								<input type='hidden' name='delete' value=$questionid>
								<input class='delete_buton' type='submit' value='Delete'>
							</div>
						</form>
					</div>";
				}
			}else{
				echo "<div class='no_questions'>No questions.</div>";
			}

			?>
		<div class="home">
			<a href="dashboard.php"><input class="home_button" type="button" name="home" value="Home"></a>
		</div>
	</div>
</body>
</html>