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
if(window.confirm("Are you sure you want to delete your account?\nLater your account will be deleted."))
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
				<div>User Name &emsp;:&emsp; <?php echo $username; ?></div>
				<hr><br>
				<div>Email Address &emsp;:&emsp; <?php echo $emailaddress; ?></div>
				<hr><br>
				<div>Password &emsp;:&emsp; <?php echo $password; ?></div>
				<hr>

				<br>
				<img src="images/arrow.navy.png" width="50">
				<br><br>

				<!-- username should be unique. if it's unique, the username will be displayed -->
				<div class="table">	
					<table>
						<tr>
							<td class="left_column">User Name</td>
							<td><input type="text" name="edit_username" maxlength="20" pattern="^[0-9A-Za-z]+$" placeholder="User Name" size="30" autofocus required ></td>
						</tr>
					</table>
					<div class="error"><?php if(isset($_SESSION["exist_username"])){
									echo "The name already exists.";
									$_SESSION["exist_username"] = NULL;
								}?>
					</div>
					<table>
						<tr>
							<td class="left_column">Email Address</td>
							<td><input type="email" name="emailaddress" maxlength="40" placeholder="Email Address" size="30" autofocus required></td>
						</tr>
						<tr>
							<td class="left_column">Password</td>
							<td><input type="password" name="password1" maxlength="20" pattern="^[0-9A-Za-z]+$" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" size="30" autofocus required></td>
						</tr>
						<tr>
							<td class="left_column">Password*</td>
							<td><input type="password" name="password2" maxlength="20" pattern="^[0-9A-Za-z]+$" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" size="30" autofocus required></td>
						</tr>
					</table>
				</div>
				<div class="error"><?php if(isset($_SESSION["wrong_password"])){
								echo "The passwords are not same.";
								$_SESSION["wrong_password"] = NULL;
							}?>
				</div>
				<br>
				<div class="password_notice">*Password needs more than 8 characters with capital letter, small letter, and numbers.</div>

				<!-- user's passwords must be same -->
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
					$username_question = $row['UserName'];
					$question = $row['Question'];
				
				echo"<div class='editquestion'>
						<div class='q_username'>User Name : $username</div>
						<hr>
						<form action='edit.question.confirmation.php' method='POST'>
							<div class='question'>
								<textarea name='edit_question' rows='7' cols='53'  maxlength='2000' required>$question</textarea>
							</div>
							<br>
							<div class='edit_link'>
								<input type='hidden' name='edit_q' value=$questionid>
								<input class='edit_button' type='submit' value='Edit'>
							</div>
						</form>
						<form action='delete.question.confirmation.php' method='POST'>
							<div class='delete_link'>
								<input type='hidden' name='delete_q' value=$questionid>
								<input class='delete_buton' type='submit' value='Delete'>
							</div>
						</form>
					</div>";
				}
			}else{
				echo "<div class='no_questions'>No questions.</div>";
			}
			?>

			<br>
			<p>Your Answers</p>

			<?php
			$sql_answer = "SELECT * FROM answer WHERE UserName = '$username'";
			$result_answer = $conn->query($sql_answer);

			if ($result_answer->num_rows > 0){
				while($row = $result_answer->fetch_assoc()){
					$answerid = $row['AnswerID'];
					$username_answer = $row['UserName'];
					$answer = $row['Answer'];
				
				echo"<div class='editquestion'>
						<div class='q_username'>User Name : $username_answer</div>
						<hr>
						<form action='edit.answer.confirmation.php' method='POST'>
							<div class='question'>
								<textarea name='edit_answer' rows='7' cols='53'  maxlength='2000' required>$answer</textarea>
							</div>
							<br>
							<div class='edit_link'>
								<input type='hidden' name='edit_a' value=$answerid>
								<input class='edit_button' type='submit' value='Edit'>
							</div>
						</form>
						<form action='delete.answer.confirmation.php' method='POST'>
							<div class='delete_link'>
								<input type='hidden' name='delete_a' value=$answerid>
								<input class='delete_buton' type='submit' value='Delete'>
							</div>
						</form>
					</div>";
				}
			}else{
				echo "<div class='no_questions'>No answers.</div>";
			}

			?>
		<div class="home">
			<a href="dashboard.php"><input class="home_button" type="button" name="home" value="Home"></a>
		</div>
	</div>
</body>
</html>