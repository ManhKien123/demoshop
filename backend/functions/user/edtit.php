<?php
include_once(__DIR__ . '/../../../dbcontext.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET name=?, email=?, role=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $role, $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}

$id = $_GET['id'] ?? null;
if (!$id) {
    die("Invalid ID.");
}

$sql = "SELECT * FROM users WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<h2>Edit User</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <label>Name: <input type="text" name="name" value="<?= $user['name'] ?>"></label><br>
    <label>Email: <input type="email" name="email" value="<?= $user['email'] ?>"></label><br>
    <label>Role: <input type="text" name="role" value="<?= $user['role'] ?>"></label><br>
    <button type="submit">Update</button>
</form>
