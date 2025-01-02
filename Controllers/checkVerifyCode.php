<?php
session_start();

require_once './db_connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $otp = $_POST['c1'] . $_POST['c2'] . $_POST['c3'] . $_POST['c4'];

    // Example OTP for testing
    $correctOtp = $_SESSION['verification_code'];

    $email = $_SESSION['user_email'];
    $user_name = $_SESSION['user_name'];
    $user_major = $_SESSION["user_major"];
    $password = $_SESSION['user_password'];

    // Hash password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    // Check if OTP is correct
    if ($otp === $correctOtp) {
        

        $sql = "INSERT INTO users (name, email, major, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ssss", $user_name, $email, $user_major, $hashedPassword);

            // Execute and check for success
            if ($stmt->execute()) {
                $_SESSION['user'] = "success";
                // Redirect to login page on success
                header("Location: ../Public/login.php");
                exit;
            } else {
                // Handle database insertion error
                echo "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }

        // Close database connection
        $conn->close();
    } else {
        $_SESSION['message'] = "Invalid OTP. Please try again.";
        $_SESSION['message_type'] = "error";

        // If OTP is incorrect, check if "Resend OTP" is clicked
        if (isset($_POST['resend_otp'])) {
            // Generate a random 4-digit verification code
            $verification_code = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

            // Store the verification code in the session
            $_SESSION['verification_code'] = $verification_code;

            require "../src/sendEmail/vendor/autoload.php";

            $mail = new PHPMailer(true);

            // Configure SMTP
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = "khunsithuaung65@gmail.com";
            $mail->Password = "usfb tkha xhhz iygs";

            // Sender and recipient details
            $mail->setFrom($email, "Voting App");
            $mail->addAddress($email);

            // Email content
            $verificationCode = $verification_code; // Generate a random verification code
            $mail->Subject = "Account Verification";
            $mail->Body = "Hello $user_name,\n\nYour verification code is: $verificationCode\n\nPlease use this code to complete your account verification.";

            if ($mail->send()) {
                header("Location:../Views/verify.php");
            } else {
                session_unset();
                header("Location:../Public/signup.php");
            }

            $_SESSION['message'] = "A new OTP has been sent to your email.";
            $_SESSION['message_type'] = "success";
        }

        // Redirect back to verification page on failure or resend OTP
        header("Location: ../Views/verify.php");
        exit;
    }
} else {
    // If request is not POST, redirect to verification page
    header("Location: ../Views/verify.php");
    exit;
}
