<?php
session_start();

// Database connection (use the same credentials as your dashboard)
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'echotongue';

try {
    $conn = new mysqli($host, $username, $password, $database);
    $conn->set_charset("utf8mb4");
} catch (Exception $e) {
    die("Database connection failed.");
}

// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize form data
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $message = sanitizeInput($_POST['message'] ?? '');
    $rating = filter_var($_POST['rating'] ?? 0, FILTER_VALIDATE_INT);
    
    // Validate data
    $errors = [];
    
    if (empty($name) || strlen($name) < 2) {
        $errors[] = 'Name must be at least 2 characters long.';
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    
    if (empty($message) || strlen($message) < 10) {
        $errors[] = 'Review must be at least 10 characters long.';
    }
    
    if ($rating < 1 || $rating > 5) {
        $errors[] = 'Please select a valid rating.';
    }
    
    // If no errors, save to database
    if (empty($errors)) {
        try {
            $stmt = $conn->prepare("INSERT INTO feedbacks (name, email, message, rating, status) VALUES (?, ?, ?, ?, 'pending')");
            $stmt->bind_param("sssi", $name, $email, $message, $rating);
            
            if ($stmt->execute()) {
                // Success - redirect back with success message
                $_SESSION['feedback_success'] = 'Thank you for your feedback! Your review has been submitted.';
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '#review-form');
                exit();
            } else {
                throw new Exception('Failed to save feedback.');
            }
        } catch (Exception $e) {
            $errors[] = 'An error occurred. Please try again later.';
        }
    }
    
    // If there are errors, store them in session and redirect back
    if (!empty($errors)) {
        $_SESSION['feedback_errors'] = $errors;
        $_SESSION['form_data'] = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'rating' => $rating
        ];
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '#review-form');
        exit();
    }
} else {
    // Not a POST request, redirect to home
    header('Location: index.php');
    exit();
}
?>