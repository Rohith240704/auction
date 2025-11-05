<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <!-- Correct CSS link for User -->
  <link rel="stylesheet" href="style_user.css">
</head>
<body>
  <nav class="navbar">
    <div class="container">
      <a href="index.php" class="navbar-brand">Auction Hub</a>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="items.php">My Bids</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
