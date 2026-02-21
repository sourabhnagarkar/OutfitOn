<?php
session_start();
include 'connects.php';

// Ensure the user is logged in
if (!isset($_SESSION['vendor_id'])) {
    echo '<script>alert("Unauthorized access. Please login."); window.location="vendor_login.php";</script>';
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // CSRF Protection
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
        echo '<script>alert("Invalid request. Please reload the page."); window.location="add_cloth.php";</script>';
        exit();
    }

    // Sanitize input function
    function test_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Sanitize POST inputs
    $name        = test_input($_POST['name'] ?? '');
    $description = test_input($_POST['description'] ?? '');
    $category    = test_input($_POST['category'] ?? '');
    $size        = test_input($_POST['size'] ?? '');
    $price       = floatval($_POST['price'] ?? 0);

    // Validate inputs
    if (empty($name) || empty($description) || empty($category) || empty($size) || $price <= 0) {
        echo "<script>alert('All fields are required and price must be greater than 0.'); window.history.back();</script>";
        exit();
    }

    // Validate file
    if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
        echo "<script>alert('Please upload a valid image.'); window.history.back();</script>";
        exit();
    }

    $file_tmp  = $_FILES['photo']['tmp_name'];
    $file_name = basename($_FILES['photo']['name']);
    $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed   = ['jpg', 'jpeg', 'png', 'gif'];

    // Check file extension
    if (!in_array($file_ext, $allowed)) {
        echo "<script>alert('Only JPG, JPEG, PNG, and GIF formats are allowed.'); window.history.back();</script>";
        exit();
    }

    // Optional: check MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime  = finfo_file($finfo, $file_tmp);
    finfo_close($finfo);
    $allowed_mimes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mime, $allowed_mimes)) {
        echo "<script>alert('Uploaded file is not a valid image.'); window.history.back();</script>";
        exit();
    }

    // Optional: file size limit (2MB)
    if ($_FILES['photo']['size'] > 2 * 1024 * 1024) {
        echo "<script>alert('File size should not exceed 2MB.'); window.history.back();</script>";
        exit();
    }

    // Upload setup
    $upload_dir  = "uploads/";
    if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);
    $unique_name = uniqid("cloth_", true) . "." . $file_ext;
    $upload_path = $upload_dir . $unique_name;

    // Move file
    if (!move_uploaded_file($file_tmp, $upload_path)) {
        echo "<script>alert('Failed to move uploaded file.'); window.history.back();</script>";
        exit();
    }

    // Insert into DB
    $mysqli = connectdb();
    $stmt = $mysqli->prepare("INSERT INTO clothes (name, description, category, size, price, photo, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        error_log("[" . date('Y-m-d H:i:s') . "] Prepare failed: " . $mysqli->error . "\n", 3, 'error_log.txt');
        echo "<script>alert('Database error.'); window.history.back();</script>";
        exit();
    }

    $v_id = $_SESSION['vendor_id']; // Already checked above
    $stmt->bind_param("ssssdsi", $name, $description, $category, $size, $price, $upload_path, $v_id);

    if ($stmt->execute()) {
        unset($_SESSION['csrf_token']);
        echo '<script>alert("Cloth added successfully!"); window.location="showprouct.php";</script>';
    } else {
        die("Insert failed: " . $stmt->error);

    }

    $stmt->close();
    $mysqli->close();
}
?>
