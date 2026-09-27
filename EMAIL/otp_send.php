<?php
  
$email = $_POST["email"];

$otp = $_POST["otp"];  

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'smartbook00001@gmail.com';
$mail->Password = 'brqv dgqn btha xkey';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('smartbook00001@gmail.com', 'SmartBook');
$mail->addAddress($email);

$mail->Subject = "Your OTP Verification Code";

$mail->Body = "Dear User,

Your One-Time Password (OTP) for verification is:

🔐 OTP Code: ".$otp."

This OTP is valid for 2 minutes.

Please do not share this code with anyone for security reasons.

If you did not request this OTP, please ignore this email.

Thank You,
TechScienceHub Team";

$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

$mail->send();

?>