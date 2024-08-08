<!DOCTYPE html>
<html>
<body>
    <?php require_once 'connect.php'; ?>
    <?php
    if (isset($_GET['id'])) {
        $student_id = $_GET['id'];

        $result = $conn->query("SELECT * FROM sinhvien WHERE id = $student_id");
        
        if ($result->num_rows > 0) {
            $student = $result->fetch_assoc();

            echo "<h2>Thông tin chi tiết sinh viên:</h2>";
            echo "ID: " . $student["id"]. "<br>";
            echo "Name: " . $student["name"]. "<br>";
            echo "Mobile: " . $student["mobile"]. "<br>";
            echo "Email: " . $student["email"]. "<br>";
        } 
    }
    ?>
</body>
</html>