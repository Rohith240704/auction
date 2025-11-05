<?php
session_start();
include __DIR__ . '/../db.php';
include "header.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bid = $_POST['bid'];
        $stmt = $conn->prepare("UPDATE items SET current_price=? WHERE id=? AND ? > current_price");
        $stmt->bind_param("dii", $bid, $id, $bid);
        $stmt->execute();
    }
    $item = $conn->query("SELECT * FROM items WHERE id=$id")->fetch_assoc();
?>
<div class="container">
  <h2><?php echo $item['title']; ?></h2>
  <img src="../uploads/<?php echo $item['image']; ?>" width="300">
  <p><?php echo $item['description']; ?></p>
  <p><strong>Current Price: ₹<?php echo $item['current_price']; ?></strong></p>
  <form method="post">
    <label>Your Bid</label>
    <input type="number" name="bid" step="0.01" required>
    <button type="submit">Place Bid</button>
  </form>
</div>
<?php
} else {
    $result = $conn->query("SELECT * FROM items ORDER BY created_at DESC");
    echo '<div class="container"><h2>All Auctions</h2><div class="items-grid">';
    while($row = $result->fetch_assoc()) {
        echo '<div class="card">
                <img src="../uploads/'.$row['image'].'" alt="">
                <h3>'.$row['title'].'</h3>
                <p>₹'.$row['current_price'].'</p>
                <a href="items.php?id='.$row['id'].'" class="btn">Bid</a>
              </div>';
    }
    echo '</div></div>';
}
include "footer.php";
?>
