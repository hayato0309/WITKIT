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
			$answerid = $_POST["edit_a"];
			$edit_answer = $_POST["edit_answer"];

			$escaped_answer = addslashes($edit_answer);
			
			$sql = "UPDATE answer SET Answer = '$escaped_answer' WHERE AnswerID = '$answerid'";

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