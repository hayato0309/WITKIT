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
	<link rel="stylesheet" href="../WIT KIT/css/question.list.css">
	<title>WITKIT_question.list</title>
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
	    <p>Question List</p>

	    <?php
			$sql = "SELECT * FROM question";

			$result = $conn->query($sql);

			if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$questionid = $row['QuestionID'];
					$username = $row['UserName'];
					$question = $row['Question'];
				
				echo"<div class='answer_question'>
						<div class='q_username'>User Name : $username</div>
						<hr>
						<div class='question'>
							$question
						</div>
						<form action='answer.php' method='POST'>
							<div class='answer'>
								<input type='hidden' name='answer' value=$questionid>
								<input type='submit' value='Answer'>
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