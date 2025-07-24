<?php
include_once(__DIR__ . '/../../../dbcontext.php');

$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    die("Invalid product ID.");
}

$sql = "SELECT * FROM products WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    die("Product not found.");
}
?>

<h2>Product Details</h2>
<p><strong>ID:</strong> <?= $product['id'] ?></p>
<p><strong>Name:</strong> <?= $product['name'] ?></p>
<p><strong>Price:</strong> <?= $product['price'] ?></p>
<p><strong>Category:</strong> <?= $product['category'] ?></p>
<p><strong>Image:</strong><br>
<img src="<?= $product['image_url'] ?>" width="200" alt="<?= $product['name'] ?>"></p>
<a href="index.php">Back to list</a>
