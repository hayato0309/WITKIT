<?php
session_start();
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/ask.question.confirmation.css">
	<title>WITKIT_ask.question.check</title>
</head>
<body>
	<div class="WITKIT_logo">
		<img src="images/WITKIT.jpg" width="150">
	</div>
	<div class="lower">
		<?php
			if($_POST){
				$username = $_SESSION['username'];
				$question = $_POST['question'];
				$accountid = $_SESSION['accountid'];

				$escaped_question = addslashes($question);
				$sql = "INSERT INTO question(UserName, Question, AccountID)VALUES('$username','$escaped_question','$accountid')";

	        if($conn->query($sql) === TRUE){
	        	echo "<div class='success'>Record is updated successfully.</div>";
	        }else{
	        	echo "<div class='error'>Error during registration.</div>" . $conn->error;
	        }
				
			}
		?>
		<br>
		<div class="home">
			<a href="dashboard"><input class="home_button" type="button" name="home" value="Home"></a>
		</div>
	</div>
</body>
</html>