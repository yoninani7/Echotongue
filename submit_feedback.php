<?php
session_start();

// 1. Configuration
$botToken = "8582285370:AAFDpxcjM60sO3ow68ic_jPBZr5dLYvpajw";  
$adminChatIds = ["401878710","1252493044","5752908330"];

include 'db.php'; 

// Database/Table setup
$createDb = "CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
$conn->query($createDb);
$conn->select_db($database);

function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)), ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // CSRF Check (Recommended for your hero page security)
    /*
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo json_encode(['success' => false, 'message' => 'Security token invalid.']);
        exit();
    }
    */

    $name    = sanitizeInput($_POST['name'] ?? '');
    $email   = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $message = sanitizeInput($_POST['message'] ?? '');
    $rating  = filter_var($_POST['rating'] ?? 0, FILTER_VALIDATE_INT);
    
    $errors = [];
    if (empty($name)) $errors[] = 'Name is required.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email required.';
    if (empty($message)) $errors[] = 'Message is required.';
    if ($rating < 1 || $rating > 5) $errors[] = 'Select a rating (1-5).';

    if (empty($errors)) {
        try {
            // Ensure table exists
            $createTable = "CREATE TABLE IF NOT EXISTS feedbacks (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100), email VARCHAR(150), message TEXT,
                rating INT, status VARCHAR(20) DEFAULT 'pending',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB;";
            $conn->query($createTable);
            
            $stmt = $conn->prepare("INSERT INTO feedbacks (name, email, message, rating) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $name, $email, $message, $rating);
            
            if ($stmt->execute()) {
                
                // --- TELEGRAM NOTIFICATION START ---
                $notifyMsg = "🌟 *New Feedback Received!*\n\n";
                $notifyMsg .= "*Name:* $name\n";
                $notifyMsg .= "*Email:* $email\n";
                $notifyMsg .= "*Rating:* $rating / 5 ⭐\n\n";
                $notifyMsg .= "*Message:*\n$message";

                // Loop through all admin chat IDs
                foreach ($adminChatIds as $id) {
                    $telegramUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$id&parse_mode=Markdown&text=" . urlencode($notifyMsg);
                    @file_get_contents($telegramUrl);
                }
                // --- TELEGRAM NOTIFICATION END ---

                echo json_encode([
                    'success' => true, 
                    'message' => 'Thank you! Your review has been submitted.'
                ]);
            } else {
                throw new Exception('DB Insert failed.');
            }
            $stmt->close();
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Server error. Please try later.']);
        }
    } else {
        echo json_encode(['success' => false, 'errors' => $errors]);
    }
    $conn->close();
    exit();
}
?>