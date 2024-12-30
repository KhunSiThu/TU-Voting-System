<?php
session_start();

require_once './db_connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Generate a random 4-digit verification code
$verification_code = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

// Store the verification code in the session
$_SESSION['verification_code'] = $verification_code;
$user_email = $_SESSION['user_email'];
$user_name = $_SESSION['user_name'];

require "../src/sendEmail/vendor/autoload.php";

$mail = new PHPMailer(true);

// Configure SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

// Sender's email credentials
$mail->Username = "khunsithuaung65@gmail.com";
$mail->Password = "usfb tkha xhhz iygs";

// Sender and recipient details
$mail->setFrom($user_email, "Voting App");
$mail->addAddress($user_email);

// Email content
$mail->Subject = "Account Verification";
$mail->Body = "Hello $user_name,\n\nYour verification code is: $verification_code\n\nPlease use this code to complete your account verification.";

// Send the email
if ($mail->send()) {
    header("Location:../Views/verify.php");
} else {
    // Clear all session variables
    session_unset();
    header("Location:../Public/signup.php");
}
