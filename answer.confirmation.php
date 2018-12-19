<?php
session_start();
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/answer.confirmation.css">
	<title>WITKIT_answer.confirmation</title>
</head>
<body>
	<div class="WITKIT_logo">
        <img src="images/WITKIT.jpg" width="150">
    </div>
    <div class="lower">
	    <?php
	    	$username = $_SESSION["username"];
			$answer = $_POST["answer"];
			$questionid = $_POST["questionid"];
			$accountid = $_SESSION["accountid"];

			// var_dump($questionid);
			$escaped_answer = addslashes($answer);
			$sql = "INSERT INTO answer(UserName, Answer, QuestionID, AccountID)VALUES('$username','$escaped_answer','$questionid', '$accountid')";

			    if($conn->query($sql) === TRUE){
			        
			        $sql = "SELECT AccountID FROM question WHERE QuestionID = '$questionid'";
			        $result = $conn->query($sql);
			        $row = $result->fetch_assoc();
					$accountid = $row["AccountID"];

			        $sql = "SELECT EmailAddress FROM userinfo WHERE AccountID = '$accountid'";
			        $result = $conn->query($sql);
			        $row = $result->fetch_assoc();
			        $emailaddress = $row["EmailAddress"];

			        // var_dump($emailaddress);

			        $msg = "You got an answer!";

			        mail("$emailaddress","Notification","$msg");

			        echo "<div class='success'>Answer was posted successfully.</div>";
			    }else{
			        echo "<div class='error'>Error during registration.</div>" . $conn->error;
			    }

		?>
		<div class="back_question_list">
			<a href="question.list.php">
				<input class="back_button" type="button" name="back" value="Back">
			</a>
		</div>
	</div>
</body>
</html>