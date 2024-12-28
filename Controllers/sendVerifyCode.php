<?php
session_start();

require_once './db_connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name_email = filter_var($_POST['name_email'], FILTER_SANITIZE_EMAIL);

    // Validate the email address
    if (!filter_var($name_email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['error' => 'Invalid email address.']);
        exit;
    }

    // Prepare and execute SQL query to check if email or username exists
    $sql = "SELECT * FROM users WHERE email = ? OR name = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $name_email, $name_email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_major'] = $user['major'];

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

            // Sender's email credentials
            $mail->Username = "khunsithuaung65@gmail.com";
            $mail->Password = "usfb tkha xhhz iygs";

            // Sender and recipient details
            $mail->setFrom($user['email'], "Voting App");
            $mail->addAddress($user['email']);

            // Email content
            $mail->Subject = "Account Verification";
            $mail->Body = "Hello,\n\nYour verification code is: $verification_code\n\nPlease use this code to complete your account verification.";

            // Send the email
            if ($mail->send()) {
                header("Location:../Views/verify.php");
            } else {
                header("Location:../Public/form.php");
            }
        } else {
            echo json_encode(['error' => 'This email or username does not exist.']);
        }

        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmt2);
    } else {
        echo json_encode(['error' => 'Database query preparation failed. Please try again later.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}

mysqli_close($conn);
