<?php
session_start();
include __DIR__ . '/../db.php';
include "header.php";

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
?>
<div class="container">
  <h2>My Profile</h2>
  <p><strong>Username:</strong> <?php echo $result['username']; ?></p>
</div>
<?php include "footer.php"; ?>
