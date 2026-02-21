<?php
session_start();
include 'connects.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $mysqli = connectdb();
    $stmt = $mysqli->prepare("SELECT * FROM vendors WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Set vendor session
            $_SESSION['vendors'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email']
            ];

            // Also store vendor ID separately for easy access
            $_SESSION['vendor_id'] = $user['id'];

            header("Location: vendor_dashboard.php");
            exit();
        } else {
            echo '<script>alert("Invalid password."); window.location="vendor_login.php";</script>';
        }
    } else {
        echo '<script>alert("No account found."); window.location="vendor_login.php";</script>';
    }

    $stmt->close();
    $mysqli->close();
}
?>
