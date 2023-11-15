<?php

require 'mail/PHPMailerAutoload.php';

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$area = $_POST["area"];

$mail = new PHPMailer;

$mail-> isSMTP();

$mail->Host = 'smtp.hostinger.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'no-reply@safeaquatech.com';                 // SMTP username
$mail->Password = 'Safe@2023';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('no-reply@safeaquatech.com', 'Safe Aqua Tech');
$mail->addAddress('muruganraja335@gmail.com');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'offer from Submission mail from Safe Aqua Tech';
$mail->Body    = " Name: {$name}<br>
Email: {$email}<br>
Mobile Number: {$phone}<br>
Area: {$area}";
// $masil->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("Refresh:1, url=redirect.php");
    exit();
}  
?>