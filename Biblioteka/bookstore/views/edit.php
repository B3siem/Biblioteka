<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>

    <form action="index.php?action=update&id=<?= $book['id'] ?>" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?= $book['title'] ?>" required>

        <label for="author">Author:</label>
        <input type="text" name="author" value="<?= $book['author'] ?>" required>

        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" value="<?= $book['price'] ?>" required>

        <button type="submit" name="updateBook">Update Book</button>
    </form>
</body>
</html>
