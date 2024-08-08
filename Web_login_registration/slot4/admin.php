<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username']) || $_SESSION['username'] != 'admin') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            background-image: url('OIP.jpeg'); 
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh; 
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white; 
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 20px auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid white;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #555;
        }
        .edit-avatar {
            margin-top: 20px;
            text-align: center;
        }
        .edit-avatar form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, Admin!</h1>
        <?php
        try {
            $stmt = $conn->prepare("SELECT avatar FROM users WHERE username = ?");
            $stmt->execute([$_SESSION['username']]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
            $avatar = $admin['avatar'] ?? 'default-avatar.png';  // Provide a default avatar
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        <img src="<?php echo htmlspecialchars($avatar); ?>" alt="Admin Avatar" class="avatar">
        <div class="edit-avatar">
            <form id="avatar-form" action="edit_avatar.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="avatar" accept="image/*" required>
                <button type="submit">Update Avatar</button>
            </form>
        </div>
        <h2>List of Users</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Title</th>
                <th>Full Name</th>
                <th>Company</th>
                <th>Avatar</th>
            </tr>
            <?php
            try {
                $stmt = $conn->query("SELECT id, username, email, title, fullname, company, avatar FROM users");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $userAvatar = $row['avatar'] ?? 'default-avatar.png';
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['company']) . "</td>";
                    echo "<td><img src='" . htmlspecialchars($userAvatar) . "' alt='Avatar' style='width:50px; height:50px; border-radius:50%;'></td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </table>
    </div>
    <script>
        document.getElementById('avatar-form').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'edit_avatar.php', true);
            xhr.onload = function() {
                var response = JSON.parse(this.responseText);
                if (response.success) {
                    alert('Avatar updated successfully!');
                    location.reload();  // Reload the current page
                } else {
                    alert('Error: ' + response.message);
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>
