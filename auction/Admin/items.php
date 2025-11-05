<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/../db.php';
include "header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $price = $_POST['price']; // starting price

    // Handle image upload
    $image = $_FILES['image']['name'];
    $target = __DIR__ . "/../uploads/" . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO items (title, description, image, starting_price, current_price) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssdd", $title, $desc, $image, $price, $price);
    $stmt->execute();
}

$result = $conn->query("SELECT * FROM items ORDER BY created_at DESC");
?>
<div class="container">
  <h2>Manage Items</h2>

  <div class="card">
    <form method="post" enctype="multipart/form-data">
      <label>Title</label>
      <input type="text" name="title" required>

      <label>Description</label>
      <textarea name="description" required></textarea>

      <label>Starting Price</label>
      <input type="number" step="0.01" name="price" required>

      <label>Upload Image</label>
      <input type="file" name="image" required>

      <button type="submit" class="btn">Add Item</button>
    </form>
  </div>

  <h3 class="section-title">Current Items</h3>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Starting Price</th>
        <th>Current Price</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['title']); ?></td>
        <td>$<?php echo $row['starting_price']; ?></td>
        <td>$<?php echo $row['current_price']; ?></td>
        <td><img src="../uploads/<?php echo htmlspecialchars($row['image']); ?>" width="60"></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include "footer.php"; ?>
