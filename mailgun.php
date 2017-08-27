<?php
require 'include\PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '$mailuser';   // SMTP username
$mail->Password = '$mailpass';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted

$mail->From = '$domain';
$mail->FromName = 'CloudDL';
$mail->addAddress('$email');                 // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->Subject = 'Your cloud download is complete!';
$mail->Body    = 'Good news! Your cloud download of $filename is finished!, please download it soon before it is auto deleted from our server $downloadedto';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}