<?php
session_start();
include 'dbconnect_myproject.php';

$admin_name = $_SESSION["admin_name"];
if(!$admin_name){
	header('Location: admin.login.php');
	// var_dump($admin_name);
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/admin.question.list.css">
	<title>WITKIT_admin.question.list</title>
</head>
<body>
	<div class="WITKIT_logo">
        <img src="images/WITKIT.jpg" width="150">
    </div>
    <div class="banner_backgcolor">
		<div class="banner">
			<a href="admin.question.list.php"><div class="question_list">Question List</div></a>
			<a href="admin.account.list.php"><div class="account_list">Account List</div></a>
			<a href="admin.logout.php"><div class="admin_logout">Logout</div></a>
		</div>
	</div>
    <div class="lower">
	    <p class="text">Question List</p>

	    <?php
			$sql = "SELECT * FROM question";

			$result = $conn->query($sql);

			if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$questionid = $row['QuestionID'];
					$username = $row['UserName'];
					$question = $row['Question'];
				
				echo"<div class='questions'>
						<div class='q_username'>User Name : $username</div>
						<hr>
						<div class='question'>
							$question
						</div>
							<div class='check_delete_links'>
								<form action='admin.check.answer.php' method='POST'>
									<input type='hidden' name='check' value='$questionid'>
									<input class='check_button' type='submit' value='Check'>
								</form>
								<form action='admin.delete.question.php' method='POST'>
									<input type='hidden' name='delete' value=$questionid>
									<input class='delete_button' type='submit' value='Delete'>
								</form>
							</div>	
					</div>";
				}
			}else{
				echo "<div class='no_questions'>No questions.</div>";
			}
			?>
		<br>
		<div class="home">
			<a href="admin.dashboard.php"><input class="home_button" type="button" name="home" value="Home"></a>
		</div>
	</div>
</body>
</html>