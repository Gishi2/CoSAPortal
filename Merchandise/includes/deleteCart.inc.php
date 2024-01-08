<?php

try {
    require_once "dbh.inc.php";

    $itemId = isset($_POST['itemId']) ? $_POST['itemId'] : null;

    if ($itemId !== null) {
        $query = "DELETE FROM cart WHERE cart_id = :itemId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
        $stmt->execute();

        echo "Item deleted successfully";
    } else {
        echo "Invalid item ID";
    }

    $pdo = null; $stmt = null;
    header("Location: /Merchandise/merchandise.php?deletesuccessful");
    die();
} catch (PDOException $e) {
    error_log("Query failed: " . $e->getMessage());
    http_response_code(500);
    echo "Error deleting item.";
}

?>