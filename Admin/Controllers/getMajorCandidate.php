<?php

session_start();

// Fetch the major from the session, or fallback to a default value
$major = isset($_SESSION['user_major']) ? $_SESSION['user_major'] : "";

// Include the database connection
require_once './db_connect.php';

try {
    // Prepare the SQL query to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM candidate WHERE major = ?");
    $stmt->bind_param("s", $major); // "s" specifies the type of the variable (string)

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display all rows
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data); // Output the data as JSON
    } else {
        echo json_encode(["message" => "No data found for major: $major"]);
    }

    // Close the statement
    $stmt->close();
} catch (Exception $e) {
    // Handle any exceptions and return an error message
    echo json_encode(["error" => "An error occurred while fetching data", "details" => $e->getMessage()]);
}

// Close the database connection
$conn->close();
?>
