<?php require_once 'connect.php'; ?>
    <form action="xoasinhvien.php" method="POST">
    Nhật ID của sinh viên cần xóa:<input type = "text" name="id"><br>
                                  <input type ="submit" value="Xóa sinh viên">
    </form>

<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM sinhvien WHERE id = $id";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
        $conn->query("DELETE FROM sinhvien WHERE id = $id");
        echo "<script> Xóa sinh viên thành công <script/>";
    }else echo "Sinh viên không tồn tại";
    header("Location: quanlysinhvien.php");
    exit();
}
?>