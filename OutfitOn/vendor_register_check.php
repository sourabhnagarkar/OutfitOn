<?php
session_start();
include 'connects.php'; // make sure this file connects to your database

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // CSRF Token Check
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
        echo "<script>alert('Invalid CSRF token.'); window.location='vendor_register.php';</script>";
        exit();
    }

    // Sanitize and validate inputs
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));
    $state = htmlspecialchars(trim($_POST['state']));
    $city = htmlspecialchars(trim($_POST['city']));
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // Password match check
    if ($password !== $repassword) {
        echo "<script>alert('Passwords do not match.'); window.location='vendor_register.php';</script>";
        exit();
    }

    // Password strength check (optional, already checked on front-end)
    if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*]).{6,}$/', $password)) {
        echo "<script>alert('Password must be at least 6 characters long and include letters, numbers, and symbols.'); window.location='vendor_register.php';</script>";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $conn = connectdb();                       
    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM vendors WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Email already registered.'); window.location='vendor_register.php';</script>";
        $stmt->close();
        $conn->close();
        exit();
    }
    $stmt->close();

    // Insert new vendor
    $stmt = $conn->prepare("INSERT INTO vendors (email, name, phone, address, state, city, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $email, $name, $phone, $address, $state, $city, $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>alert('Vendor registered successfully!'); window.location='vendor_login.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.'); window.location='vendor_register.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>window.location='vendor_register.php';</script>";
}
?>
