<?php
    session_start();

    if (!isset($_SESSION['matrixId'])) {
        header("Location: /Login-system/login.html");
    }

    try {
        require_once "dbh.inc.php";

        $bookId = isset($_POST['bookId']) ? $_POST['bookId'] : null;

        if ($bookId !== null) {
            $query = "DELETE FROM book WHERE book_id = :bookId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':bookId', $bookId, PDO::PARAM_INT);
            $stmt->execute();

            echo "Book deleted successfully";
            $pdo = null; $stmt = null;
            header("Location: /Book/book-list.php?deletesuccessful");
            die();
        } else {
            echo "Invalid Book ID";
            $pdo = null; $stmt = null;
            die();
        }
    } catch (PDOException $e) {
        error_log("Query failed: " . $e->getMessage());
        http_response_code(500);
        echo "Error deleting item.";
    }
?>