<?php
// Thông tin kết nối cơ sở dữ liệu
$servername = 'localhost';
$username = 'root';
$password = '';  // Để trống nếu user root không có mật khẩu
$database = 'QuanLySinhVien';

// Kết nối tới cơ sở dữ liệu
$conn = mysqli_connect($servername, $username,'', $database);

// Kiểm tra kết nối
if (!$conn) {
    die('Kết nối thất bại: ' . mysqli_connect_error());
}

// Thiết lập charset cho kết nối
mysqli_set_charset($conn, "utf8");
?>
