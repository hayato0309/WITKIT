<?php
session_start();
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/admin.delete.account.css">
	<title>WITKIT_admin.delete.account</title>
</head>
<body>
	<div class="WITKIT_logo">
        <img src="images/WITKIT.jpg" width="150">
    </div>
    <div class="lower">
	    <?php
			$accountid = $_POST["delete"];
			$sql = "SELECT * FROM userinfo WHERE AccountID = $accountid";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();

			$emailaddress = $row["EmailAddress"];

			$msg = "Your account was deleted. Thank you. WIT KIT";
			mail("$emailaddress","Your account was deleted.","$msg");
	

			$sql = "UPDATE userinfo SET deleted = 1 WHERE AccountID = $accountid";

				if($conn->query($sql) === TRUE){
				    echo "<div class='success'>Account was deleted successfully.</div>";
				}else{
				    echo "<div class='error'>Error during deleting.</div>" . $conn->error;
				}
		?>
		<br>
		<div class="back">
	        <a href="admin.account.list.php"><input class="back_button" type="button" name="back" value="Back"></a>
	    </div>
	</div>
</body>
</html>