<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include __DIR__ . '/../db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="../style_user.css">
</head>
<body>
<?php include "header.php"; ?>

<div class="container">
  <h1 class="page-title">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?> 🎉</h1>
  <h2 class="section-title">Available Auctions</h2>

  <div class="grid">
    <?php
      $result = $conn->query("SELECT * FROM items ORDER BY created_at DESC");
      if ($result->num_rows > 0):
        while($row = $result->fetch_assoc()):
    ?>
      <div class="card auction-card">
        <img src="../uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="auction-img">
        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
        <p><?php echo substr(htmlspecialchars($row['description']), 0, 60); ?>...</p>
        <p class="price">₹<?php echo $row['current_price']; ?></p>
        <a href="items.php?id=<?php echo $row['id']; ?>" class="btn">View & Bid</a>
      </div>
    <?php
        endwhile;
      else:
        echo "<p>No auctions available right now. Check back later!</p>";
      endif;
    ?>
  </div>
</div>

<?php include "footer.php"; ?>
</body>
</html>
