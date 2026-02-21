<?php
session_start();
include 'connects.php';

$conn = connectdb();

if (isset($_GET['pno'])) {
    $clothId = intval($_GET['pno']); // sanitize input

    // Optional: check vendor_id match if needed
    $sql = "DELETE FROM clothes WHERE id = $clothId";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script>alert('Cloth deleted successfully'); window.location.href='showprouct.php';</script>";
    } else {
        echo "<script>alert('Error deleting cloth'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid delete request'); window.history.back();</script>";
}
?>
