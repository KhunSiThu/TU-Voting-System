<?php
session_start();

require_once './db_connect.php';



if (isset($_POST['votingEndDate'])) {
    $votingEndDate = $_POST['votingEndDate']; // Get the voting end date from the form

    // Prepare the SQL statement to update the voting end date
    $stmt = $conn->prepare("UPDATE voting SET voting_end = ? WHERE id = 1");
    $stmt->bind_param("s", $votingEndDate); // 's' means string (for datetime, it's treated as a string)

    if ($stmt->execute()) {
        echo "Voting end time has been set successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
