<?php

session_start();

require_once './db_connect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name_email = mysqli_real_escape_string($conn, $_POST['name_email']); // Sanitize input

    // Prepare the SQL query with MySQLi
    $sql = "SELECT * FROM users WHERE email = ? OR name = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ss", $name_email, $name_email); // "ss" means two strings
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            echo json_encode(["valid" => true]);
        } else {
            echo json_encode(["error" => "This email or username does not exist."]);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    exit;
}
?>
