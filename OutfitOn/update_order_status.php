<?php
include 'connects.php';
$conn = connectdb();
session_start();

if (!isset($_SESSION['vendor_id'])) {
    echo "<script>alert('Access denied.'); window.location.href='vendor_login.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['new_status'];

    // Basic validation
    $allowed = ['approved', 'shipped', 'completed', 'cancelled'];
    if (!in_array($new_status, $allowed)) {
        die("Invalid status.");
    }

    $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ? AND vendor_id = ?");
    $stmt->bind_param("sii", $new_status, $order_id, $_SESSION['vendor_id']);
    if ($stmt->execute()) {
        echo "<script>alert('Order status updated.'); window.location.href='view_order_vendor.php';</script>";
    } else {
        echo "<script>alert('Update failed.'); window.location.href='vendor_orders.php';</script>";
    }

    $stmt->close();
}
$conn->close();
?>
