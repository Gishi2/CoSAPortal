<?php
    $rawData = file_get_contents('php://input');
    $decodedData = json_decode($rawData, true);
    error_log('PHP script executed successfully');

try {
    if ($decodedData === null) {
        echo "Error decoding JSON data";
        die();
    } 

    $userId = $_SESSION['matrixId'];
    $productId = $decodedData['merchandiseId'];
    $price = (float)$decodedData['price'];
    $quantity = (int)$decodedData['quantity']; 
    $sizes = $decodedData['sizes']; 

    require_once "dbh.inc.php";

    $query = "INSERT INTO cart (user_id, product_id, quantity, price, size) VALUES
    (:userId, :productId, :quantity, :price, :sizes);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":userId", $userId);
    $stmt->bindParam(":productId", $productId);
    $stmt->bindParam(":quantity", $quantity);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":sizes", $sizes);
    $stmt->execute();

    $pdo = null; $stmt = null;
    die();
} catch (PDOException $e) {
    error_log("Query failed: " . $e->getMessage());
    http_response_code(500);
    echo "Error inserting item.";
    die();
}    
?>