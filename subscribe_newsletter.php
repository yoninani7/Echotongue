<?php
include 'db.php'; 

// Configuration
$botToken = "8582285370:AAFDpxcjM60sO3ow68ic_jPBZr5dLYvpajw"; 
$adminChatIds = ["401878710","1252493044","5752908330"];  

// 1. Normalize input to always be an array
// This handles both a single string 'Email' or an array of emails
$input = isset($_POST['Email']) ? $_POST['Email'] : '';
$emails = is_array($input) ? $input : [$input];

$results = [
    'success' => [],
    'errors'  => []
];

// 2. Prepare statements once (Better Performance)
$check = $conn->prepare("SELECT id FROM newsletter WHERE email = ?");
$insert = $conn->prepare("INSERT INTO newsletter (email) VALUES (?)");

foreach ($emails as $email) {
    $email = trim($email);

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $results['errors'][] = "Invalid email: $email";
        continue;
    }

    // Check for existing
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $results['errors'][] = "Already subscribed: $email";
    } else {
        // Insert new
        $insert->bind_param("s", $email);
        if ($insert->execute()) {
            $results['success'][] = $email;

            // 3. Notify all Telegram Admins
            $message = "📢 New Subscriber: $email";
            foreach ($adminChatIds as $chatId) {
                $telegramUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($message);
                @file_get_contents($telegramUrl);
            }
        } else {
            $results['errors'][] = "DB Error for: $email";
        }
    }
}

// 4. Final Response
$check->close();
$insert->close();
$conn->close();

echo json_encode([
    'status' => count($results['success']) > 0 ? 'success' : 'failed',
    'added' => $results['success'],
    'failed' => $results['errors']
]);
?>