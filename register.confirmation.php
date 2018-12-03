<?php
include 'dbconnect_myproject.php';
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../WIT KIT/css/register.confirmation.css">
    <title>WITKIT_register.confirmation</title>
</head>
<body>
    <div class="WITKIT_logo">
        <img src="images/WITKIT.jpg" width="150">
    </div>
    <div class="lower">
        <?php

        $username = $_POST["username"];
        $emailaddress = $_POST["emailaddress"];
        $password = $_POST["password1"];

        // if the username already exists, go back to register_check.php
        $sql = "SELECT AccountID FROM userinfo WHERE UserName = '$username'";
        $result = $conn->query($sql);
        // var_dump($result);
        $accountid = $result->fetch_assoc();

        if($accountid){
            header('Location: register_check.php');
        }

        
        $sql = "INSERT INTO userinfo(UserName, EmailAddress, Password)VALUES('$username','$emailaddress','$password')";

            if($conn->query($sql) === TRUE){
                echo "<div class='success'>Record is updated successfully.</div>";
            }else{
                echo "<div class='error'>Error during registration.</div>" . $conn->error;
            }
        ?>
        <br>
        <div class="login">
            <a href="login.php"><input class="login_button" type="button" name="login" value="Login"></a>
        </div>
    </div>
</body>
</html>
