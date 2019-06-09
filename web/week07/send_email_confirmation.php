<?php
require_once ('PHPMailer/PHPMailerAutoload.php');
include_once 'DbConnect.php';

$con = get_db();

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
$mailto = $_SESSION['mail'];


$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465'; // or 587
$mail->isHTML(true);
$mail->Username = 'cs313.byui.project@gmail.com';
$mail->Password = 'san16044';
$mail->SetFrom ("no-reply@cs313.byui.edu");
$mail->Subject = 'Your order is ready - CS 313 Project';
$mail->Body = 'Testing body Hello world';
$mail->AddAddress($mailto);
$mail->Send();



