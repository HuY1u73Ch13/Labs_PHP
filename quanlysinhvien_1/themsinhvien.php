<style>
    form {
        width: 300px; 
    }

    form input {
        width: 100%; 
        margin-bottom: 10px; 
    }
</style>
<?php require_once 'connect.php'; ?>
    <form action="themsinhvien.php" method="POST">
        ID:    <input type = "text" name="id"><br>
        Name:  <input type = "text" name="name"><br>
        Mobile:<input type = "text" name="mobile"><br>
        Email: <input type = "text" name="email"><br>
        <input type ="submit" value="Thêm sinh viên">
    </form>
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

     // Check if id exist
     $check = "SELECT * FROM sinhvien WHERE id = '$id'";
     $check_result = $conn->query($check);
 
     if ($check_result->num_rows > 0) {
         echo "<script>alert('ID đã tồn tại. Vui lòng chọn ID khác.');</script>";
     } else {
        $sql = "INSERT INTO sinhvien (id, name, mobile, email) VALUES ('$id', '$name', '$mobile', '$email')";
        if($conn->query($sql)){
            echo "<script> Thêm sinh viên thành công <script/>";
            header("Location: quanlysinhvien.php");
            exit();
        }
    }
}

?>