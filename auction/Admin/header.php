<?php
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auction Admin</title>
  <!-- Correct CSS link for Admin -->
  <link rel="stylesheet" href="style_admin.css">
</head>
<body>
  <nav class="navbar">
    <div class="container">
      <a href="index.php" class="navbar-brand">Auction Admin</a>
      <ul class="nav-links">
        <li><a href="users.php">Users</a></li>
        <li><a href="items.php">Items</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
