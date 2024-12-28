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

    if ($otp === $correctOtp) {

        // Check if the password is not null or verify the existing password
        if ($user['password'] == null || password_verify($_POST['password'], $user['password'])) {
            // Hash the new password using bcrypt
            $hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            // Update password query
            $sql2 = "UPDATE users SET password = ? WHERE email = ? OR name = ?";
            $stmt2 = mysqli_prepare($conn, $sql2);

            $name_email = $_SESSION['user_email'];

            if ($stmt2) {
                // Bind the parameters and execute the query to update the password
                mysqli_stmt_bind_param($stmt2, "sss", $hashed_password, $name_email, $name_email);
                mysqli_stmt_execute($stmt2);
            } else {
                echo json_encode(['error' => 'Failed to update password. Please try again later.']);
                exit;
            }
        } else {
            // Password doesn't match
            echo json_encode(['error' => 'Incorrect current password.']);
            header("Location:../Public/form.php");
            exit;
        }

        // Redirect to upload user page on success
        header("Location: ../Views/upProFile.php");
        exit;
    } else {
        $_SESSION['message'] = "Invalid OTP. Please try again.";
        $_SESSION['message_type'] = "error";

        // If OTP is incorrect, check if "Resend OTP" is clicked
        if (isset($_POST['resend_otp'])) {
            // Prepare and execute SQL query to check if email or username exists
            $sql = "SELECT * FROM users WHERE email = ? ";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);

                    // Generate a random 4-digit verification code
                    $verification_code = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

                    // Store the verification code in the session
                    $_SESSION['verification_code'] = $verification_code;
                    $_SESSION['user_email'] = $user['email'];

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
                    $mail->setFrom($user['email'], "Voting App");
                    $mail->addAddress($user['email']);

                    // Email content
                    $verificationCode = $verification_code; // Generate a random verification code
                    $mail->Subject = "Account Verification";
                    $mail->Body = "Hello ,\n\nYour verification code is: $verificationCode\n\nPlease use this code to complete your account verification.";

                    if ($mail->send()) {
                        header("Location:../Views/verify.php");
                    } else {
                        header("Location:../Public/form.php");
                    }
                } else {
                    echo json_encode(['error' => 'This email or username does not exist.']);
                }

                mysqli_stmt_close($stmt);
            } else {
                echo json_encode(['error' => 'Database query preparation failed. Please try again later.']);
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
