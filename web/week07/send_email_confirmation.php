<?php
$first_name = $_SESSION['first_name'];
$middle_name = $_SESSION['middle_name'];
$last_name = $_SESSION['last_name'];
$street = $_SESSION['street'];
$ext_home_number = $_SESSION['ext_home_number'];
$city = $_SESSION['city'];
$country = $_SESSION['country'];
$state = $_SESSION['state'];
$zip = $_SESSION['zip'];
$telephone = $_SESSION['telephone'];
$customer_id = $_SESSION['customer_id'];
$mailto = $_SESSION['email'];


require("PHPMailer/PHPMailer-master/src/Exception.php");
require("PHPMailer/PHPMailer-master/src/PHPMailer.php");
require("PHPMailer/PHPMailer-master/src/SMTP.php");

$mail = new PHPMailer();
$mail->IsSMTP();
//$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";
$mail->Port = "465"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Username = "cs313.byui.project@gmail.com";
$mail->Password = "san16044";
$mail->isHTML(true);
$mail->From = "no-reply@cs313.byui.edu";
$mail->FromName = "CS313-Store";
$mail->AddAddress($email, $first_name);
$mail->AddReplyTo("no-reply@cs313.byui.edu", "No-Reply-CS313-Store");

$mail->Subject = "Hi!";
$mail->Body = "Hi! How are you?";
$mail->WordWrap = 50;

$mail->Send();