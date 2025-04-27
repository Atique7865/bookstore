<?php
// Database connection
$conn = new mysqli('db', 'root', 'password', 'bookstore');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch Books
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">📚 My Book Store1</h1>

    <div class="text-center mb-4">
        <a href="add.php" class="btn btn-success">➕ Add New Book</a>
    </div>

    <div class="row">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['title']); ?></h5>
                        <p class="card-text">Author: <?= htmlspecialchars($row['author']); ?></p>
                        <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">🗑️ Delete</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>
