<?php
// Include database connection
require_once './db_connect.php';

header('Content-Type: application/json');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $candidateName = $_POST['candidateName'];
    $candidateNumber = $_POST['candidateNumber'];
    $candidateMajor = $_POST['candidateMajor'];
    $candidateEmail = $_POST['candidateEmail']; // Email field
    $candidateGender = $_POST['candidateGender']; // Gender field
    $candidateImage = $_FILES['candidateImage'];

    // Process image upload if there's a new image
    $imagePath = null;
    if ($candidateImage && $candidateImage['tmp_name']) {
        $uploadDir = '../uploads/candidate/';
        $imagePath = $uploadDir . uniqid() . basename($candidateImage['name']);
        move_uploaded_file($candidateImage['tmp_name'], "../".$imagePath);
    }

    try {
        // Prepare the insert query
        $sql = "INSERT INTO candidate (name, candidate_no, major, email, gender, profile_image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Error preparing the query: " . $conn->error);
        }

        // Bind parameters (if image is null, set it to NULL in DB)
        $imageParam = $imagePath ? $imagePath : NULL;
        $stmt->bind_param('ssssss', $candidateName, $candidateNumber, $candidateMajor, $candidateEmail, $candidateGender, $imageParam);

        // Execute the query
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Candidate added successfully.'
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to add candidate.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
?>
