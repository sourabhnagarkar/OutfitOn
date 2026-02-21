<?php
session_start();
include 'connects.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // CSRF Token Check
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
        jsAlertAndRedirect("Invalid request. Please reload the page.", "contact.php");
    }

    // Sanitize Inputs
    $email = test_input($_POST['email'] ?? '');
    $name = test_input($_POST['name'] ?? '');
    $description = test_input($_POST['description'] ?? '');

    // Validation
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        jsAlertAndGoBack("Invalid email address.");
    }

    if (empty($name) || !preg_match("/^[A-Za-z\s]+$/", $name)) {
        jsAlertAndGoBack("Name must contain only letters and spaces.");
    }

    if (empty($description)) {
        jsAlertAndGoBack("Description is required.");
    }

    // Insert into DB
    $mysqli = connectdb();
    $stmt = $mysqli->prepare("INSERT INTO feedback (email, name, description) VALUES (?, ?, ?)");
    if (!$stmt) {
        log_error("Prepare failed: " . $mysqli->error);
        jsAlertAndRedirect("Internal error. Try again later.", "contact.php");
    }

    $stmt->bind_param("sss", $email, $name, $description);

    if ($stmt->execute()) {
        unset($_SESSION['csrf_token']);

        $_SESSION['feedback_success'] = [
            'name' => $name,
            'email' => $email,
            'description' => $description
        ];

        header("Location: contact.php");
        exit();
    } else {
        log_error("Insert failed: " . $stmt->error);
        jsAlertAndGoBack("Failed to submit feedback. Try again.");
    }

    $stmt->close();
    $mysqli->close();
}

function test_input($data) {
    return trim($data);
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
