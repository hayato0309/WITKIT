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
	<link rel="stylesheet" href="../WIT KIT/css/admin.account.list.css">
	<title>WITKIT_admin.account.list</title>
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
	    echo "<table class='table' border=1>
				<tr style='background-color: #143444; color: white;'>
					<th>&nbsp; AccountID &nbsp;</th>
					<th>&nbsp; Username &nbsp;</th>
					<th>&nbsp; Email Address &nbsp;</th>
					<th>&nbsp; Password &nbsp;</th>
					<th></th>
				</tr>";
		$sql = "SELECT * FROM userinfo";
		$result = $conn->query($sql);
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					// var_dump($row);
				    $accountid = $row['AccountID'];
					$username = $row['UserName'];
					$emailaddress = $row['EmailAddress'];
					$password = $row['Password'];
					$deleted = $row['deleted'];

					if($deleted == NULL){
						echo "<tr>";
							echo "<td>$accountid</td>";
							echo "<td>$username</td>";
							echo "<td>$emailaddress</td>";
							echo "<td>$password</td>";
							echo "<form action='admin.delete.account.confirmation.php' method='POST'>";
							echo "<td><input type='hidden' name='delete' value='$accountid'>
							  <input type='submit' value='Delete'></td>";
						echo "</tr>";
						echo "</form>";
					}
				}
				
		}else{
			echo "<div class='no_questions'>No accounts.</div>";
		}
		echo "</table>";
	    ?>
	    <br>

	    <div class="deleted_accounts">Deleted Accounts</div>
	    <br>
	    <?php
	    // this table is for deleted accounts
	    echo "<table class='table' border=1>
				<tr style='background-color: #143444; color: white;'>
					<th>&nbsp; AccountID &nbsp;</th>
					<th>&nbsp; Username &nbsp;</th>
					<th>&nbsp; Email Address &nbsp;</th>
					<th>&nbsp; Password &nbsp;</th>
				</tr>";
		$sql = "SELECT * FROM userinfo";
		$result = $conn->query($sql);
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					// var_dump($row);
				    $accountid = $row['AccountID'];
					$username = $row['UserName'];
					$emailaddress = $row['EmailAddress'];
					$password = $row['Password'];
					$deleted = $row['deleted'];

					if($deleted == 1){
						echo "<tr>";
							echo "<td>$accountid</td>";
							echo "<td>$username</td>";
							echo "<td>$emailaddress</td>";
							echo "<td>$password</td>";
						echo "</tr>";
						echo "</form>";
					}
				}
				
		}else{
			echo "<div class='no_questions'>No accounts.</div>";
		}
		echo "</table>";
	    ?>

	    <br>
	    <div class="home">
	    	<a href="admin.dashboard.php"><input class="home_button" type="button" name="home" value="Home"></a>
	    </div>
	</div>
</body>
</html>