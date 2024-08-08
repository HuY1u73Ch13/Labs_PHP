<?php
    $error = "";
    $x = "";
    $y = "";
    $ans = "";
    if(isset($_GET['operation']))
    {
        $x = $_GET['num1'];
        $y = $_GET['num2'];
        $op = $_GET['operation'];
        if (is_numeric($x) && is_numeric($y))
        {
            switch($op) 
            {
                case 'add' : $ans = $x + $y;
                    break;
                case 'sub' : $ans = $x - $y;
                    break;
                case 'mul' : $ans = $x * $y;
                    break;
                case 'div' : $ans = $x / $y;
                    break;
             }
        }
        else
        {
            $error = "Nhap so vao cai da";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caculator</title>
</head>
<body>
    <h2><?= $error ?> </h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>"  method="get"> 
    <div>
        <label for= "num1"> Number1 </label>
        <input type="number" name="num1" value="<?= $x ?>">
    </div>
    <div>
        <label for= "num2"> Number2 </label>
        <input type="number" name="num2" value="<?= $y ?>">
    </div>
    <div>
    <label for= "ans"> ans </label>
    <input type="number" name="ans" value="<?=$ans?>" disabled>
    </div>
    <div>
        <input type="submit" value="add" name="operation">
        <input type="submit" value="sub" name="operation">
        <input type="submit" value="mul" name="operation">
        <input type="submit" value="div" name="operation">
    </div>
</form>
</body>
</html>