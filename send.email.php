<?php
session_start();
include 'dbconnect_myproject.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-6.0.6/src/Exception.php';
require 'PHPMailer-6.0.6/src/PHPMailer.php';
require 'PHPMailer-6.0.6/src/SMTP.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>WITKIT_send.email</title>
</head>
<body>
	<?php
	if($_POST['getpassword']){
		$login_username = $_POST['username'];
		$login_emailaddress = $_POST['emailaddress'];

		$sql = "SELECT AccountID, UserName, Password, deleted FROM userinfo WHERE UserName='$login_username' AND EmailAddress='$login_emailaddress'";

		$result = $conn->query($sql);

		$informations = $result->fetch_assoc();
			$accountid = $informations['AccountID'];
			$username = $informations['UserName'];
			$password = $informations['Password'];
			$deleted = $informations['deleted'];

			if($accountid == NULL || $deleted == 1){
				// var_dump($accountid);
				$_SESSION["error"] = "on";
				// header('Location: forgot.password.php');
			}else {
				// var_dump($username);
				// var_dump($password);
				// var_dump($login_emailaddress);

				// $msg = "Hi, $username! This is your password : $password";

				// mail("$login_emailaddress","Your Password","$msg");
				// var_dump(mail("$login_emailaddress","Your Password","$msg"));
				// echo phpinfo();
				$toAddress = "$login_emailaddress"; //To whom you are sending the mail.
				$message   = <<<EOT
								<html>
									<body>
										<p>Hi, $username! This is your password : $password</p>
									</body>
								</html>
EOT;
				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPAuth    = true;
				$mail->Host        = "smtp.gmail.com";
				$mail->Port        = 587;
				// $mail->SMTPSecure = 'tls';
				$mail->SMTPOptions = array(
				    'ssl' => array(
				        'verify_peer' => false,
				        'verify_peer_name' => false,
				        'allow_self_signed' => true
				    )
				);
				$mail->IsHTML(true);
				$mail->Username = "hayato.pluto.4538@gmail.com"; // your gmail address
				$mail->Password = "hayato4538"; // password
				$mail->SetFrom("hayato.pluto.4538@gmail.com");
				$mail->Subject = "Your Password / WIT KIT"; // Mail subject
				$mail->Body    = $message;
				$mail->AddAddress($toAddress);
				if (!$mail->Send()) {
				    echo "Failed to send mail";
				    // var_dump($mail);

				} else {
				    echo "Mail sent succesfully";
				    header('Location: login.php');
				}
			}
	}
	?>
</body>
</html>