<?php
session_start();
include 'dbconnect_myproject.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../WIT KIT/css/edit.profile.confirmation.css">
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
        $accountid = $_SESSION['accountid'];
      
        $sql = "UPDATE userinfo SET UserName = '$username', EmailAddress = '$emailaddress', Password = '$password' WHERE AccountID = $accountid";

            if($conn->query($sql) === TRUE){
                echo "<div class='success'>Your information was updated successfully.</div>";
            }else{
                echo "<div class='error'>Error during Updating.</div>" . $conn->error;
            };

        $sql = "UPDATE question SET UserName = '$username' WHERE AccountID = '$accountid'";
        $conn->query($sql);      
        ?>
        <br>
        <div class="back_edit_profile">
            <a href="edit.profile.php"><input class="back_button" type="button" name="back" value="Back"></a>
        </div>
    </div>
</body>
</html>
