<?php
session_start();
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>WITKIT_edit.question</title>
</head>
<body>
	<div class="editquestion">
		<div class="q_username">User Name : $username</div>
		<hr>
		<div class="question"> $question </div>
	</div>
</body>
</html>