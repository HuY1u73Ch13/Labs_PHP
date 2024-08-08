<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];

// Determine if user is admin or normal user
if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
    header('Location: admin.php');
    exit();
} else {
    header('Location: user.php');
    exit();
}
?>
