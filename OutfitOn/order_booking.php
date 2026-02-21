<?php
session_start();
include 'connects.php';
$conn = connectdb();

$user_id = $_SESSION['user'] ?? null;
if (!$user_id) {
    echo "<script>alert('Please login'); window.location.href='login.php';</script>";
    exit();
}

// Here you can insert cart items to orders table before clearing
// Example: loop over cart and move to orders...

// Clear the cart
$stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->close();

echo "<script>window.location.href='index.php';</script>";
$conn->close();
?>
