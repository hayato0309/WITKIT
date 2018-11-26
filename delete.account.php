<?php
session_start();
include 'dbconnect_myproject.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/delete.account.css">
	<title>WITKIT_delete.account</title>
</head>
<body>
	<?php
		$accountid = $_GET["delete_account"];
		$sql = "SELECT * FROM userinfo WHERE AccountID = $accountid";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		$accountid = $row["AccountID"];
		$username = $row["UserName"];

		$msg = "Hi, Hayato! $username want to delete his/her account.\nAccountID: $accountid";
		mail("hayato.pluto.4538@gmail.com","Request to delete accounts","$msg");

		header('Location: edit.profile.php');
	?>
</body>
</html>