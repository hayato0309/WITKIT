<?php
session_start();
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/delete.question.confirmation.css">
	<title>WITKIT_delete.question.confirmation</title>
</head>
<body>
	<div class="WITKIT_logo">
        <img src="images/WITKIT.jpg" width="150">
    </div>
    <div class="lower">
		<?php
			$questionid = $_POST["delete"];
			// var_dump($questionid);
			$sql_answer = "DELETE FROM answer WHERE QuestionID = $questionid";
			$sql_question = "DELETE FROM question WHERE QuestionID = $questionid";

				if($conn->query($sql_answer) === TRUE && $conn->query($sql_question) === TRUE){
				    echo "<div class='success'>Your question was deleted successfully.</div>";
				}else{
				    echo "<div class='error'>Error during deleting.</div>" . $conn->error;
				}
		?>
		<div class="back_edit_profile">
	        <a href="edit.profile.php"><input class="back_button" type="button" name="back" value="Back"></a>
	    </div>
	</div>
</body>
</html>