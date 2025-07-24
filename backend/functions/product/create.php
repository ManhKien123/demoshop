<?php
include_once(__DIR__ . '/../../../dbcontext.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO products (name, price, category, image_url) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $price, $category, $image_url);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<h2>Create New Product</h2>
<form method="POST">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Price: <input type="text" name="price" required></label><br>
    <label>Category: <input type="text" name="category" required></label><br>
    <label>Image URL: <input type="text" name="image_url" required></label><br>
    <button type="submit">Create</button>
</form>
<a href="index.php">Back to list</a>
