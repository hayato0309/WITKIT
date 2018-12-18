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
	    		<table>
	    			<tr>
	    				<td class="left_column">Admin Name</td>
	    				<td><input type="text" name="admin_name" maxlength="20" pattern="^[0-9A-Za-z]+$" placeholder="Admin Name" size="25" autofocus required></td>
	    			</tr>
	    			<tr>
	    				<td class="left_column">Password</td>
	    				<td><input type="password" name="admin_password" maxlength="20" placeholder="Password" pattern="^[0-9A-Za-z]+$" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" size="25" autofocus required></td>
	    			</tr>
	    		</table>

	    		<?php
	    			if(isset($_SESSION["error"])){
	    				echo "<div class='error'>Your Name or Password is incorrect.</div>";
	    				$_SESSION["error"] = NULL;
	    			}
	    		?>

	    	</div>
	    	<div class="login">
				<input class="login_button" type="submit" name="login" value="Login">
			</div>
	    </form>
	</div>
</body>
</html>