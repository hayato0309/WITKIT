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

		// $msg = "Hi, Hayato! $username want to delete his/her account.\nAccountID: $accountid";
		// mail("hayato.pluto.4538@gmail.com","Request to delete accounts","$msg");

		$toAddress = "hayato.pluto.4538@gmail.com"; //To whom you are sending the mail.
				$message   = <<<EOT
								<html>
									<body>
										<p>Hi, Hayato! $username wants to delete his/her account.\nAccountID: $accountid</p>
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
				$mail->Subject = "Request to delete account / WIT KIT"; // Mail subject
				$mail->Body    = $message;
				$mail->AddAddress($toAddress);
				if (!$mail->Send()) {
				    echo "Failed to send mail";
				    // var_dump($mail);

				} else {
				    echo "Mail sent succesfully";
					header('Location: edit.profile.php');
				}
	?>
</body>
</html>