<?php
// Include the database connection
require_once './db_connect.php';

// Get the gender and major from the GET parameters
$gender = $_GET['gender'];
$major = isset($_GET['major']) ? $_GET['major'] : null;

// Determine the table based on gender
$table_name = ($gender === 'Female') ? 'vote_queen' : 'vote_king';

// Start building the SQL query
$sql = "SELECT candidate.*, COUNT($table_name.candidate_email) AS count_email 
        FROM candidate 
        LEFT JOIN $table_name ON candidate.email = $table_name.candidate_email 
        WHERE candidate.gender = ?";

// If major is provided, add the condition for major
if ($major !== null) {
    $sql .= " AND candidate.major = ?";
}

// Add GROUP BY and ORDER BY clauses
$sql .= " GROUP BY candidate.id ORDER BY count_email DESC LIMIT 1";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind parameters based on whether major is null or not
if ($major !== null) {
    $stmt->bind_param("ss", $gender, $major); // "ss" means two string parameters
} else {
    $stmt->bind_param("s", $gender); // "s" means only one string parameter
}


$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    echo json_encode($row); 
} else {
    echo json_encode(['error' => 'No data found.']);
}


$stmt->close();
$conn->close();
?>
