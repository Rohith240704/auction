<?php
session_start();
include __DIR__ . '/../db.php';
include "header.php";

$result = $conn->query("SELECT id, username, role FROM users");
?>
<div class="container">
  <h2>Manage Users</h2>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th><th>Username</th><th>Role</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['role']; ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include "footer.php"; ?>
