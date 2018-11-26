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
	<link rel="stylesheet" href="../WIT KIT/css/admin.check.answer.css">
	<title>WITKIT_admin.check.answer</title>
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
	    <?php
	    $questionid = $_POST["check"];
	    $sql_question= "SELECT * FROM question WHERE QuestionID = $questionid";
	    $result = $conn->query($sql_question);
	    $row = $result->fetch_assoc();

	    $q_username = $row["UserName"];
	    $question = $row["Question"];
	    ?>

	    <div>
	    <div class="question_container">
	    	<div> User Name : <?php echo "$q_username" ?></div>
	    	<hr>
	    	<div><?php echo "$question" ?></div>
	    </div>
	    <div class="arrow">
	    	<img src="images/arrow.png" width="50">
	    </div>

	    <?php
	    $sql_answer = "SELECT * FROM answer WHERE QuestionID = $questionid";
	    $result = $conn->query($sql_answer);

	    if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					// var_dump($row);
					$answerid = $row['AnswerID'];
					$a_username = $row['UserName'];
					$answer = $row['Answer'];
				
				echo"<div class='answers'>
						<div class='q_username'>User Name : $a_username</div>
						<hr>
						<div>$answer</div>
						<form action='admin.delete.answer.php' method='POST'>
							<div class='delete_link'>
								<input type='hidden' name='delete' value=$answerid>
								<input type='submit' value='Delete'>
							</div>
						</form>
					</div>";
				}
			}else{
				echo "<div class='no_answers'>No answers.</div>";
			}
	    ?>
	    <br>
	    <div class="back">
	    	<a href="admin.question.list.php"><input class="back_button" type="button" name="back" value="Back"></a>
	    </div>
	</div>
</body>
</html>