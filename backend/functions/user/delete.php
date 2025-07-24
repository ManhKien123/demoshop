<?php
include_once(__DIR__ . '/../../../dbcontext.php');

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID not provided.");
}

$sql = "DELETE FROM users WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
exit();
