<?php
session_start();
include 'connects.php';
$conn = connectdb();

$user_id = $_SESSION['user'] ?? null;
$cart_id = $_GET['id'] ?? null;

if (!$user_id || !$cart_id) {
    echo "<script>alert('Invalid request'); window.location.href='index.php';</script>";
    exit();
}

$stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $cart_id, $user_id);

if ($stmt->execute()) {
    echo "<script>alert('Item removed from cart'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Failed to delete'); window.location.href='index.php';</script>";
}

$stmt->close();
$conn->close();
?>
