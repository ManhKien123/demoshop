<?php
include_once(__DIR__ . '/../../../dbcontext.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users (name, email, role, created_at) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $role);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<h2>Create New User</h2>
<form method="POST">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Role: <input type="text" name="role" required></label><br>
    <button type="submit">Create</button>
</form>
<a href="index.php">Back to list</a>
