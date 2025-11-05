<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../style_admin.css">
</head>
<body>
<?php include "header.php"; ?>
<div class="container">
  <h1>Welcome, <?php echo $_SESSION['admin_name']; ?></h1>
  <div class="dashboard-links">
    <a href="users.php" class="btn">Manage Users</a>
    <a href="items.php" class="btn">Manage Items</a>
  </div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
