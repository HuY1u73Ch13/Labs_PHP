<?php
require 'db.php';

$response = array('success' => false, 'message' => '');

function validate_password($password) {
    if (strlen($password) < 8) {
        return "Password must be at least 8 characters long.";
    }
    if (!preg_match('/[A-Z]/', $password)) {
        return "Password must contain at least one uppercase letter.";
    }
    if (!preg_match('/[a-z]/', $password)) {
        return "Password must contain at least one lowercase letter.";
    }
    if (!preg_match('/\d/', $password)) {
        return "Password must contain at least one number.";
    }
    if (!preg_match('/[^a-zA-Z\d]/', $password)) {
        return "Password must contain at least one special character.";
    }
    if (preg_match('/[\\\/:*?<>|]/', $password)) {
        return "Password contains invalid special characters: \\ / : * ? < > |";
    }
    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $title = $_POST['title'];
    $fullname = $_POST['fullname'];
    $company = $_POST['company'];
    $agree = isset($_POST['agree']);

    // Validate required fields
    if (!$username || !$email || !$password || !$title || !$fullname || !$company || !$agree) {
        $response['message'] = "All fields are required and you must agree to the registration.";
    } else {
        // Validate password
        $passwordValidationResult = validate_password($password);
        if ($passwordValidationResult !== true) {
            $response['message'] = $passwordValidationResult;
        } else {
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            try {
                // Insert user into database
                $stmt = $conn->prepare("INSERT INTO users (username, email, password, title, fullname, company) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$username, $email, $hashedPassword, $title, $fullname, $company]);
                
                // Determine if user is admin based on username (you may have a different admin detection logic)
                if ($username === 'admin') {
                    $is_admin = true;
                } else {
                    $is_admin = false;
                }

                $response['success'] = true;
                $response['message'] = "Registration successful!";
                $response['is_admin'] = $is_admin; // Send admin status to client
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    $response['message'] = "Username or email already exists.";
                } else {
                    $response['message'] = "Error: " . $e->getMessage();
                }
            }
        }
    }
    echo json_encode($response);
    exit;
}
?>
