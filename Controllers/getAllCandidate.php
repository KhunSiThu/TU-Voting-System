<?php

// Include the database connection
require_once './db_connect.php';

// Write the SQL query
$sql = "SELECT * FROM candidate";

// Execute the query
$result = $conn->query($sql);

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Fetch and display all rows
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data); // Output the data as JSON
} else {
    echo "No data found.";
}

// Close the database connection
$conn->close();
?>