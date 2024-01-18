<?php
    session_start();

    if (!isset($_SESSION['matrixId'])) {
        header("Location: /Login-system/login.html");
    }

    try {
        require_once "dbh.inc.php";

        $id = isset($_POST['merchandiseId']) ? $_POST['merchandiseId'] : null;

        if ($id !== null) {
            $query = "DELETE FROM merchandise WHERE id = :merchandiseId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':merchandiseId', $id, PDO::PARAM_INT);
            $stmt->execute();

            echo "Merchandise deleted successfully";
        } else {
            echo "Invalid Merchandise ID";
        }

        $pdo = null; $stmt = null;
        header("Location: /Merchandise/merchandise-list.php?deletesuccessful");
        die();
    } catch (PDOException $e) {
        error_log("Query failed: " . $e->getMessage());
        http_response_code(500);
        echo "Error deleting item.";
    }

?>