<?php
include_once(__DIR__ . '/../../../dbcontext.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image_url = $_POST['image_url'];

    $sql = "UPDATE products SET name=?, price=?, category=?, image_url=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $price, $category, $image_url, $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}

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
?>

<h2>Edit Product</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <label>Name: <input type="text" name="name" value="<?= $product['name'] ?>"></label><br>
    <label>Price: <input type="text" name="price" value="<?= $product['price'] ?>"></label><br>
    <label>Category: <input type="text" name="category" value="<?= $product['category'] ?>"></label><br>
    <label>Image URL: <input type="text" name="image_url" value="<?= $product['image_url'] ?>"></label><br>
    <button type="submit">Update</button>
</form>
