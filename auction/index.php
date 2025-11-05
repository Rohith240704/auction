<?php
session_start();
include("db.php");

// Fetch active items
$sql = "SELECT * FROM items ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Auction Marketplace</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="header">
    <div class="header-inner">
      <a href="index.php" class="brand">
        <div class="logo">A</div>
        AuctionSite
      </a>
      <nav class="header-nav">
        <a href="User/login.php" class="nav-link">User Login</a>
        <a href="Admin/login.php" class="nav-link">Admin Login</a>
         <h3> Mukund 📞 6381054485 </h3>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="hero">
      <div class="hero-left">
        <h1>Welcome to the Auction Marketplace</h1>
        <p>Bid on exciting items in real time. Join now and start winning!</p>
        <div class="hero-cta">
          <a href="User/register.php" class="btn btn-primary">Sign Up</a>
          <a href="User/login.php" class="btn btn-ghost">Log In</a>
          <h3> Mukund 📞 6381054485 </h3>
        </div>
      </div>
    </section>

    <h2 style="margin-top:30px;">Live Auctions</h2>
    <div class="grid">
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <div class="card">
            <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" class="card-media">
            <div class="card-body">
              <h3 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h3>
              <p class="card-desc"><?php echo htmlspecialchars($row['description']); ?></p>
              <div class="card-meta">
                <!-- Show current price (latest) -->
                <span class="price">
                  <?php if ($row['current_price'] > 0): ?>
                    $<?php echo $row['current_price']; ?>
                  <?php else: ?>
                    $<?php echo $row['starting_price']; ?>
                  <?php endif; ?>
                </span>
                <a href="User/login.php" class="btn btn-primary">Bid Now</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No auctions yet. Check back soon!</p>
      <?php endif; ?>
    </div>
  </main>

  <footer class="footer">
    <p>&copy; <?php echo date("Y"); ?> Auction Marketplace. All rights reserved.</p>
  </footer>
</body>
</html>
