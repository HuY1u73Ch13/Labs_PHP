<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $gender = $_POST["gender"];
        $DOB = $_POST["birthday"];

        echo "Welcome, " . $lastname . " " . $firstname . "<br>";
        echo "Username: " . $username . "<br>";
        echo "Password: " . md5($password) . "<br>";
        echo "Fullname: " . $lastname . " " . $firstname . "<br>";
        echo "Gender: " . $gender . "<br>";
        $birthTime = new DateTime($DOB);
        $formatDOB = date_format($birthTime, "d-m-Y"    );
        echo "DOB: " . $formatDOB . "<br>";
        $currentTime = new DateTime();
        $age = date_diff($birthTime, $currentTime)->y;
        echo "Age: " . $age . "<br>";
    }
?>
