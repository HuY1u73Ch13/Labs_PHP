<?php
session_start();
require 'db.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            
            // Determine user role (admin or normal user)
            if ($user['is_admin']) {
                $response['redirect'] = 'admin.php';
            } else {
                $response['redirect'] = 'welcome.php'; // Change to the appropriate page
            }

            $response['success'] = true;
            $response['message'] = 'Login successful';
        } else {
            // Password does not match
            $response['success'] = false;
            $response['message'] = 'Invalid username or password';
        }
    } else {
        // Username not found
        $response['success'] = false;
        $response['message'] = 'Invalid username or password';
    }
} else {
    // Invalid request method
    $response['success'] = false;
    $response['message'] = 'Invalid request method';
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
