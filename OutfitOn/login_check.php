<?php
session_start();
include 'connects.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $mysqli = connectdb();
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Set session
           $_SESSION['user'] = [
    'id' => $user['id'],
    'name' => $user['name'],
    'email' => $user['email']
    // add more if needed
];

            header("Location: index.php");
            exit();
        } else {
            echo '<script>alert("Invalid password."); window.location="login.php";</script>';
        }
    } else {
        echo '<script>alert("No account found."); window.location="login.php";</script>';
    }
    $stmt->close();
    $mysqli->close();
}
?>
