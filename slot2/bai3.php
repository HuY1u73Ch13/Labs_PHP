<?php
$result = '';
if (isset($_POST['calculate'])) {
    $a = isset($_POST['a']) ? (float)trim($_POST['a']) : '';
    $b = isset($_POST['b']) ? (float)trim($_POST['b']) : '';
    if ($a === '') {
        $result = 'Bạn chưa nhập số a';
    } elseif ($b === '') {
        $result = 'Bạn chưa nhập số b';
    } elseif ($a == 0) {
        $result = 'Số a phải khác 0';
    } else {
        $result = 'Nghiệm của phương trình là x = ' . (-$b / $a);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Giải phương trình bậc nhất</title>
</head>
<body>
    <h1>Giải phương trình bậc nhất</h1>
    <!-- <form method="post" action="">
        <input type="text" style="width: 20px" name="a" value=""/> x + 
        <input type="text" style="width: 20px" name="b" value=""/> = 0
        <br><br>
        <input type="submit" name="calculate" value="Tính toán"/>
    </form> -->
    <form method="post" action="">
        <label for="a">a</label>
        <input type="text" id="a" style="width: 40px" name="a" value=""/> x + 
        <label for="b">b</label>
        <input type="text" id="b" style="width: 40px" name="b" value=""/> = 0
        <br><br>
        <input type="submit" name="calculate" value="Tính toán"/>
    </form>
    <p><?php echo $result; ?></p>
</body>
</html>
