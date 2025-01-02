<?php
session_start();

require_once './db_connect.php';



// Query to get the voting end date
$sql = "SELECT voting_end FROM voting WHERE id = 1";  // Adjust table and condition as necessary
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the voting end date
    $row = $result->fetch_assoc();
    $votingEndDate = $row['voting_end']; // Get the voting end date from the database
} else {
    echo "No voting end date found!";
    exit;
}

// Close the connection
$conn->close();

// Output the voting end date as JSON to use in JS
echo json_encode($votingEndDate);
?>
