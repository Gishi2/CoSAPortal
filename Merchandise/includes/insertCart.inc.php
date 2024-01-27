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

    // Check cart table
    $checkQuery = "SELECT * FROM cart WHERE user_id = :userId AND product_id = :productId AND size = :sizes";
    $checkStmt = $pdo->prepare($checkQuery);
    $checkStmt->bindParam(":userId", $userId);
    $checkStmt->bindParam(":productId", $productId);
    $checkStmt->bindParam(":sizes", $sizes);
    $checkStmt->execute();
    $existingCartItem = $checkStmt->fetch(PDO::FETCH_ASSOC);

    if ($existingCartItem) {
        // Item already exists, update the quantity
        $updateQuery = "UPDATE cart SET quantity = quantity + :quantity WHERE cart_id = :cartId";
        $updateStmt = $pdo->prepare($updateQuery);
        $updateStmt->bindParam(":quantity", $quantity);
        $updateStmt->bindParam(":cartId", $existingCartItem['cart_id']);
        $updateStmt->execute();
        $cartId = $existingCartItem['cart_id'];
    } else {
        // Item doesn't exist, insert a new record
        $insertQuery = "INSERT INTO cart (user_id, product_id, quantity, price, size) VALUES
        (:userId, :productId, :quantity, :price, :sizes)";
        $insertStmt = $pdo->prepare($insertQuery);
        $insertStmt->bindParam(":userId", $userId);
        $insertStmt->bindParam(":productId", $productId);
        $insertStmt->bindParam(":quantity", $quantity);
        $insertStmt->bindParam(":price", $price);
        $insertStmt->bindParam(":sizes", $sizes);
        $insertStmt->execute();
        $cartId = $pdo->lastInsertId();
    }

    $pdo = null;
    $checkStmt = null;
    $updateStmt = null;
    $insertStmt = null;

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