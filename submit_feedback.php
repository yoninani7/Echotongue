<?php
session_start();

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'echotongue';

// Create connection
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    $response = ['success' => false, 'message' => 'Database connection failed.'];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

// Create database if it doesn't exist
$createDb = "CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if (!$conn->query($createDb)) {
    $response = ['success' => false, 'message' => 'Failed to create database.'];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

// Select the database
$conn->select_db($database);

// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $response = ['success' => false, 'message' => 'Security token invalid. Please try again.'];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
    
    // Get and sanitize form data
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $message = sanitizeInput($_POST['message'] ?? '');
    $rating = filter_var($_POST['rating'] ?? 0, FILTER_VALIDATE_INT);
    
    // Validate data
    $errors = [];
    
    // Name validation
    if (empty($name)) {
        $errors[] = 'Name is required.';
    }   
    // Email validation
    if (empty($email)) {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    } 
    
    // Message validation
    if (empty($message)) {
        $errors[] = 'Message is required.';
    }  
    
    // Rating validation
    if (empty($rating) || $rating < 1 || $rating > 5) {
        $errors[] = 'Please select a valid rating (1-5 stars).';
    }
    
    // Prepare response
    $response = [];
    
    // If no errors, save to database
    if (empty($errors)) {
        try {
            // Create feedbacks table if it doesn't exist
            $createTable = "CREATE TABLE IF NOT EXISTS feedbacks (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(150) NOT NULL,
                message TEXT NOT NULL,
                rating INT NOT NULL,
                status VARCHAR(20) DEFAULT 'pending',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
            
            if (!$conn->query($createTable)) {
                throw new Exception("Failed to create table.");
            }
            
            // Prepare and execute insert statement
            $stmt = $conn->prepare("INSERT INTO feedbacks (name, email, message, rating, status) VALUES (?, ?, ?, ?, 'pending')");
            if (!$stmt) {
                throw new Exception("Prepare failed.");
            }
            
            $stmt->bind_param("sssi", $name, $email, $message, $rating);
            
            if ($stmt->execute()) {
                // Success
                $response = [
                    'success' => true,
                    'message' => 'Thank you for your feedback! <br> Your review has been submitted.',
                    'insert_id' => $conn->insert_id
                ];
                
                // Store in session for page reload (optional)
                $_SESSION['feedback_success'] = $response['message'];
                
                // Generate new CSRF token
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            } else {
                throw new Exception('Failed to save feedback.');
            }
            
            $stmt->close();
            
        } catch (Exception $e) {
            error_log("Database error: " . $e->getMessage());
            $response = [
                'success' => false,
                'message' => 'An error occurred while saving your feedback. Please try again later.'
            ];
        }
    } else {
        $response = [
            'success' => false,
            'errors' => $errors
        ];
    }
    
    // Close database connection
    $conn->close();
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
    
} else {
    // Not a POST request
    $response = ['success' => false, 'message' => 'Invalid request method.'];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>