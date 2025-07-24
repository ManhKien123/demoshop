<?php
include_once(__DIR__ . '/../../../dbcontext.php');

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID is missing.");
}

$sql = "SELECT * FROM users WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found.");
}
?>

<h2>User Details</h2>
<p><strong>ID:</strong> <?= $user['id'] ?></p>
<p><strong>Name:</strong> <?= $user['name'] ?></p>
<p><strong>Email:</strong> <?= $user['email'] ?></p>
<p><strong>Role:</strong> <?= $user['role'] ?></p>
<p><strong>Created At:</strong> <?= $user['created_at'] ?></p>
<a href="index.php">Back to list</a>
