<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hash password với md5
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];

    // Tính tuổi từ ngày sinh
    $dob = new DateTime($birthday);
    $now = new DateTime();
    $age = $now->diff($dob)->y;

    // Chuyển hướng đến trang welcome.php với dữ liệu
    header("Location: welcome.php?username=$username&password=$password&firstname=$firstname&lastname=$lastname&gender=$gender&age=$age");
    exit();
}
?>
