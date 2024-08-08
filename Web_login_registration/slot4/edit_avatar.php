<?php
session_start();
require 'db.php';

$response = array('success' => false, 'message' => '');

if (!isset($_SESSION['username'])) {
    $response['message'] = "You need to log in first.";
    echo json_encode($response);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['avatar']['tmp_name'];
        $avatar_name = basename($_FILES['avatar']['name']);
        $avatar_dir = 'uploads/';
        if (!is_dir($avatar_dir)) {
            mkdir($avatar_dir, 0777, true);
        }
        $avatar_path = $avatar_dir . $avatar_name;
        if (move_uploaded_file($tmp_name, $avatar_path)) {
            try {
                $stmt = $conn->prepare("UPDATE users SET avatar = ? WHERE username = ?");
                $stmt->execute([$avatar_path, $_SESSION['username']]);
                $response['success'] = true;
                $response['message'] = "Avatar updated successfully!";
            } catch (PDOException $e) {
                $response['message'] = "Error: " . $e->getMessage();
            }
        } else {
            $response['message'] = "Failed to move uploaded file.";
        }
    } else {
        $response['message'] = "Upload error: " . $_FILES['avatar']['error'];
    }
} else {
    $response['message'] = "Invalid request method.";
}

echo json_encode($response);
?>
