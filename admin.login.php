<?php
session_start();
include 'dbconnect_myproject.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../WIT KIT/css/admin.login.css">
	<title>WITKIT_admin.login</title>
</head>
<body>
	<div class="WITKIT_logo">
        <img src="images/WITKIT.jpg" width="150">
    </div>
    <div class="lower">
	    <form action="admin.login.check.php" method="POST">
	    	<div class="admin_information">
	    		<div>Admin Name&nbsp;&nbsp;<input type="text" name="admin_name" maxlength="20" placeholder="Admin Name" size="25" autofocus required></div><br>
	    		<div>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="admin_password" placeholder="Password" size="25" autofocus required></div>
	    	</div>
	    	<div class="login">
				<input class="login_button" type="submit" name="login" value="Login">
			</div>
	    </form>
	</div>
</body>
</html>