<?php
    session_start();

    if (!isset($_SESSION['matrixId'])) {
        header("Location: /Login-system/login.html");
    }

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

    $cartId = $pdo->lastInsertId();

    $pdo = null; $stmt = null;  

    header('Content-Type: application/json');
    echo json_encode(['status' => 'success', 'cartId' => $cartId]);

    die();
} catch (PDOException $e) {
    error_log("Query failed: " . $e->getMessage());

    header('Content-Type: application/json');
    echo json_encode(['error' => 'Error inserting item.']);
    http_response_code(500);
    die();
}    
?>