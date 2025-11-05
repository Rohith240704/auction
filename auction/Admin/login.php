<?php
session_start();
include __DIR__ . '/../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND role='admin'");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if ($password === $row['password']) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['username'];
            header("Location: index.php");
            exit;
        }
    }
    $error = "Invalid admin credentials";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="style_admin.css">
</head>
<body>
<div class="login-container">
  <h2>Admin Login</h2>
  <form method="post">
    <label>Username</label>
    <input type="text" name="username" required>
    <label>Password</label>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
  </form>
</div>
</body>
</html>
