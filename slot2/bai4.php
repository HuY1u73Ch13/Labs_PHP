<?php
        // $n = 0;
        // $sum = 0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["num1"])) {
                $n = intval($_POST["num1"]); // lay so nguyen dang int
                $sum = sumof($n);
            }
        }

        function sumof($n) {
            if ($n > 0) {
                return $n + sumof($n - 1);
            } else {
                return 0;
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tong day</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
            <label for="num1">Enter N</label>
            <input type="number" name="num1" id="num1" value="<?= htmlspecialchars($n) ?>">
        </div>
        <input type="submit" value="Calculate" name="operation">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p>The sum of numbers from 1 to " . htmlspecialchars($n) . " is: " . htmlspecialchars($sum) . "</p>";
        }
    ?>
</body>
</html>
