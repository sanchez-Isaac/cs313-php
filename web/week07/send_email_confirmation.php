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
$mailto = $_SESSION['email'];



$htmlContent = '
    <html>
    <head>
        <title>CS 313 - Web Engineering Project - Online Store</title>
    </head>
    <body>
        <h1>Your order is ready</h1>
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">
            <tr>
                <th>Remember to visit the store</th><td>You will see your recent orders</td>
            </tr>
            <tr style="background-color: #e0e0e0;">
                <th>Its always a pleasure to help you</th><td>contact us soon</td>
            </tr>
            <tr>
                <th>Website:</th><td><a href="https://rocky-atoll-73188.herokuapp.com/week07/07Prove.php">Online Store</a></td>
            </tr>
        </table>
    </body>
    </html>';











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
$mail->From = ("no-reply@cs313.byui.edu");
$mail->FromName = "CS313-Store";
$mail->AddReplyTo("no-reply@cs313.byui.edu", "No-Reply-CS313-Store");
$mail->Subject = 'Your order is ready - CS 313 Project';
$mail->Body = $htmlContent;
$mail->AddAddress($mailto, $first_name);
$mail->Send();




