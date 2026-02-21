<?php
session_start();
include 'connects.php';
$conn = connectdb();

$user_id = $_SESSION['user'] ?? null;
if (!$user_id || $_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "<script>alert('Invalid access'); window.location.href='index.php';</script>";
    exit();
}

$name     = $_POST['name'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$address  = $_POST['address'];
$city     = $_POST['city'];
$state    = $_POST['state'];
$fdate = $_POST['fdate'] ?? null;
$tdate = $_POST['tdate'] ?? null;
$payment  = $_POST['payment_method'];

// Get cart items
$stmt = $conn->prepare("SELECT c.*, cl.user_id FROM cart c JOIN clothes cl ON c.cloth_id = cl.id WHERE c.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>alert('Cart is empty'); window.location.href='index.php';</script>";
    exit();
}

if (!$fdate || !$tdate) {
    echo "<script>alert('Please select rental dates.'); window.history.back();</script>";
    exit();
}

// Insert each item into orders table
while ($row = $result->fetch_assoc()) {
    $stmt2 = $conn->prepare("INSERT INTO orders (user_id, vendor_id, cloth_id, name, price, photo, payment_method, address, city, state, phone, email, status,fdate,tdate) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending',?,?)");
    $stmt2->bind_param("iiisdsssssssss",
        $user_id,
        $row['user_id'],
        $row['cloth_id'],
        $name,
        $row['price'],
        $row['photo'],
        $payment,
        $address,
        $city,
        $state,
        $phone,
        $email,
        $fdate,
        $tdate
    );
    $stmt2->execute();
    $stmt2->close();
}

// Clear cart
$stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

$conn->close();

echo "<script>alert('Order placed successfully!'); window.location.href='order_booking.php';</script>";
