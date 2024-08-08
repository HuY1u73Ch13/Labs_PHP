<?php
// Lấy dữ liệu từ URL
$username = $_GET['username'];
$password = $_GET['password'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$gender = $_GET['gender'];
$age = $_GET['age'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome | PHP</title>
</head>
<body>
    <h1>Hello <?php echo htmlspecialchars($firstname . ' ' . $lastname); ?></h1>
    <p>Username: <?php echo htmlspecialchars($username); ?></p>
    <p>Password (MD5): <?php echo htmlspecialchars($password); ?></p>
    <p>Gender: <?php echo htmlspecialchars($gender); ?></p>
    <p>Age: <?php echo htmlspecialchars($age); ?></p>
</body>
</html>
