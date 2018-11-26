<?php
session_start();
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/admin.delete.answer.css">
	<title></title>
</head>
<body>
	<div class="WITKIT_logo">
        <img src="images/WITKIT.jpg" width="150">
    </div>
    <div class="lower">
	    <?php
			$answerid = $_POST["delete"];
			// var_dump($questionid);
			$sql = "DELETE FROM answer WHERE AnswerID = $answerid";

				if($conn->query($sql) === TRUE){
				    echo "<div class='success'>Answer was deleted successfully.</div>";
				}else{
				    echo "<div class='error'>Error during deleting.</div>" . $conn->error;
				}
		?>
		<br>
		<div class="back">
	        <a href="admin.question.list.php"><input class="back_button" type="button" name="back" value="Back"></a>
	    </div>
	</div>
</body>
</html>