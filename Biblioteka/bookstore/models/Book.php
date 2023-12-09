<?php
class Book {
    private $conn;

    public function __construct() {
        include_once 'config.php';
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getAllBooks() {
        $sql = "SELECT * FROM books";
        $result = $this->conn->query($sql);

        $books = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $books[] = $row;
            }
        }

        return $books;
    }

    public function addBook($title, $author, $price) {
        $sql = "INSERT INTO books (title, author, price) VALUES ('$title', '$author', $price)";
        return $this->conn->query($sql);
    }

    public function getBookById($id) {
        $sql = "SELECT * FROM books WHERE id = $id";
        $result = $this->conn->query($sql);

        return ($result->num_rows > 0) ? $result->fetch_assoc() : null;
    }

    public function updateBook($id, $title, $author, $price) {
        $sql = "UPDATE books SET title='$title', author='$author', price=$price WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function deleteBook($id) {
        $sql = "DELETE FROM books WHERE id = $id";
        return $this->conn->query($sql);
    }
}
?>
