<?php
// Database connection
$conn = new mysqli('db', 'root', 'password', 'bookstore');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// যদি Form Submit হয়
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];

    $stmt = $conn->prepare("INSERT INTO books (title, author) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $author);
    $stmt->execute();

    echo "<div style='color: green; font-weight: bold;'>✅ New Book Added Successfully!</div>";
    echo "<a href='/'>Go Back to Home</a>";

    $stmt->close();
    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">📚 Add a New Book</h2>
    <div class="card p-4 shadow-sm">
        <form action="add.php" method="post">
            <div class="mb-3">
                <label class="form-label">Book Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" class="form-control" name="author" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Add Book</button>
        </form>
    </div>
</div>

</body>
</html>
