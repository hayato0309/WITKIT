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
			$answerid = $_POST["delete_a"];
			// var_dump($questionid);
			$sql_answer = "DELETE FROM answer WHERE AnswerID = $answerid";

				if($conn->query($sql_answer) === TRUE){
				    echo "<div class='success'>Your answer was deleted successfully.</div>";
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