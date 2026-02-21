<?php
session_start();
include 'connects.php';
$conn = connectdb();

// Check if user is logged in
$user_id = $_SESSION['user'] ?? null;
if (!$user_id || !isset($_GET['pno'])) {
    echo "<script>alert('Invalid request'); window.history.back();</script>";
    exit();
}

$cloth_id = intval($_GET['pno']);

// Check if cloth already in cart
$stmt = $conn->prepare("SELECT id FROM cart WHERE user_id = ? AND cloth_id = ?");
$stmt->bind_param("ii", $user_id, $cloth_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "<script>alert('Already in cart'); window.location.href='showcloth.php';</script>";
    exit();
}
$stmt->close();

// Fetch cloth details
$stmt = $conn->prepare("SELECT name, price, photo FROM clothes WHERE id = ?");
$stmt->bind_param("i", $cloth_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Cloth not found'); window.history.back();</script>";
    exit();
}

$cloth = $result->fetch_assoc();
$name = $cloth['name'];
$price = $cloth['price'];
$photo = $cloth['photo'];
$stmt->close();

// Insert into cart
$stmt = $conn->prepare("INSERT INTO cart (user_id, cloth_id, name, price, photo) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iisss", $user_id, $cloth_id, $name, $price, $photo);

if ($stmt->execute()) {
    echo "<script>alert('Cloth added to cart successfully'); window.location.href='showcloth.php';</script>";
} else {
    echo "<script>alert('Failed to add cloth to cart'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
