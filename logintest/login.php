<?php
    // Thông tin người dùng
    $users = [
        "admin" => "123123",  // admin
        "user1" => "123456",
        "user2" => "123456"
    ];

    // Hàm kiểm tra đăng nhập
    function login($username, $password, $users)
    {
        if (isset($users[$username]) && $users[$username] === $password)
        {
            if ($username === "admin") 
            {
                return "Xin chào, bạn là admin";
            }
            else 
            {
                return "Đăng nhập thành công! Bạn là người dùng thông thường.";
            }
        } 
        else 
        {
            return "Đăng nhập thất bại. Sai tên đăng nhập hoặc mật khẩu.";
        }
    }

    // Xử lý khi người dùng gửi form đăng nhập
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $result = login($username, $password, $users);
        echo $result;
    }
?>
