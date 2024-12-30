<?php

session_start();

require_once './db_connect.php'; // Database configuration

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the POST request is made
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Basic validation (ensure fields are not empty)
    if (empty($email) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Please fill in all fields."]);
        exit();
    }

    // Prepare SQL query to check the user in the database
    $sql = "SELECT id, email, password,major FROM users WHERE email = ? LIMIT 1";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Check if user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $storedEmail, $storedPassword,$storeMajor);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $storedPassword)) {
                // Start the session for the logged-in user
                $_SESSION['user_id'] = $id;
                $_SESSION['user_email'] = $storedEmail;
                $_SESSION['user_major'] = $storeMajor;

                // Respond with success message
                echo json_encode(["status" => "success", "message" => "Login successful!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Incorrect password!"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "User not found!"]);
        }

        $stmt->close();
    }
}

$conn->close();
?>
