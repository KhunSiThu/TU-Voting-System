<?php
header("Content-Type: application/json");
session_start();

require_once './db_connect.php';

$user_email = $_SESSION['user_email'];

// Retrieve the POST data
$data = json_decode(file_get_contents("php://input"), true);
$contestant_email = $data['email'] ?? '';

// Validate email
if (empty($contestant_email) || !filter_var($contestant_email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid email address.",
    ]);
    exit();
}

// Check if contestant exists
$stmt = $conn->prepare("SELECT * FROM contestants WHERE email = ?");
$stmt->bind_param("s", $contestant_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode([
        "status" => "error",
        "message" => "Contestant email not found.",
    ]);
    $stmt->close();
    $conn->close();
    exit();
}

$contestant = $result->fetch_assoc();
$contestant_no = $contestant['contestant_no'];
$contestant_major = $contestant['major'];
$gender = $contestant['gender'];

// Determine the table based on gender
$table = ($gender === 'Female') ? 'vote_queen' : 'vote_king';

// Check if the user has already voted for a King or Queen
$checkKingVoteStmt = $conn->prepare("SELECT * FROM vote_king WHERE voter_email = ?");
$checkKingVoteStmt->bind_param("s", $user_email);
$checkKingVoteStmt->execute();
$checkKingVoteResult = $checkKingVoteStmt->get_result();

$checkQueenVoteStmt = $conn->prepare("SELECT * FROM vote_queen WHERE voter_email = ?");
$checkQueenVoteStmt->bind_param("s", $user_email);
$checkQueenVoteStmt->execute();
$checkQueenVoteResult = $checkQueenVoteStmt->get_result();

// If the user has already voted for both King and Queen
if ($checkKingVoteResult->num_rows > 0 && $checkQueenVoteResult->num_rows > 0) {
    echo json_encode([
        "status" => "error",
         "message" => "You have already voted for this contestant. You can only vote for one King and one Queen."
    ]);
    $checkKingVoteStmt->close();
    $checkQueenVoteStmt->close();
    $stmt->close();
    $conn->close();
    exit();
}

// If the user has already voted for King
if ($checkKingVoteResult->num_rows > 0 && $gender === 'Male') {
    echo json_encode([
        "status" => "error",
       "message" => "You have already voted for a King. You can only vote for one King and one Queen."
    ]);
    $checkKingVoteStmt->close();
    $stmt->close();
    $conn->close();
    exit();
}

// If the user has already voted for Queen
if ($checkQueenVoteResult->num_rows > 0 && $gender === 'Female') {
    echo json_encode([
        "status" => "error",
        "message" => "You have already voted for a Queen. You can only vote for one King and one Queen."
    ]);
    $checkQueenVoteStmt->close();
    $stmt->close();
    $conn->close();
    exit();
}

// Insert the vote into the appropriate table
$insertStmt = $conn->prepare("INSERT INTO $table (voter_email, contestant_email, contestant_no, contestant_major) VALUES (?, ?, ?, ?)");
$insertStmt->bind_param("ssss", $user_email, $contestant_email, $contestant_no, $contestant_major);

if ($insertStmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "Your vote has been successfully recorded.",
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Failed to record your vote: " . $insertStmt->error,
    ]);
}

// Close statements and connection
$insertStmt->close();
$checkKingVoteStmt->close();
$checkQueenVoteStmt->close();
$stmt->close();
$conn->close();
?>
