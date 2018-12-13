<?php
session_start();
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/edit.question.confirmation.css">
	<title>WITKIT_edit.question.confirmation</title>
</head>
<body>
	<div class="WITKIT_logo">
        <img src="images/WITKIT.jpg" width="150">
    </div>
    <div class="lower">
		<?php
			$questionid = $_POST["edit"];
			$edit_question = $_POST["edit_question"];

			$escaped_question = addslashes($edit_question);
			
			$sql = "UPDATE question SET Question = '$escaped_question' WHERE QuestionID = '$questionid'";

				if($conn->query($sql) === TRUE){
				    echo "<div class='success'>Updating record was done successfully.</div>";
				}else{
				    echo "<div class='error'>Error during updating.</div>" . $conn->error;
				}
		?>
		<br>
		<div class="back_edit_profile">
	        <a href="edit.profile.php"><input class="back_button" type="button" name="back" value="Back"></a>
	    </div>
	</div>
</body>
</html>