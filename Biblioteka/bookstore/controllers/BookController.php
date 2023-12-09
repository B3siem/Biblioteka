<?php
include_once 'models/Book.php';

class BookController {
    private $bookModel;

    public function __construct() {
        $this->bookModel = new Book();
    }

    public function index() {
        $books = $this->bookModel->getAllBooks();
        include 'views/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $price = $_POST['price'];

            $result = $this->bookModel->addBook($title, $author, $price);

            if ($result) {
                header("Location: index.php");
            } else {
                echo "Failed to add book.";
            }
        }
    }

    public function edit($id) {
        $book = $this->bookModel->getBookById($id);
        include 'views/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $price = $_POST['price'];

            $result = $this->bookModel->updateBook($id, $title, $author, $price);

            if ($result) {
                header("Location: index.php");
            } else {
                echo "Failed to update book.";
            }
        }
    }

    public function delete($id) {
        $result = $this->bookModel->deleteBook($id);

        if ($result) {
            header("Location: index.php");
        } else {
            echo "Failed to delete book.";
        }
    }
}
?>
