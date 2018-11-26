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
	<link rel="stylesheet" href="../WIT KIT/css/answer.css">
	<title>WITKIT_answer</title>
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
	    <?php
	    $questionid = $_POST["answer"];

	    $sql = "SELECT * FROM question WHERE QuestionID = $questionid";

	    $result = $conn->query($sql);

	    $row = $result->fetch_assoc();

	    $q_username = $row["UserName"];
	    $question = $row["Question"];
	    ?>

	    <div class="question_container">
	    	<div> User Name : <?php echo "$q_username" ?></div>
	    	<hr>
	    	<div><?php echo "$question" ?></div>
	    </div>
	    <div class="arrow">
	    	<img src="images/arrow.png" width="50">
	    </div>

	    <?php
			$sql = "SELECT * FROM answer WHERE QuestionID = $questionid";
			// var_dump($questionid);

			$result = $conn->query($sql);

			if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$answerid = $row['AnswerID'];
					$a_username = $row['UserName'];
					$answer = $row['Answer'];
				
					echo"<div class='answers'>
							<div>User Name : $a_username</div>
							<hr>
							<div class='answer'>
								$answer
							</div>
						</div>";
				}
			}else{
				echo "<div class='no_answers'>No Answers.</div>";
			}

			?>

	   	<form action="answer.confirmation.php" method="POST">
			<div class="answer_container">
				<div>User Name : 
					<?php
					echo $_SESSION['username'];
					?>
				</div>
				<hr>
				<div class="answer_box">
					<textarea name="answer" rows="7" cols="63" placeholder="Write down your answer here!" maxlength="2000"></textarea>
				</div>
			</div>
			<div class="buttons">
				<?php echo "<input type='hidden' name='questionid' value=$questionid>"; ?>
				<input class="submit_button" type="submit" value="Post"><br>
				<a href="dashboard.php"><input class="home_button" type="button" name="home" value="Home"></a>
			</div>
		</form>
	</div>
</body>
</html>