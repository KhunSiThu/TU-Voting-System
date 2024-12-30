<?php
session_start();
require_once './db_connect.php'; // Database configuration

// Get POST data
$name = $_POST['name'];
$email = $_POST['email'];
$major = $_POST['major'];
$password = $_POST['password'];

// Check if the email is valid using FILTER_VALIDATE_EMAIL
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // If email is invalid, return an error response
    echo json_encode(['success' => false, 'error' => 'Invalid email format']);
    exit();
}

// Check if the email already exists
$sql = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$response = ['success' => false]; // Default response

if ($result->num_rows > 0) {
    session_unset();
    // If email exists, return error message
    $response['error'] = 'Email is already registered.';
} else {
    
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_major'] = $major;
    $_SESSION['user_password'] = $password;

    $response['success'] = true;
    $response['message'] = 'Registration successful!';
}

// Close connection
$stmt->close();
$conn->close();

// Return JSON response
echo json_encode($response);
