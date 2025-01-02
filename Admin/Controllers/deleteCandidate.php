<?php

// Include the database connection
require_once './db_connect.php';

header('Content-Type: application/json');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the candidateId is provided in the POST request
    if (isset($_POST['candidateId'])) {
        $candidateId = $_POST['candidateId'];

        // Prepare a database query to delete the candidate by ID
        try {
            $sql = "DELETE FROM candidate WHERE id = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                throw new Exception("Error preparing the query: " . $conn->error);
            }
            
            // Bind the parameter (note: 'i' represents an integer)
            $stmt->bind_param('i', $candidateId);

            // Execute the deletion query
            if ($stmt->execute()) {
                // Return success response
                echo json_encode(['success' => true, 'message' => 'Success to delete candidate.']);
            } else {
                // Return failure response
                echo json_encode(['success' => false, 'message' => 'Failed to delete candidate.']);
            }
        } catch (Exception $e) {
            // Handle any exceptions (e.g., database connection issues)
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    } else {
        // Return error if the candidate ID is missing
        echo json_encode(['success' => false, 'message' => 'Candidate ID is required.']);
    }
} else {
    // Return error if the request method is not POST
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
