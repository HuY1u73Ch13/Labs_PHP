<!DOCTYPE html>
<html>
<body>
    <?php require_once 'connect.php'; ?>
    <?php
    // Function to view danh sach sinh vien
    function DisplayStudent($conn){
        $result = $conn->query("SELECT * FROM sinhvien");
        if ($result->num_rows > 0) {
            echo "<h2>Danh sách sinh viên</h2>";
            echo "<table border='1'>"; 
            echo "<tr>"; 
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Mobile</th>";
            echo "<th>Email</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()){
                echo "<tr>"; 
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["mobile"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td><a href='chitietsinhvien.php?id=" . $row["id"] . "'>View Detail</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<p>Danh sách trống</p>";
        }
    }
    DisplayStudent($conn);  
    ?>
    <a href="themsinhvien.php">Thêm Sinh Viên</a> <br>
    <a href="xoasinhvien.php">Xóa Sinh Viên</a>
</body>
</html>