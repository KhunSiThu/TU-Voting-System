<?php
// Include database connection
require_once './Controllers/db_connect.php';

header('Content-Type: application/json');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $candidateId = $_POST['candidateId'];
    $candidateName = $_POST['candidateName'];
    $candidateNumber = $_POST['candidateNumber'];
    $candidateMajor = $_POST['candidateMajor'];
    $candidateEmail = $_POST['candidateEmail'];
    $candidateGender = $_POST['candidateGender']; // Gender field
    $candidateImage = $_FILES['candidateImage'];

    // Process image upload if there's a new image
    $imagePath = null;  // Default image path if no image is uploaded
    if ($candidateImage && $candidateImage['tmp_name']) {
        $uploadDir = '../uploads/candidate/';
        $imagePath = $uploadDir . uniqid() . basename($candidateImage['name']);
        move_uploaded_file($candidateImage['tmp_name'], $imagePath);
    }

    try {
        // Prepare the update query conditionally (only update the image if there's a new one)
        if ($imagePath) {
            // If an image is uploaded, include it in the query
            $sql = "UPDATE candidate SET name = ?, candidate_no = ?, major = ?, email = ?, gender = ?, profile_image = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssssi', $candidateName, $candidateNumber, $candidateMajor, $candidateEmail, $candidateGender, $imagePath, $candidateId);
        } else {
            // If no image is uploaded, exclude it from the query
            $sql = "UPDATE candidate SET name = ?, candidate_no = ?, major = ?, email = ?, gender = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssssi', $candidateName, $candidateNumber, $candidateMajor, $candidateEmail, $candidateGender, $candidateId);
        }

        // Execute the query
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Candidate updated successfully.'
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update candidate.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
?>
