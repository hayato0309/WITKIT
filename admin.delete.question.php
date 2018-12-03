<?php
session_start();
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/admin.delete.question.css">
	<title>WITKIT_admin.delete.question</title>
</head>
<body>
<div class="WITKIT_logo">
        <img src="images/WITKIT.jpg" width="150">
</div>
<div class="lower">
	<?php
	$questionid = $_POST["delete"];

	$sql_answer = "DELETE FROM answer WHERE QuestionID = $questionid";

	$conn->query($sql_answer);

	$sql_delete = "DELETE FROM question WHERE QuestionID = $questionid";

	$conn->query($sql_delete);

	if ($conn->query($sql_answer) === TRUE && $conn->query($sql_delete) === TRUE){
			echo "<div class='success'>Question was deleted successfully</div>";
		}else{
			echo "<div class='error'>Error during deleting record.</div> ".$conn->error;
		}
	?>
	<br>
	<div class="back">
			<a href="admin.question.list.php"><input class="back_button" type="button" name="back" value="Back"></a>
	</div>
</div>
</body>
</html>