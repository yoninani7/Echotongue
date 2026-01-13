<?php
 
include 'db.php'; 
// Get email from POST
$email = isset($_POST['Email']) ? trim($_POST['Email']) : '';

// Basic validation
if (empty($email)) {
    die(json_encode(['success' => false, 'message' => 'Email is required']));
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die(json_encode(['success' => false, 'message' => 'Invalid email']));
}

// Create table if it doesn't exist (id, email, date only)
$createTable = "CREATE TABLE IF NOT EXISTS newsletter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    date_subscribed TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->query($createTable);

// Check if email already exists
$check = $conn->prepare("SELECT id FROM newsletter WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Already subscribed']);
    $check->close();
    $conn->close();
    exit();
}
$check->close();

// Insert new subscriber
$insert = $conn->prepare("INSERT INTO newsletter (email) VALUES (?)");
$insert->bind_param("s", $email);

if ($insert->execute()) {
    echo json_encode(['success' => true, 'message' => 'Subscribed successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Subscription failed']);
}

$insert->close();
$conn->close();
?>