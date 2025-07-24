<?php
include_once(__DIR__ . '/../../../dbcontext.php');

$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    die("Invalid product ID.");
}

$sql = "DELETE FROM products WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
exit();
?>