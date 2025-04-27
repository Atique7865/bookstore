<?php
// Database connection
$conn = new mysqli('db', 'root', 'password', 'bookstore');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// যদি ID পাওয়া যায়
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Book Delete করা
    $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $stmt->close();
}

// শেষে Home Page এ Redirect করে দিবো
header("Location: /");
exit();
?>
