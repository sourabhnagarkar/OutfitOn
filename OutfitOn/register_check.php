<?php
session_start();
include 'connects.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // CSRF validation
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
        echo '<script>alert("Invalid request. Please reload the page."); window.location="register.php";</script>';
        exit();
    }

    // Sanitize inputs
    $email = test_input($_POST['email'] ?? '');
    $name = test_input($_POST['name'] ?? '');
    $phone = test_input($_POST['phone'] ?? '');
    $address = test_input($_POST['address'] ?? '');
    $state = test_input($_POST['state'] ?? '');
    $city = test_input($_POST['city'] ?? '');
    $raw_password = $_POST['password'] ?? '';
    $repassword = $_POST['repassword'] ?? '';

    // Validation
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        jsAlertAndGoBack("Invalid email address.");
    }

    if (empty($name) || !preg_match("/^[A-Za-z\s]+$/", $name)) {
        jsAlertAndGoBack("Name must contain only letters and spaces.");
    }

    if (empty($phone) || !preg_match("/^[0-9]{10}$/", $phone)) {
        jsAlertAndGoBack("Phone must be a valid 10-digit number.");
    }

    if (empty($address)) {
        jsAlertAndGoBack("Address is required.");
    }

    if (empty($state)) {
        jsAlertAndGoBack("State is required.");
    }

    if (empty($city)) {
        jsAlertAndGoBack("City is required.");
    }

    if (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*]).{6,}$/", $raw_password)) {
        jsAlertAndGoBack("Password must be at least 6 characters and include letters, numbers, and symbols.");
    }

    if ($raw_password !== $repassword) {
        jsAlertAndGoBack("Passwords do not match.");
    }

    // Check for duplicate email
    $mysqli = connectdb();
    $sql = "SELECT email FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        log_error("Prepare failed: " . $mysqli->error);
        jsAlertAndGoBack("Internal error during email check.");
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        jsAlertAndGoBack("Email already registered. Try a different one.");
    }
    $stmt->close();

    // Insert new user
    $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("INSERT INTO users (email, name, phone, address, state, city, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        log_error("Prepare failed: " . $mysqli->error);
        jsAlertAndRedirect("Internal error. Try again later.", "register.php");
    }
    $message = "";

if (isset($_GET['logout']) && $_GET['logout'] === 'success') {
    $message = "You have been logged out successfully.";
}


    $stmt->bind_param("sssssss", $email, $name, $phone, $address, $state, $city, $hashed_password);
    if ($stmt->execute()) {
        unset($_SESSION['csrf_token']);
        echo '<script>alert("Registration successful!"); window.location="login.php";</script>';
    } else {
        log_error("Insert failed: " . $stmt->error);
        jsAlertAndGoBack("Failed to register. Try again.");
    }

    $stmt->close();
    $mysqli->close();
}

// Utility functions
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function log_error($message) {
    $logFile = __DIR__ . '/error_log.txt';
    error_log("[" . date('Y-m-d H:i:s') . "] " . $message . "\n", 3, $logFile);
}

function jsAlertAndGoBack($message) {
    echo "<script>alert('" . addslashes($message) . "'); window.history.back();</script>";
    exit();
}

function jsAlertAndRedirect($message, $location) {
    echo "<script>alert('" . addslashes($message) . "'); window.location='$location';</script>";
    exit();
}
?>
