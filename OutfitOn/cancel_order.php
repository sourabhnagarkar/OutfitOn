<?php
session_start();
include 'connects.php';

if (!isset($_SESSION['user']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit();
}

$order_id = intval($_POST['order_id']);
$user_id = $_SESSION['user'];

$conn = connectdb();

// Update only if order is in pending status and belongs to this user
$stmt = $conn->prepare("UPDATE orders SET status = 'cancelled' WHERE id = ? AND user_id = ? AND status = 'pending'");
$stmt->bind_param("ii", $order_id, $user_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Order cancelled successfully.'); window.location.href='MyOrder.php';</script>";
} else {
    echo "<script>alert('Unable to cancel order. It might have been already processed.'); window.location.href='MyOrder.php';</script>";
}

$stmt->close();
$conn->close();
?>
